<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-title">
                <div style="margin: 20px;">
                    <a href="<?= base_url("admin/kegiatan/plot_kegiatan") ?>">
                        <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <h6 class="card-title">Data Kegiatan di Kota Surabaya</h6>
                <p class="text-muted mb-3">Data Kegiatan di Pemerintah Kota Surabaya</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th width="20px">ID Kegiatan</th>
                                <th width="30px">Tanggal</th>
                                <th width="20px">Shift</th>
                                <th width="30px">Kegiatan</th>
                                <th width="20px">Lokasi Kegiatan</th>
                                <th width="20px">Jumlah Personel</th>
                                <th width="30px">Jumlah Jarko</th>
                                <th width="30px">Keterangan</th>
                                <th width="20px">Aksi</th>
                                <th width="20px">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $db_data_kejadian = $this->db->query("SELECT * FROM tabel_kegiatan")->result();
                            foreach ($kegiatan as $kg) 
                            {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kg->id_kegiatan; ?></td>
                                    <td><?= $kg->tanggal; ?></td>
                                    <td><?= $kg->shift; ?></td>
                                    <td><?= $kg->kegiatan; ?></td>
                                    <td><?= $kg->lokasi_kegiatan; ?></td>
                                    <td><?= $kg->jumlah_personel; ?></td>
                                    <td><?= $kg->jumlah_jarko; ?></td>
                                    <td><?= $kg->keterangan; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('admin/kegiatan/tambah_petugas/' . $kg->id_kegiatan); ?>">Tambah Petugas</a>
                                    </td>
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
        </div>
    </div>
</div>