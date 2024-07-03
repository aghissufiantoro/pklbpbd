<?php
if ($this->session->flashdata('success')) {
	?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>SUKSES!</strong> Data dokumentasi telah ditambahkan.
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
	</div>
	<?php
}
?>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tambah Data dokumentasi</h4>
				<p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
				<form id="addForm" action="" method="post" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
							<input id="nama_kegiatan" class="form-control" name="nama_kegiatan" type="text">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="lokasi_dokumentasi" class="form-label">Lokasi</label>
							<input id="lokasi_dokumentasi" class="form-control" name="lokasi_dokumentasi" type="text" placeholder="Nama tempat kegiatan, seperti SDN Wonorejo VI atau BPBD Surabaya">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="alamat_dokumentasi" class="form-label">Alamat</label>
							<input id="alamat_dokumentasi" class="form-control" name="alamat_dokumentasi" type="text" placeholder="Alamat tempat kegiatan">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="tgl_dokumentasi" class="form-label">Tanggal</label>
							<div class="input-group date datepicker" id="datePickerExample">
								<input type="text" class="form-control" name="tgl_dokumentasi" required autocomplete="off">
								<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="narasumber" class="form-label">Narasumber</label>
							<input id="narasumber" class="form-control" name="narasumber" type="text">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="video_dokumentasi" class="form-label">Video Kegiatan</label>
							<input id="video_dokumentasi" class="form-control" name="video_dokumentasi" type="text" placeholder="Berupa link video youtube seperti    https://www.youtube.com/watch?v=fvlc-ewp4VU    atau     https://youtu.be/fvlc-ewp4VU?si=GKJVt-RTErNGHCFT">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="thumbnail_dokumentasi" class="form-label">Cover</label>
							<input type="file" name="thumbnail_dokumentasi" id="myDropify" accept="image/*"/>
							<small style="font-style: italic;" class="text-danger">*Harap masukkan foto dengan format
								16:9 (landscape)</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi" class="form-label">Upload Dokumentasi</label>
							<input type="file" name="dok_dokumentasi[]" class="form-control" id="dok_dokumentasi" accept="image/*" multiple/>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<div class="form-check">
								<label class="form-check-label" for="termsCheck">
									Saya menyetujui bahwa file yang diupload adalah benar dan tidak dapat dirubah
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