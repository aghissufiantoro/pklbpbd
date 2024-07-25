<?php
if ($this->session->flashdata('success')) {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data Kejadian telah diubah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
  </div>
<?php
}
?>

<!-- <nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Tables</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data Table</li>
	</ol>
</nav> -->

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Ubah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="editForm" action="<?php echo base_url("admin/data_kejadian/update_data") ?>" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input type="text" class="form-control" name="tanggal" required value="<?= $data_kejadian->tanggal ?>">
                  <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="kejadian">Kejadian</label>
                <input readonly type="text" class="form-control" id="kejadian" name="kejadian" data-width="100%" value="<?php echo $data_kejadian->kejadian ?>"/>
                <!-- <select readonly class="form-select" id="kejadian" name="kejadian" data-width="100%">
                  <option value="">--- Pilih Kejadian ---</option>
                  <option <?php if ($data_kejadian->kejadian == "Kecelakaan Lalu Lintas") {
                            echo "selected";
                          } ?> value="Kecelakaan Laka">Kecelakaan Lalu Lintas</option>
                  <option <?php if ($data_kejadian->kejadian == "Darurat Medis") {
                            echo "selected";
                          } ?> value="Darurat Medis">Darurat Medis</option>
                  <option <?php if ($data_kejadian->kejadian == "Kebakaran") {
                            echo "selected";
                          } ?> value="Kebakaran">Kebakaran</option>
                  <option <?php if ($data_kejadian->kejadian == "Pohon Tumbang") {
                            echo "selected";
                          } ?> value="Pohon Tumbang">Pohon Tumbang</option>
                  <option <?php if ($data_kejadian->kejadian == "Penemuan Jenazah") {
                            echo "selected";
                          } ?> value="Penemuan Jenazah">Penemuan Jenazah</option>
                  <option <?php if ($data_kejadian->kejadian == "Orang Tenggelam") {
                            echo "selected";
                          } ?> value="Orang Tenggelam">Orang Tenggelam</option>
                  <option <?php if ($data_kejadian->kejadian == "Lainnya") {
                            echo "selected";
                          } ?> value="Lainnya">Lainnya</option>
                </select> -->
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="lokasi_kejadian">Lokasi Kejadian</label>
                <select class="form-select" id="lokasi_kejadian" name="lokasi_kejadian" data-width="100%">
                  <option value="">--- Pilih Lokasi Kejadian ---</option>
                  <?php
                  $ql = $this->db->query('SELECT wilayah FROM wilayah_2022 GROUP BY wilayah')->result();
                  foreach ($ql as $qz) {
                    $selected = ($qz->wilayah == $data_kejadian->lokasi_kejadian) ? 'selected' : '';
                    echo '<option value="' . $qz->wilayah . '" ' . $selected . '>' . $qz->wilayah . '</option>';
                  }
                  ?>
                  
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_berita" class="form-label">Waktu Berita</label>
                <input type="time" class="form-control" name="waktu_berita" id="waktu_berita" required autocomplete="off" value="<?= $data_kejadian->waktu_berita ?>">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_tiba" class="form-label">Waktu Tiba</label>
                <input type="time" class="form-control" name="waktu_tiba" id="waktu_tiba" required autocomplete="off" value="<?= $data_kejadian->waktu_berita ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label for="alamat_kejadian" class="form-label">Alamat Kejadian</label>
                <input id="alamat_kejadian" class="form-control" name="alamat_kejadian" type="text" value="<?= $data_kejadian->alamat_kejadian ?>">
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="kabkota_kejadian">Kota</label>
                <select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" data-width="100%" required>
                <option value="SURABAYA" selected>SURABAYA</option>
                </select>
              </div>
            </div> -->
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="kecamatan_kejadian">Kecamatan</label>
                <select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" data-width="100%" required>
                  <option value="">--- Pilih Kota Terlebih Dahulu ---</option>
                  <?php
                  $ql = $this->db->query("SELECT kecamatan FROM wilayah_2022 WHERE wilayah=? GROUP BY kecamatan ORDER BY kecamatan", [$data_kejadian->lokasi_kejadian])->result();
                  foreach ($ql as $qz) {
                    $selected = ($qz->kecamatan == $data_kejadian->kecamatan_kejadian) ? 'selected' : '';
                    echo '<option value="' . $qz->kecamatan . '" ' . $selected . '>' . $qz->kecamatan . '</option>';
                  }
                  ?>
                  
                </select>
              </div>
            </div>
            <div  id="kecamatan"  class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="kelurahan_kejadian">Kelurahan / Desa</label>
                <select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" data-width="100%" required>
                  <option value="">--- Pilih Kecamatan Terlebih Dahulu ---</option>
                  <?php
                  $ql = $this->db->query("SELECT desa FROM wilayah_2022 WHERE kecamatan=? GROUP BY desa ORDER BY desa", [$data_kejadian->kecamatan_kejadian])->result();
                  foreach ($ql as $qz) {
                    $selected = ($qz->desa == $data_kejadian->kelurahan_kejadian) ? 'selected' : '';
                
                    echo '<option value="' . $qz->desa . '" ' . $selected . '>' . $qz->desa . '</option>';
                    
                  }
                  ?>
                  
                </select>
                
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="kronologi" class="form-label">Kronologi</label>
                <input id="kronologi" class="form-control" name="kronologi" type="text" value="<?= $data_kejadian->kronologi ?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tindak_lanjut" class="form-label">Catatan Tindak Lanjut</label>
                <input id="tindak_lanjut" class="form-control" name="tindak_lanjut" type="text" value="<?= $data_kejadian->tindak_lanjut ?>">
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="petugas_lapangan" class="form-label">Petugas</label>
                <br>
                <label for="petugas_lokasi" class="form-label"><strong>(Contoh: BPBD Kota Surabaya; TGC Posko Selatan; Ambulance PMI)</strong></label>
                <input id="petugas_lokasi" class="form-control" name="petugas_lokasi" type="text" value="<?= $data_kejadian->petugas_lokasi ?>">
              </div>
            </div>
          </div> -->

          <img id="image-preview" src="<?php echo base_url($data_kejadian->dokumentasi)  ?>" class="img-fluid" alt="Descriptive alt text" />

          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Diri</label>
            <input id="dokumentasi" type="file" class="form-control"   name="dokumentasi" accept="image/*"/>
          </div>

          <input type="submit" value="Submit" class="btn btn-primary" >
          <a href="<?= base_url("admin/data_kejadian") ?>">
            <button type="button" class="btn btn-outline-warning">Kembali</button>
          </a>
        
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  // Flag to track if fetchOptions has been executed
var fetchExecuted = false;



