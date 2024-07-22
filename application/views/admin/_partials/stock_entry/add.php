

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?> 


<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data logistik</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="<?= site_url('admin/stock_entry/add') ?>" method="post" enctype="multipart/form-data">
        <!-- baris 1 -->
        <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tanggal_entry" required autocomplete="off">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>

          <div class="col-md-2">
            <div class="mb-3">
              <label for="id_kejadian" class="form-label">ID Kejadian</label>
                <select class="form-select" id="id_kejadian" name="id_kejadian" required>
                <option value="">--- Pilih ID Kejadian ---</option>
                <?php foreach ($kejadian_options as $kejadian): ?>
                <option value="<?= $kejadian->id_kejadian ?>"><?= $kejadian->id_kejadian ?></option>
                <?php endforeach; ?>
                </select>
                </div>
          </div>

          <div class="col-md-4">
              <div class="mb-3">
                <label for="lokasi_diterima" class="form-label">Lokasi Diterima</label>
                <input id="lokasi_diterima" class="form-control" name="lokasi_diterima" type="text" required>
              </div>
          </div>
          <div class="col-md-4">
              <div class="mb-3">
                <label for="penerima_barang" class="form-label">Penerima Barang</label>
                <input id="penerima_barang" class="form-control" name="penerima_barang" type="text" required>
              </div>
          </div>
        </div>

        <!-- baris kedua -->
          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label for="rt" class="form-label">RT</label>
                <input id="rt" class="form-control" name="rt" type="text" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="mb-3">
                <label for="rw" class="form-label">RW</label>
                <input id="rw" class="form-control" name="rw" type="text" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan</label>
                <input id="kelurahan" class="form-control" name="kelurahan" type="text" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input id="kecamatan" class="form-control" name="kecamatan" type="text" required>
              </div>
            </div>
          </div>

          <!-- Baris 3 -->
          <div class="row pt-3">
            <div class="col-md-4">
              <div class="mb-3">
              <label for="nama_barang" class="form-label">Nama Barang</label>
              <select class="form-select" id="nama_barang" name="nama_barang" required>
                  <option value="">--- Pilih Nama Barang ---</option>
                  <?php foreach ($barang_options as $barang): ?>
                      <option value="<?= $barang->nama_barang ?>"><?= $barang->nama_barang ?></option>
                  <?php endforeach; ?>
              </select>
              </div>
            </div>

            <input type="hidden" id="kode_barang" name="kode_barang" value="">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="status_barang">Status Barang</label>
                <select class="form-select" id="status_barang" name="status_barang" data-width="100%" required>
                  <option value="">--- Pilih Status Barang ---</option>
                  <option value="Masuk">Masuk</option>
                  <option value="Keluar">Keluar</option>
                  <option value="Rusak">Rusak</option>
                  <option value="Tersedia">Tersedia</option>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="mb-3">
                <label for="qty_barang" class="form-label">Quantity Barang</label>
                <div class="input-group">
                  <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                  <input id="qty_barang" class="form-control" name="qty_barang" type="text" value="0" required>
                  <button class="btn btn-outline-secondary" type="button" id="tambahBtn">+</button>
                </div>
              </div>
            </div>
          </div>  

        <div class="row">
          <div class="col-md-8">
            <div class="mb-3">
              <label for="keterangan_barang" class="form-label">Keterangan Barang</label>
              <input id="keterangan_barang" class="form-control" name="keterangan_barang" type="text" required>
            </div>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <div class="mb-3">
              <input id="btnTambahBarang" class="btn btn-success" type="button" value="        Add        ">
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Barang</h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Status Barang</th>
                                    <th>Quantity Barang</th>
                                    <th>Keterangan Barang</th>
                                </tr>
                            </thead>
                            <tbody id="tabelBarangSementara">
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <a href="<?= base_url("admin/stock_entry") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>


      </div>
    </div>
  </div>
</div>

<script>
 const arrayBarangSementara = []
