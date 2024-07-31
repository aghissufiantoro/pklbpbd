
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Tambah Data dokumentasi Sina Sini</h4>
				<p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
				<form id="addForm" action="<?php echo site_url('admin/dokumentasi_sinasini/add') ?>" method="post" enctype="multipart/form-data">
					<div class="col-md-12">
						<div class="mb-3">
							<label for="nama_kegiatan_sinasini" class="form-label">Nama Kegiatan</label>
							<input id="nama_kegiatan_sinasini" class="form-control" name="nama_kegiatan_sinasini" type="text">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="lokasi_dokumentasi_sinasini" class="form-label">Lokasi</label>
							<input id="lokasi_dokumentasi_sinasini" class="form-control" name="lokasi_dokumentasi_sinasini" type="text" placeholder="Nama tempat kegiatan, seperti SDN Wonorejo VI atau BPBD Surabaya">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="alamat_dokumentasi_sinasini" class="form-label">Alamat</label>
							<input id="alamat_dokumentasi_sinasini" class="form-control" name="alamat_dokumentasi_sinasini" type="text" placeholder="Alamat tempat kegiatan">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="tgl_dokumentasi_sinasini" class="form-label">Tanggal</label>
							<div class="input-group date datepicker" id="datePickerExample">
								<input type="text" class="form-control" name="tgl_dokumentasi_sinasini" required autocomplete="off">
								<span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="video_dokumentasi_sinasini" class="form-label">Video Kegiatan</label>
							<input id="video_dokumentasi_sinasini" class="form-control" name="video_dokumentasi_sinasini" type="text" placeholder="Berupa link video youtube seperti    https://www.youtube.com/watch?v=fvlc-ewp4VU    atau     https://youtu.be/fvlc-ewp4VU?si=GKJVt-RTErNGHCFT">
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="thumbnail_dokumentasi_sinasini" class="form-label">Cover</label>
							<input type="file" name="thumbnail_dokumentasi_sinasini" id="myDropify" accept="image/*"/>
							<small style="font-style: italic;" class="text-danger">*Harap masukkan foto dengan format
								16:9 (landscape)</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mb-3">
							<label for="dok_dokumentasi_sinasini" class="form-label">Upload Dokumentasi</label>
							<input type="file" name="dok_dokumentasi_sinasini[]" class="form-control" id="dok_dokumentasi_sinasini" accept="image/*" multiple/>
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
					<a href="<?= base_url("admin/dokumentasi_sinasini") ?>">
						<input class="btn btn-warning" type="button" value="Kembali">
					</a>
					<input class="btn btn-primary" type="submit" value="Submit">
					</form>
			</div>
		</div>
	</div>
</div>