<?php

$plan = $_GET['p'];
$room = $_GET['m'];
switch ($plan){
    case 'm1': // m1-smte
        $sql = "SELECT m1.reg_name_title, m1.reg_name, m1.reg_suname, m1.reg_tel, m1.father_tel, m1.mother_tel, m1.parent_tel,result_m1.result_no ,result_m1.payment_name,result_m1.payment,m1.reg_card_id,result_m1.confirm01_status,result_m1.result_text,result_m1.room from m1 inner join result_m1 ON m1.reg_card_id = result_m1.ref1 AND result_m1.result_status = 1 AND result_m1.room = ". $room ." ORDER BY result_m1.room ASC";
        $str_m = "ชั้นมัธยมศึกษาปีที่ 1/$room";
        $str_plan = "";
        $m = "1";
        break;
    case 'm4': // m1-smte
        $sql = "SELECT m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.reg_tel, m4.father_tel, m4.mother_tel, m4.parent_tel,result_m4.result_no ,result_m4.payment_name,result_m4.payment,m4.reg_card_id,result_m4.confirm01_status,result_m4.result_text,result_m4.room from m4 inner join result_m4 ON m4.reg_card_id = result_m4.ref1 AND result_m4.result_status = 1 AND result_m4.room = ". $room ." ORDER BY result_m4.room ASC";
        $str_m = "ชั้นมัธยมศึกษาปีที่ 4/$room";
        $str_plan = "";
        $m = "4";
        break;
    
    default:
        $sql = "";
        $str_m = "";
        $str_plan = "";
    }
$tmp_file_name = "ม_" . $m . "_" . $m . "-" .  date("Y-m-d_H-i-s") . ".xls";
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
            <th scope="col">เบอร์ติดต่อ</th>
            <th scope="col">สถานะ</th>
            </tr>
        </thead>
        <tbody>

        <?php
            include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
            include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

            $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $n = 1;
                while ($row = $stmt -> fetch()) {
                    echo '<tr><th scope="row">' . $n . '. </th>';
                    echo  '<td>' .$row[0] . ' ' . $row[1] . '  ' . $row[2] . '</td>';
                    echo '<td>=trim("'. $row[10] .  '")</td>';
                    echo '<td>' . $row[3] . ' | '. $row[4] . ' | ' . $row[5] . '</td>';
                    if ($row['confirm01_status'] == 1){
                        $status = 'ยืนยันสิทธิ์สมบูรณ์';
                        if ($row[11] == 1){
                            $status = 'ยืนยันสิทธิ์สมบูรณ์';
                        }
                    }else{
                        $status = 'รอการยืนยันสิทธิ์';
                    }
                    if($row['confirm01_status']==2){
                        $status = 'สละสิทธิ์';
                    }
                    echo '<td>'. $status .  '</td>';
                    echo "</tr>";
                    $n++;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
    </table>



</body>


</html>