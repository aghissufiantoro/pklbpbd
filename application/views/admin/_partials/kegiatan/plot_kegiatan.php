<div class="container mt-5">
    <h1>Tambah jadwal Ploting</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/kegiatan/plot_kegiatan', 'class="needs-validation"'); ?>

    <div class="form-group">
        <label for="shift">Shift</label>
        <input type="text" class="form-control" name="shift" required>
    </div>

    <div class="form-group">
                <label for="shift">Shift</label>
                <input type="text" class="form-control" name="shift" required>
         </div>

            <div class="form-group">
                <label for="giat">Giat</label>
                <input type="text" class="form-control" name="giat" required>
            </div>

            <div class="form-group">
                <label for="waktu_kegiatan">Waktu Kegiatan</label>
                <input type="text" class="form-control" name="waktu_kegiatan" required>
            </div>


<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5abd3ececa7bc6163c1ebc4e122e31111e763e67
    <div class="form-group">
        <label for="kegiatan">Kegiatan</label>
        <select class="form-control" name="kegiatan" id="kegiatan" onchange="updateLokasiOptions()" required>
            <option value="">Pilih Kegiatan</option>
            <option value="Pos Pantau">Pos Pantau</option>
            <option value="Gudang Peralatan">Gudang Peralatan</option>
            <option value="Posko Terpadu">Posko Terpadu</option>
            <option value="Resepsionis">Resepsionis</option>
            <option value="Siaga Mako">Siaga Mako</option>
            <option value="Posko PMI">Posko PMI</option>
            <option value="Lain-Lain">Lain-Lain</option>
        </select>
    </div>
<<<<<<< HEAD
=======
            <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                <input type="text" class="form-control" name="lokasi_kegiatan" required>
            </div>
>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
=======
>>>>>>> 5abd3ececa7bc6163c1ebc4e122e31111e763e67

    <div class="form-group">
        <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
        <select class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" required>
            <option value="">Pilih Lokasi</option>
        </select>
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 5abd3ececa7bc6163c1ebc4e122e31111e763e67
    <div class="form-group">
        <label for="jumlah_personel">Jumlah Personel</label>
        <input type="number" class="form-control" name="jumlah_personel" required>
    </div>
<<<<<<< HEAD
=======
            <div class="form-group">
                <label for="jumlah_jarko">Jumlah Jarko</label>
                <input type="number" class="form-control" name="jumlah_jarko" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>
>>>>>>> 1f0d5330506277d183445e7d76137c8e49d57f17
=======
>>>>>>> 5abd3ececa7bc6163c1ebc4e122e31111e763e67

    <div class="form-group">
        <label for="jumlah_jarko">Jumlah Jarko</label>
        <input type="number" class="form-control" name="jumlah_jarko" required>
    </div>

    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" name="keterangan" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?php echo form_close(); ?>
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
</script>
