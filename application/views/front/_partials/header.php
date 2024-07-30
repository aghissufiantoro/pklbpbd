<div class="container-fluid bg-white sticky-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
      <a href="index.html" class="navbar-brand d-lg-none">
        <h1 class="fw-bold m-0" style="color: #E87715;">BPBD Kota Surabaya</h1>
      </a>
      <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
          <a href="<?= base_url('view') ?>" <?php if ($this->uri->segment(1) == "") {echo 'class="nav-item nav-link active"';} else {echo 'class="nav-item nav-link"';} ?>>Home</a>
          <div class="nav-item dropdown">
            <a href="#" <?php if ($this->uri->segment(2) == "visi_misi" || $this->uri->segment(2) == "tugas_pokok" || $this->uri->segment(2) == "struktur") {echo 'class="nav-link dropdown-toggle active"';} else {echo 'class="nav-link dropdown-toggle"';} ?> data-bs-toggle="dropdown">Profil</a>
            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
              <a href="<?= base_url('view/visi_misi') ?>" <?php if ($this->uri->segment(2) == "visi_misi") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Visi Misi</a>
              <a href="<?= base_url('view/tugas_pokok') ?>" <?php if ($this->uri->segment(2) == "tugas_pokok") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Tugas Pokok</a>
              <a href="<?= base_url('view/struktur') ?>" <?php if ($this->uri->segment(2) == "struktur") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Struktur Organisasi</a>
            </div>
          </div>
          <a href="<?= base_url('view/layanan') ?>" <?php if ($this->uri->segment(2) == "layanan") {echo 'class="nav-item nav-link active"';} else {echo 'class="nav-item nav-link"';} ?>>Layanan</a>
          <a href="<?= base_url('view/edukasi') ?>" <?php if ($this->uri->segment(2) == "edukasi") {echo 'class="nav-item nav-link active"';} else {echo 'class="nav-item nav-link"';} ?>>Edukasi</a>
          <div class="nav-item dropdown">
            <a href="#" <?php if ($this->uri->segment(2) == "rpjmd" || $this->uri->segment(2) == "renstra" || $this->uri->segment(2) == "laporan_tahunan" || $this->uri->segment(2) == "hukum_kebencanaan" || $this->uri->segment(2) == "dok_pb" || $this->uri->segment(2) == "edukasi_kebencanaan") {echo 'class="nav-link dropdown-toggle active"';} else {echo 'class="nav-link dropdown-toggle"';} ?> data-bs-toggle="dropdown" data-bs-toggle="dropdown">Perpustakaan</a>
            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
             <!-- <a href="<?= base_url('view/rpjmd') ?>" <?php if ($this->uri->segment(2) == "rpjmd") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>RPJMD</a> 
              <a href="<?= base_url('view/renstra') ?>" <?php if ($this->uri->segment(2) == "renstra") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Renstra</a> -->
                <a href="<?= base_url('view/perpus_artikel') ?>" <?php if ($this->uri->segment(2) == "perpus_artikel") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Artikel</a>
                <a href="<?= base_url('view/dokumentasi') ?>" <?php if ($this->uri->segment(2) == "dokumentasi") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Dokumentasi Sosialisasi Mitigasi Bencana</a>
                <a href="<?= base_url('view/edukasi_kebencanaan') ?>" <?php if ($this->uri->segment(2) == "edukasi_kebencanaan") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Edukasi Bencana Usia Dini</a>
                <a href="<?= base_url('view/dok_pb') ?>" <?php if ($this->uri->segment(2) == "dok_pb") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Dok. Penanggulangan Bencana</a>
                <a href="<?= base_url('view/laporan') ?>" <?php if ($this->uri->segment(2) == "laporan") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Laporan</a>
                <a href="<?= base_url('view/hukum_kebencanaan') ?>" <?php if ($this->uri->segment(2) == "hukum_kebencanaan") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Peraturan Perundangan</a>
<<<<<<< HEAD
                <a href="<?= base_url('view/edukasi_kebencanaan') ?>" <?php if ($this->uri->segment(2) == "edukasi_kebencanaan") {echo 'class="dropdown-item active"';} else {echo 'class="dropdown-item"';} ?>>Edukasi Kebencanaan</a>
=======
>>>>>>> aghis-contact_update
            </div>
          </div>
          <!-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dokumen Mitigasi</a>
            <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
              <a href="<?= base_url('view/rekam_kejadian') ?>" class="dropdown-item">Rekam Kejadian Bencana</a>
              <a href="<?= base_url('view/infografi') ?>" class="dropdown-item">Infografi</a>
            </div>
          </div> -->
          <a href="<?= base_url('view/lokasi_pos') ?>" <?php if ($this->uri->segment(2) == "lokasi_pos") {echo 'class="nav-item nav-link active"';} else {echo 'class="nav-item nav-link"';} ?>>Lokasi POS</a>
          <a href="<?= base_url('view/contact') ?>" <?php if ($this->uri->segment(2) == "contact") {echo 'class="nav-item nav-link active"';} else {echo 'class="nav-item nav-link"';} ?>>Contact</a>
        </div>
        <div class="ms-auto d-none d-lg-block">
            <a href="tel:112" class="btn btn-primary rounded-pill py-2 px-3" aria-label="Call emergency services">
                <i class="fa fa-phone-alt me-3"></i>Call: 112
            </a>
        </div>
      </div>
    </nav>
  </div>
</div>
