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

				<?php $this->load->view("admin/_partials/data_kejadian/add") ?>

			</div>

			<!-- partial:../../partials/_footer.html -->
			<?php $this->load->view("admin/_partials/footer") ?>
			<!-- partial -->
	
		</div>
	</div>

	<?php $this->load->view("admin/_partials/js") ?>
	<script>
	  $(document).ready(function(){
	    // sembunyikan form kabupaten, kecamatan dan desa
	    $("#kabkota_kejadian").hide();
	    $("#kecamatan_kejadian").hide();
	    $("#kelurahan_kejadian").hide();

	    // ambil data kabupaten ketika data memilih provinsi
	    $('body').on("change","#form_prov",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=kabupaten";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/data_kejadian/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#kabkota_kejadian").html(hasil);
	          $("#kabkota_kejadian").show();
	          $("#kecamatan_kejadian").hide();
	          $("#kelurahan_kejadian").hide();
	        }
	      });
	    });

	    // ambil data kecamatan/kota ketika data memilih kabupaten
	    $('body').on("change","#kabkota_kejadian",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=kecamatan";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/data_kejadian/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#kecamatan_kejadian").html(hasil);
	          $("#kecamatan_kejadian").show();
	          $("#kelurahan_kejadian").hide();
	        }
	      });
	    });

	    // ambil data desa ketika data memilih kecamatan/kota
	    $('body').on("change","#kecamatan_kejadian",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=kelurahan";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/data_kejadian/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#kelurahan_kejadian").html(hasil);
	          $("#kelurahan_kejadian").show();
	        }
	      });
	    }); 
	  });
	</script>
</body>
</html>