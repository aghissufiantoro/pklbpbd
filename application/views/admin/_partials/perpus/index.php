<!-- <nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Tables</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data Table</li>
	</ol>
</nav> -->

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-title">
        <div style="margin: 20px;">
          <a href="<?= base_url("admin/perpus/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data Perpustakaan BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi data data yang ada di BPBD Kota Surabaya</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="50px">Judul</th>
                <th width="40px">Jenis</th>
                <th width="30px">Tanggal</th>
                <th width="20px">Keterangan</th>
                <th width="20px">Dokumen PDF</th>
                <th width="20px">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $db_perpus = $this->db->query("SELECT * FROM perpus ORDER BY date_created DESC")->result();
                foreach ($db_perpus as $res_perpus)
                {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $res_perpus->judul_perpus ?></td>
                    <td><?= $res_perpus->jenis_perpus ?></td>
                    <td><?= $res_perpus->tgl_perpus ?></td>
                    <td><?= $res_perpus->ket_perpus ?></td>
                    <td>
                      <button type="button" class="btn btn-outline-danger" data-bs-target="#view_pdf-<?= $res_perpus->id_perpus ?>" data-bs-toggle="modal">
                        <i class="far fa-file-pdf"></i> Lihat PDF
                      </button>
                    </td>
                    <td>
                      <a href="<?= site_url('admin/perpus/edit/'.$res_perpus->id_perpus) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_perpus->id_perpus ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_perpus->id_perpus ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data perpus yang berjudul <?= $res_perpus->judul_perpus ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/perpus/delete/'.$res_perpus->id_perpus) ?>" class="btn btn-outline-danger">
                                <i class="fad fa-trash-alt"></i>
                              </a>
                              <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="view_pdf-<?= $res_perpus->id_perpus ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $res_perpus->judul_perpus ?></h5>
                          <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <div class="graph-outline">
                            <object style="width: 100%; height: 500px;" data="<?= base_url('upload/perpus/'.$res_perpus->dok_perpus) ?>" type="application/pdf">
                              <embed src="<?= base_url('upload/perpus/'.$res_perpus->dok_perpus) ?>?" type="application/pdf">
                            </object>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
                        </div>
                      </div>
                    </div>
                  </div>
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
