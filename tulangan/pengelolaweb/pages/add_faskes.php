<?php
if (empty($_SESSION["UID"]) && empty($_SESSION["FNAME"]) && empty($_SESSION["EMAIL"]) && empty($_SESSION["LEVEL"]) && $_SESSION["SNAME"] !== $_SERVER['SERVER_NAME']) {
  echo "Forbidden page";
  exit();
}

if (empty($_SESSION["token"])) {
  $_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(32));
  // $faskes = json_decode($result, true);
}
?>
<section class="content">
  <div class="container">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body block-header">
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-12">
                <h2>Tambah Faskes</h2>
                <?php
                if ($_SESSION["EMAIL"] == "admfaskes@sidoarjokab.go.id" || $_SESSION["EMAIL"] == "admsekolah@sidoarjokab.go.id") { } else {
                  ?>
                  <ul class="breadcrumb p-l-0 p-b-0 ">
                    <li class="breadcrumb-item"><a href="."><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('services_sets') ?>">Pengaturan Layanan</a></li>
                    <li class="breadcrumb-item active">Tambah Layanan</li>
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
                    <input type="text" class="form-control col-lg-10" name="nama_faskes" placeholder="Nama Faskes" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Dokter Praktek</label>
                  <textarea class="form-control col-lg-10" style="border: 1px solid #535e69; border-radius: 30px;" name="dokter" placeholder="--"></textarea>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Bidan Praktek</label>
                  <textarea class="form-control col-lg-10" style="border: 1px solid #535e69; border-radius: 30px;" name="bidan" placeholder="--"></textarea>
                  </div>

                  <!-- <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Bidan Praktek</label>
                  <textarea class="form-control col-lg-10" style="border: 1px solid #535e69; border-radius: 30px;" name="bidan" placeholder="--"></textarea>
                  </div> -->

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Alamat</label>
                    <input type="text" class="form-control col-lg-10" name="alamat" placeholder="Alamat" />
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
                        <option value="<?= $desa[$i] ?>"><?= $desa[$i] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">No telpon</label>
                    <input type="text" class="form-control col-lg-10" name="no_telepon" placeholder="No Telpon" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenis bpjs</label>
                    <select class="form-control col-lg-10" required name="jenis_bpjs">
                      <option value="">-- Kategori --</option>
                      <option value="bpjs1">bpjs 1</option>
                      <option value="bpjs2">bpjs 2</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenis faskes</label>
                    <select class="form-control col-lg-10" required name="jenis_faskes">
                    <option value="">-- Kategori --</option>
                      <option value="rs">rs</option>
                      <option value="Puskesmas">puskesmas</option>
                      <option value="klinik">klinik</option>
                      <option value="pustu">pustu</option>
                      <option value="polindes">polindes</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Macam Faskes</label>
                    <select class="form-control col-lg-10" required name="macam_faskes">
                      <option value="">-- Kategori --</option>
                      <option value="rs">rs</option>
                      <option value="Puskesmas">puskesmas</option>
                      <option value="klinik">klinik</option>
                      <option value="pustu">pustu</option>
                      <option value="polindes">polindes</option>
                    </select>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Macam Faskes Lanjutan</label>
                    <input type="text" class="form-control col-lg-10" name="macam_faskes_lanjutan" placeholder="macam faskes lanjutan"/>
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Deskripsi</label>
                    <input type="text" class="form-control col-lg-10" name="deskripsi" placeholder="deskripsi"  />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Link web</label>
                    <input type="text" class="form-control col-lg-10" name="link_web" placeholder="link web" />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Linkt Gmap</label>
                    <input type="text" class="form-control col-lg-10" name="link_gmap" placeholder="link gmap"  />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Linkt youtube</label>
                    <input type="text" class="form-control col-lg-10" name="link_yt" placeholder="link youtube"  />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Longtitude (Optional)</label>
                    <input type="text" class="form-control col-lg-10" name="lng" placeholder="longtitude"  />
                  </div>

                  <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Latitude (Optional)</label>
                    <input type="text" class="form-control col-lg-10" name="lat" placeholder="lattitude"  />
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
</section>
<?php
if (isset($_POST['tambah'])) {
  Settings::FaskesTambah($_POST, $dbCon);
} ?>