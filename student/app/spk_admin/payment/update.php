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
    $id_card = $_GET['idcard'];

    switch ($plan){
        case 'm1s': // m1-smte
            $sql = "SELECT m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s110, m1_s.m1s150, m1_s.m1s200, m1_s.m1s250,ex_m1_s_result.result_no ,ex_m1_s_result.payment_name,ex_m1_s_result.payment,m1_s.m1s003,ex_m1_s_result.confirm01_status from m1_s inner join ex_m1_s_result ON m1_s.m1s003 = ex_m1_s_result.ref1 AND ex_m1_s_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m1_s_result SET confirm01_status = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm1ip':
            $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_result.result_no,ex_m1_ip_result.payment_name,ex_m1_ip_result.payment,m1_ip.m1s003,ex_m1_ip_result.confirm01_status from m1_ip inner join ex_m1_ip_result ON m1_ip.m1s003 = ex_m1_ip_result.ref1 AND ex_m1_ip_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m1_ip_result SET confirm01_status = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm1ipc':
            $sql = "SELECT m1_ip.m1s010,m1_ip.m1s020,m1_ip.m1s030,m1_ip.m1s110,m1_ip.m1s150,m1_ip.m1s200,m1_ip.m1s250,ex_m1_ip_cam_result.result_no,ex_m1_ip_cam_result.payment_name,ex_m1_ip_cam_result.payment,m1_ip.m1s003,ex_m1_ip_cam_result.confirm01_status from m1_ip inner join ex_m1_ip_cam_result ON m1_ip.m1s003 = ex_m1_ip_cam_result.ref1 AND ex_m1_ip_cam_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m1_ip_cam_result SET confirm01_status = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            break;
        case 'm4s': // m1-smte
            $sql = "SELECT m4_s.m1s010,m4_s.m1s020,m4_s.m1s030,m4_s.m1s110,m4_s.m1s150,m4_s.m1s200,m4_s.m1s250,ex_m4_s_result.result_no,ex_m4_s_result.payment_name,ex_m4_s_result.payment,m4_s.m1s003,ex_m4_s_result.confirm01_status from m4_s inner join ex_m4_s_result ON m4_s.m1s003 = ex_m4_s_result.ref1 AND ex_m4_s_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m4_s_result SET confirm01_status = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm4ip':
            $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_result.result_no,ex_m4_ip_result.payment_name,ex_m4_ip_result.payment,m4_ip.m1s003,ex_m4_ip_result.confirm01_status from m4_ip inner join ex_m4_ip_result ON m4_ip.m1s003 = ex_m4_ip_result.ref1 AND ex_m4_ip_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m4_ip_result SET confirm01_status = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4";
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            break;
        case 'm4ipc':
            $sql = "SELECT m4_ip.m1s010,m4_ip.m1s020,m4_ip.m1s030,m4_ip.m1s110,m4_ip.m1s150,m4_ip.m1s200,m4_ip.m1s250,ex_m4_ip_cam_result.result_no,ex_m4_ip_cam_result.payment_name,ex_m4_ip_cam_result.payment,m4_ip.m1s003,ex_m4_ip_cam_result.confirm01_status from m4_ip inner join ex_m4_ip_cam_result ON m4_ip.m1s003 = ex_m4_ip_cam_result.ref1 AND ex_m4_ip_cam_result.ref1 = $id_card ";
            $sql_update = "UPDATE ex_m4_ip_cam_result SET confirm01_status = :status WHERE ref1 = $id_card";
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
    
    <a class="btn btn-primary" href="../payment?p=<?php echo $plan ?>" role="button"> กลับ</a>


    <?php
        $t = time();
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $n = 1;
            while ($row = $stmt -> fetch() )   {
                // echo '<tab';
                echo  '<div class="text-center"><p> ชื่อ :' .$row[0] . ' ' . $row[1] . '  ' . $row[2] . '</p>';
                echo '<p>เลขประจำตัวประชาชน : '. $row[10] .  '</p>';
                echo '<p>ระดับ : '. $str_m .  '</p>';
                echo '<p>แผนการเรียน : '. $str_plan .  '</p></div>';

                $file_type = substr($row[8],-3);
                $up_status = $row[11];
                
                if ($file_type=='pdf'){
                    $img =  '<embed src="../../../../app/payment/'.$row[8]. '" type="application/pdf" width="100%" height="600px" />';
                }else{
                    $img =  '<img src="../../../../app/payment/'.$row[8].'?' .$t . '" alt="img"> ';   
                
                }
                // $img = "";
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
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น รอยืนยัน</div>";
                }elseif($up_status == 1){
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น สมบูรณ์</div>";
                }elseif($up_status == 3){
                    echo "<div class='alert alert-success text-center pt-4' role='alert'>สถานะได้ถูกเปลี่ยนเป็น สละสิทธิ์</div>";
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
                <option value="0" <?php if($up_status == 0 ){ echo "selected";}?>>รอการยืนยัน</option>
                <option value="1"<?php if($up_status == 1 ){ echo "selected";}?>>สมบูรณ์</option>
                <option value="3"<?php if($up_status == 3 ){ echo "selected";}?>>สละสิทธิ์</option>
            </select>
        </div>
            
        <div class="col-12">
            <button type="submit" class="form-control btn btn-primary mb-3">บันทึก</button>
        </div>    
    </form>
    <div>
    <p class="fw-bold">หลักฐานการชำระค่าบำรุงการศึกษา</p>
        <?php echo $img ?>
    </div>
    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
</div>


</body>
</html>