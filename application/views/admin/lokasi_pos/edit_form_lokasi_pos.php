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

				<?php $this->load->view("admin/_partials/lokasi_pos/edit") ?>

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
	    $("#form_kab").hide();
	    $("#form_kec").hide();
	    $("#form_des").hide();

	    // ambil data kabupaten ketika data memilih provinsi
	    $('body').on("change","#form_prov",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=kabupaten";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/lokasi_pos/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#form_kab").html(hasil);
	          $("#form_kab").show();
	          $("#form_kec").hide();
	          $("#form_des").hide();
	        }
	      });
	    });

	    // ambil data kecamatan/kota ketika data memilih kabupaten
	    $('body').on("change","#form_kab",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=kecamatan";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/lokasi_pos/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#form_kec").html(hasil);
	          $("#form_kec").show();
	          $("#form_des").hide();
	        }
	      });
	    });

	    // ambil data desa ketika data memilih kecamatan/kota
	    $('body').on("change","#form_kec",function(){
	      var id = $(this).val();
	      var data = "id="+id+"&data=desa";
	      $.ajax({
	        type: 'POST',
	        url: "<?= base_url('admin/lokasi_pos/get_daerah') ?>",
	        data: data,
	        success: function(hasil) {
	          $("#form_des").html(hasil);
	          $("#form_des").show();
	        }
	      });
	    }); 
	  });
	</script>

</body>
</html>