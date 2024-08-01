<!-- <nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="#">Tables</a></li>
		<li class="breadcrumb-item active" aria-current="page">Data Table</li>
	</ol>
</nav> -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-title">
        <div style="margin: 20px;">
          <a href="<?= base_url("admin/lokasi_pos/add") ?>">
            <button class="btn btn-primary btn-icon-text mb-md-0">Tambah Data</button>
          </a>
        </div>
      </div>
      <div class="card-body">
        <h6 class="card-title">Data Lokasi POS BPBD Kota Surabaya</h6>
        <p class="text-muted mb-3">Data berisi data data yang ada di BPBD Kota Surabaya</p>
        <div id="map" class="mb-3" style="height: 500px; border-radius: 20px;"></div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th width="20px">No</th>
                <th width="50px">Nama POS</th>
                <th width="40px">Kecamatan</th>
                <th width="30px">Kelurahan</th>
                <th width="20px">Alamat</th>
                <th width="20px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                $db_lokasi_pos = $this->db->query("SELECT * FROM lokasi_pos order by date_created desc")->result();
                foreach ($db_lokasi_pos as $res_lokasi_pos)
                {
                  $keca = $res_lokasi_pos->kec_lokasi_pos;
                  $kelu = $res_lokasi_pos->kel_lokasi_pos;

                  $n3 = strlen($keca);
                  $n4 = strlen($kelu);

                  $m3 = ($n3==2?5:($n3==5?8:13));
                  $m4 = ($n4==2?5:($n4==5?8:13));
                  $rsl_keca = $this->db->query("SELECT kecamatan FROM wilayah_2022")->row();
                  $rsl_kelu = $this->db->query("SELECT desa FROM wilayah_2022")->row();

                  $keca_kcl = strtolower($rsl_keca->kecamatan);
                  $kelu_kcl = strtolower($rsl_kelu->desa);

                  $keca_new = ucwords($keca_kcl);
                  $kelu_new = ucwords($kelu_kcl);
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $res_lokasi_pos->nama_lokasi_pos ?></td>
                    <td><?= $keca_new ?></td>
                    <td><?= $kelu_new ?></td>
                    <td><?= $res_lokasi_pos->alamat_lokasi_pos ?></td>
                    <td>
                      <a href="<?= site_url('admin/lokasi_pos/edit/'.$res_lokasi_pos->id_lokasi_pos) ?>" class="btn btn-outline-primary btn-xs"><i class='fal fa-pencil'></i></a>

                      <a data-bs-toggle="modal" data-bs-target="#deleteConfirm<?= $res_lokasi_pos->id_lokasi_pos ?>" class="ms-3 btn btn-outline-danger btn-xs"><i class="fal fa-trash-alt"></i></a>
                      <div class="modal fade" id="deleteConfirm<?= $res_lokasi_pos->id_lokasi_pos ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">APAKAH ANDA YAKIN INGIN MENGHAPUS DATA INI?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Data yang akan dihapus adalah data Lokasi POS <?= $res_lokasi_pos->nama_lokasi_pos ?>
                            </div>
                            <div class="modal-footer d-flex align-items-center">
                              <a href="<?= base_url('admin/lokasi_pos/delete/'.$res_lokasi_pos->id_lokasi_pos) ?>" class="btn btn-outline-danger">
                                <i class="fad fa-trash-alt"></i>
                              </a>
                              <button class="btn btn-outline-success mr-auto" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </div>            
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
<link rel="stylesheet" href="https://api.geoapify.com/v1/icon?type=awesome&color=%2352b74c&size=x-large&icon=tree&noWhiteCircle=true&scaleFactor=2&apiKey=13580753b76d4002994357c886b79f3c"crossorigin="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-4Wna3G7a9Rk4c7yUYWlnUQYFHcz33ljfB3wl41t/6jjLuvL0zWz3yFXBIlZ5Fi1nuNEzUY8BgN3MeMejoHFnMw==" crossorigin="anonymous" />
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="<?=base_url('assets_admin/js/leaflet.ajax.js')?>"></script>
<style>
img.huechange1 { filter: hue-rotate(172.65deg); }
img.huechange2 { filter: hue-rotate(0deg); }
img.huechange3 { filter: hue-rotate(90deg); }

</style>
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