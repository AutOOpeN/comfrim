<?php
session_start();
include_once '../../spk/word.php';

// checkTimeToPrintCard
$tmp_print = strtotime("now");
$timeStrat = strtotime($Print_Card_Start_General);

if (($tmp_print <  $timeStrat) && ($_SESSION['admin_level'] != "0")) {    
    
    header("Location: index.php");
    exit;
}
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";
/*
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($str_sql);
    $stmt->execute();
    while  ($row = $stmt->fetch()) {
        # code...
        echo  $row['m4s010'] . $row['m4s020'] . "    " . $row['m4s030'] ;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="spk.js"></script>


<body>
    <div class="container">
        <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
        <h1 class="jumbotron-heading text-center">ระบบรับนักเรียน ห้องเรียนทั่วไป <?php echo $strEducationYear ?> </h1>
        <hr>
        <div class="text-center">
            <h3>พิมพ์บัตรประจำตัวผู้เข้าสอบ</h3>
            <h4>ชั้นมัธยมศึกษาปีที่ 4</h4>
        </div>
        <fieldset class="border p-2">
            <legend class="w-auto"> ค้นหา: </legend>
            <form class="form" method="post">
                <div class="input-group mb-3">
                    <input type="text" id="card-id" class="form-control" name="id_card_print" placeholder="เลขประจำตัวประชาชน #Ref. 1" aria-label="เลขประจำตัวประชาชน #Ref. 1" aria-describedby="button-id" required>
                </div>
                <!--
                <div class="input-group mb-3">
                    <input type="number" id="ref2" class="form-control" name="ref2"
                        placeholder="เลขประจำตัวผู้สมัคร #Ref. 2" aria-label=" #Ref. 2" aria-describedby="button-id"
                        required>
                    <div class="input-group-append">

                    </div>
                </div>
                -->
                <div class="form-group text-center">
                    <button class="btn btn-outline-primary" type="submit" id="button-id">
                        <i class="fas fa-search"></i> ค้นหา
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
                $m4_s_Result  = $conn->query("SELECT count(*) FROM m4 WHERE  reg_card_id = '" . $_POST['id_card_print'] . "'" . " AND register_status = 3")->fetchColumn();
                if ($m4_s_Result == 1) {
                    $tmp_sql = "SELECT * FROM m4 WHERE reg_card_id = '" . $_POST['id_card_print'] . "' AND register_status = 3";
                    $stmt = $conn->prepare($tmp_sql);
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    while ($row = $stmt->fetch()) {
                        $student_name   = $row['reg_name_title'] . $row['reg_name'] . " " . $row['reg_suname'];
                        $student_id_reg = $row['id'];
                        $student_school_name = $row['old_school_name'];
                        $student_area_name = $row['area_name'];
                        $plan1 = $row['reg_plan1_name'];
                        $plan2 = $row['reg_plan2_name'];
                        $student_image = "../file1/" . $row['file_name_1'];
                        $reg_id = $row['id'];
                        if ($reg_id < 1000) {
                            if ($reg_id < 10) {
                                $reg_id =  "4000" . $reg_id;
                            } elseif ($reg_id < 100) {
                                $reg_id = "400" . $reg_id;
                            } else {
                                $reg_id = "40" . $reg_id;
                            }
                        } else {
                            $reg_id = "4" . $reg_id;
                        }
                    }

                    echo "

                    <table class='table'>
                        
                            <tr>
                                <td rowspan='4'> <img src=" . $student_image . " width='90px' hight='90px'>;</td>
                                <td class='text-right'></td>
                                <td>  <u>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</u></td>
                            </tr>
                            <tr>
                                <td class='text-right'>ชื่อ-สกุล : </td>
                                <td><u>" . $student_name . "</u></td>
                            </tr>
                            <tr>
                                <td class='text-right'> แผนการเรียนที่ 1 : </td>
                                <td><u>$plan1</u></td>
                            </tr>
                            <tr>
                                <td class='text-right'> แผนการเรียนที่ 2 : </td>
                                <td><u>$plan2</u></td>
                            </tr>
                        
                    </table>
                
                    ";

                    echo "
                        <form method='post' action='print_card.php'>
                            <input type='hidden' name='student_name' value='" . $student_name . "'>
                            <input type='hidden' name='ref1' value='" . $_POST['id_card_print'] . "'>
                            <input type='hidden' name='ref2' value='" . $reg_id . "'>
                            <input type='hidden' name='plan1' value='" . $plan1 . "'>
                            <input type='hidden' name='plan2' value='" . $plan2 . "'>
                            <input type='hidden' name='area_name' value='" . $student_area_name . "'>
                            <input type='hidden' name='old_school' value='" . $student_school_name . "'>
                            <input type='hidden' name='student_image' value='" . $student_image . "'>

                            <div class='text-center'>
                                <br /><button class='btn btn-outline-primary' type='submit' ><i class='fas fa-print'></i> พิมพ์บัตรประจำตัวผู้สอบ</button>
                            </div>
                        </form>
                        <br />
                    ";
                } else {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
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
    <div class="footer  ">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>
</body>

</html>