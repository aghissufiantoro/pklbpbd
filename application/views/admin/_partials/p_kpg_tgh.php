<div class="col-md-12">
  <div class="ibox">
    <div class="ibox-title text-info">
      <i class="fad fa-info"></i> Jadwal Monitoring Kampung Tangguh dan Wedang Rempah
    </div>
    <div class="ibox-content">
      <?php
        // if ($this->session->userdata('username') == "kpg_tgh")
        // {
        //   # code...
        // }
      ?>
      <?php
        $tg = date('Y-m-d', time() + (60 * 60 * 24));
        $nw = date('Y-m-d');
        $dy = date('d');
        $mn = date('m');
        $yr = date('Y');

        $hu = "2020-08-01";
        $gg = $this->db->query("SELECT * FROM p_kpg_tgh pkp
                               INNER JOIN pegawai pgw ON pkp.id_peg = pgw.id_peg
                               INNER JOIN pl_kpg_tgh jdw ON pkp.id_piket = jdw.id_piket
                               WHERE jdw.tgl_piket = '".$tg."'")->result();

        $ww = $this->db->query("SELECT * FROM p_kpg_tgh pkp
                               INNER JOIN pegawai pgw ON pkp.id_peg = pgw.id_peg
                               INNER JOIN pl_kpg_tgh jdw ON pkp.id_piket = jdw.id_piket")->result();

        $tm = $this->db->query("SELECT * FROM p_kpg_tgh pkp
                               INNER JOIN pegawai pgw ON pkp.id_peg = pgw.id_peg
                               INNER JOIN pl_kpg_tgh jdw ON pkp.id_piket = jdw.id_piket
                               WHERE jdw.tgl_piket = '".$tg."'")->row();

        $qq = $this->db->query("SELECT * FROM p_kpg_tgh pkp
                               INNER JOIN pegawai pgw ON pkp.id_peg = pgw.id_peg
                               INNER JOIN pl_kpg_tgh jdw ON pkp.id_piket = jdw.id_piket
                               WHERE jdw.tgl_piket = '".$nw."'")->result();

        $t3 = $this->db->query("SELECT * FROM p_kpg_tgh pkp
                               INNER JOIN pegawai pgw ON pkp.id_peg = pgw.id_peg
                               INNER JOIN pl_kpg_tgh jdw ON pkp.id_piket = jdw.id_piket
                               WHERE jdw.tgl_piket = '".$nw."'")->row();

        if ($this->session->userdata('username') == "kpg_tgh")
        {
          $rr = $this->db->query("SELECT * FROM kpg_tgh WHERE DAY(tgl_kpg) = '".$dy."' AND MONTH(tgl_kpg) = '".$mn."' and YEAR(tgl_kpg) = '".$yr."'")->result();
          if (count($rr) > 0)
          {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong style="font-size: 20px;"><i class="fad fa-badge-check"></i> SUKSES! <i class="fad fa-badge-check"></i></strong> <br>
              Petugas Kampung Tangguh Semeru Wani Jogo Suroboyo Hari Ini ( <?= indonesian_date($nw, 'l, d F Y') ?> ) <b>Telah Melakukan Laporan</b>.
              <p>
                <ol>
                  <?php
                    foreach ($qq as $now)
                    {
                      ?>
                      <li><?= $now->nama_peg ?></li>
                      <?php
                    }
                  ?>
                </ol>
              </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          }
          else
          {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong style="font-size: 20px;"><i class="fad fa-exclamation-triangle"></i> PERINGATAN! <i class="fad fa-exclamation-triangle"></i></strong><br>
              Petugas Kampung Tangguh Semeru Wani Jogo Suroboyo Hari Ini di <b><?= $t3->tmp_piket ?></b> ( <?= indonesian_date($nw, 'l, d F Y') ?> ) <b>Belum Melakukan Laporan</b>.
              <p>
                <ol>
                  <?php
                    foreach ($qq as $now)
                    {
                      ?>
                      <li><?= $now->nama_peg ?></li>
                      <?php
                    }
                  ?>
                </ol>
              </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
          }
        }
      ?>

      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong style="font-size: 20px;"><i class="fad fa-exclamation-triangle"></i> PERHATIAN! <i class="fad fa-exclamation-triangle"></i></strong> <br>
        <?php
        ?>
        Untuk petugas monitoring KAMPUNG TANGGUH SEMERU WANI JOGO SUROBOYO <b><?= indonesian_date($tg, 'l, d F Y') ?></b> di <?= $tm->tmp_piket ?>.
        <p>
          <ol>
            <?php

              foreach ($gg as $ky)
              {
                ?>
                <li><?= $ky->nama_peg ?></li>
                <?php
              }
            ?>
                
          </ol>
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-review">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Tanggal Piket</th>
              <th>Tempat Piket</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              foreach ($ww as $nama)
              {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $nama->nama_peg ?></td>
                  <td><?= indonesian_date($nama->tgl_piket, 'l, d F Y') ?></td>
                  <td><?= $nama->tmp_piket ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <!-- <img class="img-thumbnail" style="height: 500px; width: 100%;" src="<?= base_url('upload/kegiatan/56079.jpg') ?>"><br>
      <img class="img-thumbnail" style="height: 500px; width: 100%;" src="<?= base_url('upload/kegiatan/56080.jpg') ?>"><br>
      <img class="img-thumbnail" style="height: 500px; width: 100%;" src="<?= base_url('upload/kegiatan/56081.jpg') ?>"> -->
    </div>
  </div>
</div>