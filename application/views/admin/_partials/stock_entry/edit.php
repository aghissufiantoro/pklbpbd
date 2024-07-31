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
                <label for="id_kejadian" class="form-label">ID Kejadian</label>
                <input id="id_kejadian" class="form-control" name="id_kejadian" type="text" value="<?= $data_entry_sembako->id_kejadian ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal Entry</label>
                <input id="tanggal_entry" class="form-control" name="tanggal_entry" type="date" value="<?= $data_entry_sembako->tanggal_entry ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input id="kode_barang" class="form-control" name="kode_barang" type="text" value="<?= $data_entry_sembako->kode_barang ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="status_barang">Status Barang</label>
                <select class="form-select" id="status_barang" name="status_barang" data-width="100%" required>
                  <option value="">--- Pilih Status Barang ---</option>
                  <option value="Masuk">Masuk</option>
                  <option value="Keluar">Keluar</option>
                  <option value="Rusak">Rusak</option>
                  <option value="Tersedia">Tersedia</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="qty_barang" class="form-label">Quantity Barang</label>
                <div class="input-group">
                  <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                  <input id="qty_barang" class="form-control" name="qty_barang" type="text" value="<?= $data_entry_sembako->qty_barang ?>" required>
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

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input id="rt" class="form-control" name="rt" type="text" value="<?= $data_entry_sembako->rt ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input id="rw" class="form-control" name="rw" type="text" value="<?= $data_entry_sembako->rw ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan</label>
                <input id="kelurahan" class="form-control" name="kelurahan" type="text" value="<?= $data_entry_sembako->kelurahan ?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input id="kecamatan" class="form-control" name="kecamatan" type="text" value="<?= $data_entry_sembako->kecamatan ?>" required>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
  const tambahBtn = document.getElementById("tambahBtn");
  const kurangBtn = document.getElementById("kurangBtn");
  const jmlBrgInput = document.getElementById("qty_barang");

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

<script>
// Membuat event listener untuk input RT dan RW
document.getElementById("rt").addEventListener("input", function(event) {
  // Hapus karakter non-angka dari nilai input
  this.value = this.value.replace(/\D/g, '');
});

document.getElementById("rw").addEventListener("input", function(event) {
  // Hapus karakter non-angka dari nilai input
  this.value = this.value.replace(/\D/g, '');
});
</script>