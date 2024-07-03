<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="IKI BULAK REK">
	<meta name="author" content="Raihan Habib Dhiaulhaq">
	<meta name="keywords" content="iki bulak rek, bulak, surabaya">

	<title>SURVEY - IKI BULAK REK</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!-- End fonts -->
	<!-- core:css -->
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/select2/select2.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/jquery-tags-input/jquery.tagsinput.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/dropzone/dropzone.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/dropify/dist/dropify.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>css/demo1/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="<?= base_url("image/logo_bpbd.png") ?>" />
</head>
<body>
	<div class="main-wrapper">

		<nav class="sidebar">
		  <div class="sidebar-header">
		    <a href="#" class="sidebar-brand">
		      <!-- <img style="width: 70%;" src="<?= base_url('image/BPBD_Horizontal.png') ?>"> -->
		      <span>SI </span>2 TANG BEDA
		    </a>
		    <div class="sidebar-toggler not-active">
		      <span></span>
		      <span></span>
		      <span></span>
		    </div>
		  </div>
		  <div class="sidebar-body">
		    <ul class="nav">
		      <li class="nav-item nav-category">Main</li>
		      <li <?php if ($this->uri->segment(2) == "view") {echo 'class="nav-item active"';} else {echo 'class="nav-item"';} ?>>
		        <a href="<?= base_url("view") ?>" class="nav-link">
		          <i class="link-icon" data-feather="box"></i>
		          <span class="link-title">Kembali ke Halaman Utama</span>
		        </a>
		      </li>
		      <li class="nav-item nav-category">web apps</li>
		      <li <?php if ($this->uri->segment(2) == "survey") {echo 'class="nav-item active"';} else {echo 'class="nav-item"';} ?>>
		        <a href="<?= base_url('view/survey') ?>" class="nav-link">
		          <i class="link-icon" data-feather="message-square"></i>
		          <span class="link-title">Survey</span>
		        </a>
		      </li>
		      <li <?php if ($this->uri->segment(2) == "hasil_survey") {echo 'class="nav-item active"';} else {echo 'class="nav-item"';} ?>>
		        <a href="<?= base_url('view/hasil_survey') ?>" class="nav-link">
		          <i class="link-icon" data-feather="message-square"></i>
		          <span class="link-title">Hasil Survey</span>
		        </a>
		      </li>
		    </ul>
		  </div>
		</nav>
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<form class="search-form">
						<div class="input-group">
			        <div class="input-group-text">
			          <i data-feather="search"></i>
			        </div>
							<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
						</div>
					</form>
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="flag-icon flag-icon-id mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">Indonesia</span>
							</a>
			      </li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="<?= base_url('image/logo_bpbd.png') ?>" alt="Logo BPBD">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="<?= base_url('image/logo_bpbd.png') ?>" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">SI 2 TANG BEDA</p>
										<p class="tx-12 text-muted">Sistem Informasi Tanggap Tangguh Bencana Daerah</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-content">

				<?php $this->load->view("front/_partials/hasil_survey") ?>

			</div>

			<!-- partial:../../partials/_footer.html -->
			<?php $this->load->view("admin/_partials/footer") ?>
			<!-- partial -->
	
		</div>
	</div>

	<?php $this->load->view("admin/_partials/js") ?>

</body>
</html>