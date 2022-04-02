<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
        //echo "2";
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
$year_education = "2563"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน ปีการศึกษา <?php echo $year_education; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>
    <div class="container text-center">
        <h1>โรงเรียนสตรีภูเก็ต</h1>
        <h2>ระบบจัดการ รับสมัครสอบคัดเลือกเข้าเรียน ประเภทห้องเรียนพิเศษ</h2>
        <hr>
        <a class="btn btn-outline-primary btn-lg" href="index.php"><i class="fas fa-home"></i>  กลับหน้าแรก</a>
        <br />
        <br />
        <form class="form" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="id_card" placeholder="เลขประจำตัวประชาชน #Ref. 1"
                    aria-label="เลขประจำตัวประชาชน #Ref. 1" aria-describedby="button-id" required>

            </div>
            <div class="input-group mb-3">
                <input type="number" id="ref2" class="form-control" name="ref2"
                    placeholder="เลขประจำตัวผู้สมัคร #Ref. 2" aria-label=" #Ref. 2" aria-describedby="button-id"
                    required>
            </div>
            <div class="text-center">
                <button class="btn btn-outline-primary btn-lg" type="submit" id="button-id"><i
                        class="fas fa-search"></i>
                    ค้นหา</button>
            </div>
        </form>
        <br />
        <?php
