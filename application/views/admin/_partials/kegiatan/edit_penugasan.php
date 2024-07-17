<?php 
  if ($this->session->flashdata('success'))
  {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    <strong>SUKSES!</strong> Data telah dirubah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
    $this->session->set_flashdata('success', null); // Clear flash message
  }
?>

<div class="container mt-2">
    <h4 class="mb-3">UBAH PENUGASAN</h4>
        <form id="editForm" action="<?= site_url('admin/kegiatan/edit_penugasan/'.$kegiatan->id_penugasan) ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6"> 

                    <div class="mb-3">
                        <label for="id_kegiatan">ID Penugasan</label>
                        <input type="text" class="form-control" id="id_penugasan" name="id_penugasan" value="<?= $kegiatan->id_penugasan ?>" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                        <input type="text" class="form-control" name="lokasi_kegiatan" id="lokasi_kegiatan" value="<?= $kegiatan->lokasi_kegiatan ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $kegiatan->tanggal ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="shift">Shift</label>
                        <input type="text" class="form-control" name="shift" id="shift" value="<?= $kegiatan->shift ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kompi">Jenis Kompi</label>
                        <select class="form-control" name="jenis_kompi" id="jenis_kompi" required>
                            <option value="">Pilih Jenis Kompi</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="jumlah_personel">Jumlah Personel</label>
                        <input type="number" class="form-control" name="jumlah_personel" id="jumlah_personel" required>
                    </div>
                    <div class="mb-3" id="petugas-container"></div>

                    <div class="mb-3">
                        <label for="uraian_kegiatan">Uraian Kegiatan</label>
                        <input type="text" class="form-control" name="uraian_kegiatan" id="uraian_kegiatan" required>
                    </div>

                    <div class="mb-3">
                        <label for="no_wa">No WA</label>
                        <input type="number" class="form-control" name="no_wa" id="no_wa" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dokumentasi</label>
                        <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" accept="image/*" multiple />
                    </div>

                </div>
            </div>
            <a href="<?= base_url("admin/kegiatan/view_penugasan_petugas") ?>">
                <input class="btn btn-warning" type="button" value="Kembali">
            </a>
            <button type="submit" class="btn btn-success">Submit</button>
        <?php echo form_close(); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function loadPetugasOptions(jenisKompi, jumlahPersonel) {
    if (jenisKompi && jumlahPersonel > 0) {
        $.ajax({
            url: "<?php echo base_url('admin/kegiatan/get_personel_by_kompi/'); ?>" + jenisKompi,
            method: 'GET',
            success: function(data) {
                try {
                    var petugasData = JSON.parse(data);
                    console.log("Received data:", petugasData);
                    $('#petugas-container').empty();
                    for (var i = 0; i < jumlahPersonel; i++) {
                        var select = $('<select class="form-control" name="petugas[]" required></select>');
                        select.append('<option value="">Pilih Petugas</option>');
                        $.each(petugasData, function(index, petugas) {
                            var option = $('<option></option>').attr('value', petugas.id_petugas).text(petugas.nama_petugas);
                            select.append(option);
                        });
                        $('#petugas-container').append('<div class="form-group"><label>Petugas ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
                    }
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                }
            },
            error: function(xhr, status, error) {
                console.error("Failed to load petugas data:", error);
            }
        });
    } else {
        $('#petugas-container').empty();
    }
}


    $(document).ready(function() {
        $('#jenis_kompi').change(function() {
            var jenisKompi = $(this).val();
            var jumlahPersonel = $('#jumlah_personel').val();
            loadPetugasOptions(jenisKompi, jumlahPersonel);
        });

        $('#jumlah_personel').change(function() {
            var jumlahPersonel = $(this).val();
            var jenisKompi = $('#jenis_kompi').val();
            loadPetugasOptions(jenisKompi, jumlahPersonel);
        });

        var initialKompi = $('#jenis_kompi').val();
        var initialJumlah = $('#jumlah_personel').val();
        loadPetugasOptions(initialKompi, initialJumlah);
    });

    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
    }, 5000);

</script>
