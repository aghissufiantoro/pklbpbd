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
                                <label for="nama_saksi" class="form-label">Nama Saksi</label>
                                <input id="nama_saksi" class="form-control" name="nama_saksi" type="text">
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
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="usia_saksi" class="form-label">Usia Saksi</label>
                                <input id="usia_saksi" class="form-control" name="usia_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="hubungan_saksi" class="form-label" >Hubungan dengan Korban</label>
                                <input id="hubungan_saksi" class="form-control" name="hubungan_saksi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="nama_korban" class="form-label">Nama Korban</label>
                                <input id="nama_korban" class="form-control" name="nama_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="usia_korban" class="form-label">Usia Korban</label>
                                <input id="usia_korban" class="form-control" name="usia_korban" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" data-width="100%">
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
                                <label for="alamat" class="form-label">Alamat Korban</label>
                                <input id="alamat" class="form-control" name="alamat" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="kondisi" class="form-label">Kondisi Korban</label>
                                <input id="kondisi" class="form-control" name="kondisi" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="kronologi_orang_tenggelam" class="form-label">Kronologi Tenggelam</label>
                                <input id="kronologi_orang_tenggelam" class="form-control" name="kronologi_orang_tenggelam" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="tindak_lanjut_orang_tenggelam" class="form-label">Tindak Lanjut</label>
                                <input id="tindak_lanjut_orang_tenggelam" class="form-control" name="tindak_lanjut_orang_tenggelam" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-15">
                            <div class="mb-3">
                                <label for="petugas_di_lokasi_orang_tenggelam" class="form-label">Petugas di Lokasi</label>
                                <input id="petugas_di_lokasi_orang_tenggelam" class="form-control" name="petugas_di_lokasi_orang_tenggelam" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="dokumentasi_orang_tenggelam" class="form-label">Dokumentasi</label>
                                <input id="dokumentasi_orang_tenggelam" type="file" class="form-control" required name="dokumentasi_orang_tenggelam" accept="image/*" />
                            </div>
                        </div>
                    </div> 

                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
