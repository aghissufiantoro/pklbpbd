<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_partials/head') ?>
</head>

<body>
  <?php $this->load->view('front/_partials/support') ?>

  <!-- Spinner Start -->
  <?php $this->load->view('front/_partials/loading') ?>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <?php $this->load->view('front/_partials/header') ?>
  <!-- Navbar End -->


  <?php $this->load->view('front/_partials/page/visi_misi') ?>
  <?php $this->load->view('front/_partials/survey') ?>
  <?php $this->load->view('front/_partials/breaking-news') ?>


  <?php $this->load->view('front/_partials/footer') ?>

  <!-- Back to Top -->
  <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->


  <?php $this->load->view('front/_partials/js') ?>
</body>

</html>