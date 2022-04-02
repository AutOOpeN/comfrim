<?php
require_once "../../config/function.php";
require_once '../../config/settings.config.php';
require_once '../../spk/word.php';
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
$spkObject  = new spk();
// $spkObject->spkHeader();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>ระบบรับนักเรียน ห้องเรียนปกติ <?php echo $strEducationYear ?></title>
    <meta charset='utf-8'>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='../../../Font-Awesome/css/all.css'>
    <script src='../../../js/jquery-3.3.1.min.js'></script>
    <script src='../../../js/popper.min.js'></script>
    <script src='../../../bootstrap/dist/js/bootstrap.min.js'></script>

    <link rel='stylesheet' type='text/css' href='../../../css/style.css'>
</head>

<body>
    <div class=" text-center">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"><?php echo $strTitle . "  " . $strEducationYear; ?></p>
            <hr>
        </div>
    </div>
    <div class="container text-center">
        <a class="btn btn-outline-primary btn-lg" href="index.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
        <div class="row content">

            <div class="col-sm-10 text-left">
                <h4 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">ตรวจสอบเอกสารประกอบการสมัคร โครงการพิเศษ</h4>
                <form class="form" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="id_card" placeholder="เลขประจำตัวประชาชน #Ref. 1" aria-label="เลขประจำตัวประชาชน #Ref. 1" aria-describedby="button-id" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="id" placeholder="เลขประจำตัวผู้สมัคร #Ref. 2" aria-label="เลขประจำตัวผู้สมัคร #Ref. 2" aria-describedby="button-id" required>
                    </div>
                    <div class=" mb-3">
                        <button class="btn btn-outline-primary" type="submit" id="button-id"><i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                </form>
                <?php
                if (isset($_POST['id_card'])) {
                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //$conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                        //$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $m1ip_Result  = null;
                        $m4s_Result = null;
                        $m1s_Result  = null;
                        $m4ip_Result = null;

                        $m1ip_Result = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s003 = '" . $_POST['id_card'] . "' AND m1s001 ="  . $_POST['id'])->fetchColumn();
                        $m4ip_Result = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s003 = '" . $_POST['id_card'] . "'AND m1s001 ="  . $_POST['id'])->fetchColumn();
                        $m1s_Result = $conn->query("SELECT count(*) FROM m1_s WHERE m1s003 = '" . $_POST['id_card'] . "'AND m1s001 ="  . $_POST['id'])->fetchColumn();
                        $m4s_Result = $conn->query("SELECT count(*) FROM m4_s WHERE m1s003 = '" . $_POST['id_card'] . "'AND m1s001 ="  . $_POST['id'])->fetchColumn();
                        // $m4_Result = $conn->query("SELECT count(*) FROM m4 WHERE reg_card_id = '" . $_POST['id_card'] . "'")->fetchColumn();
                        //echo "m1_s: " . $m1_s_Result . "  | m1_ip: " . $m1_ip_Result . "  | m4_s: " . $m4_s_Result . "  | m4_ip: " . $m4_ip_Result . "  |||" . $sum_Row;

                        if ($m1ip_Result == 1) {
                            $tmp_sql      = "SELECT * FROM m1_ip WHERE m1s003 = '" . $_POST['id_card'] . "'";
                            $m            = "โครงการพิเศษ มัธยมศึกษาปีที่ 1";
                            $table_update = "m1_ip";
                        } elseif ($m4ip_Result == 1) {
                            $tmp_sql      = "SELECT * FROM m4_ip WHERE m1s003 = '" . $_POST['id_card'] . "'";
                            $m            = "โครงการพิเศษ มัธยมศึกษาปีที่ 4";
                            $table_update = "m4_ip";
                        } elseif ($m1s_Result == 1) {
                            $tmp_sql      = "SELECT * FROM m1_s WHERE m1s003 = '" . $_POST['id_card'] . "'";
                            $m            = "โครงการ SMTE มัธยมศึกษาปีที่ 1";
                            $table_update = "m1_s";
                        } elseif ($m4s_Result == 1) {
                            $tmp_sql      = "SELECT * FROM m4_s WHERE m1s003 = '" . $_POST['id_card'] . "'";
                            $m            = "โครงการ SMTE มัธยมศึกษาปีที่ 4";
                            $table_update = "m4_s";
                        } else {
                            $tmp_sql      = "";
                            $m            = "";
                            $table_update = "";
                        }
                        //echo "<br>" . $tmp_sql;
                        $stmt = $conn->prepare($tmp_sql);
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            $chk_checked_0 = "";
                            $chk_checked_1 = "";
                            $chk_checked_2 = "";
                            $chk_checked_3 = "";
                            $area_status_0 = "";
                            $area_status_1 = "";
                            $area_status_2 = "";

                            switch ($row['status']) {
                                case 1:
                                    $chk_checked_0 = "checked";
                                    break;
                                case 2:
                                    $chk_checked_1 = "checked";
                                    break;
                                case 3:
                                    $chk_checked_2 = "checked";
                                    break;
                                case 4:
                                    $chk_checked_3 = "checked";
                                    break;
                            }

                            switch ($row['area_id']) {
                                case 0:
                                    $area_status_0 = "checked";
                                    break;
                                case 1:
                                    $area_status_1 = "checked";
                                    break;
                                case 2:
                                    $area_status_2 = "checked";
                                    break;
                            }
                            $reg_tel = $row['m1s110'] . " |  " . $row['m1s250'];
                            
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
                            $str_file1       = $row['file_name_1'];
                            $str_file2       = $row['file_name_2'];
                            $score_math  = $row['m1s300']; 
                            $score_sci =  $row['m1s310']; 
                            $score_mid =  $row['m1s320']; 
                            if ($row['file_name_3'] != "none") {
                                $str_file3 = $row['file_name_3'];
                            } else {
                                $str_file3 = "none";
                            }
                        }
                    } catch (PDOException $e) {
                        echo "<div class='alert alert-warning' role='alert'>
                ไม่พบผู้สมัคร!! </div>";
                        // echo "Error: " . $e->getMessage();
                        $conn = null;
                        exit();
                    };
                    $conn = null;
                ?>
                    <div>

                        <table class="table">
                            <tr class="table-primary">
                                <th scope="row" class="text-right">สมัครเข้าเรียน:</th>
                                <td><?php echo  $m; ?></td>
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
                                <th scope="row" class="text-right">เบอร์ติดต่อ:</th>
                                <td><?php echo $reg_tel; ?></td>
                            </tr>
                            <?php
                                if ($table_update == 'm1_s' || $table_update =='m4_s' ) {
                            ?>
                            <tr class="table-primary">
                                <th scope="row" class="text-right">เกรด:</th>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <?php echo 'คณิตศาสตร์: '. $score_math;?>
                                            </td>
                                            <td>
                                                <?php echo 'วิทยาศาสตร์: '. $score_sci;?>
                                            </td>
                                            <td>
                                                <?php echo 'เกรดเฉลี่ย: '. $score_mid;?>
                                            </td>
                                        </tr>

                                    </table>
                                   
                                </td>
                            </tr>                            
                            <?php
                                    # code...
                                } 
                                
                            ?>

                        </table>
                    </div>
                    <div class="bg-light">
                        <form method="post">
                            <div class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">สถานะการสมัคร</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="change_status" value="1" id="radio1" required <?php echo $chk_checked_0; ?>>
                                            <label class="form-check-label" for="radio1">รอการชำระเงิน</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="change_status" value="2" id="radio2" required <?php echo $chk_checked_1; ?>>
                                            <label class="form-check-label" for="radio2">เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="change_status" value="3" id="radio3" required <?php echo $chk_checked_2; ?>>
                                            <label class="form-check-label" for="radio3">ขาดคุณสมบัติ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="change_status" value="4" id="radio4" required <?php echo $chk_checked_3; ?>>
                                            <label class="form-check-label" for="radio4">การสมัครสมบูรณ์</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="student_id_card_hidden" value="<?php echo $student_id_card; ?>">
                                <input type="hidden" name="student_name_hidden" value="<?php echo $student_name; ?>">
                                <input type="hidden" name="table_update_hidden" value="<?php echo $table_update; ?>">
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-sm-10">
                                    <button class="btn btn-primary" type="submit" id="button-id2"><i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลงสถานะการสมัคร</button>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div>

                        <?php

                        $file_type2 = substr($str_file2, -3);
                        $file_type3 = substr($str_file3, -3);


                        ?>


                        <div class="container">
                            <?php
                            echo '<hr>';
                            echo "<p class='h4'>รูปถ่าย</p>";
                            echo "<image src='../file1/$str_file1' width='350' height='350'>";
                            echo "
                                    <br>
                                    <form action='upload/image.php' method='post'>
                                    <input type='hidden' name='student_id' value='$student_id_card'>
                                    <input type='hidden' name='student_reg_id' value=' $student_id_reg'>
                                    <input type='hidden' name='student_tmp_name' value='$student_name'>
                                    <input type='hidden' name='table_update_hidden' value='$table_update'>
                                    <input type='hidden' name='student_m' value='$m'>
                                    <button class='btn btn-warning' type='submit'  >แก้ไขรูปภาพ-</button>
                                    </form>
                                ";
                            echo '<hr>';
                            echo '<h4>หนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 1</h4><br>';
                            if ($str_file2 != "none") {
                                if ($file_type2 == "pdf") {
                                    echo "<embed src='../file2/" . $str_file2 . "' width='100%'' height='700px' />";
                                } else {
                                    echo "<a href='../file2/" . $str_file2 . "' target='_blank'><img src='../file2/" . $str_file2 . "' width='50%' height='50%' ></a>";
                                }
                            } else {
                                echo "<p class='text-danger'>หนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 1</p>";
                            }

                            echo "
                                    <br>
                                    <form action='upload/file2.php' method='post'>
                                    
                                    <input type='hidden' name='student_id' value='$student_id_card'>
                                    <input type='hidden' name='student_reg_id' value=' $student_id_reg'>
                                    <input type='hidden' name='student_tmp_name' value='$student_name'>
                                    <input type='hidden' name='table_update_hidden' value='$table_update'>
                                    <input type='hidden' name='student_m' value='$m'>
                                    <button class='btn btn-warning' type='submit'  >แก้ไขหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 1</button>
                                    </form>
                                ";

                            //file 3
                            echo '<hr>';
                            if ($str_file3 != "none") {
                                echo "<h4> หนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2</h4><br>";
                                if ($file_type3 == "pdf") {
                                    echo "<embed src='../file3/" . $str_file3 . "' width='100%'' height='700px' />";
                                } else {
                                    echo "<a href='../file3/" . $str_file3 . "' target='_blank'><img src='../file5/" . $str_file3 . "' width='50%' height='50%' ></a>";
                                }
                            } else {
                                echo "<p> หนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2 ไม่มี</p> <br>";
                            }
                            echo "
                                <br>
                                <form action='upload/file3.php' method='post'>
                                <input type='hidden' name='student_id' value='$student_id_card'>
                                <input type='hidden' name='student_reg_id' value=' $student_id_reg'>
                                <input type='hidden' name='student_tmp_name' value='$student_name'>
                                <input type='hidden' name='table_update_hidden' value='$table_update'>
                                <input type='hidden' name='student_m' value='$m'>
                                <button class='btn btn-warning' type='submit'  >แก้ไขหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2</button>
                                </form>
                            ";

                            ?>
                        </div>





                    </div>
                    <?php

                }

                // update state
                if (isset($_POST['change_status'])) {
                    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // if ($_POST['table_update_hidden'] == "m1") {

                    //     if ($_POST['area_status'] == '0') {
                    //         $area_name = "รอการตรวจสอบ";
                    //     } elseif ($_POST['area_status'] == '1') {
                    //         $area_name = "ทัวไป";
                    //     } elseif ($_POST['area_status'] == '2') {
                    //         $area_name = "ในเขตพื้นที่บริการ";
                    //     }
                    //     $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET register_status = '" . $_POST['change_status'] . "' ,  area_id = '" . $_POST['area_status'] . "' ,  area_name = '" . $area_name . "' ,  reg_onet_point = '" . $_POST['editONET'] . "'  WHERE reg_card_id = '" . $_POST['student_id_card_hidden'] . "'";

                    // } elseif ($_POST['table_update_hidden'] == "m4") {
                    //     $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET register_status = '" . $_POST['change_status'] . "' ,   reg_onet_point = '" . $_POST['editONET'] . "'  WHERE reg_card_id = '" . $_POST['student_id_card_hidden'] . "'";
                    // }
                    $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET status = '" . $_POST['change_status'] . "' WHERE m1s003 = '" . $_POST['student_id_card_hidden'] . "'";
                    switch ($_POST['change_status']) {
                        case '1':
                            $chk_status = "รอการชำระเงิน";
                            $alert_status = "alert-primary";
                            break;
                        case '2':
                            $chk_status = "เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)";
                            $alert_status = "alert-warning";
                            break;
                        case '3':
                            $chk_status = "ขาดคุณสมบัติ";
                            $alert_status = "alert-danger";
                            break;
                        case '4':
                            $chk_status = "การสมัครสมบูรณ์";
                            $alert_status = "alert-success";
                            break;
                    }
                    $edit_status = $conn2->prepare($sql_update_status);
                    $edit_status->execute();

                    if ($edit_status->rowCount() > 0) {
                    ?>
                        <div class="alert <?php echo $alert_status; ?> " role="alert">

                            <h4 class="alert-heading">เลขประจำตัวประชาชน #Ref.1 <?php echo $_POST['student_id_card_hidden']; ?><br>
                                ชื่อ: <?php echo $_POST['student_name_hidden']; ?>
                                <br>เปลี่ยนสถานะเป็น: <?php echo $chk_status ?>
                            </h4>
                        </div>
                <?php
                    } else {
                        echo "<p class='mb-0'> ไม่มีการเปลี่ยนแปลงสถานะ </p>";
                    }
                }; //update state
                $conn = null;
                ?>
                </table>
            </div>
            <?php
            // $spkObject->spkFooter();
            ?>
        </div>
</body>

</html>