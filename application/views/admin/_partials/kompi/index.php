<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-title">
        <div style="margin: 20px;">
          <a href="<?= base_url("admin/kompi/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data Kompi BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi Petugas Kompi yang ada di BPBD Kota Surabaya</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="50px">Nama Petugas</th>
                <th width="40px">Jenis Kelamin</th>
                <th width="30px">Jenis Kompi</th>
                <th width="20px">Regu</th>
                <th width="20px">Kedudukan</th>
                <th width="20px">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $db_pegawai = $this->db->query("SELECT * FROM data_kompi")->result();
                foreach ($db_pegawai as $res_petugas)
                {
                  switch ($res_petugas->jenis_kelamin)
                  {
                    case 'L':
                      $gender = "<i class='far fa-mars'></i>";
                      break;

                    case 'P':
                      $gender = "<i class='far fa-venus'></i>";
                      break;
                    
                    default:
                      $gender = "<i class='far fa-venus-mars'></i>";
                      break;
                  }
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $res_petugas->nama_petugas ?></td>
                    <td><?= $res_petugas->jenis_kelamin ?></td>
                    <td><?= $res_petugas->jenis_kompi ?></td>
                    <td><?= $res_petugas->regu ?></td>
                    <td><?= $res_petugas->kedudukan ?></td>
                    <td>
                      <a href="<?= site_url('admin/kompi/edit/'.$res_petugas->id_petugas) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_petugas->id_petugas ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_petugas->id_petugas ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data pegawai atas nama <?= $res_petugas->nama_petugas ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/kompi/delete/'.$res_petugas->id_petugas) ?>" class="btn btn-outline-danger">
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