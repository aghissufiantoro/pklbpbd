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
                                <label for="jenis_pohon" class="form-label">Jenis Pohon</label>
                                <input id="jenis_pohon" class="form-control" name="jenis_pohon" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="diameter" class="form-label">Diameter</label>
                                <input id="diameter" class="form-control" name="diameter" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="Tinggi" class="form-label">Tinggi</label>
                                <input id="Tinggi" class="form-control" name="tinggi" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="tindak_lanjut_pohon" class="form-label">Tindak Lanjut</label>
                                <input id="tindak_lanjut_pohon" class="form-control" name="tindak_lanjut_pohon" type="number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_pohon_tumbang" class="form-label">Petugas di Lokasi</label>
                                <input id="petugas_di_lokasi_pohon_tumbang" class="form-control" name="tpetugas_di_lokasi_pohon_tumbang" type="number">
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

                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>