document.addEventListener("DOMContentLoaded", function() {
    
    const tambahBtn = document.getElementById("tambahBtn");
    const kurangBtn = document.getElementById("kurangBtn");
    const jmlBrgInput = document.getElementById("qty_barang");

    tambahBtn.addEventListener("click", function() {
        incrementValue();
    });

    kurangBtn.addEventListener("click", function() {
        decrementValue();
    });

    function incrementValue() {
        let currentValue = parseInt(jmlBrgInput.value);
        if (!isNaN(currentValue)) {
            jmlBrgInput.value = currentValue + 1;
        } else {
            jmlBrgInput.value = 1;
        }
    }

    function decrementValue() {
        let currentValue = parseInt(jmlBrgInput.value);
        if (!isNaN(currentValue) && currentValue > 0) {
            jmlBrgInput.value = currentValue - 1;
        } else {
            jmlBrgInput.value = 0;
        }
    }

    // Memastikan input hanya menerima angka
    jmlBrgInput.addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});

// Membuat event listener untuk input RT dan RW
document.getElementById("rt").addEventListener("input", function(event) {
    // Hapus karakter non-angka dari nilai input
    this.value = this.value.replace(/\D/g, '');
});

document.getElementById("rw").addEventListener("input", function(event) {
    // Hapus karakter non-angka dari nilai input
    this.value = this.value.replace(/\D/g, '');
});

document.addEventListener("DOMContentLoaded", function() {

 
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 1s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 1000);
        });
    }, 2500); // 5 seconds
});

document.getElementById('nama_barang').addEventListener('change', function() {
    var selectedNamaBarang = this.value;
    
    // Assuming you have a map of nama_barang to kode_barang
    var barangMap = <?php echo json_encode(array_column($barang_options, 'kode_barang', 'nama_barang')); ?>;
    document.getElementById('kode_barang').value = barangMap[selectedNamaBarang] || '';
});

document.getElementById('addForm').addEventListener('submit', function(event) {
    var qty_barang = parseInt(document.getElementById('qty_barang').value);
    var kode_barang = document.getElementById('kode_barang').value;

    // Fetch the available quantity (assuming you pass this data to the view)
    var availableQuantities = <?php echo json_encode(array_column($barang_options, 'qty_tersedia', 'kode_barang')); ?>;
    var availableQty = availableQuantities[kode_barang] || 0;

    // Check if the quantity is sufficient
    if (document.getElementById('status_barang').value === 'Keluar' && qty_barang > availableQty) {
        event.preventDefault(); // Prevent form submission
        alert('Jumlah barang tidak cukup, yang tersedia adalah : ' + availableQty);
    }
});

document.getElementById('btnTambahBarang').addEventListener('click', function(){
const namaBarang = document.getElementById('nama_barang').value
const statusBarang = document.getElementById('status_barang').value
const qtyBarang = document.getElementById('qty_barang').value
const keteranganBarang = document.getElementById('keterangan_barang').value

const tabelBarangSementara = document.getElementById('tabelBarangSementara')



if(!namaBarang||!statusBarang||!qtyBarang||!keteranganBarang){
  alert("Tidak Boleh Kosong")
}else{

const objectBarangSementara = {
  namaBarang,
  statusBarang,
  qtyBarang,
  keteranganBarang
}

tabelBarangSementara.firstElementChild.textContent === "No data available in table" ? tabelBarangSementara.firstElementChild.remove() : ''
const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${namaBarang}</td>
            <td>${statusBarang}</td>
            <td>${qtyBarang}</td>
            <td>${keteranganBarang}</td>
        `;
        tabelBarangSementara.appendChild(newRow);

        arrayBarangSementara.push(objectBarangSementara)
        console.log(arrayBarangSementara);

}

var fields = [
        'nama_barang',
        'status_barang',
        'qty_barang',
        'keterangan_barang'
    ];

    // Kosongkan nilai field-field tersebut
    fields.forEach(function(fieldId) {
        document.getElementById(fieldId).value = '';
    });

});

</script>