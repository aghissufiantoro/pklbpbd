<?php
if ($this->session->flashdata('success')) {
  ?>
  <script>
    setTimeout(function () {
      toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 7000
      };
      toastr.success('Alhamdulillah, Data laporan berhasil di-TAMBAH', 'SUCCESS!');

    }, 1000);
  </script>
  <?php
}
?>

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2><i class="fad fa-plus"></i> Tambah Data Laporan Tugas Harian</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= site_url('admin/overview') ?>">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Tambah data laporan tugas harian</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2"></div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="ibox">
      <div class="ibox-title">
        <h5>Laporan Tugas Harian di <small><?= SITE_NAME ?></small></h5>
        <div class="ibox-tools">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
        </div>
      </div>
      <div class="ibox-content">
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label>Tanggal Jadwal<span class="text-danger">*</span></label>
              <input type="date" class="form-control" id="datepicker" required name="tgl_tugas_harian"
                autocomplete="off" placeholder="Masukkan jadwal kegiatan">
            </div>

            <div class="form-group">
              <label>Jam Kegiatan<span class="text-danger">*</span></label>
              <input type="time" class="form-control" id="jam" required name="jam_tugas_harian" autocomplete="off"
                placeholder="Masukkan jam kegiatan">
            </div>

            <div class="form-group">
              <label>Uraian / Nama Kegiatan<span class="text-danger">*</span></label>
              <textarea class="form-control" required name="perihal_tugas_harian" autocomplete="off"
                placeholder="Masukkan nama perihal / kegiatan" id="hurufbesar" onkeyup="hurufBesar();"></textarea>
            </div>

            <div class="form-group">
              <label>Tempat Kegiatan<span class="text-danger">*</span></label>
              <textarea class="form-control" required name="tempat_tugas_harian" autocomplete="off"
                placeholder="Masukkan tempat tugas harian" id="hurufbesar2" onkeyup="hurufBesar2();"></textarea>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label>No. Surat Tugas<span class="text-danger">*</span></label>
              <textarea class="form-control" required name="no_surat_tugas_harian" autocomplete="off"
                placeholder="Masukkan nomor surat tugas harian" id="hurufbesar5" onkeyup="hurufBesar5();"></textarea>
            </div>

            <div class="form-group">
              <label>Penanggung Jawab<span class="text-danger">*</span></label>
              <textarea class="form-control" required name="tanggungjawab_tugas_harian" autocomplete="off"
                placeholder="Masukkan penanggung jawab" id="hurufbesar3" onkeyup="hurufBesar3();"></textarea>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" name="ket_tugas_harian" autocomplete="off"
                placeholder="Masukkan keterangan" id="hurufbesar4" onkeyup="hurufBesar4();"></textarea>
              <small>*Tidak perlu di isi jika tidak perlu</small>
            </div>



          </div>
        </div>
      </div>
      <div class="ibox-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="<?= site_url('admin/tugas_harian') ?>">
              <button type="button" class="btn btn-warning btn-lg"><i class="fa fa-reply"></i> Kembali</button>
            </a>
          </div>
          <div class="col-lg-6" style="text-align: right;">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i> Tambah
              Laporan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<style>
  .form-group {
    margin-bottom: 20px;
  }

  .form-control {
    width: 100%;
  }

  .ibox-title h5 {
    font-size: 16px;
  }

  .ibox-footer {
    padding-top: 20px;
  }

  .btn {
    padding: 10px 20px;
  }
</style>