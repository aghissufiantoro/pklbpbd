<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="REK REK">
  <meta name="author" content="ESCAO">
  <meta name="keywords" content="iki surabaya rek">

  <title>BPBD - Login</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>vendors/core/core.css">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>fonts/feather-font/css/iconfont.css">
  <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>vendors/flag-icon-css/css/flag-icon.min.css">
  <!-- endinject -->

  <!-- Layout styles -->  
  <link rel="stylesheet" href="<?= base_url('assets_admin/') ?>css/demo1/style.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="<?= base_url('image/logo_bpbd.png') ?>">
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- <?= $script_captcha ?> -->
</head>
<body>
  <div class="main-wrapper">
    <div class="page-wrapper full-page">
      <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
          <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card" style="border-radius: 30px;">
              <div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper" style="background-image: url(<?= base_url("image/DJI_0503.JPG") ?>); border-top-left-radius: 30px; border-bottom-left-radius: 30px;">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <form method="post" role="form" id="myEvent" action="<?= base_url('login/aksi_login') ?>">
                    <div class="auth-form-wrapper px-4 py-5">
                      <a href="#" class="noble-ui-logo d-block mb-2">BPBD <span>Kota Surabaya</span></a>
                      <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                      <?php
                        if ($this->session->flashdata('gagal'))
                        {
                          ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>INVALID!</strong> Username atau Password yang Anda masukkan SALAH!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                          </div>
                          <?php
                        }

                        if ($this->session->flashdata('captcha_error'))
                        {
                          ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>CAPTCHA INVALID!</strong> Silahkan centang bagian captcha
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                          </div>
                          <?php
                        }
                      ?>
                          
                      <form class="forms-sample">
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                          <!-- <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> -->
                          <!-- <?= $captcha ?> -->
                        </div>
                        <!-- <div class="form-check mb-3">
                          <input type="checkbox" class="form-check-input" id="authCheck">
                          <label class="form-check-label" for="authCheck">
                            Remember me
                          </label>
                        </div> -->
                        <div>
                          <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Login</button>
                          <!-- <button type="button" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                            <i class="btn-icon-prepend" data-feather="twitter"></i>
                            Login with twitter
                          </button> -->
                        </div>
                      </form>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- core:js -->
  <script src="<?= base_url('assets_admin/') ?>vendors/core/core.js"></script>
  <!-- endinject -->

  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->

  <!-- inject:js -->
  <script src="<?= base_url('assets_admin/') ?>vendors/feather-icons/feather.min.js"></script>
  <script src="<?= base_url('assets_admin/') ?>js/template.js"></script>
  <!-- endinject -->

  <!-- Custom js for this page -->
  <!-- End custom js for this page -->

</body>
</html>