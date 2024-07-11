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
              <form id="addForm1" action="<?= base_url("admin/data_kejadian/save_darurat_medis") ?>" method="post"  enctype="multipart/form-data">
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
    .then(response =>response.json()) // Parsing respons sebagai JSON
    .then(data => {
      const data1 = JSON.parse(data);
       
      console.log(data1.nama);
        if (data1.id_kejadian !== null) {
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${data1.nama}</td>
                <td>${data1.jenis_kelamin}</td>
                <td>${data1.alamat}</td>
                <td>${data1.usia}</td>
                <td>${data1.kondisi}</td>
                <td>${data1.riwayat_penyakit}</td>
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
</body>
