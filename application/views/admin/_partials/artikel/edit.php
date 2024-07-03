<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data artikel atau kegiatan telah diubah.
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
        <h4 class="card-title">Edit Data Artikel</h4>
        <p class="text-muted mb-3">Mohon di edit dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_artikel" value="<?= $front->id_artikel ?>">
          <input type="hidden" name="foto_old" value="<?= $front->foto_artikel ?>">
          <input type="hidden" name="foto_old1" value="<?= $front->foto_artikel1 ?>">
          <input type="hidden" name="foto_old2" value="<?= $front->foto_artikel2 ?>">
          <input type="hidden" name="penulis_artikel" value="<?= $front->penulis_artikel ?>">
          <div class="mb-3">
            <label for="judul_artikel" class="form-label">Judul Artikel</label>
            <input id="judul_artikel" class="form-control" name="judul_artikel" type="text" value="<?= $front->judul_artikel ?>">
          </div>
          <div class="mb-3">
            <label for="tanggal_artikel" class="form-label">Tanggal Artikel</label>
            <div class="input-group date datepicker" id="datePickerExample">
              <input type="text" class="form-control" name="tgl_artikel" required value="<?= $front->tgl_artikel ?>">
              <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <label for="jenis_artikel" class="form-label">Jenis Artikel</label>
            <div class="input-group">
	            <select id="artikel_dropdown" class="form-select" name="jns_artikel">
		            <option value="Berita">Berita</option>
		            <option value="Tanggap Darurat">Tanggap Darurat</option>
		            <option value="Sosialisasi">Sosialisasi</option>
	            </select>
            </div>
          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Sampul</label>
            <input type="file" class="form-control" name="foto_artikel" accept="image/*"/>
            <!-- <input type="file" name="foto_artikel" id="myDropify" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="foto_artikel1" class="form-label">Foto Artikel pertama</label>
            <input type="file" class="form-control" name="foto_artikel1" accept="image/*"/>
            <!-- <input type="file" class="form-control" name="foto_artikel1" id="myDropify1" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="foto_artikel2" class="form-label">Foto Artikel kedua</label>
            <input type="file" class="form-control" name="foto_artikel2" accept="image/*"/>
            <!-- <input type="file" class="form-control" name="foto_artikel2" id="myDropify2" accept="image/*"/> -->
          </div>
          <div class="mb-3">
            <label for="isi_artikel" class="form-label">Isi Artikel</label>
            <textarea class="form-control" name="isi_artikel" id="tinymceExample" rows="10" required><?= $front->isi_artikel ?></textarea>
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
          <input class="btn btn-primary" type="submit" value="Edit">
        </form>
      </div>
    </div>
	</div>
</div>