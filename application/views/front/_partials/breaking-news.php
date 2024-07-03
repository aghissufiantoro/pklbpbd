<div class="container-xxl pt-5">
  <div class="container">
    <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <p class="fs-5 fw-medium text-primary">Breaking News</p>
      <h1 class="display-5 mb-5">Berita Terbaru BPBD Kota Surabaya</h1>
    </div>
    <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
      <?php
        function limit_words($string, $word_limit)
        {
            $words = explode(" ", $string);
            return implode(" ", array_splice($words, 0, $word_limit));
        }

        $berita_db = $this->db->query("SELECT * FROM artikel ORDER BY tgl_artikel DESC LIMIT 10")->result();
        foreach ($berita_db as $berita_res)
        {
          ?>
          <div class="project-item mb-5">
            <div class="position-relative">
              <img class="img-fluid" src="<?= base_url('upload/kegiatan/'.$berita_res->foto_artikel) ?>" alt="<?= $berita_res->judul_artikel ?>">
              <div class="project-overlay">
                <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?= base_url('upload/kegiatan/'.$berita_res->foto_artikel) ?>" data-lightbox="project">
                  <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?= base_url('artikel/'.$berita_res->slug_artikel) ?>">
                  <i class="fa fa-link"></i>
                </a>
              </div>
            </div>
            <div class="p-4">
              <a class="d-block h5" href="<?= base_url('artikel/'.$berita_res->slug_artikel) ?>"><?= $berita_res->judul_artikel ?></a>
              <span><?= limit_words($berita_res->isi_artikel, 30) ?>...</span>
            </div>
          </div>
          <?php
        }
      ?>
    </div>
  </div>
</div>