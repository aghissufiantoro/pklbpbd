<?php
$id_kejadian = $this->uri->segment(4);

$db_data_kejadian = $this->db->query("SELECT * FROM kejadian WHERE id_kejadian = ?", array($id_kejadian))->row();

if ($db_data_kejadian) {
?>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h6>Laporan Data Kejadian di Kota Surabaya</h6>
                </div>
                <div class="kejadian-details">
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="ms-3">
                            <ol>
                                <li>Tanggal Kejadian: <?= $db_data_kejadian->tanggal ?></li>
                                <li>Kejadian: <?= $db_data_kejadian->kejadian ?></li>
                                <li>Deskripsi Kejadian: <?= $db_data_kejadian->deskripsi_kejadian ?></li>
                                <li>Lokasi Kejadian: <?= $db_data_kejadian->lokasi_kejadian ?></li>
                                <li>Waktu Berita: <?= $db_data_kejadian->waktu_berita ?></li>
                                <li>Waktu Tiba: <?= $db_data_kejadian->waktu_tiba ?></li>
                            </ol>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Keterangan Subjek yang Terlibat</p>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Usia</th>
                                        <th>Status Kependudukan</th>
                                        <th>Alamat KTP</th>
                                        <th>Keterlibatan Subjek</th>
                                        <th>Objek</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?= $db_data_kejadian->nama ?></td>
                                        <td><?= $db_data_kejadian->jenis_kelamin ?></td>
                                        <td><?= $db_data_kejadian->usia ?></td>
                                        <td><?= $db_data_kejadian->status_kependudukan ?></td>
                                        <td><?= $db_data_kejadian->alamat_ktp ?></td>
                                        <td><?= $db_data_kejadian->keterlibatan_subjek ?></td>
                                        <td><?= $db_data_kejadian->objek ?></td>
                                        <td><?= $db_data_kejadian->kondisi_subjek ?></td>
                                        <td><?= $db_data_kejadian->keterangan_kondisi ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="ms-3">
                            <ol>
                                <li>Kronologi: <?= $db_data_kejadian->kronologi ?></li>
                                <li>Catatan Tindaklanjut: <?= $db_data_kejadian->catatan_tindaklanjut ?></li>
                                <li>Petugas Lapangan: <?= $db_data_kejadian->petugas_lapangan ?></li>
                                <li>Lokasi Kejadian: <?= $db_data_kejadian->lokasi_kejadian ?></li>
                                <li>Alamat Lengkap Kejadian: <?= $db_data_kejadian->alamat_kejadian ?></li>
                                <li class="dokumentasi-section">Dokumentasi:</li>
                                <?php if ($db_data_kejadian->dokumentasi): ?>
                                    <li>
                                        <img src="<?= base_url('upload/dokumentasi/' . $db_data_kejadian->dokumentasi) ?>" alt="Dokumentasi Kejadian">
                                    </li>
                                <?php else: ?>
                                    <li>Tidak ada dokumentasi.</li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
} else {
    echo "<p>Data kejadian tidak ditemukan.</p>";
}
?>
