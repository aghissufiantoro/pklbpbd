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

  <!-- Topbar Start -->
  <?php $this->load->view('front/_partials/topbar') ?>
  <!-- Topbar End -->

  <!-- Navbar Start -->
  <?php $this->load->view('front/_partials/header') ?>
  <!-- Navbar End -->


  <!-- Carousel Start -->
  <?php $this->load->view('front/_partials/carousel') ?>
  <!-- Carousel End -->


  <!-- Features Start -->
  <?php $this->load->view('front/_partials/pra-bencana') ?>
  <!-- Features End -->


  <!-- About Start -->
  <?php $this->load->view('front/_partials/about') ?>
  <!-- About End -->


  <!-- Video Modal Start -->
  <?php $this->load->view('front/_partials/video') ?>
  <!-- Video Modal End -->


  <!-- Service Start -->
  <!-- <div class="container-xxl py-5">
      <div class="container">
          <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
              <p class="fs-5 fw-medium text-primary">Our Services</p>
              <h1 class="display-5 mb-5">Digital Marketing Services that We Offer</h1>
          </div>
          <div class="row g-4">
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-5.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">Digital Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-6.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">Internet Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-7.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">Content Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-8.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">Social Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-9.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">B2B Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                  <div class="service-item position-relative h-100">
                      <div class="service-text rounded p-5">
                          <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                              style="width: 64px; height: 64px;">
                              <img class="img-fluid" src="<?= base_url('assets_frontend/') ?>img/icon/icon-10.png" alt="Icon">
                          </div>
                          <h5 class="mb-3">E-mail Marketing</h4>
                              <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam
                                  stet</p>
                      </div>
                      <div class="service-btn rounded-0 rounded-bottom">
                          <a class="text-primary fw-medium" href="">Read More<i
                                  class="bi bi-chevron-double-right ms-2"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div> -->
  <!-- Service End -->


  <!-- Project Start -->
  <?php $this->load->view('front/_partials/breaking-news') ?>
  <!-- Project End -->


  <!-- Team Start -->
  <?php $this->load->view('front/_partials/team') ?>
  <!-- Team End -->


  <!-- Quote Start -->
  <?php $this->load->view('front/_partials/laporan') ?>
  <!-- Quote Start -->


  <!-- Testimonial Start -->
  <?php //$this->load->view('front/_partials/survey_kepuasan') ?>
  <!-- Testimonial End -->
  
  <!-- About Start -->
  <?php $this->load->view('front/_partials/feedback') ?>  
  <!-- About End -->
  <?php $this->load->view('front/_partials/survey') ?>  
  <?php $this->load->view('front/_partials/footer') ?>

  <!-- Back to Top -->
  <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->


  <?php $this->load->view('front/_partials/js') ?>
</body>

</html>