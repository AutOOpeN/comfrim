<?php

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=ex_m4.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>



<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body >

            <table >
                
                <tr>
                    <td>ห้องสอบที่</td>
                    <td>เลขประจำตัวสอบ</td>
                    <td>คำนำหน้านาม</td>
                    <td>ชื่อ</td>
                    <td>สกุล</td>
                    <td>ชื่อโรงเรียนเดิม</td>
                    <td>แผนการเรียนที่ 1</td>
                    <td>แผนการเรียนที่ 2</td>
                   
                </tr>
                <?php

        $servername = "localhost";
        $username   = "root";
        $password   = ",uok8,";
        $dbname     = "admission";         
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT m4.id, m4.reg_card_id, m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.old_school_name , m4.reg_plan1_id, m4.reg_plan2_id, ex_m4.ex_room, ex_m4.ex_id,m4.reg_onet_point  FROM m4 ";
        $sql .= " INNER JOIN ex_m4 ON m4.reg_card_id = ex_m4.ref1  ORDER BY ex_m4.ex_id  ASC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $i = 1;
        while ($row = $stmt->fetch()) {
            $reg_id = $i;
            if ($reg_id < 1000) {
                if ($reg_id < 10) {
                    $reg_id =  "4000" . $reg_id;
                } elseif ($reg_id < 100) {
                    $reg_id = "400" . $reg_id;
                } else {
                    $reg_id = "40" . $reg_id;
                }
            }else{
                $reg_id = "4" . $reg_id;
            }
            switch ($row['reg_plan1_id']){
                case 1:
                    $plan1 = "วิทยาศาสตร์ - คณิตศาสตร์";
                    break;
                case 2:
                    $plan1 = "อังกฤษ - คณิตศาสตร์";
                    break;
                case 3:
                    $plan1 = "อังกฤษ - ฝรั่งเศส";
                    break;
                case 4:
                    $plan1 = "อังกฤษ - เยอรมัน";
                    break;
                case 5:
                    $plan1 = "อังกฤษ - จีน";
                    break;
                case 6:
                    $plan1 = "อังกฤษ - ญี่ปุ่น";
                    break;
                default:
                    $plan1 = "";
            }

    
            switch ($row['reg_plan2_id']){
                case 1:
                    $plan2 = "วิทยาศาสตร์ - คณิตศาสตร์";
                    break;
                case 2:
                    $plan2 = "อังกฤษ - คณิตศาสตร์";
                    break;
                case 3:
                    $plan2 = "อังกฤษ - ฝรั่งเศส";
                    break;
                case 4:
                    $plan2 = "อังกฤษ - เยอรมัน";
                    break;
                case 5:
                    $plan2 = "อังกฤษ - จีน";
                    break;
                case 6:
                    $plan2 = "อังกฤษ - ญี่ปุ่น";
                    break;
                default:
                    $plan2 = "";
                
            }               

            echo " 
                <tr>
                    <td> $row[ex_room]</td>
                    <td> $reg_id</td>
                    <td> $row[reg_name_title]</td>
                    <td>$row[reg_name]</td>  
                    <td>$row[reg_suname]</td>
                    <td> $row[old_school_name] </td>";
            
            
            echo "
                    
                </tr>
            ";
            $i++;
        }
            ?>
            </table>
  


</body>


</html>