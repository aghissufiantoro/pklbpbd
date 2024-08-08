<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-title">
        <div style="margin: 20px;">
          <a href="<?= base_url("admin/data_kejadian/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data Kejadian di Kota Surabaya</h6>
        <p class="text-muted mb-3">Data Kejadian di Pemerintah Kota Surabaya</p>

        <!-- Filter by Date Range -->
        <div class="row mb-4">
          <div class="col-md-3">
            <label for="startDate">Start Date</label>
            <input type="date" id="startDate" class="form-control">
          </div>
          <div class="col-md-3">
            <label for="endDate">End Date</label>
            <input type="date" id="endDate" class="form-control">
          </div>
          <div class="col-md-3 align-self-end">
            <button id="filterButton" class="btn btn-primary">Filter</button>
          </div>
        </div>

        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="20px">Id Kejadian</th>
                <th width="20px">Tanggal Kejadian</th>
                <th width="30px">Kejadian</th>
                <th width="20px">Waktu_Berita</th>
                <th width="20px">Waktu_Tiba</th>
                <th width="20px">Lokasi_Kejadian</th>
                <th width="30px">Kecamatan_Kejadian</th>
                <th width="20px">Kelurahan_Kejadian</th>
                <th width="20px">Alamat</th>
                <th width="30px">Kronologi</th>
                <th width="30px">Tindak Lanjut</th>
                <th width="20px">Dokumentasi</th>
                <th width="20px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1; 
              $db_data_kejadian = $this->db->query("SELECT * FROM data_kejadian order by tanggal DESC")->result();
              foreach ($db_data_kejadian as $res_data_kejadian) {
                $keca = $res_data_kejadian->kecamatan_kejadian;
                $kelu = $res_data_kejadian->kelurahan_kejadian;

                $rsl_keca = $this->db->query("SELECT kecamatan FROM wilayah_2022 WHERE kecamatan = '$keca'")->row();
                $rsl_kelu = $this->db->query("SELECT desa FROM wilayah_2022 WHERE desa = '$kelu'")->row();

                $keca_new = ($rsl_keca && isset($rsl_keca->kecamatan)) ? ucwords(strtolower($rsl_keca->kecamatan)) : "Data tidak ditemukan";
                $kelu_new = ($rsl_kelu && isset($rsl_kelu->desa)) ? ucwords(strtolower($rsl_kelu->desa)) : "Data tidak ditemukan";
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $res_data_kejadian->id_kejadian ?></td>
                  <td><?= $res_data_kejadian->tanggal ?></td>
                  <td><?= $res_data_kejadian->kejadian ?></td>
                  <td><?= $res_data_kejadian->waktu_berita ?></td>
                  <td><?= $res_data_kejadian->waktu_tiba ?></td>
                  <td><?= $res_data_kejadian->lokasi_kejadian ?></td>
                  <td><?= $keca_new ?></td>
                  <td><?= $kelu_new ?></td>
                  <td><?= $res_data_kejadian->alamat_kejadian ?></td>
                  <td><?= $res_data_kejadian->kronologi ?></td>
                  <td><?= $res_data_kejadian->tindak_lanjut ?></td>
                  <td>
                    <?php if (!empty($res_data_kejadian->dokumentasi)) : ?>
                      <img src="<?= base_url($res_data_kejadian->dokumentasi) ?>" alt="dokumentasi" width="100">
                    <?php else : ?>
                      Tidak ada dokumentasi
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?= site_url('admin/data_kejadian/edit/' . $res_data_kejadian->id_kejadian) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                    <a href="<?= site_url('admin/data_kejadian/detail/' . $res_data_kejadian->id_kejadian) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-list-ul'></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_data_kejadian->tanggal ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                    <div class="modal fade" id="deleteConfirm<?= $res_data_kejadian->tanggal ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Data kejadian yang akan dihapus adalah <?= $res_data_kejadian->kejadian ?>
                          </div>
                          <div class="modal-footer d-flex align-items-center">
                            <a href="<?= base_url('admin/data_kejadian/delete/' . $res_data_kejadian->id_kejadian) ?>" class="btn btn-outline-danger">
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

<script>
document.getElementById('filterButton').addEventListener('click', function() {
  var startDate = document.getElementById('startDate').value;
  var endDate = document.getElementById('endDate').value;
  var table = document.getElementById('dataTableExample');
  var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  
  for (var i = 0; i < rows.length; i++) {
    var dateCell = rows[i].getElementsByTagName('td')[2];
    var dateValue = new Date(dateCell.textContent);
    var start = new Date(startDate);
    var end = new Date(endDate);
    
    if (dateValue >= start && dateValue <= end) {
      rows[i].style.display = '';
    } else {
      rows[i].style.display = 'none';
    }
  }
});
</script>
