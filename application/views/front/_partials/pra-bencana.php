<style>
  .btn-square {
    transition: transform 0.3s ease-in-out;
  }

  .btn-square:hover {
    transform: translate(5px, -5px);
    /* Sesuaikan nilai transformasi sesuai keinginan */
  }
  
</style>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-0 feature-row">
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/pra-bencana.png') ?>" alt="Pra-Bencana">
          </div>
          <h5 class="mb-3">PRA-Bencana</h5>
          <p class="mb-0">Dalam fase pra bencana ini mencakup kegiatan, mitigasi, kesiapsagaan dan peringatan dini.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/tanggap-darurat.png') ?>" alt="Tanggap-Darurat">
          </div>
          <h5 class="mb-3">Tanggap Darurat</h5>
          <p class="mb-0">Dalam tahap ini mencakup tanggap darurat dan bantuan darurat.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/pasca-bencana.png') ?>" alt="Pasca-Bencana">
          </div>
          <h5 class="mb-3">Pasca Bencana</h5>
          <p class="mb-0">Dalam tahapan ini mencakup pemulihan, rehabilitasi dan juga rekonstruksi.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
        <div class="feature-item border h-100 p-5">
          <div class="btn-square bg-light rounded-circle mb-4" style="width: 200px; height: 200px;">
            <img class="img-fluid" src="<?= base_url('image/support-24.png') ?>" alt="Service-BPBD">
          </div>
          <h5 class="mb-3">24/7 Support</h5>
          <p class="mb-0">Kami siap melayani Anda selama 24/7</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<style>
  .project-item img {
    transition: transform 0.3s ease-in-out;
  }

  .project-item img:hover {
    transform: translateX(10px);
    /* Ubah nilai ini sesuai kebutuhan */
  }
</style>

<div class="container-xxl pt-5">
    <div class="container" style="max-width: 1200px;">
        <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium text-primary">REKAP</p>
            <h1 class="display-5 mb-5">GRAFIK KEJADIAN TAHUN 2024</h1>
        </div>
        <form method="GET" action="<?= base_url('view/index') ?>">
            <div class="row mb-4">
                <div class="col-md-4">
                    <input type="date" name="start_date" class="form-control" value="<?= htmlspecialchars($this->input->get('start_date')?? '') ?>" />
                </div>
                <div class="col-md-4">
                    <input type="date" name="end_date" class="form-control" value="<?= htmlspecialchars($this->input->get('end_date')  ?? '') ?>" />
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-6">
                <div class="project-item mb-5">
                    <h3 class="text-center mt-3">JENIS KEJADIAN</h3>
                    <div class="position-relative d-flex align-items-center">
                        <canvas id="Chart-kejadian" style="max-width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-item mb-5">
                    <h3 class="text-center mt-3">SEBARAN LOKASI KEJADIAN</h3>
                    <div class="position-relative d-flex align-items-center">
                        <canvas id="Chart-lokasi" style="max-width: 100%; height: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Encode PHP arrays to JSON
    var chartDataKejadian = <?= json_encode($chartDataKejadianfront, JSON_HEX_TAG) ?>;
    var chartDataLokasi = <?= json_encode($chartDataLokasifront, JSON_HEX_TAG) ?>;

    // Log the chart data for debugging
    console.log('Chart Data Kejadian:', chartDataKejadian);
    console.log('Chart Data Lokasi:', chartDataLokasi);

    // Check if the data is not empty before proceeding
    if (chartDataKejadian.length > 0) {
        var labelsKejadian = chartDataKejadian.map(function(item) {
            return item.kejadian;
        });
        var dataKejadian = chartDataKejadian.map(function(item) {
            return item.jumlah_kejadian;
        });
    } else {
        var labelsKejadian = [];
        var dataKejadian = [];
    }

    if (chartDataLokasi.length > 0) {
        var labelsLokasi = chartDataLokasi.map(function(item) {
            return item.lokasi_kejadian;
        });
        var dataLokasi = chartDataLokasi.map(function(item) {
            return item.jumlah_kejadian;
        });
    } else {
        var labelsLokasi = [];
        var dataLokasi = [];
    }

    const jenisKejadianColors = ['#FF6384', '#36A2EB', '#FFCE56', '#8E44AD', '#3498DB', '#F39C12', '#2ECC71', '#E74C3C', '#9B59B6', '#1ABC9C', '#F1C40F', '#D35400'];
    const lokasiKejadianColors = ['#1ABC9C', '#9B59B6', '#E74C3C', '#2ECC71', '#F1C40F'];

    const ctxKejadian = document.getElementById('Chart-kejadian').getContext('2d');
    new Chart(ctxKejadian, {
        type: 'pie',
        data: {
            labels: labelsKejadian,
            datasets: [{
                label: 'Jumlah Kejadian',
                data: dataKejadian,
                backgroundColor: jenisKejadianColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctxLokasi = document.getElementById('Chart-lokasi').getContext('2d');
    new Chart(ctxLokasi, {
        type: 'pie',
        data: {
            labels: labelsLokasi,
            datasets: [{
                label: 'Jumlah Kejadian',
                data: dataLokasi,
                backgroundColor: lokasiKejadianColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
