<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div id="success-alert" class="alert alert-success" style="display: none;"></div>
<div id="error-alert" class="alert alert-danger" style="display: none;"></div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Kejadian</h4>
                <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
                <form id="addForm1" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="jenis_pohon" class="form-label">Jenis Pohon</label>
                                <input id="jenis_pohon" class="form-control" name="jenis_pohon" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="diameter" class="form-label">Diameter</label>
                                <input id="diameter" class="form-control" name="diameter" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="Tinggi" class="form-label">Tinggi</label>
                                <input id="Tinggi" class="form-control" name="tinggi" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="tindak_lanjut_pohon" class="form-label">Tindak Lanjut Pohon Tumbang</label>
                                <input id="tindak_lanjut_pohon" class="form-control" name="tindak_lanjut_pohon_tumbang" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_pohon_tumbang" class="form-label">Petugas di Lokasi Pohon Tumbang</label>
                                <select class="js-example-basic-multiple form-select" id="petugas_di_lokasi_pohon_tumbang" name="petugas_di_lokasi_penemuan_jenazah[]" data-width="100%" required multiple>
                                    <option value="">--- Pilih Lokasi Kejadian ---</option>
                                    <option value="BPBD">BPBD</option>
                                    <option value="SATPOL PP">SATPOL PP</option>
                                    <option value="DINAS PERHUBUNGAN">DINAS PERHUBUNGAN</option>
                                    <option value="DPKP">DPKP</option>
                                    <option value="TGC SELATAN">TGC SELATAN</option>
                                    <option value="TGC TIMUR">TGC TIMUR</option>
                                    <option value="TGC DUKUH PAKIS">TGC DUKUH PAKIS</option>
                                    <option value="TGC KEDUNG COWEK">TGC KEDUNG COWEK</option>
                                    <option value="TGC UTARA">TGC UTARA</option>
                                    <option value="TGC BARAT">TGC BARAT</option>
                                    <option value="TGC PUSAT">TGC PUSAT</option>
                                    <option value="PMI">PMI</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumentasi_pohon_tumbang" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_pohon_tumbang" type="file" class="form-control" required name="dokumentasi_pohon_tumbang" accept="image/*" />
                            </div>
                        </div>
                    </div>

                    <button id="saveButton" class="btn btn-success" type="submit">Save</button>
                    <button id="stopButton" class="btn btn-danger" type="button">Selesai</button>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kejadian</h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Jenis Pohon</th>
                                    <th>Diameter</th>
                                    <th>Tinggi</th>
                                    <th>Tindak Lanjut Pohon Tumbang</th>
                                    <th>Petugas di Lokasi Pohon Tumbang</th>
                                    <th>Dokumentasi</th>
                                </tr>
                            </thead>
                            <tbody id="dataKejadianTableBody">
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: true,
                placeholder: "--- Pilih Petugas ---",
                allowClear: true
            });
        });

        setupEventListenersInPartial();

        function setupEventListenersInPartial(){
            const saveButtonPartial = document.getElementById('saveButton');
            if (saveButtonPartial) {
                saveButtonPartial.addEventListener('click', function(event){
                    event.preventDefault();
                    handleSubmitAndRedirectInsidePartial();
                });
            }

            const stopButtonPartial = document.getElementById('stopButton');
            if (stopButtonPartial){
                stopButtonPartial.addEventListener('click', function(event){
                    event.preventDefault();
                    window.location.href = '<?= base_url('admin/data_kejadian') ?>';
                });
            }
        }

        function handleSubmitAndRedirectInsidePartial(){
            const form = document.getElementById('addForm1');
            const formData = new FormData(form);
            const idKejadian = document.getElementById('id_kejadian').value;
            const imageFile = document.getElementById('dokumentasi_pohon_tumbang').files[0];
            const petugasMultiselect = document.getElementById('petugas_di_lokasi_pohon_tumbang');

            // Mengambil semua opsi yang dipilih
            const selectedOptions = petugasMultiselect.selectedOptions;

            // Mengubah HTMLCollection dari selectedOptions menjadi Array dan mengambil nilai (value) dari setiap opsi
            const selectedValues = Array.from(selectedOptions).map(option => option.value);
            const selectedValuesString = selectedValues.join(', ');
            const formObject = {
                id_kejadian: idKejadian,
                petugas_di_lokasi_pohon_tumbang: selectedValuesString
            };
            alert(idKejadian);
            formData.forEach(function(value, key){
                formObject[key] = value;
            });

            if (imageFile){
                const imageFormData = new FormData();
                imageFormData.append('image', imageFile);
                const caseType = 'Pohon Tumbang'
                imageFormData.append('case', caseType);

                fetch('<?php echo site_url("admin/data_kejadian/upload_image"); ?>', {
                    method: 'POST',
                    body: imageFormData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success'){
                        formObject.dokumentasi_pohon_tumbang = data.image_url;
                        
                        fetch("<?= base_url("admin/data_kejadian/save_pohon_tumbang") ?>", {
                            method: 'POST',
                            body: JSON.stringify(formObject),
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            credentials: 'same-origin'
                        })
                        .then(response => response.json())
                        .then(data => handleResponse(data, form))
                        .catch(handleError);
                    } else {
                        alert('Failed to upload image' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error : ', error);
                    alert(error);
                });
            } else {
                fetch(form.action, {
                    method: 'POST',
                    body: JSON.stringify(formObject),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => handleResponse(data, form))
                .catch(handleError);
            }
        }

        function handleResponse(data, form){
            const baseUrl = 'http://localhost:80/bpbd';
            if(data.status === 'success') {
                const data1 = data.data;
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td>${data1.jenis_pohon}</td>
                <td>${data1.diameter}</td>
                <td>${data1.tinggi}</td>
                <td>${data1.tindak_lanjut_pohon_tumbang}</td>
                <td>${data1.petugas_di_lokasi_pohon_tumbang}</td>
                <td><img src="${baseUrl}/${data1.dokumentasi_pohon_tumbang}" alt="Dokumentasi" width="100"></td>
                `;
                document.getElementById('dataKejadianTableBody').appendChild(newRow);

                resetForm(form);

                document.getElementById('success-alert').textContent = 'Data berhasil disimpan';
                document.getElementById('success-alert').style.display = 'block';
                document.getElementById('error-alert').style.display = 'none';
            } else {
                document.getElementById('error-alert').textContent ='Gagal mengirim data: ' + data.message;
                document.getElementById('error-alert').style.display = 'block';
                document.getElementById('success-alert').style.display = 'none';
            }
        }

        function handleError(error){
            console.error('Error:', error);
            document.getElementById('error-alert').textContent = 'Terjadi kesalahan saat mengirim data: ' + error.message;
            document.getElementById('error-alert').style.display = 'block';
            document.getElementById('success-alert').style.display = 'none';
        }

        function resetForm(form){
        form.reset();
        const multiselect = document.getElementById('petugas_di_lokasi_pohon_tumbang');
        // Mengatur ulang multiselect dengan menghapus semua opsi yang terpilih
        for (let option of multiselect.options) {
            option.selected = false;
        }
        multiselect.dispatchEvent(new Event('change'));
    }
    </script>