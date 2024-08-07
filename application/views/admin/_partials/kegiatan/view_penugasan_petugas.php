<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Giat Personil BPBD Kota Surabaya</h6>
                <p class="text-muted mb-3">Data Giat Personil di BPBD Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="20px">Jenis Kompi</th>
                                <th width="30px">Jarko</th>
                                <th width="30px">Nama Petugas</th>
                                <th width="20px">Waktu Kegiatan</th>
                                <th width="20px">Tanggal</th>
                                <th width="20px">Shift</th>
                                <th width="20px">Kegiatan</th>
                                <th width="20px">Lokasi Kegiatan</th>
                                <th width="20px">No WA</th>
                                <th width="20px">Uraian Kegiatan</th>
                                <th width="20px">Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $penugasan_petugas = $this->db->query("SELECT * FROM tabel_penugasan_petugas ORDER BY tanggal DESC")->result();
                            $penugasan_petugas = $this->db->query("SELECT * FROM tabel_penugasan_petugas ORDER BY tanggal DESC")->result();
                            foreach ($penugasan_petugas as $penugasan) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?php echo $penugasan->jenis_kompi; ?></td>
                                    <td><?php echo $penugasan->id_jarko; ?></td>
                                    <td><?php echo $penugasan->id_petugas; ?></td>
                                    <td><?php echo $penugasan->waktu_kegiatan; ?></td>
                                    <td><?php echo $penugasan->tanggal; ?></td>
                                    <td><?php echo $penugasan->shift; ?></td>
                                    <td><?php echo $penugasan->kegiatan; ?></td>
                                    <td><?php echo $penugasan->lokasi_kegiatan; ?></td>
                                    <td><?php echo $penugasan->no_wa; ?></td>
                                    <td><?php echo $penugasan->keterangan; ?></td>
                                    <td>
									<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $penugasan->id_penugasan ?>" data-bs-toggle="modal">
										<i class="far fa-file-image"></i> Lihat Foto
									</button>
								    </td>
                                </tr>
                                <div class="modal fade" id="view_images-<?= $penugasan->id_penugasan ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalToggleLabel2">Dokumentasi</h5>
											<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												$images = json_decode($penugasan->dokumentasi);
												if (is_array($images)) {
													foreach ($images as $image) {
														?>
														<div class="col-md-4 mb-3">
															<img src="<?= base_url('upload/kegiatan/' . $image) ?>" class="img-fluid" alt="Dokumentasi">
														</div>
														<?php
													}
												} else {
													?>
													<div class="col-md-4 mb-3">
														<img src="<?= base_url('upload/kegiatan/' . $penugasan->dokumentasi) ?>" class="img-fluid" alt="Dokumentasi">
													</div>
													<?php
												}
												?>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">
												Kembali
											</button>
										</div>
									</div>
								</div>
							</div>
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