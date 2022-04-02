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
    

    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");
    include("confirm.inc.php");
    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    
    $plan = $_GET['p'];
    $room = $_GET['m'];
    $id_card = $_GET['idcard'];
    $file_number = $_GET['file'];
    if ($file_number == "7"){
        $strFile = "payment_name";
        $strFileStatus = "payment"; 
    }else{
    $strFile = "confirm02_file0" . $file_number;
    $strFileStatus = "confirm02_file0". $file_number ."_status";        
    }

    switch ($plan){
        case 'm1': // m1-smte
            
            $sql = "SELECT m1.reg_name_title, m1.reg_name, m1.reg_suname, m1.reg_tel, m1.father_tel, m1.mother_tel, m1.parent_tel,";
            $sql .= "result_m1.result_no, result_m1.payment,";
            $sql .= "result_m1.confirm02_file01_status, result_m1.confirm02_file02_status, result_m1.confirm02_file03_status,";
            $sql .= "result_m1.confirm02_file04_status, result_m1.confirm02_file05_status, result_m1.confirm02_file06_status,";
            $sql .= "result_m1.confirm02_file01, result_m1.confirm02_file02, result_m1.confirm02_file03,";
            $sql .= "result_m1.confirm02_file04, result_m1.confirm02_file05, result_m1.confirm02_file06,";
            $sql .= "m1.reg_card_id,result_m1.confirm01_status,result_m1.payment_name ";
            $sql .= "from m1 INNER JOIN result_m1 ON m1.reg_card_id = result_m1.ref1 AND result_m1.ref1 = $id_card ";
            
            $sql_update = "UPDATE result_m1 SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1/$room";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            break;
        case 'm4': // m4-smte
            
            $sql = "SELECT m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.reg_tel, m4.father_tel, m4.mother_tel, m4.parent_tel,";
            $sql .= "result_m4.result_no, result_m4.payment,";
            $sql .= "result_m4.confirm02_file01_status, result_m4.confirm02_file02_status, result_m4.confirm02_file03_status,";
            $sql .= "result_m4.confirm02_file04_status, result_m4.confirm02_file05_status, result_m4.confirm02_file06_status,";
            $sql .= "result_m4.confirm02_file01, result_m4.confirm02_file02, result_m4.confirm02_file03,";
            $sql .= "result_m4.confirm02_file04, result_m4.confirm02_file05, result_m4.confirm02_file06,";
            $sql .= "m4.reg_card_id,result_m4.confirm01_status,result_m4.payment_name ";
            $sql .= "from m4 INNER JOIN result_m4 ON m4.reg_card_id = result_m4.ref1 AND result_m4.ref1 = $id_card ";
            
            $sql_update = "UPDATE result_m4 SET $strFileStatus = :status WHERE ref1 = $id_card";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4/$room";
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
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

    <title>ห้องเรียนทั่วไป | โรงเรียนสตรีภูเก็ต <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class=" text-center">

        <div class="container">
        <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear;; ?> ห้องเรียนทั่วไป</p>
            <hr class="my-4">
        </div>
    </div>
    <div class="container">
    
    <a class="btn btn-primary" href="../confirm?m=<?php echo $room ?>&p=<?php echo $plan ?>" role="button"> กลับ</a>


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
                echo  '<div class="text-center"><p> ชื่อ :' .$row['reg_name_title'] . ' ' . $row['reg_name'] . '  ' . $row['reg_suname'] . '</p>';
                echo '<p>เลขประจำตัวประชาชน : '. $row['reg_card_id'] .  '</p>';
                echo '<p>ระดับ : '. $str_m .  '</p>';
                
                $file_type = substr($row[$strFile],-3);
                $up_status = $row[$strFileStatus];
                

                if ($file_type=='pdf'){
                    $img =  '<embed src="../../../../admission/confirm/'.$row[$strFile]. '" type="application/pdf" width="100%" height="600px" />';
                }else{
                    $img =  '<img src="../../../../admission/confirm/'.$row[$strFile].'?' .$t . '" alt="img"> ';   
                
                }
                $strHearder = array (
                    "หลักฐาน สำเนาทะเบียนบ้านของ นักเรียน",
                    "หลักฐาน สำเนาทะเบียนบ้านของ บิดา",
                    "หลักฐาน สำเนาทะเบียนบ้านของ มารดา",
                    "หลักฐาน สำเนาทะเบียนบ้านของ ผู้ปกครอง",
                    "หลักฐาน การสำเร็จการศึกษา ป.พ.1",
                    "รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต",
                    "หลักฐาน การจ่ายเงิน"
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