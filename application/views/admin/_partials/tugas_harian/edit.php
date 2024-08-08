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
    <h4 class="mb-3">UBAH DATA TUGAS HARIAN</h4>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/tugas_harian/edit/'.$tugas_harian->id_tugas_harian, 'class="needs-validation" enctype="multipart/form-data"'); ?>

    <input type="hidden" name="id_tugas_harian" value="<?= $tugas_harian->id_tugas_harian ?>">
        <div class="row">
            <div class="col-md-6">

                <!-- <div class="mb-3">
                    <label for="nama_staff" class="form-label">Nama</label>
                    <select class="form-select select2" id="nama_staff" name="nama_staff" required>
                        <option value="">--- Pilih Nama ---</option>
                        <?php foreach ($staff_options as $staff): ?>
                            <option value="<?= $staff->nama_staff ?>"><?= $staff->nama_staff ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> -->

                <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="tanggal" required name="tanggal" value="<?= $tugas_harian->tanggal ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Waktu Kegiatan</label>
                    <input type="time" class="form-control" id="jam" required name="waktu" value="<?= $tugas_harian->waktu ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi Kegiatan</label>
                    <input class="form-control" required name="lokasi" value="<?= $tugas_harian->lokasi ?>">
                </div>

            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label class="form-label">Uraian Kegiatan</label>
                    <input class="form-control" required name="uraian_kegiatan" value="<?= $tugas_harian->uraian_kegiatan ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bidang</label>
                    <select class="form-select" required name="bidang" id="bidang">
                        <option value="">--- Pilih Salah Satu ---</option>
                        <option <?php if ($tugas_harian->bidang == "Kedaruratan Logistik Rehabilitasi dan Rekonstruksi"){echo "selected";} ?> value="Kedaruratan Logistik Rehabilitasi dan Rekonstruksi">Kedaruratan Logistik Rehabilitasi dan Rekonstruksi</option>
                        <option <?php if ($tugas_harian->bidang == "Pencegahan dan Kesiapsiagaan"){echo "selected";} ?> value="Pencegahan dan Kesiapsiagaan">Pencegahan dan Kesiapsiagaan</option>
                        <option <?php if ($tugas_harian->bidang == "Sekretariat"){echo "selected";} ?> value="Sekretariat">Sekretariat</option>
                    </select>
                </div>

                <!-- <div class="mb-3" id="lain_lain_input" style="display: none;">
                    <label class="form-label">bidang (Lain-lain)</label>
                    <input type="text" class="form-control" name="bidang_lain" id="bidang_lain" autocomplete="off" placeholder="Isi bidang lain">
                </div> -->

                <!-- <div class="mb-3">
                    <label class="form-label">Hasil Kegiatan</label>
                    <textarea class="form-control" name="hasil_kegiatan" value="<?= $tugas_harian->hasil_kegiatan ?>"></textarea>
                </div> -->
                
                <label class="form-label">Hasil Kegiatan</label>
                <input type="file" class="form-control" id="hasil_kegiatan" name="hasil_kegiatan[]" accept="image/*" multiple />

            </div>
        </div>   
        <a href="<?= base_url("admin/tugas_harian") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
        </a>
        <button class="btn btn-primary" type="submit">Submit</button>
    <?php echo form_close(); ?>
</div>

<script>
document.getElementById('nama_staff').addEventListener('change', function() {
    var selectedNamaStaff = this.value;
    
    // Assuming you have a map of nama_staff to id_kontak_opd
    var staffMap = <?php echo json_encode(array_column($staff_options, 'id_staff', 'nama_staff')); ?>;
    document.getElementById('id_staff').value = staffMap[selectedNamaStaff] || '';
});
</script>
<!-- jQuery (required by Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "--- Pilih Nama ---",
            allowClear: true
        });
    });

    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);
</script>
<script>
    document.getElementById('bidang').addEventListener('change', function() {
        var lainLainInput = document.getElementById('lain_lain_input');
        if (this.value === 'Lain-lain') {
            lainLainInput.style.display = 'block';
        } else {
            lainLainInput.style.display = 'none';
        }
    });
</script>
