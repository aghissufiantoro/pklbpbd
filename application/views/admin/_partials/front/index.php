<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-9 mr-5">
    <h2><i class="fad fa-newspaper"></i> Data Artikel</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= site_url('admin') ?>">Home</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Data Artikel</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2">
    <a href="<?= base_url('admin/front/add') ?>">
      <button type="button" style="margin-top: 30px;" class="btn btn-success"><i class="fal fa-user-plus"></i> Tambah data / Entry data</button>
    </a>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-title" style="padding-right: 15px;">
          <h3 style="text-align: center; text-transform: uppercase;">Data artikel asemrowo</h3>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">

          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Judul</th>
                  <th>Tanggal</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  $rsl = $this->db->query("SELECT * FROM artikel ORDER BY date_created DESC")->result();
                  foreach ($rsl as $tampil_front)
                  {
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $tampil_front->judul_artikel ?></td>
                      <td><?= indonesian_date($tampil_front->tgl_artikel, 'l, d F Y') ?></td>
                      <td style="text-align: center;">

                        <!-- EDIT -->
                        <a href="<?php echo site_url('admin/front/edit/'.$tampil_front->id_artikel) ?>">
                          <button class="btn btn-outline btn-success" type="button">
                            <i class="fad fa-user-edit"></i> Edit
                          </button>
                        </a>

                        <!-- HAPUS -->
                        <button class="btn btn-outline btn-danger" type="button" onclick="deleteConfirm('<?php echo site_url('admin/front/delete/'.$tampil_front->id_artikel) ?>')">
                          <i class="fad fa-trash-alt"></i> Hapus
                        </button>

                        <!-- INFO -->
                        <button class="btn btn-outline btn-info" type="button" data-toggle="modal" data-target="#modal_info<?= $tampil_front->id_artikel ?>">
                          <i class="fad fa-info"></i> Lihat Detail
                        </button>

                      </td>
                    </tr>
                    <?php
                  }
                ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL INFO -->
<?php
  foreach($front as $tampil_front):
?>
<div class="modal fade" id="modal_info<?= $tampil_front->id_artikel ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" role="document">
      <div class="modal-header">
        <h4 class="modal-title"><i class="fal fa-id-card"></i> Review</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img class="img-thumbnail rounded" style="margin: 0 auto; display: block; width: 300px; height: 400px;" src="<?= base_url('upload/kegiatan/'.$tampil_front->foto_artikel) ?>">
        <h4 style="text-align: center; font-weight: bold;">
          <?= $tampil_front->judul_artikel ?><br><small style="font-weight: normal;"><?= $tampil_front->moto_artikel ?></small>
        </h4>
        <div class="table-responsive">
          <table align="center" style="width: 100%;" class="table nowrap table-bordered table-striped table-hover">
            <tr>
              <td>Tanggal post</td>
              <td style="font-weight: bold;"><i class="far fa-calendar-alt"></i> <?= indonesian_date($tampil_front->tgl_artikel, 'l, d F Y') ?></td>
            </tr>
            <tr>
              <td>Motto</td><td><?= $tampil_front->moto_artikel ?></td>
            </tr>
            <tr>
              <td>Foto Kegiatan</td>
              <td>
                <img class="img-thumbnail rounded" style="margin: 0 auto; display: block; width: 300px; height: 400px;" src="<?= base_url('upload/kegiatan/'.$tampil_front->foto_artikel1) ?>">
              </td>
            </tr>
            <tr>
              <td>Isi Artikel</td><td><i class="fal fa-newspaper"></i> <?= $tampil_front->isi_artikel ?></td>
            </tr>
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

        <a style="text-align: center;" onclick="deleteConfirm('<?php echo site_url('admin/front/delete/'.$tampil_front->id_artikel) ?>')" href="#" class="btn btn-small btn-danger btn-icon-split">
          <span class="icon text-white-50">
            <i class="fal fa-trash-alt"></i>
          </span>
          <span class="text">Hapus Data</span>
        </a>

      </div>
    </div>
  </div>
</div>
<!-- END MODAL ADD -->
<?php
  endforeach;
?>
