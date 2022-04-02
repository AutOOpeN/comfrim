<?php

session_start();
if (!isset($_SESSION['admin_level'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_start();
    //session_unset();
    session_destroy();
    header("Location: ../login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

require_once "../../../config/function.php";
include("../../../config/settings.config.php");


$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP

$id = $_POST['student_id'];
$id2 = $_POST['student_reg_id'];
$tbl_update = $_POST['table_update_hidden'];
$m = "m" . $_POST['student_m'];
$student = $_POST['student_tmp_name'];
//echo $id . '<br> ' . $m;
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <title>ระบบรับนักเรียน</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='../../../Font-Awesome/css/all.css'>

    <script src='../../../js/jquery-3.3.1.min.js'></script>
    <script src='../../../js/popper.min.js'></script>
    <script src='../../../bootstrap/dist/js/bootstrap.min.js'></script>
    <link rel='stylesheet' type='text/css' href='../../../admission/css/app_css.css'>
    <link rel='stylesheet' type='text/css' href='../../../admission/css/admin.css'>

</head>

<body>
    <div class=" text-center">
        <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div style="margin: 3.0rem"></div>
        <?php


        ?>
        <div>

            <table class="table table-striped">
                <tr>
                    <td scope="row">เลขประจำตัวประชาชน #Ref.1: </td>
                    <td><?php echo $id ?></td>
                </tr>

                <tr>
                    <td scope="row">ชื่อ-สุกล: </td>
                    <td><?php echo $student ?></td>
                </tr>

            </table>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="student_id" name="student_id" value="<?php echo $id ?>">
            <input type="hidden" id="student_reg_id" name="student_reg_id" value="<?php echo $id2 ?>">
            <input type="hidden" name="m" value="<?php echo $m ?>">
            <input type="hidden" name="tbl" value="<?php echo $tbl_update ?>">

            <fieldset class="myfieldset">
                <legend class="myfieldset">สำเนาหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2 </legend>
                <label class="form-label" for="file3">เลือกสำเนาหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2</label>
                <input type="file" name="file3" id="file3" class="form-control">

                <div style="margin: 3.0rem"></div>
                <button class="btn green" type="submit">ส่ง</button>
            </fieldset>
        </form>



        <?php

        if (isset($_FILES['file3'])) {
            $file01_extension = pathinfo(basename($_FILES['file3']['name']), PATHINFO_EXTENSION);
            if ($file01_extension != "") {
                $new_file01_name = $_POST['tbl'] . '_img_' . $_POST['student_id'] . "." . $file01_extension;
                $file01_path     = "/var/www/html/app/file3/";
                $upload_path01   = $file01_path . $new_file01_name;
            } else {
                $new_image_name = "none";
                echo $new_image_name;
            }

            if ($file01_extension != "") {
                $status_file3 = move_uploaded_file($_FILES['file3']['tmp_name'], $upload_path01);
                //echo '123';
                if ($status_file3 == false) {
                    echo "ไม่สามารถส่งไฟล์ สำเนาหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 2";
                    //exit();
                }
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql_update = "UPDATE " . $_POST['tbl'] . " SET file_name_3 =  '" . $new_file01_name . "' WHERE  m1s003 = '" . $_POST['student_id'] . "'";
                    //echo $sql_update;
                    $stmt = $conn->prepare($sql_update);
                    $stmt->execute();
                    echo "
                            <div class='alert alert-success text-center' role='alert'>
                                การแก้ไขไฟล์สำเร็จ กรุณากดกลับหน้าแรก
                            </div>
                        ";
                } catch (PDOException $e) {
                    echo $e;
                }
            }
        }
        //  echo $upload_path01;
        //  echo "<img src='../../file3/" . $new_file01_name ."' >";
        //  echo "";
        ?>


        <!-- back to index -->
        <form class ="form" action="../status.php" method="post">
            <input type="hidden" name="id_card" value="<?php echo $id ?>">
            <input type="hidden" name="id" value="<?php echo $id2 ?>">
            <button class="btn green" type="submit">กลับหน้าแรก</button>
        </form>

    </div>
    <div style="margin: 10.0rem"></div>
    <footer class=' text-center'>
        <p>
            <i class='far fa-copyright'></i><?php $y = date("Y");
                                            echo $y ?> copyright
        </p>
    </footer>

</body>

</html>