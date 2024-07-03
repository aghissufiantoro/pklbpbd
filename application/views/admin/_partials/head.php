<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="IKI BPBD REK">
<meta name="author" content="Warung Ngarep">
<meta name="keywords" content="surabaya">

<title>BPBD Kota Surabaya</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- End fonts -->

<?php

	if (($this->uri->segment(2) == "lokasi_pos" AND ($this->uri->segment(3) == "add" OR $this->uri->segment(3) == "edit")))
	{
		?>
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
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="crossorigin=""/>
		<link rel="stylesheet" href="<?=base_url()?>assets_admin/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
		<!-- End plugin css for this page -->

		<!-- inject:css -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>fonts/feather-font/css/iconfont.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/flag-icon-css/css/flag-icon.min.css">
		<!-- endinject -->

	  <!-- Layout styles -->  
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>css/demo1/style.css">
	  <!-- End layout styles -->

	  	<link rel="shortcut icon" href="<?= base_url("image/logo_bpbd.png") ?>" />
		<?php
	}
	else
	{
		?>
		<!-- core:css -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/core/core.css">
		<!-- endinject -->

		<!-- Plugin css for this page -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/datatables.net-bs5/dataTables.bootstrap5.css">
		<!-- End plugin css for this page -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/simplemde/simplemde.min.css">
		<!-- inject:css -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>fonts/feather-font/css/iconfont.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/flag-icon-css/css/flag-icon.min.css">
		<!-- endinject -->

		<!-- Layout styles -->  
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>css/demo1/style.css">
		<!-- End layout styles -->
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/select2/select2.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/jquery-tags-input/jquery.tagsinput.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/dropzone/dropzone.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/dropify/dist/dropify.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/bootstrap-colorpicker/bootstrap-colorpicker.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url('assets_frontend/fontawesome-free/css/all.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url('assets_frontend/fontawesome-pro/css/all.min.css') ?>">
		<link rel="stylesheet" href="<?= base_url("assets_admin/") ?>vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">
		<link rel="stylesheet" href="<?= base_url('assets_admin/') ?>vendors/sweetalert2/sweetalert2.min.css">
		<link rel="shortcut icon" href="<?= base_url("image/logo_bpbd.png") ?>" />
		<link rel="stylesheet" href="<?= base_url('assets_admin/') ?>https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
		
		<?php
	}
?>

		