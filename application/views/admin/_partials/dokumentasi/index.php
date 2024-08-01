<!-- <nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Tables</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data Table</li>
	</ol>
</nav> -->

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-title">
				<div style="margin: 20px;">
					<a href="<?= base_url("admin/dokumentasi/add") ?>">
						<button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
					</a>
				</div>
			</div>
			<div class="card-body">
				<h6 class="card-title">Data dokumentasi BPBD Kota Surabaya</h6>
				<p class="text-muted mb-3">Data berisi data data yang ada di BPBD Kota Surabaya</p>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
						<tr>
							<th width="20px">No</th>
							<th width="50px">Nama Kegiatan</th>
							<th width="30px">Lokasi</th>
							<th width="30px">Alamat</th>
							<th width="20px">Tanggal</th>
							<th width="20px">Narasumber</th>
							<th width="40px">Link Video Dokumentasi</th>
							<th width="20px">Dokumentasi</th>
							<th width="20px">Edit</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$db_dokumentasi = $this->db->query("SELECT * FROM dokumentasi ORDER BY date_created DESC")->result();
						foreach ($db_dokumentasi as $res_dokumentasi) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $res_dokumentasi->nama_kegiatan ?></td>
								<td><?= $res_dokumentasi->lokasi_dokumentasi ?></td>
								<td><?= $res_dokumentasi->alamat_dokumentasi ?></td>
								<td><?= $res_dokumentasi->tgl_dokumentasi ?></td>
								<td><?= $res_dokumentasi->narasumber ?></td>
								<td><a href="<?= htmlspecialchars($res_dokumentasi->video_dokumentasi, ENT_QUOTES, 'UTF-8') ?>" target="_blank">Video Dokumentasi</a></td>
								<td>
									<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $res_dokumentasi->id_dokumentasi ?>" data-bs-toggle="modal">
										<i class="far fa-file-image"></i> Lihat Foto
									</button>
								</td>
								<td>
									<a href="<?= site_url('admin/dokumentasi/edit/' . $res_dokumentasi->id_dokumentasi) ?>" class="btn btn-outline-primary btn-xs">
										<i class='fal fa-pencil'></i></a>
									<a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_dokumentasi->id_dokumentasi ?>" class="ms-3 btn btn-outline-danger btn-xs">
										<i class="fal fa-trash-alt"></i></a>
									<div class="modal fade" id="deleteConfirm<?= $res_dokumentasi->id_dokumentasi ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN
														INGIN MENGHAPUS DATA INI?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Data yang akan dihapus adalah data dokumentasi yang
													berjudul <?= $res_dokumentasi->nama_kegiatan ?>
												</div>
												<div class="modal-footer d-flex align-items-center">
													<a href="<?= base_url('admin/dokumentasi/delete/' . $res_dokumentasi->id_dokumentasi) ?>" class="btn btn-outline-danger">
														<i class="fad fa-trash-alt"></i>
													</a>
													<button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal">
														<i class="fa fa-times"></i> Cancel
													</button>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<div class="modal fade" id="view_images-<?= $res_dokumentasi->id_dokumentasi ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalToggleLabel2"><?= $res_dokumentasi->nama_kegiatan ?></h5>
											<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												$images = json_decode($res_dokumentasi->dok_dokumentasi);
												if (is_array($images)) {
													foreach ($images as $image) {
														?>
														<div class="col-md-4 mb-3">
															<img src="<?= base_url('upload/dokumentasi/' . $image) ?>" class="img-fluid" alt="<?= $res_dokumentasi->nama_kegiatan ?>">
														</div>
														<?php
													}
												} else {
													?>
													<div class="col-md-4 mb-3">
														<img src="<?= base_url('upload/dokumentasi/' . $res_dokumentasi->dok_dokumentasi) ?>" class="img-fluid" alt="<?= $res_dokumentasi->nama_kegiatan ?>">
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
