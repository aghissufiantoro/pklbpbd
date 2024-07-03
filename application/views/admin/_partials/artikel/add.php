<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data artikel atau kegiatan telah ditambahkan.
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
<?php
  switch ($this->session->userdata('role'))
  {
    case '1':
      $kel = "Kecamatan Bulak";
      break;

    case '15':
    $kel = "Kelurahan Bulak";
      break;

    case '16':
    $kel = "Kelurahan Kedung Cowek";
      break;

    case '17':
    $kel = "Kelurahan Kenjeran";
      break;

    case '18':
    $kel = "Kelurahan Sukolilo Baru";
      break;

    case '21':
    $kel = "Kelurahan Bulak";
      break;

    case '22':
    $kel = "Kelurahan Kedung Cowek";
      break;

    case '23':
    $kel = "Kelurahan Kenjeran";
      break;

    case '24':
    $kel = "Kelurahan Sukolilo Baru";
      break;
    
    default:
    $kel = "ERROR";
      break;
  }
?>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Artikel</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="penulis_artikel" value="<?= $kel ?>">
          <div class="mb-3">
            <label for="judul_artikel" class="form-label">Judul Artikel</label>
            <input id="judul_artikel" class="form-control" name="judul_artikel" type="text">
          </div>
          <div class="mb-3">
            <label for="tanggal_artikel" class="form-label">Tanggal Artikel</label>
            <div class="input-group date datepicker" id="datePickerExample">
              <input type="text" class="form-control" name="tgl_artikel" required autocomplete="off">
              <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <label for="jenis_artikel" class="form-label">Jenis Artikel</label>
            <div class="input-group">
	            <select id="artikel_dropdown" class="form-select" name="jns_artikel" >
		            <option value="Berita">Berita</option>
		            <option value="Tanggap Darurat">Tanggap Darurat</option>
		            <option value="Sosialisasi">Sosialisasi</option>
	            </select>
            </div>
          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Sampul</label>
            <input type="file" class="form-control" required name="foto_artikel" accept="image/*"/>
            <!-- <input type="file" name="foto_artikel" id="myDropify" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="foto_artikel1" class="form-label">Foto Artikel pertama</label>
            <input type="file" class="form-control" required name="foto_artikel1" accept="image/*"/>
            <!-- <input type="file" class="form-control" name="foto_artikel1" id="myDropify1" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="foto_artikel2" class="form-label">Foto Artikel kedua</label>
            <input type="file" class="form-control" required name="foto_artikel2" accept="image/*"/>
            <!-- <input type="file" class="form-control" name="foto_artikel2" id="myDropify2" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="isi_artikel" class="form-label">Isi Artikel</label>
            <textarea class="form-control" name="isi_artikel" id="tinymceExample" rows="10" required></textarea>
          </div>
          <!-- <div class="mb-3">
            <div class="form-check">
              <label class="form-check-label" for="termsCheck">
                Agree to <a href="#"> terms and conditions </a>
              </label>
              <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
            </div>
          </div> -->
          <a href="<?= base_url('admin/artikel') ?>">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>