<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Data Kompi BPBD Kota Surabaya</h6>
                <p class="text-muted mb-3">Data berisi Petugas Kompi Regu A, B, dan C yang ada di BPBD Kota Surabaya</p>
                
                <!-- Search input -->
                <input type="text" id="search-input" onkeyup="searchTables()" placeholder="Search for names.." class="form-control mb-3">
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table id="dataTableExampleA" class="table">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="50px">Nama Petugas</th>
                                        <th width="30px">Jenis Kompi</th>
                                        <th width="20px">Kedudukan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $db_pegawai = $this->db->query("SELECT * FROM data_kompi WHERE jenis_kompi = 'A'")->result();
                                    foreach ($db_pegawai as $res_petugas) {
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $res_petugas->nama_petugas ?></td>
                                            <td><?= $res_petugas->jenis_kompi ?></td>
                                            <td><?= $res_petugas->kedudukan ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table id="dataTableExampleB" class="table">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="50px">Nama Petugas</th>
                                        <th width="30px">Jenis Kompi</th>
                                        <th width="20px">Kedudukan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $db_pegawai = $this->db->query("SELECT * FROM data_kompi WHERE jenis_kompi = 'B'")->result();
                                    foreach ($db_pegawai as $res_petugas) {
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $res_petugas->nama_petugas ?></td>
                                            <td><?= $res_petugas->jenis_kompi ?></td>
                                            <td><?= $res_petugas->kedudukan ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="table-responsive">
                            <table id="dataTableExampleC" class="table">
                                <thead>
                                    <tr>
                                        <th width="20px">No</th>
                                        <th width="50px">Nama Petugas</th>
                                        <th width="30px">Jenis Kompi</th>
                                        <th width="20px">Kedudukan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $db_pegawai = $this->db->query("SELECT * FROM data_kompi WHERE jenis_kompi = 'C'")->result();
                                    foreach ($db_pegawai as $res_petugas) {
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $res_petugas->nama_petugas ?></td>
                                            <td><?= $res_petugas->jenis_kompi ?></td>
                                            <td><?= $res_petugas->kedudukan ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end of row -->
            </div>
        </div>
    </div>
</div>

<script>
function searchTables() {
    let input = document.getElementById('search-input');
    let filter = input.value.toUpperCase();
    let tableIds = ['dataTableExampleA', 'dataTableExampleB', 'dataTableExampleC'];

    tableIds.forEach(tableId => {
        let table = document.getElementById(tableId);
        let tr = table.getElementsByTagName('tr');
        
        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName('td');
            let showRow = false;
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    let txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        showRow = true;
                        break;
                    }
                }
            }
            tr[i].style.display = showRow ? '' : 'none';
        }
    });
}
</script>
