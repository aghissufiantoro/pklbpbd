<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data Pejabat telah dirubah.
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
        <h4 class="card-title">Rubah Data Pejabat</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_pegawai" value="<?= $pegawai->id_pegawai ?>">
          <input type="hidden" name="foto_old" value="<?= $pegawai->foto_pegawai ?>">
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="ni_pegawai" class="form-label">NIP / NIK</label>
                <input id="ni_pegawai" class="form-control" name="ni_pegawai" value="<?= $pegawai->ni_pegawai ?>" type="text">
              </div>
            </div>
            <div class="col-md-5">
              <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama</label>
                <input id="nama_pegawai" class="form-control" name="nama_pegawai" value="<?= $pegawai->nama_pegawai ?>" type="text">
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <label for="tmp_lahir_pegawai" class="form-label">Tempat Lahir</label>
                <input id="tmp_lahir_pegawai" class="form-control" name="tmp_lahir_pegawai" value="<?= $pegawai->tmp_lahir_pegawai ?>" type="text">
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <label for="tgl_lahir_pegawai" class="form-label">Tanggal Lahir</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tgl_lahir_pegawai" required value="<?= $pegawai->tgl_lahir_pegawai ?>">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="jk_pegawai" class="form-label">Jenis Kelamin</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jk_pegawai" id="Laki-laki" value="Laki-laki" <?php if ($pegawai->jk_pegawai == "Laki-laki") {echo "checked";} ?>>
                    <label class="form-check-label" for="Laki-laki">
                      Laki-laki
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="jk_pegawai" id="Perempuan" value="Perempuan" <?php if ($pegawai->jk_pegawai == "Perempuan") {echo "checked";} ?>>
                    <label class="form-check-label" for="Perempuan">
                      Perempuan
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="instansi_pegawai">Instansi</label>
                <input type="hidden" name="instansi_pegawai" value="BPBD Kota Surabaya">
                <input id="instansi_pegawai" class="form-control" type="text" disabled value="BPBD Kota Surabaya">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="pangkat_pegawai">Pangkat</label>
                <select class="form-select" id="pangkat_pegawai" name="pangkat_pegawai" data-width="100%">
                  <option value="">--- Pilih Pangkat ---</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "N-E") {echo "selected";} ?> value="N-E">N-E</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Juru Muda") {echo "selected";} ?> value="Juru Muda">Juru Muda</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Juru Muda Tingkat I") {echo "selected";} ?> value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Juru") {echo "selected";} ?> value="Juru">Juru</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Juru Tingkat I") {echo "selected";} ?> value="Juru Tingkat I">Juru Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pengatur Muda") {echo "selected";} ?> value="Pengatur Muda">Pengatur Muda</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pengatur Muda Tingkat I") {echo "selected";} ?> value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pengatur") {echo "selected";} ?> value="Pengatur">Pengatur</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pengatur Tingkat I") {echo "selected";} ?> value="Pengatur Tingkat I">Pengatur Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Penata") {echo "selected";} ?> value="Penata">Penata</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Penata Tingkat I") {echo "selected";} ?> value="Penata Tingkat I">Penata Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Penata Muda") {echo "selected";} ?> value="Penata Muda">Penata Muda</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Penata Muda Tingkat I") {echo "selected";} ?> value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pembina") {echo "selected";} ?> value="Pembina">Pembina</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pembina Tingkat I") {echo "selected";} ?> value="Pembina Tingkat I">Pembina Tingkat I</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pembina Muda") {echo "selected";} ?> value="Pembina Muda">Pembina Muda</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pembina Madya") {echo "selected";} ?> value="Pembina Madya">Pembina Madya</option>
                  <option <?php if ($pegawai->pangkat_pegawai == "Pembina Utama") {echo "selected";} ?> value="Pembina Utama">Pembina Utama</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <label class="form-label" for="golongan_pegawai">Golongan</label>
                <select class="form-select" id="golongan_pegawai" name="golongan_pegawai" data-width="100%">
                  <option value="">--- Pilih Golongan ---</option>
                  <option <?php if ($pegawai->golongan_pegawai == "N-E") {echo "selected";} ?> value="N-E">N-E</option>
                  <option <?php if ($pegawai->golongan_pegawai == "I/a") {echo "selected";} ?> value="I/a">I/a</option>
                  <option <?php if ($pegawai->golongan_pegawai == "I/b") {echo "selected";} ?> value="I/b">I/b</option>
                  <option <?php if ($pegawai->golongan_pegawai == "I/c") {echo "selected";} ?> value="I/c">I/c</option>
                  <option <?php if ($pegawai->golongan_pegawai == "I/d") {echo "selected";} ?> value="I/d">I/d</option>
                  <option <?php if ($pegawai->golongan_pegawai == "II/a") {echo "selected";} ?> value="II/a">II/a</option>
                  <option <?php if ($pegawai->golongan_pegawai == "II/b") {echo "selected";} ?> value="II/b">II/b</option>
                  <option <?php if ($pegawai->golongan_pegawai == "II/c") {echo "selected";} ?> value="II/c">II/c</option>
                  <option <?php if ($pegawai->golongan_pegawai == "II/d") {echo "selected";} ?> value="II/d">II/d</option>
                  <option <?php if ($pegawai->golongan_pegawai == "III/a") {echo "selected";} ?> value="III/a">III/a</option>
                  <option <?php if ($pegawai->golongan_pegawai == "III/b") {echo "selected";} ?> value="III/b">III/b</option>
                  <option <?php if ($pegawai->golongan_pegawai == "III/c") {echo "selected";} ?> value="III/c">III/c</option>
                  <option <?php if ($pegawai->golongan_pegawai == "III/d") {echo "selected";} ?> value="III/d">III/d</option>
                  <option <?php if ($pegawai->golongan_pegawai == "IV/a") {echo "selected";} ?> value="IV/a">IV/a</option>
                  <option <?php if ($pegawai->golongan_pegawai == "IV/b") {echo "selected";} ?> value="IV/b">IV/b</option>
                  <option <?php if ($pegawai->golongan_pegawai == "IV/c") {echo "selected";} ?> value="IV/c">IV/c</option>
                  <option <?php if ($pegawai->golongan_pegawai == "IV/d") {echo "selected";} ?> value="IV/d">IV/d</option>
                  <option <?php if ($pegawai->golongan_pegawai == "IV/e") {echo "selected";} ?> value="IV/e">IV/e</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="eselon_pegawai">Eselon</label>
                <select class="form-select" id="eselon_pegawai" name="eselon_pegawai" data-width="100%">
                  <option value="">--- Pilih Eselon ---</option>
                  <option <?php if ($pegawai->eselon_pegawai == "N-E") {echo "selected";} ?> value="N-E">N-E</option>
                  <option <?php if ($pegawai->eselon_pegawai == "I.a") {echo "selected";} ?> value="I.a">I.a</option>
                  <option <?php if ($pegawai->eselon_pegawai == "I.b") {echo "selected";} ?> value="I.b">I.b</option>
                  <option <?php if ($pegawai->eselon_pegawai == "II.a") {echo "selected";} ?> value="II.a">II.a</option>
                  <option <?php if ($pegawai->eselon_pegawai == "II.b") {echo "selected";} ?> value="II.b">II.b</option>
                  <option <?php if ($pegawai->eselon_pegawai == "III.a") {echo "selected";} ?> value="III.a">III.a</option>
                  <option <?php if ($pegawai->eselon_pegawai == "III.b") {echo "selected";} ?> value="III.b">III.b</option>
                  <option <?php if ($pegawai->eselon_pegawai == "IV.a") {echo "selected";} ?> value="IV.a">IV.a</option>
                  <option <?php if ($pegawai->eselon_pegawai == "IV.b") {echo "selected";} ?> value="IV.b">IV.b</option>
                  <option <?php if ($pegawai->eselon_pegawai == "V.a") {echo "selected";} ?> value="V.a">V.a</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="plt_pegawai" class="form-label">PLT</label>
                <div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="plt_pegawai" id="Iya" value="Iya" <?php if ($pegawai->plt_pegawai == "Iya") {echo"checked";} ?>>
                    <label class="form-check-label" for="Iya">
                      Iya
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="plt_pegawai" id="Tidak" value="Tidak" <?php if ($pegawai->plt_pegawai == "Tidak") {echo"checked";} ?>>
                    <label class="form-check-label" for="Tidak">
                      Tidak
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="mb-3">
                <label class="form-label" for="jabatan_pegawai">Jabatan</label>
                <select class="form-select" id="jabatan_pegawai" name="jabatan_pegawai" data-width="100%">
                  <option value="">--- Pilih Jabatan ---</option>
                  <?php
                    $db_jbt = $this->db->query("SELECT * FROM jabatan_pegawai ORDER BY no_urut_jabatan_pegawai ASC")->result();
                    foreach ($db_jbt as $res_jbt)
                    {
                      ?>
                      <option value="<?= $res_jbt->id_jabatan_pegawai ?>" <?php if ($pegawai->jabatan_pegawai == $res_jbt->id_jabatan_pegawai) {echo "selected";} ?>><?= $res_jbt->nama_jabatan_pegawai ?></option>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Diri</label>
            <input type="file" class="form-control" name="foto_pegawai" accept="image/*"/>
          </div>
          <a href="<?= base_url("admin/pegawai") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
	</div>
</div>