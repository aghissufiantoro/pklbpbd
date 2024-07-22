<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <!-- <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
      <p class="fs-5 fw-medium text-primary">BPBD Kota Surabaya</p>
      <h1 class="display-5 mb-5">VISI MISI</h1>
    </div> -->
	<div class="row">
	<h3 class="mb-4">Surat Keputusan Tim Reaksi Cepat</h3>
      <?php
        $db_perpus_SK_TRC = $this->db->query("SELECT * FROM perpus WHERE jenis_perpus = 'SK TRC'")->result();
        foreach ($db_perpus_SK_TRC as $res_perpus_SK_TRC)
        {
          ?>
          <div class="col-lg-3 col-6 col-md-6 d-flex align-items-stretch wow fadeInUp" data-wow-delay="0.5s">
            <div class="card" style="width: 18rem;">
              <img data-bs-target="#view_pdf-<?= $res_perpus_SK_TRC->id_perpus ?>" data-bs-toggle="modal" style="width: 550px; height: 205px; cursor: pointer;" src="<?= base_url('upload/perpus/'.$res_perpus_SK_TRC->thumbnail_perpus) ?>" class="card-img-top img-fluid" alt="<?= $res_perpus_SK_TRC->judul_perpus ?>">
              <div class="card-body">
                <span class="badge bg-secondary" style="font-size: 14px;">Surat Keputusan Tim Reaksi Cepat</span>
                <p class="card-text" style="cursor: pointer; font-size: 17px;" data-bs-target="#view_pdf-<?= $res_perpus_SK_TRC->id_perpus ?>" data-bs-toggle="modal"><?= $res_perpus_SK_TRC->judul_perpus ?></p>
              </div>
            </div>
          </div>
          <div class="modal fade" id="view_pdf-<?= $res_perpus_SK_TRC->id_perpus ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $res_perpus_SK_TRC->judul_perpus ?></h5>
                  <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="graph-outline">
                    <object style="width: 100%; height: 500px;" data="<?= base_url('upload/perpus/'.$res_perpus_SK_TRC->dok_perpus) ?>" type="application/pdf">
                      <embed src="<?= base_url('upload/perpus/'.$res_perpus_SK_TRC->dok_perpus) ?>?" type="application/pdf">
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