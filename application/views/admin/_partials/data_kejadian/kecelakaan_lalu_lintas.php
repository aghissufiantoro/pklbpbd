<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="id_laka" class="form-label">ID Laka</label>
                <input type="text" class="form-control" name="id_laka" id="id_laka" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" name="usia" id="usia" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <input type="text" class="form-control" name="kendaraan" id="kendaraan" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="luka" class="form-label">Luka</label>
                <input type="text" class="form-control" name="luka" id="luka" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" id="kondisi" required>
              </div>
            </div>
          </div>


          <a href="<?= base_url("admin/data_kejadian") ?>">
            <input class="btn btn-outline-primary" type="submit" value="Submit">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
        </form>
      </div>
    </div>
  </div>
</div>