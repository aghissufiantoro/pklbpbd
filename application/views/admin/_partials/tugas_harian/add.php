<div class="container mt-2">
    <h4 class="mb-3">TAMBAH DATA TUGAS HARIAN</h4>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/tugas_harian/add', 'class="needs-validation" enctype="multipart/form-data"'); ?>
        <div class="row">
            <div class="col-md-6">

                <div class="mb-3">
                    <label for="nama_staff" class="form-label">Nama Staff</label>
                    <select class="form-select" id="nama_staff" name="nama_staff" required>
                        <option value="">--- Pilih Nama Staff ---</option>
                        <?php foreach ($staff_options as $staff): ?>
                            <option value="<?= $staff->nama_kontak_opd ?>"><?= $staff->nama_kontak_opd ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Kegiatan</label>
                    <input type="date" class="form-control" id="datepicker" required name="tanggal" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label class="form-label">Waktu Kegiatan</label>
                    <input type="time" class="form-control" id="jam" required name="waktu" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi Kegiatan</label>
                    <input class="form-control" required name="lokasi" autocomplete="off"
                    placeholder="Masukkan lokasi kegiatan" id="hurufbesar" onkeyup="hurufBesar();"></input>
                </div>

            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label class="form-label">Uraian Kegiatan</label>
                    <input class="form-control" required name="uraian_kegiatan" autocomplete="off"
                    placeholder="Uraikan kegiatan yang telah dilakukan" id="hurufbesar5" onkeyup="hurufBesar5();"></input>
                </div>

                <div class="mb-3">
                    <label class="form-label">Penanggung Jawab</label>
                    <select class="form-select" required name="penanggung_jawab" autocomplete="off"
                    id="hurufbesar3" onkeyup="hurufBesar3();">
                        <option value="">--- Pilih Salah Satu ---</option>
                        <option value="Kepala Badan">Kepala Badan</option>
                        <option value="Sekretaris Badan">Sekretaris Badan</option>
                        <option value="Kasubbag Keuangan">Kasubbag Keuangan</option>
                        <option value="Kabid PK">Kabid PK</option>
                        <option value="Kabid Darlog RR">Kabid Darlog RR</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Hasil Kegiatan</label>
                    <textarea class="form-control" name="hasil_kegiatan" autocomplete="off"
                    placeholder="Masukkan hasil kegiatan" id="hurufbesar4" onkeyup="hurufBesar4();"></textarea>
                </div>
                <label class="form-label">Dokumentasi</label>
                <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" accept="image/*" multiple />
                
                <div class="form-group">

                </div>

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
    var staffMap = <?php echo json_encode(array_column($staff_options, 'id_kontak_opd', 'nama_staff')); ?>;
    document.getElementById('id_kontak_opd').value = staffMap[selectedNamaStaff] || '';
});
</script>
