<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data perpustakaan telah dirubah.
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
        <h4 class="card-title">Rubah Data Perpustakaan</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_perpus" value="<?= $perpus->id_perpus ?>">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="judul_perpus" class="form-label">Nama Judul</label>
              <input id="judul_perpus" class="form-control" name="judul_perpus" type="text" value="<?= $perpus->judul_perpus ?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="jenis_perpus" class="form-label">Jenis</label>
              <select name="jenis_perpus" class="form-control" id="jenis_perpus">
                <option value="">--- Pilih Jenis ---</option>
                <option <?php if ($perpus->jenis_perpus == "Laporan Realisasi Anggaran"){echo "selected";} ?> value="Laporan Realisasi Anggaran">Laporan Realisasi Anggaran</option>
                <option <?php if ($perpus->jenis_perpus == "Laporan Operasional"){echo "selected";} ?> value="Laporan Operasional">Laporan Operasional</option>
                <option <?php if ($perpus->jenis_perpus == "Neraca"){echo "selected";} ?> value="Neraca">Neraca</option>
                <option <?php if ($perpus->jenis_perpus == "Data Aset dan Inventaris"){echo "selected";} ?> value="Data Aset dan Inventaris">Data Aset dan Inventaris</option>
                <option <?php if ($perpus->jenis_perpus == "Produk Hukum Kebencanaan"){echo "selected";} ?> value="Produk Hukum Kebencanaan">Produk Hukum Kebencanaan</option>
                <option <?php if ($perpus->jenis_perpus == "Dok. Penanggulangan Bencana"){echo "selected";} ?> value="Dok. Penanggulangan Bencana">Dok. Penanggulangan Bencana</option>
                <option <?php if ($perpus->jenis_perpus == "Edukasi Kebencanaan"){echo "selected";} ?> value="Edukasi Kebencanaan">Edukasi Kebencanaan</option>
              </select>
            </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="tgl_perpus" class="form-label">Tanggal Penerbitan</label>
              <div class="input-group date datepicker" id="datePickerExample">
                <input type="text" class="form-control" name="tgl_perpus" required autocomplete="off" value="<?= $perpus->tgl_perpus ?>">
                <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="ket_perpus" class="form-label">Keterangan</label>
              <input id="ket_perpus" class="form-control" name="ket_perpus" type="text" value="<?= $perpus->ket_perpus ?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="dok_perpus" class="form-label">File Cover</label>
              <button type="button" class="btn btn-outline-warning" data-bs-target="#view_cover-<?= $perpus->id_perpus ?>" data-bs-toggle="modal">
                <i class="far fa-file-image"></i> Lihat Cover
              </button>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="dok_perpus" class="form-label">File PDF</label>
              <button type="button" class="btn btn-outline-danger" data-bs-target="#view_pdf-<?= $perpus->id_perpus ?>" data-bs-toggle="modal">
                <i class="far fa-file-pdf"></i> Lihat PDF
              </button>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <div class="form-check">
                <label class="form-check-label" for="termsCheck">
                  Saya menyetujui bahwa file yang dirubah adalah benar
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
<div class="modal fade" id="view_pdf-<?= $perpus->id_perpus ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $perpus->judul_perpus ?></h5>
        <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="graph-outline">
          <object style="width: 100%; height: 500px;" data="<?= base_url('upload/perpus/'.$perpus->dok_perpus) ?>" type="application/pdf">
            <embed src="<?= base_url('upload/perpus/'.$perpus->dok_perpus) ?>" type="application/pdf">
          </object>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="view_cover-<?= $perpus->id_perpus ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Cover <?= $perpus->judul_perpus ?></h5>
        <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img class="img-fluid" src="<?= base_url('upload/perpus/'.$perpus->thumbnail_perpus) ?>">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>