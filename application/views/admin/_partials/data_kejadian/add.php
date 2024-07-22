
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="addForm" action="<?= base_url("admin/data_kejadian/add") ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Kejadian</label>
                <div class="input-group date datepicker" id="datePickerExample">
                  <input id="tanggal" type="text" class="form-control" name="tanggal" required autocomplete="off">
                  <span id="tanggal-icon" class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="id_kejadian" class="form-label">ID KEJADIAN</label>
                <input id="id_kejadian" class="form-control" name="id_kejadian" type="text"  value="" readonly>
              
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="kejadian">Kejadian</label>
                <select class="form-select" id="kejadian" name="kejadian" data-width="100%">
                  <option value="">--- Pilih Kejadian ---</option>
                  <option value="Kecelakaan Lalu Lintas">Kecelakaan Lalu Lintas</option>
                  <option value="Darurat Medis">Darurat Medis</option>
                  <option value="Kebakaran">Kebakaran</option>
                  <option value="Pohon Tumbang">Pohon Tumbang</option>
                  <option value="Penemuan Jenazah">Penemuan Jenazah</option>
                  <option value="Orang Tenggelam">Orang Tenggelam</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_berita" class="form-label">Waktu Berita</label>
                <input type="time" class="form-control" name="waktu_berita" id="waktu_berita" required autocomplete="off">
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="waktu_tiba" class="form-label">Waktu Tiba</label>
                <input type="time" class="form-control" name="waktu_tiba" id="waktu_tiba" required autocomplete="off">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="lokasi_kejadian">Lokasi Kejadian</label>
                <select class="form-select" id="lokasi_kejadian" name="lokasi_kejadian" data-width="100%">
                  <option value="">--- Pilih Lokasi Kejadian ---</option>
                  <?php
                  $ql = $this->db->query('SELECT wilayah FROM wilayah_2022 GROUP BY wilayah')->result();
                  foreach ($ql as $qz) {
                  ?>
                    <option value="<?= $qz->wilayah ?>"><?= $qz->wilayah ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-5">
              <div class="mb-3">
                <label for="alamat_kejadian" class="form-label">Alamat Kejadian</label>
                <input id="alamat_kejadian" class="form-control" name="alamat_kejadian" type="text">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kabkota_kejadian">Kota</label>
              <select class="js-example-basic-single form-select" id="kabkota_kejadian" name="kabkota_kejadian" data-width="100%" required>
                <option value="surabaya">SURABAYA</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="kecamatan_kejadian">Kecamatan</label>
              <select class="js-example-basic-single form-select" id="kecamatan_kejadian" name="kecamatan_kejadian" data-width="100%" required>
                <option value="">--- Mohon Pilih Kecamatan ---</option>
              </select>
            </div>
            <div class="mb-3" id="kecamatan">
              <label class="form-label" for="kelurahan_kejadian">Kelurahan / Desa</label>
              <select class="js-example-basic-single form-select" id="kelurahan_kejadian" name="kelurahan_kejadian" data-width="100%" required>
                <option value="">--- Pilih Kelurahan ---</option>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="kronologi" class="form-label">Kronologi</label>
                <input id="kronologi" class="form-control" name="kronologi" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                <input id="tindak_lanjut" class="form-control" name="tindak_lanjut" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-15">
              <div class="mb-3">
                <label for="petugas_lokasi" class="form-label">Petugas</label>
                <br>
                <label for="petugas_lokasi" class="form-label"><strong>(Contoh: BPBD Kota Surabaya; TGC Posko Selatan; Ambulance PMI)</strong></label>
                <input id="petugas_lokasi" class="form-control" name="petugas_lokasi" type="text">
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="foto_artikel" class="form-label">Foto Diri</label>
            <input id="dokumentasi" type="file" class="form-control" required name="dokumentasi" accept="image/*" />
          </div>

          <button type="submit" value="Submit" class="btn btn-primary" >Submit</button>
        </form>
        <div id="partialContainer"></div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Flag to track if fetchOptions has been executed
var fetchExecuted = false;

var id_kejadian1 ="<?=  $this->session->flashdata('new_id_kejadian'); ?>"

// Variable to store the previous value of selectedKecamatan.title
var pastValue = '';

// Function to handle content change in 'kecamatan' element
function contentChanged() {
    var selectedKecamatan = document.getElementById('select2-kecamatan_kejadian-container');
    console.log(selectedKecamatan.title);

    // Check if selectedKecamatan has changed and fetchOptions has not been executed
    if (selectedKecamatan.title !== '--- Mohon Pilih Kecamatan ---' && selectedKecamatan.title !== pastValue) {
        console.log('Executing fetchOptions');
        fetchExecuted = true;
        pastValue = selectedKecamatan.title; // Update pastValue
        fetchOptions('desa', selectedKecamatan.textContent.trim(), 'kelurahan_kejadian');
    } else {
        console.log('Already executed fetchOptions or title is unchanged.');
    }
}

// Add event listener using DOMSubtreeModified (Not recommended, use 'change' event instead)
var myElement = document.getElementById('kecamatan');
if (window.addEventListener) {
    // For normal browsers
    myElement.addEventListener('DOMSubtreeModified', contentChanged, false);
} else if (window.attachEvent) {
    // For IE
    myElement.attachEvent('DOMSubtreeModified', contentChanged);
}

var tanggalIcon = document.getElementById('tanggal-icon');
var id_kejadian_textForm = document.getElementById('id_kejadian');
var tanggalInput = document.getElementById('tanggal');

function fetchData() {
    console.log('Fetch data triggered with value:', tanggalInput.value);
    var formData = new FormData();
    formData.append('tanggal', tanggalInput.value);

    fetch('<?= base_url('admin/data_kejadian/getLastIdKejadianByAjax') ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            console.error('Error:', data.error);
            alert('Terjadi kesalahan: ' + data.error);
        } else {
            console.log('New ID Kejadian:', data.new_id_kejadian);
            id_kejadian_textForm.value = data.new_id_kejadian;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat mengambil data.');
    });
}

