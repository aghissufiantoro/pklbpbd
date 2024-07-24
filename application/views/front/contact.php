<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_partials/head') ?>
</head>

<body>
  <?php $this->load->view('front/_partials/support') ?>

  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <?php $this->load->view('front/_partials/header') ?>
  <!-- Navbar End -->

  <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Contact Us</h1>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
          <p class="fs-5 fw-medium text-primary">Kontak Kami</p>
          <h1 class="display-5 mb-5">Jika Anda perlu bantuan kami, Silahkan Kontak Kami</h1>
        </div>
        <div class="row g-5">
          <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
            <h3 class="mb-4">Contact Details</h3>
              <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="https://www.google.com/maps/dir//Jl.+Jemursari+Tim.+II+No.2,+Jemur+Wonosari,+Kec.+Wonocolo,+Surabaya,+Jawa+Timur+60237/@-7.3225733,112.7316827,18.46z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd7fbec92c3f0a1:0x6ed86a88c742f8e9!2m2!1d112.7321457!2d-7.3223395" target="_blank" rel="noreferrer"><i class="bi bi-geo-alt-fill text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">Office</h6>
                      <span>Jl. Jemursari Timur II No. 2, Surabaya 60237</span>
                  </div>
              </div>
              <!-- <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="https://wa.me/62811321323" target="_blank" rel="noreferrer"><i class="bi bi-whatsapp text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">WhatsApp</h6>
                      <span>0811 3213 23</span>
                  </div>
              </div> -->
              <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="tel:+623199860466"><i class="bi bi-telephone-fill text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">Telepon</h6>
                      <span>(031) 99860466</span>
                  </div>
              </div>
              <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="mailto:bpbdsurabaya@gmail.com" target="_blank" rel="noreferrer"><i class="bi bi-envelope-fill text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">Email</h6>
                      <span>bpbdsurabaya@gmail.com</span>
                  </div>
              </div>
              <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="https://instagram.com/bpbdsurabaya" target="_blank" rel="noreferrer"><i class="bi bi-instagram text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">Instagram</h6>
                      <span>@bpbdsurabaya</span>
                  </div>
              </div>
              <!-- <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="https://www.facebook.com/bpbdsurabaya" target="_blank" rel="noreferrer"><i class="bi bi-facebook text-white"></i></a>
                  </div>
                  <div class="ms-4">
                      <h6 class="mb-2">Facebook</h6>
                      <span>@bpbdsurabaya</span>
                  </div>
              </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
    <?php $this->load->view('front/_partials/footer') ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>
    <?php $this->load->view('front/_partials/js') ?>
    <?php $this->load->view('front/_partials/survey') ?>
</body>
</html>
