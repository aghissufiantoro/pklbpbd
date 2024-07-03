<div class="container mt-5">
        <h1>Laporan Kegiatan</h1>
        <?php echo validation_errors(); ?>
        <form action="<?php echo site_url('admin/kegiatan/laporan_kegiatan/' . $id_kegiatan); ?>" method="post">
            <?php foreach ($penugasan as $index => $p): ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title">Petugas <?php echo $index + 1; ?></h3>
                        <input type="hidden" name="id_penugasan[]" value="<?php echo $p->id_penugasan; ?>" />

                        <div class="form-group">
                            <label for="laporan_<?php echo $index; ?>">Laporan</label>
                            <input type="text" class="form-control" name="laporan[]" id="laporan_<?php echo $index; ?>" />
                        </div>

                        <div class="form-group">
                            <label for="dokumentasi_<?php echo $index; ?>">Dokumentasi</label>
                            <input type="text" class="form-control" name="dokumentasi[]" id="dokumentasi_<?php echo $index; ?>" />
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>