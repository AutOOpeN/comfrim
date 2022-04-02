<?php
$tmp_file_name = "ex_m1_ip" .  date("Y-m-d_H-i-s") . ".xls";
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
            <td>คำนำหน้านาม</td>
            <td>ชื่อ</td>
            <td>สกุล</td>
            <td>ชื่อโรงเรียนเดิม</td>
            <!-- <td>ประเภทที่สมัคร</td> -->
            <td>ข้อสอบภาษา</td>


        </tr>


        <?php

        $servername = "localhost";
        $username   = "root";
        $password   = ",uok8,";
        $dbname     = "SpkEntrance";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT m1_ip.m1s001, m1_ip.m1s003, m1_ip.m1s010, m1_ip.m1s020, m1_ip.m1s030, m1_ip.m1s260,m1_ip.m1s330 , ex_m1_ip.ex_room, ex_m1_ip.ex_id  FROM m1_ip ";
        $sql .= " INNER JOIN ex_m1_ip ON m1_ip.m1s003 = ex_m1_ip.ref1  ORDER BY ex_m1_ip.ex_id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $i = 1;
        while ($row = $stmt->fetch()) {
            $reg_id = $i;
            
                if ($reg_id < 10) {
                    $reg_id =  "1200" . $reg_id;
                } elseif ($reg_id < 100) {
                    $reg_id = "120" . $reg_id;
                } else {
                    $reg_id = "12" . $reg_id;
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
            switch ($row['m1s330']) {
                case 't':
                    $str_exam = "ภาษาไทย";
                    break;
                case 'e':
                    $str_exam = "English";
                    break;
            }

            echo " 
                <tr>
                    <td>" . $row['ex_room'] . "</td>
                    <td>" .  $reg_id . "</td>
                    <td>" . $row['m1s010'] . "</td>
                    <td>" . $row['m1s020'] . "</td>
                    <td>" . $row['m1s030'] . "</td>
                    <td>" . $row['m1s260'] . "</td>
                   
                    <td> $str_exam </td>
                </tr>
            ";
            $i++;
        }
        ?>
    </table>



</body>


</html>