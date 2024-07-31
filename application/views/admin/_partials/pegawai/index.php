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
          <a href="<?= base_url("admin/pegawai/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data Pejabat BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi pejabat yang ada di BPBD Kota Surabaya</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="50px">Foto</th>
                <th width="40px">Jabatan</th>
                <th width="30px">Profil</th>
                <th width="20px">Tempat tanggal lahir</th>
                <th width="20px">Pangkat, Golongan dan Eselon</th>
                <th width="20px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                
                $db_pegawai = $this->db->query("SELECT * FROM data_pegawai pgw
                                                INNER JOIN jabatan_pegawai jbt ON pgw.jabatan_pegawai = jbt.id_jabatan_pegawai
                                                ORDER BY no_urut_jabatan_pegawai ASC")->result();
                foreach ($db_pegawai as $res_pegawai)
                {
                  switch ($res_pegawai->jk_pegawai)
                  {
                    case 'Laki-laki':
                      $gender = "<i class='far fa-mars'></i>";
                      break;

                    case 'Perempuan':
                      $gender = "<i class='far fa-venus'></i>";
                      break;
                    
                    default:
                      $gender = "<i class='far fa-venus-mars'></i>";
                      break;
                  }
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td>
                      <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                        <li
                          data-bs-toggle="tooltip"
                          data-popup="tooltip-custom"
                          data-bs-placement="top"
                          class="avatar avatar-xs pull-up"
                          title="<?= $res_pegawai->nama_pegawai ?>"
                        >
                        <a href="<?= base_url('upload/pegawai/'.$res_pegawai->foto_pegawai) ?>" target="_blank">
                          <img src="<?= base_url('upload/pegawai/'.$res_pegawai->foto_pegawai) ?>" 
                              alt="<?= $res_pegawai->nama_pegawai ?>" 
                              style="width: 100px; height: auto; border-radius: 0; display: block; margin: 0 auto;" />
                        </a>
                        </li>
                      </ul>
                    </td>
                    <td><?= $res_pegawai->nama_jabatan_pegawai ?></td>
                    <td>
                      <i class='fal fa-id-card'></i> <?= $res_pegawai->ni_pegawai ?><br>
                      <i class='fal fa-user'></i> <?= $res_pegawai->nama_pegawai ?><br>
                      <?= $gender." ".$res_pegawai->jk_pegawai ?><br>
                    </td>
                    <td><?= $res_pegawai->tmp_lahir_pegawai.", ".indonesian_date($res_pegawai->tgl_lahir_pegawai, 'd F Y') ?> <br> Usia : <?= usia($res_pegawai->tgl_lahir_pegawai) ?><sup>th</sup> </td>
                    <td>
                      <table cellpadding="3" cellspacing="0" border="0">
                        <tr>
                          <td>Pangkat</td>
                          <td>:</td>
                          <td><?= $res_pegawai->pangkat_pegawai ?></td>
                        </tr>
                        <tr>
                          <td>Golongan</td>
                          <td>:</td>
                          <td><?= $res_pegawai->golongan_pegawai ?></td>
                        </tr>
                        <tr>
                          <td>Eselon</td>
                          <td>:</td>
                          <td><?= $res_pegawai->eselon_pegawai ?></td>
                        </tr>
                      </table>
                    </td>
                    <td>
                      <a href="<?= site_url('admin/pegawai/edit/'.$res_pegawai->id_pegawai) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_pegawai->id_pegawai ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_pegawai->id_pegawai ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data pejabat atas nama <?= $res_pegawai->nama_pegawai ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/pegawai/delete/'.$res_pegawai->id_pegawai) ?>" class="btn btn-outline-danger">
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