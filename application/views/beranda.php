  <!-- Modal -->
  <div class="modal fade" id="Modallogin" tabindex="-1" role="dialog" aria-labelledby="Modallogintitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="Modallogintitle">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="auth/login" class="" method="post" id="login-form">
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-lg-12">

                              <?php if ($this->session->flashdata('flash')) {
                                    echo '<span id="login-msg">' . $this->session->flashdata('flash') . '</span>';
                                }  ?>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-12">
                              <div class="mt-10">
                                  <input type="text" name="username" placeholder="Username" required class="single-input">

                              </div>
                              <div class="mt-10">
                                  <input type="password" name="password" placeholder="Password" required class="single-input">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn head-btn2" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn head-btn1">Login</button>

                  </div>
              </form>
          </div>
      </div>
  </div>
  <main>

      <!-- slider Area Start-->
      <div class="slider-area ">
          <!-- Mobile Menu -->
          <div class="slider-active">
              <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/bg.jpg">
                  <div class="single-slider slider-height d-flex align-items-center" style="margin:auto">
                      <div class="container">
                          <div class="row">
                              <div class="col-xl-6 col-lg-9 col-md-10">
                                  <div class="hero__caption">

                                      <h1 style="margin-bottom:10px">Layanan Konsultasi Online</h1>
                                      <h5 style="margin-bottom:40px">Inspektorat Kabupaten Sidoarjo</h5>
                                  </div>
                              </div>
                          </div>
                          <!-- Search Box -->
                          <div class="row">
                              <div class="col-xl-8">
                                  <!-- form -->
                                  <!-- <form action="#" class="search-box">
                                    <div class="input-form">
                                        <input type="text" placeholder="Job Tittle or keyword">
                                    </div>
                                    <div class="select-form">
                                        <div class="select-itms">
                                            <select name="select" id="select1">
                                                <option value="">Location BD</option>
                                                <option value="">Location PK</option>
                                                <option value="">Location US</option>
                                                <option value="">Location UK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-form">
                                        <a href="#">Find job</a>
                                    </div>
                                </form> -->
                                  <?php
                                    if ($this->session->userdata('username') != '') {
                                        if ($this->session->userdata('grup') < 3) {
                                    ?>
                                          <a class="btn " href="<?= base_url('/konsultasi/data'); ?>">Data Konsultasi</a>
                                      <?php
                                        } else {
                                        ?>
                                          <a class="btn " href="<?= base_url('/konsultasi'); ?>">Mulai Konsultasi</a>

                                      <?php
                                        }
                                    } else { ?>
                                      <a class="btn " data-toggle="modal" data-target="#Modallogin">Mulai Konsultasi</a>
                                  <?php } ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- slider Area End-->
          <!-- Our Services Start -->

      </div>
  </main>

  <!-- Modal -->
  <div class="modal fade" id="Modallogout" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
          <div class="modal-content  text-center">
              <h5 style="margin:20px;"> Apakah anda yakin ingin melakukan <b>Log Out</b> ? </h5>
              <div class="modal-footer">
                  <a class="btn head-btn2" data-dismiss="modal">Batal</a>
                  <a href="<?= base_url('auth/logout') ?>" class="btn head-btn2">Iya</a>

              </div>
          </div>
      </div>
  </div>


  <?php if ($this->session->userdata('notifubahpass') == 0 && $this->session->userdata('password') == md5('econsulting@2020')) { ?>
      <div class="modal" id="Modalubahpass" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
              <div class="modal-content  text-center">
                  <h5 style="margin:20px;"> Akun anda masih menggunakan password bawaan. Buat password baru ?</h5>
                  <div class="modal-footer">
                      <a class="btn head-btn2" data-dismiss="modal">Tidak</a>
                      <a href="<?= base_url('Ubah_password') ?>" class="btn head-btn2">Iya</a>

                  </div>
              </div>
          </div>
      </div>
  <?php }
    if ($this->session->userdata('notifubahpass') == 0) {
        $temp = $this->session->userdata('notifubahpass');
        $this->session->set_userdata('notifubahpass', $temp + 1);
    }
    ?>