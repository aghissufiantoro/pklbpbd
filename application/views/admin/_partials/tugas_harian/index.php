<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-title">
                <div style="margin: 20px;">
                    <a href="<?= base_url("admin/tugas_harian/add") ?>">
                        <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-title">Tugas Harian Staff BPBD Kota Surabaya</h6>
                <p class="text-muted mb-3">Data berisi tugas harian Staff BPBD Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="20px">ID Tugas Harian</th>
                                <th width="20px">Nama Staff</th>
                                <th width="30px">Tanggal</th>
                                <th width="20px">Waktu</th>
                                <th width="20px">Lokasi</th>
                                <th width="20px">Uraian Kegiatan</th>
                                <th width="30px">Penanggung Jawab</th>
                                <th width="20px">Hasil Kegiatan</th>
                                <th width="20px">Dokumentasi</th>
                                <th width="20px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $tugas_harian = $this->db->query("SELECT * FROM tugas_harian")->result();
                            foreach ($tugas_harian as $tugas) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $tugas->id_tugas_harian; ?></td>
                                    <td><?= $tugas->nama_staff; ?></td>
                                    <td><?= $tugas->tanggal; ?></td>
                                    <td><?= $tugas->waktu; ?></td>
                                    <td><?= $tugas->lokasi; ?></td>
                                    <td><?= $tugas->uraian_kegiatan; ?></td>
                                    <td><?= $tugas->penanggung_jawab; ?></td>
                                    <td><?= $tugas->hasil_kegiatan; ?></td>
                                    <td><?= $tugas->dokumentasi; ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/tugas_harian/edit/' . $tugas->id_tugas_harian) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $tugas->id_tugas_harian ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                                        <div class="modal fade" id="deleteConfirm<?= $tugas->id_tugas_harian ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data yang akan dihapus adalah <?= $tugas->id_tugas_harian ?>
                                                    </div>
                                                    <div class="modal-footer d-flex align-items-center">
                                                        <a href="<?= base_url('admin/tugas_harian/delete/' . $tugas->id_tugas_harian) ?>" class="btn btn-outline-danger">
                                                            <i class="fad fa-trash-alt"></i>
                                                        </a>
                                                        <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
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