<?php
    session_start();
    if (!isset($_SESSION['admin_confirm'])) {
        header("Location: ../../../login.php");
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

    switch ($plan){
        case 'm1': // m1
            $sql = "SELECT m1.reg_name_title, m1.reg_name, m1.reg_suname, m1.reg_tel, m1.father_tel, m1.mother_tel, m1.parent_tel,";
            $sql .= "result_m1.result_no, result_m1.payment,";
            $sql .= "result_m1.confirm02_file01_status, result_m1.confirm02_file02_status, result_m1.confirm02_file03_status,";
            $sql .= "result_m1.confirm02_file04_status, result_m1.confirm02_file05_status, result_m1.confirm02_file06_status,";
            $sql .= "m1.reg_card_id,result_m1.confirm01_status,result_m1.room,result_m1.result_text,result_m1.payment ";
            $sql .= "from m1 INNER JOIN result_m1 ON m1.reg_card_id = result_m1.ref1 AND result_m1.result_status = 1 AND  result_m1.room = ". $room . " ORDER by result_m1.room ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1/$room";
            $str_plan = "ห้องเรียนทั่วไป";
            break;
        case 'm4': // m4
            $sql = "SELECT m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.reg_tel, m4.father_tel, m4.mother_tel, m4.parent_tel,";
            $sql .= "result_m4.result_no, result_m4.payment,";
            $sql .= "result_m4.confirm02_file01_status, result_m4.confirm02_file02_status, result_m4.confirm02_file03_status,";
            $sql .= "result_m4.confirm02_file04_status, result_m4.confirm02_file05_status, result_m4.confirm02_file06_status,";
            $sql .= "m4.reg_card_id,result_m4.confirm01_status,result_m4.room,result_m4.result_text,result_m4.payment ";
            $sql .= "from m4 INNER JOIN result_m4 ON m4.reg_card_id = result_m4.ref1 AND result_m4.result_status = 1 AND  result_m4.room = ". $room . " ORDER by result_m4.room ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4/$room";
            $str_plan = "ห้องเรียนทั่วไป";
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

    <title>ห้องเรียนทั่วไป | โรงเรียนสตรีภูเก็ต <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class=" text-center">

        <div class="container">
            
            <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear ?> ห้องเรียนทั่วไป </p>
            <p class="lead text-muted">  <?php echo $str_m ?> </p>

            <hr class="my-4">
        </div>
    </div>
    <div class="container">
    <a class="btn btn-primary" href="../" role="button">กลับหน้าแรก</a>
    <a class="btn btn-success " href="export_to_execel.php?p=<?php echo $plan ?>&m=<?php echo $room ?>" role="button"><i class='bx bxs-spreadsheet'></i> นำออก Excel</a>

    </div>
    <div class="container-fluid">
    
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อ - สกุล</th>
            <th scope="col">เลขประจำตัวประชาชน</th>
            <th scope="col">ห้องเรียน</th>
            <th scope="col">เบอร์ติดต่อ</th>
            <th scope="col">จ่ายเงิน</th>
            <th scope="col">นักเรียน</th>
            <th scope="col">บิดา</th>
            <th scope="col">มารดา</th>
            <th scope="col">ผู้ปกครอง</th>
            <th scope="col">ป.พ.1</th>
            <th scope="col">รูปถ่าย</th>
            </tr>
        </thead>
        <tbody>

    <?php
        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $n = 1;
            while ($row = $stmt -> fetch() )   {

                if ($row['confirm01_status'] == 2){
                    echo '<tr  class="text-decoration-line-through"><th scope="row">' . $n . '. </th>';
                    echo  '<td>' .$row['reg_name_title'] . ' ' . $row['reg_name'] . '  ' . $row['reg_suname'] . '</td>';
                    echo '<td>'. $row['reg_card_id'] .  '</td>';
                    echo '<td>'. $row['room'] .  '</td>';
                    echo '<td>' . $row['reg_tel'] . ' | '. $row['father_tel'] . ' | ' . $row['mother_tel'] . '</td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo '<td></td>';
                    echo "</tr>";                    
                }else{
                    echo '<tr><th scope="row">' . $n . '. </th>';
                    echo  '<td>' .$row['reg_name_title'] . ' ' . $row['reg_name'] . '  ' . $row['reg_suname'] . '</td>';
                    echo '<td>'. $row['reg_card_id'] .  '</td>';
                    echo '<td>'. $row['room'] .  '</td>';
                    echo '<td>' . $row['reg_tel'] . ' | '. $row['father_tel'] . ' | ' . $row['mother_tel'] . '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['payment'],7,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file01_status'],1,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file02_status'],2,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file03_status'],3,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file04_status'],4,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file05_status'],5,$room ) .  '</td>';
                    echo '<td>'. statusFiles($plan, $row['reg_card_id'],  $row['confirm02_file06_status'],6,$room ) .  '</td>';

                                // statusFiles(ระดับชั้น, เลข ปปช.,  สถานะไฟล์,ลำดับไฟล์,ห้องเรียน )
                    echo "</tr>";                       
                }

                $n++;
            }
        } catch (PDOException $e) {
            echo "Error--> " . $e->getMessage();
        }
        $conn = null;
    ?>
        </tbody>
    </table>
        

    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
    </div>


</body>
</html>
