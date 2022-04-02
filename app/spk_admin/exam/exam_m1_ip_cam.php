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


require_once "../../../admission/config/function.php";
require_once '../../../admission/config/settings.config.php';
require_once '../../../spk/word.php';

$dbname   = "SpkEntrance";
$spkObject  = new spk();
$spkObject->spkHeader();
?>

<link rel='stylesheet' type='text/css' href='../../../admission/css/app_css.css'>
<!-- <link rel='stylesheet' type='text/css' href='../../../admission/css/admin.css'> -->
</head>

<body>
    <div class=" text-center">
        <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo "" ?></h1>
            <p class="lead text-muted"><?php echo $strTitle . $strEducationYear; ?> ห้องเรียนพิเศษ</p>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="h3 text-center">
            สร้างผู้มีสิทธิเข้าสอบ ชั้นมัธยมศึกษาปีที่ 1 โครงการ IP CAMBRIDGE
        </div>
        <div class="pt-4 pb-4">
             <a href="create_exam.php" class="btn btn-outline-primary"> <i class="fas fa-step-backward"></i> กลับ</a>
        </div>       
        <form action="" method="post" class="form">
            <div class="mb-3">
                <label for="room_name">จำนวนที่นั่งต่อห้อง: </label>
                <input class="form-control" type="text" id="room_max" name="room_max">
                <div id="RoomMaxHelp" class="form-text">จำนวนผู้เข้าสอบสูงสุดต่อห้อง</div>
            </div>
            <button type="submit" class="btn btn-primary" onClick="return confirm('ยืนยันการ สร้างผู้มีสิทธิเข้าสอบ ชั้นมัธยมศึกษาปีที่ 1 โครงการ IP CAMBRIDGE ?')">สร้างผู้เข้าสอบ</button>
            
        </form>
            <hr class="p4">    
        <a class="" href="../report/m1_ip.php#cambridge" role='btn'>รายชื่อผู้มีสิทธิสอบ ชั้นมัธยมศึกษาปีที่ 1 โครงการ IP CAMBRIDGE</a>
        <?php
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $last_create_ex = $conn->prepare("SELECT * FROM log_crate_exam WHERE plan_name  LIKE 'm1_ip_cam' ORDER BY last_create DESC LIMIT 1 ");
        $last_create_ex->execute();
        if (!empty($_POST['room_max'])) {
            $r_max = $_POST['room_max'] - 1;
            try {
                #$sql = "SELECT ex_m1_ip.ex_id, m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s260,ex_m1_ip.ex_room, m1_ip.m1s001, m1_ip.m1s003 FROM m1_ip INNER JOIN ex_m1_ip ON m1_ip.m1s003=ex_m1_ip.ref1";
                $sql = "SELECT * FROM m1_ip WHERE status = 4 AND m1s290 LIKE '4'  ORDER BY m1s001 ASC";
                $data = $conn->prepare($sql);
                $data->execute();
                $conn->exec("TRUNCATE TABLE ex_m1_ip_cam");
                $conn->exec("UPDATE room_m1_ip_cam SET r_current = 0");

                echo "<table class='table table-border'>";
                #echo "<tr><td>เลขที่นั่งสอบ</td><td>คำนำหน้านาม</td></td><td>ชื่อ-สกุล</td><td>โรงเรียนเดิม</td><td>ห้องสอบที่</td><td>Ref#2</td><td>Ref#1</td></tr>";
                $i = 1;
                $room = 1;

                while ($row_data = $data->fetch()) {
                    // echo "<br>" . $row_data[2] . "   "  .$row_data[5];
                    $m1_smte_exec = $conn->prepare("SELECT * FROM room_m1_ip_cam WHERE  r_current <= $r_max LIMIT 1");
                    $sql_insert = "INSERT INTO ex_m1_ip_cam (ref1,ref2,ex_room) VALUES (?,?,?)";
                    $m1_smte_exec->execute();

                    while ($row_m1smte = $m1_smte_exec->fetch()) {
                        // echo "<br> while2";
                        $tmp_rid = $row_m1smte['rid'];
                        $tmp_room = $row_m1smte['r_name'];
                        $tmp_current = $row_m1smte['r_current'] + 1;
                    }
                    $str_sql_update = "UPDATE room_m1_ip_cam SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                    $conn->exec($str_sql_update);
                    $conn->prepare($sql_insert)->execute([$row_data['m1s003'], $row_data['m1s001'], $tmp_room]);
                    echo "<tr><td>" . $row_data['m1s001'] . "</td><td>" . $row_data['m1s010'] . "</td><td>" . $row_data['m1s020'] . "</td><td>" . $row_data['m1s030'] . "</td></tr>";
                    $i++;
                }
                $log_time = date('Y-m-d H:i:s');
                $conn->exec("INSERT INTO log_crate_exam(plan_name,last_create) VALUES ('m1_ip_cam', '$log_time')");
                $last_create_ex->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            };
            echo "</table>";
        }
        while ($last_row = $last_create_ex->fetch()) {
            echo "<p class='text-info pt-4'>*** สร้างครั้งล่าสุด  : " . $last_row[2] . " ***</p>";
        }
        $conn = null;
        ?>
    </div>
</body>

</html>