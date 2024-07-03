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
          <a href="<?= base_url("admin/kepala_opd/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data para pegawai yang ada di BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi para pegawai di BPBD Surabaya</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="100px">Foto</th>
                <th width="50px">Jabatan</th>
                <th width="40px">Nama</th>
                <th width="30px">No. Telp</th>
                <th width="20px"> </th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $db_kontak_opd = $this->db->query("SELECT * FROM kontak_opd")->result();
                foreach ($db_kontak_opd as $res_kontak_opd)
                {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><i class="link-icon" data-feather="user"></i></td>
                    <td><?= $res_kontak_opd->jabatan_kontak_opd ?></td>
                    <td><?= $res_kontak_opd->nama_kontak_opd ?></td>
                    <td><?= $res_kontak_opd->telp_kontak_opd ?></td>
                    <td>
                      <a href="<?= site_url('admin/kepala_opd/edit/'.$this->secure->encrypt_url($res_kontak_opd->id_kontak_opd)) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_kontak_opd->id_kontak_opd ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_kontak_opd->id_kontak_opd ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data pegawai atas nama <?= $res_kontak_opd->nama_kontak_opd ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/kepala_opd/delete/'.$res_kontak_opd->id_kontak_opd) ?>" class="btn btn-outline-danger">
                                <i class="fad fa-trash-alt"></i>
                              </a>
                              <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
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