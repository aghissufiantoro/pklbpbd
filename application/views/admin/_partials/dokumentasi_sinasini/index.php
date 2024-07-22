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
					<a href="<?= base_url("admin/dokumentasi_sinasini/add") ?>">
						<button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
					</a>
				</div>
			</div>
			<div class="card-body">
				<h6 class="card-title">Data dokumentasi SINA-SINI BPBD Kota Surabaya</h6>
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
							<th width="40px">Link Video Dokumentasi</th>
							<th width="20px">Dokumentasi</th>
							<th width="20px">Edit</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$db_dokumentasi_sinasini = $this->db->query("SELECT * FROM dokumentasi_sinasini")->result();
						foreach ($db_dokumentasi_sinasini as $res_dokumentasi_snn) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->lokasi_dokumentasi_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->alamat_dokumentasi_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->tgl_dokumentasi_sinasini ?></td>
								<td><a href="<?= htmlspecialchars($res_dokumentasi_snn->video_dokumentasi_sinasini, ENT_QUOTES, 'UTF-8') ?>" target="_blank">Video Dokumentasi</a></td>
								<td>
									<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" data-bs-toggle="modal">
										<i class="far fa-file-image"></i> Lihat Foto
									</button>
								</td>
								<td>
									<a href="<?= site_url('admin/dokumentasi_sinasini/edit/' . $res_dokumentasi_snn->id_dokumentasi_sinasini) ?>" class="btn btn-outline-primary btn-xs">
										<i class='fal fa-pencil'></i></a>
									<a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" class="ms-3 btn btn-outline-danger btn-xs">
										<i class="fal fa-trash-alt"></i></a>
									<div class="modal fade" id="deleteConfirm<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN
														INGIN MENGHAPUS DATA INI?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Data yang akan dihapus adalah data dokumentasi yang
													berjudul <?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?>
												</div>
												<div class="modal-footer d-flex align-items-center">
													<a href="<?= base_url('admin/dokumentasi_sinasini/delete/' . $res_dokumentasi_snn->id_dokumentasi_sinasini) ?>" class="btn btn-outline-danger">
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
							<div class="modal fade" id="view_images-<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalToggleLabel2"> <?= $res_dokumentasi_snn-> nama_kegiatan_sinasini ?></h5>
											<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												$images = json_decode($res_dokumentasi_snn->dok_dokumentasi_sinasini);
												if (is_array($images)) {
													foreach ($images as $image) {
														?>
														<div class="col-md-4 mb-3">
															<img src="<?= base_url('upload/dokumentasi_sinasini/' . $image) ?>" class="img-fluid" alt="<?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?>">
														</div>
														<?php
													}
												} else {
													?>
													<div class="col-md-4 mb-3">
														<img src="<?= base_url('upload/dokumentasi_sinasini/' . $res_dokumentasi_snn->dok_dokumentasi_sinasini) ?>" class="img-fluid" alt="<?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?>">
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
