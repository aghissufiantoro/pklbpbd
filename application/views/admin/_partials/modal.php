<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">APAKAH ANDA YAKIN INGIN LOGOUT</h2>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <p class="mb-0">Jika Anda yakin maka tekan tombol warna merah pada pojok kanan bawah yang bertuliskan <i>Keluar</i>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fal fa-times"></i> Cancel</button>
        <a href="<?php echo base_url('login/logout') ?>">
          <button type="button" class="btn btn-danger"><i class="fal fa-sign-out-alt"></i> Keluar</button>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h2>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <p class="mb-0">Data yang dihapus tidak akan bisa dikembalikan.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fal fa-times"></i> Cancel</button>
        <a id="btn-delete" href="#">
          <button type="button" class="btn btn-danger"><i class="fal fa-trash-alt"></i> Hapus</button>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-weight: normal;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 15px;">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-success mr-auto" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <a id="btn-delete" class="btn btn-danger btn-outline" href="#"><i class="fad fa-trash-alt"></i> Delete</a>
      </div>
    </div>
  </div>
</div> -->