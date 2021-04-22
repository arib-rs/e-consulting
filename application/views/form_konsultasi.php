 <div class="modal fade" id="Modalpanduan" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog  modal-lg" role="document">
         <div class="modal-content ">
             <div class="modal-header">
                 <h5 class="modal-title"> Panduan Konsultasi </h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- <iframe height="1070px" width="100%" src="<?= base_url('assets/econsulting1.pdf') ?>"></iframe> -->
                         <ol class="list-angka">
                             <li><b>Konsultasi Pengelolaan Keuangan OPD</b> <br>
                                 Adalah konsultasi terkait pengelolaan keuangan oleh Organisasi Perangkat Daerah yang meliputi:
                                 <ul class="list-aja">
                                     <li>Pengelolaan keuangan OPD</li>
                                     <li>Pengelolaan aset OPD</li>
                                     <li>Tindak lanjut hasil pemeriksaan internal/eksternal</li>
                                     <li>dan sejenisnya</li>
                                 </ul>
                             </li>
                             <li><b>Konsultasi Pengelolaan Keuangan Desa/Kelurahan</b>
                                 <ul class="list-aja">
                                     <li>Pengelolaan keuangan OPD</li>
                                     <li>Pengelolaan aset OPD</li>
                                     <li>Tindak lanjut hasil pemeriksaan internal/eksternal</li>
                                     <li>dan sejenisnya</li>
                                 </ul>
                             </li>
                             <li><b>Konsultasi Akuntabilitas Kinerja Pemerintah Daerah</b> <br>
                                 Adalah konsultasi terkait perwujudan agenda reformasi birokrasi yang meliputi:
                                 <ul class="list-aja">
                                     <li>SIPP (Sistim Pengendalian Intern Pemerintah)</li>
                                     <li>Zona Integritas</li>
                                     <li>SAKIP (Sistim Akuntabilitas Kinerja Instansi Pemerintah)</li>
                                     <li>LPPD (Laporan Penyelenggaraan Pemerintah Daerah)</li>
                                     <li>EKPPD (Evaluasi Kinerja Penyelenggaraan Pemerintah Daerah)</li>
                                     <li>LKjIP (Laporan Kinerja Instansi Pemerintah)</li>
                                     <li>Audit Kinerja</li>
                                     <li>dan sejenisnya</li>
                                 </ul>
                             </li>
                             <li><b>Konsultasi Pencegahan Korupsi dan Penegakan Integritas ASN</b>
                                 <!-- <li><b>Konsultasi Tindak Pidana Korupsi/Gratifikasi</b> -->
                                 <ul class="list-aja">
                                     <li>Pengaduan</li>
                                     <li>Pencegahan tindak pidana korupsi</li>
                                     <li>Gratifikasi</li>
                                     <li>LHKASN (Laporan Harta Kekayaan Aparatur Sipil Negara)</li>
                                     <li>WBS (Whistle Blowing System)</li>
                                     <li>Pendidikan Anti Korupsi</li>
                                     <li>Kasus kepegawaian</li>
                                     <li>dan sejenisnya</li>
                                 </ul>
                             </li>
                         </ol>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <a class="btn head-btn2" data-dismiss="modal">Tutup</a>

             </div>
         </div>
     </div>
 </div>
 <?php if ($this->session->userdata('notifpanduan') == 0) { ?>
     <div class="modal fade" id="Modalpanduansplash" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog  modal-lg" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title"> Panduan Konsultasi </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-lg-12">
                             <!-- <iframe height="1070px" width="100%" src="<?= base_url('assets/econsulting1.pdf') ?>"></iframe> -->
                             <ol class="list-angka">
                                 <li><b>Konsultasi Pengelolaan Keuangan OPD</b> <br>
                                     Adalah konsultasi terkait pengelolaan keuangan oleh Organisasi Perangkat Daerah yang meliputi:
                                     <ul class="list-aja">
                                         <li>Pengelolaan keuangan OPD</li>
                                         <li>Pengelolaan aset OPD</li>
                                         <li>Tindak lanjut hasil pemeriksaan internal/eksternal</li>
                                         <li>dan sejenisnya</li>
                                     </ul>
                                 </li>
                                 <li><b>Konsultasi Pengelolaan Keuangan Desa/Kelurahan</b>
                                     <ul class="list-aja">
                                         <li>Pengelolaan keuangan OPD</li>
                                         <li>Pengelolaan aset OPD</li>
                                         <li>Tindak lanjut hasil pemeriksaan internal/eksternal</li>
                                         <li>dan sejenisnya</li>
                                     </ul>
                                 </li>
                                 <li><b>Konsultasi Akuntabilitas Kinerja Pemerintah Daerah</b> <br>
                                     Adalah konsultasi terkait perwujudan agenda reformasi birokrasi yang meliputi:
                                     <ul class="list-aja">
                                         <li>SIPP (Sistim Pengendalian Intern Pemerintah)</li>
                                         <li>Zona Integritas</li>
                                         <li>SAKIP (Sistim Akuntabilitas Kinerja Instansi Pemerintah)</li>
                                         <li>LPPD (Laporan Penyelenggaraan Pemerintah Daerah)</li>
                                         <li>EKPPD (Evaluasi Kinerja Penyelenggaraan Pemerintah Daerah)</li>
                                         <li>LKjIP (Laporan Kinerja Instansi Pemerintah)</li>
                                         <li>Audit Kinerja</li>
                                         <li>dan sejenisnya</li>
                                     </ul>
                                 </li>
                                 <li><b>Konsultasi Pencegahan Korupsi dan Penegakan Integritas ASN</b>
                                     <!-- <li><b>Konsultasi Tindak Pidana Korupsi/Gratifikasi</b> -->
                                     <ul class="list-aja">
                                         <li>Pengaduan</li>
                                         <li>Pencegahan tindak pidana korupsi</li>
                                         <li>Gratifikasi</li>
                                         <li>LHKASN (Laporan Harta Kekayaan Aparatur Sipil Negara)</li>
                                         <li>WBS (Whistle Blowing System)</li>
                                         <li>Pendidikan Anti Korupsi</li>
                                         <li>Kasus kepegawaian</li>
                                         <li>dan sejenisnya</li>
                                     </ul>
                                 </li>
                             </ol>

                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <a class="btn head-btn2" data-dismiss="modal">Tutup</a>

                 </div>
             </div>
         </div>
     </div>
 <?php } ?>
 <main>
     <!-- Our Services Start -->
     <div class="our-services" style="background:rgba(31,43,123,0.1);padding-top:50px;padding-bottom:50px">
         <div class="container">
             <!-- Section Tittle -->
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-tittle text-center">
                         <span>Konsultasikan Dengan Kami</span>
                         <h2 style="margin-bottom:50px;">Isi Form Konsultasi</h2>
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
             <form id="formkonsultasi" action="Konsultasi/add_case" method="POST" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col-lg-12 col-md-12">

                         <div class="mt-10">
                             <input type="text" name="judul" placeholder="Judul Konsultasi" required class="single-input">
                         </div>
                         <div class="mt-10" style="font-size:12px;text-indent:20px;color:#506172;">
                             Bingung pilih kategori ? <a href="#" style="color:#fb246a;" data-toggle="modal" data-target="#Modalpanduan"> Klik di sini untuk lihat panduan</a>
                         </div>
                         <div class="input-group-icon mt-10">
                             <div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                             <div class="form-select" id="default-select">
                                 <select id="kategori" name="kategori">
                                     <option value=''>-- Pilih Kategori Konsultasi --</option>

                                     <?php
                                        foreach ($casecat as $cc) {
                                            echo "<option value='" . $cc['id_casecat'] . "'>" . $cc['casecat_name'] . "</option>";
                                        }
                                        ?>

                                 </select>
                             </div>
                         </div>


                         <div class="mt-10">
                             <textarea class="single-textarea" name="isi" placeholder="Isi Konsultasi" required></textarea>
                         </div>
                         <div class="mt-10">
                             <p style="margin-bottom:0;">Lampiran : </p>

                             <input type="file" id="uploadlampiran" name="lampiran" style="display:none;">
                             <label id="btnupload" style="margin-right:20px; padding:20px; margin:5px; font-size:12px " class="btn" for="uploadlampiran"> <i style="color:#FFFFFF;" class="fa fa-paperclip"> </i> Pilih File.. </label>
                             <span id="selected_filename"></span>
                             <br>
                             <input type="file" id="uploadlampiran2" name="lampiran2" style="display:none;">
                             <label id="btnupload2" style="margin-right:20px; padding:20px; margin:5px; font-size:12px; display:none" class="btn" for="uploadlampiran2"> <i style="color:#FFFFFF;" class="fa fa-paperclip"> </i> Pilih File.. </label>
                             <span id="selected_filename2"></span>
                             <br>
                             <input type="file" id="uploadlampiran3" name="lampiran3" style="display:none;">
                             <label id="btnupload3" style="margin-right:20px; padding:20px; margin:5px; font-size:12px; display:none" class="btn" for="uploadlampiran3"> <i style="color:#FFFFFF;" class="fa fa-paperclip"> </i> Pilih File.. </label>
                             <span id="selected_filename3"></span>
                             <p style="font-style: italic; font-size:14px">*) Lampiran harus berformat <span style="color:#fb246a">.pdf</span> dan berukuran maksimal <span style="color:#fb246a">10 mb</span></p>
                         </div>

                     </div>

                 </div>


                 <!-- More Btn -->
                 <!-- Section Button -->
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="browse-btn2 text-center">
                             <button type="submit" class="btn">Kirim</button>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <!-- Our Services End -->


 </main>
 <div class="modal fade" id="Modalkonfirmasikonsul" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content  text-center">
             <h5 style="margin:20px;"> Periksa kembali dan pastikan tidak ada kesalahan kata / kalimat pada konsultasi anda. Apakah anda yakin ingin mengirim konsultasi ? </h5>
             <div class="modal-footer">
                 <a class="btn head-btn2" data-dismiss="modal">Tidak</a>
                 <a class="btn head-btn2">Ya</a>

             </div>
         </div>
     </div>
 </div>
 <?php
    if ($this->session->userdata('notifpanduan') == 0) {
        $temp = $this->session->userdata('notifpanduan');
        $this->session->set_userdata('notifpanduan', $temp + 1);
    }
    ?>