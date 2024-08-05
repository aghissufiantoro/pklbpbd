<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/_partials/head") ?>
</head>
<body>
<div class="main-wrapper">

    <?php $this->load->view("admin/_partials/sidebar") ?>

    <div class="page-wrapper">

        <!-- partial:partials/_navbar.html -->
        <?php $this->load->view("admin/_partials/header") ?>
        <!-- partial -->

        <div class="page-content">
            <h1 class="mt-4">Selamat Datang!!</h1>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Admin SI 2 TANG BEDA</li>
            </ol>

            <!-- Card Section -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4 rounded-card">
                        <div class="card-body d-flex align-items-center">
                            <img id="artikel-image" src="<?= base_url("image/artikel.png") ?>" width="80" height="80" style="margin-right: 10px;" />
                            <div style="margin-left: 105px;"> <h5>Artikel</h5>
                                <div id="artikel-count" style="margin-left: 30px;"><?=$artikel?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="small text-white stretched-link" href="http://localhost:8083/bpbd/admin/artikel">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4 rounded-card">
                        <div class="card-body d-flex align-items-center">
                            <img id="pegawai-image" src="<?= base_url("image/pegawai.png") ?>" alt="Pegawai" width="80" height="80" style="margin-right: 10px;" />
                            <div style="margin-left: auto;"> <h5>Pegawai ASN</h5>
                                <div id="pegawai-count" style="margin-left: 50px;"><?=$pegawai?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="small text-white stretched-link" href="http://localhost:8083/bpbd/admin/pegawai">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4 rounded-card">
                        <div class="card-body d-flex align-items-center">
                            <img id="perpustakaan-image" src="<?= base_url("image/perpustakaan.png") ?>" alt="Perpustakaan" width="80" height="80" style="margin-right: 10px;" />
                            <div style="margin-left: auto;"> <h5>Perpustakaan</h5>
                                <div id="perpustakaan-count" style="margin-left: 85px;"><?=$perpus?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="small text-white stretched-link" href="http://localhost:8083/bpbd/admin/perpus">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4 rounded-card">
                        <div class="card-body d-flex align-items-center">
                            <img id="pejabat-image" src="<?= base_url("image/pejabat.png") ?>" alt="Pejabat" width="80" height="80" style="margin-right: 10px;" />
                            <div style="margin-left: auto;"> <h5>Pegawai non ASN</h5>
                                <div id="pejabat-count" style="margin-left: 100px;"><?=$kontak_opd?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="small text-white stretched-link" href="http://localhost:8083/bpbd/admin/kepala_opd">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4 rounded-card">
                        <div class="card-body d-flex align-items-center">
                            <img id="lokasi-image" src="<?= base_url("image/lokasi.png") ?>" alt="Lokasi" width="80" height="80" style="margin-right: 10px;" />
                            <div style="margin-left: auto;"> <h5>Lokasi Pos</h5>
                                <div id="lokasi-count" style="margin-left: 120px;"><?=$lokasi_pos?></div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a class="small text-white stretched-link" href="http://localhost:8083/bpbd/admin/lokasi_pos">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <style>
                    .rounded-card {
                        border-radius: 1rem;
                        font-family: Arial;
                        font-size: 19px;
                    }

                </style>
                
            </div>
            <!-- End Card Section -->

            <div class="container-xxl pt-5">
        <div class="container" style="max-width: 1200px;">
            <div class="text-center text-md-start pb-5 pb-md-0 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">REKAP</p>
                <h1 class="display-5 mb-5">GRAFIK KEJADIAN TAHUN 2024</h1>
            </div>
            <form method="GET" action="<?= base_url('admin/overview') ?>">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <input type="date" name="start_date" class="form-control" value="<?= set_value('start_date', $this->input->get('start_date')) ?>" />
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end_date" class="form-control" value="<?= set_value('end_date', $this->input->get('end_date')) ?>" />
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


<!-- End Chart Section -->

        </div>

        <!-- partial:partials/_footer.html -->
        <?php $this->load->view("admin/_partials/footer") ?>
        <!-- partial -->

    </div>
</div>

<?php $this->load->view("admin/_partials/js") ?>
<script>
        var chartDataKejadian = <?= json_encode($chartDataKejadian) ?>;
        var chartDataLokasi = <?= json_encode($chartDataLokasi) ?>;

        var labelsKejadian = chartDataKejadian.map(function(item) {
            return item.kejadian;
        });
        var dataKejadian = chartDataKejadian.map(function(item) {
            return item.jumlah_kejadian;
        });

        var labelsLokasi = chartDataLokasi.map(function(item) {
            return item.lokasi_kejadian;
        });
        var dataLokasi = chartDataLokasi.map(function(item) {
            return item.jumlah_kejadian;
        });

        const jenisKejadianColors = ['#FF6384', '#36A2EB', '#FFCE56', '#8E44AD', '#3498DB', '#F39C12', '#2ECC71', '#E74C3C', '#9B59B6', '#1ABC9C', '#F1C40F', '#D35400'];
        const lokasiKejadianColors = ['#1ABC9C', '#9B59B6', '#E74C3C', '#2ECC71', '#F1C40F'];

        const ctxKejadian = document.getElementById('Chart-kejadian');
        new Chart(ctxKejadian, {
            type: 'pie',
            data: {
                labels: labelsKejadian,
                datasets: [{
                    label: 'Jumlah Kejadian',
                    data: dataKejadian,
                    backgroundColor: jenisKejadianColors.slice(0, labelsKejadian.length),
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

        const ctxLokasi = document.getElementById('Chart-lokasi');
        new Chart(ctxLokasi, {
            type: 'pie',
            data: {
                labels: labelsLokasi,
                datasets: [{
                    label: 'Jumlah Kejadian',
                    data: dataLokasi,
                    backgroundColor: lokasiKejadianColors.slice(0, labelsLokasi.length),
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
<!-- End Chart Script -->

</body>
</html>
