<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-title">
                <div style="margin: 20px;">
                    <h2>Tambah Petugas</h2>
                </div>
            </div>
            <div class="card-body">
                <?php echo form_open('admin/kegiatan/tambah_petugas'); ?>
                <div class="form-group">
                    <label for="id_kegiatan">ID Kegiatan</label>
                    <input type="text" class="form-control" name="id_kegiatan" id="id_kegiatan" value="<?php echo isset($id_kegiatan) ? $id_kegiatan : ''; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                    <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="shift">Shift</label>
                    <input type="text" class="form-control" name="shift" id="shift" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kompi">Jenis Kompi</label>
                    <select class="form-control" name="jenis_kompi" id="jenis_kompi" required>
                        <option value="">Pilih Jenis Kompi</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_personel">Jumlah Personel</label>
                    <input type="number" class="form-control" name="jumlah_personel" id="jumlah_personel" required>
                </div>
                <div class="form-group">
                    <label for="uraian_kegiatan">Uraian Kegiatan</label>
                    <input type="text" class="form-control" name="uraian_kegiatan" id="uraian_kegiatan" required>
                </div>
                <div class="form-group">
                    <label for="no_wa">No WA</label>
                    <input type="number" class="form-control" name="no_wa" id="no_wa" required>
                </div>
                <div class="form-group">
                    <label for="dokumentasi">Dokumentasi</label>
                    <input type="file" class="form-control" name="dokumentasi[]" id="dokumentasi" accept="image/*" multiple>
                </div>
                <div id="petugas-container"></div>
                <button type="submit" class="btn btn-success">Submit</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function loadPetugasOptions(jenisKompi, jumlahPersonel) {
        if (jenisKompi && jumlahPersonel > 0) {
            $.ajax({
                url: "<?php echo base_url('admin/kegiatan/get_personel_by_kompi/'); ?>" + jenisKompi,
                method: 'GET',
                success: function(data) {
                    try {
                        var petugasData = JSON.parse(data);
                        console.log("Received data:", petugasData);
                        $('#petugas-container').empty();
                        for (var i = 0; i < jumlahPersonel; i++) {
                            var select = $('<select class="form-control" name="petugas[]" required></select>');
                            select.append('<option value="">Pilih Petugas</option>');
                            $.each(petugasData, function(index, petugas) {
                                var option = $('<option></option>').attr('value', petugas.id_petugas).text(petugas.nama_petugas);
                                select.append(option);
                            });
                            $('#petugas-container').append('<div class="form-group"><label>Petugas ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
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

        var initialKompi = $('#jenis_kompi').val();
        var initialJumlah = $('#jumlah_personel').val();
        loadPetugasOptions(initialKompi, initialJumlah);
    });
</script>
