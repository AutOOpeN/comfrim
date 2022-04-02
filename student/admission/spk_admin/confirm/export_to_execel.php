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
        $m = "1";
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
        $m="4";
        break;
   
    default:
        $sql = "";
        $str_m = "";
        $str_plan = "";
    }

$tmp_file_name = "ตรวจหลักฐาน_ม_" . $m . "_" . $m . "-" .  date("Y-m-d_H-i-s") . ".xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$tmp_file_name");
header("Pragma: no-cache");
header("Expires: 0");

?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
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
                    echo '<td>=trim("'. $row['reg_card_id'] .  '")</td>';
                    echo '<td>'. $row['room'] .  '</td>';
                    echo '<td>' . $row['reg_tel'] . ' | '. $row['father_tel'] . ' | ' . $row['mother_tel'] . '</td>';
                    echo '<td colspan="7">สละสิทธิ์</td>';

                    echo "</tr>";                    
                }else{
                    echo '<tr><th scope="row">' . $n . '. </th>';
                    echo  '<td>' .$row['reg_name_title'] . ' ' . $row['reg_name'] . '  ' . $row['reg_suname'] . '</td>';
                    echo '<td>=trim("'. $row['reg_card_id'] .  '")</td>';
                    echo '<td>'. $row['room'] .  '</td>';
                    echo '<td>' . $row['reg_tel'] . ' | '. $row['father_tel'] . ' | ' . $row['mother_tel'] . '</td>';
                    echo '<td>'. statusFilesToExcel($row['payment']) .'</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file01_status']).  '</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file02_status']).  '</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file03_status']).  '</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file04_status']).  '</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file05_status']).  '</td>';
                    echo '<td>'. statusFilesToExcel($row['confirm02_file06_status']).  '</td>';

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
        


</body>


</html>