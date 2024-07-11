<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Plot Kegiatan di Kota Surabaya</h6>
                <p class="text-muted mb-3">Data Plot Kegiatan di Pemerintah Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="20px">ID Penugasan</th>
                                <th width="30px">ID Kegiatan</th>
                                <th width="30px">ID Petugas</th>
                                <th width="20px">Lokasi Kegiatan</th>
                                <th width="20px">Tanggal</th>
                                <th width="20px">Shift</th>
                                <th width="20px">No WA</th>
                                <th width="20px">Laporan</th>
                                <th width="20px">Dokumentasi</th>
                                <th width="20px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $penugasan_petugas = $this->db->query("SELECT * FROM tabel_penugasan_petugas")->result();
                            foreach ($penugasan_petugas as $penugasan) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?php echo $penugasan->id_penugasan; ?></td>
                                    <td><?php echo $penugasan->id_kegiatan; ?></td>
                                    <td><?php echo $penugasan->id_petugas; ?></td>
                                    <td><?php echo $penugasan->lokasi_kegiatan; ?></td>
                                    <td><?php echo $penugasan->tanggal; ?></td>
                                    <td><?php echo $penugasan->shift; ?></td>
                                    <td><?php echo $penugasan->uraian_kegiatan; ?></td>
                                    <td><?php echo $penugasan->no_wa; ?></td>
                                    <td>
									<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $penugasan->id_penugasan ?>" data-bs-toggle="modal">
										<i class="far fa-file-image"></i> Lihat Foto
									</button>
								    </td>
                                    <td>
                                        <a href="<?= site_url('admin/data_kejadian/edit/' . $penugasan->id_penugasan) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                                        <a href="<?= site_url('admin/data_kejadian/detail/' . $penugasan->id_penugasan) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-list-ul'></i></a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $penugasan->id_penugasan ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                                        <div class="modal fade" id="deleteConfirm<?= $penugasan->id_penugasan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data yang akan dihapus adalah <?= $penugasan->id_penugasan ?>
                                                    </div>
                                                    <div class="modal-footer d-flex align-items-center">
                                                        <a href="<?= base_url('admin/data_kejadian/delete/' . $penugasan->id_penugasan) ?>" class="btn btn-outline-danger">
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