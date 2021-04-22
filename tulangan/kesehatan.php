
<div id="inner-banner" style="background-image:url(images/uploads/banners/<?=$banner[2]->img?>);">
 <div class="container">
  <div class="inner-banner-heading">
   <h1>Info Kesehatan</h1>
   <em>Events :: <?=$option[1]->value?> Kabupaten Sidoarjo.</em>
  </div>
 </div>
 <div class="breadcrumb-col"> <a href="." class="btn-back"><i class="fa fa-home" aria-hidden="true"></i>Beranda</a>
  <ol class="breadcrumb">
   <li><a href=".">Beranda</a></li>
   <li class="active">Sekolah</li>
  </ol>
 </div>
</div>

<?php  
 $sumber = 'http://apikey.sidoarjokab.go.id/api/kesehatan';
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

$kat = ($_GET['page'] == 'sekolah') ? "Sekolah" : "Faskes";
$listmedia =  Settings::MediaShowAll($dbCon, $kat);
?>

<div id="main">
 <!--DEPARTMENTS SECTION START-->
 <section class="profil-section">
  <div class="hoLder">
   <div class="container">
    <div class="row">
     <div class="box">
   
 
 <?php
$faskesflr = array('rs', 'Puskesmas', 'klinik', 'pustu', 'polindes');
?>
<div class="row text-center" style="margin-bottom:40px;padding:0 ">

  <div class="col-lg-12">
    <form class="" style="background-color:#F5F5F5; padding:20px;" method="GET">
      <?php
      $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $query = parse_url($url, PHP_URL_QUERY);
      // print_r($query);die;

      // Returns a string if the URL has parameters or NULL if not
      if ($query) {
        // $url .= '&';
        $query = '?' . $query;
      } else {
        // $url .= '?';
        $query = '?';
      }
      // print_r($_GET['f']);die;
      $farray = $_GET['f'];
      foreach ($faskesflr as $fs) { ?>
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
          <a href="<?= $urlf ?>" style="color:#222">
            <input class="form-check-input" id="f<?= $fs ?>" <?= in_array($fs, $farray) ? 'checked' : '' ?> type="checkbox" name="f[]" value="<?= $fs ?>">
          </a>
          <label class="form-check-label">
            <?= $fs ?>
          </label>
        </div>
      <?php }

      ?>
    </form>
  </div>
</div>

      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
</div>

