<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    <strong>SUKSES!</strong> Data telah dirubah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
    $this->session->set_flashdata('success', null); // Clear flash message
  }
?>
<div class="container mt-2">
  <h4 class="mb-3">UBAH JADWAL PLOTING</h4>
    <form id="addForm" action="<?= site_url('admin/kegiatan/edit_plot_kegiatan/'.$kegiatan->id_kegiatan) ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_kegiatan" value="<?= $kegiatan->id_kegiatan ?>">
          
      <div class="row">
        <div class="col-md-6">

          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" value="<?= $kegiatan->tanggal ?>" required>
          </div>

          <div class="mb-3">
            <label for="shift" class="form-label">Shift</label>
            <select class="form-select" required name="shift" autocomplete="off" id="shift">
                  <option value="">--- Pilih Salah Satu ---</option>
                  <option value="Pagi" <?= $kegiatan->shift == 'Pagi' ? 'selected' : '' ?>>Pagi</option>
                  <option value="Malam" <?= $kegiatan->shift == 'Malam' ? 'selected' : '' ?>>Malam</option>
            </select>
          </div>

          <div class="mb-3">
                <label for="waktu_kegiatan" class="form-label">Waktu Kegiatan</label>
                <input type="time" class="form-control" name="waktu_kegiatan" value="<?= $kegiatan->waktu_kegiatan ?>" required>
            </div>

          <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <select class="form-control" name="kegiatan" id="kegiatan" onchange="updateLokasiOptions()" required>
              <option value="">--- Pilih Kegiatan ---</option>
              <option value="Pos Pantau" <?= $kegiatan->kegiatan == 'Pos Pantau' ? 'selected' : '' ?>>Pos Pantau</option>
              <option value="Gudang Peralatan" <?= $kegiatan->kegiatan == 'Gudang Peralatan' ? 'selected' : '' ?>>Gudang Peralatan</option>
              <option value="Posko Terpadu" <?= $kegiatan->kegiatan == 'Posko Terpadu' ? 'selected' : '' ?>>Posko Terpadu</option>
              <option value="Resepsionis" <?= $kegiatan->kegiatan == 'Resepsionis' ? 'selected' : '' ?>>Resepsionis</option>
              <option value="Siaga Mako" <?= $kegiatan->kegiatan == 'Siaga Mako' ? 'selected' : '' ?>>Siaga Mako</option>
              <option value="Posko PMI" <?= $kegiatan->kegiatan == 'Posko PMI' ? 'selected' : '' ?>>Posko PMI</option>
              <option value="Lain-Lain" <?= $kegiatan->kegiatan == 'Lain-Lain' ? 'selected' : '' ?>>Lain-Lain</option>
            </select>
          </div>

          <div class="mb-3" id="lain_lain_input" style="display: none;">
              <label class="form-label">Kegiatan (Lain-lain)</label>
              <input type="text" class="form-control" name="kegiatan_lain" id="kegiatan_lain" autocomplete="off" placeholder="Isi kegiatan lain">
          </div>

          <div class="mb-3">
            <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan</label>
            <select class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" required>
              <option value="">--- Pilih Lokasi ---</option>
            </select>
          </div>
            
          <div class="mb-3">
            <label for="jenis_kompi" class="form-label">Jenis Kompi</label>
            <select class="form-control" name="jenis_kompi" id="jenis_kompi" required>
                <option value="">--- Pilih Jenis Kompi ---</option>
                <option value="BKO" <?= $kegiatan->jenis_kompi == 'BKO' ? 'selected' : '' ?>>BKO</option>
                <option value="DANKI A - YUDA WIDAS P" <?= $kegiatan->jenis_kompi == 'DANKI A - YUDA WIDAS P' ? 'selected' : '' ?>>DANKI A - YUDA WIDAS P</option>
                <option value="DANKI B - EKO SUPRIYANTO" <?= $kegiatan->jenis_kompi == 'DANKI B - EKO SUPRIYANTO' ? 'selected' : '' ?>>DANKI B - EKO SUPRIYANTO</option>
                <option value="DANKI C - MOCHAMAD CHAIRUL TAKWOLO" <?= $kegiatan->jenis_kompi == 'DANKI C - MOCHAMAD CHAIRUL TAKWOLO' ? 'selected' : '' ?>>DANKI C - MOCHAMAD CHAIRUL TAKWOLO</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">

          <div class="mb-3">
            <label for="jumlah_personel" class="form-label">Jumlah Personel</label>
            <input type="number" class="form-control" name="jumlah_personel" value="<?= $kegiatan->jumlah_personel ?>" required>
          </div>

          <div class="mb-3">
            <label for="jumlah_jarko" class="form-label">Jumlah Jarko</label>
            <input type="number" class="form-control" name="jumlah_jarko" value="<?= $kegiatan->jumlah_jarko ?>" required>
          </div>

          <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" name="keterangan" value="<?= $kegiatan->keterangan ?>" required></textarea>
            </div>

            <div class="mb-3">
                <label for="no_wa" class="form-label">No WA</label>
                <input type="number" class="form-control" name="no_wa" id="no_wa" value="<?= $kegiatan->no_wa ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Dokumentasi</label>
                <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" accept="image/*" multiple />
            </div>
        </div>
      </div>
      <a href="<?= base_url("admin/kegiatan/view_kegiatan") ?>">
        <input class="btn btn-warning" type="button" value="Kembali">
      </a>
        <input class="btn btn-primary" type="submit" value="Submit">
      </form>
</div>           

<script>
    const lokasiOptions = {
        "Pos Pantau": [
            "Sedap Malam", "Genteng Besar", "Tidar", "Tugu Pahlawan", "Taman Kalongan",
            "Taman Bungkul", "KBS", "Dupak", "RSIA", "UKM Merr", "Panjang Jiwo", 
            "Wiyung", "Taman Pelangi", "Gelora Pancasila", "Bambu Runcing", "Gunung Anyar",
            "PMK Pakal", "Karang Pilang", "TOW"
        ],
        "Gudang Peralatan": ["Menur", "Hitech Mall"],
        "Posko Terpadu": ["Barat", "Utara", "Timur", "Kedung Cowek", "Dukuh Pakis", "Selatan", "Pusat"],
        "Resepsionis": ["Mako BPBD"],
        "Siaga Mako": ["Mako BPBD"],
        "Posko PMI": ["Jl Sumatera"],
        "Lain-Lain": ["isi manual"]
    };

    function updateLokasiOptions() {
        const kegiatanSelect = document.getElementById('kegiatan');
        const lokasiSelect = document.getElementById('lokasi_kegiatan');
        const selectedKegiatan = kegiatanSelect.value;

        // Clear existing options
        lokasiSelect.innerHTML = '';

        if (lokasiOptions[selectedKegiatan]) {
            lokasiOptions[selectedKegiatan].forEach(function(lokasi) {
                const option = document.createElement('option');
                option.value = lokasi;
                option.text = lokasi;
                lokasiSelect.appendChild(option);
            });

            if (selectedKegiatan === 'Lain-Lain') {
                const input = document.createElement('input');
                input.type = 'text';
                input.className = 'form-control';
                input.name = 'lokasi_kegiatan';
                input.required = true;
                lokasiSelect.parentNode.replaceChild(input, lokasiSelect);
            } else {
                const select = document.createElement('select');
                select.className = 'form-control';
                select.name = 'lokasi_kegiatan';
                select.id = 'lokasi_kegiatan';
                select.required = true;
                lokasiOptions[selectedKegiatan].forEach(function(lokasi) {
                    const option = document.createElement('option');
                    option.value = lokasi;
                    option.text = lokasi;
                    select.appendChild(option);
                });
                lokasiSelect.parentNode.replaceChild(select, document.querySelector('input[name="lokasi_kegiatan"]'));
            }
        }
    }

    // Hide flash messages after 5 seconds
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
</script>
<script>
    document.getElementById('kegiatan').addEventListener('change', function() {
        var lainLainInput = document.getElementById('lain_lain_input');
        if (this.value === 'Lain-lain') {
            lainLainInput.style.display = 'block';
        } else {
            lainLainInput.style.display = 'none';
        }
    });
</script>