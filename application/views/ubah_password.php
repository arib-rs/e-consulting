<main>
    <!-- Our Services Start -->
    <div class="our-services" style="background:rgba(31,43,123,0.1);padding-top:50px;padding-bottom:50px">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <h2 style="margin-bottom:50px;">Form Ubah Password</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('flash')) {
                        echo $this->session->flashdata('flash');
                    }  ?>
                </div>
            </div>
            <form id="formubahpass" action="Ubah_password/savepass" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="mt-20">
                            <input type="password" name="oldpass" placeholder="Password Lama" required class="single-input">
                        </div>
                        <div class="mt-20">
                            <input type="password" name="newpass" placeholder="Password Baru" required class="single-input">
                        </div>
                        <div class="mt-20 mb-30">
                            <input type="password" name="newpassconf" placeholder="Ulangi Password Baru" required class="single-input">
                        </div>


                    </div>

                </div>


                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center">
                            <button type="submit" class="btn">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Our Services End -->


</main>