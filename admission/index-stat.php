<?php
require_once 'config/settings.config.php';
include_once('../spk/word.php');
require_once "config/function.php";
require_once '../spk/word.php';
include_once("config/stat.inc.php");
$spkObject = new spk();
// $spkObject->spkHeader();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <title>ระบบรับนักเรียน ห้องเรียนปกติ ปีการศึกษา 2563</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='../../../Font-Awesome/css/all.css'>
    <script src='../../../js/jquery-3.3.1.min.js'></script>
    <script src='../../../js/popper.min.js'></script>
    <script src='../../../bootstrap/dist/js/bootstrap.min.js'></script>
    <link rel='stylesheet' type='text/css' href='css/app_css.css'>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center text-center">
        <h1 class="text-center" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">โรงเรียนสตรีภูเก็ต</h1>
        <div class='h3 text-center'>ระบบรับสมัครนักเรียนประจำ <?php echo $strEducationYear ?></div>
        <div class='h3 text-center'>ประเภทห้องเรียนทั่วไป</div>

        <div>
            <hr>
            <h3 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">ขั้นตอนการสมัครออนไลน์ <i class="fas fa-list-ol"></i></h3>
        </div>
        <div class="row ">
            <div class="col-md-6 border border-primary bg-white mt-2">
                <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">1. ตรวจสอบรายละเอียดผู้สมัคร</h5>
                <p><?php echo $strAdmissionRegStep1 ?></p>
            </div>
            <div class="col-md-5 border border-primary bg-white offset-md-1 mt-2 ">
                <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 2. กรอกใบสมัคร</h5>
                <p><?php echo $strAdmissionRegStep2 ?></p>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-6 border border-primary bg-white mt-1">
                <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">3. พิมพ์แบบฟอร์มชำระเงิน </h5>
                <p><?php echo $strAdmissionRegStep3 ?></p>
            </div>
            <div class="col-md-5 border border-primary bg-white offset-md-1 mt-2">
                <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 4. ตรวจสอบรายชื่อผู้มีสิทธิ์สอบและพิมพ์บัตรประจำตัวผู้สอบ</h5>
                <p><?php echo $strAdmissionRegStep4 ?></p>
            </div>
        </div>

        <?php
        // checkTimeToPrintCard
        $tmp_print = strtotime("now");
        $timeStrat = strtotime($Print_Card_Start_General);

        ?>

        <div class="h3 pt-4">
            <hr>
            <p style="color:#043c96;text-shadow: 2px 2px 4px #000000;">สมัครออนไลน์ <i class="far fa-hand-point-right"></i></p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="btn-group-vertical">
                    <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 1</a>
                    <a class="btn btn-success" href="registrationM1" role="button">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 1</a>
                    <a class="btn btn-success" href="registrationM1/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 1 </a>
                    <!-- <a class="btn btn-success" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
                    <a class="btn btn-success" href="print" role="button">พิมพ์ใบชำระเงิน</a>
                    <?php
                    if ($tmp_print >  $timeStrat) {
                        echo "<a class='btn btn-success' href='registrationM1/find_card.php' role='button'>พิมพ์บัตรประจำตัวผู้สอบ </a>";
                    } else {
                        echo "<a class='btn btn-success' href='#' role='button'>พิมพ์บัตรประจำตัวผู้สอบ</a>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-6">
                <div class="btn-group-vertical">
                    <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 4</>
                        <a class="btn btn-warning" href="registrationM4" role="button">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 4</a>
                        <a class="btn btn-warning" href="registrationM4/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 4 </a>
                        <!-- <a class="btn btn-warning" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
                        <a class="btn btn-warning" href="print" role="button">พิมพ์ใบชำระเงิน</a>
                        <?php
                        if ($tmp_print >  $timeStrat) {
                            echo "<a class='btn btn-warning' href='registrationM4/find_card.php' role='button'>พิมพ์บัตรประจำตัวผู้สอบ</a>";
                        } else {
                            echo "<a class='btn btn-warning' href='#' role='button'>พิมพ์บัตรประจำตัวผู้สอบ</a>";
                        }
                        ?>



                </div>
            </div>
        </div>

        <div class="pt-4 pb-4">
            <hr>
            <p class="h3" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">รายงานรับสมัครออนไลน์ <i class="fas fa-chart-pie"></i></p>
            <div>
                <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 1</p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>แผนการรับ</th>
                            <th colspan="3" class="text-center bg-warning">9 มีนาคม 65</th>
                            <th colspan="3" class="text-center">10 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-warning">11 มีนาคม 65</th>
                            <th colspan="3" class="text-center">12 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-warning">13 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-success">รวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="bg-warning">ในเขต</td>
                            <td class="bg-warning">นอกเขต</td>
                            <td class="bg-warning">รวม</td>
                            <td>ในเขต</td>
                            <td>นอกเขต</td>
                            <td>รวม</td>
                            <td class="bg-warning">ในเขต</td>
                            <td class="bg-warning">นอกเขต</td>
                            <td class="bg-warning">รวม</td>
                            <td>ในเขต</td>
                            <td>นอกเขต</td>
                            <td>รวม</td>
                            <td class="bg-warning">ในเขต</td>
                            <td class="bg-warning">นอกเขต</td>
                            <td class="bg-warning">รวม</td>
                            <td class="bg-success">ในเขต</td>
                            <td class="bg-success">นอกเขต</td>
                            <td class="bg-success">รวม</td>

                        </tr>
                        <tr>
                            <td>ทั่วไป</td>
                            <td class="bg-warning"><?php echo $m1_in_03 ?></td>
                            <td class="bg-warning"> <?php echo $m1_out_03 ?></td>
                            <td class="bg-warning"> <?php echo $m1_in_03 + $m1_out_03 ?></td>
                            <td><?php echo $m1_in_04 ?></td>
                            <td><?php echo $m1_out_04 ?></td>
                            <td><?php echo $m1_in_04 + $m1_out_04 ?></td>
                            <td class="bg-warning"><?php echo $m1_in_05 ?></td>
                            <td class="bg-warning"><?php echo $m1_out_05 ?></td>
                            <td class="bg-warning"><?php echo $m1_in_05 + $m1_out_05 ?></td>
                            <td><?php echo $m1_in_06 ?></td>
                            <td><?php echo $m1_out_06 ?></td>
                            <td><?php echo $m1_in_06 + $m1_out_06 ?></td>
                            <td class="bg-warning"><?php echo $m1_in_07 ?></td>
                            <td class="bg-warning"><?php echo $m1_out_07 ?></td>
                            <td class="bg-warning"><?php echo $m1_in_07 + $m1_out_07 ?></td>
                            <td class="bg-success"><?php echo $total_m1_in ?></td>
                            <td class="bg-success"><?php echo $total_m1_out ?></td>
                            <td class="bg-success"><?php echo $total_m1_in + $total_m1_out ?></td>

                        </tr>


                    </tbody>
                </table>

                <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 4</p>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>แผนการรับ</th>
                            <th colspan="3" class="text-center bg-warning">9 มีนาคม 65</th>
                            <th colspan="3" class="text-center">10 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-warning">11 มีนาคม 65</th>
                            <th colspan="3" class="text-center">12 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-warning">13 มีนาคม 65</th>
                            <th colspan="3" class="text-center bg-success">รวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td class="bg-warning">ม.3 รร.เดิม</td>
                            <td class="bg-warning">ม.3 รร.อื่น</td>
                            <td class="bg-warning">รวม</td>
                            <td>ม.3 รร.เดิม</td>
                            <td>ม.3 รร.อื่น</td>
                            <td>รวม</td>
                            <td class="bg-warning">ม.3 รร.เดิม</td>
                            <td class="bg-warning">ม.3 รร.อื่น</td>
                            <td class="bg-warning">รวม</td>
                            <td>ม.3 รร.เดิม</td>
                            <td>ม.3 รร.อื่น</td>
                            <td>รวม</td>
                            <td class="bg-warning">ม.3 รร.เดิม</td>
                            <td class="bg-warning">ม.3 รร.อื่น</td>
                            <td class="bg-warning">รวม</td>
                            <td class="bg-success">ม.3 รร.เดิม</td>
                            <td class="bg-success">ม.3 รร.อื่น</td>
                            <td class="bg-success">รวม</td>

                        </tr>
                        <tr>
                            <td>ทั่วไป</td>
                            <td class="bg-warning"><?php echo $m4_in_03 ?></td>
                            <td class="bg-warning"> <?php echo $m4_out_03 ?></td>
                            <td class="bg-warning"> <?php echo $m4_in_03 + $m4_out_03 ?></td>
                            <td><?php echo $m4_in_04 ?></td>
                            <td><?php echo $m4_out_04 ?></td>
                            <td><?php echo $m4_in_04 + $m4_out_04 ?></td>
                            <td class="bg-warning"><?php echo $m4_in_05 ?></td>
                            <td class="bg-warning"><?php echo $m4_out_05 ?></td>
                            <td class="bg-warning"><?php echo $m4_in_05 + $m4_out_05 ?></td>
                            <td><?php echo $m4_in_06 ?></td>
                            <td><?php echo $m4_out_06 ?></td>
                            <td><?php echo $m4_in_06 + $m4_out_06 ?></td>
                            <td class="bg-warning"><?php echo $m4_in_07 ?></td>
                            <td class="bg-warning"><?php echo $m4_out_07 ?></td>
                            <td class="bg-warning"><?php echo $m4_in_07 + $m4_out_07 ?></td>
                            <td class="bg-success"><?php echo $total_m4_in ?></td>
                            <td class="bg-success"><?php echo $total_m4_out ?></td>
                            <td class="bg-success"><?php echo $total_m4_in + $total_m4_out ?></td>

                        </tr>


                    </tbody>
                </table>
            </div>
            <div>
                <p class="h3" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">สถิติ</p>
                <ul>
                    <li><a href="#">ชั้นมัธยมศึกษาปีที่ 1</a></li>
                    <li><a href="#">ชั้นมัธยมศึกษาปีที่ 4</a></li>
                </ul>
            </div>
        </div>
    </div> <!-- container  -->
    <?php
    $spkObject->spkFooter();
    ?>


</body>

</html>