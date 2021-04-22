<?php
if (empty($_SESSION["UID"]) && empty($_SESSION["FNAME"]) && empty($_SESSION["EMAIL"]) && empty($_SESSION["LEVEL"]) && $_SESSION["SNAME"] !== $_SERVER['SERVER_NAME']) {
  echo "Forbidden page";
  exit();
}

$id = $_GET['_ews'];
$data = Settings::FaskesGetID($id, $dbCon);

if (empty($_SESSION["token"])) {
  $_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(32));
}
?>
<!-- <section class="content"> -->
<div class="container">
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="body block-header">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
              <h2>Edit Faskes</h2>
              <?php
              if ($_SESSION['LEVEL'] === 8 || $_SESSION['LEVEL'] === 9) {
              } else {
              ?>
                <ul class="breadcrumb p-l-0 p-b-0 ">
                  <li class="breadcrumb-item"><a href="."><i class="icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>">Master</a></li>
                  <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('sekolah') ?>">Pengaturan Faskes</a></li>
                  <li class="breadcrumb-item active"><?= $data->nama_sekolah ?></li>
                </ul>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CKEditor -->
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
          <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="header">
              <div class="row clearfix">
                <div class="col-sm-12">

                <?php
                  $userlist = Settings::UserFaskesShow($dbCon);
                  if ($_SESSION['LEVEL'] === 1) {
                  ?>

                    <div class="form-group row">
                    <label class="col-lg-2" style="color:white;margin-top:10px">User ID</label>
                      <select class="form-control col-lg-10" required name="picuserid">
                        <option value="">-- Pilih User ID --</option>
                        <?php foreach ($userlist as $d) { ?>
                          <option value="<?= $d->id ?>"><?= $d->email . ' (' . $d->full_name . ')' ?></option>
                        <?php } ?>
                      </select>
                    </div>

                  <?php } else {  ?>
                    <input type='hidden' name='picuserid' value="<?= $d->id ?>">
                  <?php } ?>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Nama Faskes</label>
                    <input type="text" class="form-control col-lg-10" name="nama_faskes" placeholder="Nama Faskes" value="<?= ($data->nama_faskes != '') ? $data->nama_faskes : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Alamat</label>
                    <input type="text" class="form-control col-lg-10" name="alamat" placeholder="Alamat" value="<?= ($data->alamat != '') ? $data->alamat : '' ?>"/>
                  </div>
                  <?php
                  $desa = array(
                    'Tulangan',
                    'Kemantren',
                    'Medalem',
                    'Kepatihan',
                    'Gelang',
                    'Kenongo',
                    'Kepadangan',
                    'Singopadu',
                    'Kajeksan',
                    'Grinting',
                    'Modong',
                    'Kepuh Kemiri',
                    'Grabagan',
                    'Kepunten',
                    'Janti',
                    'Tlasih',
                    'Kebaron',
                    'Pangkemiri',
                    'Jiken',
                    'Grogol',
                    'Sudimoro',
                    'Kedondong'
                  );
                  sort($desa);
                  ?>
                   <div class="form-group row">
                   <label class="col-lg-2" style="color:white;margin-top:10px">Desa</label>
                    <select class="form-control col-lg-10" name="desa">
                      <option value="">-- Pilih Desa --</option>
                      <?php

                       for ($i = 0; $i < count($desa); $i++) {
                      ?>
                      <option <?= (strtolower($data->desa) == strtolower($desa[$i])) ? 'selected' : '' ?> value="<?= $desa[$i] ?>"><?= $desa[$i] ?></option>
                      <?php
                        }
                        ?>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">No telpon</label>
                    <input type="text" class="form-control col-lg-10" name="no_telepon" placeholder="No Telpon" value="<?= ($data->no_telepon != '') ? $data->no_telepon : '' ?>"/>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenis bpjs</label>
                    <select class="form-control col-lg-10" required name="jenis_bpjs">
                      <option value="<?= ($data->jenis_bpjs != '') ? $data->jenis_bpjs : '' ?>">-- Kategori --</option>
                      <option value="bpjs1">bpjs 1</option>
                      <option value="bpjs2">bpjs 2</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenis faskes</label>
                    <select class="form-control col-lg-10" required name="jenis_faskes">
                      <option value="">-- Kategori --</option>
                      <option value="faskes1">faskes 1</option>
                      <option value="faskes2">faskes 2</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Macam Faskes</label>
                    <select class="form-control col-lg-10" required name="macam_faskes">
                      <option value="">-- Kategori --</option>
                      <option value="faskes a">faskes a</option>
                      <option value="faskes b">faskes b</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Macam Faskes Lanjutan</label>
                    <input type="text" class="form-control col-lg-10" name="macam_faskes_lanjutan" placeholder="macam faskes lanjutan" value="<?= ($data->macam_faskes_lanjutan != '') ? $data->macam_faskes_lanjutan : '' ?>"/>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Deskripsi</label>
                    <input type="text" class="form-control col-lg-10" name="deskripsi" placeholder="deskripsi"  value="<?= ($data->deskripsi != '') ? $data->deskripsi : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Link web</label>
                    <input type="text" class="form-control col-lg-10" name="link_web" placeholder="link web"  value="<?= ($data->link_web != '') ? $data->link_web : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Linkt Gmap</label>
                    <input type="text" class="form-control col-lg-10" name="link_gmap" placeholder="link gmap"  value="<?= ($data->link_gmap != '') ? $data->link_gmap : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Linkt youtube</label>
                    <input type="text" class="form-control col-lg-10" name="link_yt" placeholder="link youtube"  value="<?= ($data->link_yt != '') ? $data->link_yt : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Longtitude (Optional)</label>
                    <input type="text" class="form-control col-lg-10" name="long" placeholder="longtitude"  value="<?= ($data->long != '') ? $data->long : '' ?>" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Latitude (Optional)</label>
                    <input type="text" class="form-control col-lg-10" name="lat" placeholder="lattitude"  value="<?= ($data->lat != '') ? $data->lat : '' ?>" />
                  </div>

                  <div class="form-group text-right">
                    <button type="submit" id="submit" name="tambah" class="btn btn-raised btn-primary btn-round waves-effect">Simpan</button>
                  </div>
                </div>

                <!-- <div class="col-sm-2">
                  <div class="form-group">
                    <button type="submit" id="submit" name="tambah" class="btn btn-raised btn-primary btn-round waves-effect">Simpan</button>
                  </div>
                </div> -->
              </div>
              <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token" required />
            </div>
          </form>
        </div>
      </div>
      <!-- #END# CKEditor -->
    </div>
  <div id="notif">

  </div>
  <!-- </section> -->
  <?php
  if (isset($_POST['tambah'])) {
    Settings::FaskesEdit($_POST, $dbCon, $id);
  } ?>