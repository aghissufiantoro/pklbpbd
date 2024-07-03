<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container text-center py-5">
    <h1 class="display-2 text-white mb-4 animated slideInDown">Lokasi POS Pantau BPBD Kota Surabaya</h1>
  </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
  <div class="container">
    <!-- <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s">
      <p class="fs-5 fw-medium text-primary">BPBD Kota Surabaya</p>
      <h1 class="display-5 mb-5">VISI MISI</h1>
    </div> -->
    <div class="row g-5">
      <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
        <div id="map" class="mb-3" style="width: 100%; height: 1000px; border-radius: 20px;"></div>
      </div>
    </div>
  </div>
</div>
<!-- Contact End -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@2.3.3/dist/esri-leaflet.js" integrity="sha512-cMQ5e58BDuu1pr9BQ/eGRn6HaR6Olh0ofcHFWe5XesdCITVuSBiBZZbhCijBe5ya238f/zMMRYIMIIg1jxv4sQ==" crossorigin=""></script>
<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="<?=base_url('assets_admin/js/leaflet.ajax.js')?>"></script>
<script type="text/javascript">
  var marker;
  var map = L.map('map').setView([-7.273314, 112.77047], 12);

  var Layer=L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
  });
  map.addLayer(Layer);
  <?php
$db_lokasi_pos = $this->db->query("SELECT * FROM lokasi_pos ORDER BY date_created DESC")->result();
foreach ($db_lokasi_pos as $peta_lokasi) {
    ?>
    marker = L.marker([<?= $peta_lokasi->lat_lokasi_pos ?>, <?= $peta_lokasi->lon_lokasi_pos ?>]).addTo(map).bindPopup('<?= $peta_lokasi->nama_lokasi_pos."<br> Alamat: ".$peta_lokasi->alamat_lokasi_pos ?>');
    <?php
    // Assign different CSS classes based on the value of ket_lokasi_pos
    $css_class = '';
    if (strpos(strtolower($peta_lokasi->ket_lokasi_pos), 'pos pantau') !== false) {
        $css_class = 'huechange1'; // Assigning first CSS class
    } elseif (strpos(strtolower($peta_lokasi->ket_lokasi_pos), 'terpadu') !== false) {
        $css_class = 'huechange2'; // Assigning second CSS class
    } elseif (strpos(strtolower($peta_lokasi->ket_lokasi_pos), 'mako pmi') !== false) {
        $css_class = 'huechange3'; // Assigning third CSS class
    }
    ?>
    marker._icon.classList.add("<?= $css_class ?>");
    marker.on('click', function(e) {
            // Construct Google Maps URL with latitude and longitude
            var googleMapsUrl = 'https://www.google.com/maps/search/?api=1&query=' + e.latlng.lat + ',' + e.latlng.lng;

            // Open Google Maps in a new window/tab
            window.open(googleMapsUrl, '_blank');
    })
    <?php
    
}
?>

</script>

<style>
img.huechange1 { filter: hue-rotate(172.65deg); }
img.huechange2 { filter: hue-rotate(0deg); }
img.huechange3 { filter: hue-rotate(90deg); }

</style>