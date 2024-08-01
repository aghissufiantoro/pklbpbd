<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Rubah Data Barang</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="<?= base_url('admin/stock_master/update_quantity') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="kode_barang" value="<?= $db_stock->kode_barang ?>">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <input id="nama_barang" class="form-control" name="nama_barang" type="text" value="<?= $db_stock->nama_barang ?>" readonly required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="kategori_barang" class="form-label">Kategori Barang</label>
              <input id="kategori_barang" class="form-control" name="kategori_barang" type="text" value="<?= $db_stock->kategori_barang ?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="satuan_barang" class="form-label">Satuan Barang</label>
                <input id="satuan_barang" class="form-control" name="satuan_barang" type="text" value="<?= $db_stock->satuan_barang ?>" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="qty_tersedia" class="form-label">Kuantitas Tersedia</label>
                <input id="qty_tersedia" class="form-control" name="qty_tersedia" type="text" value="<?= $db_stock->qty_tersedia ?>" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="mb-3">
              <label for="qty_tambahan" class="form-label">Tambah Kuantitas Barang</label>
              <div class="input-group">
                <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                <input id="qty_tambahan" class="form-control" name="qty_tambahan" type="text" value="0" required style="text-align: center;">
                <button class="btn btn-outline-secondary" type="button" id="tambahBtn">+</button>
              </div>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const tambahBtn = document.getElementById("tambahBtn");
    const kurangBtn = document.getElementById("kurangBtn");
    const jmlBrgInput = document.getElementById("qty_tambahan");

    tambahBtn.addEventListener("click", function() {
      incrementValue();
    });

    kurangBtn.addEventListener("click", function() {
      decrementValue();
    });

    function incrementValue() {
      let currentValue = parseInt(jmlBrgInput.value);
      if (!isNaN(currentValue)) {
        jmlBrgInput.value = currentValue + 1;
      } else {
        jmlBrgInput.value = 1;
      }
    }

    function decrementValue() {
      let currentValue = parseInt(jmlBrgInput.value);
      if (!isNaN(currentValue) && currentValue > 0) {
        jmlBrgInput.value = currentValue - 1;
      } else {
        jmlBrgInput.value = 0;
      }
    }

    // Memastikan input hanya menerima angka
    jmlBrgInput.addEventListener("input", function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  });
</script>