<!doctype html>
<!-- <html class="no-js" lang="zxx"> -->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
  <title><?= $title ?></title>
  <meta name="description" content="overview &amp; stats">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="manifest" href="site.webmanifest">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('/') ?>assets/img/favicon.ico">

  <!-- CSS here -->
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/flaticon.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/price_rangs.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/slicknav.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/animate.min.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/magnific-popup.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/slick.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/nice-select.css">
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/style.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/') ?>assets/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('/vendor') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- date picker -->
  <link rel="stylesheet" href="<?= base_url('/vendor') ?>/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">
  <style type="text/css">
    ul.list-aja {
      margin-left: 5%;
      margin-bottom: 20px;

    }

    ul.list-aja li {
      list-style-type: disc !important;
    }

    ol.list-angka li {
      list-style-type: decimal;

    }
  </style>
</head>

<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="<?= base_url('/') ?>assets/img/logo/logox.png" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->
  <header>
    <?php
    $kolom = '';
    if ($this->session->userdata('username') != '') {
      $kolom = 7;
    } else {
      $kolom = 12;
    }
    ?>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
      <div class="headder-top header-sticky">
        <div class="container">
          <div class="row align-items-center">
            <!-- Logo -->
            <?php
            if ($this->session->userdata('username') != '') {
            ?>
              <div class="col-lg-5 col-md-5">
                <div class="logo">
                  <!-- <a href="<?= base_url(); ?>">
                  <img src="<?= base_url(); ?>/assets/img/logo/logo_sidoarjo.png" alt="" width="80px">
                </a> -->
                  <div style="margin:20px 0">
                    Hello,
                    <a href="#" style="color:#fb246a;">
                      <?= ($this->session->userdata('opd') == 1) ? 'Admin ' : ''; ?>
                      <?= $this->session->userdata('fullname') ?>
                    </a>
                    <?php if (!empty($this->session->userdata('nama_skpd'))) { ?>
                      <span>(<?= ucwords(strtolower($this->session->userdata('nama_skpd'))) ?>)</span>
                    <?php
                    }
                    if ($this->session->userdata('user') == 'internal') {
                    ?>
                      <a href="<?= base_url('Ubah_password'); ?>" style="color:#fb246a; margin-left:5px" title="Ubah Password"> <i class="fa fa-key"></i> </a>
                    <?php } ?>
                    <a href="#" style="color:#fb246a; margin-left:5px" title="Log Out" data-toggle="modal" data-target="#Modallogout"> <i class="fa fa-sign-out"></i> </a>
                  </div>
                </div>
              </div>
            <?php } else { ?>
              <!-- <a href="#" style="margin:15px 20px" class="genric-btn danger-border radius small" data-toggle="modal" data-target="#Modallogin">Login</a> -->
            <?php
            } ?>
            <div class="col-lg-<?= $kolom ?> col-md-<?= $kolom ?>">
              <div class="menu-wrapper f-right">
                <!-- Main-menu -->
                <div class="main-menu">
                  <nav class="d-none d-lg-block">
                    <ul id="navigation">
                      <!-- <li><a href="about.html">Tentang e-consulting</a></li>
                      <li><a href="contact.html">Kontak kami</a></li> -->
                      <?php
                      if ($this->session->userdata('username') != '') {
                      ?>
                        <li><a href="<?= base_url(); ?>">Beranda</a></li>
                        <?php
                        if ($this->session->userdata('grup') < 3) {
                        ?>
                          <li><a href="<?= base_url('/konsultasi/data') ?>">Data konsultasi</a></li>
                        <?php
                        } else {
                        ?>
                          <li><a href="#">Menu konsultasi</a>
                            <ul class="submenu">
                              <li><a href="<?= base_url('/konsultasi') ?>"> Konsultasi Baru.. </a></li>
                              <li><a href="<?= base_url('/konsultasi/data') ?>"> Data Konsultasi </a></li>
                            </ul>
                          </li>

                        <?php
                        }
                        if ($this->session->userdata('grup') < 2) {
                        ?>
                          <li><a href="<?= base_url('/analitik') ?>">Data analitik</a></li>
                      <?php
                        }
                      }
                      ?>
                    </ul>
                  </nav>
                </div>
                <!-- Header-btn -->
                <div class="header-btn d-none f-right d-lg-block">
                  <!-- <a href="#" class="btn head-btn1">Register</a> -->


                  <?php
                  if ($this->session->userdata('username') != '') {
                  ?>
                  <?php
                  } else {
                  ?>
                    <a href="#" style="margin:10px 0" class="btn head-btn2" data-toggle="modal" data-target="#Modallogin">Login</a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->
  </header>


  <!-- <script>
    $('document').ready(function() {

      $("#login-form").submit(function() {
        $.ajax({
          url: $(this).attr("action"),
          // url: <?= base_url('auth/login') ?>,
          data: $(this).serialize(),
          type: $(this).attr("method"),
          // dataType: 'html',
          // beforeSend: function() {
          //   $("textarea").attr("disabled", true);
          //   $("button").attr("disabled", true);
          // },
          // complete: function() {
          //   $("textarea").attr("disabled", false);
          //   $("button").attr("disabled", false);
          // },
          success: function(hasil) {
            console.log(hasil);
            $("#login-msg .col-lg-12").after(hasil);
          }
        })
        return false;
      });

    });
  </script> -->