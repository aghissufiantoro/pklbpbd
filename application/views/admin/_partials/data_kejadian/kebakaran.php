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
                <h4 class="card-title">Tambah Data Kejadian Kebakaran</h4>
                <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
                <form id="addForm1" action="<?= base_url("admin/data_kejadian/save_kebakaran") ?>" method="post"  enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Objek Terbakar" class="form-label">Objek Terbakar</label>
                                <input id="Objek Terbakar" class="form-control" name="objek_terbakar" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Luas Terbakar" class="form-label">Luas Terbakar</label>
                                <input id="Luas Terbakar" class="form-control" name="luas_terbakar" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Luas Bangunan" class="form-label">Luas Bangunan</label>
                                <input id="Luas Bangunan" class="form-control" name="luas_bangunan" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Penyebab" class="form-label">Penyebab</label>
                                <input id="Penyebab" class="form-control" name="penyebab" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Status Bangunan" class="form-label">Status Bangunan</label>
                                <input id="Status Bangunan" class="form-control" name="status_bangunan" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Nama" class="form-label">Nama</label>
                                <input id="Nama" class="form-control" name="nama" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Usia" class="form-label">Usia</label>
                                <input id="Usia" class="form-control" name="usia" type="number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Jenis Kelamin" class="form-label">Jenis Kelamin</label>
                                <select id="Jenis Kelamin" class="form-control" name="jenis_kelamin" required>
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <option value="Laki-laki">L</option>
                                    <option value="Perempuan">P</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input id="Alamat" class="form-control" name="alamat" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Lebar Jalan" class="form-label">Lebar Jalan</label>
                                <input id="Lebar Jalan" class="form-control" name="lebar_jalan" type="number" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Kondisi Bangunan" class="form-label">Kondisi Bangunan</label>
                                <input id="Kondisi Bangunan" class="form-control" name="kondisi_bangunan" type="text" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Kronologi Kebakaran" class="form-label">Kronologi Kebakaran</label>
                                <input id="Kronologi Kebakaran" class="form-control" name="kronologi_kebakaran" type="text" required>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Tindak Lanjut Kebakaran" class="form-label">Tindak Lanjut Kebakaran</label>
                                <input id="Tindak Lanjut Kebakaran" class="form-control" name="tindak_lanjut_kebakaran" type="text" required>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Petugas di Lokasi" class="form-label">Petugas di Lokasi</label>
                                <select class="js-example-basic-multiple form-select" id="petugas_di_lokasi_kebakaran" name="petugas_di_lokasi_kebakaran[]" data-width="100%" required multiple>
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
                                <label for="Dokumentasi Kebakaran" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_kebakaran" type="file" class="form-control" required name="dokumentasi_kebakaran" accept="image/*" />
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
                                    <th>Objek Terbakar</th>
                                    <th>Luas Terbakar</th>
                                    <th>Luas Bangunan</th>
                                    <th>Penyebab</th>
                                    <th>Status Bangunan</th>
                                    <th>Nama</th>
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Lebar Jalan</th>
                                    <th>Kondisi Bangunan</th>
                                    <th>Kronologi</th>
                                    <th>Tindak Lanjut</th>
                                    <th>Petugas di Lokasi</th>
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
            
            prefilledAlamat();
        });

        function prefilledAlamat(){
            var alamatKejadianElem = $("#alamat_kejadian");
            var alamatField = $("#Alamat");
             
            if (alamatKejadianElem.length && alamatField.length) {
                var alamatKejadian = alamatKejadianElem.val();
                console.log("Alamat Kejadian:", alamatKejadian);
                console.log("Alamat Field:", alamatField);

                if (alamatField.val() === '') {
                    alamatField.val(alamatKejadian);
                }

                alamatField.focus(function() {
                    if (alamatField.val() === alamatKejadian) {
                        alamatField.val('');
                    }
                });

                alamatField.blur(function() {
                    if (alamatField.val() === '') {
                        alamatField.val(alamatKejadian);
                    }
                });
            } else {
                console.log("Elemen alamat_kejadian atau Alamat tidak ditemukan.");
            }
        }

        setupEventListenersInPartial();
        function setupEventListenersInPartial() {
    const saveButtonPartial = document.getElementById('saveButton');

    if (saveButtonPartial) {
        saveButtonPartial.addEventListener('click', function(event) {
            event.preventDefault();
            handleSubmitAndRedirectInsidePartial();
        });
    }

    const stopButtonPartial = document.getElementById('stopButton');
    if (stopButtonPartial) {
        stopButtonPartial.addEventListener('click', function() {
            window.location.href = '<?php echo site_url('admin/data_kejadian'); ?>';
        });
    }
}

function handleSubmitAndRedirectInsidePartial() {
    const form = document.getElementById('addForm1'); 
    const formData = new FormData(form);
    const idKejadian = document.getElementById('id_kejadian').value;
    const imageFile = document.getElementById('dokumentasi_kebakaran').files[0];
    const petugasMultiselect = document.getElementById('petugas_di_lokasi_kebakaran');

            // Mengambil semua opsi yang dipilih
    const selectedOptions = petugasMultiselect.selectedOptions;

    // Mengubah HTMLCollection dari selectedOptions menjadi Array dan mengambil nilai (value) dari setiap opsi
    const selectedValues = Array.from(selectedOptions).map(option => option.value);
    const selectedValuesString = selectedValues.join(', ');
    const formObject = {
        id_kejadian: idKejadian,
        petugas_di_lokasi_kebakaran: selectedValuesString
    };

    alert(idKejadian);

    formData.forEach((value, key) => {
        formObject[key] = value;
    });

    if (imageFile) {
        const imageFormData = new FormData();
        imageFormData.append('image', imageFile);
        const caseType = 'Kebakaran'; // Assuming kejadian is the case type selector
        imageFormData.append('case', caseType);

        fetch('<?= base_url('admin/data_kejadian/upload_image') ?>', {
            method: 'POST',
            body: imageFormData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                formObject.dokumentasi_kebakaran = data.image_url;

                fetch("<?= base_url("admin/data_kejadian/save_kebakaran") ?>", {
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
                alert('Gagal mengunggah gambar: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
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

function handleResponse(data, form) {
    const baseUrl = 'http://localhost:80/bpbd';
    if (data.status === 'success') {
        const data1 = data.data;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${data1.objek_terbakar}</td>
            <td>${data1.luas_terbakar}</td>
            <td>${data1.luas_bangunan}</td>
            <td>${data1.penyebab}</td>
            <td>${data1.status_bangunan}</td>
            <td>${data1.nama}</td>
            <td>${data1.usia}</td>
            <td>${data1.jenis_kelamin}</td>
            <td>${data1.alamat}</td>
            <td>${data1.lebar_jalan}</td>
            <td>${data1.kondisi_bangunan}</td>
            <td>${data1.kronologi_kebakaran}</td>
            <td>${data1.tindak_lanjut_kebakaran}</td>
            <td>${data1.petugas_di_lokasi_kebakaran}</td>
            <td><img src="${baseUrl + data1.dokumentasi_kebakaran}" alt="dokumentasi" width="100"></td>
        `;
        document.getElementById('dataKejadianTableBody').appendChild(newRow);

        resetForm(form);

        document.getElementById('success-alert').textContent = 'Data berhasil disimpan';
        document.getElementById('success-alert').style.display = 'block';
        document.getElementById('error-alert').style.display = 'none';
    } else {
        document.getElementById('error-alert').textContent = 'Gagal mengirim data: ' + data.message;
        document.getElementById('error-alert').style.display = 'block';
        document.getElementById('success-alert').style.display = 'none';
    }
}

function handleError(error) {
    console.error('Error:', error);
    document.getElementById('error-alert').textContent = 'Terjadi kesalahan saat mengirim data: ' + error.message;
    document.getElementById('error-alert').style.display = 'block';
    document.getElementById('success-alert').style.display = 'none';
}

function resetForm(form){
        form.reset();
        const multiselect = document.getElementById('petugas_di_lokasi_kebakaran');
        // Mengatur ulang multiselect dengan menghapus semua opsi yang terpilih
        for (let option of multiselect.options) {
            option.selected = false;
        }
        multiselect.dispatchEvent(new Event('change'));
        prefilledAlamat();
    }

    </script>