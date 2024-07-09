<?php
$wilayah_value = "";
if ($this->session->flashdata('success')) {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data Kejadian telah ditambahkan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
}
?>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="addForm" action="<?= base_url("admin/data_kejadian/add") ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tanggal" required autocomplete="off">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="id_kejadian" class="form-label">ID KEJADIAN</label>
                <input id="id_kejadian" class="form-control" name="id_kejadian" type="text" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="kejadian">Kejadian</label>
                <select class="form-select" id="kejadian" name="kejadian" data-width="100%">
                  <option value="">--- Pilih Kejadian ---</option>
                  <option value="Kecelakaan Lalu Lintas">Kecelakaan Lalu Lintas</option>
                  <option value="Darurat Medis">Darurat Medis</option>
                  <option value="Kebakaran">Kebakaran</option>
                  <option value="Pohon Tumbang">Pohon Tumbang</option>
                  <option value="Penemuan Jenazah">Penemuan Jenazah</option>
                  <option value="Orang Tenggelam">Orang Tenggelam</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_berita" class="form-label">Waktu Berita</label>
                <input type="time" class="form-control" name="waktu_berita" id="waktu_berita" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_tiba" class="form-label">Waktu Tiba</label>
                <input type="time" class="form-control" name="waktu_tiba" id="waktu_tiba" required autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="lokasi_kejadian">Lokasi Kejadian</label>
                <select class="form-select" id="lokasi_kejadian" name="lokasi_kejadian" data-width="100%">
                  <option value="">--- Pilih Lokasi Kejadian ---</option>
                  <?php
                  $ql = $this->db->query('SELECT wilayah FROM wilayah_2022 GROUP BY wilayah')->result();
                  foreach ($ql as $qz) {
                  ?>
                    <option value="<?= $qz->wilayah ?>"><?= $qz->wilayah ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label for="alamat_kejadian" class="form-label">Alamat Kejadian</label>
                <input id="alamat_kejadian" class="form-control" name="alamat_kejadian" type="text">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kabkota_kejadian">Kota</label>
              <select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" data-width="100%" required>
                <option value="">--- Pilih Kota ---</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kecamatan_kejadian">Kecamatan</label>
              <select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" data-width="100%" required>
                <option value="">--- Pilih Kota Terlebih Dahulu ---</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kelurahan_kejadian">Kelurahan / Desa</label>
              <select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" data-width="100%" required>
                <option value="">--- Pilih Kecamatan Terlebih Dahulu ---</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="kronologi" class="form-label">Kronologi</label>
                <input id="kronologi" class="form-control" name="kronologi" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                <input id="tindak_lanjut" class="form-control" name="tindak_lanjut" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="petugas_lokasi" class="form-label">Petugas</label>
                <br>
                <label for="petugas_lokasi" class="form-label"><strong>(Contoh: BPBD Kota Surabaya; TGC Posko Selatan; Ambulance PMI)</strong></label>
                <input id="petugas_lokasi" class="form-control" name="petugas_lokasi" type="text">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Diri</label>
            <input type="file" class="form-control" required name="dokumentasi" accept="image/*" />
          </div>

          <input type="submit" value="Submit" class="btn btn-primary" onclick="handleSubmitAndRedirect(event)">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const lokasiKejadianSelect = document.getElementById('lokasi_kejadian');
    const kabkotaSelect = document.getElementById('kabkota_kejadian');
    const kecamatanSelect = document.getElementById('kecamatan_kejadian');
    const kelurahanSelect = document.getElementById('kelurahan_kejadian');

    lokasiKejadianSelect.addEventListener('change', function() {
      const selectedWilayah = this.value;
      fetchKabkota(selectedWilayah);
    });

    kabkotaSelect.addEventListener('change', function() {
      const selectedKabkota = this.value;
      fetchKecamatan(selectedKabkota);
    });

    kecamatanSelect.addEventListener('change', function() {
      const selectedKecamatan = this.value;
      fetchKelurahan(selectedKecamatan);
    });

    function fetchKabkota(wilayah) {
      fetch(`<?= base_url('admin/data_kejadian/get_kabkota') ?>?wilayah=${wilayah}`)
        .then(response => response.json())
        .then(data => {
          populateSelect(kabkotaSelect, data);
          kecamatanSelect.innerHTML = '<option value="">--- Pilih Kota Terlebih Dahulu ---</option>';
          kelurahanSelect.innerHTML = '<option value="">--- Pilih Kecamatan Terlebih Dahulu ---</option>';
        });
    }

    function fetchKecamatan(kabkota) {
      fetch(`<?= base_url('admin/data_kejadian/get_kecamatan') ?>?kabkota=${kabkota}`)
        .then(response => response.json())
        .then(data => {
          populateSelect(kecamatanSelect, data);
          kelurahanSelect.innerHTML = '<option value="">--- Pilih Kecamatan Terlebih Dahulu ---</option>';
        });
    }

    function fetchKelurahan(kecamatan) {
      fetch(`<?= base_url('admin/data_kejadian/get_kelurahan') ?>?kecamatan=${kecamatan}`)
        .then(response => response.json())
        .then(data => {
          populateSelect(kelurahanSelect, data);
        });
    }

    function populateSelect(selectElement, data) {
      selectElement.innerHTML = '<option value="">--- Pilih ---</option>';
      data.forEach(item => {
        const option = document.createElement('option');
        option.value = item.value;
        option.textContent = item.text;
        selectElement.appendChild(option);
      });
    }
  });

  function handleSubmitAndRedirect(event) {
    event.preventDefault(); // Mencegah form dikirim secara default

    const kejadian = document.getElementById('kejadian').value;

    let nextFormUrl = '';

    switch (kejadian) {
      case 'Kecelakaan Lalu Lintas':
        nextFormUrl = '<?= base_url("admin/data_kejadian/kecelakaan_lalu_lintas") ?>';
        break;
      case 'Darurat Medis':
        nextFormUrl = '<?= base_url("admin/data_kejadian/darurat_medis") ?>';
        break;
      case 'Kebakaran':
        nextFormUrl = '<?= base_url("admin/data_kejadian/kebakaran") ?>';
        break;
      case 'Pohon Tumbang':
        nextFormUrl = '<?= base_url("admin/data_kejadian/pohon_tumbang") ?>';
        break;
      case 'Penemuan Jenazah':
        nextFormUrl = '<?= base_url("admin/data_kejadian/penemuan_jenazah") ?>';
        break;
      case 'Orang Tenggelam':
        nextFormUrl = '<?= base_url("admin/data_kejadian/orang_tenggelam") ?>';
        break;
      case 'Lainnya':
        nextFormUrl = '<?= base_url("admin/data_kejadian/lainnya") ?>';
        break;
      default:
        alert('Pilih kejadian terlebih dahulu.');
        return;
    }

    // Kirim form menggunakan JavaScript
    const form = document.getElementById('addForm');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => {
        if (response.ok) {
          window.location.href = nextFormUrl; // Redirect jika berhasil
        } else {
          alert('Gagal mengirim data.'); // Tampilkan pesan jika gagal
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengirim data.');
      });
  }
</script>
