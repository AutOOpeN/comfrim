<?php
$tmp_file_name = "ex_m1_" .  date("Y-m-d_H-i-s") . ".xls";
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

    <table>

        <tr>
            <td>ห้องสอบที่</td>
            <td>เลขประจำตัวสอบ</td>
            <td>เลขประจำตัวประชาชน</td>
            <td>คำนำหน้านาม</td>
            <td>ชื่อ</td>
            <td>สกุล</td>
            <td>ชื่อโรงเรียนเดิม</td>
            <td>ประเภทที่สมัคร</td>


        </tr>


        <?php

        $servername = "localhost";
        $username   = "root";
        $password   = ",uok8,";
        $dbname     = "admission";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT m1.id, m1.reg_card_id, m1.reg_name_title, m1.reg_name, m1.reg_suname, m1.old_school_name , m1.area_id, ex_m1.ex_room, ex_m1.ex_id  FROM m1 ";
        $sql .= " INNER JOIN ex_m1 ON m1.reg_card_id = ex_m1.ref1  ORDER BY ex_m1.ex_id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $i = 1;
        while ($row = $stmt->fetch()) {
            $reg_id = $i;
            if ($reg_id < 1000) {
                if ($reg_id < 10) {
                    $reg_id =  "1000" . $reg_id;
                } elseif ($reg_id < 100) {
                    $reg_id = "100" . $reg_id;
                } else {
                    $reg_id = "10" . $reg_id;
                }
            } else {
                $reg_id = "1" . $reg_id;
            }


            switch ($row['area_id']) {
                case 1:
                    $area = "ทั่วไป";
                    break;
                case 2:
                    $area = "ในเขต";
                    break;
                default:
                    $area = "";
                    break;
            }

            echo " 
                <tr>
                    <td>" . $row['ex_room'] . "</td>
                    <td>" .  $reg_id . "</td>
                    <td>'" . $row['reg_card_id'] . "</td>
                    <td>" . $row['reg_name_title'] . "</td>
                    <td>" . $row['reg_name'] . "</td>
                    <td>" . $row['reg_suname'] . "</td>
                    <td>" . $row['old_school_name'] . "</td>
                    <td> $area </td>
                </tr>
            ";
            $i++;
        }
        ?>
    </table>



</body>


</html>