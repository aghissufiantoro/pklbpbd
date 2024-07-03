<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container text-center py-5">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Hukum Kebencanaan BPBD Kota Surabaya</h1>
  </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <!-- <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
      <p class="fs-5 fw-medium text-primary">BPBD Kota Surabaya</p>
      <h1 class="display-5 mb-5">VISI MISI</h1>
    </div> -->
    <div class="row">
      <?php
        $db_perpus_hukum_kebencanaan = $this->db->query("SELECT * FROM perpus WHERE jenis_perpus = 'Hukum Kebencanaan'")->result();
        foreach ($db_perpus_hukum_kebencanaan as $res_perpus_hukum_kebencanaan)
        {
          ?>
          <div class="col-lg-3 col-6 col-md-6 d-flex align-items-stretch wow fadeInUp" data-wow-delay="0.5s">
            <div class="card" style="width: 18rem;">
              <img data-bs-target="#view_pdf-<?= $res_perpus_hukum_kebencanaan->id_perpus ?>" data-bs-toggle="modal" style="width: 277px; height: 145px; cursor: pointer;" src="<?= base_url('upload/perpus/'.$res_perpus_hukum_kebencanaan->thumbnail_perpus) ?>" class="card-img-top img-fluid" alt="<?= $res_perpus_hukum_kebencanaan->judul_perpus ?>">
              <div class="card-body">
                <span class="badge bg-secondary">Hukum Kebencanaan</span>
                <p class="card-text" style="cursor: pointer;" data-bs-target="#view_pdf-<?= $res_perpus_hukum_kebencanaan->id_perpus ?>" data-bs-toggle="modal"><?= $res_perpus_hukum_kebencanaan->judul_perpus ?></p>
              </div>
            </div>
          </div>
          <div class="modal fade" id="view_pdf-<?= $res_perpus_hukum_kebencanaan->id_perpus ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $res_perpus_hukum_kebencanaan->judul_perpus ?></h5>
                  <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="graph-outline">
                    <object style="width: 100%; height: 500px;" data="<?= base_url('upload/perpus/'.$res_perpus_hukum_kebencanaan->dok_perpus) ?>" type="application/pdf">
                      <embed src="<?= base_url('upload/perpus/'.$res_perpus_hukum_kebencanaan->dok_perpus) ?>?" type="application/pdf">
                    </object>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>
<!-- Contact End -->