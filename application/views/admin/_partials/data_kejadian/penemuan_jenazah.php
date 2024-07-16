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
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_saksi" class="form-label">Nama Saksi</label>
                                <input id="nama_saksi" class="form-control" name="nama_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="usia_saksi" class="form-label">Usia Saksi</label>
                                <input id="usia_saksi" class="form-control" name="usia_saksi" type="text">
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
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_Korban" class="form-label">Nama Korban</label>
                                <input id="nama_Korban" class="form-control" name="nama_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="usia_korban" class="form-label">Usia Korban</label>
                                <input id="usia_korban" class="form-control" name="usia_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="alamat_korban" class="form-label">Alamat Korban</label>
                                <input id="alamat_korban" class="form-control" name="alamat_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="alamat_domisili_korban" class="form-label">Alamat Domisili Korban</label>
                                <input id="alamat_domisili_korban" class="form-control" name="alamat_domisili_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="kronologi_penemuan_jenazah" class="form-label">Kronologi Penemuan Jenazah</label>
                                <input id="kronologi_penemuan_jenazah" class="form-control" name="kronologi_penemuan_jenazah" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="tindak_lanjut_penemuan_jenazah" class="form-label">Tindak Lanjut Penemuan Jenazah</label>
                                <input id="tindak_lanjut_penemuan_jenazah" class="form-control" name="tindak_lanjut_penemuan_jenazah" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_penemuan_jenazah" class="form-label">Tindak Lanjut Penemuan Jenazah</label>
                                <input id="petugas_di_lokasi_penemuan_jenazah" class="form-control" name="petugas_di_lokasi_penemuan_jenazah" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumentasi_penemuan_jenazah" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_penemuan_jenazah" type="file" class="form-control" required name="dokumentasi_penemuan_jenazah" accept="image/*" />
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