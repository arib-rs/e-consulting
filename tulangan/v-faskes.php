<!--INNER BANNER START-->
<?php
$id = $_GET['id'];
$data = Settings::FaskesGetID($id, $dbCon);

$kat = ($_GET['page'] == 'v-sekolah') ? "Sekolah" : "Faskes";
$listmedia =  Settings::MediaShowAll($dbCon, $kat);

if(empty($data)){
  echo "<script> window.location.href= '.?page=error' </script>";
}
?>

<div id="inner-banner" style="background-image:url(images/uploads/banners/<?=$banner[2]->img?>);">
 <div class="container">
  <div class="inner-banner-heading">
      <h1>Info Kesehatan</h1>
      <em>Schools :: <?= $option[1]->value ?> Kabupaten Sidoarjo.</em>
  </div>
 </div>
 <div class="breadcrumb-col"> <a href="." class="btn-back"><i class="fa fa-home" aria-hidden="true"></i>Beranda</a>
  <ol class="breadcrumb">
   <li><a href=".">Beranda</a></li>
   <li class="active">Kesehatan</li>
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
       <h3 style="margin:0px 0 20px 0"><?=$data->nama_sekolah?></h3>
       <?php
            $c = 0;
            foreach ($listmedia as $l) {
              if ($l->id_parent == $id) {
                $c++;
              }
            }
            if ($c == 0) {
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
            <?php } ?>      
<br>
       <h4 style="margin:0px 0 15px 0">Informasi</h4>
       <div class="col-md-4" style="margin:0px 0 20px 0; ">
          <?php
            $akreditasi = ( $data->deskripsi != '') ? ' · Deskripsi ' .  $data->deskripsi : '';
            ?>
                  <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px; line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-map-marker" aria-hidden="true"></i> <?= $data->alamat ?></span>
                  <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-phone" aria-hidden="true"></i><?= $data->no_telepon ?></span>
                  <span style="display: block; font: 700 12px/12px 'Lato', sans-serif; color: #888; padding: 0 0 10px 3px;line-height:15px;"><i style="color:#d33030;padding-right:8px" class="fa fa-building" aria-hidden="true"></i><?= $data->jenis_sekolah . $akreditasi ?></span>
       </div>
       <div class="col-md-4" style="margin:0px 0 20px 0">

                 
       </div>
       <div class="col-md-4" style="margin:0px 0 20px 0">

                 
       </div>
       <div class="clearfix"></div>
      <h4 style="margin:0px 0 15px 0">Deskripsi</h4>
      <div class="post-box" style="text-align:justify;margin:0 0 20px 0; text-indent:30px; color:#555;">
      
        <?=nl2br(($data->deskripsi!='')?$data->deskripsi:'-')?>
   
      </div>
      <h4 style="margin:0px 0 15px 0">Website</h4>
      <div class="post-box" style="text-align:justify;margin:0 0 20px 0; text-indent:30px; color:#555;">
      
        <?=nl2br(($data->link_web!='')?$data->link_web:'-')?>
   
      </div>
      <h4 style="margin:0px 0 15px 0">Jenis Asuransi</h4>
      <div class="post-box" style="text-align:justify;margin:0 0 20px 0; text-indent:30px; color:#555;">
      
        <?=nl2br(($data->jenis_bpjs!='')?$data->jenis_bpjs:'-')?>
   
      </div>

      <h4 style="margin:0px 0 15px 0">Dokter Praktek</h4>
      <div class="post-box" style="text-align:justify;margin:0 0 20px 0; text-indent:30px; color:#555;">

      <ul>
        <li> <?=nl2br(($data->dokter!='')?$data->dokter:'-')?> </li>
        </ul>
      </div>

      <h4 style="margin:0px 0 15px 0">Bidan Praktek</h4>
      <div class="post-box" style="text-align:justify;margin:0 0 20px 0; text-indent:30px; color:#555;">
      <ul>
      <li><?=nl2br(($data->bidan!='')?$data->bidan:'-')?></li>
        </ul>
      </div>

      </div>
       </div>
   </div>
  </div>
 </section>
 <!--BLOG PAGE END-->
</div>
<!--MAIN END-->

