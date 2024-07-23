<div id="main-div" class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="addForm" action="<?= base_url("admin/data_kejadian/add") ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-15">
              <div id="tanggal-icon" class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input required id="tanggal" type="text" class="form-control" name="tanggal" required autocomplete="off">
                  <span  class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="id_kejadian" class="form-label">ID KEJADIAN</label>
                <input required id="id_kejadian" class="form-control" name="id_kejadian" type="text"  value="" readonly>
              
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="kejadian">Kejadian</label>
                <select class="form-select" id="kejadian" name="kejadian" data-width="100%">
                  <option value="">--- Pilih Kejadian ---</option>
                  <option value="Kecelakaan Lalu Lintas">Kecelakaan Lalu Lintas</option>
                  <option value="Darurat Medis">Darurat Medis</option>
                  <option value="Kebakaran">Kebakaran</option>
                  <option value="Pohon Tumbang">Pohon Tumbang</option>
                  <option value="Penemuan Jenazah">Penemuan Jenazah</option>
                  <option value="Orang Tenggelam">Orang Tenggelam</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_berita" class="form-label">Waktu Berita</label>
                <input required type="time" class="form-control" name="waktu_berita" id="waktu_berita" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_tiba" class="form-label">Waktu Tiba</label>
                <input required type="time" class="form-control" name="waktu_tiba" id="waktu_tiba" required autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="lokasi_kejadian">Lokasi Kejadian</label>
                <select class="form-select" id="lokasi_kejadian" name="lokasi_kejadian" data-width="100%">
                  <option value="">--- Pilih Lokasi Kejadian ---</option>
                  <?php
                  $ql = $this->db->query('SELECT wilayah FROM wilayah_2022 GROUP BY wilayah')->result();
                  foreach ($ql as $qz) {
                  ?>
                    <option value="<?= $qz->wilayah ?>"><?= $qz->wilayah ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="alamat_kejadian" class="form-label">Alamat Kejadian</label>
                <input required id="alamat_kejadian" class="form-control" name="alamat_kejadian" type="text">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kabkota_kejadian">Kota</label>
              <select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" data-width="100%" required>
                <option value="surabaya">SURABAYA</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kecamatan_kejadian">Kecamatan</label>
              <select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" data-width="100%" required>

                <option value="">--- Mohon Pilih Kecamatan ---</option>

              </select>
            </div>
            <div class="mb-3" id="kecamatan">
              <label class="form-label" for="kelurahan_kejadian">Kelurahan / Desa</label>
              <select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" data-width="100%" required>
                <option value="">--- Pilih Kelurahan ---</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="kronologi" class="form-label">Kronologi</label>
                <input required id="kronologi" class="form-control" name="kronologi" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                <input required id="tindak_lanjut" class="form-control" name="tindak_lanjut" type="text">
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="petugas_lokasi" class="form-label">Petugas</label>
                <br>
                <label for="petugas_lokasi" class="form-label"><strong>(Contoh: BPBD Kota Surabaya; TGC Posko Selatan; Ambulance PMI)</strong></label>
                <input id="petugas_lokasi" class="form-control" name="petugas_lokasi" type="text">
              </div>
            </div>
          </div> -->

          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Diri</label>
            <input id="dokumentasi" type="file" class="form-control" required name="dokumentasi" accept="image/*" />
          </div>
            
          <div id="conditional-btn">
         
          </div>
        </form>
        <div id="partialContainer"></div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>/assets_admin/js/dataKejadianJs/dataKejadian.js"></script>
<style>
  .alert-container {
  position: fixed;
  top: 15%;
  left: 57%;
  transform: translate(-50%, -50%);
  width: auto;
  z-index: 1050;
}

#success-alert {
  margin-bottom: 0; /* Remove bottom margin to prevent extra space */
}

  </style>
