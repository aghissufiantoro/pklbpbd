

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
        <form id="addForm" >
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
                      <option value="<?= $barang->kode_barang ?>"><?= $barang->nama_barang ?></option>
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
                <i id='available-stock'></i>
                <div class="input-group">
                  <button class="btn btn-outline-secondary" type="button" id="kurangBtn">-</button>
                  <input id="qty_barang" class="form-control" name="qty_barang" type="text" value="1" required>
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
              <input oncLick="clearAll();" class="btn btn-success" type="button" value="             clear             ">
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
          <p id="flash"></p>
          <a href="<?= base_url("admin/stock_entry") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input id="btnSubmit" class="btn btn-primary" type="button" value="Submit">
        </form>


      </div>
    </div>
  </div>
</div>

<script>
 let arrayBarangSementara = []
 const BASE_URL = 'http://localhost/bpbd'
 
 let available_stock_global = 0 

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
        console.log(available_stock_global)
        let avail_stock_number = parseInt(available_stock_global)
        console.log(avail_stock_number)
        if(document.getElementById('status_barang').value === 'masuk'){

          if (!isNaN(currentValue)) {
              jmlBrgInput.value = currentValue + 1;
          } else {
              jmlBrgInput.value = 1;
          }
          
        }else{
          if (!isNaN(currentValue) && parseInt(currentValue) < avail_stock_number    ) {
              
              jmlBrgInput.value = currentValue + 1;
          } else {
            
              jmlBrgInput.value = 1;
          }
        }
    }

    function decrementValue() {
        let currentValue = parseInt(jmlBrgInput.value);
        if (!isNaN(currentValue) && currentValue > 1) {
            jmlBrgInput.value = currentValue - 1;
        } else {
            jmlBrgInput.value = 1;
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


function checkIfDataExistOnArray (objectBarangSementara){
    arrayBarangSementara.filter((barang)=>{
      if(barang.id === objectBarangSementara){
        barang.qty = objectBarangSementara.qtyBarang
        barang.statusBarang = objectBarangSementara.statusBarang
        return true
      }
    })
}
let namaBarangText 

document.getElementById('nama_barang').addEventListener('change',function(){
  namaBarangText = this.options[this.selectedIndex].text
})
document.getElementById('btnTambahBarang').addEventListener('click', function(){
const tanggalEntry = document.getElementById('tanggal_entry').value
const kategoriKejadian = document.getElementById('kejadian').value
const idKejadian = document.getElementById('id_kejadian').value
const lokasi_diterima = document.getElementById('lokasi_diterima').value
const penerima_barang = document.getElementById('penerima_barang').value
const kecamatan = document.getElementById('kecamatan').value
const kelurahan = document.getElementById('kelurahan').value
const namaBarang = document.getElementById('nama_barang').value

const statusBarang = document.getElementById('status_barang').value
const qtyBarang = document.getElementById('qty_barang').value
const keteranganBarang = document.getElementById('keterangan_barang').value



const tabelBarangSementara = document.getElementById('tabelBarangSementara')



if(!namaBarang||!statusBarang||!qtyBarang||!keteranganBarang
  ||!tanggalEntry||!kategoriKejadian||!idKejadian||!lokasi_diterima
  ||!penerima_barang||!kecamatan||!kelurahan
){
  alert("Tidak Boleh Kosong")
}else{

const objectBarangSementara = {
  tanggalEntry,kategoriKejadian,idKejadian,lokasi_diterima,
  penerima_barang,kecamatan,kelurahan,
  id_barang:namaBarang,
  statusBarang,
  qtyBarang,
  keteranganBarang
}

tabelBarangSementara.firstElementChild.innerText === "No data available in table" ? tabelBarangSementara.firstElementChild.remove() : ''
const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${namaBarangText}</td>
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

const clearAllForm = () =>{
  var fields = [
        'tanggal_entry',
        'lokasi_diterima',
        'kejadian',
        'id_kejadian',
        'kecamatan',
        'kelurahan',
        'penerima_barang',
        'nama_barang',
        'status_barang',
        'qty_barang',
        'keterangan_barang'
    ];
     arrayBarangSementara = []
    // Kosongkan nilai field-field tersebut
    fields.forEach(function(fieldId) {
        document.getElementById(fieldId).value = '';
    });
    document.getElementById('tabelBarangSementara').innerHTML = ''
}

const kejadian = document.getElementById('kejadian');
   
kejadian.addEventListener('change',function(){
      filterIDKejadian('kejadian',this.value,document.getElementById('tanggal_entry').value , 'id_kejadian')
})

    const namaBarang = document.getElementById('nama_barang')

    namaBarang.addEventListener('change', function() {
    fetch(`${BASE_URL}/admin/stock_entry/checkStock`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            kode_barang: this.value
        })
    })
    .then(response => {
        // Check if the response is okay
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data);
        available_stock_global = data.available_stock;
        var targetSelect = document.getElementById('available-stock');
        var statusBarang = document.getElementById('status_barang')
        targetSelect.innerHTML = '';
        var qtyBarang = document.getElementById('qty_barang')
       
        targetSelect.innerHTML = data.available_stock > 0 ? `stock tersedia : ${data.available_stock}` : 'stock kosong';

        if(data.available_stock > 0){
          qtyBarang.value = 1
          const status = [
          {
            label:'--- Pilih Status Barang ---',
            value:''
          },
          {
            label:'masuk',
            value:'masuk'
          },
          {
            label:'keluar',
            value:'keluar'
          },
          {
            label:'rusak',
            value:'rusak'
          },
          {
            label:'tersedia',
            value:'tersedia'
          }
        ]
          statusBarang.innerHTML = ''

          status.forEach(item => {
                  var option = new Option(item.label, item.value);
                  statusBarang.appendChild(option);
              });


        }else{
          qtyBarang.value = 0
          const status = [
          {
            label:'--- Pilih Status Barang ---',
            value:''
          },
          {
            label:'masuk',
            value:'masuk'
          },
        ]
          statusBarang.innerHTML = ''

          status.forEach(item => {
                  var option = new Option(item.label, item.value);
                  statusBarang.appendChild(option);
              });

        }

    })
    .catch((error) => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengambil data.');
    });
    console.log(this.value);
});



  
    const id_kejadian_textForm = document.getElementById('id_kejadian');
    const tanggalEntry = document.getElementById('datePickerExample');

    document.getElementById('btnSubmit').addEventListener('click',handleBatchPost)

    function handleBatchPost(e) {
    e.preventDefault();
    fetch(`${BASE_URL}/admin/stock_entry/save_stock_entry`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(arrayBarangSementara)
    })
    .then(response => response.text())
    .then(data => {
      let jsonObjects = [];

    try {
        // Try to parse as a single JSON object
        jsonObjects.push(JSON.parse(data));
    } catch (error) {
        // If parsing as a single JSON object fails, handle as multiple concatenated JSON objects
        let jsonStrings = data.split('}{').map((str, index, array) => {
            if (index === 0) {
                // First element, add closing brace at the end
                return str + '}';
            } else if (index === array.length - 1) {
                // Last element, add opening brace at the start
                return '{' + str;
            } else {
                // Middle elements, add both braces
                return '{' + str + '}';
            }
        });

        // Parse each JSON string
        jsonObjects = jsonStrings.map(str => JSON.parse(str));
    }

    // Handle each parsed object
    jsonObjects.forEach(jsonObject => {
        let flash = document.getElementById('flash');
        if (jsonObject.status !== 'success') {
            flash.innerText = 'Data gagal dikirim';
        } else {
            flash.innerText = 'Data berhasil dikirim';
            clearAllForm(); // Assuming clearAllForm is a function that clears the form
        }
    });

    })
    .catch((error) => {
      console.error('Error:', error);
     
      alert('Terjadi kesalahan saat mengambil data.');
    });
}
    
    function filterIDKejadian(dataType, search, search2, targetSelectId) {
      console.log(search)
        fetch(`${BASE_URL}/admin/stock_entry/get_filtered_id`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                data: dataType,
                search: search,
                search2: search2 
            })
        })
        .then(response => response.json())
        .then(data => {
           
            var targetSelect = document.getElementById(targetSelectId);
            targetSelect.innerHTML = '';
            var defaultOption
            if(data.length !== 0){

              defaultOption = new Option(`--- Pilih ---`, '');
             
             targetSelect.appendChild(defaultOption);
            data.forEach(item => {
                var option = new Option(item.label, item.value);
                targetSelect.appendChild(option);
            });

            if(document.getElementById('id_kejadian').value === `--- Pilih ---`){
              document.getElementById('id_kejadian').append(defaultOption)
            }
            }else{
              defaultOption = new Option(`--- Tidak Ada Kejadian ---`, '');
              defaultOption2 = new Option(`--- Tidak Ada Kejadian ---`, '');
              const idKejadianOption = document.getElementById('id_kejadian')
              idKejadianOption.innerHTML = ''
              idKejadianOption.appendChild(defaultOption2)
              data.forEach(item => {
                var option = new Option(item.label, item.value);
                idKejadianOption.appendChild(option);
              });
              targetSelect.appendChild(defaultOption);
              
              data.forEach(item => {
                  var option = new Option(item.label, item.value);
                  targetSelect.appendChild(option);
              });

              console.log('babi')
            }
            
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
                    filterIDKejadian('tanggal',document.getElementById('tanggal_entry').value,'','kejadian')
                    clearInterval(checkInterval);
                });
            }
        }
        
        const checkInterval = setInterval(checkForElement, 100);
    });




</script>
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