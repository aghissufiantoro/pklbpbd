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
                                <label for="Nama Saksi" class="form-label">Nama Saksi</label>
                                <input id="Nama Saksi" class="form-control" name="nama_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Usia Saksi" class="form-label">Usia Saksi</label>
                                <input id="Usia Saksi" class="form-control" name="usia_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Alamat Saksi" class="form-label">Alamat Saksi</label>
                                <input id="Alamat Saksi" class="form-control" name="alamat_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Nama Korban" class="form-label">Nama Korban</label>
                                <input id="Nama Korban" class="form-control" name="nama_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Usia Korban" class="form-label">Usia Korban</label>
                                <input id="Usia Korban" class="form-control" name="usia_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Alamat Korban" class="form-label">Alamat Korban</label>
                                <input id="Alamat Korban" class="form-control" name="alamat_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="Alamat Domisili Korban" class="form-label">Alamat Domisili Korban</label>
                                <input id="Alamat Domisili Korban" class="form-control" name="alamat_domisili_korban" type="text">
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url("admin/data_kejadian") ?>">
                        <button type="button" class="btn btn-outline-warning">Kembali</button>
                        <button class="btn btn-success" type="submit">Save</button>
                    </a>

                </form>
            </div>
        </div>
    </div>
</div>