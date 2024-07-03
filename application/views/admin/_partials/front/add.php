<?php if ($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success - </strong> Data artikel berhasil di-<b>TAMBAH</b>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
  <div class="card shadow mb-4">
    <div class="card-header">
      <i class="fad fa-newspaper"></i> Tambah artikel
    </div>
    <div class="card-body">
      <div class="row">
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        <div class="col-md-6">

          <div class="form-group">
            <label>Judul Artikel<span class="text-danger">*</span></label>
            <input type="text" class="form-control" style="text-transform: capitalize;" required name="judul_artikel" autocomplete="off" placeholder="Masukkan judul artikel">
          </div>

          <?php
            $date = date('Y-m-d H:i:s');
          ?>

          <div class="form-group">
            <label>Tanggal post<span class="text-danger">*</span></label>
            <input type="text" class="form-control" disabled style="cursor: not-allowed;" value="<?= indonesian_date($date, 'l, d F Y') ?>">
            <input type="hidden" name="tgl_artikel" value="<?= $date ?>">
          </div>

          <div class="form-group">
            <label>Motto artikel<span class="text-danger">*</span></label>
            <input type="text" class="form-control" style="text-transform: capitalize;" required name="moto_artikel" autocomplete="off" placeholder="Masukkan motto">
          </div>
          
        </div>

        <div class="col-md-6">

          <div class="form-group">
            <label>Penulis Artikel<span class="text-danger">*</span></label>
            <input type="text" class="form-control" style="text-transform: capitalize;" required name="penulis_artikel" autocomplete="off" placeholder="Masukkan nama penulis">
          </div>

          <div class="form-group">
            <label>Foto Artikel</label>
            <br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="foto_artikel" accept="image/*" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div> 
          </div>

          <div class="form-group">
            <label>Foto Kegiatan</label>
            <br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="foto_artikel1" accept="image/*" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div> 
          </div>

          <div class="form-group">
            <label>Foto Kegiatan</label>
            <br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="foto_artikel2" accept="image/*" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div> 
          </div>

        </div>

      </div>
      <div class="row">
        <div class="col-md-12">
            
          <div class="form-group">
            <label>Isi Artikel</label>
            <textarea name="isi_artikel" required id="ckeditor"></textarea>
          </div>
          
        </div>
      </div>
    </div>

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary btn-icon-split pull-right">
        <span class="icon text-white-50">
          <i class="fa fa-save"></i>
        </span>
        <span class="text">Tambah data</span>
      </button>
      <a href="<?= site_url('admin/front') ?>">
        <button type="button" class="btn btn-warning btn-icon-split pull-left">
          <span class="icon text-white-50">
            <i class="fa fa-reply"></i>
          </span>
          <span class="text">Kembali</span>
        </button>
      </a>
    </div>

  </div>
</form>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>