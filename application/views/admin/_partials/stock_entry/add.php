<?php if ($this->session->flashdata('success')) : ?>
  <div class="alert alert-success">
    <?= $this->session->flashdata('success') ?>
  </div>
<?php endif; ?>


<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data logistik</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" >
        <!-- baris 1 -->
        <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tanggal_entry" id="tanggal_entry" required autocomplete="off">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="mb-3">
              <label for="kejadian" class="form-label">Kategori Kejadian</label>
                <select class="form-select" id="kejadian" name="kejadian" required>
                <option value="">--- Pilih Kategori ---</option>
                <?php
                  $query = $this->db->query('SELECT kejadian FROM data_kejadian group by kejadian')->result();
                  foreach ($query as $hasil) {
                  ?>
                    <option value="<?= $hasil->kejadian ?>"><?=$hasil->kejadian ?></option>
                  <?php
                  }
                  ?>
                </select>
                </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
              <label for="id_kejadian" class="form-label">ID Kejadian</label>
                <select class="form-select" id="id_kejadian" name="id_kejadian" required>
                <option value="">--- Pilih ID Kejadian ---</option>
                <?php
                  $ql = $this->db->query('SELECT id_kejadian, kejadian, alamat_kejadian FROM data_kejadian GROUP BY id_kejadian')->result();
                  foreach ($ql as $qz) {
                  ?>
                    <option value="<?= $qz->id_kejadian ?>"><?= $qz->id_kejadian."-".$qz->kejadian."-".$qz->alamat_kejadian ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
          </div>
          
        </div>

        <!-- baris kedua -->
          <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                  <label for="lokasi_diterima" class="form-label">Lokasi Diterima</label>
                  <input id="lokasi_diterima" class="form-control" name="lokasi_diterima" type="text" required>
                </div>

            </div>
            <div class="col-md-3">
                <div class="mb-3">
                  <label for="penerima_barang" class="form-label">Penerima Barang</label>
                  <input id="penerima_barang" class="form-control" name="penerima_barang" type="text" required>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <div class="mb-3">
              <label for="kecamatan">Kecamatan</label>
                <select class="form-control <?= form_error('kecamatan') ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" required>
                <option value="">--- Pilih Kecamatan ---</option>
                  <?php foreach ($kecamatan_options as $kecamatan): ?>
                      <option value="<?= $kecamatan->kecamatan ?>"><?= $kecamatan->kecamatan ?></option>
                  <?php endforeach; ?>
                 </select>
                 <div class="invalid-feedback">
                <?= form_error('kecamatan') ?>
                </div>
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="mb-3 ">
                <label for="kelurahan">Desa</label>
                    <select class="form-control <?= form_error('kelurahan') ? 'is-invalid' : '' ?>" id="kelurahan" name="kelurahan" required>
                        <option value="">--- Pilih Desa ---</option>
                        <?php foreach ($kelurahan_options as $kelurahan): ?>
                      <option value="<?= $kelurahan->kelurahan ?>"><?= $kelurahan->kelurahan ?></option>
                  <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= form_error('kelurahan') ?>
                    </div>
              </div>
            </div>
            
          </div>

          <!-- Baris 3 -->
          <div class="row pt-3">
            <div class="col-md-4">
              <div class="mb-3">
              <label for="kode_barang" class="form-label">Nama Barang</label>
              <select class="form-select" id="kode_barang" name="kode_barang" required>
                  <option value="">--- Pilih Nama Barang ---</option>
                  <?php foreach ($barang_options as $barang): ?>
                      <option value="<?= $barang->kode_barang ?>"><?= $barang->nama_barang ?></option>
                  <?php endforeach; ?>
              </select>
              </div>
            </div>

           
            <div class="col-md-4">
              <div class="mb-3">
                
                <input type="hidden"  id="status_barang" name="status_barang" data-width="100%" required value="keluar">
              </div>
            </div>

            <div class="col-md-2">
              <div class="mb-3">
                <label for="qty_barang" class="form-label">Quantity Barang</label>
                <div class="input-group">
                  <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                  <input id="qty_barang" class="form-control" name="qty_barang" type="text" value="1" required>
                  <button class="btn btn-outline-secondary" type="button" id="tambahBtn">+</button>
                </div>
              </div>
              <div class="mb-3">
              <i id='available-stock'></i>
              </div>
            </div>

          </div>  

        <div class="row">
          <div class="col-md-8">
            <div class="mb-3">
              <label for="keterangan_barang" class="form-label">Keterangan Barang</label>
              <input id="keterangan_barang" class="form-control" name="keterangan_barang" type="text" required>
            </div>
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <div class="mb-3 me-2">
              <input id="btnTambahBarang" class="btn btn-success" type="button" value="     Add     ">
            </div>
            <div class="mb-3">
<<<<<<< HEAD
              <input oncLick="clearAll();" class="btn btn-danger" type="button" value="    clear    ">
=======
              <input id="btnTambahBarang" class="btn btn-success" type="button" value="              Add              ">
              <input oncLick="clearAll();" class="btn btn-success" type="button" value="             clear             ">

>>>>>>> b35d9fa0aab760b578ebf4b4d05630b57406e327
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Barang</h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Status Barang</th>
                                    <th>Quantity Barang</th>
                                    <th>Keterangan Barang</th>
                                </tr>
                            </thead>
                            <tbody id="tabelBarangSementara">
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <p id="flash"></p>
          <a href="<?= base_url("admin/stock_entry") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input id="btnSubmit" class="btn btn-primary" type="button" value="Submit">
        </form>


      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>/assets_admin/js/constant.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/tambahKurangBtn.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/fetchAvailableStock.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/addDataInTemporaryArray.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/handleSubmitStockEntry.js"></script>

<!-- jquery script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url() ?>/assets_admin/js/stockEntryJs/fetchDataKecamatanDesa.js"></script>
