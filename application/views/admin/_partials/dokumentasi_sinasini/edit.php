
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Ubah Data dokumentasi SINA SINI</h4>
				<p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
				<form id="addForm" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_dokumentasi_sinasini" value="<?= $dokumentasi_sinasini->id_dokumentasi_sinasini ?>">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="nama_kegiatan_sinasini" class="form-label">Nama Kegiatan</label>
							<input id="nama_kegiatan_sinasini" class="form-control" name="nama_kegiatan_sinasini" type="text" value="<?= $dokumentasi_sinasini->nama_kegiatan_sinasini ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="lokasi_dokumentasi_sinasini" class="form-label">Lokasi</label>
							<input id="lokasi_dokumentasi_sinasini" class="form-control" name="lokasi_dokumentasi_sinasini" type="text" value="<?= $dokumentasi_sinasini->lokasi_dokumentasi_sinasini ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="alamat_dokumentasi_sinasini" class="form-label">Alamat</label>
							<input id="alamat_dokumentasi_sinasini" class="form-control" name="alamat_dokumentasi_sinasini" type="text" value="<?= $dokumentasi_sinasini->alamat_dokumentasi_sinasini ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="tgl_dokumentasi_sinasini" class="form-label">Tanggal</label>
							<div class="input-group date datepicker" id="datePickerExample">
								<input type="text" class="form-control" name="tgl_dokumentasi_sinasini" required autocomplete="off" value="<?= $dokumentasi_sinasini->tgl_dokumentasi_sinasini ?>">
								<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="mb-3">
							<label for="video_dokumentasi_sinasini" class="form-label">Video Kegiatan</label>
							<input id="video_dokumentasi_sinasini" class="form-control" name="video_dokumentasi_sinasini" type="text" value="<?= $dokumentasi_sinasini->video_dokumentasi_sinasini ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi_sinasini" class="form-label">File Cover</label>
							<button type="button" class="btn btn-outline-warning" data-bs-target="#view_cover-<?= $dokumentasi_sinasini->id_dokumentasi_sinasini ?>" data-bs-toggle="modal">
								<i class="far fa-file-image"></i> Lihat Cover
							</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi_sinasini" class="form-label">File Dokumentasi_sinasini</label>
							<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $dokumentasi_sinasini->id_dokumentasi_sinasini ?>" data-bs-toggle="modal">
								<i class="far fa-file-image"></i> Lihat Dokumentasi_sinasini
							</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<div class="form-check">
								<label class="form-check-label" for="termsCheck">
									Saya menyetujui bahwa file yang dirubah adalah benar
								</label>
								<input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
							</div>
						</div>
					</div>
					<a href="<?= base_url("admin/dokumentasi_sinasini") ?>">
						<input class="btn btn-warning" type="button" value="Kembali">
					</a>
					<input class="btn btn-primary" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="view_images-<?= $dokumentasi_sinasini->id_dokumentasi_sinasini ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel2"><?= $dokumentasi_sinasini->nama_kegiatan_sinasini ?></h5>
				<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php
					$images = json_decode($dokumentasi_sinasini->dok_dokumentasi_sinasini);
					if (is_array($images)) {
						foreach ($images as $image) {
							?>
							<div class="col-md-4 mb-3">
								<img src="<?= base_url('upload/dokumentasi_sinasini/' . $image) ?>" class="img-fluid" alt="<?= $dokumentasi_sinasini->nama_kegiatan_sinasini ?>">
							</div>
							<?php
						}
					} else {
						?>
						<div class="col-md-4 mb-3">
							<img src="<?= base_url('upload/dokumentasi_sinasini/' . $dokumentasi_sinasini->dok_dokumentasi_sinasini) ?>" class="img-fluid" alt="<?= $dokumentasi_sinasini->nama_kegiatan_sinasini ?>">
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="view_cover-<?= $dokumentasi_sinasini->id_dokumentasi_sinasini ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel2">Cover <?= $dokumentasi_sinasini->nama_kegiatan_sinasini ?></h5>
				<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img class="img-fluid" src="<?= base_url('upload/dokumentasi_sinasini/' . $dokumentasi_sinasini->thumbnail_dokumentasi_sinasini) ?>">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>