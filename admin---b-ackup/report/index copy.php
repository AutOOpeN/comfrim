<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: ../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: ../login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    include("../config/StatusAPP.inc.php");
    if ($status == '0') {
        $str_status="<p class='text-danger h3'>สถานะระบบ :ปิดรับสมัคร</p>";
    }elseif($status == '1'){
        $str_status="<p class='text-success h3'>สถานะระบบ :เปิดรับสมัคร</p>";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โรงเรียนสตรีภูเก็ต</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../app/style.css">
    

</head>

<body>
    <div class="container-top">
        <img src="../../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <div class="container ">
        <p class="h1 text-center">โรงเรียนสตรีภูเก็ต</p>
        <p class="h2 text-center">ระบบจัดการ รับสมัครสอบคัดเลือกเข้าเรียน ประเภทห้องเรียนพิเศษ</p2>
        <hr>
    
    <ul class="nav nav-pills nav-fill">
        <li class ="nav-item">
            <a  class = "nav-link active" href="report_m1_smte.php" >ม. 1 SMTE</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link" href="report_m1_ip.php" >ม. 1 IP</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link" href="report_m4_smte.php" >ม. 4 SMTE</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link" href="report_m4_ip.php" >ม. 4 IP</a>
        </li>
    </ul>


    
    </div>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>