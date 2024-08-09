<?php


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
        
        $this->load->model("M_kegiatan");
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
                                <th width="20px">ID Kegiatan</th>
                                <th width="30px">Tanggal</th>
                                <th width="20px">Shift</th>
                                <th width="30px">Waktu Kegiatan</th>
                                <th width="30px">Kegiatan</th>
                                <th width="20px">Lokasi Kegiatan</th>
                                <th width="20px">Jumlah Personel</th>
                                <th width="30px">Jumlah Jarko</th>
                                <th width="30px">Keterangan</th>
                                <th width="20px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kegiatan = $this->db->query("SELECT * FROM tabel_kegiatan ORDER BY tanggal DESC;")->result();
                            foreach ($kegiatan as $kg) 
                            {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kg->id_kegiatan; ?></td>
                                    <td><?= $kg->tanggal; ?></td>
                                    <td><?= $kg->shift; ?></td>
                                    <td><?= $kg->waktu_kegiatan; ?></td>
                                    <td><?= $kg->kegiatan; ?></td>
                                    <td><?= $kg->lokasi_kegiatan; ?></td>
                                    <td><?= $kg->jumlah_personel; ?></td>
                                    <td><?= $kg->jumlah_jarko; ?></td>
                                    <td><?= $kg->keterangan; ?></td>
                                    <td>
                                        <a href="<?= site_url('admin/kegiatan/edit_plot_kegiatan/'.$kg->id_kegiatan) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>
                            
                                        <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $kg->id_kegiatan ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                                        <div class="modal fade" id="deleteConfirm<?= $kg->id_kegiatan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                Data yang akan dihapus adalah data dengan ID Kegiatan <?= $kg->id_kegiatan ?>
                                                </div>
                                                <div class="modal-footer d-flex align-items-center">
                                                <a href="<?= base_url('admin/kegiatan/delete_plot_kegiatan/'.$kg->id_kegiatan) ?>" class="btn btn-outline-danger">
                                                    <i class="fad fa-trash-alt"></i>
                                                </a>
                                                <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
