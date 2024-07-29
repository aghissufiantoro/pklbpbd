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
          <a href="<?= base_url("admin/stock_entry/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data logistik BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi data logistik yang ada di BPBD Kota Surabaya</p>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="40px">ID Transaksi</th>
                <th width="40px">ID Kejadian</th>
                <th width="50px">Tanggal</th>
                <th width="90px">Nama Barang</th>
                <th width="30px">Status barang</th>
                <th width="20px">Quantity Barang</th>
                <th width="20px">Penerima Barang</th>
                <th width="40px">Lokasi Diterima</th>
                <th width="20px">Kelurahan</th>
                <th width="20px">Kecamatan</th>
                <th width="40px">Keterangan Barang</th>
                <th width="20px">#</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $db_data_entry_sembako = $this->db->query("SELECT des.*, dms.nama_barang 
                      FROM data_entry_sembako des
                      JOIN data_master_sembako dms ON des.kode_barang = dms.kode_barang
                      ORDER BY des.tanggal_entry ASC")->result();
                foreach (array_reverse($db_data_entry_sembako) as $res_data_entry_sembako)
                {
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $res_data_entry_sembako -> id_transaksi?></td>
                    <td><?= $res_data_entry_sembako -> id_kejadian ?></td>
                    <td><?= date('d-m-Y', strtotime($res_data_entry_sembako->tanggal_entry)) ?></td>
                    <td><?= $res_data_entry_sembako->nama_barang ?></td>
                    <td><?= $res_data_entry_sembako->status_barang ?></td>
                    <td><?= $res_data_entry_sembako->qty_barang ?></td>
                    <td><?= $res_data_entry_sembako->penerima_barang ?></td>
                    <td><?= $res_data_entry_sembako->lokasi_diterima ?></td>
                    <td><?= $res_data_entry_sembako->kelurahan ?></td>
                    <td><?= $res_data_entry_sembako->kecamatan ?></td>
                    <td><?= $res_data_entry_sembako->keterangan_barang ?></td>
                    <td>
                      <a href="<?= site_url('admin/stock_entry/edit/'.$res_data_entry_sembako->id_transaksi) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_data_entry_sembako->id_transaksi ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_data_entry_sembako->id_transaksi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data logistik yang berjudul <?= $res_data_entry_sembako->id_transaksi ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/stock_entry/delete/'.$res_data_entry_sembako->id_transaksi) ?>" class="btn btn-outline-danger">
                                <i class="fad fa-trash-alt"></i>
                              </a>
                              <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <div class="modal fade" id="view_pdf-<?= $res_data_entry_sembako->id_transaksi ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $res_data_entry_sembako->id_transaksi ?></h5>
                          <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <div class="graph-outline">
                            <object style="width: 100%; height: 500px;" data="<?= base_url('upload/stock_entry/'.$res_data_entry_sembako->dok_data_entry_sembako) ?>" type="application/pdf">
                              <embed src="<?= base_url('upload/stock_entry/'.$res_data_entry_sembako->dok_data_entry_sembako) ?>?" type="application/pdf">
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
