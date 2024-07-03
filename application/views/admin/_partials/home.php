<?php
  function formatAngka($angka)
  {
    $hasil = number_format($angka, 0, '.', '.');
    return $hasil;
  }
?>
<main class="content">
  <div class="container-fluid p-0">

    <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
        <h3><strong>Info</strong> Tentang Asemrowo</h3>
      </div>

      <div class="col-auto ml-auto text-right mt-n1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Info Tentang BPBD</li>
          </ol>
        </nav>
      </div>
    </div>

    <div style="text-align: center;">
      <img style="width: 60%;" src="<?= base_url('image/logov21.png') ?>">
    </div>

    <h1 style="text-align: center; margin-top: 10px;">SI ASIK</h1>
    <h4 style="text-align: center; margin-top: -10px; font-weight: normal;">
      <span style="font-weight: bold;">S</span>istem <span style="font-weight: bold;">I</span>nformasi <span style="font-weight: bold;">AS</span>emrowo as<span style="font-weight: bold;">IK</span>
    </h4>

    <div class="row">
      <?php //$this->load->view('admin/_partials/piket_pasar') ?>
      <?php //$this->load->view('admin/_partials/p_kpg_tgh') ?>
      <?php //$this->load->view('admin/_partials/dapur') ?>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-info">
              <i class="fad fa-info"></i> Info mengenai Kecamatan Asemrowo
            </h2>
            <p>Kecamatan Asemrowo terletak di wilayah <b>Surabaya Barat</b> dengan <b>LUAS: 1.347.840 Ha</b></p>
            <ol>
              <div class="row">
                <div class="col-md-6">
                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">Luas Wilayah</li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered table-hover">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Kelurahan</th>
                          <th>Luas</th>
                        </tr>              
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Tambak Sarioso</td>
                          <td>331.000 Ha</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Genting Kalianak</td>
                          <td>320.692 Ha</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Asemrowo</td>
                          <td>696.148 Ha</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                    

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">Batas Wilayah</li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered table-hover">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Batas</th>
                          <th>Wilayah</th>
                        </tr>              
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Sebelah Utara</td>
                          <td>Selat Madura</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Sebelah Timur</td>
                          <td>Kec. Krembangan dan Kec. Bubutan</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Sebelah Selatan</td>
                          <td>Kec. Sukomanunggal, Kec. Sawahan, Kec. Tandes</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Sebelah Barat</td>
                          <td>Kec. Tandes dan Benowo</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>                  

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Jumlah Penduduk Kelurahan se-Kecamatan Asemrowo
                  </li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered">
                    <thead style="text-align: center;">
                      <tr>
                        <th>No.</th>
                        <th>Kelurahan</th>
                        <th>Jenis Kelamin</th>
                        <th>Jumlah Penduduk</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Asemrowo</td>
                        <td><i class="fal fa-male"></i> Laki - Laki</td>
                        <td>17.417 Penduduk</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><i class="fal fa-female"></i> Perempuan</td>
                        <td>16.854 Penduduk</td>
                      </tr>

                      <tr>
                        <td>2</td>
                        <td>Genting Kalianak</td>
                        <td><i class="fal fa-male"></i> Laki - Laki</td>
                        <td>4.235 Penduduk</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><i class="fal fa-female"></i> Perempuan</td>
                        <td>4.113 Penduduk</td>
                      </tr>
                      
                      <tr>
                        <td>3</td>
                        <td>Tambak Sarioso</td>
                        <td><i class="fal fa-male"></i> Laki - Laki</td>
                        <td>3.680 Penduduk</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><i class="fal fa-female"></i> Perempuan</td>
                        <td>3.589 Penduduk</td>
                      </tr>
                      
                      <tr>
                        <td colspan="3">&nbsp;</td>
                        <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                      </tr>
                      
                      <tr>
                        <td colspan="2" style="text-align: center;"><b>KECAMATAN ASEMROWO</b></td>
                        <td><i class="fal fa-male"></i> Laki - Laki</td>
                        <td>25.332 Penduduk</td>
                      </tr>
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td><i class="fal fa-female"></i> Perempuan</td>
                        <td>24.556 Penduduk</td>
                      </tr>
                      
                      <tr>
                        <td colspan="3">&nbsp;</td>
                        <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                      </tr>
                      
                      <tr>
                        <td colspan="3" style="text-align: right;"><b>Total</b></td>
                        <td><b><i class="fal fa-grip-lines fa-rotate-90"></i> 49.888 <i class="fal fa-grip-lines fa-rotate-90"></i></b></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">Jumlah Lain-lain</li>
                  <table cellpadding="5" cellspacing="0" border="0">
                    <tr>
                      <td>PMKS</td>
                      <td>:</td>
                      <td style="text-align: center;">1.716</td>
                      <td>Orang</td>
                    </tr>
                    <tr>
                      <td>Pengurus TP PKK Kecamatan</td>
                      <td>:</td>
                      <td style="text-align: center;">26</td>
                      <td>Orang (L=5 P=21)</td>
                    </tr>
                    <tr>
                      <td>SK Focal Point PUG</td>
                      <td>:</td>
                      <td style="text-align: center;">11</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK PKBM</td>
                      <td>:</td>
                      <td style="text-align: center;">21</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Satgas Penanggulangan TB</td>
                      <td>:</td>
                      <td style="text-align: center;">79</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Tim Pembina UKS</td>
                      <td>:</td>
                      <td style="text-align: center;">8</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Tim Pembentukan GPAP</td>
                      <td>:</td>
                      <td style="text-align: center;">24</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Pembentukan Polijanal Posyandu</td>
                      <td>:</td>
                      <td style="text-align: center;">9</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Kelompok BKL</td>
                      <td>:</td>
                      <td style="text-align: center;">17</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Forum Anak Kecamatan</td>
                      <td>:</td>
                      <td style="text-align: center;">15</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Kader Responsive Gender</td>
                      <td>:</td>
                      <td style="text-align: center;">14</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Forum Kecamatan Sehat</td>
                      <td>:</td>
                      <td style="text-align: center;">19</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK KIM</td>
                      <td>:</td>
                      <td style="text-align: center;">29</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK PIK-R</td>
                      <td>:</td>
                      <td style="text-align: center;">15</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Kartar</td>
                      <td>:</td>
                      <td style="text-align: center;">38</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Pembentukan Satgas P4GN</td>
                      <td>:</td>
                      <td style="text-align: center;">16</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK ABK</td>
                      <td>:</td>
                      <td style="text-align: center;">1</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK IMP</td>
                      <td>:</td>
                      <td style="text-align: center;">15</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Pembentukan Kader Kesehatan Jiwa</td>
                      <td>:</td>
                      <td style="text-align: center;">4</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Bumantik</td>
                      <td>:</td>
                      <td style="text-align: center;">38</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Kader Paliatif</td>
                      <td>:</td>
                      <td style="text-align: center;">13</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK KRA</td>
                      <td>:</td>
                      <td style="text-align: center;">17</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK AKI/AKB</td>
                      <td>:</td>
                      <td style="text-align: center;">7</td>
                      <td>Orang / Anggota</td>
                    </tr>
                    <tr>
                      <td>SK Pembentukan Polijanal KAS</td>
                      <td>:</td>
                      <td style="text-align: center;">9</td>
                      <td>Orang / Anggota</td>
                    </tr>
                  </table>
                  
                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Penyandang Disabilitas
                  </li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Kelurahan</th>
                          <th>Jenis Kelamin</th>
                          <th>Jumlah Penduduk</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Asemrowo</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>32 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>27 Orang</td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>Genting Kalianak</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>16 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>11 Orang</td>
                        </tr>
                        
                        <tr>
                          <td>3</td>
                          <td>Tambak Sarioso</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>18 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>8 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2" style="text-align: center;"><b>KECAMATAN ASEMROWO</b></td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>66 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>46 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;"><b>Total</b></td>
                          <td><b><i class="fal fa-grip-lines fa-rotate-90"></i> 112 Orang <i class="fal fa-grip-lines fa-rotate-90"></i></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Lansia
                  </li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Kelurahan</th>
                          <th>Jenis Kelamin</th>
                          <th>Jumlah Penduduk</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Asemrowo</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>1.257 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>1.195 Orang</td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>Genting Kalianak</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>524 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>512 Orang</td>
                        </tr>
                        
                        <tr>
                          <td>3</td>
                          <td>Tambak Sarioso</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>140 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>153 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2" style="text-align: center;"><b>KECAMATAN ASEMROWO</b></td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>1.921 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>1.860 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;"><b>Total</b></td>
                          <td><b><i class="fal fa-grip-lines fa-rotate-90"></i> 3.781 Orang <i class="fal fa-grip-lines fa-rotate-90"></i></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  
                </div>
                <div class="col-md-6">

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Jumlah Penerima Manfaat Permakanan
                  </li>
                  <ul>
                    <li>Kel. Asemrowo</li>
                    <ol>
                      <table style="margin-left: -30px;" cellpadding="5" cellspacing="1" border="0">
                        <tr>
                          <td>Lanjut Usia</td>
                          <td>:</td>
                          <td>149 Orang</td>
                        </tr>
                        <tr>
                          <td>Penyandang Disabilitas</td>
                          <td>:</td>
                          <td>79 Orang</td>
                        </tr>
                        <tr>
                          <td>Yatim</td>
                          <td>:</td>
                          <td>78 Orang</td>
                        </tr>
                      </table>
                    </ol>
                    <li>Kel. Genting Kalianak</li>
                    <ol>
                      <table style="margin-left: -30px;" cellpadding="5" cellspacing="1" border="0">
                        <tr>
                          <td>Lanjut Usia</td>
                          <td>:</td>
                          <td>93 Orang</td>
                        </tr>
                        <tr>
                          <td>Penyandang Disabilitas</td>
                          <td>:</td>
                          <td>37 Orang</td>
                        </tr>
                        <tr>
                          <td>Yatim</td>
                          <td>:</td>
                          <td>23 Orang</td>
                        </tr>
                      </table>
                    </ol>
                    <li>Kel. Tambak Sarioso</li>
                    <ol>
                      <table style="margin-left: -30px;" cellpadding="5" cellspacing="1" border="0">
                        <tr>
                          <td>Lanjut Usia</td>
                          <td>:</td>
                          <td>92 Orang</td>
                        </tr>
                        <tr>
                          <td>Penyandang Disabilitas</td>
                          <td>:</td>
                          <td>32 Orang</td>
                        </tr>
                        <tr>
                          <td>Yatim</td>
                          <td>:</td>
                          <td>08 Orang</td>
                        </tr>
                      </table>
                    </ol>
                  </ul>
                  <!-- <div class="table-responsive">
                    <table cellpadding="10" cellspacing="0" border="0">
                      <tr>
                        <td>Kel. Asemrowo</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Lanjut Usia</td>
                        <td>:</td>
                        <td>149 Orang</td>
                      </tr>

                      <tr>
                        <td>Kel. Genting Kalianak</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Lanjut Usia</td>
                        <td>:</td>
                        <td>149 Orang</td>
                      </tr>

                      <tr>
                        <td>Kel. Tambak Sarioso</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td>Lanjut Usia</td>
                        <td>:</td>
                        <td>149 Orang</td>
                      </tr>
                    </table>
                  </div> -->

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Pos Paud terpadu
                  </li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Kelurahan</th>
                          <th>Jenis Kelamin</th>
                          <th>Jumlah Penduduk</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Asemrowo ( Jumlah POS : 8 )</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>149 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>155 Orang</td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>Genting Kalianak ( Jumlah POS : 4 )</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>68 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>64 Orang</td>
                        </tr>
                        
                        <tr>
                          <td>3</td>
                          <td>Tambak Sarioso ( Jumlah POS : 5 )</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>68 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>79 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2" style="text-align: center;"><b>KECAMATAN ASEMROWO</b></td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>285 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>298 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;"><b>Total</b></td>
                          <td><b><i class="fal fa-grip-lines fa-rotate-90"></i> 583 Orang <i class="fal fa-grip-lines fa-rotate-90"></i></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">
                    Kader Posyandu
                  </li>
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap table-bordered">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No.</th>
                          <th>Kelurahan</th>
                          <th>Jenis Kelamin</th>
                          <th>Jumlah Penduduk</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Asemrowo</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>1 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>208 Orang</td>
                        </tr>

                        <tr>
                          <td>2</td>
                          <td>Genting Kalianak</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>0 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>82 Orang</td>
                        </tr>
                        
                        <tr>
                          <td>3</td>
                          <td>Tambak Sarioso</td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>0 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>70 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="2" style="text-align: center;"><b>KECAMATAN ASEMROWO</b></td>
                          <td><i class="fal fa-male"></i> Laki - Laki</td>
                          <td>1 Orang</td>
                        </tr>
                        <tr>
                          <td colspan="2">&nbsp;</td>
                          <td><i class="fal fa-female"></i> Perempuan</td>
                          <td>360 Orang</td>
                        </tr>
                        
                        <tr>
                          <td colspan="3">&nbsp;</td>
                          <td><hr style="width: 95%; float: left;"><sup>&plus;</sup></td>
                        </tr>
                        
                        <tr>
                          <td colspan="3" style="text-align: right;"><b>Total</b></td>
                          <td><b><i class="fal fa-grip-lines fa-rotate-90"></i> 361 Orang <i class="fal fa-grip-lines fa-rotate-90"></i></b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">Jumlah Tokoh Masyarakat</li>
                  <table cellpadding="5" cellspacing="0" border="0">
                    <tr>
                      <td>LPMK</td>
                      <td>:</td>
                      <td style="text-align: center;">3</td>
                      <td>Orang</td>
                    </tr>
                    <tr>
                      <td>RW</td>
                      <td>:</td>
                      <td style="text-align: center;">17</td>
                      <td>Orang</td>
                    </tr>
                    <tr>
                      <td>RT</td>
                      <td>:</td>
                      <td style="text-align: center;">119</td>
                      <td>Orang</td>
                    </tr>                  
                  </table>
                  <style type="text/css">
                    .responsive-container
                    {
                      position:relative;
                      overflow:hidden;
                      padding-top:56.25%;
                    }
                    .responsive-iframe
                    {
                      position:absolute;
                      top:0;
                      left:0;
                      width:100%;
                      height:100%;
                      border:0;
                    }
                  </style>
                  <li style="font-weight: bold; text-decoration: underline; margin-bottom: 5px;">Peta Kawasan Asemrowo</li>
                  <div class="responsive-container">
                    <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31664.013333133076!2d112.67279707880571!3d-7.240646564817459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fee7cfb641b9%3A0xc5e3f8c6bfb1d276!2sKec.%20Asemrowo%2C%20Kota%20SBY%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1584953839309!5m2!1sid!2sid" width="480" height="500" frameborder="0" style="border-radius: 5px; border: 2px solid #1AB394;" allowfullscreen=""></iframe>
                  </div>
                  
                </div>
              </div>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-title text-info">
            <i class="fad fa-user-tie"></i> Info data Sekretariat

            <div class="card-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="card-body" style="background-color: #dbdbdb;">
            <div class="row">
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title">
                    <h5>Jumlah Pegawai</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qq = $this->db->query("SELECT COUNT(nama_peg) AS jmlh FROM pegawai")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qq->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title">
                    <h5>Jumlah Aset</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $ql = $this->db->query("SELECT COUNT(nama_keg) AS jmlh FROM tb_aset")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($ql->jmlh) ?></h1>
                    <small>Jumlah</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-title text-info">
            <i class="fad fa-university"></i> Info data Pemerintahan

            <div class="card-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="card-body" style="background-color: #dbdbdb;">
            <div class="row">
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Tokoh Masyarakat</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qw = $this->db->query("SELECT COUNT(nama_tokoh) AS jmlh FROM tokoh_msy")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qw->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-title text-info">
            <i class="fad fa-user-friends"></i> Info data Kesejahteraan Masyarakat (KESRA)

            <div class="card-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="card-body" style="background-color: #dbdbdb;">
            <div class="row">
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title">
                    <h5>Jumlah Anak Yatim</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qe = $this->db->query("SELECT COUNT(nama_yatim) AS jmlh FROM yatim_piatu")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qe->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Tukang Becak</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qr = $this->db->query("SELECT COUNT(nama_becak) AS jmlh FROM becak")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qr->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Anak Dhuafa</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qt = $this->db->query("SELECT COUNT(nama_duafa) AS jmlh FROM duafa")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qt->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Masyarakat Berpenghasilan Rendah (MBR)</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qy = $this->db->query("SELECT COUNT(nama_mbr) AS jmlh FROM mb_rendah")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qy->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Penyandang Masalah Kesejahteraan Sosial (PMKS)</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qu = $this->db->query("SELECT COUNT(nama_pmks) AS jmlh FROM pmks")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qu->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Posyandu Lansia</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qi = $this->db->query("SELECT COUNT(nama_posyandu_lansia) AS jmlh FROM posyandu_lansia")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qi->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>            
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Permakanan</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qo = $this->db->query("SELECT COUNT(nama_permakanan) AS jmlh FROM permakanan")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qo->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-title text-info">
            <i class="fad fa-leaf-maple"></i> Info data Perekonomian

            <div class="card-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="card-body" style="background-color: #dbdbdb;">
            <div class="row">
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Asongan</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qp = $this->db->query("SELECT COUNT(nama_pemilik_pkl) AS jmlh FROM tb_pkl")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qp->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-title text-info">
            <i class="fad fa-siren-on"></i> Info data Ketentraman dan Ketertiban Umum (TRANTIBUM)

            <div class="card-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
            </div>
          </div>
          <div class="card-body" style="background-color: #dbdbdb;">
            <div class="row">
              <div class="col-lg-3">
                <div class="card ">
                  <div class="card-title" style="padding-right: 15px;">
                    <h5>Jumlah Pedagang Kaki Lima</h5>
                  </div>
                  <div class="card-body">
                    <?php
                      $qa = $this->db->query("SELECT COUNT(nama_psatpol) AS jmlh FROM pkl_satpol")->row();
                    ?>
                    <h1 class="no-margins"><?= formatAngka($qa->jmlh) ?></h1>
                    <small>Orang</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</main>