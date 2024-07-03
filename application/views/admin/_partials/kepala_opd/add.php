<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data pegawai BPBD Kota Surabaya telah ditambahkan.
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
        <h4 class="card-title">Tambah Data Pegawai BPBD Kota Surabaya</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="jabatan_kontak_opd" class="form-label">Jabatan</label>
            <input id="jabatan_kontak_opd" class="form-control" name="jabatan_kontak_opd" type="text">
          </div>
          <div class="mb-3">
            <label for="nama_kontak_opd" class="form-label">Nama</label>
            <input id="nama_kontak_opd" class="form-control" name="nama_kontak_opd" type="text">
          </div>
          <div class="mb-3">
            <label for="telp_kontak_opd" class="form-label">No. Telp</label>
            <input id="telp_kontak_opd" class="form-control" name="telp_kontak_opd" type="text">
          </div>
          <a href="<?= base_url("admin/kepala_opd") ?>">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>