<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data Kompi telah ditambahkan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
  }
?>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kompi</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input id="nama_petugas" class="form-control" name="nama_petugas" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="L" value="L">
                    <label class="form-check-label" for="L">
                      L
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="P" value="P">
                    <label class="form-check-label" for="P">
                      P
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="kedudukan">Kedudukan</label>
                <select class="form-select" id="kedudukan" name="kedudukan" data-width="100%">
                  <option value="">--- Pilih Pangkat ---</option>
                  <option value="None">None</option>
                  <option value="Driver">Driver</option>
                  <option value="Anggota Regu">Anggota Regu</option>
                  <option value="Runner Logistik">Runner Logistik</option>
                  <option value="Danru A1">Danru A1</option>
                  <option value="Wadanru A1">Wadanru A1</option>
                  <option value="Danru A2">Danru A2</option>
                  <option value="Wadanru A2">Wadanru A2</option>
                  <option value="Danru A3">Danru A3</option>
                  <option value="Wadanru A3">Wadanru A3</option>
                  <option value="Danru A4 Srikandi">Danru A4 Srikandi</option>
                  <option value="Wadanru A4 Srikandi">Wadanru A4 Srikandi</option>
                  <option value="Danru A5 Petir">Danru A5 Petir</option>
                  <option value="Wadanru A5 Petir">Wadanru A5 Petir</option>
                  <option value="Danru A6 Panawa">Danru A6 Panawa</option>
                  <option value="Wadanru A6 Panawa">Wadanru A6 Panawa</option>
                  <option value="Danru B1">Danru B1</option>
                  <option value="Wadanru B1">Wadanru B1</option>
                  <option value="Danru B2">Danru B2</option>
                  <option value="Wadanru B2">Wadanru B2</option>
                  <option value="Danru B3">Danru B3</option>
                  <option value="Wadanru B3">Wadanru B3</option>
                  <option value="Danru B4 Srikandi">Danru B4 Srikandi</option>
                  <option value="Wadanru B4 Srikandi">Wadanru B4 Srikandi</option>
                  <option value="Danru B5 Petir">Danru Petir</option>
                  <option value="Wadanru B5 Petir">Wadanru Petir</option>
                  <option value="Danru B6 Panawa">Danru Panawa</option>
                  <option value="Wadanru B6 Panawa">Wadanru Petir</option>
                  <option value="Danru C1">Danru C1</option>
                  <option value="Wadanru C1">Wadanru C1</option>
                  <option value="Danru C2">Danru C2</option>
                  <option value="Wadanru C2">Wadanru C2</option>
                  <option value="Danru C3">Danru C3</option>
                  <option value="Wadanru C3">Wadanru C3</option>
                  <option value="Danru C4 Srikandi">Danru C4 Srikandi</option>
                  <option value="Wadanru C4 Srikandi">Wadanru C4 Srikandi</option>
                  <option value="Danru C5 Petir">Danru C5 Petir</option>
                  <option value="Wadanru C5 Petir">Wadanru C5 Petir</option>
                  <option value="Danru C6 Pawana">Danru C6 Pawana</option>
                  <option value="Wadanru C6 Pawana">Wadanru C6 Pawana</option>
                  <option value="Manggalapati">Manggalapati</option>
                  <option value="Wakil Manggalapati">Wakil Manggalapati</option>
                  <option value="Danki A">Danki A</option>
                  <option value="Wadanki A">Wadanki A</option>
                  <option value="Danki B">Danki B</option>
                  <option value="Wadanki B">Wadanki B</option>
                  <option value="Danki C">Danki C</option>
                  <option value="Wadanki C">Wadanki C</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <label class="form-label" for="regu">Regu</label>
                <select class="form-select" id="regu" name="regu" data-width="100%">
                  <option value="">--- Pilih Regu ---</option>
                  <option value="None">None</option>
                  <option value="A1">A1</option>
                  <option value="A2">A2</option>
                  <option value="A3">A3</option>
                  <option value="A4">A4</option>
                  <option value="A5">A5</option>
                  <option value="A6">A6</option>
                  <option value="B1">B1</option>
                  <option value="B2">B2</option>
                  <option value="B3">B3</option>
                  <option value="B4">B4</option>
                  <option value="B5">B5</option>
                  <option value="B6">B6</option>
                  <option value="C1">C1</option>
                  <option value="C2">C2</option>
                  <option value="C3">C3</option>
                  <option value="C4">C4</option>
                  <option value="C5">C5</option>
                  <option value="C6">C6</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="jenis_kompi">Jenis Kompi</label>
                <select class="form-select" id="jenis_kompi" name="jenis_kompi" data-width="100%">
                  <option value="">--- Pilih Jenis Kompi ---</option>
                  <option value="None">None</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                </select>
              </div>
            </div>
          </div>
          
          <a href="<?= base_url("admin/kompi") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>