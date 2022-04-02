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
        <img src="../../../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive"  id='top'>
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
                <a class="nav-link " href="m1_smte.php">ม. 1 SMTE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="m1_ip.php">ม. 1 IP</a>
            </li>

            </li>
        </ul>
        <hr>
        <div class="btn-group col-md-4" role="group">       
                <a class="btn btn-success btn-sm"  href="m1_ip_excel.php" role="button"><i class="far fa-file-excel"></i>  นำข้อมูลออกไฟล์ Excel  </a>
        </div>        
        <br />
        <?php
        $servername = "localhost";
        $username   = "root";
        $password   = ",uok8,";
        $dbname     = "SpkEntrance";

        try {


            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT ex_m1_ip.ex_id, m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s260,ex_m1_ip.ex_room, m1_ip.m1s001, m1_ip.m1s003, m1_ip.file_name_1, m1_ip.m1s290, m1_ip.m1s330 FROM m1_ip INNER JOIN ex_m1_ip ON m1_ip.m1s003=ex_m1_ip.ref1";

            $data = $conn->prepare($sql);
            $data->execute();
            echo "<p class='h2 text-primary text-center' >IP  </p><a href='#cambridge'>goto ->Cambridge</a>";
            echo "<table class='table'>";
            echo "<thead class=''><tr><th>เลขที่นั่งสอบ</th><th>คำนำหน้านาม</th><th>ชื่อ</th><th>นามสกุล</th><th>โรงเรียนเดิม</th><th>ห้องสอบที่</th><th>Ref#2</th><th>Ref#1</th><th>PIC</th><th>แผนการเรียน</th><th>ข้อสอบภาษา</th></tr></thead>";
            while ($row_data = $data->fetch()) {
                if ($row_data[9] == 2) {
                    $str_plan = "IP";
                    $exam_id = $row_data[0];
               
                    if ($exam_id < 10) {
                        $exam_id = "1200" . $exam_id;
                    } elseif ($exam_id < 100) {
                        $exam_id = "120" . $exam_id;
                    } else {
                        $exam_id = "12" . $exam_id;
                    }                       
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
                echo "<tr><td>" . $exam_id . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  " . $row_data['3'] . "</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  " . $row_data[6] . "</td><td>" . $row_data[7] . "</td><td></td><td>" .  $str_plan  . "</td><td>" .  $str_exam . "</td></tr>";
                # code...
                //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        };
        echo "</table>";
        $conn = null;


        echo "<p class='h2 text-primary text-center' id='cambridge'>Cambridge</p> <a href='#top'>goto ->Top</a>";
        ?>
        <div class="btn-group col-md-4 pb-4" role="group">       
            <a class="btn btn-success btn-sm"  href="m1_ip_cam_excel.php" role="button"><i class="far fa-file-excel"></i>  นำข้อมูลออกไฟล์ Excel  </a>
        </div>    
<?php
        try {


            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT ex_m1_ip_cam.ex_id, m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s260,ex_m1_ip_cam.ex_room, m1_ip.m1s001, m1_ip.m1s003, m1_ip.file_name_1, m1_ip.m1s290, m1_ip.m1s330 FROM m1_ip INNER JOIN ex_m1_ip_cam ON m1_ip.m1s003=ex_m1_ip_cam.ref1";

            $data = $conn->prepare($sql);
            $data->execute();
            echo "<table class='table'>";
            echo "<thead class='thead-dark'><tr><th>เลขที่นั่งสอบ</th><th>คำนำหน้านาม</th><th>ชื่อ</th><th>นามสกุล</th><th>โรงเรียนเดิม</th><th>ห้องสอบที่</th><th>Ref#2</th><th>Ref#1</th><th>PIC</th><th>แผนการเรียน</th><th>ข้อสอบภาษา</th></tr></thead>";
            while ($row_data = $data->fetch()) {
                if ($row_data[9] == 2) {
                    $str_plan = "IP";
                    $exam_id = $row_data[0];
               
                    if ($exam_id < 10) {
                        $exam_id = "1200" . $exam_id;
                    } elseif ($exam_id < 100) {
                        $exam_id = "120" . $exam_id;
                    } else {
                        $exam_id = "12" . $exam_id;
                    }                    
                } elseif  ($row_data[9] == 4) {
                    $str_plan = "Cambridge";
                    $exam_id = $row_data[0];
               
                    if ($exam_id < 10) {
                        $exam_id = "1300" . $exam_id;
                    } elseif ($exam_id < 100) {
                        $exam_id = "130" . $exam_id;
                    } else {
                        $exam_id = "13" . $exam_id;
                    }                    
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
                echo "<tr><td>" . $exam_id . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  " . $row_data['3'] . "</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  " . $row_data[6] . "</td><td>" . $row_data[7] . "</td><td></td><td>" .  $str_plan  . "</td><td>" .  $str_exam . "</td></tr>";
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