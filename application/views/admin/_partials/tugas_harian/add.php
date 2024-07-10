<div class="container mt-5">
    <h1>Tambah Data Tugas Harian</h1>
      <?php echo validation_errors(); ?>
        <?php echo form_open('admin/tugas_harian/tugas_harian', 'class="needs-validation"'); ?>
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label>Nama Staff<span class="text-danger">*</span></label>
                <select class="form-select" required name="nama_staff" autocomplete="off"
                  placeholder="Pilih nama staff" id="staff-container" onkeyup="hurufBesar();"></select>
              </div>

              <div class="form-group">
                <label>Tanggal Kegiatan<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="datepicker" required name="tanggal"
                  autocomplete="off" placeholder="Masukkan tanggal kegiatan">
              </div>

              <div class="form-group">
                <label>Waktu Kegiatan<span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="jam" required name="waktu" autocomplete="off"
                  placeholder="Masukkan waktu kegiatan">
              </div>

              <div class="form-group">
                <label>Lokasi Kegiatan<span class="text-danger">*</span></label>
                <input class="form-control" required name="lokasi" autocomplete="off"
                  placeholder="Masukkan lokasi kegiatan" id="hurufbesar" onkeyup="hurufBesar();"></input>
              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label>Uraian Kegiatan<span class="text-danger">*</span></label>
                <textarea class="form-control" required name="uraian_kegiatan" autocomplete="off"
                  placeholder="Uraikan kegiatan yang telah dilakukan" id="hurufbesar5" onkeyup="hurufBesar5();"></textarea>
              </div>

              <div class="form-group">
                <label>Penanggung Jawab<span class="text-danger">*</span></label>
                <select class="form-select" required name="penanggung_jawab" autocomplete="off"
                id="hurufbesar3" onkeyup="hurufBesar3();">
                  <option value="">--- Pilih Salah Satu ---</option>
                  <option value="kepala_badan">Kepala Badan</option>
                  <option value="sekretaris_badan">Sekretaris Badan</option>
                  <option value="kasubbag_keuangan">Kasubbag Keuangan</option>
                  <option value="kabid_pk">Kabid PK</option>
                  <option value="kabid_darlog_rr">Kabid Darlog RR</option>
                </select>
              </div>

              <div class="form-group">
                <label>Hasil Kegiatan</label>
                <textarea class="form-control" name="hasil_kegiatan" autocomplete="off"
                  placeholder="Masukkan hasil kegiatan" id="hurufbesar4" onkeyup="hurufBesar4();"></textarea>
              </div>

            </div>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        <?php echo form_close(); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function loadStaffOptions() {
        // if (jenisKompi && jumlahPersonel > 0) {
        //     $.ajax({
                url: "<?php echo base_url('admin/tugas_harian/get_all_staff/'); ?>",
                method: 'GET',
                success: function(data) {
                    try {
                        var staffData = JSON.parse(data);
                        console.log("Received data:", staffData);
                        $('#staff-container').empty();
                        //for (var i = 0; i < jumlahPersonel; i++) {
                            var select = $('<select class="form-select" name="staff[]" required></select>');
                            select.append('<option value="">Pilih Staff</option>');
                            $.each(staffData, function(index, staff) {
                                var option = $('<option></option>').attr('value', staff.id_kontak_opd).text(staff.nama_kontak_opd);
                                select.append(option);
                            });
                            $('#staff-container').append('<div class="form-group"><label>Staff ' + (i + 1) + '</label>' + select.prop('outerHTML') + '</div>');
                        //}
                    } catch (e) {
                        console.error("Error parsing JSON:", e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to load staff data:", error);
                }
    //         });
    //     } else {
    //         $('#petugas-container').empty();
    //     }
    }

    // $(document).ready(function() {
    //     $('#jenis_kompi').change(function() {
    //         var jenisKompi = $(this).val();
    //         var jumlahPersonel = $('#jumlah_personel').val();
    //         loadPetugasOptions(jenisKompi, jumlahPersonel);
    //     });

    //     $('#jumlah_personel').change(function() {
    //         var jumlahPersonel = $(this).val();
    //         var jenisKompi = $('#jenis_kompi').val();
    //         loadPetugasOptions(jenisKompi, jumlahPersonel);
    //     });

    //     var initialKompi = $('#jenis_kompi').val();
    //     var initialJumlah = $('#jumlah_personel').val();
    //     loadPetugasOptions(initialKompi, initialJumlah);
    // });
</script>