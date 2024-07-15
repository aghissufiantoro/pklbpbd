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
                       
<<<<<<< HEAD
                    <button class="btn btn-success" type="submit">Save</button>
=======
                    <button id="saveButton" class="btn btn-success" type="submit">Save</button>
                    <button id="stopButton" class="btn btn-danger" type="button">Selesai</button>
>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
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
        alert(0);
        setupEventListenersInPartial();
        
        function handleSubmitAndRedirectInsidePartial() {
        const form = document.getElementById('addForm1'); 
        const formData = new FormData(form);
        const idKejadian = document.getElementById('id_kejadian').value;

        // Buat objek untuk menyimpan data form
        const formObject = {
            id_kejadian: idKejadian
        };

        alert(idKejadian);

        formData.forEach((value, key) => {
            formObject[key] = value;
        });

        fetch(form.action, {
            method: 'POST',
            body: JSON.stringify(formObject),
            headers: {
                'Content-Type': 'application/json', // Ubah header ke application/json
                'X-Requested-With': 'XMLHttpRequest' // Pastikan server mengenali ini sebagai permintaan AJAX
            },
            credentials: 'same-origin' // Sertakan kredensial dalam permintaan
        })
        .then(response =>console.log(response.text())) // Parsing respons sebagai JSON
        .then(data => {
        const data1 = JSON.parse(data);
        
        console.log(data1.nama);
            if (data1.id_kejadian !== null) {
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
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('error-alert').textContent = 'Terjadi kesalahan saat mengirim data: ' + error.message;
            document.getElementById('error-alert').style.display = 'block';
            document.getElementById('success-alert').style.display = 'none';
        });
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