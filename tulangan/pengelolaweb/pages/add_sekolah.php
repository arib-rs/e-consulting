<?php
if (empty($_SESSION["UID"]) && empty($_SESSION["FNAME"]) && empty($_SESSION["EMAIL"]) && empty($_SESSION["LEVEL"]) && $_SESSION["SNAME"] !== $_SERVER['SERVER_NAME']) {
  echo "Forbidden page";
  exit();
}

if (empty($_SESSION["token"])) {
  $_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(32));
}
$npsn = $_GET['_npsn'];
$url = 'http://apikey.sidoarjokab.go.id/api/pendidikan/npsn/' . $npsn;
$result = @file_get_contents($url);
$pendidikan = json_decode($result, true);

?>
<!-- <section class="content"> -->
<div class="container">
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
        <div class="body block-header">
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
              <h2>Tambah Sekolah</h2>
              <?php
              if ($_SESSION['LEVEL'] === 8 || $_SESSION['LEVEL'] === 9) {
              } else {
              ?>
                <ul class="breadcrumb p-l-0 p-b-0 ">
                  <li class="breadcrumb-item"><a href="."><i class="icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>">Master</a></li>
                  <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('sekolah') ?>">Pengaturan Sekolah</a></li>
                  <li class="breadcrumb-item active">Tambah Sekolah</li>
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
                $userlist = Settings::UserSekolahShow($dbCon);
                if ($_SESSION['LEVEL'] === 1) {
                ?>

                  <div class="form-group row">
                    <label class="col-lg-2" style="color:white;margin-top:10px">User ID</label>
                    <select class="form-control col-lg-10 show-tick" name="picuserid">
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
                  <label class="col-lg-2" style="color:white;margin-top:10px">NPSN</label>
                  <input type="text" class="form-control col-lg-10" name="npsn" placeholder="-- NPSN --" value="<?= ($pendidikan['npsn'] != '') ? $pendidikan['npsn'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Nama Sekolah</label>
                  <input type="text" class="form-control col-lg-10" name="nama" placeholder="-- Nama Sekolah --" required value="<?= ($pendidikan['nama'] != '') ? $pendidikan['nama'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Alamat</label>
                  <input type="text" class="form-control col-lg-10" name="alamat" placeholder="-- Alamat --" value="<?= ($pendidikan['alamat'] != '') ? $pendidikan['alamat'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenjang</label>
                  <select class="form-control col-lg-10 show-tick" name="jenjang">
                    <option value="">-- Pilih Jenjang --</option>
                    <option <?= ($pendidikan['kategori'] == 'PAUD') ? 'selected' : '' ?> value="PAUD">PAUD</option>
                    <option <?= ($pendidikan['kategori'] == 'TK') ? 'selected' : '' ?> value="TK">TK</option>
                    <option <?= ($pendidikan['kategori'] == 'SD') ? 'selected' : '' ?> value="SD">SD/MI</option>
                    <option <?= ($pendidikan['kategori'] == 'SMP') ? 'selected' : '' ?> value="SMP">SMP/MTs</option>
                    <option <?= ($pendidikan['kategori'] == 'SMA') ? 'selected' : '' ?> value="SMA">SMA/MA</option>
                    <option <?= ($pendidikan['kategori'] == 'SMK') ? 'selected' : '' ?> value="SMK">SMK</option>
                    <option <?= ($pendidikan['kategori'] == 'Ponpes') ? 'selected' : '' ?> value="Ponpes">Ponpes</option>
                  </select>
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jenis Sekolah</label>
                  <select class="form-control col-lg-10 show-tick" name="jenis">
                    <option value="">-- Pilih Jenis Sekolah --</option>
                    <option <?= (strtolower($pendidikan['status']) == 'negeri') ? 'selected' : '' ?> value="Negeri">Negeri</option>
                    <option <?= (strtolower($pendidikan['status']) == 'swasta') ? 'selected' : '' ?> value="Swasta">Swasta</option>
                  </select>
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
                  <select class="form-control col-lg-10 show-tick" name="desa">
                    <option value="">-- Pilih Desa --</option>
                    <?php

                    for ($i = 0; $i < count($desa); $i++) {
                    ?>
                      <option <?= (strtolower($pendidikan['desa']) == strtolower($desa[$i])) ? 'selected' : '' ?> value="<?= $desa[$i] ?>"><?= $desa[$i] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">No Telepon</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="telp" placeholder="Contoh: 089678901234" value="<?= ($pendidikan['telepon'] != '') ? $pendidikan['telepon'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Biaya Pendaftaran (Rp)</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="biaya" placeholder="Contoh: 9500000" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Akreditasi</label>
                  <input type="text" class="form-control col-lg-10" name="akreditasi" placeholder="Contoh: A" value="<?= ($pendidikan['akreditasi'] != '') ? $pendidikan['akreditasi'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Ekstrakurikuler</label>
                  <input type="text" class="form-control col-lg-10" name="ekstrakurikuler" placeholder="-- Ekstrakurikuler --" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Prestasi</label>
                  <input type="text" class="form-control col-lg-10" name="prestasi" placeholder="-- Prestasi --" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">CP Sekolah</label>
                  <input type="text" class="form-control col-lg-10" name="cp" placeholder="-- Contact Person Sekolah --" />
                </div>
                <!-- <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Link Foto/Video Sekolah</label>
                  <input type="text" class="form-control col-lg-10" name="foto" placeholder="-- Link Foto/Video Sekolah --" />
                </div> -->
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Deskripsi</label>
                  <textarea class="form-control col-lg-10" style="border: 1px solid #535e69; border-radius: 30px;" name="deskripsi" placeholder="-- Deskripsi Sekolah --"></textarea>
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Nama Kepala Sekolah</label>
                  <input type="text" class="form-control col-lg-10" name="kepala_sekolah" placeholder="-- Nama Kepala Sekolah --" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Ruang Kelas</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_ruang_kelas" placeholder="" value="<?= ($pendidikan['jumlah_ruang_kelas'] != '') ? $pendidikan['jumlah_ruang_kelas'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Guru</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_guru" placeholder="" value="<?= ($pendidikan['jumlah_guru'] != '') ? $pendidikan['jumlah_guru'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Siswa</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_siswa" placeholder="" value="<?= ($pendidikan['jumlah_siswa'] != '') ? $pendidikan['jumlah_siswa'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Ruang Perpustakaan</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_ruang_perpus" placeholder="" value="<?= ($pendidikan['jumlah_ruang_perpus'] != '') ? $pendidikan['jumlah_ruang_perpus'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Lab Komputer</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_lab_komputer" placeholder="" value="<?= ($pendidikan['jumlah_lab_komputer'] != '') ? $pendidikan['jumlah_lab_komputer'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Lab Bahasa</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_lab_bahasa" placeholder="" value="<?= ($pendidikan['jumlah_lab_bahasa'] != '') ? $pendidikan['jumlah_lab_bahasa'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Lab Fisika</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_lab_fisika" placeholder="" value="<?= ($pendidikan['jumlah_lab_fisika'] != '') ? $pendidikan['jumlah_lab_fisika'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Jumlah Lab Biologi</label>
                  <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control col-lg-10" name="jumlah_lab_biologi" placeholder="" value="<?= ($pendidikan['jumlah_lab_biologi'] != '') ? $pendidikan['jumlah_lab_biologi'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Link Website Sekolah</label>
                  <input type="text" class="form-control col-lg-10" name="urlweb" placeholder="-- Link Website Sekolah --" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Link Google Map (Optional)</label>
                  <input type="text" class="form-control col-lg-10" name="urlmap" placeholder="-- Link Lokasi Map Sekolah (Optional) --" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Longitude (Optional)</label>
                  <input type="text" class="form-control col-lg-10" name="lng" placeholder="-- Longitude (Optional) --" value="<?= ($pendidikan['lng'] != '') ? $pendidikan['lng'] : '' ?>" />
                </div>
                <div class="form-group row">
                  <label class="col-lg-2" style="color:white;margin-top:10px">Latitude (Optional)</label>
                  <input type="text" class="form-control col-lg-10" name="lat" placeholder="-- Latitude (Optional) --" value="<?= ($pendidikan['lat'] != '') ? $pendidikan['lat'] : '' ?>" />
                </div>
                <div class="form-group text-right">
                  <a href=".?_pg=' <?= encodeUrl('master') ?> '&_act='<?= encodeUrl('sekolah') ?>'" class="btn btn-raised btn-primary btn-round waves-effect">Batal</a>
                  <button type="submit" id="submit" name="tambah" class="btn btn-raised btn-primary btn-round waves-effect">Simpan</button>
                </div>
              </div>
            </div>
            <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token" />

          </div>
        </form>
      </div>
    </div>
    <!-- #END# CKEditor -->
  </div>
  <!-- </section> -->
  <?php
  if (isset($_POST['tambah'])) {
    Settings::SekolahAdd($_POST, $dbCon);
  } ?>