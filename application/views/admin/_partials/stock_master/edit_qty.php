
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Edit Quantity</h6>
                <form action="<?= base_url('admin/stock_master/update_quantity') ?>" method="post">
                    <input type="hidden" name="kode_barang" value="<?= $stock->kode_barang ?>">
                    <div class="form-group">
                        <label for="qty_masuk">Qty Masuk</label>
                        <input type="number" class="form-control" id="qty_masuk" name="qty_masuk" value="<?= $stock->qty_masuk ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="qty_keluar">Qty Keluar</label>
                        <input type="number" class="form-control" id="qty_keluar" name="qty_keluar" value="<?= $stock->qty_keluar ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="qty_rusak">Qty Rusak</label>
                        <input type="number" class="form-control" id="qty_rusak" name="qty_rusak" value="<?= $stock->qty_rusak ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="qty_tersedia">Qty Tersedia</label>
                        <input type="number" class="form-control" id="qty_tersedia" name="qty_tersedia" value="<?= $stock->qty_tersedia ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
