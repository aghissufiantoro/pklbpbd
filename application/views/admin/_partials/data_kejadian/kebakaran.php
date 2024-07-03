<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Kejadian Kebakaran</h4>
                <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
                <form id="addForm" action="" method="post" enctype="multipart/form-data">
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
                    
                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
