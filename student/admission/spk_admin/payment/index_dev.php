<?php
    session_start();
    if (!isset($_SESSION['admin_confirm'])) {
        header("Location: ../../login.php");
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

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $plan = $_GET['p'];
    $room = $_GET['m'];

    switch ($plan){
        case 'm1': // m1-smte
            $sql = "SELECT m1.reg_name_title, m1.reg_name, m1.reg_suname, m1.reg_tel, m1.father_tel, m1.mother_tel, m1.parent_tel,result_m1.result_no ,result_m1.payment_name,result_m1.payment,m1.reg_card_id,result_m1.confirm01_status,result_m1.result_text,result_m1.room from m1 inner join result_m1 ON m1.reg_card_id = result_m1.ref1 AND result_m1.result_status = 1 AND result_m1.room = ". $room ." ORDER BY result_m1.room ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 1/$room";
            $str_plan = "";
            break;
        case 'm4': // m1-smte
            $sql = "SELECT m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.reg_tel, m4.father_tel, m4.mother_tel, m4.parent_tel,result_m4.result_no ,result_m4.payment_name,result_m4.payment,m4.reg_card_id,result_m4.confirm01_status,result_m4.result_text,result_m4.room from m4 inner join result_m4 ON m4.reg_card_id = result_m4.ref1 AND result_m4.result_status = 1 AND result_m4.room = ". $room ." ORDER BY result_m4.room ASC";
            $str_m = "ชั้นมัธยมศึกษาปีที่ 4/$room";
            $str_plan = "";
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

    <title>โรงเรียนสตรีภูเก็ต | ห้องเรียนทั่วไป <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class=" text-center">
        <img src="../../../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear ?> ห้องเรียนทั่วไป</p>
            <p class="lead text-muted">  <?php echo $str_m ?> </p>
            <p class="lead text-muted">  <?php echo $str_plan ?> </p>
            <hr class="my-4">
        </div>
    </div>
    <div class="container">
    <a class="btn btn-primary" href="../" role="button"><i class='bx bx-home' ></i> กลับหน้าแรก</a>
    <a class="btn btn-success " href="export_to_execel.php?p=<?php echo $plan ?>&m=<?php echo $room ?>" role="button"><i class='bx bxs-spreadsheet'></i> นำออก Excel</a>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อ - สกุล</th>
            <th scope="col">เลขประจำตัวประชาชน</th>
            <th scope="col">ผลสอบ</th>
            <th scope="col">เบอร์ติดต่อ</th>
            <th scope="col">ห้อง</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

    <?php

        try{
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $n = 1;
            while ($row = $stmt -> fetch() )   {
                // echo '<pre>';
                // print_r($row);
                // echo '</pre>';
                echo '<tr><th scope="row">' . $n . '. </th>';
                echo  '<td>' .$row[0] . ' ' . $row[1] . '  ' . $row[2] . '</td>';
                echo '<td>'. $row[10] .  '</td>';
                echo '<td>'. $row['result_text'] .  '</td>';
                echo '<td>' . $row[3] . ' | '. $row[4] . ' | ' . $row[5] . '</td>';
                echo '<td>'. $row['room'] .  '</td>';
                if ($row['confirm01_status'] == 1){
                    $status = '<a href="update.php?m='. $room .'&p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-info">ยืนยันสิทธิ์สมบูรณ์</span></a>';
                    if ($row[11] == 1){
                        $status = '<a href="update.php?m='. $room .'&p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-success">ยืนยันสิทธิ์สมบูรณ์</span></a>';
                    }
                }else{
                    $status = '<a href="update.php?m='. $room .'&p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-secondary">รอการยืนยันสิทธิ์</span></a>';
                    // $status = '<span class="badge rounded-pill bg-secondary">ยังไม่ส่งหลักฐาน</span>';
                }
                if($row['confirm01_status']==2){
                    $status = '<a href="update.php?m='. $room .'&p='. $plan .'&idcard=%27' .$row[10] . '%27" ><span class="badge rounded-pill bg-danger">สละสิทธิ์</span></a>';
                }
                echo '<td>'. $status .  '</td>';

                echo "</tr>";
                $n++;
            }
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
    
        }

    ?>
        </tbody>
    </table>


    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
    </div>


</body>
</html>
