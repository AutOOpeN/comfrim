<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
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
    <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_admin_login.css">

</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <div class="container text-center">
        <h1>โรงเรียนสตรีภูเก็ต</h1>
        <h2>ระบบจัดการ รับสมัครสอบคัดเลือกเข้าเรียน ประเภทห้องเรียนพิเศษ</h2>
        <hr>
        <?php echo $str_status?>
        <!--<a class="btn btn-outline-primary btn-lg" href="../index.php">กลับหน้าแรก</a>-->
        <nav class="navbar navbar-light ">
        <ul class="navbar-nav">
        <li class="nav-item"><a class="btn btn-outline-primary btn-lg nav-link" href="status.php"><i class="fas fa-user-check"></i>
            ตรวจเอกสารผู้สมัคร</a></li>
        <li class="nav-item"><a class="btn btn-outline-primary btn-lg nav-link" href="stat.php"><i class="fas fa-chart-pie"></i> สรุปจำนวนผู้สมัคร</a></li>
        <li class="nav-item"><a class="btn btn-outline-primary btn-lg nav-link" href="report"><i class="fas fa-diagnoses"></i> รายชื่อผู้มีสิทธิ์สอบ</a></li>
        <li class="nav-item"><a class="btn btn-outline-primary btn-lg nav-link" href="mnt.php"><i class="fas fa-power-off"></i> กำหนดสถานะการรับสมัคร เปิด-ปิด ระบบ </a></li>

        </ul>
        
        </nav>
        
    </div>

    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>