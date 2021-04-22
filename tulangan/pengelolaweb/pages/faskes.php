<?php
if (empty($_SESSION["UID"]) && empty($_SESSION["FNAME"]) && empty($_SESSION["EMAIL"]) && empty($_SESSION["LEVEL"]) && $_SESSION["SNAME"] !== $_SERVER['SERVER_NAME']) {
  echo "Forbidden page";
  exit();
}

$url = 'http://apikey.sidoarjokab.go.id/api/kesehatan';
$result = @file_get_contents($url);
$pendidikan = json_decode($result, true);
$list = Settings::FaskesShowOrderByDate($dbCon);

// print_r(count($pendidikan));
// print_r($pendidikan);
// die;

?>
<div class="row clearfix">
  <div class="col-lg-12">
    <div class="card">
      <div class="body block-header">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-sm-12">
            <h2>Pengaturan Faskes</h2>
            <?php
            if ($_SESSION['LEVEL'] === 8 || $_SESSION['LEVEL'] === 9) {
            } else {
            ?>
              <ul class="breadcrumb p-l-0 p-b-0 ">
                <li class="breadcrumb-item"><a href="."><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('master') ?>">Master</a></li>
                <li class="breadcrumb-item active">Pengaturan Faskes</li>
              </ul>
            <?php } ?>
          </div>
          <?php
          if ($_SESSION["LEVEL"] == 1) {
          ?>
            <div class="col-lg-6 col-md-4 col-sm-12 text-right">
              <a class="btn btn-primary btn-round btn-simple float-right hidden-xs m-l-10" data-toggle="modal" data-target="#ModalAddSekolah">Tambah Sekolah</a>
            </div>
          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="row clearfix">
  <div class="col-lg-12">
    <div class="card">
      <div class="body">
        <?php
        if ($_SESSION['LEVEL'] === 8 || $_SESSION['LEVEL'] === 9) {
        ?>
          <?php foreach ($list as $key => $value) {
            $status = '';
            $alasanditolak = '';
            if ($value->verified_date != NULL) {
              $status = "<span class='badge badge-success' style='margin-left:0'>Verified</span>";
            } else if ($value->reject_date != NULL) {
              $status = "<span class='badge badge-danger' style='margin-left:0'>Dikembalikan</span>";
              $alasanditolak = "Catatan : " . $value->reject_note;
            } else {
              $status = "<span class='badge badge-warning' style='margin-left:0'>Unverified</span>";
            }
          ?>
            <div class="row">
              <div class="col-lg-12">
                <h4>
                  <?= htmlentities($value->nama_faskes) ?>
                </h4>
              </div>
            </div>
            <div class="row" style="line-height:25px;margin-bottom:20px">
              <div class="col-lg-12">
                <h6 style="text-transform:capitalize">
                  Status
                </h6>
              </div>
              <div class="col-lg-12" style="padding-left:30px">
                <?= $status ?>
                <br />
                <?= $alasanditolak ?>
              </div>
            </div>
            <div class="row" style="line-height:25px">
              <div class="col-lg-12">
                <h6 style="text-transform:capitalize">
                  Informasi Detail
                </h6>
              </div>
              <div class="col-lg-12" style="padding-left:30px">
                <div class="row">
                  <div class="col-md-4" style="margin:0px 0 20px 0; ">
                    <?php
                    $akreditasi = ($value->akreditasi != '') ? ' · Akreditasi ' .  $value->akreditasi : '';
                    ?>
                    <div><i style="color:#3eacff;padding-right:8px" class="fa fa-map-marker" aria-hidden="true"></i> Alamat : <?= $value->alamat ?></div>
                    <div><i style="color:#3eacff;padding-right:8px" class="fa fa-phone" aria-hidden="true"></i>No Telp : <?= $value->no_telepon ?></div>
                    <div><i style="color:#3eacff;padding-right:8px" class="fa fa-building" aria-hidden="true"></i>Status : <?= $value->jenis_sekolah . $akreditasi ?></div>
                  </div>
                  <div class="col-md-4" style="margin:0px 0 20px 0">

                    <div><i style="color:#3eacff;padding-right:8px" class="fa fa-globe" aria-hidden="true"></i> Website : <?= ($value->link_web != '') ? $value->link_web : '-' ?></div>
                    <!-- <div><i style="color:#3eacff;padding-right:8px" class="fa fa-user" aria-hidden="true"></i> CP Sekolah : <?= ($value->cp_sekolah != '') ? $value->cp_sekolah : '-' ?></div> -->
                    <!-- <div><i style="color:#3eacff;padding-right:8px" class="fa fa-money" aria-hidden="true"></i>Biaya Pendaftaran : <?= ($value->biaya != '') ? 'Rp ' . $value->biaya : '-' ?></div> -->
                  </div>
                  <div class="col-md-4" style="margin:0px 0 20px 0">
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="line-height:25px;margin-bottom:20px">
              <div class="col-lg-12">
                <h6 style="text-transform:capitalize">
                  Deskripsi
                </h6>
              </div>
              <div class="col-lg-12" style="padding-left:30px">
                <?= nl2br(($value->deskripsi != '') ? $value->deskripsi : '-') ?>

              </div>
            </div>

            <div class="row" style="line-height:25px;margin-bottom:20px">
              <div class="col-lg-12">
                <h6 style="text-transform:capitalize">
                  Videos Faskes
                </h6>
              </div>
              <div class="col-lg-12" style="padding-left:30px">
                <?= nl2br(($value->link_yt != '') ? $value->link_yt : '-') ?>

              </div>
            </div>

            <div class="row" style="line-height:25px;margin-bottom:20px">
              <div class="col-lg-12">
                <a <?= ($value->verified_date != NULL) ? "onclick=\"return confirm('Peringatan ! Setiap perubahan data akan mengubah status menjadi -Unverified-. Apakah ingin melanjutkan ?')\"" : "" ?> href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('edit_faskes') ?>&_ews=<?= $value->id ?>" class="btn btn-primary btn-round" style="color:#FFF">Edit Data </a>

                <a <?= ($value->verified_date != NULL) ? "onclick=\"return confirm('Peringatan ! Setiap perubahan data akan mengubah status menjadi -Unverified-. Apakah ingin melanjutkan ?')\"" : "" ?> href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('list_media') ?>&_ews=<?= $value->id ?>&_k=2" class="btn btn-primary btn-round" style="color:#FFF">Media</a>

              </div>
            </div>

            <!-- <div class="row" style="line-height:25px;margin-bottom:20px">
              <div class="col-lg-12">
                <a <?= ($value->verified_date != NULL) ? "onclick=\"return confirm('Peringatan ! Setiap perubahan data akan mengubah status menjadi -Unverified-. Apakah ingin melanjutkan ?')\"" : "" ?> href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('edit_faskes') ?>&_ews=<?= $value->id ?>" class="btn btn-primary btn-round" style="color:#FFF">Media </a>
              </div>
            </div> -->

          <?php } ?>
        <?php
        } else {
        ?>
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <!-- <th>Jenis</th> -->
                  <!-- <th>Akreditasi</th> -->
                  <th>Alamat</th>
                  <th>No Telp</th>
                  <!-- <th>User</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($pendidikan as $d) { ?>
                  <!-- <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $d['nama'] ?></td>
                  <td><?= $d['status'] ?></td>
                  <td><?= $d['akreditasi'] ?></td>
                  <td><?= $d['alamat'] ?></td>
                  <td><?= $d['telepon'] ?></td>
                  <td>
                    <span class="badge badge-success">Verified</span>
                  </td>
                  <td>
                    <a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('edit_sekolah') ?>&_ews=<?= $value->id ?>"><i class="material-icons">visibility</i></a> &nbsp;
                    <a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('edit_sekolah') ?>&_ews=<?= $value->id ?>"><i class="material-icons">create</i></a> &nbsp;
                    <a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= $_GET['_act'] ?>&_ds=<?= encodeUrl('delete_sekolah') ?>&_uid=<?= $value->id ?>" onclick="return confirm('Hapus item ?')"><i class="material-icons">delete_sweep</i></a>
                  </td>

                </tr> -->
                <?php }


                $no = 1;
                foreach ($list as $key => $value) { ?>
                  <tr>
                    <td style="width: 20px"><?= $no++ ?></td>
                    <td>
                      <b><?= htmlentities($value->nama_faskes) ?></b>
                      <br>
                      <?php
                      // echo substr(htmlentities($value->description), 0, 100) . "..." ;
                      ?>
                    </td>
                    <!-- <td><?= htmlentities($value->jenis_sekolah) ?></td>
                    <td><?= htmlentities($value->akreditasi) ?></td> -->
                    <td><?= htmlentities($value->alamat) ?></td>
                    <td><?= htmlentities($value->no_telepon) ?></td>
                    <td><?= htmlentities($value->email) ?></td>
                    <td>

                      <?php
                      if ($value->verified_date != NULL) {
                        echo "<span class='badge badge-success'>Verified</span>";
                      } else if ($value->reject_date != NULL) {
                        echo "<span class='badge badge-danger'>Dikembalikan</span>";
                      } else {
                        echo "<span class='badge badge-warning'>Unverified</span>";
                      }
                      ?>

                    </td>
                    <td style="width: 20px">
                      <a href="#" data-toggle="modal" data-target="#ModalDetail<?= $value->id ?>" title="Lihat Detail"><i class="material-icons">info</i></a>&nbsp;
                      <a href="#" data-toggle="modal" data-target="#ModalUpload<?= $value->id ?>" title="Lihat Detail"><i class="material-icons">get_app</i></a>&nbsp;
                      <?php
                      // if ($_SESSION["LEVEL"] == 1) {
                      ?>

                      <?php
                      if ($value->verified_date == NULL && $value->reject_date == NULL) {
                      ?>
                        <a style="color:#18ce0f;" href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= $_GET['_act'] ?>&_ds=<?= encodeUrl('verify') ?>&_uid=<?= $value->id ?>" onclick="return confirm('Setujui data sekolah ini ?')" title="Verify"><i class=" material-icons">check_box</i></a>&nbsp;
                        <a style="color:#FF3636;" href="" data-toggle="modal" data-target="#ModalKembalikan<?= $value->id ?>" title="Kembalikan"><i class="material-icons">cancel</i></a>&nbsp;

                      <?php
                      } else {
                      ?>
                        <a title="Verify"><i class=" material-icons">check_box</i></a>&nbsp;
                        <a title="Kembalikan"><i class="material-icons">cancel</i></a>&nbsp;

                      <?php
                      }
                      // } else {
                      ?>

                      <a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('edit_faskes') ?>&_ews=<?= $value->id ?>"><i class="material-icons">create</i></a> &nbsp;
                      <a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= $_GET['_act'] ?>&_ds=<?= encodeUrl('delete_faskes') ?>&_uid=<?= $value->id ?>" onclick="return confirm('Hapus item ?')"><i class="material-icons">delete_sweep</i></a>
                      <?php
                      // } 
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
foreach ($list as $key => $value) { ?>
  <div class="modal fade" id="ModalKembalikan<?= $value->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Isikan alasan data tidak dapat diterima</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="modal-body">



            <div class="form-group">
              <input style="color:grey" type="text" class="form-control" name="rejectnote" placeholder="" />
            </div>

            <input type="hidden" name="id" value="<?= $value->id ?>">


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" name="kembalikan" class="btn btn-primary">Submit</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="ModalDetail<?= $value->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content" style="color:grey">
        <div class="modal-header">
          <h5 class="modal-title"><?= $value->nama_faskes ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          $status = '';
          if ($value->verified_date != NULL) {
            $status = "<span class='badge badge-success' style='margin-left:0'>Verified</span>";
          } else if ($value->reject_date != NULL) {
            $status = "<span class='badge badge-danger' style='margin-left:0'>Dikembalikan</span><br/> <span style='font-size:12px'> - " . $value->reject_note . "</span>";
          } else {
            $status = "<span class='badge badge-warning' style='margin-left:0'>Unverified</span>";
          }
          ?>
          <div class="row">
            <!-- -->
            <div class="col-lg-4">
              Waktu Entry
            </div>
            <div class="col-lg-8">: <?= $value->insert_date ?></div>
            <div class="col-lg-4">
              Status
            </div>
            <div class="col-lg-8">: <?= $status ?></div>
            <div class="col-lg-4">
              Nama Faskes
            </div>
            <div class="col-lg-8">: <?= $value->nama_faskes ?></div>
            <div class="col-lg-4">
              Alamat
            </div>
            <div class="col-lg-8">: <?= $value->alamat ?></div>
            <div class="col-lg-4">
              Desa
            </div>
            <div class="col-lg-8">: <?= $value->desa ?></div>
            <div class="col-lg-4">
              No. Telp 
            </div>
            <div class="col-lg-8">: <?= $value->no_telepon ?></div>
  
            <div class="col-lg-4">
              Deskripsi
            </div>
            <div class="col-lg-8">: <?= $value->deskripsi ?></div>
            <div class="col-lg-4">
              Link Website
            </div>
            <div class="col-lg-8">: <?= $value->link_web ?></div>
            <div class="col-lg-4">
              Foto/Video
            </div>
            <div class="col-lg-8">:</div>
            <div class="col-lg-12 text-center" style="margin:10px;">
              <?php
              if ($value->link_yt!= '') {
                if (strpos($value->link_yt, 'iframe') !== false) {
                  echo $value->link_yt;
                } else {
                  echo "<a href='" . $value->link_yt . "'><img style='max-width:70%' src='" . $value->link_yt . "' /></a>";
                }
              } else {
                echo "<img style='max-width:70%' src='../images/default/noimage.png' />";
              }
              ?>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="ModalUpload<?= $value->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content" style="color:grey">
        <div class="modal-header">
          <h5 class="modal-title"><?= $value->nama_faskes ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          $status = '';
          if ($value->verified_date != NULL) {
            $status = "<span class='badge badge-success' style='margin-left:0'>Verified</span>";
          } else if ($value->reject_date != NULL) {
            $status = "<span class='badge badge-danger' style='margin-left:0'>Dikembalikan</span><br/> <span style='font-size:12px'> - " . $value->reject_note . "</span>";
          } else {
            $status = "<span class='badge badge-warning' style='margin-left:0'>Unverified</span>";
          }
          ?>
          <div class="row">
            <!-- -->
            <div class="col-lg-12">
              <input type="file" class="form-control" name="image" id="image" />
            </div>
            <!-- <div class="col-lg-8">: <?= $value->link_web ?></div>
            <div class="col-lg-4">
              Foto/Video
            </div>
            <div class="col-lg-8">:</div>
            <div class="col-lg-12 text-center" style="margin:10px;">
              <?php
              if ($value->link_yt!= '') {
                if (strpos($value->link_yt, 'iframe') !== false) {
                  echo $value->link_yt;
                } else {
                  echo "<a href='" . $value->link_yt . "'><img style='max-width:70%' src='" . $value->link_yt . "' /></a>";
                }
              } else {
                echo "<img style='max-width:70%' src='../images/default/noimage.png' />";
              }
              ?>
            </div> -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

        </div>

      </div>
    </div>
  </div>
<?php
}
?>
<div class="modal fade" id="ModalAddSekolah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" style="color:grey">
      <div class="modal-header">
        <h5 class="modal-title">Pilih Data Faskes Yang Tersedia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style=" overflow : auto">
        <?php
        $allnpsn = array();
        $listnpsn = Settings::SekolahShowNPSN($dbCon);
        foreach ($listnpsn as $key => $value) {
          $allnpsn[] = $value->npsn;
        }
        ?>
        <table id="tb_sekolah" class="table table-bordered dataTable" style="line-height: 1.25;">
          <thead style="text-align:center;">
            <tr>
              <th>No</th>
              <th>Faskes</th>
              <th>Alamat</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $n = 1;
            foreach ($pendidikan['data'] as $d) {

              // if (!in_array($d['npsn'], $allnpsn)) {

              ?>
              <tr>
                <td width="10%" style="text-align:center;"><?= $n++ ?></td>
                <td><a href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('add_faskes') ?>&_npsn=<?= $d['npsn'] ?>"><?= $d['nama_instansi'] ?></a> </td>
                <td><?= $d['alamat'] ?></td>

              </tr>
            <?php
              // }
            } ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="btn btn-primary" href=".?_pg=<?= $_GET['_pg'] ?>&_act=<?= encodeUrl('add_faskes') ?>">Masukkan Data Baru</a>
      </div>
    </div>
  </div>
</div>
<?php
if (decodeUrl(@$_GET['_ds']) === 'delete_faskes') {
  $id = (int) $_GET['_uid'];
  Settings::FaskesDelete($id, $dbCon);
}
if (decodeUrl(@$_GET['_ds']) === 'verify') {
  $id = $_GET['_uid'];
  Settings::FaskesVerify($id, $dbCon);
}
if (isset($_POST['kembalikan'])) {
  Settings::FaskesReject($_POST, $dbCon);
}
?>