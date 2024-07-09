<div class="container mt-5">
        <h1>Plot Kegiatan</h1>
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
                <input type="number" class="form-control" name="jumlah_personel" required>
            </div>

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