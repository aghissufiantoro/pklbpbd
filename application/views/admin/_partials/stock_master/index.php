<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-10">
                        <div style="margin: 20px;">
                            <!-- Button to add new data -->
                            <a href="<?= base_url("admin/stock_master/add") ?>">
                                <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                        <a href="<?= site_url('admin/stock_master/laporan_logistik/') ?>" class="btn btn-outline-primary btn-xs"><i class='fal  fa-calculator'></i></a>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-title">Data logistik BPBD Kota Surabaya</h6>
                <p class="text-muted mb-3">Data berisi data logistik yang ada di BPBD Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="50px">Kode Barang</th>
                                <th width="90px">Nama Barang</th>
                                <th width="30px">Kategori Barang</th>
                                <th width="20px">Satuan Barang</th>
                                <th width="20px">Qty Tersedia</th>
                                <th width="20px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($stock_master as $res_stock) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $res_stock->kode_barang ?></td>
                                    <td><?= $res_stock->nama_barang ?></td>
                                    <td><?= $res_stock->kategori_barang ?></td>
                                    <td><?= $res_stock->satuan_barang ?></td>
                                    <td><?= $res_stock->qty_tersedia ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/stock_master/edit/' . $res_stock->kode_barang) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_stock->kode_barang ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 mt-4">
                    <a href="<?= site_url("admin/stock_master/laporan_logistik/") ?>">
                        <input class="btn btn-warning" type="button" value="Lihat Laporan">
                    </a>
                    <input class="btn btn-primary" type="submit" value="Cetak PDF">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($stock_master as $res_stock) { ?>
    <div class="modal fade" id="deleteConfirm<?= $res_stock->kode_barang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Data yang akan dihapus adalah barang <?= $res_stock->nama_barang ?>
                </div>
                <div class="modal-footer d-flex align-items-center">
                    <a href="<?= base_url('admin/stock_master/delete/' . $res_stock->kode_barang) ?>" class="btn btn-outline-danger">
                        <i class="fad fa-trash-alt"></i>
                    </a>
                    <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>