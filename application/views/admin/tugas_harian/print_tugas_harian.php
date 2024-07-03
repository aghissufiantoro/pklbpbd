<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view("admin/_partials/head") ?>
</head>
<body>
	<div class="main-wrapper">

		<?php $this->load->view("admin/_partials/sidebar") ?>
	
		<div class="page-wrapper">
				
			<!-- partial:../../partials/_navbar.html -->
			<?php $this->load->view("admin/_partials/header") ?>
			<!-- partial -->

			<div class="page-content">

				<?php $this->load->view("admin/_partials/tugas_harian/print") ?>

			</div>

			<!-- partial:../../partials/_footer.html -->
			<?php $this->load->view("admin/_partials/footer") ?>
			<!-- partial -->
	
		</div>
	</div>

	<?php $this->load->view("admin/_partials/js") ?>

</body>
</html>