<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data Kompi telah dirubah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
  }
?>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Rubah Data Kompi</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_petugas" value="<?= $kompi->id_petugas ?>">
          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input id="nama_petugas" class="form-control" name="nama_petugas" value="<?= $kompi->nama_petugas ?>" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="L" value="L" <?php if ($kompi->jenis_kelamin == "L") {echo "checked";} ?>>
                    <label class="form-check-label" for="L">
                      L
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jenis_kelamin" id="P" value="P" <?php if ($kompi->jenis_kelamin == "P") {echo "checked";} ?>>
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
                  <option value="">--- Pilih Kedudukan ---</option>
                  <option <?php if ($kompi->kedudukan == "None") {echo "selected";} ?> value="None">None</option>
                  <option <?php if ($kompi->kedudukan == "Driver") {echo "selected";} ?> value="Driver">Driver</option>
                  <option <?php if ($kompi->kedudukan == "Anggota Regu") {echo "selected";} ?> value="Anggota Regu">Anggota Regu</option>
                  <option <?php if ($kompi->kedudukan == "Runner Logistik") {echo "selected";} ?> value="Runner Logistik">Runner Logistik</option>
                  <option <?php if ($kompi->kedudukan == "Danru A1") {echo "selected";} ?> value="Danru A1">Danru A1</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A1") {echo "selected";} ?> value="Wadanru A1">Wadanru A1</option>
                  <option <?php if ($kompi->kedudukan == "Danru A2") {echo "selected";} ?> value="Danru A2">Danru A2</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A2") {echo "selected";} ?> value="Wadanru A2">Wadanru A2</option>
                  <option <?php if ($kompi->kedudukan == "Danru A3") {echo "selected";} ?> value="Danru A3">Danru A3</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A3") {echo "selected";} ?> value="Wadanru A3">Wadanru A3</option>
                  <option <?php if ($kompi->kedudukan == "Danru A4 Srikandi") {echo "selected";} ?> value="Danru A4 Srikandi">Danru A4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A4 Srikandi") {echo "selected";} ?> value="Wadanru A4 Srikandi">Wadanru A4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Danru A5 Petir") {echo "selected";} ?> value="Danru A5 Petir">Danru A5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A5 Petir") {echo "selected";} ?> value="Wadanru A5 Petir">Wadanru A5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Danru A6 Panawa") {echo "selected";} ?> value="Danru A6 Panawa">Danru A6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru A6 Panawa") {echo "selected";} ?> value="Wadanru A6 Panawa">Wadanru A6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Danru B1") {echo "selected";} ?> value="Danru B1">Danru B1</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B1") {echo "selected";} ?> value="Wadanru B1">Wadanru B1</option>
                  <option <?php if ($kompi->kedudukan == "Danru B2") {echo "selected";} ?> value="Danru B2">Danru B2</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B2") {echo "selected";} ?> value="Wadanru B2">Wadanru B2</option>
                  <option <?php if ($kompi->kedudukan == "Danru B3") {echo "selected";} ?> value="Danru B3">Danru B3</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B3") {echo "selected";} ?> value="Wadanru B3">Wadanru B3</option>
                  <option <?php if ($kompi->kedudukan == "Danru B4 Srikandi") {echo "selected";} ?> value="Danru B4 Srikandi">Danru B4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B4 Srikandi") {echo "selected";} ?> value="Wadanru B4 Srikandi">Wadanru B4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Danru B5 Petir") {echo "selected";} ?> value="Danru B5 Petir">Danru B5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B5 Petir") {echo "selected";} ?> value="Wadanru B5 Petir">Wadanru B5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Danru B6 Panawa") {echo "selected";} ?> value="Danru B6 Panawa">Danru B6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru B6 Panawa") {echo "selected";} ?> value="Wadanru B6 Panawa">Wadanru B6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Danru C1") {echo "selected";} ?> value="Danru C1">Danru C1</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C1") {echo "selected";} ?> value="Wadanru C1">Wadanru C1</option>
                  <option <?php if ($kompi->kedudukan == "Danru C2") {echo "selected";} ?> value="Danru C2">Danru C2</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C2") {echo "selected";} ?> value="Wadanru C2">Wadanru C2</option>
                  <option <?php if ($kompi->kedudukan == "Danru C3") {echo "selected";} ?> value="Danru C3">Danru C3</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C3") {echo "selected";} ?> value="Wadanru C3">Wadanru C3</option>
                  <option <?php if ($kompi->kedudukan == "Danru C4 Srikandi") {echo "selected";} ?> value="Danru C4 Srikandi">Danru C4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C4 Srikandi") {echo "selected";} ?> value="Wadanru C4 Srikandi">Wadanru C4 Srikandi</option>
                  <option <?php if ($kompi->kedudukan == "Danru C5 Petir") {echo "selected";} ?> value="Danru C5 Petir">Danru C5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C5 Petir") {echo "selected";} ?> value="Wadanru C5 Petir">Wadanru C5 Petir</option>
                  <option <?php if ($kompi->kedudukan == "Danru C6 Panawa") {echo "selected";} ?> value="Danru C6 Panawa">Danru C6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Wadanru C6 Panawa") {echo "selected";} ?> value="Wadanru C6 Panawa">Wadanru C6 Panawa</option>
                  <option <?php if ($kompi->kedudukan == "Manggalapati") {echo "selected";} ?> value="Manggalapati">Manggalapati</option>
                  <option <?php if ($kompi->kedudukan == "Wakil Manggalapati") {echo "selected";} ?> value="Wakil Manggalapati">Wakil Manggalapati</option>
                  <option <?php if ($kompi->kedudukan == "Danki A") {echo "selected";} ?> value="Danki A">Danki A</option>
                  <option <?php if ($kompi->kedudukan == "Wadanki A") {echo "selected";} ?> value="Wadanki A">Wadanki A</option>
                  <option <?php if ($kompi->kedudukan == "Danki B") {echo "selected";} ?> value="Danki B">Danki B</option>
                  <option <?php if ($kompi->kedudukan == "Wadanki B") {echo "selected";} ?> value="Wadanki B">Wadanki B</option>
                  <option <?php if ($kompi->kedudukan == "Danki C") {echo "selected";} ?> value="Danki C">Danki C</option>
                  <option <?php if ($kompi->kedudukan == "Wadanki C") {echo "selected";} ?> value="Wadanki C">Wadanki C</option>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="mb-3">
                <label class="form-label" for="regu">Regu Kompi</label>
                <select class="form-select" id="regu" name="regu" data-width="100%">
                  <option value="">--- Pilih Regu Kompi ---</option>
                  <option <?php if ($kompi->regu == "None") {echo "selected";} ?> value="None">None</option>
                  <option <?php if ($kompi->regu == "A1") {echo "selected";} ?> value="A1">A1</option>
                  <option <?php if ($kompi->regu == "A2") {echo "selected";} ?> value="A2">A2</option>
                  <option <?php if ($kompi->regu == "A3") {echo "selected";} ?> value="A3">A3</option>
                  <option <?php if ($kompi->regu == "A4") {echo "selected";} ?> value="A4">A4</option>
                  <option <?php if ($kompi->regu == "A5") {echo "selected";} ?> value="A5">A5</option>
                  <option <?php if ($kompi->regu == "A6") {echo "selected";} ?> value="A6">A6</option>
                  <option <?php if ($kompi->regu == "B1") {echo "selected";} ?> value="B1">B1</option>
                  <option <?php if ($kompi->regu == "B2") {echo "selected";} ?> value="B2">B2</option>
                  <option <?php if ($kompi->regu == "B3") {echo "selected";} ?> value="B3">B3</option>
                  <option <?php if ($kompi->regu == "B4") {echo "selected";} ?> value="B4">B4</option>
                  <option <?php if ($kompi->regu == "B5") {echo "selected";} ?> value="B5">B5</option>
                  <option <?php if ($kompi->regu == "B6") {echo "selected";} ?> value="B6">B6</option>
                  <option <?php if ($kompi->regu == "C1") {echo "selected";} ?> value="C1">C1</option>
                  <option <?php if ($kompi->regu == "C2") {echo "selected";} ?> value="C2">C2</option>
                  <option <?php if ($kompi->regu == "C3") {echo "selected";} ?> value="C3">C3</option>
                  <option <?php if ($kompi->regu == "C4") {echo "selected";} ?> value="C4">C4</option>
                  <option <?php if ($kompi->regu == "C5") {echo "selected";} ?> value="C5">C5</option>
                  <option <?php if ($kompi->regu == "C6") {echo "selected";} ?> value="C6">C6</option>
                </select>
              </div>
            </div>


            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="jenis_kompi">Jenis Kompi</label>
                <select class="form-select" id="jenis_kompi" name="jenis_kompi" data-width="100%">
                  <option value="">--- Pilih Jenis Kompi ---</option>
                  <option <?php if ($kompi->jenis_kompi == "None") {echo "selected";} ?> value="None">None</option>
                  <option <?php if ($kompi->jenis_kompi == "A") {echo "selected";} ?> value="A">A</option>
                  <option <?php if ($kompi->jenis_kompi == "B") {echo "selected";} ?> value="B">B</option>
                  <option <?php if ($kompi->jenis_kompi == "C") {echo "selected";} ?> value="C">C</option>
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