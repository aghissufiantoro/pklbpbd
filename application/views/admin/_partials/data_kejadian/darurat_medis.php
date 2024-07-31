<body>
    <div id="success-alert" class="alert alert-success" style="display: none;"></div>
    <div id="error-alert" class="alert alert-danger" style="display: none;"></div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Kejadian</h4>
                    <?php echo ($this->session->userdata('status') == 'login') ? 'login' : 'aa'; ?>
                    <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
              <div class="mb-3">
              <form id="addForm1" method="post"  enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama</label>
                                    <input id="Nama" class="form-control" name="nama" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="Jenis Kelamin">Jenis Kelamin</label>
                                    <select class="form-select" id="Jenis Kelamin" name="jenis_kelamin" data-width="100%" required>
                                        <option value="">--- Pilih Jenis Kelamin ---</option>
                                        <option value="L">L</option>
                                        <option value="P">P</option>
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
                                    <label for="Usia" class="form-label">Usia</label>
                                    <input id="Usia" class="form-control" name="usia" type="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label" for="Kondisi">Kondisi</label>
                                    <select class="form-select" id="Kondisi" name="kondisi" data-width="100%" required>
                                        <option value="">--- Pilih Kondisi ---</option>
                                        <option value="Sadar">Sadar</option>
                                        <option value="Tidak Sadar">Tidak Sadar</option>
                                        <option value="Meninggal Dunia">Meninggal Dunia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Riwayat Penyakit" class="form-label">Riwayat Penyakit</label>
                                    <input id="Riwayat Penyakit" class="form-control" name="riwayat_penyakit" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Kronologi Darurat Medis" class="form-label">Kronologi Darurat Medis</label>
                                    <input id="Kronologi Darurat Medis" class="form-control" name="kronologi_darurat_medis" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Tindak Lanjut Darurat Medis" class="form-label">Tindak Lanjut Darurat Medis</label>
                                    <input id="Tindak Lanjut Darurat Medis" class="form-control" name="tindak_lanjut_darurat_medis" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Petugas Di Lokasi Darurat Medis" class="form-label">Petugas Di Lokasi Darurat Medis</label>
                                    <select class="js-example-basic-multiple form-select" id="petugas_di_lokasi_darurat_medis" name="petugas_di_lokasi_darurat_medis[]" data-width="100%" required multiple>
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
                        <div class="mb-3">
                                <label for="dokumentasi_darurat_medis" class="form-label">Dokumentasi Darurat Medis</label>
                                <input id="dokumentasi_darurat_medis" type="file" class="form-control" required name="dokumentasi_darurat_medis" accept="image/*" />
                        </div>
                        <button id="saveButton" class="btn btn-success" type="button">Save</button>
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
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Usia</th>
                                    <th>Kondisi</th>
                                    <th>Riwayat Penyakit</th>
                                    <th>Kronologi Darurat Medis</th>
                                    <th>Tindak Lanjut Darurat Medis</th>
                                    <th>Petugas Di Lokasi Darurat Medis</th>
                                    <th>Dokumentasi Darurat Medis</th>
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
       function handleSubmitAndRedirectInsidePartial() {
    const form = document.getElementById('addForm1');
    const formData = new FormData(form);
    const idKejadian = document.getElementById('id_kejadian').value;
    const imageFile = document.getElementById('dokumentasi_darurat_medis').files[0];
    const petugasMultiselect = document.getElementById('petugas_di_lokasi_darurat_medis');
    const selectedOptions = petugasMultiselect.selectedOptions;
    const selectedValues = Array.from(selectedOptions).map(option => option.value);
    const selectedValuesString = selectedValues.join(', ');
    const formObject = {
        id_kejadian: idKejadian,
        petugas_di_lokasi_darurat_medis: selectedValuesString
    };

    formData.forEach((value, key) => {
        formObject[key] = value;
    });

    if (imageFile) {
        const imageFormData = new FormData();
        imageFormData.append('image', imageFile);
        const caseType = 'Darurat Medis'; // Assuming kejadian is the case type selector
        imageFormData.append('case', caseType);

        fetch('<?= base_url('admin/data_kejadian/upload_image') ?>', {
            method: 'POST',
            body: imageFormData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.status === 'success') {
                formObject.dokumentasi_darurat_medis = data.image_url;

                fetch("<?= base_url("admin/data_kejadian/save_darurat_medis") ?>", {
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
const baseUrl = 'http://localhost:80/bpbd'
    if (data.status === 'success') {
        const data1 = data.data;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
    <td>${data1.nama}</td>
    <td>${data1.jenis_kelamin}</td>
    <td>${data1.alamat}</td>
    <td>${data1.usia}</td>
    <td>${data1.kondisi}</td>
    <td>${data1.riwayat_penyakit}</td>
    <td>${data1.kronologi_darurat_medis}</td>
    <td>${data1.tindak_lanjut_darurat_medis}</td>
    <td>${data1.petugas_di_lokasi_darurat_medis}</td>
    
    <td><img src="${baseUrl + data1.dokumentasi_darurat_medis}" alt="dokumentasi" width="100"></td>
                    
`;
        document.getElementById('dataKejadianTableBody').appendChild(newRow);

        form.reset();

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


    // Setup event listener di partial form
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
    </script>
</body>
