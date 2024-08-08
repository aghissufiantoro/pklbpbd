<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PDF_Sinasini extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();

        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata('peringatan_login', 'Akses anda ditolak!. Silahkan login terlebih dahulu');
            redirect(base_url("login"));
        }
        
        $this->load->model("M_dokumentasi_sinasini");
        $this->load->library('form_validation');
        $this->load->helper('indonesian_date');
        
    }
}
?>

<html>
<head>
  <title>SINASINI</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>SINASINI</h2>
			<h4>Dokumentasi Edukasi Bencana Usia Dini</h4>
				<div class="data-tables datatable-dark">
					
                <table id="dataTableExample" class="table">
						<thead>
						<tr>
							<th width="20px">No</th>
							<th width="50px">Nama Kegiatan</th>
							<th width="30px">Lokasi</th>
							<th width="30px">Alamat</th>
							<th width="20px">Tanggal</th>
							<th width="40px">Link Video Dokumentasi</th>
							<th width="20px">Dokumentasi</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						$db_dokumentasi_sinasini = $this->db->query("SELECT * FROM dokumentasi_sinasini")->result();
						foreach ($db_dokumentasi_sinasini as $res_dokumentasi_snn) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->lokasi_dokumentasi_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->alamat_dokumentasi_sinasini ?></td>
								<td><?= $res_dokumentasi_snn->tgl_dokumentasi_sinasini ?></td>
								<td><a href="<?= htmlspecialchars($res_dokumentasi_snn->video_dokumentasi_sinasini, ENT_QUOTES, 'UTF-8') ?>" target="_blank">Video Dokumentasi</a></td>
								<td>
									<button type="button" class="btn btn-outline-danger" data-bs-target="#view_images-<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" data-bs-toggle="modal">
										<i class="far fa-file-image"></i> Lihat Foto
									</button>
								</td>
								<td>
									<a href="<?= site_url('admin/dokumentasi_sinasini/edit/' . $res_dokumentasi_snn->id_dokumentasi_sinasini) ?>" class="btn btn-outline-primary btn-xs">
										<i class='fal fa-pencil'></i></a>
									<a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" class="ms-3 btn btn-outline-danger btn-xs">
										<i class="fal fa-trash-alt"></i></a>
									<div class="modal fade" id="deleteConfirm<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-footer d-flex align-items-center">
													<a href="<?= base_url('admin/dokumentasi_sinasini/delete/' . $res_dokumentasi_snn->id_dokumentasi_sinasini) ?>" class="btn btn-outline-danger">
														<i class="fad fa-trash-alt"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<div class="modal fade" id="view_images-<?= $res_dokumentasi_snn->id_dokumentasi_sinasini ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
								<div class="modal-dialog modal-xl">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalToggleLabel2"> <?= $res_dokumentasi_snn-> nama_kegiatan_sinasini ?></h5>
											<button type="button" class="btn-close" data-bs-target="#alur_pelayanan" data-bs-toggle="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												$images = json_decode($res_dokumentasi_snn->dok_dokumentasi_sinasini);
												if (is_array($images)) {
													foreach ($images as $image) {
														?>
														<div class="col-md-4 mb-3">
															<img src="<?= base_url('upload/dokumentasi_sinasini/' . $image) ?>" class="img-fluid" alt="<?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?>">
														</div>
														<?php
													}
												} else {
													?>
													<div class="col-md-4 mb-3">
														<img src="<?= base_url('upload/dokumentasi_sinasini/' . $res_dokumentasi_snn->dok_dokumentasi_sinasini) ?>" class="img-fluid" alt="<?= $res_dokumentasi_snn->nama_kegiatan_sinasini ?>">
													</div>
													<?php
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?php
						}
						?>
						</tbody>
					</table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>
