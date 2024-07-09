<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand" style="font-size: 18px;">
            <span>BPBD </span>Kota Surabaya
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item <?php echo ($this->uri->segment(2) == 'overview') ? 'active' : ''; ?>">
                <a href="<?= base_url("admin/overview") ?>" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <?php if (in_array($this->session->userdata('role'), ["1", "13", "14", "15", "16", "17", "20", "21", "22", "23", "24"])) { ?>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'user') ? 'active' : ''; ?>">
                    <a href="<?= base_url("admin/user") ?>" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">User</span>
                    </a>
                </li>
                <li class="nav-item nav-category">MAIN</li>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'pegawai') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/pegawai') ?>" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Pegawai ASN</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('username') == "perpus" || $this->session->userdata('role') == "1") { ?>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'perpus') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/perpus') ?>" class="nav-link">
                        <i class="link-icon" data-feather="book-open"></i>
                        <span class="link-title">Perpustakaan</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('username') == "kepala_opd" || $this->session->userdata('role') == "1") { ?>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'kepala_opd') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/kepala_opd') ?>" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Pegawai Non ASN</span>
                    </a>
                </li>
            <?php } ?>
            <?php if ($this->session->userdata('username') == "lokasi_pos" || $this->session->userdata('role') == "1") { ?>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'lokasi_pos') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/lokasi_pos') ?>" class="nav-link">
                        <i class="link-icon" data-feather="map"></i>
                        <span class="link-title">Lokasi POS Pantau</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "18" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24") {
                    ?>
                    <li <?php if ($this->uri->segment(2) == "review") {
                        echo 'class="nav-item active"';
                    } else {
                        echo 'class="nav-item"';
                    } ?>>
                        <a href="<?= base_url('admin/review') ?>" class="nav-link">
                            <i class="link-icon" data-feather="message-square"></i>
                            <span class="link-title">Review</span>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <!-- New menu added below -->
            <li class="nav-item nav-category">TIM EMAK</li>
                <?php
                if ($this->session->userdata('username') == "kompi" || $this->session->userdata('role') == "1") {
                ?>
                    <li <?php if ($this->uri->segment(2) == "kompi") {
                            echo 'class="nav-item active"';
                        } else {
                            echo 'class="nav-item"';
                        } ?>>
                        <a href="<?= base_url('admin/kompi/index') ?>" class="nav-link ">
                            <i class="link-icon" data-feather="users"></i>
                            <span class="link-title">Kompi</span>
                        </a>
                    </li>
                <?php
                }
                if ($this->session->userdata('username') == "kegiatan" || $this->session->userdata('role') == "1") {
                ?>
                    <li <?php if ($this->uri->segment(2) == "kegiatan" && $this->uri->segment(3) == "view_kegiatan") {
                            echo 'class="nav-item active"';
                        } else {
                            echo 'class="nav-item"';
                        } ?>>
                        <a href="<?= base_url('admin/kegiatan/view_kegiatan') ?>" class="nav-link">
                            <i class="link-icon" data-feather="check-square"></i>
                            <span class="link-title">Kegiatan</span>
                        </a>
                    </li>
                <?php
                }
                if ($this->session->userdata('username') == "kegiatan" || $this->session->userdata('role') == "1") {
                ?>
                    <li <?php if ($this->uri->segment(2) == "kegiatan" && $this->uri->segment(3) == "view_penugasan_petugas") {
                            echo 'class="nav-item active"';
                        } else {
                            echo 'class="nav-item"';
                        } ?>>
                        <a href="<?= base_url('admin/kegiatan/view_penugasan_petugas') ?>" class="nav-link">
                            <i class="link-icon" data-feather="clipboard"></i>
                            <span class="link-title">Plot Kegiatan</span>
                        </a>
                    </li>
                <?php
                }
                // if ($this->session->userdata('username') == "kegiatan" || $this->session->userdata('role') == "1") {
                // ?>
                     <li <?php if ($this->uri->segment(2) == "kegiatan") {
                //             echo 'class="nav-item active"';
                //         } else {
                //             echo 'class="nav-item"';
                //         } ?>>
                        <!-- <a href="<?= base_url('admin/kegiatan/laporan_kegiatan') ?>" class="nav-link">
                             <i class="link-icon" data-feather="message-square"></i>
                             <span class="link-title">Stock Master</span>
                         </a> -->
                     </li>
                <?php
                }
                ?>
              
            <li class="nav-item nav-category">SOSIS KETAN</li>
            <?php
            if ($this->session->userdata('role') == "1" || $this->session->userdata('role') == "13" || $this->session->userdata('role') == "14" || $this->session->userdata('role') == "15" || $this->session->userdata('role') == "16" || $this->session->userdata('role') == "17" || $this->session->userdata('role') == "20" || $this->session->userdata('role') == "21" || $this->session->userdata('role') == "22" || $this->session->userdata('role') == "23" || $this->session->userdata('role') == "24") {
                ?>
                <li <?php if ($this->uri->segment(2) == "artikel") {
                    echo 'class="nav-item active"';
                } else {
                    echo 'class="nav-item"';
                } ?>>
                    <a href="<?= base_url('admin/artikel') ?>" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Artikel</span>
                    </a>
                </li>
                <?php
            }

            if ($this->session->userdata('username') == "dokumentasi" || $this->session->userdata('role') == "1") {
                ?>
                <li <?php if ($this->uri->segment(2) == "dokumentasi") {
                    echo 'class="nav-item active"';
                } else {
                    echo 'class="nav-item"';
                } ?>>
                    <a href="<?= base_url('admin/dokumentasi') ?>" class="nav-link ">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Dokumentasi</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="nav-item nav-category">MANAJEMEN KEBENCANAAN</li>
            <?php if ($this->session->userdata('username') == "data_kejadian" || $this->session->userdata('role') == "1") { ?>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'data_kejadian') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/data_kejadian') ?>" class="nav-link">
                        <i class="link-icon" data-feather="activity"></i>
                        <span class="link-title">Data Kejadian</span>
                    </a>
                </li>
            <?php } ?>
            <!-- End of New menu -->
            <li class="nav-item nav-category">PAK TIKSAN</li>
            <?php if (in_array($this->session->userdata('role'), ["1", "13", "14", "15", "16", "17", "20", "21", "22", "23", "24"])) { ?>
                <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == 'logistik') ? 'active' : ''; ?>">
                <a href="<?= base_url('admin/logistik') ?>" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Logistik</span>
                </a>
            </li> -->
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'stock_master') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/stock_master') ?>" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Stock Master</span>
                    </a>
                </li>
                <li class="nav-item <?php echo ($this->uri->segment(2) == 'stock_entry') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/stock_entry') ?>" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Stock Entry</span>
                    </a>
                </li>
                <!-- <li class="nav-item <?php echo ($this->uri->segment(2) == 'data_stock_logistik') ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/data_stock_logistik') ?>" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Stock Logistik</span>
                    </a>
                </li> -->
            <?php } ?>
        </ul>
    </div>
</nav>

<script>
    function toggleDropdown(dropdownId) {
        var dropdown = document.getElementById(dropdownId);
        dropdown.style.display = (dropdown.style.display == "block") ? "none" : "block";
    }
</script>