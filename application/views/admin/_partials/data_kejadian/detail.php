<?php
$id_kejadian = $this->uri->segment(4);

// Query to get the data kejadian based on id_kejadian
$db_data_kejadian = $this->db->query("SELECT * FROM data_kejadian WHERE id_kejadian = ?", array($id_kejadian))->row();

// Determine the table name based on the value of the kejadian column
$kejadian = $db_data_kejadian->kejadian;

if ($kejadian == 'Kecelakaan Lalu Lintas') {
    $table = 'form_laka';
} elseif ($kejadian == 'Darurat Medis') {
    $table = 'form_darurat_medis';
} elseif ($kejadian == 'Kebakaran') {
    $table = 'form_kebakaran';
} elseif ($kejadian == 'Pohon Tumbang') {
    $table = 'form_pohon_tumbang';
} elseif ($kejadian == 'Penemuan Jenazah') {
    $table = 'form_penemuan_jenazah';
} elseif ($kejadian == 'Orang Tenggelam') {
    $table = 'form_orang_tenggelam';
} else {
    $table = 'form_lain';
}

// Query to get the korban kejadian based on the dynamically determined table
$db_korban_kejadian = $this->db->query("SELECT * FROM $table WHERE id_kejadian = ?", array($id_kejadian))->result();
if ($db_data_kejadian ) {
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
                                <li>Kronologi Kejadian: <?= $db_data_kejadian->kronologi ?></li>
                                <li>Lokasi Kejadian: <?= $db_data_kejadian->lokasi_kejadian ?></li>
                                <li>Waktu Berita: <?= $db_data_kejadian->waktu_berita ?></li>
                                <li>Waktu Tiba: <?= $db_data_kejadian->waktu_tiba ?></li>
                            </ol>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-3">Keterangan Subjek yang Terlibat</p>
                        <div class="table-responsive">
                        
                        <?php if(count($db_korban_kejadian) > 0): ?>
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <?php foreach ($db_korban_kejadian[0] as $column => $value): ?>
                                            <th><?= $column ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($db_korban_kejadian as $korban): ?>
                                        <tr>
                                            <?php foreach ($korban as $value): ?>
                                                <td><?= htmlspecialchars($value) ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p>Tidak ada data korban</p>
                        <?php endif; ?>
                       
                        </div>
                    </div>

                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="ms-3">
                            <ol>
                                <li>Kronologi: <?= $db_data_kejadian->kronologi ?></li>
                                <li>Catatan Tindaklanjut: <?= $db_data_kejadian->tindak_lanjut ?></li>
                                <li>Petugas Lapangan: <?= $db_data_kejadian->petugas_lokasi ?></li>
                                <li>Lokasi Kejadian: <?= $db_data_kejadian->lokasi_kejadian ?></li>
                                <li>Alamat Lengkap Kejadian: <?= $db_data_kejadian->alamat_kejadian ?></li>
                                <li class="dokumentasi-section">Dokumentasi:</li>
                                <?php if ($db_data_kejadian->dokumentasi): ?>
                                    <li>
                                        <img src="<?= base_url($db_data_kejadian->dokumentasi) ?>" alt="Dokumentasi Kejadian">
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
