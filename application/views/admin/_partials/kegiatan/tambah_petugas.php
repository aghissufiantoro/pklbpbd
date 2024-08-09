<div class="container mt-2">
    <h4 class="mb-3">TAMBAH PETUGAS</h4>
    <?php echo form_open('admin/kegiatan/tambah_petugas', 'class="needs-validation" enctype="multipart/form-data"'); ?>
        <div class="row">
            <div class="col-md-6"> 


            <div class="mb-3">
                    <label for="id_kegiatan">ID Kegiatan</label>
                    <input type="text" class="form-control" name="id_kegiatan" id="id_kegiatan" value="<?php echo isset($id_kegiatan) ? $id_kegiatan : ''; ?>" readonly>
                </div>

            <div class="mb-3">
            <label for="jenis_kompi" class="form-label">Jenis Kompi</label>
            <select class="form-control" name="jenis_kompi" id="jenis_kompi" required>
                <option value="">--- Pilih Jenis Kompi ---</option>
                <option value="BKO" >BKO</option>
                <option value="DANKI A - YUDA WIDAS P" >DANKI A - YUDA WIDAS P</option>
                <option value="DANKI B - EKO SUPRIYANTO" >DANKI B - EKO SUPRIYANTO</option>
                <option value="DANKI C - MOCHAMAD CHAIRUL TAKWOLO" >DANKI C - MOCHAMAD CHAIRUL TAKWOLO</option>
            </select>
          </div>

          <div class="mb-3">
    <label for="jumlah_personel" class="form-label">Jumlah Personel</label>
    <input type="number" class="form-control" name="jumlah_personel" id="jumlah_personel" value="<?= $kegiatan->jumlah_personel ?>" required readonly>
</div>

<div id="petugas-container"></div> <!-- Kontainer untuk dropdown personel -->

<div class="mb-3">
    <label for="jumlah_jarko" class="form-label">Jumlah Jarko</label>
    <input type="number" class="form-control" name="jumlah_jarko" id="jumlah_jarko" value="<?= $kegiatan->jumlah_jarko ?>" required readonly>
</div>

<div id="jarko-container"></div> <!-- Kontainer untuk dropdown jarko -->


            <div class="mb-3">
                <label for="no_wa" class="form-label">No WA</label>
                <input type="number" class="form-control" name="no_wa" id="no_wa"  required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Dokumentasi</label>
                <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" accept="image/*" multiple />
            </div>
       
            <a href="<?= base_url("admin/kegiatan/view_kegiatan") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
        </a>
        <button type="submit" class="btn btn-success">Submit</button>
        </div>
        </div>
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

    // Hide flash messages after 5 seconds
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script>
    function loadPetugasOptions(jenisKompi, jumlahPersonel) {
        if (jenisKompi && jumlahPersonel > 0) {
            $.ajax({
                url: "<?php echo base_url('admin/kegiatan/get_all_personel1'); ?>",
                method: 'GET',
                success: function(data) {
                    try {
                        var petugasData = JSON.parse(data);
                        $('#petugas-container').empty();
                        for (var i = 0; i < jumlahPersonel; i++) {
                            var select = $('<select class="form-control petugas-select" name="petugas[]" required></select>');
                            select.append('<option value="">--- Pilih Petugas ---</option>');
                            $.each(petugasData, function(index, petugas) {
                                var option = $('<option></option>').attr('value', petugas.id_staff).text(petugas.nama_staff);
                                select.append(option);
                            });
                            $('#petugas-container').append('<div class="form-group"><label>Petugas ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
                        }
                        $('.petugas-select').select2();
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to load petugas data:", error);
                }
            });
        } else {
            $('#petugas-container').empty();
        }
    }

    $(document).ready(function() {
        $('#jenis_kompi').change(function() {
            var jenisKompi = $(this).val();
            var jumlahPersonel = $('#jumlah_personel').val();
            loadPetugasOptions(jenisKompi, jumlahPersonel);
        });

        $('#jumlah_personel').change(function() {
            var jumlahPersonel = $(this).val();
            var jenisKompi = $('#jenis_kompi').val();
            loadPetugasOptions(jenisKompi, jumlahPersonel);
        });

        var initialKompi = $('#jenis_kompi').val();
        var initialJumlah = $('#jumlah_personel').val();
        loadPetugasOptions(initialKompi, initialJumlah);
    });
</script>
<script>
    function loadJarkoOptions(jenisKompi, jumlahJarko) {
        if (jenisKompi && jumlahJarko > 0) {
            $.ajax({
                url: "<?php echo base_url('admin/kegiatan/get_all_personel1'); ?>",
                method: 'GET',
                success: function(data) {
                    try {
                        var jarkoData = JSON.parse(data);
                        $('#jarko-container').empty();
                        for (var i = 0; i < jumlahJarko; i++) {
                            var select = $('<select class="form-control jarko-select" name="jarko[]" required></select>');
                            select.append('<option value="">--- Pilih Petugas ---</option>');
                            $.each(jarkoData, function(index, jarko) {
                                var option = $('<option></option>').attr('value', jarko.id_staff).text(jarko.nama_staff);
                                select.append(option);
                            });
                            $('#jarko-container').append('<div class="form-group"><label>Petugas ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
                        }
                        $('.jarko-select').select2();
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to load jarko data:", error);
                }
            });
        } else {
            $('#jarko-container').empty();
        }
    }

    $(document).ready(function() {
        $('#jenis_kompi').change(function() {
            var jenisKompi = $(this).val();
            var jumlahJarko = $('#jumlah_jarko').val();
            loadJarkoOptions(jenisKompi, jumlahJarko);
        });

        $('#jumlah_jarko').change(function() {
            var jumlahJarko = $(this).val();
            var jenisKompi = $('#jenis_kompi').val();
            loadJarkoOptions(jenisKompi, jumlahJarko);
        });

        var initialKompi = $('#jenis_kompi').val();
        var initialJumlah = $('#jumlah_jarko').val();
        loadJarkoOptions(initialKompi, initialJumlah);
    });
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
