<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Laporan Logistik</h6>
                <p class="text-muted mb-3">Data berisi data laporan logistik yang ada di BPBD Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="50px">Tanggal</th>
                                <th width="90px">Nama Barang</th>
                                <th width="30px">Qty Awal</th>
                                <th width="20px">Qty Keluar</th>
                                <th width="20px">Qty Masuk</th>
                                <th width="20px">Qty Tersedia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($laporan_logistik as $laporan) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $laporan->tanggal_entry ?></td>
                                    <td><?= $laporan->nama_barang ?></td>
                                    <td><?= $laporan->qty_awal ?></td>
                                    <td><?= $laporan->qty_masuk ?></td>
                                    <td><?= $laporan->qty_keluar ?></td>
                                    <td><?= $laporan->qty_tersedia ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>