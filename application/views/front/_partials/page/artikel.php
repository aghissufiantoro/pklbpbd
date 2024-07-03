<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
	<div class="container text-center py-5">
		<h1 class="display-2 text-white mb-4 animated slideInDown">Laporan Keuangan BPBD Kota Surabaya</h1>
	</div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
	<style>
        .fixed-size-image {
            width: 300px;
            height: 250px;
            object-fit: cover;
        }

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
            justify-content: space-between;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .search-container {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            flex-wrap: wrap;
        }

        .search-bar {
            flex: 0 0 300px;
        }

        .search-bar input {
            width: 100%;
        }

        .dropdown {
            flex: 0 0 auto;
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
            }

            .search-bar,
            .dropdown {
                flex: 1 0 100%;
                margin-bottom: 0.5rem;
            }

            .clear-button {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }
	</style>

	<div class="container">
		<form method="GET" action="">
			<div class="filter-container">
				<div class="search-container">
					<button class="btn btn-primary" type="submit">Cari</button>
					<div class="search-bar">
						<input type="text" class="form-control" name="search" placeholder="Cari berdasarkan judul" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
					</div>
					<?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
						<a href="<?= strtok($_SERVER['REQUEST_URI'], '?') ?>" class="btn btn-outline-danger clear-button">Clear</a>
					<?php endif; ?>
				</div>
				<?php
				$categories = $this->db->query("SELECT DISTINCT jenis_artikel FROM artikel")->result();
				?>
				<div class="dropdown">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="jenisartikelDropdown" data-bs-toggle="dropdown" aria-expanded="false">
						Pilih Jenis Artikel
					</button>
					<ul class="dropdown-menu" aria-labelledby="jenisartikelDropdown">
						<?php foreach ($categories as $category) { ?>
							<li>
								<a class="dropdown-item" href="?jenis_artikel=<?= $category->jenis_artikel ?>"><?= $category->jenis_artikel ?></a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</form>

		<div class="row">
			<?php
			//limit words
			function limit_words($string, $word_limit)
			{
				$words = explode(" ", $string);
				return implode(" ", array_splice($words, 0, $word_limit));
			}

			$limit_per_page = 12;
			$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
			$searchQuery = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
			$jenis_artikel = isset($_GET['jenis_artikel']) ? $_GET['jenis_artikel'] : '';

			// base URL utk pagination
			$baseUrl = strtok($_SERVER['REQUEST_URI'], '?') . "?";
			if (!empty($jenis_artikel)) {
				$baseUrl .= "jenis_artikel=$jenis_artikel&";
			}
			if (!empty($searchQuery)) {
				$baseUrl .= "search=$searchQuery&";
			}

			//  total artikel
			$total_articles_query = "SELECT COUNT(*) as total FROM artikel WHERE 1=1";
			if (!empty($jenis_artikel)) {
				$total_articles_query .= " AND jenis_artikel = '$jenis_artikel'";
			}
			if (!empty($searchQuery)) {
				$total_articles_query .= " AND judul_artikel LIKE '%$searchQuery%'";
			}

			$total_articles = $this->db->query($total_articles_query)->row()->total;
			$start = ($page - 1) * $limit_per_page;


			// Get artikel
			$db_artikel_query = "SELECT * FROM artikel WHERE 1=1";
			if (!empty($jenis_artikel)) {
				$db_artikel_query .= " AND jenis_artikel = '$jenis_artikel'";
			}
			if (!empty($searchQuery)) {
				$db_artikel_query .= " AND judul_artikel LIKE '%$searchQuery%'";
			}
			$db_artikel_query .= " ORDER BY tgl_artikel DESC LIMIT $start, $limit_per_page";
			$db_artikel = $this->db->query($db_artikel_query)->result();
			foreach ($db_artikel as $berita_res) {
				?>
				<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
					<div class="project-item">
						<div class="position-relative">
							<img class="fixed-size-image" src="<?= base_url('upload/kegiatan/' . $berita_res->foto_artikel) ?>" alt="<?= $berita_res->judul_artikel ?>">
							<div class="project-overlay">
								<a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?= base_url('upload/kegiatan/' . $berita_res->foto_artikel) ?>" data-lightbox="project">
									<i class="fa fa-eye"></i>
								</a>
								<a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?= base_url('artikel/' . $berita_res->slug_artikel) ?>">
									<i class="fa fa-link"></i>
								</a>
							</div>
						</div>
						<div class="p-4">
							<a class="d-block h5" href="<?= base_url('artikel/' . $berita_res->slug_artikel) ?>"><?= $berita_res->judul_artikel ?></a>
							<span><?= limit_words($berita_res->isi_artikel, 30) ?>...</span>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<?php
			$total_pages = ceil($total_articles / $limit_per_page);
			$visible_pages = 5;
			$start_page = max(1, $page - floor($visible_pages / 2));
			$end_page = min($total_pages, $start_page + $visible_pages - 1);
			?>
			<nav aria-label="Page navigation">
				<ul class="pagination justify-content-center">
					<li class="page-item <?= ($page == 1) ? 'disabled' : '' ?>">
						<a class="page-link" href="?<?= isset($jenis_artikel) ? "jenis_artikel=$jenis_artikel&" : '' ?>page=<?= max(1, $page - 1) ?>" tabindex="-1" aria-disabled="true">
							Previous
						</a>
					</li>

					<?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
						<li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
							<a class="page-link" href="?<?= isset($jenis_artikel) ? "jenis_artikel=$jenis_artikel&" : '' ?>page=<?= $i ?>"><?= $i ?></a>
						</li>
					<?php } ?>

					<li class="page-item <?= ($page == $total_pages) ? 'disabled' : '' ?>">
						<a class="page-link" href="?<?= isset($jenis_artikel) ? "jenis_artikel=$jenis_artikel&" : '' ?>page=<?= min($total_pages, $page + 1) ?>">
							Next
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
