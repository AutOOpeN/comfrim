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
        $chk_0='checked';
        $chk_1='';
    }elseif($status == '1'){
        $chk_0='';
        $chk_1='checked';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โรงเรียนสตรีภูเก็ต</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <div class="container text-center">
        <h1>โรงเรียนสตรีภูเก็ต</h1>
        <h2>ระบบจัดการ รับสมัครสอบคัดเลือกเข้าเรียน ประเภทห้องเรียนพิเศษ</h2>
        <hr>
        <form method="post" action="systemupdate.php">
            <fieldset class="myfieldset">
                <legend class="myfieldset">สถานะการรับสมัคร</legend>
                <div class="form-check ">
                    <input type="radio" name="chk_status" value="0" <?php echo $chk_0 ?> id="close">
                    <label class="form-check-label h3" for="close">
                        <i class="far fa-calendar-times"></i>  ปิดระบบ
                    </label>
                </div>
                <div class="form-check">
                    <input type="radio" name="chk_status" value="1" <?php echo $chk_1 ?> id="open">
                    <label class="form-check-label h3" for="open">
                        <i class="far fa-calendar-check"></i> เปิดระบบ
                    </label>
                </div>
            </fieldset>
            <div class="form-group text-center">
            <a class="btn btn-outline-primary btn-lg" href="../admin/index.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
                <button class="btn btn-outline-primary btn-lg" type="submit" id="button-id">
                    <i class="fas fa-power-off"></i> กำหนดสถานะ
                </button>
                
            </div>
        </form>
    </div>

    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>