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
                                <label for="nama_saksi" class="form-label">Nama Saksi</label>
                                <input id="nama_saksi" class="form-control" name="nama_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="alamat_saksi" class="form-label">Alamat Saksi</label>
                                <input id="alamat_saksi" class="form-control" name="alamat_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="usia_saksi" class="form-label">Usia Saksi</label>
                                <input id="usia_saksi" class="form-control" name="usia_saksi" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="hubungan_saksi" class="form-label" >Hubungan dengan Korban</label>
                                <input id="hubungan_saksi" class="form-control" name="hubungan_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="nama_korban" class="form-label">Nama Korban</label>
                                <input id="nama_korban" class="form-control" name="nama_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="usia_korban" class="form-label">Usia Korban</label>
                                <input id="usia_korban" class="form-control" name="usia_korban" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" data-width="100%">
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat Korban</label>
                                <input id="alamat" class="form-control" name="alamat" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="kondisi" class="form-label">Kondisi Korban</label>
                                <input id="kondisi" class="form-control" name="kondisi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="kronologi_orang_tenggelam" class="form-label">Kronologi Tenggelam</label>
                                <input id="kronologi_orang_tenggelam" class="form-control" name="kronologi_orang_tenggelam" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="tindak_lanjut_orang_tenggelam" class="form-label">Tindak Lanjut</label>
                                <input id="tindak_lanjut_orang_tenggelam" class="form-control" name="tindak_lanjut_orang_tenggelam" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_orang_tenggelam" class="form-label">Petugas di Lokasi</label>
                                <select class="js-example-basic-multiple form-select" id="petugas_di_lokasi_orang_tenggelam" name="petugas_di_lokasi_orang_tenggelam[]" data-width="100%" required multiple>
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
                                <label for="dokumentasi_orang_tenggelam" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_orang_tenggelam" type="file" class="form-control" required name="dokumentasi_orang_tenggelam" accept="image/*" />
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
                                    <th>Nama Saksi</th>
                                    <th>Usia Saksi</th>
                                    <th>Alamat Saksi</th>
                                    <th>Hubungan dengan Korban</th>
                                    <th>Nama Korban</th>
                                    <th>Usia Korban</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat Korban</th>
                                    <th>Kondisi/th>
                                    <th>Kronologi Tenggelam</th>
                                    <th>Tindak Lanjut Tenggelam</th>
                                    <th>Petugas di Lokasi Tenggelam</th>
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
                    var multiselect = document.getElementById('petugas_di_lokasi_orang_tenggelam');
                    var selectedOptions = []; // Array untuk menyimpan opsi yang dipilih

                    // Iterasi setiap option di multiselect
                    for (var i = 0; i < multiselect.options.length; i++) {
                        var option = multiselect.options[i];

                        // Periksa apakah option tersebut dipilih
                        if (option.selected) {
                            // Menyimpan opsi yang dipilih ke dalam array
                            selectedOptions.push({
                                value: option.value,
                                text: option.text
                            });

                            // Menghapus opsi yang dipilih dari multiselect
                            multiselect.remove(i);
                            i--; // Mengurangi indeks karena elemen telah dihapus
                        }
                    }
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
            const imageFile = document.getElementById('dokumentasi_orang_tenggelam').files[0];

            const petugasMultiselect = document.getElementById('petugas_di_lokasi_orang_tenggelam');

            // Mengambil semua opsi yang dipilih
            const selectedOptions = petugasMultiselect.selectedOptions;

            // Mengubah HTMLCollection dari selectedOptions menjadi Array dan mengambil nilai (value) dari setiap opsi
            const selectedValues = Array.from(selectedOptions).map(option => option.value);
            const selectedValuesString = selectedValues.join(', ');
            const formObject = {
                id_kejadian: idKejadian,
                petugas_di_lokasi_orang_tenggelam: selectedValuesString
            };
            alert(idKejadian);
            formData.forEach(function(value, key){
                formObject[key] = value;
            });

            if (imageFile){
                const imageFormData = new FormData();
                imageFormData.append('image', imageFile);
                const caseType = 'Orang Tenggelam'
                imageFormData.append('case', caseType);

                fetch('<?php echo site_url("admin/data_kejadian/upload_image"); ?>', {
                    method: 'POST',
                    body: imageFormData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success'){
                        formObject.dokumentasi_orang_tenggelam = data.image_url;
                        
                        fetch("<?= base_url("admin/data_kejadian/save_orang_tenggelam") ?>", {
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
                <td>${data1.nama_saksi}</td>
                <td>${data1.usia_saksi}</td>
                <td>${data1.alamat_saksi}</td>
                <td>${data1.hubungan_saksi}</td>
                <td>${data1.nama_korban}</td>
                <td>${data1.usia_korban}</td>
                <td>${data1.jenis_kelamin}</td>
                <td>${data1.alamat}</td>
                <td>${data1.kondisi}</td>
                <td>${data1.kronologi_orang_tenggelam}</td>
                <td>${data1.tindak_lanjut_orang_tenggelam}</td>
                <td>${data1.petugas_di_lokasi_orang_tenggelam}</td>
                <td><img src="${baseUrl}/${data1.dokumentasi_orang_tenggelam}" alt="Dokumentasi" width="100"></td>
                `;
                document.getElementById('dataKejadianTableBody').appendChild(newRow);

                form.reset();

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
    </script>