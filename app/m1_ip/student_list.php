<?php
    include_once("../../spk/word.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ระบบรับนักเรียน ม. 1 โครงการพิเศษ IP <?php echo $strEducationYear?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="spk.js"></script>
    <body>
        <div class=" text-center">
        <img src="../../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 class="jumbotron-heading">ระบบรับนักเรียน<?php echo $strEducationYear?></h1>
                <hr>
                <p class="lead text-muted">ประกาศรายชื่อผู้สมัครเข้าศึกษาโครงการห้องเรียนพิเศษ IP โรงเรียนสตรีภูเก็ต </p>
                <p class="lead text-muted">ชั้นมัธยมศึกษาปีที่ 1 <?php echo $strEducationYear ?></p>
                <hr>
            </div>
        </div>
        <div class="container">
                <p class="h3 bg-warning text-white text-center"><span style="color: Dodgerblue;"><i class="fas fa-sun fa-spin"></i></span> <?php echo $strPrint_ExamIdCard;?><span style="color: Dodgerblue;"><i class="fas fa-sun fa-spin"></i></span></p>
                <?php 
                // checkTimeToPrintCard
                    $tmp_print = strtotime("now");
                    $timeStrat= strtotime($Print_Card_Start) ; 
                ?>
        </div>
        
        <div class="container">
            <table class="table table-striped">
                <tr>
                    <th>ลำดับที่ (Ref.# 2)</th>
<!--                    <th>เลขประจำตัวประชาชน</th> -->
                    <th>ชื่อ-สกุล</th>
                    <th>สถานะการสมัคร</th>
                        <th></th>
                </tr>
<?php

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM m1_ip ORDER BY m1s001 ASC");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td class='text-center'>" . $row['m1s001'] . "</td>";
        //echo "<td>" . $row['m1s003'] . "</td>";
        echo "<td>" . $row['m1s010'] . $row['m1s020'] . " " . $row['m1s030'] . "</td>";
        switch ($row['status']) {
            case 1:
                $status = "<p class='text-info'>*รอการชำระเงิน</p>";
                break;
            case 2:
                $status = "<p class='text-warning'>*เอกสารไม่สมบูรณ์(ติดต่อ $strCallCenter )</p>";
                break;
            case 3:
                $status = "<p class='text-danger'>*ขาดคุณสมบัติ</p>";
                break;
            case 4:
                $status = "<p class='text-success'>*การสมัครสมบูรณ์</p>";
                break;

        }
        echo "<td>$status</td>";

        if ($row['status'] == 4) {

            
            if ($tmp_print >  $timeStrat) {
                echo "<form action='find_card.php' method='post'>
                         <input type='hidden' name='id_card' value='". $row['m1s003'] . "'>";

                echo "<td> <button class='btn btn-warning' type='submit'> พิมพ์บัตรประจำตัวผู้สอบ </button> </td>";
                echo "</form>";
            }else{
                echo "<td></td>";
            }
            
            #echo "<td><a class='btn btn-outline-danger ' href='#'>รอออกบัตรประจำตัวผู้สอบ</a></td>";
        } else {
            #echo "<td><a class='btn btn-outline-success' href='find_bill.php'>พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ</a></td>";
            echo "<td></td>";
        }

        echo "</tr>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
            </table>
       </div>

        <hr>
        <div class="footer">
                <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368 </p>
</div>



    </body>

</html>
