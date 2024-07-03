<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data user telah ditambahkan.
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
        <h4 class="card-title">Tambah Data User</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input id="username" class="form-control" name="username" type="text">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-control" name="password" type="password">
          </div>
          <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-control">
              <option value="">--- Silahkan pilih role ---</option>
                <?php
                  $pp1 = $this->db->query("SELECT * FROM role_login")->result();
                  foreach ($pp1 as $key1)
                  {
                    ?>
                    <option value="<?= $key1->id_role ?>"><?= $key1->nama_role ?></option>
                    <?php
                  }
                ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="id_group" class="form-label">Status</label>
            <select name="id_group" id="id_group" class="form-control">
              <option value="">--- Silahkan Pilih Status ---</option>
                <?php
                  $pp = $this->db->query("SELECT * FROM tb_group")->result();
                  foreach ($pp as $key)
                  {
                    ?>
                    <option value="<?= $key->id_group ?>"><?= $key->nama_group ?></option>
                    <?php
                  }
                ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-Mail</label>
            <input id="email" class="form-control" name="email" type="text">
          </div>
          <div class="mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input id="nama_depan" class="form-control" name="nama_depan" type="text">
          </div>
          <div class="mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input id="nama_belakang" class="form-control" name="nama_belakang" type="text">
          </div>
          <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input id="no_telp" class="form-control" name="no_telp" type="text">
          </div>
          <a href="<?= base_url("admin/user") ?>">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>