<div id="main">
  <!--BLOG PAGE START-->
  <section class="blog-page event-list">
    <div class="container">

   
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <?php

          $list = Settings::FaskesShowPublished($dbCon);
          $faskes = array();
          foreach ($list as $d) {
            if (empty($farray)) {
              $faskes[] = $d;
            } else {
              if (in_array($d['jenis_faskes'], $farray))
                $faskes[] = $d;
            }
          }
          // foreach ($kesehatan as $d) {
          //   if (!in_array($d['nama_fakses'])) {
          //     if (empty($farray)) {
          //       $faskes[] = $d;
          //     } else {
          //       if (in_array($d['kategori'], $farray))
          //         $faskes[] = $d;
          //     }
          //   }
          // }
          $hal = $_GET['p'];
          $page = !isset($hal) ? 1 : $hal;
          $limit = 5;
          $offset = ($page - 1) * $limit;
          // $total_items = count($list);
          $total_pages = ceil($total_items / $limit);
          $faskespeta = $faskes;
          $array = array_splice($faskes, $offset, $limit);
          // print_r($faskespeta);die;
          // $array = array_splice($faskes, $offset, $limit);
          // print_r($array);
          // die;
          $countArr = count($array);
          $newLimit = $countArr < 5 ? $countArr : $limit;
          for ($i = 0; $i < $newLimit; $i++) {
            $akreditasi = ($array[$i]['akreditasi'] != '') ? ' · Akreditasi ' . $array[$i]['akreditasi'] : '';
            $pecahkatadesc = explode(' ', $array[$i]['deskripsi']);
            $countwrdesc = count($pecahkatadesc);
            $limitwdesc = $countwrdesc > 40 ? 40 : $countwrdesc;
            ?>
            <div class="event-box "  >
              <div class="event-caption" style="height:315px;width:578px;padding-left:25px;padding-top:20px">
      
                <div class="text-col">
                  <h3>
                    <a href="?page=v-sekolah&_ews=<?= $array[$i]['id'] ?>">
                      <?= $array[$i]['nama_faskes'] ?>
                    </a>
                  </h3>
                  <span class="time"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $array[$i]['alamat'] ?></span>
                  <span class="time"><i class="fa fa-phone" aria-hidden="true"></i><?= $array[$i]['no_telepon'] ?></span>
                  <span class="time"><i class="fa fa-building" aria-hidden="true"></i><?= $array[$i]['jenis_faskes'] . $akreditasi ?></span>
                  <p>
                    <?php
                      for ($x = 0; $x < $limitwdesc; $x++) {
                        echo $countwrdesc > 40 ? $x === 39 ? $pecahkatadesc[$x] . "... " : $pecahkatadesc[$x] . " " : $pecahkatadesc[$x] . " ";
                      }
                      ?>
                  </p>
                  <a href="?page=v-faskes&id=<?= $array[$i]['id']  ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
              </div>
              <?=
                  ($array[$i]['link_yt'] != '')?$array[$i]['link_yt']:"<div style='border:solid 1px #ccc;height:315px;text-align:center'><img src='images/default/noimage.png'  /></div>"; 
              ?>
            </div>
          <?php }; ?>
          <div class="pagination-col">
            <nav aria-label="Page navigation">
              <?php
              echo '<ul class="pagination">';
              if ($hal > 1)
                echo "<li><a href='?page=sekolah&p=" . ($hal - 1) . "'>Prev</a></li>&nbsp;";
              for ($page = 1; $page <= $total_pages; $page++) {

                if ($page === $hal)
                  echo "<li class='active'><a href='#'>" . $page . "</a></li>&nbsp;";
                else
                  echo "<li><a href='.?page=sekolah&p=" . $page . "'>" . $page . "</a></li>&nbsp;";
              }
              if ($hal < $total_pages)
                echo "<li><a href='?page=sekolah&p=" . ($hal + 1) . "'>Next</a><li>";
              echo '</ul>';
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
    </div>
   </div>
  </section>
  <!--BLOG PAGE END-->
</div>
<!-- 
  <div class="main" tyle="margin:auto;">
  <table border="1">
  <tr>
   <th>Nama</th>
   <th>Kecamtan</th>
  </tr>
<?php   
   foreach($data['data'] as $row){ ?>
    <tr>
        <td><?= $row['nama_instansi'] ?></td>
        <td><?= $row['kecamatan'] ?></td>
    </tr>
<?php }
?>
</table> -->

   <div class="container">
        <h2>Peta <span style="font-size:22px;">Faskes Tulangan </span></h2>
      </div>
    <div id="peta" style="height: 50vh; width: 60vw; margin:30px auto;"></div>
  </div>
  <br>
    <script type="text/javascript">
        var mapOptions = {
            center: [-7.460358, 112.625942],
            zoom: 13
        }
        var peta = new L.map('peta', mapOptions);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
        }).addTo(peta);

        var LeafIcon = L.Icon.extend({
                    options: {
                        iconUrl: 'icon/rs.png',
                        iconSize: [30, 40],
                        iconAnchor: [30, 80],
                        popupAnchor: [-3, -76]
                    }
                });
                var icon = new LeafIcon({
                    iconUrl: 'icon/rs.png'
                });
    //             L.marker([-7.460358, 112.625942]).addTo(peta)
		// .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
       
        <?php foreach($faskespeta as $x): 
       
          ?>
            L.marker([<?= $x['lng'] ?>, <?= $x['lat'] ?>], {
                            icon: icon
                        }).addTo(peta)
                        .bindPopup("<b><?= $x['nama_faskes'] ?></b><br/>" +
                            "<b>Alamat</b> : <?= $x['alamat'] ?><br/>" + "<b> Kepemilikan </b> : <?= $x['kepemilikan'] ?><br/>" + "<b> Kategori </b> : <?= $x['kategori'] ?><br/>" + "<b>Kelas</b> : <?= $x['kelas'] ?><br/>" + "<b> Jenis </b> : <?= $x['jenis_rs'] ?><br/>");
            // .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
        <?php endforeach; ?> 
    </script>
    <br>