<?php
    session_start();
    if (!isset($_SESSION['admin_confirm'])) {
        header("Location: ../login.php");
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
    $id_card = $_GET['idcard'];
    $file_number = $_GET['file'];
    $strFile = "confirm02_file0" . $file_number;
    $strFileStatus = "confirm02_file0". $file_number ."_status";
    switch ($plan){
        case 'm1s': // m1-smte
            // $sql = "SELECT m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s110, m1_s.m1s150, m1_s.m1s200, m1_s.m1s250,ex_m1_s_result.result_no ,ex_m1_s_result.payment_name,ex_m1_s_result.payment,m1_s.m1s003,ex_m1_s_result.confirm01_status from m1_s inner join ex_m1_s_result ON m1_s.m1s003 = ex_m1_s_result.ref1 AND ex_m1_s_result.ref1 = $id_card ";
            $sql = "SELECT m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s110, m1_s.m1s150, m1_s.m1s200, m1_s.m1s250,";
            $sql .= "ex_m1_s_result.result_no, ex_m1_s_result.payment,";
            $sql .= "ex_m1_s_result.confirm02_file01_status, ex_m1_s_result.confirm02_file02_status, ex_m1_s_result.confirm02_file03_status,";
            $sql .= "ex_m1_s_result.confirm02_file04_status, ex_m1_s_result.confirm02_file05_status, ex_m1_s_result.confirm02_file06_status,";
            $sql .= "ex_m1_s_result.confirm02_file01, ex_m1_s_result.confirm02_file02, ex_m1_s_result.confirm02_file03,";
            $sql .= "ex_m1_s_result.confirm02_file04, ex_m1_s_result.confirm02_file05, ex_m1_s_result.confirm02_file06,";
            $sql .= "m1_s.m1s003,ex_m1_s_result.confirm01_status ";
            $sql .= "from m1_s INNER JOIN ex_m1_s_result ON m1_s.m1s003 = ex_m1_s_result.ref1 AND ex_m1_s_result.ref1 = $id_card ";
            
            $sql_update = "UPDATE ex_m1_s_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm1ip':
            // $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_result.result_no,ex_m1_ip_result.payment_name,ex_m1_ip_result.payment,m1_ip.m1s003,ex_m1_ip_result.confirm01_status from m1_ip inner join ex_m1_ip_result ON m1_ip.m1s003 = ex_m1_ip_result.ref1 AND ex_m1_ip_result.ref1 = $id_card ";
            $sql = "SELECT m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s110, m1_ip.m1s150, m1_ip.m1s200, m1_ip.m1s250,";
            $sql .= "ex_m1_ip_result.result_no, ex_m1_ip_result.payment,";
            $sql .= "ex_m1_ip_result.confirm02_file01_status, ex_m1_ip_result.confirm02_file02_status, ex_m1_ip_result.confirm02_file03_status,";
            $sql .= "ex_m1_ip_result.confirm02_file04_status, ex_m1_ip_result.confirm02_file05_status, ex_m1_ip_result.confirm02_file06_status,";
            $sql .= "ex_m1_ip_result.confirm02_file01, ex_m1_ip_result.confirm02_file02, ex_m1_ip_result.confirm02_file03,";
            $sql .= "ex_m1_ip_result.confirm02_file04, ex_m1_ip_result.confirm02_file05, ex_m1_ip_result.confirm02_file06,";
            $sql .= "m1_ip.m1s003,ex_m1_ip_result.confirm01_status ";
            $sql .= "from m1_ip INNER JOIN ex_m1_ip_result ON m1_ip.m1s003 = ex_m1_ip_result.ref1 AND ex_m1_ip_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m1_ip_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm1ipc':
            // $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_cam_result.result_no,ex_m1_ip_cam_result.payment_name,ex_m1_ip_cam_result.payment,m1_ip.m1s003,ex_m1_ip_cam_result.confirm01_status from m1_ip inner join ex_m1_ip_cam_result ON m1_ip.m1s003 = ex_m1_ip_cam_result.ref1 AND ex_m1_ip_cam_result.ref1 = $id_card ";
            $sql = "SELECT m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s110, m1_ip.m1s150, m1_ip.m1s200, m1_ip.m1s250,";
            $sql .= "ex_m1_ip_cam_result.result_no, ex_m1_ip_cam_result.payment,";
            $sql .= "ex_m1_ip_cam_result.confirm02_file01_status, ex_m1_ip_cam_result.confirm02_file02_status, ex_m1_ip_cam_result.confirm02_file03_status,";
            $sql .= "ex_m1_ip_cam_result.confirm02_file04_status, ex_m1_ip_cam_result.confirm02_file05_status, ex_m1_ip_cam_result.confirm02_file06_status,";
            $sql .= "ex_m1_ip_cam_result.confirm02_file01, ex_m1_ip_cam_result.confirm02_file02, ex_m1_ip_cam_result.confirm02_file03,";
            $sql .= "ex_m1_ip_cam_result.confirm02_file04, ex_m1_ip_cam_result.confirm02_file05, ex_m1_ip_cam_result.confirm02_file06,";
            $sql .= "m1_ip.m1s003,ex_m1_ip_cam_result.confirm01_status ";
            $sql .= "FROM m1_ip INNER JOIN ex_m1_ip_cam_result ON m1_ip.m1s003 = ex_m1_ip_cam_result.ref1 AND ex_m1_ip_cam_result.ref1 = $id_card ";
            
            $sql_update = "UPDATE ex_m1_ip_cam_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            break;
        case 'm4s': // m1-smte
            // $sql = "SELECT m4_s.m1s010,m4_s.m1s020,m4_s.m1s030,m4_s.m1s110,m4_s.m1s150,m4_s.m1s200,m4_s.m1s250,ex_m4_s_result.result_no,ex_m4_s_result.payment_name,ex_m4_s_result.payment,m4_s.m1s003,ex_m4_s_result.confirm01_status from m4_s inner join ex_m4_s_result ON m4_s.m1s003 = ex_m4_s_result.ref1 AND ex_m4_s_result.ref1 = $id_card ";
            $sql = "SELECT m4_s.m1s010, m4_s.m1s020, m4_s.m1s030, m4_s.m1s110, m4_s.m1s150, m4_s.m1s200, m4_s.m1s250,";
            $sql .= "ex_m4_s_result.result_no, ex_m4_s_result.payment,";
            $sql .= "ex_m4_s_result.confirm02_file01_status, ex_m4_s_result.confirm02_file02_status, ex_m4_s_result.confirm02_file03_status,";
            $sql .= "ex_m4_s_result.confirm02_file04_status, ex_m4_s_result.confirm02_file05_status, ex_m4_s_result.confirm02_file06_status,";
            $sql .= "ex_m4_s_result.confirm02_file01, ex_m4_s_result.confirm02_file02, ex_m4_s_result.confirm02_file03,";
            $sql .= "ex_m4_s_result.confirm02_file04, ex_m4_s_result.confirm02_file05, ex_m4_s_result.confirm02_file06,";
            $sql .= "m4_s.m1s003,ex_m4_s_result.confirm01_status ";
            $sql .= "from m4_s INNER JOIN ex_m4_s_result ON m4_s.m1s003 = ex_m4_s_result.ref1 AND ex_m4_s_result.ref1 = $id_card ";
            
            $sql_update = "UPDATE ex_m4_s_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm4ip':
            // $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_result.result_no,ex_m4_ip_result.payment_name,ex_m4_ip_result.payment,m4_ip.m1s003,ex_m4_ip_result.confirm01_status from m4_ip inner join ex_m4_ip_result ON m4_ip.m1s003 = ex_m4_ip_result.ref1 AND ex_m4_ip_result.ref1 = $id_card ";
            $sql = "SELECT m4_ip.m1s010, m4_ip.m1s020, m4_ip.m1s030, m4_ip.m1s110, m4_ip.m1s150, m4_ip.m1s200, m4_ip.m1s250,";
            $sql .= "ex_m4_ip_result.result_no, ex_m4_ip_result.payment,";
            $sql .= "ex_m4_ip_result.confirm02_file01_status, ex_m4_ip_result.confirm02_file02_status, ex_m4_ip_result.confirm02_file03_status,";
            $sql .= "ex_m4_ip_result.confirm02_file04_status, ex_m4_ip_result.confirm02_file05_status, ex_m4_ip_result.confirm02_file06_status,";
            $sql .= "ex_m4_ip_result.confirm02_file01, ex_m4_ip_result.confirm02_file02, ex_m4_ip_result.confirm02_file03,";
            $sql .= "ex_m4_ip_result.confirm02_file04, ex_m4_ip_result.confirm02_file05, ex_m4_ip_result.confirm02_file06,";
            $sql .= "m4_ip.m1s003,ex_m4_ip_result.confirm01_status ";
            $sql .= "from m4_ip INNER JOIN ex_m4_ip_result ON m4_ip.m1s003 = ex_m4_ip_result.ref1 AND ex_m4_ip_result.ref1 = $id_card ";
            
            $sql_update = "UPDATE ex_m4_ip_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm4ipc':
            // $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_cam_result.result_no,ex_m4_ip_cam_result.payment_name,ex_m4_ip_cam_result.payment,m4_ip.m1s003,ex_m4_ip_cam_result.confirm01_status from m4_ip inner join ex_m4_ip_cam_result ON m4_ip.m1s003 = ex_m4_ip_cam_result.ref1 AND ex_m4_ip_cam_result.ref1 = $id_card ";
            $sql = "SELECT m4_ip.m1s010, m4_ip.m1s020, m4_ip.m1s030, m4_ip.m1s110, m4_ip.m1s150, m4_ip.m1s200, m4_ip.m1s250,";
            $sql .= "ex_m4_ip_cam_result.result_no, ex_m4_ip_cam_result.payment,";
            $sql .= "ex_m4_ip_cam_result.confirm02_file01_status, ex_m4_ip_cam_result.confirm02_file02_status, ex_m4_ip_cam_result.confirm02_file03_status,";
            $sql .= "ex_m4_ip_cam_result.confirm02_file04_status, ex_m4_ip_cam_result.confirm02_file05_status, ex_m4_ip_cam_result.confirm02_file06_status,";
            $sql .= "ex_m4_ip_cam_result.confirm02_file01, ex_m4_ip_cam_result.confirm02_file02, ex_m4_ip_cam_result.confirm02_file03,";
            $sql .= "ex_m4_ip_cam_result.confirm02_file04, ex_m4_ip_cam_result.confirm02_file05, ex_m4_ip_cam_result.confirm02_file06,";
            $sql .= "m4_ip.m1s003,ex_m4_ip_cam_result.confirm01_status ";
            $sql .= "from m4_ip INNER JOIN ex_m4_ip_cam_result ON m4_ip.m1s003 = ex_m4_ip_cam_result.ref1 AND ex_m4_ip_cam_result.ref1 = $id_card ";
            
            $sql_update = "UPDATE ex_m4_ip_cam_result SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            break;
        default:
            $sql = "";
            $sql_update="";
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

        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear;; ?> ห้องเรียนพิเศษ</p>
            <hr class="my-4">
        </div>
    </div>
    <div class="container">
    
    <a class="btn btn-primary" href="../confirm?p=<?php echo $plan ?>" role="button"> กลับ</a>


    <?php

        $t = time();
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt -> fetch() )   {
                // echo '<tab';
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                echo  '<div class="text-end"><p> ชื่อ :' .$row['m1s010'] . ' ' . $row['m1s020'] . '  ' . $row['m1s030'] . '</p>';
                echo '<p>เลขประจำตัวประชาชน : '. $row['m1s003'] .  '</p>';
                echo '<p>ระดับ : '. $str_m .  '</p>';
                echo '<p>แผนการเรียน : '. $str_plan .  '</p></div>';
                
                $file_type = substr($row[$strFile],-3);
                $up_status = $row[$strFileStatus];
                

                if ($file_type=='pdf'){
                    $img =  '<embed src="../../../../app/confirm/'.$row[$strFile]. '" type="application/pdf" width="100%" height="600px" />';
                }else{
                    $img =  '<img src="../../../../app/confirm/'.$row[$strFile].'?' .$t . '" alt="img"> ';   
                
                }
                $strHearder = array (
                    "หลักฐาน สำเนาทะเบียนบ้านของ นักเรียน",
                    "หลักฐาน สำเนาทะเบียนบ้านของ บิดา",
                    "หลักฐาน สำเนาทะเบียนบ้านของ มารดา",
                    "หลักฐาน สำเนาทะเบียนบ้านของ ผู้ปกครอง",
                    "หลักฐาน การสำเร็จการศึกษา ป.พ.1",
                    "รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต"
                );
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    

        if(isset($_POST['up_status'])){
            $up_status = $_POST['up_status'];
            // echo $sql_update;
            
            try{
                $stmt_upate = $conn->prepare($sql_update);
                $stmt_upate->execute(array(':status' => $up_status));
                if ($up_status == 0){
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น ยังไม่ส่งหลักฐาน</div>";
                }elseif($up_status == 1){
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น รอการยืนยัน</div>";
                }elseif($up_status == 2){
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น สมบูรณ์</div>";
                }
                
                // echo $stmt_upate->rowCount();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            
            // echo $_POST['up_status'];
        }

    ?>
    <p class="fw-bold">กำหนดสถานะ</p>
    <form  class="row g-3" action="" method="post">
        <div class="col-12">
            <select id="inputState" class="form-select" name="up_status">
                <option value="0" <?php if($up_status == 0 ){ echo "selected";}?>>ยังไม่ส่งหลักฐาน</option>
                <option value="1"<?php if($up_status == 1 ){ echo "selected";}?>>รอการยืนยัน</option>
                <option value="2"<?php if($up_status == 2 ){ echo "selected";}?>>สมบูรณ์</option>
            </select>
        </div>
            
        <div class="col-12">
            <button type="submit" class="form-control btn btn-primary mb-3">บันทึก</button>
        </div>    
    </form>
    <div>
    <p class="fw-bold"><?php echo $strHearder[$file_number - 1]?></p>
        <?php echo $img ?>
    </div>
    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
</div>


</body>
</html>