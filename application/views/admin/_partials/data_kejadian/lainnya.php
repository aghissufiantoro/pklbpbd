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
                <form id="addForm1" action="" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="jenis_kejadian_lain" class="form-label">Jenis Kejadian Lain</label>
                                <input id="jenis_kejadian_lain" class="form-control" name="jenis_kejadian_lain" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input id="nama" class="form-control" name="nama" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input id="alamat" class="form-control" name="alamat" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="detail_obyek" class="form-label">Detail Objek</label>
                                <input id="detail_obyek" class="form-control" name="detail_obyek" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="kronologi_lain" class="form-label">Kronologi Lain</label>
                                <input id="kronologi_lain" class="form-control" name="kronologi_lain" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="tindak_lanjut_lain" class="form-label">Tindak Lanjut Lain</label>
                                <input id="tindak_lanjut_lain" class="form-control" name="tindak_lanjut_lain" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_lain" class="form-label">Petugas di Lokasi Lain</label>
                                <input id="petugas_di_lokasi_lain" class="form-control" name="petugas_di_lokasi_lain" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumentasi_lain" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_lain" type="file" class="form-control" required name="dokumentasi_lain" accept="image/*" />
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
                                    <th>Jenis Kejadian Lain</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Detail Objek</th>
                                    <th>Kronologi Lain</th>
                                    <th>Tindak Lanjut Lain</th>
                                    <th>Petugas di Lokasi Lain</th>
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
            const imageFile = document.getElementById('dokumentasi_lain').files[0];

            const formObject = {
                id_kejadian: idKejadian,
            };
            alert(idKejadian);
            formData.forEach(function(value, key){
                formObject[key] = value;
            });

            if (imageFile){
                const imageFormData = new FormData();
                imageFormData.append('image', imageFile);
                const caseType = 'Lainnya'
                imageFormData.append('case', caseType);

                fetch('<?php echo site_url("admin/data_kejadian/upload_image"); ?>', {
                    method: 'POST',
                    body: imageFormData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success'){
                        formObject.dokumentasi_lain = data.image_url;
                        
                        fetch("<?= base_url("admin/data_kejadian/save_lainnya") ?>", {
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
                <td>${data1.jenis_kejadian_lain}</td>
                <td>${data1.nama}</td>
                <td>${data1.alamat}</td>
                <td>${data1.detail_obyek}</td>
                <td>${data1.kronologi_lain}</td>
                <td>${data1.tindak_lanjut_lain}</td>
                <td>${data1.petugas_di_lokasi_lain}</td>
                <td><img src="${baseUrl}/${data1.dokumentasi_lain}" alt="Dokumentasi" width="100"></td>
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