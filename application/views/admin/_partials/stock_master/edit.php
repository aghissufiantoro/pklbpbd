  <?php 
  
    if ($this->session->flashdata('success'))
    {
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>SUKSES!</strong> Data Barang telah dirubah.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
  <?php
    }
  ?>

  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Rubah Data Barang</h4>
          <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
          <form id="addForm" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="kode_barang" value="<?= $db_stock->kode_barang ?>">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input id="nama_barang" class="form-control" name="nama_barang" type="text" value="<?= $db_stock->nama_barang ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="kategori_barang" class="form-label">Kategori Barang</label>
                <input id="kategori_barang" class="form-control" name="kategori_barang" type="text" value="<?= $db_stock->kategori_barang ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <label for="unit_barang" class="form-label">Unit Barang</label>
                <input id="unit_barang" class="form-control" name="unit_barang" type="text" value="<?= $db_stock->unit_barang ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-3">
                <div class="form-check">
                  <label class="form-check-label" for="termsCheck">
                    Saya menyetujui bahwa file yang dirubah adalah benar
                  </label>
                  <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
                </div>
              </div>
            </div>
            <a href="<?= base_url("admin/stock_master") ?>">
              <input class="btn btn-warning" type="button" value="Kembali">
            </a>
            <input class="btn btn-primary" type="submit" value="Submit">
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="view_pdf-<?= $db_stock->kode_barang ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2"><?= $db_stock->judul_stock ?></h5>
          <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="graph-outline">
            <object style="width: 100%; height: 500px;" data="<?= base_url('upload/stock/'.$db_stock->dok_stock) ?>" type="application/pdf">
              <embed src="<?= base_url('upload/stock/'.$db_stock->dok_stock) ?>" type="application/pdf">
            </object>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="view_cover-<?= $db_stock->kode_barang ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Cover <?= $db_stock->judul_stock ?></h5>
          <button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img class="img-fluid" src="<?= base_url('upload/stock/'.$db_stock->thumbnail_stock) ?>">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  