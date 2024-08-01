<div class="alert-container">
  <?php
  if ($this->session->flashdata('success')) {
    $successMessage = $this->session->flashdata('success');
    // Set flash data to null
    $this->session->set_flashdata('success', null);
  ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
      <?= $successMessage; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
    </div>
    <script>
      setTimeout(function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
          alert.classList.remove('show');
          alert.classList.add('fade');
          setTimeout(function() {
            alert.parentNode.removeChild(alert);
          }, 1500); // Time for fade-out animation
        }
      }, 5000); // 5 seconds
    </script>
  <?php
  }
  ?>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Barang</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <input id="nama_barang" class="form-control" name="nama_barang" type="text" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="kategori_barang" class="form-label">Kategori Barang</label>
                <select class="form-select" id="kategori_barang" name="kategori_barang" data-width="100%" required>
                  <option value="">--- Pilih Kategori Barang ---</option>
                  <?php
                  $query = $this->db->query('SELECT kategori FROM kategori_barang')->result();
                  foreach ($query as $qz) {
                  ?>
                    <option value="<?= htmlspecialchars($qz->kategori) ?>"><?= htmlspecialchars($qz->kategori) ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="satuan_barang" class="form-label">Satuan Barang</label>
              <select class="form-select" id="satuan_barang" name="satuan_barang" data-width="100%" required>
                <option value="">--- Pilih Satuan Barang ---</option>
                <?php
                $query = $this->db->query('SELECT satuan FROM satuan_barang')->result();
                foreach ($query as $qz) {
                ?>
                  <option value="<?= htmlspecialchars($qz->satuan) ?>"><?= htmlspecialchars($qz->satuan) ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="mb-3">
              <label for="qty_tersedia" class="form-label">Kuantitas Awal</label>
              <input id="qty_tersedia" class="form-control" name="qty_tersedia" type="text" required>
            </div>
          </div>
          <div class="col-md-12">
            <a href="<?= base_url("admin/stock_master") ?>">
              <input class="btn btn-warning" type="button" value="Kembali">
            </a>
            <input class="btn btn-primary" type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
  .alert-container {
    position: fixed;
    top: 15%;
    left: 57%;
    transform: translate(-50%, -50%);
    width: auto;
    z-index: 1050;
  }

  #success-alert {
    margin-bottom: 0;
    /* Remove bottom margin to prevent extra space */
  }
</style>