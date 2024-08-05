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


  <?php $this->load->view('front/_partials/page/edukasi') ?>
  <div style="width:100%;display:flex;flex-direction:column;gap:8px;min-height:635px;"><iframe src="https://quizizz.com/embed/quiz/661f23a1222011e2133dd9f2" title="Kebencanaan - Quizizz" style="flex:1;" frameBorder="0" allowfullscreen></iframe><a href="https://quizizz.com/admin?source=embedFrame" target="_blank">Explore more at Quizizz.</a></div>
  <?php $this->load->view('front/_partials/survey') ?>

  <?php $this->load->view('front/_partials/footer') ?>

  <!-- Back to Top -->
  <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->


  <?php $this->load->view('front/_partials/js') ?>
</body>

</html>
