
<div class="container mt-5">
        <h1 class="mb-4">Plot Kegiatan</h1>
        <?php echo validation_errors(); ?>
        <?php echo form_open('admin/kegiatan/plot_kegiatan', 'class="needs-validation"'); ?>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" required>
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

            <div class="form-group">
                <label for="kegiatan">Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" required>
            </div>

            <div class="form-group">
                <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                <input type="text" class="form-control" name="lokasi_kegiatan" required>
            </div>

            <div class="form-group">
                <label for="jumlah_personel">Jumlah Personel</label>
                <input type="number" class="form-control" name="jumlah_personel" id="jumlah_personel" required>
            </div>

            <div class="form-group">
                <label for="jumlah_jarko">Jumlah Jarko</label>
                <input type="number" class="form-control" name="jumlah_jarko" id="jumlah_jarko" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" required>
            </div>

            <div class="form-group">
                <label for="jenis_kompi">Jenis Kompi</label>
                <select class="form-control" name="jenis_kompi" id="jenis_kompi" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <div id="petugas-container"></div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        <?php echo form_close(); ?>
    </div>

  

    <script>
        function loadPetugasOptions(jenisKompi, jumlahPersonel) {
            if (jenisKompi && jumlahPersonel > 0) {
                $.ajax({
                    url: "<?php echo base_url('admin/kegiatan/get_personel_by_kompi/'); ?>" + jenisKompi,
                    method: 'GET',
                    success: function(data) {
                        var petugasData = JSON.parse(data);
                        $('#petugas-container').empty();
                        for (var i = 0; i < jumlahPersonel; i++) {
                            var select = $('<select name="petugas[]" required></select>');
                            $.each(petugasData, function(index, petugas) {
                                var option = $('<option></option>').attr('value', petugas.id_petugas).text(petugas.nama_petugas);
                                select.append(option);
                            });
                            $('#petugas-container').append('<label>Petugas ' + (i + 1) + '</label><br>').append(select).append('<br>');
                        }
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

