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
                                <label for="Jenis Kejadian Lain" class="form-label">Jenis Kejadian Lain</label>
                                <input id="Jenis Kejadian Lain" class="form-control" name="jenis_kejadian_lain" type="text" required>
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
                                <label for="Alamat" class="form-label">Alamat</label>
                                <input id="Alamat" class="form-control" name="alamat" type="text" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="Detail Objek" class="form-label">Detail Obyek</label>
                                <input id="Detail Objek" class="form-control" name="detail_obyek" type="text" required>
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
                                <input id="petugas_di_lokasi_lainn" class="form-control" name="petugas_di_lokasi_lain" type="text" required>
                            </div>
                        </div>
                    </div>


                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>