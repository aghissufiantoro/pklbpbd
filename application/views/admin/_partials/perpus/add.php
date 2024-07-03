<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data perpustakaan telah ditambahkan.
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
        <h4 class="card-title">Tambah Data Perpustakaan</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="judul_perpus" class="form-label">Nama Judul</label>
              <input id="judul_perpus" class="form-control" name="judul_perpus" type="text">
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="jenis_perpus" class="form-label">Jenis</label>
              <select name="jenis_perpus" class="form-control" id="jenis_perpus">
                <option value="">--- Pilih Jenis ---</option>
                <option value="Laporan Realisasi Anggaran">Laporan Realisasi Anggaran</option>
                <option value="Laporan Operasional">Laporan Operasional</option>
                <option value="Neraca">Neraca</option>
                <option value="Data Aset dan Inventaris">Data Aset dan Inventaris</option>
                <option value="Produk Hukum Kebencanaan">Produk Hukum Kebencanaan</option>
                <option value="Dok. Penanggulangan Bencana">Dok. Penanggulangan Bencana</option>
                <option value="Edukasi Kebencanaan">Edukasi Kebencanaan</option>
              </select>
            </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="tgl_perpus" class="form-label">Tanggal Penerbitan</label>
              <div class="input-group date datepicker" id="datePickerExample">
                <input type="text" class="form-control" name="tgl_perpus" required autocomplete="off">
                <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="ket_perpus" class="form-label">Keterangan</label>
              <input id="ket_perpus" class="form-control" name="ket_perpus" type="text">
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="thumbnail_perpus" class="form-label">Cover</label>
              <input type="file" name="thumbnail_perpus" id="myDropify" accept="image/*"/>
              <small style="font-style: italic;" class="text-danger">*Harap masukkan foto dengan format 16:9 (landscape)</small>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="dok_perpus" class="form-label">Upload PDF</label>
              <input type="file" name="dok_perpus" class="form-control" id="dok_perpus" accept="application/pdf"/>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <div class="form-check">
                <label class="form-check-label" for="termsCheck">
                  Saya menyetujui bahwa file yang diupload adalah benar dan tidak dapat dirubah
                </label>
                <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
              </div>
            </div>
          </div>
          <a href="<?= base_url("admin/perpus") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>