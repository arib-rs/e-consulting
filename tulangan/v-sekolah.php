<!--INNER BANNER START-->
<?php
$id = $_GET['id'];
$data = Settings::SekolahGetID($id, $dbCon);

$npsn = $_GET['npsn'];
$url = 'http://apikey.sidoarjokab.go.id/api/pendidikan/npsn/' . $npsn;
$result = @file_get_contents($url);
$dwh = json_decode($result, true);

$kat = ($_GET['page'] == 'v-sekolah') ? "Sekolah" : "Faskes";
$listmedia =  Settings::MediaShowAll($dbCon, $kat);

if (empty($data)) {
  if (empty($dwh)) {
    echo "<script> window.location.href= '.?page=error' </script>";
  }
}


?>
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
<div id="main">
  <!--BLOG PAGE START-->
  <section class="blog-page event-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="event-box">

            <h3 style="margin:0px 0 20px 0"><?= $data->nama_sekolah ? $data->nama_sekolah : $dwh['nama'] ?></h3>

            <?php
            $c = 0;
            foreach ($listmedia as $l) {
              if ($l->id_parent == $id) {
                $c++;
              }
            }
            if ($c == 0) {
              // echo "<div style='float:left; border:solid 1px #ccc;height:315px;width:562px;text-align:center'><img src='images/default/noimage.png' /></div>";
            } else {
            ?>
              <div id="banner" style="margin:20px 0 20px 0; padding:0px 30px;">
                <div id="sekolah-banner" class="owl-carousel">
                  <?php
                  foreach ($listmedia as $l) {
                    if ($l->id_parent == $id) {
                  ?>
                      <div class="item">
                        <?php

                        if ($l->jenis_media == "Gambar") {
                        ?>

                          <a style=" height:400px;width:100%;display:flex;flex-wrap: wrap; align-content: center; justify-content:center" href="pengelolaweb/<?= $l->url_media ?>" target="_blank">
                            <img style="max-width:100%;" src='pengelolaweb/<?= $l->url_media ?>' />
                          </a>

                        <?php
                        } else {
                        ?>
                          <div style="text-align:center; background:black">
                            <video max-width="100%" height="395px" controls>
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
            ?>
            <!-- <?php if ($data->foto_sekolah !== "") { ?>
       
              <div style='text-align:center;background:#f0f0f0;margin:20px 0 20px 0'>
                <?php
                    if ($data->foto_sekolah != '') {
                      if (strpos($data->foto_sekolah, 'iframe') !== false) {
                        echo $data->foto_sekolah;
                      } else {
                        echo "<div style='height:315px;text-align:center;overflow:clip;'><a href='" . $data->foto_sekolah . "'><img style='max-height:100%' src='" . $data->foto_sekolah . "' /></a></div>";
                      }
                    }
                ?>
              </div>
            <?php } ?> -->



            <h4 style="margin:0px 0 15px 0">Informasi</h4>
            <div class="col-md-4" style="margin:0px 0 20px 0; ">
              <?php
              $akreditasi = '';
              if ($data->akreditasi != '') {
                $akreditasi = ' · Akreditasi ' .  $data->akreditasi;
              } else {
                if ($dwh['akreditasi'] != '') {
                  $akreditasi = ' · Akreditasi ' .  $dwh['akreditasi'];
                }
              }
              // $akreditasi = ($data->akreditasi != '') ? ' · Akreditasi ' .  $data->akreditasi : '';
              ?>
              <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px; line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-map-marker" aria-hidden="true"></i> <?= $data->alamat ? $data->alamat : $dwh['alamat'] ?></span>
              <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-phone" aria-hidden="true"></i><?= $data->no_telepon ? $data->no_telepon : $dwh['telepon'] ?></span>
              <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-building" aria-hidden="true"></i><?= $data->jenis_sekolah ? $data->jenis_sekolah . $akreditasi : $dwh['status'] . $akreditasi ?></span>
            </div>
            <div class="col-md-4" style="margin:0px 0 20px 0">

              <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-globe" aria-hidden="true"></i><?= ($data->link_web != '') ? $data->link_web : '-- Link website sekolah tidak tersedia --' ?></span>
              <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-user" aria-hidden="true"></i><?= ($data->cp_sekolah != '') ? $data->cp_sekolah : '-- CP sekolah tidak tersedia --' ?></span>
              <!-- <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-money" aria-hidden="true"></i><?= ($data->biaya != '') ? 'Rp ' . number_format($data->biaya, 0, ".", ",") . ',-' : '-' ?></span> -->
            </div>
            <div class="col-md-4" style="margin:0px 0 20px 0">

              <!-- <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-map-marker" aria-hidden="true"></i> <?= $data->alamat ?></span>
                  <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-phone" aria-hidden="true"></i><?= $data->no_telepon ?></span>
                  <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-building" aria-hidden="true"></i><?= $data->jenis_sekolah . $akreditasi ?></span> -->
            </div>
            <div class="clearfix"></div>
            <h4 style="margin:0px 0 15px 0">Deskripsi Sekolah</h4>
            <div class="post-box" style="text-align:justify;margin:0 30px 20px 30px; color:#555;">

              <?= nl2br(($data->deskripsi_sekolah != '') ? $data->deskripsi_sekolah : '') ?>
              <?php
              $deskripsi = '';
              $tempcount = 0;
              if ($data->jumlah_ruang_kelas != '') {
                $deskripsi .= $data->jumlah_ruang_kelas . ' ruang kelas, ';
              } else if ($dwh['jumlah_ruang_kelas'] != '') {
                $deskripsi .= $dwh['jumlah_ruang_kelas'] . ' ruang kelas, ';
              }

              if ($data->jumlah_guru != '') {
                $deskripsi .= $data->jumlah_guru . ' guru, ';
              } else if ($dwh['jumlah_guru'] != '') {
                $deskripsi .= $dwh['jumlah_guru'] . ' guru, ';
              }

              if ($data->jumlah_siswa != '') {
                $deskripsi .= 'dan ' . $data->jumlah_siswa . ' siswa. ';
              } else if ($dwh['jumlah_siswa'] != '') {
                $deskripsi .= 'dan ' . $dwh['jumlah_siswa'] . ' siswa. ';
              }
              if ($deskripsi != '') {
                $deskripsi .= ' Serta memiliki fasilitas berikut:<br/>';

                if (!empty($data->jumlah_ruang_perpus)) {
                  $deskripsi .= '- ' . $data->jumlah_ruang_perpus . ' ruang perpus <br/>';
                } else if (!empty($dwh['jumlah_ruang_perpus'])) {
                  $deskripsi .= '- ' . $dwh['jumlah_ruang_perpus'] . ' ruang perpus <br/>';
                }
                if (!empty($data->jumlah_lab_komputer)) {
                  $deskripsi .= '- ' . $data->jumlah_lab_komputer . ' lab komputer <br/>';
                } else if (!empty($dwh['jumlah_lab_komputer'])) {
                  $deskripsi .= '- ' . $dwh['jumlah_lab_komputer'] . ' lab komputer <br/>';
                }
                if (!empty($data->jumlah_lab_bahasa)) {
                  $deskripsi .= '- ' . $data->jumlah_lab_bahasa . ' lab bahasa <br/>';
                } else if (!empty($dwh['jumlah_lab_bahasa'])) {
                  $deskripsi .= '- ' . $dwh['jumlah_lab_bahasa'] . ' lab bahasa <br/>';
                }
                if (!empty($data->jumlah_lab_fisika)) {
                  $deskripsi .= '- ' . $data->jumlah_lab_fisika . ' lab fisika <br/>';
                } else if (!empty($dwh['jumlah_lab_fisika'])) {
                  $deskripsi .= '- ' . $dwh['jumlah_lab_fisika'] . ' lab fisika <br/>';
                }
                if (!empty($data->jumlah_lab_biologi)) {
                  $deskripsi .= '- ' . $data->jumlah_lab_biologi . ' lab biologi <br/>';
                } else if (!empty($dwh['jumlah_lab_biologi'])) {
                  $deskripsi .= '- ' . $dwh['jumlah_lab_biologi'] . ' lab biologi <br/>';
                }

                if ($data->deskripsi_sekolah != '') {
                  echo '<br/>';
                }

                $namasekolah = $data->nama_sekolah ? $data->nama_sekolah : $dwh['nama'];
                echo $namasekolah . ' memiliki ' . $deskripsi;
              }
              ?>

            </div>
            <h4 style="margin:0px 0 15px 0">Prestasi</h4>
            <div class="post-box" style="text-align:justify;margin:0 30px 20px 30px; color:#555;">

              <?= nl2br(($data->prestasi != '') ? $data->prestasi : '-') ?>

            </div>
            <h4 style="margin:0px 0 15px 0">Ekstrakurikuler</h4>
            <div class="post-box" style="text-align:justify;margin:0 30px 20px 30px; color:#555;">

              <?= nl2br(($data->ekstrakurikuler != '') ? $data->ekstrakurikuler : '-') ?>

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--BLOG PAGE END-->
</div>
<!--MAIN END-->