<div class="container mt-2">
    <h4 class="mb-3">TAMBAH DATA TUGAS HARIAN</h4>
    <?php echo validation_errors(); ?>
    <?php echo form_open('admin/tugas_harian/add', 'class="needs-validation" enctype="multipart/form-data"'); ?>
        <div class="row">
            <div class="col-md-6">

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
                    placeholder="Masukkan lokasi kegiatan">
                </div>

            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label class="form-label">Uraian Kegiatan</label>
                    <input class="form-control" required name="uraian_kegiatan" autocomplete="off"
                    placeholder="Uraikan kegiatan yang telah dilakukan">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bidang</label>
                    <select class="form-select" required name="bidang" autocomplete="off" id="bidang">
                        <option value="">--- Pilih Salah Satu ---</option>
                        <option value="Kedaruratan Logistik Rehabilitasi dan Rekonstruksi">Kedaruratan Logistik Rehabilitasi dan Rekonstruksi</option>
                        <option value="Pencegahan dan Kesiapsiagaan">Pencegahan dan Kesiapsiagaan</option>
                        <option value="Sekretariat">Sekretariat</option>
                    </select>
                </div>

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
