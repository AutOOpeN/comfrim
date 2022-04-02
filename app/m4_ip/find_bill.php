<?php
include_once("../../spk/word.php");
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน ม. 4 โครงการพิเศษ IP <?php echo $strEducationYear ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="spk.js"></script>


<body>
    <div class="container">
        <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
        <h1 class="jumbotron-heading text-center">ระบบรับนักเรียน <?php echo $strEducationYear ?> </h1>
        <hr>
        <div class="text-center">
            <h3>โครงการ IP (International Program)</h3>
            <h4>ชั้นมัธยมศึกษาปีที่ 4</h4>
        </div>
        <fieldset class="border p-2">
            <legend class="w-auto">พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ: </legend>
            <form class="form" method="post">
                <div class="input-group mb-3">
                    <input type="number" id="card-id" class="form-control" name="id_card_print"
                        placeholder="เลขประจำตัวประชาชน #Ref. 1" aria-label="เลขประจำตัวประชาชน #Ref. 1"
                        aria-describedby="button-id" required>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-outline-primary" type="submit" id="button-id">
                        <i class="fas fa-search"></i>ค้นหา
                    </button>
                    <a class="btn btn-outline-primary" href="../index.php">กลับหน้าแรก</a>
                </div>
            </form>
        </fieldset>
        <?php
          if (isset($_POST['id_card_print'])) {
              try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $m1_s_Result  = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s003 = '" . $_POST['id_card_print'] . "'" )->fetchColumn();
                if ($m1_s_Result == 1) {
                    $tmp_sql = "SELECT * FROM m4_ip WHERE m1s003 = '" . $_POST['id_card_print'] . "'";
                    $stmt = $conn->prepare($tmp_sql);
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmt->fetch()) {
                        $student_name   = $row['m1s010'] . $row['m1s020'] . " " . $row['m1s030'];
                        $student_id_reg = $row['m1s001'];
                        $student_school_name = $row['m1s260'];
                        //$student_ref1 = 
                        $student_ref2 = $row['m1s001'];
                        $student_image = "../file1/" . $row['file_name_1'];
                       

                    }
                    if ($student_ref2 < 1000) {
                        if ($student_ref2 < 10) {
                            $student_ref2 = "000" . $student_ref2;
                        } elseif ($student_ref2 < 100) {
                            $student_ref2 = "00" . $student_ref2;
                        } else {
                            $student_ref2 = "0" . $student_ref2;
                        }
                        
                    }
                    echo "

                    <table class='table'>
                        <tbody>
                            <tr>
                                <td rowspan='3'> <img src=" . $student_image . " width='90px' hight='90px'>;</td>
                                <td class='text-right'>ลำดับที่สมัคร #Ref.2 :</td>
                                <td>  <u>&nbsp&nbsp&nbsp". $student_ref2 ."&nbsp&nbsp&nbsp</u></td>
                            </tr>
                            <tr>
                                <td class='text-right'>ชื่อ-สกุล : </td>
                                <td><u>".$student_name . "</u></td>
                            </tr>
                            <tr>
                                <td class='text-right'> โครงการที่สมัคร : </td>
                                <td><u>โครงการ IP (International Program)</u></td>
                            </tr>
                        </tbody>
                    </table>
                
                    ";
                    /*
                    echo "<p>ลำดับที่สมัคร #Ref.2 :  <u>&nbsp&nbsp&nbsp". $student_ref2 ."&nbsp&nbsp&nbsp</u></p>";
                    echo "<p> ชื่อ-สกุล : <u>".$student_name . "</u></p>";
                    echo "<p> โรงเรียนเดิม : <u>" . $student_school_name . "</u></p>";
                    echo "<p> โครงการที่สมัคร : <u>ห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)</u></p>  ";
                    */
                    /*
                    echo "
                        <form method='post' action='../bill/payment.php'>
                            <input type='hidden' name='student_name' value='".$student_name."'>
                            <input type='hidden' name='ref1' value='".$_POST['id_card_print']."'>
                            <input type='hidden' name='ref2' value='". $student_ref2 ."'>
                            <input type='hidden' name='old_school' value='". $student_school_name ."'>
                            <input type='hidden' name='student_image' value='". $student_image ."'>
                            <div class='text-center'>
                                <br /><button class='btn btn-outline-primary' type='submit' ><i class='fas fa-print'></i> พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ</button>
                            </div>
                        </form>
                    */
                    echo "
                    <form action='../bill/payment.php' method='post'>
                        <input type='hidden' name='id_card' value='".$_POST['id_card_print']."'>
                        <input type='hidden' name='plan' value='m4_ip'>
                        <div class='text-center'>
                            <br />
                            <button class='btn btn-outline-primary' type='submit' ><i class='fas fa-print'></i> พิมพ์ใบแจ้งชำระเงินค่าสมัครสอบ</button>
                        </div>
                    </form>
                        <br />
                    ";                   
                } else {
                    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
                    echo "ไม่พบข้อมูลผู้สมัคร";
                    echo "</div>";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            };
            $conn = null;
          }
        ?>
    </div>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>