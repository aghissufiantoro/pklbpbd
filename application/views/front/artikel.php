<!DOCTYPE html>
<html lang="en">
<style>
    .slideshow-arrows button {
        border-radius: 50%;
        width: 30px;
        height: 30px;
        background-color: rgba(155, 152, 152, 0.5); /* warna background */
        border: none;
        font-size: 18px; /* Ukuran tombol */
        color: #000000; /* Warna tombol */
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .slideshow-arrows button:hover {
        background-color: rgb(0, 0, 0);
        color: #ffffff
    }
</style>

<head>
	<?php $this->load->view('front/_partials/head') ?>
</head>

<?php
$front = $data->row_array();

$b = $data->row_array();
function limit_words($string, $word_limit)
{
	$words = explode(" ", $string);
	return implode(" ", array_splice($words, 0, $word_limit));
}

$judul = $b['judul_artikel'];
$isi = strip_tags($b['isi_artikel']);
$isii = limit_words($isi, 20);
$foto = $b['foto_artikel'];
$fotoo = base_url('upload/kegiatan/' . $foto);
?>
<body>
<?php $this->load->view('front/_partials/support') ?>

<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
	<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div>
<!-- Spinner End -->

<!-- Topbar Start -->
<div class="container-fluid text-white d-none d-lg-flex" style="background-color: #E87715;">
	<div class="container py-3">
		<div class="d-flex align-items-center">
			<img src="<?= base_url('image/BPBD_Horizontal.png') ?>" style="width: 40%;">
			<div class="ms-auto d-flex align-items-center">
				<small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>Jl. Jemursari Tim. II No. 2,
					Surabaya</small>
				<small class="ms-4"><i class="fa fa-envelope me-3"></i>bpbd@surabaya.go.id</small>
				<small class="ms-4"><i class="fa fa-phone-alt me-3"></i>112</small>
				<div class="ms-3 d-flex">
					<a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="">
						<i class="fab fa-instagram"></i>
					</a>
					<a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="">
						<i class="fab fa-twitter"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<?php $this->load->view('front/_partials/header') ?>
<!-- Navbar End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
	<div class="container">
		<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
			<p class="fs-5 fw-medium text-primary"><?= $front['jenis_artikel'] ?></p>
			<h1 class="display-5 mb-2"><?= $front['judul_artikel'] ?></h1>
			<small style="font-size: 20px;"><?= indonesian_date($front['tgl_artikel'], 'l, d F Y') ?></small>
		</div>
		<div class="row g-5 mt-2">
			<div class="col-lg-12 wow fadeInUp mb-5" data-wow-delay="0.5s"
			     style="text-align: center; position: relative;">
				<img src="<?= base_url('upload/kegiatan/' . $front['foto_artikel']) ?>" class="img-fluid slideshow"
				     alt="<?= $front['judul_artikel'] ?>"
				     style="display: block; margin: 0 auto; border-radius: 10px; max-width: 900px; height: 500px; object-fit: cover;transition: opacity 1.5s ease;">
				<div class="slideshow-arrows">
					<button class="prev" style="position: absolute; top: 50%; left: 10px; transform: translateY(-50%);">
						←
					</button>
					<button class="next"
					        style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);">→
					</button>
				</div>
			</div>
		</div>

		<div class="row g-5">
			<div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
				<?= $front['isi_artikel'] ?>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Array of photo URLs
        var photos = [
            "<?php echo base_url('upload/kegiatan/' . $front['foto_artikel']); ?>",
            "<?php echo base_url('upload/kegiatan/' . $front['foto_artikel1']); ?>",
            "<?php echo base_url('upload/kegiatan/' . $front['foto_artikel2']); ?>",
            // Add more photo URLs as needed
        ];

        // Counter for the current photo
        var currentPhotoIndex = 0;

        // Function to change the photo
        function changePhoto() {
            // Update the source of the image with the next photo URL
            $('.slideshow').attr('src', photos[currentPhotoIndex]);
        }

        // Call the changePhoto function initially
        changePhoto();

        // Event listener for clicking on the previous button
        $('.prev').click(function () {
            currentPhotoIndex--;
            if (currentPhotoIndex < 0) {
                currentPhotoIndex = photos.length - 1;
            }
            changePhoto();
        });

        // Event listener for clicking on the next button
        $('.next').click(function () {
            currentPhotoIndex++;
            if (currentPhotoIndex >= photos.length) {
                currentPhotoIndex = 0;
            }
            changePhoto();
        });

        // Event listener for keyboard arrow keys
        $(document).keydown(function (e) {
            if (e.keyCode == 37) { // Left arrow key
                $('.prev').click();
            } else if (e.keyCode == 39) { // Right arrow key
                $('.next').click();
            }
        });
    });
</script>
<!-- Contact End -->


<?php $this->load->view('front/_partials/footer') ?>

<!-- Back to Top -->
<!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a> -->


<?php $this->load->view('front/_partials/js') ?>
</body>

</html>