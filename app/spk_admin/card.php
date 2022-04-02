<?php
/*
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
*/


require "../config/function.php";
require '../config/settings.config.php';


$spkObject = new spk();
$spkObject->spkHeader();
?>
<script src='spk.js'> </script>
<link rel='stylesheet' type='text/css' href='../css/app_css.css'>

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
            <a  class = "nav-link " href="../index.php" >กลับหน้าแรก</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link active" href="#" >ม. 1 SMTE</a>
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
    <hr />
    <br />
    <?php

  

/*
$fileName = "../../app/file1/m1s.csv";
$ojbWrite = fopen("../../app/file1/m1s.csv","w");
*/
try {
    $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT ex_m1_s.ex_id, m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s260,ex_m1_s.ex_room, m1_s.m1s001, m1_s.m1s003, m1_s.file_name_1 FROM m1_s INNER JOIN ex_m1_s ON m1_s.m1s003=ex_m1_s.ref1";
    
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<table class='table'>";
    echo "<thead class='thead-dark'><tr><th>เลขที่นั่งสอบ</th><th>คำนำหน้านาม</th></th><th>ชื่อ</th><th>นามสกุล</th><th>โรงเรียนเดิม</th><th>ห้องสอบที่</th><th>Ref#2</th><th>Ref#1</th><th>PIC</th></tr></thead>";
    while ($row_data = $data->fetch()) {
        #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td><a href='#'>" .$row_data[7] . "</a></td><td><image src='../../app/file1/". $row_data[8]."' width='90px' height='90px'></image></td></tr>";
        echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td>" .$row_data[7] . "</td><td></td></tr>";
        # code...
       //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
};
echo "</table>";
$conn = null;

?>

    
    </div>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>