<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h6 class="card-title">Data Review</h6>
				<p class="text-muted mb-3">Data berisi review pengunjung website BPBD Surabaya</p>
				<div class="table-responsive">
					<table id="dataTableExample" class="table">
						<thead>
						<tr>
							<th width="20px">No</th>
							<th width="50px">Nama</th>
							<th width="300px">Isi Review</th>
							<th width="20px">Rating</th>
							<th width="20px">Tampilkan</th>
							<th width="20px">#</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$db_review = $this->db->query("SELECT * FROM review ORDER BY id DESC")->result();
						foreach ($db_review as $res_review) {

							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $res_review->nama ?></td>
								<td><?= $res_review->isi_review ?></td>
								<td><?= $res_review->rating ?></td>
								<td>
									<form method="post" action="<?= site_url('admin/review/update_review_status') ?>" class="review-form">
										<input type="hidden" name="review_id" value="<?= $res_review->id ?>">
										<select name="tampilkan" onchange="this.form.submit()" class="review-select" data-current-value="<?= $res_review->tampilkan ?>">
											<option value="1" <?= $res_review->tampilkan == 1 ? 'selected' : '' ?>>Ya</option>
											<option value="0" <?= $res_review->tampilkan == 0 ? 'selected' : '' ?>>Tidak</option>
										</select>
									</form>
								</td>
								<td>
									<a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_review->id ?>" class="ms-3 btn btn-outline-danger btn-xs">
										<i class="fal fa-trash-alt"></i></a>
									<div class="modal fade" id="deleteConfirm<?= $res_review->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN
														INGIN MENGHAPUS REVIEW INI?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body ">
													Review yang akan dihapus adalah milik <strong><?= htmlspecialchars($res_review->nama, ENT_QUOTES, 'UTF-8') ?></strong>
												</div>
												<div class="modal-footer d-flex align-items-center">
													<a href="<?= base_url('admin/review/delete/' . $res_review->id) ?>" class="btn btn-outline-danger">
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
