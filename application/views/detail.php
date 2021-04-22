<main>


    <!-- Our Services Start -->
    <div class="our-services" style="background:rgba(31,43,123,0.1);padding-top:50px;padding-bottom:50px">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Detail Konsultasi</span>
                        <h2 style="margin-bottom:0px;"> <?= $case[0]['case_title']; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services End -->
    <div class="job-listing-area" style="padding-top:50px;padding-bottom:50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($this->session->flashdata('flash')) {
                        echo $this->session->flashdata('flash');
                    }  ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <blockquote class="generic-blockquote">
                        <div>
                            <?= nl2br($case[0]['case']);  ?>
                        </div>

                        <div class="mt-20 row">
                            <?php
                            if (empty($case[0]['case_att']) && empty($case[0]['case_att_2']) && empty($case[0]['case_att_3'])) {
                            } else {
                            ?>
                                <div class="col-lg-12 mt-10">
                                    <span style="font-size:12px"><i style="color:#666666;" class="fa fa-paperclip"></i> Lampiran : </span>
                                    <?php
                                    if (!empty($case[0]['case_att'])) {
                                    ?>
                                        <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $case[0]['case_att']; ?>"><?= $case[0]['case_att_filename']; ?></a>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (!empty($case[0]['case_att_2'])) {
                                    ?>
                                        <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $case[0]['case_att_2']; ?>"><?= $case[0]['case_att_filename_2']; ?></a>
                                    <?php
                                    }
                                    ?>
                                    <?php
                                    if (!empty($case[0]['case_att_3'])) {
                                    ?>
                                        <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $case[0]['case_att_3']; ?>"><?= $case[0]['case_att_filename_3']; ?></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <span class="col-lg-12  mt-10" style='font-size:12px; color:#666666; '>
                                <?php
                                $sender = '';
                                $skpd = '';
                                if (empty($case[0]['fullname'])) {
                                    $url = 'http://apikey.sidoarjokab.go.id/api/pegawai/' . $case[0]['case_sender'];
                                    $result = @file_get_contents($url);
                                    $apipegawai = json_decode($result);
                                    if (isset($apipegawai->nama)) {
                                        $sender = $apipegawai->gelar_depan . ' ' . $apipegawai->nama . ' ' . $apipegawai->gelar_belakang . ' ';
                                        $skpd = ' (' . ucwords(strtolower($apipegawai->satuan_kerja)) . ') ';
                                    } else {
                                        $url = 'http://apikey.sidoarjokab.go.id/api/skpd/kode/' . $case[0]['case_sender'];
                                        $result = @file_get_contents($url);
                                        $api = json_decode($result);
                                        $sender = 'Admin ' . $api->nama;
                                        $skpd = '';
                                    }
                                } else {
                                    $isopd = ($case[0]['user_group'] == 3) ? ' Admin ' : '';
                                    $sender = $isopd . ' ' . $case[0]['fullname'];
                                }
                                ?>

                                <?= ' <i class="fa fa-calendar"></i> ' . $hari[date("w", strtotime($case[0]['case_created_at']))] . ', ' . date("d-m-Y H:i", strtotime($case[0]['case_created_at'])) . ' -- Dikirim oleh <b>' . $sender . ' </b> ' . $skpd  ?>
                            </span>
                            <!-- <span class="col-lg-3" style=" margin-top:15px;">
                            <button class="genric-btn default radius small" style="padding:0 10px"><i class="fa fa-pencil-square"></i> Ubah Kategori</button>
                            </span> -->


                        </div>

                    </blockquote>
                    <?php
                    foreach ($diskusi as $d) {
                    ?>

                        <blockquote class="generic-blockquote" <?= ($d['dis_sender'] != $d['case_sender']) ? "style='border-left:#fb246a double 4px; margin-left:10px; ' " : ''; ?>>

                            <div>
                                <?= nl2br($d['dis_reply']);  ?>
                            </div>

                            <div class="mt-20 row">
                                <?php
                                if (empty($d['dis_att']) && empty($d['dis_att_2']) && empty($d['dis_att_3'])) {
                                } else {
                                ?>
                                    <div class="col-lg-12 mt-10">
                                        <span style="font-size:12px"><i style="color:#666666;" class="fa fa-paperclip"></i> Lampiran : </span>
                                        <?php
                                        if (!empty($d['dis_att'])) {
                                        ?>
                                            <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $d['dis_att']; ?>"><?= $d['dis_att_filename']; ?></a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($d['dis_att_2'])) {
                                        ?>
                                            <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $d['dis_att_2']; ?>"><?= $d['dis_att_filename_2']; ?></a>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (!empty($d['dis_att_3'])) {
                                        ?>
                                            <a target="_blank" class="genric-btn info-border radius small" href="<?= base_url('upload/') . $d['dis_att_3']; ?>"><?= $d['dis_att_filename_3']; ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php } ?>


                                <span class="<?= ($d['dis_approve'] == NULL) ? 'col-lg-7' : 'col-lg-12'  ?> mt-10" style='font-size:12px; color:#666666; '>
                                    <?php
                                    $sender = '';
                                    $skpd = '';
                                    if (empty($d['fullname'])) {
                                        $url = 'http://apikey.sidoarjokab.go.id/api/pegawai/' . $d['dis_sender'];
                                        $result = @file_get_contents($url);
                                        $apipegawai = json_decode($result);
                                        if (isset($apipegawai->nama)) {
                                            $sender = $apipegawai->gelar_depan . ' ' . $apipegawai->nama . ' ' . $apipegawai->gelar_belakang . ' ';
                                            $skpd = ' (' . ucwords(strtolower($apipegawai->satuan_kerja)) . ') ';
                                        } else {
                                            $url = 'http://apikey.sidoarjokab.go.id/api/skpd/kode/' . $d['dis_sender'];
                                            $result = @file_get_contents($url);
                                            $api = json_decode($result);
                                            $sender = 'Admin ' . $api->nama;
                                            $skpd = '';
                                        }
                                    } else {
                                        $isopd = ($d['user_group'] == 3) ? ' Admin ' : '';
                                        $sender = $isopd . ' ' . $d['fullname'];
                                    }
                                    ?>

                                    <?= ' <i class="fa fa-calendar"></i> ' . $hari[date("w", strtotime($d['dis_date']))] . ', ' . date("d-m-Y H:i", strtotime($d['dis_date'])) . ' -- Dikirim oleh <b>' . $sender . ' </b> ' . $skpd ?>
                                </span>
                                <?php
                                // if ($d['dis_sender'] != $d['case_sender']) {
                                if ($d['dis_approve'] == NULL && $d['dis_rejected'] == NULL) {
                                    if ($this->session->userdata('grup') == 1) {
                                ?>
                                        <span class="col-lg-5" style=" margin-top:5px;">

                                            <form method="POST" action="../approve">
                                                <input type="hidden" name="id_case" value="<?= $d['id_case'] ?>">
                                                <input type="hidden" name="id" value="<?= $d['id_dis'] ?>">
                                                <button type="submit" class="genric-btn primary-border radius small" style="padding:0 10px"><i class="fa fa-check"></i> Approve</button>
                                                <button onclick="return false;" data-toggle="modal" data-target="#Modaltolak<?= $d['id_dis'] ?>" class="genric-btn danger-border radius small" style="padding:0 10px"><i class="fa fa-times"></i> Kembalikan</button>
                                            </form>
                                        </span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="col-lg-5" style=" margin-top:5px;">
                                            <span style='font-size:12px;  color:#666666;'>
                                                <i class="fa fa-exclamation-circle"> </i> Menunggu Approval
                                            </span>
                                            <form method="POST" action="../del_dis" style="display:inline-block">
                                                <input type="hidden" name="id_case" value="<?= $d['id_case'] ?>">
                                                <input type="hidden" name="id" value="<?= $d['id_dis'] ?>">
                                                <button type="submit" class="genric-btn default radius small" style="padding:0 10px"><i class="fa fa-trash"></i> Hapus</button>
                                            </form>

                                        </span>
                                        <?php
                                    }
                                } else {
                                    if ($this->session->userdata('grup') < 3) {
                                        if ($d['dis_approve'] != NULL) {
                                        ?>
                                            <!-- <span class="col-lg-3" style=" margin-top:15px;">
                                                <span style='font-size:12px;  color:#666666;'>
                                                    <i class="fa fa-check"> </i> Telah disetujui
                                                </span>
                                            </span> -->
                                        <?php
                                        }
                                        if ($d['dis_rejected'] != NULL) {
                                        ?>
                                            <span class="col-lg-5" style=" margin-top:5px;">
                                                <span style='font-size:12px;  color:#666666;'>
                                                    <i class="fa fa-times"> </i> Dikembalikan : <?= $d['dis_rejected_note'] ?>
                                                </span>
                                            </span>
                                <?php
                                        }
                                    }
                                }
                                // }
                                ?>

                            </div>

                        </blockquote>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <?php
            // if ($this->session->userdata('grup') > 1) {
            if ($case[0]['case_status'] != 9) {
            ?>
                <form action="../add_dis" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mt-10">
                                <textarea class="single-textarea" name="isi" placeholder="Ketik di sini untuk membalas pesan.." required></textarea>
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
                            <input type="hidden" name="id_case" value="<?= $case[0]['id_case'] ?>">
                            <input type="hidden" name="case_sender" value="<?= $case[0]['case_sender'] ?>">
                            <input type="hidden" name="receiver" value="<?= $this->session->userdata('grup') > 2 ? $case[0]['case_solver'] : $case[0]['case_sender']; ?>">
                        </div>
                    </div>
                    <!-- More Btn -->
                    <!-- Section Button -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="browse-btn2 text-right">
                                <button type="submit" class="btn">Kirim</button>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="text-right">
                                <a href="<?= base_url() ?>/konsultasi/markdone/<?= $case[0]['id_case'] ?>" onclick="return confirm('Tandai bahwa konsultasi selesai ?')" style="color:#212529;font-size:10pt;text-decoration:underline"><i style="color:green;text-decoration:underline" class="fa fa-check"> </i> Tandai Konsultasi Selesai</a>
                            </div>

                        </div>
                    </div>
                </form>
            <?php
            } else { ?>
                <div class="text-center">
                    <p><i style="color:green;" class="fa fa-check"> </i> Konsultasi Selesai.</p>
                </div>
            <?php }
            // } else { 
            ?>
            <!-- <div style="margin-bottom:150px;"></div> -->
            <?php
            // } 
            ?>

        </div>
    </div>

</main>

<?php
foreach ($diskusi as $d) {
?>
    <div class="modal fade" id="Modaltolak<?= $d['id_dis'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Isikan alasan dikembalikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../tolak" method="POST">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-12">

                                <div class="mt-10">
                                    <input type="text" name="rejectnote" placeholder="Alasan penolakan" required class="single-input">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $d['id_dis'] ?>">
                            <input type="hidden" name="id_case" value="<?= $d['id_case'] ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn head-btn2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn head-btn1">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>