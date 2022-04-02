<?php
session_start();
if (!isset($_SESSION['admin_level'])) {
  header("Location: ../login.php");
  exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  session_start();
  //session_unset();
  session_destroy();
  header("Location: ../login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
include("../../config/StatusAPP.inc.php");
if ($status == '0') {
  $str_status = "<p class='text-warning'>สถานะระบบ :ปิดรับสมัคร</p>";
} elseif ($status == '1') {
  $str_status = "<p class='text-success'>สถานะระบบ :เปิดรับสมัคร</p>";
}
?>
<?php
require_once "../../../admission/config/function.php";
require_once '../../../admission/config/settings.config.php';
require_once '../../../spk/word.php';

$spkObject  = new spk();
$spkObject->spkHeader($strEducationYear);
?>

<link rel='stylesheet' type='text/css' href='../../../admission/css/app_css.css'>
<link rel='stylesheet' type='text/css' href='../../../admission/css/admin.css'>
</head>

<body>
    <div class=" text-center">
        <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"><?php echo $strTitle . $strEducationYear; ?> ห้องเรียนพิเศษ</p>
            <hr>
        </div>
    </div>
    <div class="container">
        <div style="margin: 2.0rem"></div>
        <div class="text-center">
            <h4 class="text-center" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">รายชื่อผู้มีสิทธิสอบ </h4>
        </div>
        <div style="margin: 2.0rem"></div>

        <div class="text-center">
            <div class="btn-group col-md-4" role="group">
                <a class="btn btn-info btn-lg" href="../" role="button"><i class="fas fa-home"></i>&nbsp;หน้าแรก </a>

            </div>

        </div>
        <div class="row btn-container mt-4 text">

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../room" class="btn yellow" role="button">
                            <div>
                                <div class="topic">1. สร้างห้องสอบ</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="create_exam.php" class="btn yellow" role="button">
                            <div>
                                <div class="topic">2. สร้างรายชื่อผู้มีสิทธิ์สอบ</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 2.0rem"></div>
        <div class="row btn-container">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../report/m1_smte.php" class="btn green " role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. รายชื่อผู้มีสิทธิ์สอบ ม.1</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../../m1_smte/find_card.php" class="btn green" role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. พิมพ์บัตรประจำตัวผู้สอบ ม.1 SMTE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../../m1_ip/find_card.php" class="btn green" role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. พิมพ์บัตรประจำตัวผู้สอบ ม.1 IP</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../report/m4_smte.php" class="btn pink" role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. รายชื่อผู้มีสิทธิ์สอบ ม.4</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../../m4_smte/find_card.php" class="btn pink" role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. พิมพ์บัตรประจำตัวผู้สอบ ม.4 SMTE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="../../m4_ip/find_card.php" class="btn pink" role="button" aria-pressed="true">
                            <div>
                                <div class="topic">3. พิมพ์บัตรประจำตัวผู้สอบ ม.4 IP</div>
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