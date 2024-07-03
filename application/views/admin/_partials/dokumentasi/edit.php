<?php
if ($this->session->flashdata('success')) {
	?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>SUKSES!</strong> Data dokumentasi telah dirubah.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
	</div>
	<?php
}
?>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Ubah Data dokumentasi</h4>
				<p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
				<form id="addForm" action="" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_dokumentasi" value="<?= $dokumentasi->id_dokumentasi ?>">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
							<input id="nama_kegiatan" class="form-control" name="nama_kegiatan" type="text" value="<?= $dokumentasi->nama_kegiatan ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="lokasi_dokumentasi" class="form-label">Lokasi</label>
							<input id="lokasi_dokumentasi" class="form-control" name="lokasi_dokumentasi" type="text" value="<?= $dokumentasi->lokasi_dokumentasi ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="alamat_dokumentasi" class="form-label">Alamat</label>
							<input id="alamat_dokumentasi" class="form-control" name="alamat_dokumentasi" type="text" value="<?= $dokumentasi->alamat_dokumentasi ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="tgl_dokumentasi" class="form-label">Tanggal</label>
							<div class="input-group date datepicker" id="datePickerExample">
								<input type="text" class="form-control" name="tgl_dokumentasi" required autocomplete="off" value="<?= $dokumentasi->tgl_dokumentasi ?>">
								<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="narasumber" class="form-label">Narasumber</label>
							<input id="narasumber" class="form-control" name="narasumber" type="text" value="<?= $dokumentasi->narasumber ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="video_dokumentasi" class="form-label">Video Kegiatan</label>
							<input id="video_dokumentasi" class="form-control" name="video_dokumentasi" type="text" value="<?= $dokumentasi->video_dokumentasi ?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi" class="form-label">File Cover</label>
							<button type="button" class="btn btn-outline-warning" data-bs-target="#view_cover-<?= $dokumentasi->id_dokumentasi ?>" data-bs-toggle="modal">
								<i class="far fa-file-image"></i> Lihat Cover
							</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi" class="form-label">File Dokumentasi</label>
							<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $dokumentasi->id_dokumentasi ?>" data-bs-toggle="modal">
								<i class="far fa-file-image"></i> Lihat Dokumentasi
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
					<a href="<?= base_url("admin/dokumentasi") ?>">
						<input class="btn btn-warning" type="button" value="Kembali">
					</a>
					<input class="btn btn-primary" type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="view_images-<?= $dokumentasi->id_dokumentasi ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel2"><?= $dokumentasi->nama_kegiatan ?></h5>
				<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php
					$images = json_decode($dokumentasi->dok_dokumentasi);
					if (is_array($images)) {
						foreach ($images as $image) {
							?>
							<div class="col-md-4 mb-3">
								<img src="<?= base_url('upload/dokumentasi/' . $image) ?>" class="img-fluid" alt="<?= $dokumentasi->nama_kegiatan ?>">
							</div>
							<?php
						}
					} else {
						?>
						<div class="col-md-4 mb-3">
							<img src="<?= base_url('upload/dokumentasi/' . $dokumentasi->dok_dokumentasi) ?>" class="img-fluid" alt="<?= $dokumentasi->nama_kegiatan ?>">
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
<div class="modal fade" id="view_cover-<?= $dokumentasi->id_dokumentasi ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalToggleLabel2">Cover <?= $dokumentasi->nama_kegiatan ?></h5>
				<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<img class="img-fluid" src="<?= base_url('upload/dokumentasi/' . $dokumentasi->thumbnail_dokumentasi) ?>">
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-bs-target="#alur_pelayanan" data-bs-toggle="modal">Kembali</button>
			</div>
		</div>
	</div>
</div>