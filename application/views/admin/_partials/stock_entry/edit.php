<?php 

if ($this->session->flashdata('success')) {
?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUKSES!</strong> Data logistik telah dirubah.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
</div>
<?php
}
?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Rubah Data logistik</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_transaksi" value="<?= $data_entry_sembako->id_transaksi ?>">
          
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="id_kejadian" >ID Kejadian</label>
            <select  class="form-select" id="id_kejadian" name="id_kejadian" required>
            <?php
                  $ql = $this->db->query('SELECT id_kejadian, kejadian, alamat_kejadian FROM data_kejadian GROUP BY id_kejadian')->result();
                  foreach ($ql as $qz) {
                    if($qz-> id_kejadian == $data_entry_sembako->id_kejadian):
                  ?>

                    <option value="<?= $qz->id_kejadian ?>" selected><?= $qz->id_kejadian."-".$qz->kejadian."-".$qz->alamat_kejadian ?></option>
                 
                    <?php endif?>
                    <option value="<?= $qz->id_kejadian ?>" ><?= $qz->id_kejadian."-".$qz->kejadian."-".$qz->alamat_kejadian ?></option>
                
                  <?php
                  }
                  ?>
            </select>    
            
            </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal Entry</label>
                <input id="tanggal_entry" class="form-control" name="tanggal_entry" type="date" value="<?= date('Y-m-d') ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="kode_barang" class="form-label">Nama Barang</label>
                <select class="form-select" id="kode_barang" name="kode_barang" required>
                <?php
                $arrayBarang = $this->db->query('SELECT kode_barang, nama_barang FROM data_master_sembako GROUP BY kode_barang')->result();
                 foreach ($arrayBarang as $barang): 
                  if($data_entry_sembako->kode_barang == $barang->kode_barang):?>
                      <option value="<?= $barang->kode_barang ?>" selected><?= $barang->nama_barang ?></option>
                  <?php endif ?>
                  <option value="<?= $barang->kode_barang ?>"><?= $barang->nama_barang ?></option>
                  <?php endforeach; ?></div>
                  </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="status_barang">Status Barang</label>
                <input readonly class="form-select" id="status_barang" name="status_barang" data-width="100%" required value="keluar">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="qty_barang" class="form-label">Quantity Barang</label>
                <i id="available-stock"></i>
                <div class="input-group">
                  <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                  <input id="qty_barang" class="form-control" name="qty_barang" type="text" value="<?= $data_entry_sembako->qty_keluar ?>" required>
                  <button class="btn btn-outline-secondary" type="button" id="tambahBtn">+</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="lokasi_diterima" class="form-label">Lokasi Diterima</label>
                <input id="lokasi_diterima" class="form-control" name="lokasi_diterima" type="text" value="<?= $data_entry_sembako->lokasi_diterima ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="penerima_barang" class="form-label">Penerima Barang</label>
                <input id="penerima_barang" class="form-control" name="penerima_barang" type="text" value="<?= $data_entry_sembako->penerima_barang ?>" required>
              </div>
            </div>
          </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
            <select id="kecamatan" class="form-control" name="kecamatan"  required>
                <?php
                $arrayKecamatan = $this->db->query('SELECT kecamatan FROM wilayah_2022 GROUP BY kecamatan order by kecamatan asc')->result();
                 foreach ($arrayKecamatan as $kecamatan): 
                  if($data_entry_sembako->kecamatan == $kecamatan->kecamatan):?>
                      <option value="<?= $kecamatan->kecamatan ?>" selected><?= $kecamatan->kecamatan ?></option>
                  <?php endif ?>
                  <option value="<?= $kecamatan->kecamatan ?>"><?= $kecamatan->kecamatan ?></option>
                  <?php endforeach; ?></div>
                  </select>
              </div>
              <div class="col-md-3">
              <div class="mb-3">
              <label for="kelurahan" class="form-label">Kelurahan</label>
            <select id="kelurahan" class="form-control" name="kelurahan"  required>
                <?php
                $arrayKelurahan = $this->db->query('SELECT desa FROM wilayah_2022 GROUP BY desa order by desa asc')->result();
                 foreach ($arrayKelurahan as $kelurahan): 
                  if($data_entry_sembako->kelurahan == $kelurahan->desa):?>
                      <option value="<?= $kelurahan->desa ?>" selected><?= $kelurahan->desa ?></option>
                  <?php endif ?>
                  <option value="<?= $kelurahan->desa ?>"><?= $kelurahan->desa ?></option>
                  <?php endforeach; ?></div>
                  </select>
                
                </div>
            </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="mb-3">
              <label for="keterangan_barang" class="form-label">Keterangan Barang</label>
              <input id="keterangan_barang" class="form-control" name="keterangan_barang" type="text" value="<?= $data_entry_sembako->keterangan_barang ?>" required>
            </div>
          </div>

          <a href="<?= base_url("admin/stock_entry") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>



<script src="<?php echo base_url() ?>/assets_admin/js/constant.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/tambahKurangBtn.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/fetchAvailableStock.js"></script>

<!-- fungsi jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/fetchDataKecamatanDesa.js"></script>


