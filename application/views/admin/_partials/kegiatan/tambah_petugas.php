<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Petugas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fff;
            color: #333;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .petugas-group {
            margin-bottom: 10px;
        }
        .petugas-group label {
            display: inline-block;
            margin-right: 10px;
        }
        .petugas-group select {
            width: calc(100% - 100px);
            display: inline-block;
        }
        select option {
            color: #333; /* Ensure option elements have a visible font color */
            background-color: #fff; /* Ensure option background color is white */
        }
        /* Ensuring visibility of selected option */
        select {
            color: #333;
            background-color: #fff;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Tambah Petugas</h2>
    <?php echo form_open('admin/kegiatan/tambah_petugas'); ?>
    <label for="id_kegiatan">ID Kegiatan</label>
    <input type="text" name="id_kegiatan" id="id_kegiatan" value="<?php echo isset($id_kegiatan) ? $id_kegiatan : ''; ?>" readonly>

    <label for="jenis_kompi">Jenis Kompi</label>
    <select name="jenis_kompi" id="jenis_kompi" required>
        <option value="">Pilih Jenis Kompi</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
    </select>

    <label for="jumlah_personel">Jumlah Personel</label>
    <input type="number" name="jumlah_personel" id="jumlah_personel" required>

    <div id="petugas-container"></div>

    <input type="submit" value="Submit">
    <?php echo form_close(); ?>

    <script>
        function loadPetugasOptions(jenisKompi, jumlahPersonel) {
            if (jenisKompi && jumlahPersonel > 0) {
                $.ajax({
                    url: "<?php echo base_url('admin/kegiatan/get_personel_by_kompi/'); ?>" + jenisKompi,
                    method: 'GET',
                    success: function(data) {
                        try {
                            var petugasData = JSON.parse(data);
                            console.log("Received data:", petugasData); // Log data to console for debugging
                            $('#petugas-container').empty();
                            for (var i = 0; i < jumlahPersonel; i++) {
                                var select = $('<select name="petugas[]" required></select>');
                                select.append('<option value="">Pilih Petugas</option>'); // Default option
                                $.each(petugasData, function(index, petugas) {
                                    var option = $('<option></option>').attr('value', petugas.id_petugas).text(petugas.nama_petugas);
                                    select.append(option);
                                });
                                $('#petugas-container').append('<div class="petugas-group"><label>Petugas ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
                            }
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

            // Initial load
            var initialKompi = $('#jenis_kompi').val();
            var initialJumlah = $('#jumlah_personel').val();
            loadPetugasOptions(initialKompi, initialJumlah);
        });
    </script>
</body>
</html>
