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

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>โรงเรียนสตรีภูเก็ต</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../app/style.css">


</head>

<body>
    <div class="container-top">
        <img src="../../../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <div class="container ">
        <p class="h1 text-center">โรงเรียนสตรีภูเก็ต</p>
        <p class="h2 text-center">ระบบจัดการ รับสมัครสอบคัดเลือกเข้าเรียน ประเภทห้องเรียนพิเศษ</p2>
            <hr>

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
            <a class="nav-link  " href="../exam">กลับ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="m1_smte.php">ม. 1 SMTE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="m1_ip.php">ม. 1 IP</a>
            </li>

            </li>
        </ul>
        <hr>
        <div class="btn-group col-md-4 mb-4" role="group">       
                <a class="btn btn-success btn-sm"  href="m1_smte_excel.php" role="button"><i class="far fa-file-excel"></i>  นำข้อมูลออกไฟล์ Excel  </a>
        </div>
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

            $sql = "SELECT ex_m1_s.ex_id, m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s260,ex_m1_s.ex_room, m1_s.m1s001, m1_s.m1s003, m1_s.file_name_1 FROM m1_s INNER JOIN ex_m1_s ON m1_s.m1s003=ex_m1_s.ref1";

            $data = $conn->prepare($sql);
            $data->execute();
            echo "<div class='container'><table class='table'>";
            echo "<tr><td>เลขที่นั่งสอบ</td><td>คำนำหน้านาม</td></td><td>ชื่อ</td><td>นามสกุล</td><td>โรงเรียนเดิม</td><td>ห้องสอบที่</td><td>Ref#2</td><td>Ref#1</td></tr>";
            while ($row_data = $data->fetch()) {
                $exam_id = $row_data[0];
               
                    if ($exam_id < 10) {
                        $exam_id = "1100" . $exam_id;
                    } elseif ($exam_id < 100) {
                        $exam_id = "110" . $exam_id;
                    } else {
                        $exam_id = "11" . $exam_id;
                    }
                
                #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td><a href='#'>" .$row_data[7] . "</a></td><td><image src='../../app/file1/". $row_data[8]."' width='90px' height='90px'></image></td></tr>";
                echo "<tr><td>" . $exam_id . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  " . $row_data['3'] . "</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  " . $row_data[6] . "</td><td>" . $row_data[7] . "</td></tr>";
                # code...
                //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        };
        echo "</table></div>";
        $conn = null;

        ?>
