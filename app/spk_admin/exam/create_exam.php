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
include("../../../config/settings.config.php");
include_once("../../../spk/word.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/app_css.css">
    <link rel='stylesheet' type='text/css' href='../../../../admission/css/admin.css'>

    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <title><?php echo $strTitle . " โครงการพิเศษ " . $strEducationYear; ?></title>
</head>

<body>
    <div class="container">
        <div class=" text-center">
            <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $strTitle . " โครงการพิเศษ " . $strEducationYear; ?></h1>
            <hr>

        </div>
        <div class="h3 text-center"> 
                    สร้างผู้มีสิทธิสอบ โครงการพิเศษ
        </div>
        <div class="p-4">
             <a href=".." > <i class="fas fa-step-backward"></i> กลับหน้าแรก</a>
        </div>


        <div class="row btn-container mt-4">

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m1_smte.php" class="btn yellow" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 1 SMTE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m4_smte.php" class="btn green" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 4 SMTE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m1_ip.php" class="btn yellow" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 1 IP</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m4_ip.php" class="btn green" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 4 IP</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m1_ip_cam.php" class="btn yellow" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 1 IP CAMBRIDGE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="row mb-3">
                    <div class="col-12">
                        <a href="exam_m4_ip_cam.php" class="btn green" role="button">
                            <div>
                                <div class="topic">สร้างผู้มีสิทธิสอบ  ชั้นมัธยมศึกษาปีที่ 4 IP CAMBRIDGE</div>
                                <div class="note"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>