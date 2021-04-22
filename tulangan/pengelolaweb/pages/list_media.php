<?php
if (empty($_SESSION["UID"]) && empty($_SESSION["FNAME"]) && empty($_SESSION["EMAIL"]) && empty($_SESSION["LEVEL"]) && $_SESSION["SNAME"] !== $_SERVER['SERVER_NAME']) {
  echo "Forbidden page";
  exit();
}

$data = '';
$id = $_GET['_ews'];
$kat = ($_GET['_k'] == 1) ? "Sekolah" : "Faskes";

if ($kat == "Sekolah") {
  $data = Settings::SekolahGetID($id, $dbCon);
} else if ($kat == "Faskes") {
  $data = Settings::FaskesGetID($id, $dbCon);
}

$listmedia =  Settings::MediaShow($dbCon, $kat, $_GET['_ews']);

if (empty($_SESSION["token"])) {
  $_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(32));
}

?>
<div class="row clearfix">
  <div class="col-lg-12">
    <div class="card">
      <div class="body block-header">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-sm-12">
            <h2>Daftar Media <?= ($kat == "Sekolah") ? $data->nama_sekolah : $data->nama_faskes ?></h2>
            <ul class="breadcrumb p-l-0 p-b-0 ">
              <li class="breadcrumb-item"><a href="."><i class="icon-home"></i></a></li>
              <li class="breadcrumb-item active">Edit Media</li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-4 col-sm-12 text-right">
            <a class="btn btn-primary btn-round" href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('sekolah') ?>" title="Kembali ke halaman awal">Kembali</a>&nbsp;
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row clearfix">
  <div class="col-lg-12">
    <div class="card" style="padding:20px;min-height:500px">
      <div class="body">
        <div class="row">
          <?php
          foreach ($listmedia as $l) {
          ?>
            <div class="col-lg-3 " style="border:1px solid lightgray;overflow:hidden;padding:0;background:grey">
              <?php

              if ($l->jenis_media == "Gambar") {
              ?>
                <a class="text-center" style="height:355px;width:100%;display:flex;flex-wrap: wrap; align-content: center; justify-content:center" href="<?= $l->url_media ?>" target="_blank">
                  <img style="max-width:100%;" src='<?= $l->url_media ?>' />
                </a>
              <?php
              } else {
              ?>
                <video width="100%" height="347px" controls>
                  <source src="<?= $l->url_media ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              <?php
              }
              ?>
              <a class="btn btn-danger" style="box-shadow:0 0 5px 1px;position:absolute;top:10px;right:10px; margin:0; padding:0; height:24px; border-radius:2px" href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= $_GET['_act'] ?>&_ds=<?= encodeUrl('delete_media') ?>&_uid=<?= $l->id_media ?>">
                <i class="material-icons">delete</i>
              </a>
            </div>



            <!-- <div class="col-lg-3 " style="border:1px solid grey;overflow:hidden;padding:0;background:#fff">
              <a class="text-center" style="height:355px; width:100%;display:flex;flex-wrap: wrap; align-content: center; justify-content:center" href="<?= $l->url_media ?>" target="_blank">
                <img style="max-width:100%;" src='<?= $l->url_media ?>' />
              </a>
              <a class="btn btn-danger" style="box-shadow:0 0 5px 1px;position:absolute;bottom:10px;right:10px; margin:0; padding:0; height:24px; border-radius:2px" href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= $_GET['_act'] ?>&_ds=<?= encodeUrl('delete_media') ?>&_uid=<?= $l->id_media ?>">
                <i class="material-icons">delete</i>
              </a>
            </div> -->
          <?php
          }
          ?>
          <a class="col-md-3 text-center" data-toggle="modal" data-target="#ModalUpload" style="height:355px; border:1px solid grey;display:flex;flex-wrap: wrap; align-content: center; justify-content:center" href="">
            <i class="material-icons" style="font-size:50px;">add_circle</i>

          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ModalUpload" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" style="color:grey">
      <div class="modal-header">
        <h5 class="modal-title">Upload Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12">
              <input type="file" class="form-control" name="media_upload" />
              <p style="margin:10px">File harus berformat png, jpg, jpeg, bmp, mp4 dan berukuran kurang dari 50Mb.</p>
            </div>
            <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token" />
            <input type="hidden" value="<?= ($kat == "Sekolah") ? $data->nama_sekolah : $data->nama_faskes ?>" name="nama" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="submit_upload" class="btn btn-primary">Upload</button>
        </div>

      </form>
    </div>
  </div>
</div>

<?php
if (decodeUrl(@$_GET['_ds']) === 'delete_media') {
  $id = (int) $_GET['_uid'];
  Settings::MediaDelete($id, $dbCon);
}

if (isset($_POST['submit_upload'])) {
  Settings::MediaAdd($dbCon, $_POST, $_FILES, $kat, $_GET['_ews']);
}
?>