var initKecamatanValue = "<?php echo $data_kejadian->kecamatan_kejadian ?>"
var init = true
// if(init){
//   init = false
//   fetchOptions('desa', initKecamatanValue, 'kelurahan_kejadian');
// }


// Variable to store the previous value of selectedKecamatan.title
var pastValue = '';

// Function to handle content change in 'kecamatan' element
function contentChanged() {
 
    var selectedKecamatan = document.getElementById('select2-kecamatan_kejadian-container');
    selectedKecamatanInDropDown = selectedKecamatan;
    console.log(selectedKecamatan.title);

    // Check if selectedKecamatan has changed and fetchOptions has not been executed
    if (selectedKecamatan.title !== '--- Mohon Pilih Kecamatan ---' && selectedKecamatan.title !== pastValue  ) {
        console.log('Executing fetchOptions');
        
        fetchExecuted = true;
        pastValue = selectedKecamatan.title; // Update pastValue
        if(init=== false){
          init = false;
          fetchOptions('desa', selectedKecamatan.textContent.trim(), 'kelurahan_kejadian');
        }
    } else {
        init = false
        console.log('Already executed fetchOptions or title is unchanged.');
    }
}

// Add event listener using DOMSubtreeModified (Not recommended, use 'change' event instead)
var myElement = document.getElementById('kecamatan');
if (window.addEventListener) {
    // For normal browsers
    fetchExecuted = false
    myElement.addEventListener('DOMSubtreeModified', contentChanged, false);
} else if (window.attachEvent) {
    // For IE
    myElement.attachEvent('DOMSubtreeModified', contentChanged);
}


    document.getElementById('lokasi_kejadian').addEventListener('change', function() {
        var wilayah = this.value;
        selected = document.getElementById('select2-kecamatan_kejadian-container');
        console.log(selected)
       
        fetchOptions('kecamatan', wilayah, 'kecamatan_kejadian');
    });

   
    // Event listener for change on kecamatan_kejadian select
    
    // document.getElementById('select2-kecamatan_kejadian-container').addEventListener('change', function() {
    //     var wilayah = this.value;
        
    //     console.log('aaaa')
    //     console.log(selected)
        
    // });
 

    // Function to fetch options dynamically based on selected value
    function fetchOptions(dataType, wilayah, targetSelectId) {
        fetch('<?= base_url('admin/data_kejadian/get_daerah') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                data: dataType,
                wilayah: wilayah
            })
        })
        .then(response => response.json())
        .then(data => {
            var targetSelect = document.getElementById(targetSelectId);
            targetSelect.innerHTML = ''; // Clear existing options
            var defaultOption = new Option(`--- Pilih ${capitalizeFirstLetter(dataType)} ---`, '');
            targetSelect.appendChild(defaultOption); // Add default option
            data.forEach(item => {
                var option = new Option(item.label, item.value);
                targetSelect.appendChild(option); // Add fetched options
            });
        })
        .catch(() => {
          
            alert('Terjadi kesalahan dalam mengambil data.');
        });
    }

    // Function to capitalize the first letter of a string
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    // Set default value for kabkota_kejadian
    // document.getElementById('kabkota_kejadian').value = 'surabaya';

    // Function to get selected value from Select2-like container
    function getSelectedValueFromSelect2Container(select2ContainerId) {
        var container = document.getElementById(select2ontainerId);
        if (container) {
            var selectedText = container.getAttribute('title') || container.textContent;
            console.log('Selected value:', selectedText);
            // Optionally, set this selected value to an input field or use it as needed
            document.getElementById('selected_kecamatan_value').value = selectedText; // Example: Set to an input field
        }
    }

    // Event listener for change on kecamatan_kejadian to get selected value
    document.getElementById('kecamatan_kejadian').addEventListener('change', function() {
        getSelectedValueFromSelect2Container('select2-kecamatan_kejadian-container');
    });

    // Trigger change event to initialize Select2-like behavior (if necessary)
  // var event = new Event('change');
  // document.getElementById('kabkota_kejadian').dispatchEvent(event);
    
  document.getElementById('editForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);
        const id_kejadian = "<?php echo $data_kejadian->id_kejadian ?>"
        const pastImageSrc = "<?php echo $data_kejadian->dokumentasi  ?>"
        const imageFile = document.getElementById('dokumentasi').files[0];
        console.log(imageFile);
        console.log(pastImageSrc)

        formData.append('id_kejadian',id_kejadian)
        if (imageFile) {
            const imageFormData = new FormData();
            imageFormData.append('image', imageFile);
            
            // Add case type to imageFormData
            const caseType = '' // assuming kejadian is the case type selector
            imageFormData.append('case', caseType);

            imageFormData.append('pastImageSrc',pastImageSrc)

           
            // Upload the image first
            fetch('<?= base_url('admin/data_kejadian/update_image') ?>', {
                method: 'POST',
                body: imageFormData
            })
            .then(response => response.json())
            .then(data => {
              for (var pair of formData.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}

                if (data.status === 'success') {
                    // Add the image URL to the form data
                    formData.append('image_url', data.image_url);
                    formData.append('update',true)

                    // Now submit the form with the image URL
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => console.log(response.text()))
                    .then(data => {
                      console.log(data)
                       alert('berhasil');
                       window.location.reload(); 
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengirim data.');
                    });
                } else {
                  console.log('kontil');
                  console.log(data)
                    alert('Gagal mengunggah gambar: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengunggah gambar.');
            });
        } else {
            // If no image is selected, just submit the form data
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(data => {
               
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim data.');
            });
        }
    });

});

</script>