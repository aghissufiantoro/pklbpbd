

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
            <div class="col-md-3">
              <div class="mb-3">
                <label for="tanggal_entry" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tanggal_entry" id="tanggal_entry" required autocomplete="off">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>

            <div class="col-md-3">
            <div class="mb-3">
              <label for="kejadian" class="form-label">Kategori Kejadian</label>
                <select class="form-select" id="kejadian" name="kejadian" required>
                <option value="">--- Pilih Kategori ---</option>
                <?php
                  $query = $this->db->query('SELECT kejadian FROM data_kejadian group by kejadian')->result();
                  foreach ($query as $hasil) {
                  ?>
                    <option value="<?= $hasil->kejadian ?>"><?=$hasil->kejadian ?></option>
                  <?php
                  }
                  ?>
                </select>
                </div>
          </div>

          <div class="col-md-4">
            <div class="mb-3">
              <label for="id_kejadian" class="form-label">ID Kejadian</label>
                <select class="form-select" id="id_kejadian" name="id_kejadian" required>
                <option value="">--- Pilih ID Kejadian ---</option>
                <?php
                  $ql = $this->db->query('SELECT id_kejadian, kejadian, alamat_kejadian FROM data_kejadian GROUP BY id_kejadian')->result();
                  foreach ($ql as $qz) {
                  ?>
                    <option value="<?= $qz->id_kejadian ?>"><?= $qz->id_kejadian."-".$qz->kejadian."-".$qz->alamat_kejadian ?></option>
                  <?php
                  }
                  ?>
                </select>
                </div>
          </div>
          
        </div>

        <!-- baris kedua -->
          <div class="row">
            <div class="col-md-3">
                <div class="mb-3">
                  <label for="lokasi_diterima" class="form-label">Lokasi Diterima</label>
                  <input id="lokasi_diterima" class="form-control" name="lokasi_diterima" type="text" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                  <label for="penerima_barang" class="form-label">Penerima Barang</label>
                  <input id="penerima_barang" class="form-control" name="penerima_barang" type="text" required>
                </div>
            </div>

            <div class="col-md-2 d-flex align-items-end">
              <div class="mb-3">
              <label for="kecamatan">Kecamatan</label>
                <select class="form-control <?= form_error('kecamatan') ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" required>
                <option value="">--- Pilih Kecamatan ---</option>
                  <?php foreach ($kecamatan_options as $kecamatan): ?>
                      <option value="<?= $kecamatan->kecamatan ?>"><?= $kecamatan->kecamatan ?></option>
                  <?php endforeach; ?>
                 </select>
                 <div class="invalid-feedback">
                <?= form_error('kecamatan') ?>
                </div>
              </div>
            </div>
            <div class="col-md-2 ">
              <div class="mb-3 ">
                <label for="kelurahan">Desa</label>

                    <select class="form-control <?= form_error('kelurahan') ? 'is-invalid' : '' ?>" id="kelurahan" name="kelurahan" required>
                        <option value="">--- Pilih Desa ---</option>
                        <?php foreach ($kelurahan_options as $kelurahan): ?>
                      <option value="<?= $kelurahan->kelurahan ?>"><?= $kelurahan->kelurahan ?></option>
                  <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= form_error('kelurahan') ?>
                    </div>
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
              <input id="btnTambahBarang" class="btn btn-success" type="button" value="              Add              ">
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
 const BASE_URL = 'http://localhost/bpbd'
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

//AJX
document.addEventListener("DOMContentLoaded", function() {
    // document.getElementById('tanggal_entry').addEventListener('change', filterIDKejadian);
    // document.getElementById('kejadian').addEventListener('change', filterIDKejadian);
});


