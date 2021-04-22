<!--INNER BANNER START-->
<div id="inner-banner" style="background-image:url(images/uploads/banners/<?= $banner[2]->img ?>);">
  <div class="container">
    <div class="inner-banner-heading">
      <h1>Info Sekolah</h1>
      <em>Schools :: <?= $option[1]->value ?> Kabupaten Sidoarjo.</em>
    </div>
  </div>
  <div class="breadcrumb-col"> <a href="." class="btn-back"><i class="fa fa-home" aria-hidden="true"></i>Beranda</a>
    <ol class="breadcrumb">
      <li><a href=".">Beranda</a></li>
      <li class="active">Sekolah</li>
    </ol>
  </div>
</div>
<!--INNER BANNER END-->

<!--MAIN START-->
<?php
$url = 'http://apikey.sidoarjokab.go.id/api/pendidikan/kecamatan/3635';
$result = @file_get_contents($url);
$pendidikan = json_decode($result, true);


$kat = ($_GET['page'] == 'sekolah') ? "Sekolah" : "Faskes";
$listmedia =  Settings::MediaShowAll($dbCon, $kat);

// print_r(count($pendidikan));
// print_r($pendidikan);
// die;
?>
<div id="main">
  <!--BLOG PAGE START-->
  <section class="blog-page event-list">
    <div class="container">

      <!-- <div class="row clearfix">
        <div class="col-lg-12">
          <div class="card">
            <div class="body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Akreditasi</th>
                      <th>Alamat</th>
                      <th>No Telp</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;

                    foreach ($pendidikan as $d) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['status'] ?></td>
                        <td><?= $d['akreditasi'] ?></td>
                        <td><?= $d['alamat'] ?></td>
                        <td><?= $d['telepon'] ?></td>

                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- -->
      <?php

      $fsekolah = array('PAUD', 'RA', 'TK', 'SD', 'SMP', 'SMA', 'Ponpes');
      ?>
      <div class="row text-center" style="margin-bottom:40px;padding:0 ">

        <div class="col-lg-12">
          <form class="" style="background-color:#F5F5F5; padding:20px;" method="GET">
            <?php
            $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $query = parse_url($url, PHP_URL_QUERY);

            // Returns a string if the URL has parameters or NULL if not
            if ($query) {
              // $url .= '&';
              $query = '?' . $query;
            } else {
              // $url .= '?';
              $query = '?';
            }

            $farray = $_GET['f'];
            foreach ($fsekolah as $fs) { ?>
              <div class="form-check form-check-inline" style="display:inline-block; margin:0 20px">
                <?php
                $urlf = '';
                if (in_array($fs, $farray)) {
                  $urlf = str_replace("&f[]=" . $fs, "", $query);
                  $urlf = str_replace("&p=" . $_GET['p'], "", $urlf);
                } else {
                  $urlf = $query . '&f[]=' . $fs;
                  $urlf = str_replace("&p=" . $_GET['p'], "", $urlf);
                }
                ?>
                <a href="<?= $urlf ?>" style="color:#222;">
                  <input onclick="window.location.href='<?= $urlf ?>'" class="form-check-input" id="f<?= $fs ?>" <?= in_array($fs, $farray) ? 'checked' : '' ?> type="checkbox" name="f[]" value="<?= $fs ?>">

                  <label class="form-check-label">
                    <?php
                    if ($fs == 'SD') {
                      echo $fs . '/MI';
                    } else if ($fs == 'SMP') {
                      echo $fs . '/MTs';
                    } else if ($fs == 'SMA') {
                      echo $fs . '/MA';
                    } else {
                      echo $fs;
                    }
                    ?>
                  </label>
                </a>
              </div>
            <?php }

            ?>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <?php
          $allnpsn = array();
          $listnpsn = Settings::SekolahShowNPSN($dbCon);
          foreach ($listnpsn as $key => $value) {
            $allnpsn[] = $value->npsn;
          }
          $list = Settings::SekolahShowPublished($dbCon);
          $sekolahttl = array();

          foreach ($list as $d) {
            if (empty($farray)) {
              $sekolahttl[] = $d;
            } else {
              if (in_array($d['jenjang'], $farray))
                $sekolahttl[] = $d;
            }
          }
          foreach ($pendidikan as $d) {
            if (!in_array($d['npsn'], $allnpsn)) {
              if (empty($farray)) {
                $sekolahttl[] = $d;
              } else {
                if (in_array($d['kategori'], $farray))
                  $sekolahttl[] = $d;
              }
            }
          }

          $hal = $_GET['p'];
          $page = !isset($hal) ? 1 : $hal;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          // $total_items = count($list);
          $total_items = count($sekolahttl);
          $total_pages = ceil($total_items / $limit);
          // $array = array_splice($list, $offset, $limit);
          $array = array_splice($sekolahttl, $offset, $limit);
          // print_r($array);
          // die;
          $countArr = count($array);
          $newLimit = $countArr < 5 ? $countArr : $limit;
          if ($countArr == 0) {
            echo "<h3 class='text-center' style='margin:50px 0 200px 0;'>-- Data Sekolah Tidak Tersedia --</h3>";
          } else {
            for ($i = 0; $i < $newLimit; $i++) {
              $akreditasi = ($array[$i]['akreditasi'] != '') ? ' · Akreditasi ' . $array[$i]['akreditasi'] : '';
              $pecahkatadesc = explode(' ', $array[$i]['deskripsi_sekolah']);
              $countwrdesc = count($pecahkatadesc);
              $limitwdesc = $countwrdesc > 40 ? 40 : $countwrdesc;
          ?>
              <div class="event-box ">
                <div class="event-caption" style="height:315px;width:578px;padding-left:25px;padding-top:20px">
                  <!-- <div class="date-box"><?= $tgl ?> <span><?= $bln ?></span></div> -->
                  <div class="text-col">
                    <h3>
                      <a href="?page=v-sekolah&_ews=<?= $array[$i]['id'] ?>">
                        <?= $array[$i]['nama_sekolah'] ? $array[$i]['nama_sekolah'] : $array[$i]['nama']  ?>
                      </a>
                    </h3>
                    <span class="time"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $array[$i]['alamat'] ?></span>
                    <span class="time"><i class="fa fa-phone" aria-hidden="true"></i><?= $array[$i]['no_telepon'] ? $array[$i]['no_telepon'] : $array[$i]['telepon']  ?></span>
                    <span class="time"><i class="fa fa-building" aria-hidden="true"></i><?= $array[$i]['jenis_sekolah'] ? $array[$i]['jenis_sekolah'] . $akreditasi : $array[$i]['status'] . $akreditasi ?></span>
                    <p>
                      <?php
                      for ($x = 0; $x < $limitwdesc; $x++) {
                        echo $countwrdesc > 40 ? $x === 39 ? $pecahkatadesc[$x] . "... " : $pecahkatadesc[$x] . " " : $pecahkatadesc[$x] . " ";
                      }
                      ?>
                    </p>
                    <?php if ($array[$i]['id']) { ?>
                      <a href="?page=v-sekolah&id=<?= $array[$i]['id']  ?>" class="btn btn-primary">Lihat Detail</a>
                    <?php } else { ?>
                      <a href="?page=v-sekolah&npsn=<?= $array[$i]['npsn']  ?>" class="btn btn-primary">Lihat Detail</a>
                    <?php } ?>
                  </div>
                </div>

                <?php
                $c = 0;
                foreach ($listmedia as $l) {
                  if ($l->id_parent == $array[$i]['id']) {
                    $c++;
                  }
                }
                if ($c == 0) {
                  echo "<div style='float:left; border:solid 1px #ccc;height:315px;width:562px;text-align:center'><img src='images/default/noimage.png' /></div>";
                } else {

                ?>
                  <div id="banner" style="border:1px solid #ccc; width:562px; ">
                    <div id="sekolah-banner" class="owl-carousel">
                      <?php
                      foreach ($listmedia as $l) {
                        if ($l->id_parent == $array[$i]['id']) {
                      ?>
                          <div class="item">
                            <?php

                            if ($l->jenis_media == "Gambar") {
                            ?>
                              <a class="text-center" style="height:288px;width:100%;display:flex;flex-wrap: wrap; align-content: center; justify-content:center" href="pengelolaweb/<?= $l->url_media ?>" target="_blank">
                                <img style="max-width:100%;" src='pengelolaweb/<?= $l->url_media ?>' />
                              </a>
                            <?php
                            } else {
                            ?>
                              <div style="text-align:center; background:black">
                                <video max-width="100%" height="283px" controls>
                                  <source src="pengelolaweb/<?= $l->url_media ?>" type="video/mp4">
                                  Your browser does not support the video tag.
                                </video>
                              </div>
                            <?php
                            }
                            ?>
                            <!-- <img src="" class="img-fluid" alt="Responsive image"> -->
                            <!-- <span class="slide animated fadeInRight"></span> -->
                            <div class="caption">
                              <div class="container">
                                <div class="holder">
                                </div>
                              </div>
                            </div>
                          </div>

                      <?php
                        }
                      }
                      ?>
                    </div>
                  </div>



                <?php
                }


                // if ($array[$i]['foto_sekolah'] != '') {
                //   if (strpos($array[$i]['foto_sekolah'], 'iframe') !== false) {
                //     echo $array[$i]['foto_sekolah'];
                //   } else {
                //     echo "<div style='border:solid 1px #ccc;height:315px;text-align:center;overflow:hidden;background:#A9A9A9;'><img style='max-height:100%;' src='" . $array[$i]['foto_sekolah'] . "' /></div>";
                //   }
                // } else {
                //   echo "<div style='border:solid 1px #ccc;height:315px;text-align:center'><img src='images/default/noimage.png' /></div>";
                // }
                //echo ($array[$i]['foto_sekolah'] != '') ? $array[$i]['foto_sekolah'] : "<div style='border:solid 1px #ccc;height:315px;text-align:center'><img src='images/default/noimage.png'  /></div>";
                ?>
              </div>
            <?php }
            ?>
            <div class="pagination-col">
              <nav aria-label="Page navigation">
                <?php
                $pageurl = '';
                echo '<ul class="pagination">';
                if ($hal > 1) {
                  if (isset($_GET['p'])) {
                    $pageurl = str_replace("&p=" . $_GET['p'], "&p=" . ($hal - 1), $query);
                  } else {
                    $pageurl = $query . '&p=' . ($hal - 1);
                  }
                  // echo "<li><a href='?page=sekolah&p=" . ($hal - 1) . "'>Prev</a></li>&nbsp;";
                  echo "<li><a href='" . $pageurl . "'>Prev</a></li>&nbsp;";
                }
                for ($page = 1; $page <= $total_pages; $page++) {

                  if ($page === $hal)
                    echo "<li class='active'><a href='#'>" . $page . "</a></li>&nbsp;";
                  else {
                    if (isset($_GET['p'])) {
                      $pageurl = str_replace("&p=" . $_GET['p'], "&p=" . $page, $query);
                    } else {
                      $pageurl = $query . '&p=' . $page;
                    }
                    // echo "<li><a href='.?page=sekolah&p=" . $page . "'>" . $page . "</a></li>&nbsp;";
                    echo "<li><a href='" . $pageurl . "'>" . $page . "</a></li>&nbsp;";
                  }
                }
                if ($hal < $total_pages) {
                  if (isset($_GET['p'])) {
                    $pageurl = str_replace("&p=" . $_GET['p'], "&p=" . ($hal + 1), $query);
                  } else {
                    $pageurl = $query . '&p=' . ($hal + 1);
                  }
                  // echo "<li><a href='?page=sekolah&p=" . ($hal + 1) . "'>Next</a><li>";
                  echo "<li><a href='" . $pageurl . "'>Next</a><li>";
                }
                echo '</ul>';
                ?>
              </nav>
            </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12">

          <h2>Peta <span style="font-size:22px;">Pendidikan Tulangan</span></h2>

          <div id="peta" style="height: 50vh; width: 60vw; margin:30px auto;"></div>
        </div>
        <script type="text/javascript">
          var mapOptions = {
            center: [-7.460358, 112.625942],
            zoom: 13
          }
          var peta = new L.map('peta', mapOptions);
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {

            attribution: '',
            id: 'mapbox/streets-v11',
          }).addTo(peta);

          var LeafIcon = L.Icon.extend({
            options: {
              iconUrl: 'icon/sekolah2.png',
              iconSize: [30, 40],
              iconAnchor: [30, 80],
              popupAnchor: [-3, -76]
            }
          });
          var icon = new LeafIcon({
            iconUrl: 'icon/sekolah2.png'
          });
          //             L.marker([-7.460358, 112.625942]).addTo(peta)
          // .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

          <?php foreach ($sekolahttl as $x) :
              $akreditasi = ($x['akreditasi'] != '') ? ' · Akreditasi ' . $x['akreditasi'] : '';
          ?>
            L.marker([<?= $x['lat'] ?>, <?= $x['lng'] ?>], {
                icon: icon
              }).addTo(peta)
              .bindPopup("<h5><?= $x['nama_sekolah'] ? $x['nama_sekolah'] : $x['nama'] ?></h5>" +
                "<b>Alamat</b> : <?= $x['alamat'] ?><br/>" +
                "<b>No. Telepon</b> : <?= $x['no_telepon'] ? $x['no_telepon'] : $x['telepon'] ?><br/>" +
                "<b>Status</b> : <?= $x['jenis_sekolah'] ? $x['jenis_sekolah'] . $akreditasi : $x['status'] . $akreditasi ?><br/>");
            // .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
          <?php endforeach; ?>
        </script>

      </div>
    <?php
          }
    ?>
    </div>
</div>
</section>
<!--BLOG PAGE END-->
</div>
<!--MAIN END-->