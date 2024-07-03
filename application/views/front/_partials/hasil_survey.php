<?php
$sangat_puas = $this->db->query("SELECT COUNT(nilai) AS jml FROM survey_kepuasan WHERE nilai = 5")->row();
$puas = $this->db->query("SELECT COUNT(nilai) AS jml FROM survey_kepuasan WHERE nilai = 3")->row();
$kurang_puas = $this->db->query("SELECT COUNT(nilai) AS jml FROM survey_kepuasan WHERE nilai = 1")->row();
?>

<style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }
</style>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
  am5.ready(function() {

    var root = am5.Root.new("chartdiv");

    root.setThemes([
      am5themes_Animated.new(root)
    ]);

    var chart = root.container.children.push(am5xy.XYChart.new(root, {
      panX: false,
      panY: false,
      wheelX: "panX",
      wheelY: "zoomX",
      layout: root.verticalLayout
    }));

    var colors = chart.get("colors");

    var data = [{
      country: "Sangat Puas",
      visits: <?= $sangat_puas->jml ?>,
      icon: "<?= base_url("image/sangat_puas.png") ?>",
      columnSettings: {
        fill: colors.next()
      }
    }, {
      country: "Puas",
      visits: <?= $puas->jml ?>,
      icon: "<?= base_url("image/puas.png") ?>",
      columnSettings: {
        fill: colors.next()
      }
    }, {
      country: "Kurang Puas",
      visits: <?= $kurang_puas->jml ?>,
      icon: "<?= base_url("image/kurang_puas.png") ?>",
      columnSettings: {
        fill: colors.next()
      }
    }];

    var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
      categoryField: "country",
      renderer: am5xy.AxisRendererX.new(root, {
        minGridDistance: 25
      }),
      bullet: function(root, axis, dataItem) {
        return am5xy.AxisBullet.new(root, {
          location: 0.5,
          sprite: am5.Picture.new(root, {
            width: 24,
            height: 24,
            centerY: am5.p50,
            centerX: am5.p50,
            src: dataItem.dataContext.icon
          })
        });
      }
    }));

    xAxis.get("renderer").labels.template.setAll({
      paddingTop: 20
    });

    xAxis.data.setAll(data);

    var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
      renderer: am5xy.AxisRendererY.new(root, {})
    }));

    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: "visits",
      categoryXField: "country"
    }));

    series.columns.template.setAll({
      tooltipText: "{categoryX}: {valueY}",
      tooltipY: 0,
      strokeOpacity: 0,
      templateField: "columnSettings"
    });

    series.data.setAll(data);

    series.appear();
    chart.appear(1000, 100);

  });
</script>

<div class="row">
  <h4 id="default">Hasil survey kepuasan SI 2 TANG BEDA</h4>
  <p class="mb-3">Dibawah ini menunjukkan hasil survey kepuasan menggunakan aplikasi SI 2 TANG BEDA</p>
  <div id="chartdiv"></div>
  <?php
  $que = $this->db->query("SELECT nama_survey, alamat_survey, prov_survey, kota_kab_survey, kec_survey, kel_survey, nilai, alasan, date_created FROM survey_kepuasan ORDER BY date_created DESC")->result();
  foreach ($que as $result) {
    $prov = $result->prov_survey;
    $kabu = $result->kota_kab_survey;
    $keca = $result->kec_survey;
    $kelu = $result->kel_survey;

    $n1 = strlen($prov);
    $n2 = strlen($kabu);
    $n3 = strlen($keca);
    $n4 = strlen($kelu);

    $m1 = ($n1 == 2 ? 5 : ($n1 == 5 ? 8 : 13));
    $m2 = ($n2 == 2 ? 5 : ($n2 == 5 ? 8 : 13));
    $m3 = ($n3 == 2 ? 5 : ($n3 == 5 ? 8 : 13));
    $m4 = ($n4 == 2 ? 5 : ($n4 == 5 ? 8 : 13));
    $tgl_surv = indonesian_date($result->date_created, 'l, d F Y');
    $tmp_kabu = $this->db->query("SELECT kode,nama FROM wilayah_2022 WHERE LEFT(kode,'$n2')='$kabu' AND CHAR_LENGTH(kode)=$m2 ORDER BY nama")->row();
    $rsl_prov = $this->db->query("SELECT nama FROM wilayah_2022 WHERE kode = '$prov'")->row();
    $rsl_kabu = $this->db->query("SELECT nama FROM wilayah_2022 WHERE kode = '$kabu'")->row();
    $rsl_keca = $this->db->query("SELECT nama FROM wilayah_2022 WHERE kode = '$keca'")->row();
    $rsl_kelu = $this->db->query("SELECT nama FROM wilayah_2022 WHERE kode = '$kelu'")->row();

    switch ($result->nilai) {
      case 5:
        //$bintang = '<i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i>';
        $bintang = 'SANGAT PUAS';
        break;

      case 3:
        //$bintang = '<i class="lni lni-star-filled"></i><i class="lni lni-star-filled"></i><i class="lni lni-star"></i>';
        $bintang = 'PUAS';
        break;

      case 1:
        //$bintang = '<i class="lni lni-star-filled"></i><i class="lni lni-star"></i><i class="lni lni-star"></i>';
        $bintang = 'KURANG PUAS';
        break;

      default:
        $bintang = "";
        break;
    }

    $prov_kcl = strtolower($rsl_prov->nama);
    $kabu_kcl = strtolower($rsl_kabu->nama);
    $keca_kcl = strtolower($rsl_keca->nama);
    $kelu_kcl = strtolower($rsl_kelu->nama);

    $prov_new = ucwords($prov_kcl);
    $kabu_new = ucwords($kabu_kcl);
    $keca_new = ucwords($keca_kcl);
    $kelu_new = ucwords($kelu_kcl);
  ?>
    <div class="col-md-12 grid-margin">
      <div class="card rounded">
        <div class="card-header">
          <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
              <img class="img-xs rounded-circle" src="<?= base_url('image/logo_bpbd.png') ?>" alt="">
              <div class="ms-2">
                <p><?= ucwords($result->nama_survey) ?></p>
                <p class="tx-11 text-muted"><?= $tgl_surv ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table cellpadding="5" cellspacing="0" border="0">
              <tr>
                <td>Provinsi</td>
                <td>:</td>
                <td><?= $prov_new ?></td>
              </tr>
              <tr>
                <td>Kabupaten / Kota</td>
                <td>:</td>
                <td><?= $kabu_new ?></td>
              </tr>
              <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td><?= $keca_new ?></td>
              </tr>
              <tr>
                <td>Kelurahan / Desa</td>
                <td>:</td>
                <td><?= $kelu_new ?></td>
              </tr>
            </table>
          </div>
          <br>
          <p class="mb-3 tx-14">
            <?= $bintang . ' - ' . $result->alasan ?>
          </p>
        </div>
        <div class="card-footer">
          <!-- <div class="d-flex post-actions">
              <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                <i class="icon-md" data-feather="heart"></i>
                <p class="d-none d-md-block ms-2">Like</p>
              </a>
              <a href="javascript:;" class="d-flex align-items-center text-muted me-4">
                <i class="icon-md" data-feather="message-square"></i>
                <p class="d-none d-md-block ms-2">Comment</p>
              </a>
              <a href="javascript:;" class="d-flex align-items-center text-muted">
                <i class="icon-md" data-feather="share"></i>
                <p class="d-none d-md-block ms-2">Share</p>
              </a>
            </div> -->
        </div>
      </div>
    </div>
  <?php
  }
  ?>

</div>