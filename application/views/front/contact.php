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
                      <a href="https://www.google.com/maps/dir//Jl.+Jemursari+Tim.+II+No.2,+Jemur+Wonosari,+Kec.+Wonocolo,+Surabaya,+Jawa+Timur+60237/@-7.3216028,112.7010725,13z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2dd7fb17958e2ef5:0xa6093e97d9ed114e!2m2!1d112.742619!2d-7.3242493?hl=in-ID&entry=ttu" class="text-white">
                          <i class="fa fa-map-marker-alt text-white"></i>
                      </a>
                  </div>
                  <div class="ms-3">
                      <h6>Kantor BPBD Kota Surabaya</h6>
                      <span>Jl. Jemursari Tim. II No. 2, Surabaya</span>
                  </div>
              </div>
              <div class="d-flex border-bottom pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="tel:112">
                          <i class="fa fa-phone-alt text-white"></i>
                      </a>
                  </div>
                  <div class="ms-3">
                      <h6>Panggil Kami</h6>
                      <span>112</span>
                  </div>
              </div>
              <div class="d-flex border-bottom-0 pb-3 mb-3">
                  <div class="flex-shrink-0 btn-square bg-primary rounded-circle">
                      <a href="mailto:bpbd@surabaya.go.id" class="text-white">
                          <i class="fa fa-envelope text-white"></i>
                      </a>
                  </div>
                  <div class="ms-3">
                      <h6>E-Mail</h6>
                      <span>bpbd@surabaya.go.id</span>
                  </div>
              </div>

            <iframe class="w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2653549481897!2d112.74210401246492!3d-7.324063069976452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb17958e2ef5%3A0xa6093e97d9ed114e!2sBPBD%20Kota%20Surabaya!5e0!3m2!1sid!2sid!4v1687247031910!5m2!1sid!2sid" frameborder="0" style="height: 500px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->
    <?php $this->load->view('front/_partials/js') ?>
    <?php $this->load->view('front/_partials/survey') ?>
  <?php $this->load->view('front/_partials/footer') ?>
  

  <!-- Back to Top -->
  <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->


 
</body>

</html>