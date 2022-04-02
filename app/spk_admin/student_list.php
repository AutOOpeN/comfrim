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
    include("../../config/StatusAPP.inc.php");
    if ($status == '0') {
        $str_status="<p class='text-warning'>สถานะระบบ: ปิดรับสมัคร</p>";
    }elseif($status == '1'){
        $str_status="<p class='text-success'>สถานะระบบ: เปิดรับสมัคร</p>";
    }
?>
<?php
include_once("../../spk/word.php");
require_once "../../admission/config/function.php";
require_once '../../admission/config/settings.config.php';
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";
$spkObject  = new spk();
$spkObject->spkHeader();
?>


<link rel='stylesheet' type='text/css' href='../../admission/css/app_css.css'>
<link rel='stylesheet' type='text/css' href='../../admission/css/admin.css'>
</head>
<body>
<div class=" text-center">
    <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
    <div class="container">
        <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
        <p class="lead text-muted"> ระบบรับนักเรียนประจำ   <?php echo $strEducationYear;; ?> ห้องเรียนพิเศษ</p>
        <hr>
    </div>
</div>
<div class="container">
    โรงเรียนสตรีภูเก็ต
</div>

</body>
</html>