tanggalIcon.addEventListener('click', function() {
  console.log('0')
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                const datePickerContainer = document.querySelector(".datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-bottom");
                if (datePickerContainer) {
                    datePickerContainer.addEventListener('click', function() {
                        console.log('Date picker clicked');
                        fetchData();
                        // Disconnect the observer once we have added the event listener
                        observer.disconnect();
                    });
                }
            }
        });
    });

    // Start observing the document for changes
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
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
    document.getElementById('kabkota_kejadian').value = 'surabaya';

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
    var event = new Event('change');
    document.getElementById('kabkota_kejadian').dispatchEvent(event);
    
    document.getElementById('addForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = e.target;
        const formData = new FormData(form);

        // Check if an image is selected
        const imageFile = document.getElementById('dokumentasi').files[0];
        if (imageFile) {
            const imageFormData = new FormData();
            imageFormData.append('image', imageFile);
            
            // Add case type to imageFormData
            const caseType = '' // assuming kejadian is the case type selector
            imageFormData.append('case', caseType);

            // Upload the image first
            fetch('<?= base_url('admin/data_kejadian/upload_image') ?>', {
                method: 'POST',
                body: imageFormData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Add the image URL to the form data
                    formData.append('image_url', data.image_url);

                    // Now submit the form with the image URL
                    fetch(form.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(html => {
                        const partialContainer = document.getElementById('partialContainer');
                        partialContainer.innerHTML = html;

                        // Execute any scripts in the newly added HTML
                        const scripts = partialContainer.getElementsByTagName('script');
                        for (let i = 0; i < scripts.length; i++) {
                            const script = document.createElement('script');
                            script.text = scripts[i].text;
                            document.head.appendChild(script).parentNode.removeChild(script);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat mengirim data.');
                    });
                } else {
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
            .then(html => {
                const partialContainer = document.getElementById('partialContainer');
                partialContainer.innerHTML = html;

                // Execute any scripts in the newly added HTML
                const scripts = partialContainer.getElementsByTagName('script');
                for (let i = 0; i < scripts.length; i++) {
                    const script = document.createElement('script');
                    script.text = scripts[i].text;
                    document.head.appendChild(script).parentNode.removeChild(script);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengirim data.');
            });
        }
    });

});

</script>
