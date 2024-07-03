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
          <a href="<?= base_url("admin/artikel/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Artikel</h6>
        <p class="text-muted mb-3">Data berisi artikel, kegiatan, berita dan media</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="50px">Judul Artikel</th>
                <th width="40px">Tanggal</th>
                <th width="30px">Jenis Artikel</th>
                <th width="20px"></th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                switch ($this->session->userdata('role'))
                {
                  case '1':
                    $query = "SELECT * FROM artikel";
                    break;

                  case '13':
                    $query = "SELECT * FROM artikel";
                    break;
                    
                  case '15':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Bulak'";
                    break;
                    
                  case '16':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Kedung Cowek'";
                    break;
                    
                  case '17':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Kenjeran'";
                    break;
                    
                  case '18':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Sukolilo Baru'";
                    break;
                    
                  case '21':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Bulak'";
                    break;
                    
                  case '22':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Kedung Cowek'";
                    break;
                    
                  case '23':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Kenjeran'";
                    break;
                    
                  case '24':
                    $query = "SELECT * FROM artikel WHERE penulis_artikel = 'Kelurahan Sukolilo Baru'";
                    break;
                  
                  default:
                    $query = "SELECT * FROM artikel";
                    break;
                }
                $db_art = $this->db->query($query)->result();
                foreach ($db_art as $res_art)
                {
                  ?>
                  <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $res_art->judul_artikel ?></td>
                  <td><?= date('d-m-Y', strtotime($res_art->tgl_artikel)) ?></td>
                  <td><?= $res_art->jenis_artikel ?></td>
                    <td>
                      <a href="<?= site_url('admin/artikel/edit/'.$res_art->id_artikel) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_art->id_artikel ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_art->id_artikel ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data kegiatan di hari <?= indonesian_date($res_art->date_created, 'l, d F Y') ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/artikel/delete/'.$res_art->id_artikel) ?>" class="btn btn-outline-danger">
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