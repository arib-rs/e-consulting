<?php
for ($i = 1; $i <= 12; $i++) {
    echo "<input id='bulan" . $i . "' type='hidden' value=" . $caseperbulan[$i] . " />";
}
?>

<main>


    <!-- Our Services Start -->
    <div class="our-services" style="background:rgba(31,43,123,0.1);padding-top:50px;padding-bottom:50px">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <!-- <span>Periode <?= $tahun ?></span> -->
                        <h2 style="margin-bottom:20px;">Data Analitik</h2>
                    </div>
                </div>
            </div>


        </div>

    </div>


    <!-- Our Services End -->
    <div class="job-listing-area" style="padding-bottom:50px">
        <div class="container">
            <div class="row" style="margin:10px;justify-content: center;align-items: baseline;">
                <h6 style="margin-right:10px">Periode</h6>
                <select id="tahun">
                    <?php
                    foreach ($list_tahun as $d) {
                    ?>
                        <option <?= $tahun == $d['tahun'] ? "selected" : "" ?>><?= $d['tahun']; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>

            <div class="box">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Rekap Bulanan Konsultasi</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-center">
                                <strong>Data Konsultasi Periode <?= $tahun ?></strong>
                            </p>

                            <div class="chart">
                                <!-- Sales Chart Canvas -->
                                <canvas id="salesChart" style="height: 300px;"></canvas>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <p class="text-center">
                                <strong>Total konsultasi : <?= $jumlahcasepertahun ?></strong>
                            </p>
                            <?php

                            foreach ($case_solver as $d) {
                                $persen = $casepersolver[$d['id_user']] / $jumlahcasepertahun * 100;
                            ?>
                                <div class="progress-group mb-20">
                                    <span class="progress-text"><?= $d['fullname'] ?></span>
                                    <span class="progress-number"><?= $casepersolver[$d['id_user']] ?></span>
                                    <div style="color:#777777;font-size:12px">
                                        <?= $d['casecat_name'] ?>
                                    </div>
                                    <div class="progress sm">
                                        <div class="progress-bar" style="width:<?= $persen . '%' ?>; background:#fb246a; "></div>
                                    </div>
                                </div>
                            <?php

                            }
                            ?>

                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6 border-right">
                            <div class="description-block ">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                <h4 style='color:#fb246a;'><?= $jumlahcase ?></h4>
                                <span class="description-header">Total Konsultasi Keseluruhan</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6  border-right">
                            <div class="description-block">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                <h4 class="text-green"><?= $jumlahcaseperhari ?></h4>
                                <span class="description-header">Konsultasi Baru Hari Ini</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6 border-right">
                            <div class="description-block ">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                <h4 class="text-yellow"><?= $jumlahcasesdhditindaklanjuti ?></h4>
                                <span class="description-header">Sudah Ditindaklanjuti Hari Ini</span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block ">
                                <!-- <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span> -->
                                <h4 class="text-red"><?= $jumlahcaseblmditindaklanjuti ?></h4>
                                <span class="description-header">Belum Ditindaklanjuti</span>
                            </div>
                        </div>
                        <!-- /.col -->
                        <!-- <div class="col-sm-3 col-xs-6"> -->
                        <!-- <div class="description-block border-right">
                                        <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                        <h5 class="description-header">$10,390.90</h5>
                                        <span class="description-text">TOTAL COST</span>
                                    </div> -->
                        <!-- /.description-block -->
                        <!-- </div> -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    </div>

    <div class="job-listing-area" style="padding-bottom:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="static-table-list" style="overflow-x:auto;">
                        <table class="table border-table">
                            <thead style="background:ghostwhite">
                                <tr>
                                    <th>No</th>
                                    <th>PIC</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>Mei</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Agu</th>
                                    <th>Sep</th>
                                    <th>Okt</th>
                                    <th>Nov</th>
                                    <th>Des</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                foreach ($case_solver as $d) {

                                    echo "
                                                <tr>
                                                <td>" . $count . "</td>
                                                <td>" . $d['fullname'] . "</td>";

                                    for ($i = 1; $i <= 12; $i++) {
                                        $temp = count($this->M_konsultasi->select_CasePerSolverPerBulan($i, $d['id_user'], $tahun));
                                        echo ($temp != 0) ? "<td style='color:#fb246a;'>" . $temp : "<td> -";
                                        echo "</td>";
                                    }
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>