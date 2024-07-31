<?php if ($this->session->flashdata('success')) : ?>
  <div class="alert alert-success">
    <?php echo $this->session->flashdata('success'); ?>
  </div>
<?php endif; ?>

<div id="success-alert" class="alert alert-success" style="display: none;"></div>
<div id="error-alert" class="alert alert-danger" style="display: none;"></div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tambah Data Kejadian</h4>
        <p class="text-muted mb-3">Mohon diisi dengan sebenar-benarnya</p>
        <form id="addForm1" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-12">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="L">L</option>
                  <option value="P">P</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <input type="number" class="form-control" name="usia" id="usia" required>
              </div>
            </div>
          </div>

          ``<div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <input type="text" class="form-control" name="kendaraan" id="kendaraan" required>
              </div>
            </div>``
            <div class="col-md-6">
              <div class="mb-3">
                <label for="luka" class="form-label">Luka</label>
                <input type="text" class="form-control" name="luka" id="luka" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" id="kondisi" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="kronologi_laka" class="form-label">Kronologi Laka</label>
                <input type="text" class="form-control" name="kronologi_laka" id="kronologi_laka" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="tindak_lanjut_laka" class="form-label">Tindak Lanjut Laka</label>
                <input type="text" class="form-control" name="tindak_lanjut_laka" id="tindak_lanjut_laka" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label for="petugas_di_lokasi_laka" class="form-label">Petugas di Lokasi Laka</label>
                <select class="js-example-basic-multiple form-select" id="petugas_di_lokasi_laka" name="petugas_di_lokasi_laka[]" data-width="100%" required multiple>
                    <option value="">--- Pilih Lokasi Kejadian ---</option>
                    <option value="BPBD">BPBD</option>
                    <option value="SATPOL PP">SATPOL PP</option>
                    <option value="DINAS PERHUBUNGAN">DINAS PERHUBUNGAN</option>
                    <option value="DPKP">DPKP</option>
                    <option value="TGC SELATAN">TGC SELATAN</option>
                    <option value="TGC TIMUR">TGC TIMUR</option>
                    <option value="TGC DUKUH PAKIS">TGC DUKUH PAKIS</option>
                    <option value="TGC KEDUNG COWEK">TGC KEDUNG COWEK</option>
                    <option value="TGC UTARA">TGC UTARA</option>
                    <option value="TGC BARAT">TGC BARAT</option>
                    <option value="TGC PUSAT">TGC PUSAT</option>
                    <option value="PMI">PMI</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-md-12">
                  <div class="mb-3">
                      <label for="Dokumentasi Laka" class="form-label">Dokumentasi</label>
                      <input id="dokumentasi_laka" type="file" class="form-control" required name="dokumentasi_laka" accept="image/*" />
                  </div>
              </div>
          </div> 

          <button id="saveButton" class="btn btn-success" type="submit">Save</button>
          <button id="stopButton" class="btn btn-danger" type="button">Selesai</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kejadian</h4>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Usia</th>
                                    <th>Alamat</th>
                                    <th>Kendaraan</th>
                                    <th>Luka</th>
                                    <th>Kondisi</th>
                                    <th>kronologi</th>
                                    <th>Tindak Lanjut</th>
                                    <th>Petugas di Lokasi</th>
                                    <th>Dokumentasi</th>
                                </tr>
                            </thead>
                            <tbody id="dataKejadianTableBody">
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
  $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: true,
                placeholder: "--- Pilih Petugas ---",
                allowClear: true
            });
        });
  setupEventListenersInPartial();
  function setupEventListenersInPartial(){
    const saveButtonPartial = document.getElementById('saveButton');
    if (saveButtonPartial) {
      saveButtonPartial.addEventListener('click', function(event){
        event.preventDefault();
        handleSubmitAndRedirectInsidePartial();
      });
    }

    const stopButtonPartial = document.getElementById('stopButton');
    if(stopButtonPartial){
      stopButtonPartial.addEventListener('click', function(){
        window.location.href = '<?php echo site_url("admin/data_kejadian"); ?>';
      });
    }
  }

  function handleSubmitAndRedirectInsidePartial(){
    const form = document.getElementById('addForm1');
    const formData = new FormData(form);
    const idKejadian = document.getElementById('id_kejadian').value;
    const imageFile = document.getElementById('dokumentasi_laka').files[0];

    const petugasMultiselect = document.getElementById('petugas_di_lokasi_laka');

    // Mengambil semua opsi yang dipilih
    const selectedOptions = petugasMultiselect.selectedOptions;

    // Mengubah HTMLCollection dari selectedOptions menjadi Array dan mengambil nilai (value) dari setiap opsi
    const selectedValues = Array.from(selectedOptions).map(option => option.value);
    const selectedValuesString = selectedValues.join(', ');
    const formObject = {
        id_kejadian: idKejadian,
        petugas_di_lokasi_laka: selectedValuesString
    };
alert(idKejadian);
formData.forEach(function(value, key){
    formObject[key] = value;
});

    alert(idKejadian);

    formData.forEach((value, key) => {
        formObject[key] = value;
    });

    if (imageFile) {
      const imageFormData = new FormData();
      imageFormData.append('image', imageFile);
      const caseType = 'Kecelakaan Lalu Lintas'
      imageFormData.append('case', caseType);

      fetch('<?php echo site_url("admin/data_kejadian/upload_image"); ?>', {
        method: 'POST',
        body: imageFormData
      })
      .then(response => {
    return response.json().catch(() => {
      // If parsing as JSON fails, parse as text
      return response.text().then(text => {
        console.error('Failed to parse JSON, response as text:', text);
        throw new Error('Response is not valid JSON');
      });
    })
  })
      .then(data=> {
        if (data.status === 'success'){
          formObject.dokumentasi_laka = data.image_url;

          fetch("<?= base_url("admin/data_kejadian/save_kecelakaan_lalu_lintas") ?>", {
            method: 'POST',
            body: JSON.stringify(formObject),
            headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin'
          })
          .then(response => response.json())
          .then(data => handleResponse(data, form))
          .catch(handleError);
        } else (
          alert('Gagal mengunggah gambar : ' + data.message)
        )
      })
      .catch(error => {
        console.error('Error:', error);
        alert(error);
      });
    } else {
      fetch(form.action, {
        method: 'POST',
        body: JSON.stringify(formObject),
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        credentials: 'same-origin'
      })
      .then(response => response.json())
      .then(data => handleResponse(data, form))
      .catch(handleError);
    }
  }

  function handleResponse(data, form) {
    const baseUrl = 'http://localhost:80/bpbd';
    if (data.status === 'success') {
      const data1 = data.data;
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td>${data1.nama}</td>
        <td>${data1.jenis_kelamin}</td>
        <td>${data1.usia}</td>
        <td>${data1.alamat}</td>
        <td>${data1.kendaraan}</td>
        <td>${data1.luka}</td>
        <td>${data1.kondisi}</td>
        <td>${data1.kronologi_laka}</td>
        <td>${data1.tindak_lanjut_laka}</td>
        <td>${data1.petugas_di_lokasi_laka}</td>
        <td>
          <img src="${baseUrl}/${data1.dokumentasi_laka}" alt="dokumentasi" width="100">
        </td>
      `;
      document.getElementById('dataKejadianTableBody').appendChild(newRow);

      resetForm(form);

      document.getElementById('success-alert').textContent = 'Data berhasil disimpan';
      document.getElementById('success-alert').style.display = 'block';
      document.getElementById('error-alert').style.display = 'none';
    } else {
      document.getElementById('error-alert').textContent ='Gagal mengirim data: ' + data.message;
      document.getElementById('error-alert').style.display = 'block';
      document.getElementById('success-alert').style.display = 'none';
    }
  }

  function handleError(error){
    console.error('Error:', error);
    document.getElementById('error-alert').textContent = 'Terjadi kesalahan saat mengirim data: ' + error.message;
    document.getElementById('error-alert').style.display = 'block';
    document.getElementById('success-alert').style.display = 'none';
  }

  function resetForm(form){
        form.reset();
        const multiselect = document.getElementById('petugas_di_lokasi_laka');
        // Mengatur ulang multiselect dengan menghapus semua opsi yang terpilih
        for (let option of multiselect.options) {
            option.selected = false;
        }
        multiselect.dispatchEvent(new Event('change'));
    }
</script>