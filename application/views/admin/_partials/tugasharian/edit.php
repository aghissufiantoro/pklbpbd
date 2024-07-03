<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <script>
    setTimeout(function() {
      toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 7000
      };
      toastr.success('Alhamdulillah, Data laporan berhasil di-RUBAH', 'SUCCESS!');

    }, 1000);
  </script>
<?php 
  }
?>

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2><i class="fad fa-edit"></i> Edit Data Laporan Tugas Harian</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= site_url('admin/overview') ?>">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Edit data laporan tugas harian</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">

  </div>
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

            <input type="hidden" name="id_tugas_harian" value="<?= $tugasharian->id_tugas_harian ?>">

            <div class="form-group">
              <label>Tanggal Jadwal<span class="text-danger">*</span></label>
              <input type="text" value="<?= $tugasharian->tgl_tugas_harian ?>" class="form-control" style="width: 32%;" maxlength="16" id="datetimepicker1" required name="tgl_tugas_harian" autocomplete="off" placeholder="Masukkan tanggal tugas">
            </div>

            <div class="form-group">
              <label>Jam Kegiatan<span class="text-danger">*</span></label>
              <input type="text" value="<?= $tugasharian->jam_tugas_harian ?>" class="form-control" style="width: 32%;" id="jam" required name="jam_tugas_harian" autocomplete="off" placeholder="Masukkan jam kegiatan">
            </div>

            <div class="form-group">
              <label>Uraian / Nama Kegiatan<span class="text-danger">*</span></label>
              <textarea class="form-control" required id="hurufbesar" onkeyup="hurufBesar();" name="perihal_tugas_harian" autocomplete="off" placeholder="Masukkan nama perihal / kegiatan"><?= $tugasharian->perihal_tugas_harian ?></textarea>
            </div>

            <div class="form-group">
              <label>Tempat Kegiatan<span class="text-danger">*</span></label>
              <textarea class="form-control" required id="hurufbesar2" onkeyup="hurufBesar2();" name="tempat_tugas_harian" autocomplete="off" placeholder="Masukkan tempat tugas harian"><?= $tugasharian->tempat_tugas_harian ?></textarea>
            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">
              <label>Penanggung jawab<span class="text-danger">*</span></label>
              <textarea class="form-control" required id="hurufbesar3" onkeyup="hurufBesar3();"name="disposisi_tugas_harian" autocomplete="off" placeholder="Masukkan penanggung jawab"><?= $tugasharian->disposisi_tugas_harian ?></textarea>
            </div>

            <div class="form-group">
              <label>Keterangan</label>
              <textarea class="form-control" id="hurufbesar4" onkeyup="hurufBesar4();" name="ket_tugas_harian" autocomplete="off" placeholder="Masukkan keterangan"><?= $tugasharian->ket_tugas_harian ?></textarea>
              <small>*Tidak perlu di isi jika tidak perlu</small>
            </div>

          </div>

        </div>
      </div>
      <div class="ibox-footer">
        <div class="row">
          <div class="col-lg-6">
            <a href="<?= site_url('admin/tugasharian') ?>">
              <button type="button" class="btn btn-warning btn-lg"><i class="fa fa-reply"></i> Kembali</button>
            </a>
          </div>
          <div class="col-lg-6" style="text-align: right;">
            <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="far fa-save"></i> Rubah Laporan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>