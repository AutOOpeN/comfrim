<?php
// header("Location: http://reg.satreephuket.ac.th/admission/master2563.php");
include_once('spk/word.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงเรียนสตรีภูเก็ต  <?php echo $strEducationYear ?></title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>

    <div class="container">
        <h1 class="text-center">โรงเรียนสตรีภูเก็ต</h1>
        <div>
            <h2 class="text-center">ระบบรับนักเรียน <?php echo $strEducationYear ?> </h2>
            <hr>
        </div>
        <div class="m-4">
            <h4>ประกาศโรงเรียนสตรีภูเก็ต เรื่อง การรับสมัครนักเรียนเข้าเรียน โครงการพิเศษ </h4>
            <ul>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a></li>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></li>
            </ul>
        </div>

        <div class="m-4">
            <h4>ประกาศโรงเรียนสตรีภูเก็ต เรื่อง การรับสมัครนักเรียนเข้าเรียน ห้องเรียนทั่วไป </h4>
            <ul>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a></li>
                <li><a href="http://www.satreephuket.ac.th/academic/ent_year2564/pracas_rub2564.pdf" target="blank">ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></li>
            </ul>
        </div>
        <hr>

        <div class="p-4">
            <h3><i class="fas fa-sign-in-alt"></i> สมัครออนไลน์</h3>
            <div class="row">
                    <div class="col-sm-2 "></div>
                    <div class="col-sm-4 p-2"><a href="app" class="btn btn-primary">สมัครเข้าเรียน โครงการพิเศษ</a></div>
                    <div class="col-sm-4 p-2"><a href="#" class="btn btn-info">สมัครเข้าเรียน ห้องเรียนทั่วไป</a></div>
                    <div class="col-sm-2"></div>

            </div>
            <hr>
        </div>

        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading"> กำหนดการรับสมัคร โครงการพิเศษ</h4>
            <?php
                include('spk/schedule_app.html')
            ?>
        </div>
        <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading"> กำหนดการรับสมัคร ห้องเรียนทั่วไป</h4>
            <?php
                include('spk/schedule_admission.html')
            ?>
        </div>



    </div>


</body>

</html>