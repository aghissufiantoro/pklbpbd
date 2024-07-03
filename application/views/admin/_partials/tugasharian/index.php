<style type="text/css">
  @media (min-width: 1200px) {
    .modal-xlg {
      width: 90%;
    }
  }
</style>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-9 mr-5">
    <h2 style="text-transform: uppercase;">
      <i class="fad fa-clipboard-list-check"></i>
      Laporan Tugas Harian
    </h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= site_url('admin') ?>">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>
          Laporan Tugas Harian
        </strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">
    <?php
    if ($this->session->userdata('username') == "admintugas") {
    ?>
      <a href="<?= base_url('admin/tugasharian/add') ?>">
        <button type="button" style="margin-top: 30px;" class="btn btn-success">
          <i class="fal fa-plus-circle"></i> Tambah data / Entry data
        </button>
      </a>
    <?php
    }
    ?>

  </div>
</div>
<br>
<div class="wrapper wrapper-content animated fadeInRight">
  <?php

  function formatAngka($angka)
  {
    $hasil = number_format($angka, 0, '.', '.');
    return $hasil;
  }
  ?>
  <div class="row">

    <div class="col-lg-12">
      <?php
      // SELECT * FROM tugas_harian WHERE tgl_tugas_harian = '2021-01-18' ORDER BY jam_tugas_harian ASC
      $qq = $this->db->query("SELECT * FROM tugas_harian WHERE date_created = CURDATE() ORDER BY jam_tugas_harian ASC")->result();
      $all = $this->db->query("SELECT * FROM tugas_harian ORDER BY date_created DESC")->result();
      ?>

      <div class="ibox">
        <div class="ibox-title" style="padding-right: 15px;">
          <h3 style="text-align: center; text-transform: uppercase;">
            Laporan by tanggal
          </h3>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <form action="<?php echo base_url() . 'admin/tugasharian/printbydate' ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Pilih Tanggal</label>
              <input type="text" name="tgl_tugas" class="form-control" id="datetimepicker1" required autocomplete="off" placeholder="Pilih tanggal">
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-danger btn-outline"><span class="far fa-file-pdf"></span> Convert to PDF</button>
            </div>
          </form>
        </div>
      </div>

      <div class="ibox">
        <div class="ibox-title" style="padding-right: 15px;">
          <h3 style="text-align: center; text-transform: uppercase;">
            Laporan Tugas Harian<br>
            di Kecamatan Asemrowo
          </h3>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-review">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>Jam / Pukul</th>
                  <th>Uraian</th>
                  <th>Tempat</th>
                  <th>Penanggung Jawab</th>
                  <th>Keterangan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                function limit_words($string, $word_limit)
                {
                  $words = explode(" ", $string);
                  return implode(" ", array_splice($words, 0, $word_limit));
                }

                foreach ($qq as $tampil_tugasharian) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= indonesian_date($tampil_tugasharian->tgl_tugas_harian, 'l, d F Y') ?></td>
                    <td><?= indonesian_date($tampil_tugasharian->jam_tugas_harian, 'H:i') ?> WIB</td>
                    <td><?= $tampil_tugasharian->perihal_tugas_harian ?></td>
                    <td><?= $tampil_tugasharian->tempat_tugas_harian ?></td>
                    <td><?= $tampil_tugasharian->disposisi_tugas_harian ?></td>
                    <td><?= $tampil_tugasharian->ket_tugas_harian ?></td>
                    <td style="text-align: center;">

                      <?php
                      if ($this->session->userdata('username') == "admintugas") {
                      ?>
                        <!-- EDIT -->
                        <a href="<?php echo site_url('admin/tugasharian/edit/' . $tampil_tugasharian->id_tugas_harian) ?>">
                          <button class="btn btn-outline btn-success" type="button">
                            <i class="fad fa-edit"></i> Ubah
                          </button>
                        </a>

                        <!-- HAPUS -->
                        <button class="btn btn-outline btn-danger" type="button" onclick="deleteConfirm('<?php echo site_url('admin/tugasharian/delete/' . $tampil_tugasharian->id_tugas_harian) ?>')">
                          <i class="fad fa-trash-alt"></i> Hapus
                        </button>
                      <?php
                      } else if ($this->session->userdata('username') == "admin") {
                      ?>
                        <!-- HAPUS -->
                        <button class="btn btn-outline btn-danger" type="button" onclick="deleteConfirm('<?php echo site_url('admin/tugasharian/delete/' . $tampil_tugasharian->id_tugas_harian) ?>')">
                          <i class="fad fa-trash-alt"></i> Hapus
                        </button>
                      <?php
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

        </div>
        <div class="ibox-footer">
          <button class="btn btn-outline btn-info" type="button" data-toggle="modal" data-target="#modal_info">
            <i class="fad fa-clipboard-list-check"></i> Rekap kegiatan
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INFO -->
<div class="modal fade" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 90%;">
    <div class="modal-content" role="document">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fal fa-location"></i>
          Rekap kegiatan
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-review">
            <thead>
              <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Jam / Pukul</th>
                <th>Uraian</th>
                <th>Tempat</th>
                <th>Penanggung Jawab</th>
                <th>Keterangan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;

              foreach ($all as $tampil_tugasharian) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= indonesian_date($tampil_tugasharian->tgl_tugas_harian, 'l, d F Y') ?></td>
                  <td><?= indonesian_date($tampil_tugasharian->jam_tugas_harian, 'H:i') ?> WIB</td>
                  <td><?= $tampil_tugasharian->perihal_tugas_harian ?></td>
                  <td><?= $tampil_tugasharian->tempat_tugas_harian ?></td>
                  <td><?= $tampil_tugasharian->disposisi_tugas_harian ?></td>
                  <td><?= $tampil_tugasharian->ket_tugas_harian ?></td>
                  <td style="text-align: center;">

                    <?php
                    if ($this->session->userdata('username') == "admin") {
                    ?>
                      <!-- HAPUS -->
                      <button class="btn btn-outline btn-danger" type="button" onclick="deleteConfirm('<?php echo site_url('admin/tugasharian/delete/' . $tampil_tugasharian->id_tugas_harian) ?>')">
                        <i class="fad fa-trash-alt"></i> Hapus
                      </button>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-warning btn-icon-split mr-auto" data-dismiss="modal">
          <span class="icon text-white-50">
            <i class="far fa-hand-point-left"></i>
          </span>
          <span class="text">Kembali</span>
        </button>

      </div>
    </div>
  </div>
</div>