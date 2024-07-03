<?php
if ($this->session->flashdata('success')) {
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data tugas harian telah dirubah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
  <?php
}
?>

<!-- <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
  </ol>
</nav> -->

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Data Tugas Harian</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_tugas_harian" value="<?= $tugas_harian->id_tugas_harian ?>">
          <div class="mb-3">
            <label for="tanggungjawab_tugas_harian" class="form-label">Tanggung Jawab</label>
            <select class="form-control" name="tanggungjawab_tugas_harian" id="tanggungjawab_tugas_harian">
              <option value="">--- Pilih Tanggung Jawab ---</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Sekretaris Kecamatan") {
                echo "selected";
              } ?>
                value="Sekretaris Kecamatan">Sekretaris Kecamatan</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasi Kesejahteraan Rakyat dan Perekonomian") {
                echo "selected";
              } ?> value="Kasi Kesejahteraan Rakyat dan Perekonomian">Kasi Kesejahteraan Rakyat dan
                Perekonomian</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasi Pemerintahan dan Pelayanan Publik") {
                echo "selected";
              } ?> value="Kasi Pemerintahan dan Pelayanan Publik">Kasi Pemerintahan</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasi Trantibum") {
                echo "selected";
              } ?>
                value="Kasi Trantibum">Kasi Trantibum</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasi Pembangunan") {
                echo "selected";
              } ?>
                value="Kasi Pembangunan">Kasi Pembangunan</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasubag Keuangan") {
                echo "selected";
              } ?>
                value="Kasubag Keuangan">Kasubag Keuangan</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Kasubag Umum dan Kepegawaian") {
                echo "selected";
              } ?> value="Kasubag Umum dan Kepegawaian">Kasubag Umum Kepegawaian</option>
              <option <?php if ($tugas_harian->tanggungjawab_tugas_harian == "Pengurus Barang") {
                echo "selected";
              } ?>
                value="Pengurus Barang">Pengurus Barang</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="tanggal_artikel" class="form-label">Tanggal Kegiatan</label>
            <div class="input-group date datepicker" id="datePickerExample">
              <input type="date" class="form-control" name="tgl_tugas_harian" required autocomplete="off"
                value="<?= $tugas_harian->tgl_tugas_harian ?>">
              <span class="input-group-text input-group-addon"><i data-feather=""></i></span>
            </div>
          </div>
          <div class="mb-3">
            <label for="tanggal_artikel" class="form-label">Jam Kegiatan</label>
            <div class="input-group date datepicker" id="jam">
              <input type="time" class="form-control" name="jam_tugas_harian" required
                data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="HH:MM"
                value="<?= $tugas_harian->jam_tugas_harian ?>">
              <span class="input-group-text input-group-addon"><i data-feather=""></i></span>
            </div>
          </div>
          <div class="mb-3">
            <label for="no_surat_tugas_harian" class="form-label">No. Surat</label>
            <input id="no_surat_tugas_harian" class="form-control" name="no_surat_tugas_harian" type="text"
              value="<?= $tugas_harian->no_surat_tugas_harian ?>">
          </div>
          <div class="mb-3">
            <label for="perihal_tugas_harian" class="form-label">Uraian / Nama Kegiatan</label>
            <input id="perihal_tugas_harian" class="form-control" name="perihal_tugas_harian" type="text"
              value="<?= $tugas_harian->perihal_tugas_harian ?>">
          </div>
          <div class="mb-3">
            <label for="tempat_tugas_harian" class="form-label">Tempat / Alamat Kegiatan</label>
            <input id="tempat_tugas_harian" class="form-control" name="tempat_tugas_harian" type="text"
              value="<?= $tugas_harian->tempat_tugas_harian ?>">
          </div>
          <div class="mb-3">
            <label for="petugas_tugas_harian" class="form-label">Petugas</label>
            <input id="petugas_tugas_harian" class="form-control" name="petugas_tugas_harian" type="text"
              value="<?= $tugas_harian->petugas_tugas_harian ?>">
          </div>
          <div class="mb-3">
            <label for="hasil_tugas_harian" class="form-label">Hasil Tugas</label>
            <input id="hasil_tugas_harian" class="form-control" name="hasil_tugas_harian" type="text"
              value="<?= $tugas_harian->hasil_tugas_harian ?>">
          </div>
          <div class="mb-3">
            <label for="ket_tugas_harian" class="form-label">Keterangan</label>
            <input id="ket_tugas_harian" class="form-control" name="ket_tugas_harian" type="text"
              value="<?= $tugas_harian->ket_tugas_harian ?>">
          </div>
          <!-- <div class="mb-3">
            <div class="form-check">
              <label class="form-check-label" for="termsCheck">
                Agree to <a href="#"> terms and conditions </a>
              </label>
              <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
            </div>
          </div> -->
          <a href="<?= base_url('admin/tugas_harian') ?>">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>