function contentChanged() {
        var selectedKecamatan = document.getElementById('select2-kecamatan_kejadian-container');
        console.log(selectedKecamatan.title);
        
        if (selectedKecamatan.title !== '--- Mohon Pilih Kecamatan ---' && selectedKecamatan.title !== pastValue) {
            console.log('Executing fetchOptions');
            fetchExecuted = true;
            pastValue = selectedKecamatan.title;
            fetchOptions('desa', selectedKecamatan.textContent.trim(), 'kelurahan_kejadian');
        } else {
            console.log('Already executed fetchOptions or title is unchanged.');
        }
    }
    
    var myElement = document.getElementById('kejadian');
   
    myElement.addEventListener('change',function(){
      filterIDKejadian('kejadian',myElement.value , 'id_kejadian')
    })
    // var observer = new MutationObserver(function(mutations) {
    //     mutations.forEach(function(mutation) {
            
    //         contentChanged();
    //     });
    // });
    // observer.observe(myElement, { childList: true, subtree: true });
    
    var id_kejadian_textForm = document.getElementById('id_kejadian');
    var tanggalEntry = document.getElementById('datePickerExample');
    

    
    function filterIDKejadian(dataType, search, targetSelectId) {
      console.log(search)
        fetch(`${BASE_URL}/admin/stock_entry/get_filtered_id`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                data: dataType,
                search: search
            })
        })
        .then(response => response.json())
        .then(data => {
           
            var targetSelect = document.getElementById(targetSelectId);
            targetSelect.innerHTML = '';
            var defaultOption = new Option(`--- Pilih ---`, '');
            targetSelect.appendChild(defaultOption);
            data.forEach(item => {
                var option = new Option(item.label, item.value);
                targetSelect.appendChild(option);
            });
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengambil data.');
        });
    }
    
    tanggalEntry.addEventListener('click', function() {
        console.log('0');
        
        function checkForElement() {
            const datePickerContainer = document.querySelector(".datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom");
            if (datePickerContainer) {
                console.log("wuhan");
                datePickerContainer.addEventListener('click', function() {
                    console.log('Date picker clicked');
                    filterIDKejadian('tanggal',document.getElementById('tanggal_entry').value,'kejadian')
                    clearInterval(checkInterval);
                });
            }
        }
        
        const checkInterval = setInterval(checkForElement, 100);
    });

// function filterIDKejadian() {
//     var tanggalKejadian = document.querySelector('#tanggal_kejadian').value;
//     var kategoriKejadian = document.getElementById('kejadian').value;

//     if (tanggalKejadian && kategoriKejadian) {
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', '<?= site_url("admin/stock_entry/filter_id_kejadian") ?>', true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

//         xhr.onload = function() {
//             if (xhr.status === 200) {
//                 var data = JSON.parse(xhr.responseText);
//                 var idKejadianSelect = document.getElementById('id_kejadian');
//                 idKejadianSelect.innerHTML = '<option value="">--- Pilih ID Kejadian ---</option>';

//                 data.forEach(function(item) {
//                     var option = document.createElement('option');
//                     option.value = item.id_kejadian;
//                     option.textContent = item.id_kejadian + "-" + item.kejadian + "-" + item.alamat_kejadian;
//                     idKejadianSelect.appendChild(option);
//                 });
//             } else {
//                 console.error('Error:', xhr.statusText);
//             }
//         };

//         xhr.send('tanggal_entry=' + encodeURIComponent(tanggalKejadian) + '&kejadian=' + encodeURIComponent(kategoriKejadian));
//     }
// }

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#kecamatan').change(function() {
        var kecamatan = $(this).val();
        $.ajax({
            url: '<?= site_url('admin/stock_entry/get_kelurahan_by_kecamatan') ?>',
            type: 'POST',
            data: {kecamatan: kecamatan},
            dataType: 'json',
            success: function(data) {
                $('#kelurahan').empty();
                $('#kelurahan').append('<option value="">--- Pilih Desa ---</option>');
                $.each(data, function(key, value) {
                    $('#kelurahan').append('<option value="'+ value.desa +'">'+ value.desa +'</option>');
                });
            }
        });
    });
});

</script>

