<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
	<div class="container text-center py-5">
		<h1 class="display-2 text-white mb-4 animated slideInDown">Dokumentasi Kota Surabaya</h1>
	</div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
	<style>
        .btn-secondary {
            background-color: white;
        }

        .thumbnail-wrapper {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            overflow: hidden;
        }

        .thumbnail-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .filter-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            max-width: 100%;
            margin-right: 1rem;
            flex-wrap: wrap;
        }

        .search-bar {
            flex: 0 0 345px;
        }

        .date-filter {
            flex: 0 0 150px;
        }

        .search-bar input {
            width: 100%;
        }

        .clear-button {
            margin-left: 0.5rem;
        }

        @media (max-width: 768px) {
            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container {
                flex-direction: column;
                align-items: stretch;
                margin-right: 0;
            }

            .search-bar,
            .date-filter {
                flex: 1 0 100%;
            }

            .clear-button {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }

	</style>
	<div class="container">


		<!-- Filter by Date -->
		<?php
		$start_date = $_GET['start_date'] ?? '';
		$end_date = $_GET['end_date'] ?? '';

		// Pagination variables
		$limit_per_page = 12;
		$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
		$start = ($page - 1) * $limit_per_page;

		// search query
		$searchQuery = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';

		$total_documents_query = "SELECT COUNT(*) as total FROM dokumentasi WHERE 1=1";
		if (!empty($start_date) && !empty($end_date)) {
			$total_documents_query .= " AND DATE(tgl_dokumentasi) BETWEEN '$start_date' AND '$end_date'";
		}
		if (!empty($searchQuery)) {
			$total_documents_query .= " AND nama_kegiatan LIKE '%$searchQuery%'";
		}
		$total_documents = $this->db->query($total_documents_query)->row()->total;

		// Fetch documents for the current page
		$documents_query = "SELECT * FROM dokumentasi WHERE 1=1";
		if (!empty($start_date) && !empty($end_date)) {
			$documents_query .= " AND DATE(tgl_dokumentasi) BETWEEN '$start_date' AND '$end_date'";
		}
		if (!empty($searchQuery)) {
			$documents_query .= " AND (nama_kegiatan LIKE '%$searchQuery%' OR lokasi_dokumentasi LIKE '%$searchQuery%')";
		}
		$documents_query .= " ORDER BY tgl_dokumentasi DESC LIMIT $start, $limit_per_page";
		$documents = $this->db->query($documents_query)->result();


		?>


		<!-- Filter and Search Bar Start -->
		<form method="GET" action="">
			<div class="filter-container">
				<div class="search-container">
					<button class="btn btn-primary" type="submit">Cari</button>
					<div class="search-bar">
						<input type="text" class="form-control" name="search" placeholder="Cari kegiatan atau lokasi..." value="<?= $searchQuery ?>">
					</div>
					<input type="date" id="startDate" class="form-control date-filter" name="start_date" value="<?= $start_date ?>">
					<input type="date" id="endDate" class="form-control date-filter" name="end_date" value="<?= $end_date ?>">
				</div>
				<?php if ($start_date || $end_date || $searchQuery): ?>
					<a href="<?= strtok($_SERVER['REQUEST_URI'], '?') ?>" class="btn btn-outline-danger clear-button">Clear</a>
				<?php endif; ?>
			</div>
		</form>

		<!-- Filter and Search Bar End -->

		<script>
            function applyDateFilter() {
                var startDate = document.getElementById('startDate').value;
                var endDate = document.getElementById('endDate').value;
                window.location.href = "?start_date=" + startDate + "&end_date=" + endDate;
            }

            document.addEventListener('DOMContentLoaded', function () {
                // Add event listeners to all modals
                document.querySelectorAll('.modal').forEach(function (modal) {
                    modal.addEventListener('hidden.bs.modal', function () {
                        // Find the iframe inside the modal
                        var iframe = modal.querySelector('iframe');
                        if (iframe) {
                            // Reset the iframe src to stop the video
                            var src = iframe.src;
                            iframe.src = src;
                        }
                    });
                });
            });
		</script>


		<div class="row">
			<?php foreach ($documents as $document): ?>
				<div class="col-md-4 mb-3">
					<div class="card">
						<div class="thumbnail-wrapper">
							<img data-bs-target="#view_pdf-<?= $document->id_dokumentasi ?>"
							     data-bs-toggle="modal"
							     src="<?= base_url('upload/dokumentasi/' . $document->thumbnail_dokumentasi) ?>"
							     alt="<?= $document->nama_kegiatan ?>">
						</div>
						<div class="card-body">
							<span class="badge bg-secondary"><?= $document->lokasi_dokumentasi ?></span>
							<p class="card-text" style="cursor: pointer;"
							   data-bs-target="#view_pdf-<?= $document->id_dokumentasi ?>"
							   data-bs-toggle="modal"><?= $document->nama_kegiatan ?></p>
						</div>
					</div>
					<div class="modal fade" id="view_pdf-<?= $document->id_dokumentasi ?>"
					     tabindex="-1" aria-labelledby="exampleModalToggleLabel2" aria-hidden="true">
						<div class="modal-dialog modal-xl">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"><?= $document->nama_kegiatan ?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<div class="details-container mb-3">
										<p><strong>Nama Kegiatan:</strong> <?= $document->nama_kegiatan ?></p>
										<p><strong>Narasumber:</strong> <?= $document->narasumber ?></p>
										<p><strong>Lokasi:</strong> <?= $document->lokasi_dokumentasi ?></p>
										<p><strong>Alamat:</strong> <?= $document->alamat_dokumentasi ?></p>
										<p><strong>Tanggal:</strong> <?= date('d M Y', strtotime($document->tgl_dokumentasi)) ?></p>
										<p><strong>Video:</strong></p>
										<?php if ($document->video_dokumentasi):
											// Convert YouTube URL to embed URL
											$videoUrl = $document->video_dokumentasi;
											$embedUrl = '';

											if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|.+\?v=))([^\&\?\/]+)/', $videoUrl, $matches)) {
												$embedUrl = "https://www.youtube.com/embed/" . $matches[1];
											} elseif (preg_match('/^[a-zA-Z0-9_-]{11}$/', $videoUrl)) {
												$embedUrl = "https://www.youtube.com/embed/" . $videoUrl;
											}

											if ($embedUrl): ?>
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="<?= htmlspecialchars($embedUrl) ?>" allowfullscreen></iframe>
												</div>
											<?php else: ?>
												<p>Invalid video URL</p>
											<?php endif; ?>
										<?php else: ?>
											<p>Tidak ada video</p>
										<?php endif; ?>
									</div>
									<hr>
									<!-- Foto dokumentasi -->
									<div class="row">
										<?php
										$images = json_decode($document->dok_dokumentasi);
										if (is_array($images)) {
											foreach ($images as $image) {
												echo '<div class="col-md-4 mb-3 px-2"><img src="' . base_url('upload/dokumentasi/' . $image) . '" class="img-fluid"></div>';
											}
										} else {
											echo '<div class="col-12 mb-3 px-2"><img src="' . base_url('upload/dokumentasi/' . $document->dok_dokumentasi) . '" class="img-fluid"></div>';
										}
										?>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php
		$total_pages = ceil($total_documents / $limit_per_page);
		$visible_pages = 5;
		$start_page = max(1, $page - floor($visible_pages / 2));
		$end_page = min($total_pages, $start_page + $visible_pages - 1);
		$baseUrl = strtok($_SERVER['REQUEST_URI'], '?');
		$baseUrl .= "?";

		if (!empty($start_date)) {
			$baseUrl .= "start_date=$start_date&";
		}
		if (!empty($end_date)) {
			$baseUrl .= "end_date=$end_date&";
		}
		if (!empty($searchQuery)) {
			$baseUrl .= "search=$searchQuery&";
		}
		?>

		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
					<a class="page-link" href="<?= $baseUrl ?>page=<?= max(1, $page - 1) ?>" tabindex="-1" aria-disabled="true">
						Previous
					</a>
				</li>

				<?php for ($i = $start_page; $i <= $end_page; $i++): ?>
					<li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
						<a class="page-link" href="<?= $baseUrl ?>page=<?= $i ?>"><?= $i ?></a>
					</li>
				<?php endfor; ?>

				<li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
					<a class="page-link" href="<?= $baseUrl ?>page=<?= min($total_pages, $page + 1) ?>">Next</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<!-- Contact End -->
