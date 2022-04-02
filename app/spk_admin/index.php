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
$spkObject->spkHeader($strEducationYear);
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
  <div class="row btn-container">
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mb-3">
              <div class="col-12">
                <a href="mnt.php" class="btn " role="button" aria-pressed="true">
                  <div>
                    <div class="topic">กำหนดสถานะระบบ</div>
                    <div class="note"><?php echo $str_status?></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="stat.php" class="btn" role="button" aria-pressed="true">
                  <div>
                    <div class="topic">รายงานการสมัคร</div>
                    <div class="note"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="exam" class="btn " role="button" aria-pressed="true">
                  <div>
                    <div class="topic">รายชื่อผู้มีสิทธิ์สอบ</div>
                    <div class="note"></div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row mb-3">
              <div class="col-12">
                <a href="status.php" class="btn yellow" role="button" aria-pressed="true">
                  <div>
                    <div class="topic">ตรวจเอกสารผู้สมัคร</div>
                    <div class="topic2"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="student_list_m1.php" class="btn green" role="button" aria-pressed="true">
                  <div>
                    <div class="topic">ตรวจสอบสถานะผู้สมัคร ม.1</div>
                    <div class="note"></div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-12">
                <a href="student_list_m4.php" class="btn pink" role="button" aria-pressed="true">
                  <div>
                    <div class="topic">ตรวจสอบสถานะผู้สมัคร ม.4</div>
                    <div class="note"></div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>