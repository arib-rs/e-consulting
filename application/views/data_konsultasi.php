<main>
    <!-- Our Services Start -->
    <div class="our-services" style="background:rgba(31,43,123,0.1);padding-top:50px;padding-bottom:50px">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Tracking Data Konsultasi Anda</span>
                        <h2 style="margin-bottom:0px;">Data Konsultasi</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="job-listing-area" style="padding-top:50px;padding-bottom:50px">
        <div class="container">
            <?php
            if (count($case) < 1 && empty($kategori)) {
                if ($this->session->userdata('grup') < 3) {
            ?>
                    <div class="row mb-170" style="text-align:center">
                        <h5 class="col-lg-12 mb-50"> -- Belum ada data konsultasi yang masuk -- </h5>

                    </div>
                <?php } else { ?>
                    <div class="row mb-170" style="text-align:center">
                        <h5 class="col-lg-12 mb-50"> -- Anda belum melakukan konsultasi apapun -- </h5>
                        <div class="col-lg-12">
                            <a class="btn " href="<?= base_url('/konsultasi'); ?>">Mulai Konsultasi</a>
                        </div>

                    </div>
                <?php
                }
            } else {
                ?>
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="small-section-tittle2 text-center">


                                    <h4 style="margin-bottom:10px;"><i class="fa fa-filter"></i> Filter Konsultasi</h4>
                                    <a href="<?= base_url('konsultasi/data') ?>" class="genric-btn danger-border radius small mb-10">Clear Filter</a>
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <form method="GET" action="data">
                            <div class="job-category-listing">
                                <!-- single one -->
                                <div class="single-listing">
                                    <?php if ($this->session->userdata('grup') < 3) { ?>
                                        <div class="select-Categories  mb-30">
                                            <div class="small-section-tittle2">
                                                <h4>Status Konsultasi</h4>
                                            </div>
                                            <label class="container"> Sudah Dijawab
                                                <input type="checkbox" class="radio-checklist" name="s" value=1 <?= ($filterreply == 1) ? "checked" : '' ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container"> Belum Dijawab
                                                <input type="checkbox" class="radio-checklist" name="s" value=2 <?= ($filterreply == 2) ? "checked" : '' ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->userdata('grup') != 2) { ?>
                                        <div class="select-Categories  mb-30">
                                            <div class="small-section-tittle2">
                                                <h4>Kategori Konsultasi</h4>
                                            </div>
                                            <?php foreach ($casecat as $cc) { ?>
                                                <label class="container"><?= $cc['casecat_name'] ?>
                                                    <input type="checkbox" name="k[]" value="<?= $cc['id_casecat'] ?>" <?= in_array($cc['id_casecat'], $kategori) ? "checked" : '' ?>>
                                                    <span class="checkmark"></span>
                                                </label>

                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                    <div class="select-Categories mb-30 ">
                                        <div class="small-section-tittle2">
                                            <h4>Tanggal Konsultasi</h4>
                                        </div>
                                        <label style="margin-bottom:20px">Dari

                                            <div class="input-group" style="font-size:10px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input onkeypress='return false;' type="text" class="form-control float-right" name="f" value="<?= $from ?>" placeholder="dd-mm-yyyy" id="datetimepicker">
                                            </div>
                                        </label>
                                        <label style="margin-bottom:20px">Sampai
                                            <div class="input-group" style="font-size:10px">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                                <input onkeypress='return false;' type="text" class="form-control float-right" name="t" value="<?= $to ?>" placeholder="dd-mm-yyyy" id="datetimepicker2">
                                            </div>
                                        </label>


                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn">Filter</button>
                                    </div>
                                    <!-- select-Categories End -->
                                </div>

                            </div>
                        </form>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <section class="featured-job-area">
                            <div class="container">
                                <!-- Count of Job list Start -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-35">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th width="2%">No</th>
                                                        <th>Konsultasi</th>
                                                        <!-- <th>*</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    foreach ($case as $c) {
                                                        $isReplied = $this->M_konsultasi->is_replied($c['id_case']);
                                                        if ($filterreply != NULL) {

                                                            if ($filterreply != $isReplied) {
                                                                continue;
                                                            }
                                                        }
                                                        // ambil data diskusi
                                                        $q = $this->db
                                                            ->select('*')
                                                            ->from('discussion as d')
                                                            ->join('mst_user as u', 'd.dis_sender = u.id_user', 'left')
                                                            ->where('d.id_case = "' . $c['id_case'] . '"')
                                                            ->where('d.dis_deleted', NULL)
                                                            ->where('d.dis_approve !=', NULL)
                                                            ->order_by('d.dis_date', 'DESC')
                                                            // ->limit(1)
                                                            ->get()
                                                            ->result_array();
                                                        // end
                                                    ?>
                                                        <tr style="color:#666666">
                                                            <td> <?= $count ?></td>
                                                            <td>

                                                                <?php
                                                                $notif = '';
                                                                if ($this->session->userdata('grup') < 2) {
                                                                    $notif = $this->db
                                                                        ->select('*')
                                                                        ->from('discussion')
                                                                        ->where('id_case = "' . $c['id_case'] . '"')
                                                                        ->where('dis_deleted', NULL)
                                                                        ->where('dis_approve', NULL)
                                                                        ->where('dis_rejected', NULL)
                                                                        ->get()
                                                                        ->num_rows();
                                                                } else {
                                                                    $notif = $this->db
                                                                        ->select('*')
                                                                        ->from('discussion')
                                                                        ->where('id_case = "' . $c['id_case'] . '"')
                                                                        ->where('dis_receiver = "' . $this->session->userdata['id_user'] . '"')
                                                                        ->where('dis_deleted', NULL)
                                                                        ->where('dis_read', NULL)
                                                                        ->where('dis_approve !=', NULL)
                                                                        ->get()
                                                                        ->num_rows();
                                                                }
                                                                $notifapproval = '';
                                                                if ($this->session->userdata('grup') < 3) {
                                                                    $approval = $this->db
                                                                        ->select('*')
                                                                        ->from('discussion')
                                                                        ->where('id_case = "' . $c['id_case'] . '"')
                                                                        ->where('dis_sender != "' . $c['case_sender'] . '"')
                                                                        ->where('dis_approve', NULL)
                                                                        ->where('dis_rejected', NULL)
                                                                        ->where('dis_deleted', NULL)
                                                                        ->order_by('dis_date', 'DESC')
                                                                        ->get()
                                                                        ->result_array();
                                                                    if (count($approval) > 0) {
                                                                        if ($approval[0]['dis_rejected'] != NULL) {
                                                                            $notifapproval = 'Dikembalikan : ' . $approval[0]['dis_rejected_note'];
                                                                        } else {
                                                                            $notifapproval = 'Menunggu Approval';
                                                                        }
                                                                    }
                                                                }
                                                                $status = '';
                                                                if ($c['case_status'] == 1 && $this->session->userdata('grup') < 3) {
                                                                    $status = 'Baru';
                                                                }
                                                                ?>
                                                                <a style="color: #fb246a; margin-right:5px" href="<?= base_url('konsultasi/detail/' . $c['id_case']); ?>"><?= $c['case_title'] ?></a>
                                                                <span class="badge badge-success" style="font-size:10px"><?= ($notif != 0) ? $notif : ''; ?></span>
                                                                <span class="badge badge-success" style="font-size:10px;line-height:normal;"><?= $status; ?></span>
                                                                <span class="badge badge-warning" style="font-size:10px;line-height:normal;"><?= $notifapproval; ?></span>
                                                                <?php
                                                                if ($this->session->userdata('grup') < 3) {
                                                                    if ($isReplied == 2) {
                                                                        if ($c['case_status'] == 9) {
                                                                ?>
                                                                            <span class="badge badge-success" style="font-size:10px;line-height:normal;"><i class="fa fa-check"> </i> Selesai</span>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <span class="badge badge-danger" style="font-size:10px;line-height:normal;">Belum Terjawab</span>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>


                                                                <!-- <a href="#" style="padding:5px 5px; line-height:15px;" class="genric-btn info radius"><i class="fa fa-eye"></i> Detail</a> -->
                                                                <!-- <a href="#" style="padding:5px 5px; line-height:15px;" class="genric-btn success radius"><i class="fa fa-check"></i> Approve</a> -->
                                                                <div style=' font-size:14px' class="mb-10">
                                                                    <span>
                                                                        <i class="fa fa-share fa-flip-vertical"></i>
                                                                    </span>

                                                                    <span>

                                                                        <?php
                                                                        $reply = '';
                                                                        if ($c['case_created_at'] == $c['case_last_dis']) {
                                                                            echo '<span class="badge badge-light" style="border:1px solid #cccccc; color:#666666"> 1 </span> ';
                                                                            $reply = $c['case'];
                                                                        } else {
                                                                            $urutan = count($q) + 1;
                                                                            echo '<span class="badge badge-light" style="border:1px solid #cccccc; color:#666666""> ' . $urutan . ' </span> ';
                                                                            $reply = $q[0]['dis_reply'];
                                                                        }
                                                                        if (strlen($c['case']) > 50) {
                                                                            echo substr($reply, 0, 50) . '...';
                                                                        } else {
                                                                            echo $reply;
                                                                        }
                                                                        ?>
                                                                    </span>

                                                                </div>
                                                                <div style=' font-size:12px'>
                                                                    <?= $c['casecat_name'] ?>
                                                                    <?php if ($this->session->userdata('grup') < 3) { ?>
                                                                        <a href="#" style="color:#fb246a" data-toggle="modal" data-target="#ModalUbahKategori<?= $c['id_case'] ?>"><i class="fa fa-pencil-square"></i></a>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php
                                                                if ($c['case_created_at'] == $c['case_last_dis']) {
                                                                ?>
                                                                    <div style='font-size:12px'>
                                                                        <?php
                                                                        $sender = '';
                                                                        $skpd = '';
                                                                        if (empty($c['fullname'])) {
                                                                            $url = 'http://apikey.sidoarjokab.go.id/api/pegawai/' . $c['case_sender'];
                                                                            $result = @file_get_contents($url);
                                                                            $apipegawai = json_decode($result);
                                                                            if (isset($apipegawai->nama)) {
                                                                                $sender = $apipegawai->gelar_depan . ' ' . $apipegawai->nama . ' ' . $apipegawai->gelar_belakang . ' ';
                                                                                $skpd = ' (' . ucwords(strtolower($apipegawai->satuan_kerja)) . ') ';
                                                                            } else {
                                                                                $url = 'http://apikey.sidoarjokab.go.id/api/skpd/kode/' . $c['case_sender'];
                                                                                $result = @file_get_contents($url);
                                                                                $api = json_decode($result);
                                                                                $sender = 'Admin ' . $api->nama;
                                                                                $skpd = '';
                                                                            }
                                                                        } else {
                                                                            $isopd = ($c['user_group'] == 3) ? ' Admin ' : '';
                                                                            $sender = $isopd . ' ' . $c['fullname'];
                                                                        }
                                                                        ?>
                                                                        <?= '<i class="fa fa-calendar"></i> ' . $hari[date("w", strtotime($c['case_created_at']))] . ', ' . date("d-m-Y H:i", strtotime($c['case_created_at'])) . ' -- Dikirim oleh <b> ' . $sender . ' </b> ' . $skpd  ?>
                                                                    </div>
                                                                <?php
                                                                } else {

                                                                ?>
                                                                    <div style='font-size:12px'>
                                                                        <?php
                                                                        $sender = '';
                                                                        $skpd = '';
                                                                        if (empty($q[0]['fullname'])) {
                                                                            $url = 'http://apikey.sidoarjokab.go.id/api/pegawai/' . $q[0]['dis_sender'];
                                                                            $result = @file_get_contents($url);
                                                                            $apipegawai = json_decode($result);
                                                                            if (isset($apipegawai->nama)) {
                                                                                $sender = $apipegawai->gelar_depan . ' ' . $apipegawai->nama . ' ' . $apipegawai->gelar_belakang . ' ';
                                                                                $skpd = ' (' . ucwords(strtolower($apipegawai->satuan_kerja)) . ') ';
                                                                            } else {
                                                                                $url = 'http://apikey.sidoarjokab.go.id/api/skpd/kode/' . $q[0]['dis_sender'];
                                                                                $result = @file_get_contents($url);
                                                                                $api = json_decode($result);
                                                                                $sender = 'Admin ' . $api->nama;
                                                                                $skpd = '';
                                                                            }
                                                                        } else {
                                                                            $isopd = ($q[0]['user_group'] == 3) ? ' Admin ' : '';
                                                                            $sender = $isopd . ' ' . $q[0]['fullname'];
                                                                        }
                                                                        ?>


                                                                        <?= ' <i class="fa fa-calendar"></i> ' . $hari[date("w", strtotime($q[0]['dis_date']))] . ', ' . date("d-m-Y H:i", strtotime($q[0]['dis_date'])) . ' -- Direspon terakhir oleh <b>' . $sender . ' </b> ' . $skpd ?>
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <!-- <td style="width:44%">
                                                                <a href="#" style="padding:3px 5px; line-height:15px;" class="genric-btn info radius"><i class="fa fa-eye"></i> Detail</a>
                                                                <a href="#" style="padding:3px 5px; line-height:15px;" class="genric-btn info radius"><i class="fa fa-check"></i> Detail</a>
                                                            </td> -->
                                                        </tr>
                                                    <?php
                                                        $count++;
                                                    }
                                                    ?>

                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Count of Job list End -->
                                <!-- single-job-content -->

                            </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Our Services End -->


</main>

<!-- Modal -->
<?php foreach ($case as $c) { ?>
    <div class="modal fade" id="ModalUbahKategori<?= $c['id_case'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Kategori Konsultasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="update_casecat" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group-icon mt-10">
                                    <div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                                    <div class="form-select" id="default-select">
                                        <select name="kategori" required>
                                            <option value=''>-- Pilih Kategori Konsultasi --</option>

                                            <?php
                                            foreach ($casecat as $cc) {
                                                echo "<option value='" . $cc['id_casecat'] . "'>" . $cc['casecat_name'] . "</option>";
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id_case" value="<?= $c['id_case'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn head-btn2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn head-btn1">Simpan</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }


?>