<?php
include_once('../spk/word.php');
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
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a></li>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></li>
            </ul>
            <hr>
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
            <div class="text-white text-center bg-info">
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
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
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
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
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
                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
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

                            <p class="card-text"><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank" class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                            <p class="card-text"><a href="m4_ip" class="btn btn-secondary" target="_blank">สมัคร โครงการ IP มัธยมศึกษาปีที่ 4 </a></p>
                            <p class="card-text"><a href="m4_ip/find_bill.php" class="btn btn-secondary">พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ </a></p>
                            <p class="card-text"><a href="m4_ip/student_list.php" class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ IP มัธยมศึกษาปีที่ 4 </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center bg-primary">
                <!-- <a href="#" class="btn btn-primary"><h2><i class="fas fa-print"></i> พิมพ์ใบชำระเงิน</h2></a> -->
                <!-- <hr> -->
            </div>
        </div>

    </main>

    <div class="footer mt-4">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>