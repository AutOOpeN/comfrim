<?php
    session_start();
    if (!isset($_SESSION['admin_confirm'])) {
        header("Location: ../../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    

    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $plan = $_GET['p'];
    

    switch ($plan){
        case 'm1s': // m1-smte
            $sql = "SELECT m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s110, m1_s.m1s150, m1_s.m1s200, m1_s.m1s250,ex_m1_s_result.result_no ,ex_m1_s_result.payment_name,ex_m1_s_result.payment,m1_s.m1s003,ex_m1_s_result.confirm01_status from m1_s inner join ex_m1_s_result ON m1_s.m1s003 = ex_m1_s_result.ref1 AND ex_m1_s_result.result_status = 1 ORDER by ex_m1_s_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm1ip':
            $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_result.result_no,ex_m1_ip_result.payment_name,ex_m1_ip_result.payment,m1_ip.m1s003,ex_m1_ip_result.confirm01_status from m1_ip inner join ex_m1_ip_result ON m1_ip.m1s003 = ex_m1_ip_result.ref1 AND ex_m1_ip_result.result_status = 1 ORDER by ex_m1_ip_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm1ipc':
            $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_cam_result.result_no,ex_m1_ip_cam_result.payment_name,ex_m1_ip_cam_result.payment,m1_ip.m1s003,ex_m1_ip_cam_result.confirm01_status from m1_ip inner join ex_m1_ip_cam_result ON m1_ip.m1s003 = ex_m1_ip_cam_result.ref1 AND ex_m1_ip_cam_result.result_status = 1 ORDER by ex_m1_ip_cam_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            break;
        case 'm4s': // m1-smte
            $sql = "SELECT m4_s.m1s010,m4_s.m1s020,m4_s.m1s030,m4_s.m1s110,m4_s.m1s150,m4_s.m1s200,m4_s.m1s250,ex_m4_s_result.result_no,ex_m4_s_result.payment_name,ex_m4_s_result.payment,m4_s.m1s003,ex_m4_s_result.confirm01_status from m4_s inner join ex_m4_s_result ON m4_s.m1s003 = ex_m4_s_result.ref1 AND ex_m4_s_result.result_status = 1 ORDER by ex_m4_s_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm4ip':
            $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_result.result_no,ex_m4_ip_result.payment_name,ex_m4_ip_result.payment,m4_ip.m1s003,ex_m4_ip_result.confirm01_status from m4_ip inner join ex_m4_ip_result ON m4_ip.m1s003 = ex_m4_ip_result.ref1 AND ex_m4_ip_result.result_status = 1 ORDER by ex_m4_ip_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm4ipc':
            $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_cam_result.result_no,ex_m4_ip_cam_result.payment_name,ex_m4_ip_cam_result.payment,m4_ip.m1s003,ex_m4_ip_cam_result.confirm01_status from m4_ip inner join ex_m4_ip_cam_result ON m4_ip.m1s003 = ex_m4_ip_cam_result.ref1 AND ex_m4_ip_cam_result.result_status = 1 ORDER by ex_m4_ip_cam_result.result_number ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            break;
        default:
            $sql = "";
            $str_m = "";
            $str_plan = "";
        }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../../../../css/student/student.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>โรงเรียนสตรีภูเก็ต | ประกาศผลสอบ โครงการพิเศษ <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class=" text-center">
        <img src="../../../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear ?> ห้องเรียนพิเศษ</p>
            <p class="lead text-muted">  <?php echo $str_m ?> </p>
            <p class="lead text-muted">  <?php echo $str_plan ?> </p>
            <hr class="my-4">
        </div>
    </div>
    <div class="container">
    <a class="btn btn-primary" href="../" role="button">กลับหน้าแรก</a>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อ - สกุล</th>
            <th scope="col">เลขประจำตัวประชาชน</th>
            <th scope="col">ผลสอบ</th>
            <th scope="col">เบอร์ติดต่อ</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

    <?php

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $n = 1;
            while ($row = $stmt -> fetch() )   {
                // echo '<pre>';
                // print_r($row);
                // echo '</pre>';
                echo '<tr><th scope="row">' . $n . '. </th>';
                echo  '<td>' .$row[0] . ' ' . $row[1] . '  ' . $row[2] . '</td>';
                echo '<td>'. $row[10] .  '</td>';
                echo '<td>'. $row[7] .  '</td>';
                echo '<td>' . $row[3] . ' | '. $row[4] . ' | ' . $row[5] . '</td>';
                if ($row[9] == 1){
                    $status = '<a href="update.php?p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-info">รอตรวจหลักฐาน</span></a>';
                    if ($row[11] == 1){
                        $status = '<a href="update.php?p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-success">หลักฐานสมบูรณ์</span></a>';
                    }
                }else{
                    $status = '<a href="update.php?p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-secondary">ยังไม่ส่งหลักฐาน</span></a>';
                    // $status = '<span class="badge rounded-pill bg-secondary">ยังไม่ส่งหลักฐาน</span>';
                }
                if($row[11]==3){
                    $status = '<a href="update.php?p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-danger">สละสิทธิ์</span></a>';
                }
                echo '<td>'. $status .  '</td>';

                echo "</tr>";
                $n++;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
    
        }

    ?>
        </tbody>
    </table>


    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
    </div>


</body>
</html>
