<?php if ($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Kejadian</h4>
                <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
                <form id="addForm" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-15">
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
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input id="Alamat" class="form-control" name="alamat" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
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
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Riwayat Penyakit" class="form-label">Riwayat Penyakit</label>
                                <input id="Riwayat Penyakit" class="form-control" name="riwayat_penyakit" type="text">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
