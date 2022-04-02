<?php
session_start();
if (!isset($_SESSION['admin_level'])) {
    header("Location: login.php");
    exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_start();
    //session_unset();
    session_destroy();
    header("Location: login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
include("../../config/StatusAPP.inc.php");
if ($status == '0') {
    $str_status = "<p class='text-warning'>สถานะระบบ: ปิดรับสมัคร</p>";
} elseif ($status == '1') {
    $str_status = "<p class='text-success'>สถานะระบบ: เปิดรับสมัคร</p>";
}
?>
<?php
include_once("../../spk/word.php");
require_once "../../admission/config/function.php";
require_once '../../admission/config/settings.config.php';
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";


$spkObject  = new spk();
$spkObject->spkHeader($strEducationYear);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel='stylesheet' type='text/css' href='../../admission/css/app_css.css'>
<link rel='stylesheet' type='text/css' href='../../admission/css/admin.css'>
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class=" text-center">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"> ระบบรับนักเรียนประจำ <?php echo $strEducationYear;; ?> ห้องเรียนพิเศษ</p>
            <hr>
        </div>
    </div>
    <div class="container">
        <a class="" href="index.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
        <h2 class="text-danger text-center">ชั้นมัธยมศึกษาปีที่ 4</h2>

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">โครงการพิเศษ SMTE</a></li>
            <li><a data-toggle="tab" href="#menu1">โครงการพิเศษ IP และ IPC</a></li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3 class="text-center">โครงการพิเศษ SMTE</h3>

                <table class="table table-striped">
                    <tr>
                        <th>ลำดับที่ (Ref.# 2)</th>
                        <!-- <th>เลขประจำตัวประชาชน</th> -->
                        <th>ชื่อ-สกุล</th>
                        <th>สถานะการสมัคร</th>

                    </tr>
                    <?php
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM m4_s ORDER BY m1s001 ASC");
                        $stmt->execute();

                        // set the resulting array to associative
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $row['m1s001'] . "</td>";
                            //echo "<td>" . $row['m1s003'] . "</td>";
                            echo "<td>" . $row['m1s010'] . " " . $row['m1s020'] . " " . $row['m1s030'] . "</td>";
                            switch ($row['status']) {
                                case 1:
                                    $status = "<p class='text-info'>*รอการชำระเงิน</p>";
                                    break;
                                case 2:
                                    $status = "<p class='text-warning'>*เอกสารไม่สมบูรณ์(ติดต่อ $strCallCenter )</p>";
                                    break;
                                case 3:
                                    $status = "<p class='text-danger'>*ขาดคุณสมบัติ</p>";
                                    break;
                                case 4:
                                    $status = "<p class='text-success'>*การสมัครสมบูรณ์</p>";
                                    break;
                            }
                            echo "<td>$status</td>";


                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    // $conn = null;

                    ?>
                </table>

            </div>
            <div id="menu1" class="tab-pane fade">
                <h3 class="text-center">โครงการพิเศษ IP และ IPC</h3>

                <table class="table table-striped">
                    <tr>
                        <th>ลำดับที่ (Ref.# 2)</th>
                        <!-- <th>เลขประจำตัวประชาชน</th> -->
                        <th>ชื่อ-สกุล</th>
                        <th>สถานะการสมัคร</th>

                    </tr>
                    <?php
                    try {
                        $stmt2 = $conn->prepare("SELECT * FROM m4_ip ORDER BY m1s001 ASC");
                        $stmt2->execute();

                        // set the resulting array to associative
                        $result2 = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row2 = $stmt2->fetch()) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $row2['m1s001'] . "</td>";
                            //echo "<td>" . $row['m1s003'] . "</td>";
                            echo "<td>" . $row2['m1s010'] . " " . $row2['m1s020'] . " " . $row2['m1s030'] . "</td>";
                            switch ($row2['status']) {
                                case 1:
                                    $status = "<p class='text-info'>*รอการชำระเงิน</p>";
                                    break;
                                case 2:
                                    $status = "<p class='text-warning'>*เอกสารไม่สมบูรณ์(ติดต่อ $strCallCenter )</p>";
                                    break;
                                case 3:
                                    $status = "<p class='text-danger'>*ขาดคุณสมบัติ</p>";
                                    break;
                                case 4:
                                    $status = "<p class='text-success'>*การสมัครสมบูรณ์</p>";
                                    break;
                            }
                            echo "<td>$status</td>";
                            echo "</tr>";
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    $conn = null;
                    ?>
                </table>



            </div>

        </div>



    </div>

</body>

</html>