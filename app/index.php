<?php
include_once('../spk/word.php');
include("../config/stat.inc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>โรงเรียนสตรีภูเก็ต</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <main role="main">
        <div class="container">
            <h1 class="text-center">โรงเรียนสตรีภูเก็ต</h1>
            <h2 class="text-center">ระบบรับนักเรียน โครงการพิเศษ <?php echo $strEducationYear ?> </h2>
            <hr>
            <h3>ประกาศโรงเรียนสตรีภูเก็ต เรื่อง การรับสมัครนักเรียนเข้าเรียน โครงการพิเศษ </h3>
            <br>
            <ul>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank">ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a></li>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank">ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></li>
            </ul>

            <br>

            <h2 class="card text-center text-white bg-info">ขั้นตอนการสมัครออนไลน์</h2>

            <div class="card-deck">

                <div class="card text-center text-white bg-info">
                    <div class="card-header">
                        1. ตรวจสอบคุณสมบัติ
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $strStep1 ?></h5>
                    </div>
                </div>

                <div class="card text-center text-white bg-info">
                    <div class="card-header">
                        2. กรอกใบสมัคร
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $strStep2 ?></h5>
                    </div>
                </div>

                <div class="card text-center text-white bg-info">
                    <div class="card-header">
                        3. พิมพ์แบบฟอร์มชำระเงิน
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $strStep3 ?></h5>
                    </div>
                </div>

                <div class="card text-center text-white bg-info">
                    <div class="card-header">
                        4. ตรวจสอบรายชื่อผู้สมัครพร้อมพิมพ์บัตรประจำตัวผู้สอบ
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $strStep4 ?></h5>
                    </div>
                </div>


            </div>
            <br>
            <hr>
            <div class="text-white text-center bg-info  pt-2 pb-2">
                <h2><i class="fas fa-sign-in-alt"></i> สมัครสอบ</h2>
            </div>
            <p></p>
            <!-- สมัครออนไลน์ -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            โครงการ SMTE มัธยมศึกษาปีที่ 1
                        </div>
                        <div class="card-body">
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                            <p class="card-text"><a href="m1_smte" class="btn btn-secondary" target="_blank">สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 1 </a></p>
                           <p class="card-text"><a href="m1_smte/find_bill.php" class="btn btn-secondary"> พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ</a></p>
                            <p class="card-text"><a href="m1_smte/student_list.php" class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 1 </a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            โครงการ SMTE มัธยมศึกษาปีที่ 4
                        </div>
                        <div class="card-body">
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                            <p class="card-text"><a href="m4_smte" class="btn btn-secondary" target="_blank">สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 4 </a></p>
                           <p class="card-text"><a href="m4_smte/find_bill.php" class="btn btn-secondary">พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ </a></p>
                            
                            <p class="card-text"><a href="m4_smte/student_list.php" class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 4 </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card text-center text-white bg-primary">
                        <div class="card-header">
                            โครงการ IP มัธยมศึกษาปีที่ 1
                        </div>
                        <div class="card-body">
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                            <p class="card-text"><a href="m1_ip" class="btn btn-secondary" target="_blank">สมัคร โครงการ IP มัธยมศึกษาปีที่ 1 </a></p>
                           <p class="card-text"><a href="m1_ip/find_bill.php" class="btn btn-secondary">พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ </a></p>
                            <p class="card-text"><a href="m1_ip/student_list.php" class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ IP มัธยมศึกษาปีที่ 1 </a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card text-center text-white bg-primary">
                        <div class="card-header">
                            โครงการ IP มัธยมศึกษาปีที่ 4
                        </div>
                        <div class="card-body">

                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2565/2565_pracas_rub.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                            <p class="card-text"><a href="m4_ip" class="btn btn-secondary" target="_blank">สมัคร โครงการ IP มัธยมศึกษาปีที่ 4 </a></p>
                            <p class="card-text"><a href="m4_ip/find_bill.php" class="btn btn-secondary">พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ </a></p>
                            <p class="card-text"><a href="m4_ip/student_list.php" class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ IP มัธยมศึกษาปีที่ 4 </a></p>
                        </div>
                    </div>
                </div>
            </div>




            <div class="text-white text-center bg-info mt-5 pt-4 pb-4  b-4">
                <h2><i class="fas fa-chart-pie"></i> รายงาน การรับสมัครนักเรียนเข้าเรียน โครงการพิเศษ</h2>
            </div>
            <div class="mt-5">
                <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 1</p>
                <table class="table  table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>แผนการรับ</th>
                            <th colspan="3" class="text-center bg-warning">19 ก.พ. 65</th>
                            <th colspan="3" class="text-center">20 ก.พ. 65</th>
                            <th colspan="3" class="text-center bg-warning">21 ก.พ. 65</th>
                            <th colspan="3" class="text-center">22 ก.พ. 65</th>
                            <th colspan="3" class="text-center bg-warning">23 ก.พ. 65</th>
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
                            <td>วิทยาศาสตร์-คณิตศาสตร์-สิ่งแวดล้อม</td>
                            <td class="bg-warning"><?php echo $m1_smte_in_day1 ?></td>
                            <td class="bg-warning"> <?php echo $m1_smte_out_day1 ?></td>
                            <td class="bg-warning"> <?php echo $m1_smte_in_day1 + $m1_smte_out_day1 ?></td>
                            <td><?php echo $m1_smte_in_day2 ?></td>
                            <td><?php echo $m1_smte_out_day2 ?></td>
                            <td><?php echo $m1_smte_in_day2 + $m1_smte_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_in_day3 + $m1_smte_out_day3 ?></td>
                            <td><?php echo $m1_smte_in_day4 ?></td>
                            <td><?php echo $m1_smte_out_day4 ?></td>
                            <td><?php echo $m1_smte_in_day4 + $m1_smte_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_smte_in_day5 + $m1_smte_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m1_s_in ?></td>
                            <td class="bg-success"><?php echo $total_m1_s_out ?></td>
                            <td class="bg-success"><?php echo $total_m1_s_in + $total_m1_s_out ?></td>

                        </tr>
                        <tr>
                            <td>Education HUB</td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day1 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_out_day1 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day1 + $m1_ip2_out_day1 ?></td>
                            <td><?php echo $m1_ip2_in_day2 ?></td>
                            <td><?php echo $m1_ip2_out_day2 ?></td>
                            <td><?php echo $m1_ip2_in_day2 + $m1_ip2_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day3 + $m1_ip2_out_day3 ?></td>
                            <td><?php echo $m1_ip2_in_day4 ?></td>
                            <td><?php echo $m1_ip2_out_day4 ?></td>
                            <td><?php echo $m1_ip2_in_day4 + $m1_ip2_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip2_in_day5 + $m1_ip2_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip2_in ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip2_out ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip2_in + $total_m1_ip2_out ?></td>
                        </tr>
                        <tr>
                            <td>Cambridge</td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day1 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_out_day1 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day1 + $m1_ip4_out_day1 ?></td>
                            <td><?php echo $m1_ip4_in_day2 ?></td>
                            <td><?php echo $m1_ip4_out_day2 ?></td>
                            <td><?php echo $m1_ip4_in_day2 + $m1_ip4_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day3 + $m1_ip4_out_day3 ?></td>
                            <td><?php echo $m1_ip4_in_day4 ?></td>
                            <td><?php echo $m1_ip4_out_day4 ?></td>
                            <td><?php echo $m1_ip4_in_day4 + $m1_ip4_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m1_ip4_in_day5 + $m1_ip4_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip4_in ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip4_out ?></td>
                            <td class="bg-success"><?php echo $total_m1_ip4_in + $total_m1_ip4_out ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="h3 bg-primary text-center">
                ชั้นมัธยมศึกษาปีที่ 4
                </div>
            <div class="" >
                

                <table class="table   table-responsive table-bordered">
                    <thead>
                        <tr>
                            <th>แผนการรับ</th>
                            <th colspan="3" class="text-center bg-warning">19 ก.พ. 65</th>
                            <th colspan="3" class="text-center">20 ก.พ. 65</th>
                            <th colspan="3" class="text-center bg-warning">21 ก.พ. 65</th>
                            <th colspan="3" class="text-center">22 ก.พ. 65</th>
                            <th colspan="3" class="text-center bg-warning">23 ก.พ. 65</th>
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
                            <td>วิทยาศาสตร์-คณิตศาสตร์-สิ่งแวดล้อม</td>
                            <td class="bg-warning"><?php echo $m4_smte_in_day1 ?></td>
                            <td class="bg-warning"> <?php echo $m4_smte_out_day1 ?></td>
                            <td class="bg-warning"> <?php echo $m4_smte_in_day1 + $m4_smte_out_day1 ?></td>
                            <td><?php echo $m4_smte_in_day2 ?></td>
                            <td><?php echo $m4_smte_out_day2 ?></td>
                            <td><?php echo $m4_smte_in_day2 + $m4_smte_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_in_day3 + $m4_smte_out_day3 ?></td>
                            <td><?php echo $m4_smte_in_day4 ?></td>
                            <td><?php echo $m4_smte_out_day4 ?></td>
                            <td><?php echo $m4_smte_in_day4 + $m4_smte_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_smte_in_day5 + $m4_smte_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m4_s_in ?></td>
                            <td class="bg-success"><?php echo $total_m4_s_out ?></td>
                            <td class="bg-success"><?php echo $total_m4_s_in + $total_m4_s_out ?></td>

                        </tr>
                        <tr>
                            <td>Education HUB</td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day1 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_out_day1 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day1 + $m4_ip2_out_day1 ?></td>
                            <td><?php echo $m4_ip2_in_day2 ?></td>
                            <td><?php echo $m4_ip2_out_day2 ?></td>
                            <td><?php echo $m4_ip2_in_day2 + $m4_ip2_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day3 + $m4_ip2_out_day3 ?></td>
                            <td><?php echo $m4_ip2_in_day4 ?></td>
                            <td><?php echo $m4_ip2_out_day4 ?></td>
                            <td><?php echo $m4_ip2_in_day4 + $m4_ip2_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip2_in_day5 + $m4_ip2_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip2_in ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip2_out ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip2_in + $total_m4_ip2_out ?></td>
                        </tr>
                        <tr>
                            <td>Cambridge</td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day1 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_out_day1 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day1 + $m4_ip4_out_day1 ?></td>
                            <td><?php echo $m4_ip4_in_day2 ?></td>
                            <td><?php echo $m4_ip4_out_day2 ?></td>
                            <td><?php echo $m4_ip4_in_day2 + $m4_ip4_out_day2 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_out_day3 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day3 + $m4_ip4_out_day3 ?></td>
                            <td><?php echo $m4_ip4_in_day4 ?></td>
                            <td><?php echo $m4_ip4_out_day4 ?></td>
                            <td><?php echo $m4_ip4_in_day4 + $m4_ip4_out_day4 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_out_day5 ?></td>
                            <td class="bg-warning"><?php echo $m4_ip4_in_day5 + $m4_ip4_out_day5 ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip4_in ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip4_out ?></td>
                            <td class="bg-success"><?php echo $total_m4_ip4_in + $total_m4_ip4_out ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <div class="footer mt-4">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>