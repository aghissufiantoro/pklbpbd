<style>
  .btn-square {
    transition: transform 0.3s ease-in-out;
  }

  .btn-square:hover {
    transform: translate(5px, -5px);
    /* Sesuaikan nilai transformasi sesuai keinginan */
  }
  
</style>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-0 feature-row">
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/pra-bencana.png') ?>" alt="Pra-Bencana">
          </div>
          <h5 class="mb-3">PRA-Bencana</h5>
          <p class="mb-0">Dalam fase pra bencana ini mencakup kegiatan, mitigasi, kesiapsagaan dan peringatan dini.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/tanggap-darurat.png') ?>" alt="Tanggap-Darurat">
          </div>
          <h5 class="mb-3">Tanggap Darurat</h5>
          <p class="mb-0">Dalam tahap ini mencakup tanggap darurat dan bantuan darurat.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/pasca-bencana.png') ?>" alt="Pasca-Bencana">
          </div>
          <h5 class="mb-3">Pasca Bencana</h5>
          <p class="mb-0">Dalam tahapan ini mencakup pemulihan, rehabilitasi dan juga rekonstruksi.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/support-24.png') ?>" alt="Service-BPBD">
          </div>
          <h5 class="mb-3">24/7 Support</h5>
          <p class="mb-0">Kami siap melayani Anda selama 24/7</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<style>
  .project-item img {
    transition: transform 0.3s ease-in-out;
  }

  .project-item img:hover {
    transform: translateX(10px);
    /* Ubah nilai ini sesuai kebutuhan */
  }
</style>

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
                $tugas_harian = $this->db->query("SELECT * FROM tugas_harian ORDER BY tanggal DESC")->result();
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