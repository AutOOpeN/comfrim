
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
            <a  class = "nav-link " href="../index.php" >กลับหน้าแรก</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link" href="index.php" >ม. 1 SMTE</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link " href="report_m1_ip.php" >ม. 1 IP</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link " href="report_m4_smte.php" >ม. 4 SMTE</a>
        </li>
        <li class ="nav-item">
            <a  class = "nav-link active" href="#" >ม. 4 IP</a>
        </li>
    </ul>
    <hr>
    <br />
<?php

  
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
/*
$fileName = "../../app/file1/m1s.csv";
$ojbWrite = fopen("../../app/file1/m1s.csv","w");
*/

try {
    
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT ex_m4_ip.ex_id, m4_ip.m1s010, m4_ip.m1s020, m4_ip.m1s030, m4_ip.m1s260,ex_m4_ip.ex_room, m4_ip.m1s001, m4_ip.m1s003, m4_ip.file_name_1, m4_ip.m1s290, m4_ip.m1s330 FROM m4_ip INNER JOIN ex_m4_ip ON m4_ip.m1s003=ex_m4_ip.ref1";
    
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<p class='h2 text-primary text-center'>IP<p>";
    echo "<table class='table'>";
    echo "<thead class='thead-dark'><tr><th>เลขที่นั่งสอบ</th><th>คำนำหน้านาม</th><th>ชื่อ</th><th>นามสกุล</th><th>โรงเรียนเดิม</th><th>ห้องสอบที่</th><th>Ref#2</th><th>Ref#1</th><th>PIC</th><th>แผนการเรียน</th><th>ข้อสอบภาษา</th></tr></thead>";
    while ($row_data = $data->fetch()) {
        if ($row_data[9] == 2) {
            $str_plan = "IP Eng-Math";

        } elseif($row_data[9] == 3) {
            $str_plan = "IP Sci-Math";
        } else{
            $str_plan = "Cambridge";
        }

        switch ($row_data[10]) {
            case 't':
                $str_exam = "ภาษาไทย";
                break;
            case 'e':
                $str_exam = "English";
                break;
            
        }
        #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td><a href='#'>" .$row_data[7] . "</a></td><td><image src='../../app/file1/". $row_data[8]."' width='90px' height='90px'></image></td></tr>";
        echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td>" .$row_data[7] . "</td><td></td><td>".  $str_plan  ."</td><td>".  $str_exam ."</td></tr>";
        # code...
       //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
};
echo "</table>";
$conn = null;


echo "<p class='h2 text-primary text-center'>Cambridge<p>";
try {
    
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT ex_m4_ip_cam.ex_id, m4_ip.m1s010, m4_ip.m1s020, m4_ip.m1s030, m4_ip.m1s260,ex_m4_ip_cam.ex_room, m4_ip.m1s001, m4_ip.m1s003, m4_ip.file_name_1, m4_ip.m1s290, m4_ip.m1s330 FROM m4_ip INNER JOIN ex_m4_ip_cam ON m4_ip.m1s003=ex_m4_ip_cam.ref1";
    
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<table class='table'>";
    echo "<thead class='thead-dark'><tr><th>เลขที่นั่งสอบ</th><th>คำนำหน้านาม</th><th>ชื่อ</th><th>นามสกุล</th><th>โรงเรียนเดิม</th><th>ห้องสอบที่</th><th>Ref#2</th><th>Ref#1</th><th>PIC</th><th>แผนการเรียน</th><th>ข้อสอบภาษา</th></tr></thead>";
    while ($row_data = $data->fetch()) {
        if ($row_data[9] == 2) {
            $str_plan = "IP";

        } else {
            $str_plan = "Cambridge";
        }
        switch ($row_data[10]) {
            case 't':
                $str_exam = "ภาษาไทย";
                break;
            case 'e':
                $str_exam = "English";
                break;
            
        }
        #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td><a href='#'>" .$row_data[7] . "</a></td><td><image src='../../app/file1/". $row_data[8]."' width='90px' height='90px'></image></td></tr>";
        echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td>" .$row_data[7] . "</td><td></td><td>".  $str_plan  ."</td><td>".  $str_exam ."</td></tr>";
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