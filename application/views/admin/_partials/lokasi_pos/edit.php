<?php
if ($this->session->flashdata('success')) {
?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUKSES!</strong> Data lokasi pos telah ditambahkan.
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
        <h4 class="card-title">Tambah Data Lokasi POS</h4>
        <p class="text-muted mb-3">Mohon di isi dengan sebenar-benarnya</p>
        <form id="addForm" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_lokasi_pos" value="<?= $lokasi_pos->id_lokasi_pos ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama_lokasi_pos" class="form-label">Nama Lokasi POS</label>
                <input id="nama_lokasi_pos" class="form-control" name="nama_lokasi_pos" autocomplete="off" value="<?= $lokasi_pos->nama_lokasi_pos ?>" type="text">
              </div>
              <div class="mb-3">
                <label class="form-label" for="form_des">Kelurahan / Desa</label>
                <select class="js-example-basic-single form-select" id="form_des" name="kel_lokasi_pos" data-width="100%" required>
                  <?php
                  $ql = $this->db->query('SELECT DISTINCT desa, id FROM wilayah_2022')->result();
                  foreach ($ql as $qz) {
                    $selected = ($qz->id == $lokasi_pos->wilayah_id) ? 'selected' : '';
                  ?>
                    <option value="<?= htmlspecialchars($qz->id) ?>" <?= $selected ?>><?= htmlspecialchars($qz->desa) ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="form_kec">Kecamatan</label>
                <?php
                if (isset($lokasi_pos->wilayah_id)) {
                  $query = $this->db->query('SELECT kecamatan FROM wilayah_2022 WHERE id=?', [$lokasi_pos->wilayah_id]);

                  if ($query !== false) {
                    $result = $query->row();
                    if ($result) {
                      $kecamatan = htmlspecialchars($result->kecamatan);
                      echo '<input id="nama_lokasi_pos" class="form-control" name="kec_lokasi_pos" value="' . $kecamatan . '" type="text" readonly>';
                    } else {
                      echo '<input id="nama_lokasi_pos" class="form-control" name="kec_lokasi_pos"  value="Kecamatan tidak ditemukan" type="text" readonly>';
                    }
                  } else {
                    echo '<input id="nama_lokasi_pos" class="form-control" name="kec_lokasi_pos"  value="Query gagal" type="text" readonly>';
                  }
                } else {
                  echo '<input id="nama_lokasi_pos" class="form-control" name="kec_lokasi_pos" value="Wilayah ID tidak ditemukan" type="text" readonly>';
                }
                ?>
              </div>
              <div class="mb-3">
                <label class="form-label" for="form_kab">Kota</label>
                <?php
                if (isset($lokasi_pos->wilayah_id)) {
                  $query = $this->db->query('SELECT wilayah FROM wilayah_2022 WHERE id=?', [$lokasi_pos->wilayah_id]);

                  if ($query !== false) {
                    $result = $query->row();
                    if ($result) {
                      $kabupaten = htmlspecialchars($result->wilayah);
                      echo '<input id="nama_lokasi_pos" class="form-control" name="kab_lokasi_pos" value="' . $kabupaten . '" type="text" readonly>';
                    } else {
                      echo '<input id="nama_lokasi_pos" class="form-control" name="kab_lokasi_pos"  value="Kabupaten tidak ditemukan" type="text" readonly>';
                    }
                  } else {
                    echo '<input id="nama_lokasi_pos" class="form-control" name="kab_lokasi_pos"  value="Query gagal" type="text" readonly>';
                  }
                } else {
                  echo '<input id="nama_lokasi_pos" class="form-control" name="kab_lokasi_pos" value="Wilayah ID tidak ditemukan" type="text" readonly>';
                }
                ?>
              </div>
              <div class="mb-3">
                <label class="form-label">Titik Koordinat</label>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" readonly style="cursor: not-allowed;" class="form-control" name="lat_lokasi_pos" value="<?= $lokasi_pos->lat_lokasi_pos ?>">
                  </div>
                  <div class="col-md-6">
                    <input type="text" readonly style="cursor: not-allowed;" class="form-control" name="lon_lokasi_pos" value="<?= $lokasi_pos->lon_lokasi_pos ?>">
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="alamat_lokasi_pos">Alamat</label>
                <input type="text" class="form-control" name="alamat_lokasi_pos" id="alamat_lokasi_pos" value="<?= $lokasi_pos->alamat_lokasi_pos ?>" autocomplete="off">
              </div>
              <div class="mb-3">
                <label for="ket_lokasi_pos" class="form-label">Keterangan</label>
                <input id="ket_lokasi_pos" class="form-control" name="ket_lokasi_pos" type="text" value="<?= $lokasi_pos->ket_lokasi_pos ?>" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Pilih Titik</label>
                <div id="map" style="height: 500px"></div>
                <textarea name="polygon" style="display: none;"></textarea>
              </div>
            </div>
          </div>


          <div class="col-md-12">
            <div class="mb-3">
              <div class="form-check">
                <label class="form-check-label" for="termsCheck">
                  Saya menyetujui bahwa data yang di input adalah benar
                </label>
                <input type="checkbox" class="form-check-input" name="terms_agree" id="termsCheck">
              </div>
            </div>
          </div>
          <a href="<?= base_url("admin/lokasi_pos") ?>">
            <input class="btn btn-warning" type="button" value="Kembali">
          </a>
          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js" integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ==" crossorigin=""></script>
<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="<?= base_url('assets_admin/js/leaflet.ajax.js') ?>"></script>
<script type="text/javascript">
  var latInput = document.querySelector("[name=lat_lokasi_pos]");
  var lngInput = document.querySelector("[name=lon_lokasi_pos]");
  var geocodeService = L.esri.Geocoding.geocodeService();
  var marker;
  var map = L.map('map').setView([-7.273314, 112.77047], 12);


  var Layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
  });
  map.addLayer(Layer);
  marker = L.marker([<?= $lokasi_pos->lat_lokasi_pos ?>, <?= $lokasi_pos->lon_lokasi_pos ?>]).addTo(map);




  ///
  map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    } else {
      marker.setLatLng(e.latlng);
    }


    latInput.value = lat;
    lngInput.value = lng;


    $.ajax({
      url: "https://nominatim.openstreetmap.org/reverse",
      data: "lat=" + lat +
        "&lon=" + lng +
        "&format=json",
      dataType: "JSON",
      success: function(data) {
        console.log(data);
      }
    })
  });


  // draw
  // FeatureGroup is to store editable layers


  var drawnItems = new L.FeatureGroup();
  map.addLayer(drawnItems);
  if ($("[name=polygon]").val() != "") {
    var latlngs = JSON.parse($("[name=polygon]").val());
    var polygon = L.polygon(latlngs, {
      color: 'red'
    }).addTo(drawnItems);
  }


  var drawControl = new L.Control.Draw({
    draw: {
      polyline: false,
      rectangle: false,
      circle: false,
      marker: false,
      circlemarker: false
    },
    edit: {
      featureGroup: drawnItems
    }
  });
  map.addControl(drawControl);
  map.on('draw:created', function(e) {
    console.log("Created")
    var type = e.layerType,
      layer = e.layer;
    var latLng = layer.getLatLngs();
    console.log(latLng);


    $("[name=polygon]").val(JSON.stringify(latLng));
    // if (type === 'marker') {
    //     // Do marker specific actions
    // }
    // Do whatever else you need to. (save to db; add to map etc)
    drawnItems.addLayer(layer);
  });


  map.on('draw:edited', function(e) {
    console.log('edited');
    var latLng = e.layers.getLayers()[0].getLatLngs();


    $("[name=polygon]").val(JSON.stringify(latLng));
  })
  map.on('draw:deleted', function(e) {
    console.log('deleted');


    $("[name=polygon]").val("");
  })
</script>