if (isset($_POST['id_card'])) {

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        //$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $m1_s_Result  = null;
        $m1_ip_Result = null;
        $m4_s_Result  = null;
        $m4_ip_Result = null;
        //m1s001 ref#2
        $m1_s_Result  = $conn->query("SELECT count(*) FROM m1_s WHERE m1s001 = '". $_POST['ref2'] ."' AND  m1s003 = '" . $_POST['id_card'] . "'")->fetchColumn();
        $m1_ip_Result = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s001 = '". $_POST['ref2'] ."' AND m1s003 = '" . $_POST['id_card'] . "'")->fetchColumn();
        $m4_s_Result  = $conn->query("SELECT count(*) FROM m4_s WHERE m1s001 = '". $_POST['ref2'] ."' AND m1s003 = '" . $_POST['id_card'] . "'")->fetchColumn();
        $m4_ip_Result = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s001 = '". $_POST['ref2'] ."' AND m1s003 = '" . $_POST['id_card'] . "'")->fetchColumn();
        //echo "m1_s: " . $m1_s_Result . "  | m1_ip: " . $m1_ip_Result . "  | m4_s: " . $m4_s_Result . "  | m4_ip: " . $m4_ip_Result . "  |||" . $sum_Row;
        if ($m1_s_Result == 1) {
            $tmp_sql      = "SELECT * FROM m1_s WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $m            = "1";
            $table_update = "m1_s";
        } elseif ($m1_ip_Result == 1) {
            $tmp_sql      = "SELECT * FROM m1_ip WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $m            = "1";
            $table_update = "m1_ip";
            
        } elseif ($m4_s_Result == 1) {
            $tmp_sql      = "SELECT * FROM m4_s WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $m            = "4";
            $table_update = "m4_s";
        } elseif ($m4_ip_Result == 1) {
            $tmp_sql      = "SELECT * FROM m4_ip WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $m            = "4";
            $table_update = "m4_ip";
        }else{
            echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>";
            echo "ไม่พบข้อมูลผู้สมัคร";
            echo "</div>";
            exit;           
        }
        //echo "<br>" . $tmp_sql;
        $stmt = $conn->prepare($tmp_sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {

            switch ($row['m1s290']) {
                case '1':
                    $student_plan = "SMTE ชั้นมัธยมศึกษาปีที่  " . $m;
                    $sub_plan = 1;
                    break;
                case '2':
                    $student_plan = "IP แผนการเรียน ภาษาอังกฤษ - คณิตศาสตร์ ชั้นมัธยมศึกษาปีที่  " . $m;
                    $sub_plan = 2;
                    break;
                case '3':
                    $student_plan = "IP แผนการเรียน วิทยาศาสตร์ - คณิตศาสตร์ ชั้นมัธยมศึกษาปีที่  " . $m;
                    $sub_plan = 3;
                    break;
                case '4':
                    $student_plan = "IPC แผนการเรียน Cambridge ชั้นมัธยมศึกษาปีที่  " . $m;
                    $sub_plan = 4;
                    break;
            }
            //$student_ref2 = $row['m1s001'];
            $student_name   = $row['m1s010'] . $row['m1s020'] . " " . $row['m1s030'];
            $student_id_reg = $row['m1s001'];
            if ($student_id_reg < 1000) {
                if ($student_id_reg < 10) {
                    $student_id_reg = "000" . $student_id_reg;
                } elseif ($student_id_reg < 100) {
                    $student_id_reg = "00" . $student_id_reg;
                } else {
                    $student_id_reg = "0" . $student_id_reg;
                }
            }
            $student_id_card = $row['m1s003'];
            //ip เอาออก
           
            $student_math    = $row['m1s300'];
            $student_sci     = $row['m1s310'];
            //
            $str_file1 = $row['file_name_1'];
            $str_file2       = $row['file_name_2'];
            if ($row['file_name_3'] != "none") {
                $str_file3 = $row['file_name_3'];
            } else {
                $str_file3 = "none";
            }
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo "
              
        </div>

        <div class='footer'>
            <p><i class='far fa-copyright'></i> <a href='http://www.satreephuket.ac.th'>โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
                ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
        </div>
            ";
            exit;
    };
    $conn = null;
    ?>
        <fieldset class="border p-2">
            <legend class="w-auto">ข้อมูลผู้สมัคร: </legend>
            <table class="table">
                <tr class="table-primary">
                    <th scope="row" class="text-right">สมัครโครงการ:</th>
                    <td><?php echo $student_plan; ?></td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-right">เลขประจำผู้สมัคร #Ref.2:</th>
                    <td> <?php echo $student_id_reg; ?></td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-right">เลขประจำตัวประชาชน #Ref.1:</th>
                    <td><?php echo $student_id_card; ?></td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-right">ชื่อ-สุกล:</th>
                    <td><?php echo $student_name; ?></td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-right">เกรดเฉลี่ยวิชาคณิตศาสตร์พื้นฐาน: </th>
                    <td><?php echo $student_math; ?></td>
                </tr>
                <tr class="table-primary">
                    <th scope="row" class="text-right">เกรดเฉลี่ยวิชาวิทยาศาสตร์พื้นฐาน:</th>
                    <td><?php echo $student_sci; ?></td>
                </tr>
            </table>
        </fieldset>
        <fieldset class="border p-2 text-left">
            <legend class="w-auto">สถานะการสมัคร</legend>
            <form method="post">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_status" value="1" id="radio1" required>
                    <label class="form-check-label" for="radio1">รอการชำระเงิน</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_status" value="2" id="radio2" required>
                    <label class="form-check-label" for="radio2">เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_status" value="3" id="radio3" required>
                    <label class="form-check-label" for="radio3">ขาดคุณสมบัติ</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="change_status" value="4" id="radio4" required>
                    <label class="form-check-label" for="radio4">การสมัครสมบูรณ์</label>
                </div>
                <input type="hidden" name="student_ref2" value="<?php echo $student_id_reg;?>">
                <input type="hidden" name="student_id_card_hidden" value="<?php echo $student_id_card; ?>">
                <input type="hidden" name="student_name_hidden" value="<?php echo $student_name; ?>">
                <input type="hidden" name="table_update_hidden" value="<?php echo $table_update; ?>">
                <input type="hidden" name="student_sub_plan" value="<?php echo $sub_plan; ?>">

                <button class="btn btn-outline-primary" type="submit" id="button-id2"><i class="fas fa-edit"></i>
                    กำหนดสถานะการสมัคร</button>
    </div>
    </div>
    </form>
    </fieldset>
    <br />
    <div class="text-center">
        <p class="h4">รูปถ่าย</p>

        <image src='../app/file1/<?php echo $str_file1 ?>' width='10%' height='10%'>
            <br />
            <h4>หนังสือรับรองผลการเรียน หรือ เอกสารความเป็นนักเรียน</h4><br>
            <?php
    $file_type2 = substr($str_file2, -3);
    $file_type3 = substr($str_file3, -3);
    if ($file_type2 == "pdf") {
        echo "<embed src='../app/file2/" . $str_file2 . "' width='100%'' height='700px' />";
    } else {
        echo "<a href='../app/file2/" . $str_file2 . "' target='_blank'><img src='../app/file2/" . $str_file2 . "' width='50%' height='50%' ></a>";
    }

    // show file3
    if ($str_file3 != "none") {
        echo "<h4>หนังสือรับรองผลการเรียน หรือ เอกสารความเป็นนักเรียน ไฟล์ที่ 2</h4><br>";
        if ($file_type3 == "pdf") {
            echo "<embed src='../app/file3/" . $str_file3 . "' width='100%'' height='700px' />";
        } else {
            echo "<a href='../app/file3/" . $str_file3 . "' target='_blank'><img src='../app/file3/" . $str_file3 . "' width='50%' height='50%' ></a>";
        }
    }
    ?>

    </div>

    <?php
}
// update state

if (isset($_POST['change_status'])) {
    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET status = '" . $_POST['change_status'] . "' WHERE m1s003 = '" . $_POST['student_id_card_hidden'] . "'";
    //echo $_POST['student_id_card_hidden'] . $_POST['student_name_hidden'] . $_POST['change_status'];
    //echo "<br>" . $sql_update_status;
    
    if ($_POST['change_status'] == 4) {
       
        switch ($_POST['table_update_hidden']) {
            case 'm1_s':
                $conn_m1smte = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn_m1smte->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $m1_smte_exec = $conn_m1smte->prepare("SELECT * FROM room WHERE rid < 21 AND r_current <= 39 LIMIT 1");
                $m1_smte_exec->execute();
                while ($row_m1smte=$m1_smte_exec->fetch()) {
                    $tmp_rid = $row_m1smte['rid'];
                    $tmp_room = $row_m1smte['r_name'];
                    $tmp_current = $row_m1smte['r_current'] + 1;
                }
                $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                $str_sql_insert = "INSERT INTO ex_m1_s (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                //echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                try {
                    $conn_m1smte->exec($str_sql_update);
                    $conn_m1smte->exec($str_sql_insert);
                } catch (PDOExcption $e) {
                    echo "M1 SMTE error = " . $e ;
                }
                $conn_m1smte = null;
                break;
            case 'm1_ip':

                $conn_m1ip = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn_m1ip->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                if ($_POST['student_sub_plan'] == 4){
                    $m1_ip_exec = $conn_m1ip->prepare("SELECT * FROM room WHERE rid = 30 AND r_current <= 39 LIMIT 1");
                    $m1_ip_exec->execute();
                    while ($row_m1ip=$m1_ip_exec->fetch()) {
                        $tmp_rid = $row_m1ip['rid'];
                        $tmp_room = $row_m1ip['r_name'];
                        $tmp_current = $row_m1ip['r_current'] + 1;
                    }
                    $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                    $str_sql_insert = "INSERT INTO ex_m1_ip_cam (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                   // echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                }
                else{
                    $m1_ip_exec = $conn_m1ip->prepare("SELECT * FROM room WHERE rid > 20 AND r_current <= 39 LIMIT 1");
                    $m1_ip_exec->execute();
                    while ($row_m1ip=$m1_ip_exec->fetch()) {
                        $tmp_rid = $row_m1ip['rid'];
                        $tmp_room = $row_m1ip['r_name'];
                        $tmp_current = $row_m1ip['r_current'] + 1;
                    }
                    $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                    $str_sql_insert = "INSERT INTO ex_m1_ip (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                   // echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                }
                try {
                    $conn_m1ip->exec($str_sql_update);
                    $conn_m1ip->exec($str_sql_insert);
                } catch (PDOExcption $e) {
                    echo "M1 IP error = " . $e ;
                }
            
                $conn_m1ip = null;
                break;
            case 'm4_s':
                $conn_m4smte = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn_m4smte->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $m4_smte_exec = $conn_m4smte->prepare("SELECT * FROM room WHERE rid > 30 AND r_current <= 39 LIMIT 1");
                $m4_smte_exec->execute();
                while ($row_m4smte=$m4_smte_exec->fetch()) {
                    $tmp_rid = $row_m4smte['rid'];
                    $tmp_room = $row_m4smte['r_name'];
                    $tmp_current = $row_m4smte['r_current'] + 1;
                }
                $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                $str_sql_insert = "INSERT INTO ex_m4_s (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                //echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                try {
                    $conn_m4smte->exec($str_sql_update);
                    $conn_m4smte->exec($str_sql_insert);
                } catch (PDOExcption $e) {
                    echo "M4 SMTE error = " . $e ;
                }
                $conn_m4smte = null;
                break;
            case 'm4_ip':
                
                $conn_m4ip = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn_m4ip->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if ($_POST['student_sub_plan'] == 4){
                    $m4_ip_exec = $conn_m4ip->prepare("SELECT * FROM room WHERE rid = 40 AND r_current <= 39 LIMIT 1");
                    $m4_ip_exec->execute();
                    while ($row_m4ip=$m4_ip_exec->fetch()) {
                        $tmp_rid = $row_m4ip['rid'];
                        $tmp_room = $row_m4ip['r_name'];
                        $tmp_current = $row_m4ip['r_current'] + 1;
                    }
                    $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                    $str_sql_insert = "INSERT INTO ex_m4_ip_cam (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                    //echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                }else{
                    $m4_ip_exec = $conn_m4ip->prepare("SELECT * FROM room WHERE rid > 36 AND r_current <= 39 LIMIT 1");
                    $m4_ip_exec->execute();
                    while ($row_m4ip=$m4_ip_exec->fetch()) {
                        $tmp_rid = $row_m4ip['rid'];
                        $tmp_room = $row_m4ip['r_name'];
                        $tmp_current = $row_m4ip['r_current'] + 1;
                    }
                    $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
                    $str_sql_insert = "INSERT INTO ex_m4_ip (ref1,ref2,ex_room) VALUES ('".$_POST['student_id_card_hidden']."', '". $_POST['student_ref2'] ."','". $tmp_room ."')";
                //echo  "update = ". $str_sql_update . "<br>insert = " . $str_sql_insert;
                }
                try {
                    $conn_m4ip->exec($str_sql_update);
                    $conn_m4ip->exec($str_sql_insert);
                } catch (PDOExcption $e) {
                    echo "M4 IP error = " . $e ;
                }
                $conn_m4ip = null;
                break;
        }
        
    }

    //Process Update status 
    $edit_status = $conn2->prepare($sql_update_status);
    $edit_status->execute();
  
    switch ($_POST['change_status']) {
        case 1:
            $tmp_str_status = "รอการชำระเงิน";
            $alert_status   = "alert-info";
            break;
        case 2:
            $tmp_str_status = "เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)";
            $alert_status   = "alert-warning";
            break;
        case 3:
            $tmp_str_status = "ขาดคุณสมบัติ";
            $alert_status   = "alert-danger";
            break;
        case 4:
            $tmp_str_status = "การสมัครสมบูรณ์";
            $alert_status   = "alert-success";
            break;
    }

    ?>
    <div class="alert <?php echo $alert_status; ?> text-center" role="alert">
        <h4 class="alert-heading">เลขประจำตัวประชาชนเลขที่ <?php echo $_POST['student_id_card_hidden']; ?> </h4>
        <p>ชื่อ <?php echo $_POST['student_name_hidden']; ?> เปลี่ยนสถานะการสมัครเป็น <h4>
                <?php echo $tmp_str_status; ?></h4>
        </p>
        <hr>
        <p class="mb-0"><?php echo $edit_status->rowCount() . " records UPDATED successfully"; ?></p>
    </div>
    <?php
}
; //update state
$conn2 = null;
?>

    </div>


    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>

</body>

</html>