<div class="container-xxl pt-5">
    <div class="container" style="max-width: 1200px;">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
          <h1 class="display-5">AGENDA KEGIATAN</h1>
          <p class="fs-5 fw-medium text-primary mb-5">BPBD KOTA SURABAYA</p>    
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
                <tr>
                    <th width="20px">No</th>
                    <th width="30px">Tanggal</th>
                    <th width="20px">Waktu</th>
                    <th width="20px">Lokasi</th>
                    <th width="20px">Uraian Kegiatan</th>
                    <th width="30px">Bidang</th>
                    <th width="20px">Hasil Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $tugas_harian = $this->db->query("SELECT * FROM tugas_harian 
                WHERE DATE(tanggal) = CURDATE() 
                ORDER BY tanggal DESC;
                ")->result();
                foreach ($tugas_harian as $tugas) {
                    $images = json_decode($tugas->hasil_kegiatan);
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $tugas->tanggal; ?></td>
                        <td><?= $tugas->waktu; ?></td>
                        <td><?= $tugas->lokasi; ?></td>
                        <td><?= $tugas->uraian_kegiatan; ?></td>
                        <td><?= $tugas->bidang; ?></td>
                        <td>
                            <?php
                            if (!empty($images)) {
                                if (is_array($images)) {
                                    foreach ($images as $image) {
                            ?>
                                        <a href="#" data-bs-target="#view_images-<?= $tugas->id_tugas_harian ?>" data-bs-toggle="modal">
                                            <img src="<?= base_url('upload/tugas_harian/' . $image) ?>" class="img-thumbnail" width="150">
                                        </a>
                            <?php
                                    }
                                } else {
                            ?>
                                    <a href="#" data-bs-target="#view_images-<?= $tugas->id_tugas_harian ?>" data-bs-toggle="modal">
                                        <img src="<?= base_url('upload/tugas_harian/' . $tugas->hasil_kegiatan) ?>" class="img-thumbnail" width="150" alt="Hasil Kegiatan">
                                    </a>
                            <?php
                                }
                            }
                            ?>
                        </td>
                    </tr>
                    <?php if (!empty($images)) { ?>
                    <div class="modal fade" id="view_images-<?= $tugas->id_tugas_harian ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Hasil Kegiatan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <?php
                                        if (is_array($images)) {
                                            foreach ($images as $image) {
                                        ?>
                                                <div class="col-md-4 mb-3">
                                                    <img src="<?= base_url('upload/tugas_harian/' . $image) ?>" class="img-fluid" alt="Hasil Kegiatan">
                                                </div>
                                        <?php
                                            }
                                        } else {
                                        ?>
                                            <div class="col-md-4 mb-3">
                                                <img src="<?= base_url('upload/tugas_harian/' . $tugas->hasil_kegiatan) ?>" class="img-fluid" alt="Hasil Kegiatan">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        Kembali
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php
                }
                ?>
            </tbody>
          </table>
        </div>        
    </div>
</div>