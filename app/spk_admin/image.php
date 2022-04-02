<?php

require_once "../../config/function.php";
require_once '../../config/settings.config.php';
require_once "../../class/PDO.class.php";
$database = new DB(DBHost, DBName, DBUser, DBPassword);

$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP

$id = $_POST['student_id'];
$m = "m" . $_POST['student_m'];
// echo $id . '<br> ' . $m;
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
    <link rel='stylesheet' type='text/css' href='../../bootstrap/dist/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='../../Font-Awesome/css/all.css'>

    <script src='../../js/jquery-3.3.1.min.js'></script>
    <script src='../../js/popper.min.js'></script>
    <script src='../../bootstrap/dist/js/bootstrap.min.js'></script>
    <link rel='stylesheet' type='text/css' href='../css/app_css.css'>
    <link rel='stylesheet' type='text/css' href='../css/admin.css'>

</head>

<body>
    <div class=" text-center">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
            <hr>
        </div>
    </div>
    <div class="container">
        <div style="margin: 3.0rem"></div>
        <?php

        switch ($m) {
            case 'm1':
                $student_plan = "ชั้นมัธยมศึกษาปีที่ 1";
                break;
            case 'm4':
                $student_plan = "ชั้นมัธยมศึกษาปีที่ 4";
                break;
        }
        ?>
        <div>

            <table class="table table-striped">
                <tr>
                    <td scope="row" width="20%">สมัครเข้าเรียน: </td>
                    <td><?php echo $student_plan ?></td>
                </tr>
                <tr>
                    <td scope="row">เลขประจำตัวประชาชน #Ref.1: </td>
                    <td><?php echo $id ?></td>
                </tr>
                <tr>
                    <td scope="row">เลขประจำผู้สมัคร #Ref.2: </td>
                    <td><?php echo $reg_id ?></td>
                </tr>
                <tr>
                    <td scope="row">ชื่อ-สุกล: </td>
                    <td><?php echo $student ?></td>
                </tr>
                <tr>
                    <td scope="row">เบอร์ติดต่อ: </td>
                    <td><?php echo $reg_tel ?></td>
                </tr>
                <tr>
                    <td scope="row">แผนการเรียนลำดับที่ 1: </td>
                    <td><?php echo $reg_plan1_name ?></td>
                </tr>
                <tr>
                    <td scope="row">แผนการเรียนลำดับที่ 2: </td>
                    <td><?php echo $reg_plan2_name ?></td>
                </tr>
            </table>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" id="student_id" name="student_id" value="<?php echo $id ?>">
            <input type="hidden" name="m" value="<?php echo $m ?>">
            <fieldset class="myfieldset">
                <legend class="myfieldset">หลักฐานการสมัคร รูปถ่าย </legend>
                <div class="custom-file">


                    <input type="file" name="file1" id="file-upload" class="custom-file-input">
                    <label class="custom-file-label" for="file1">เลือกรูปถ่าย</label>
                </div>
                <div id="file-upload-filename"></div>
                <div style="margin: 3.0rem"></div>
                <button class="btn grey" type="submit">ส่ง</button>
            </fieldset>
        </form>



        <?php

        if (isset($_FILES['file1'])) {
            $file01_extension = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
            if ($file01_extension != "") {
                $new_file01_name = $_POST['m'] . '_img_' . $_POST['student_id'] . "." . $file01_extension;
                $file01_path     = "/var/www/html/admission/file1/";
                $upload_path01   = $file01_path . $new_file01_name;
            } else {
                $new_image_name = "none";
                echo $new_image_name;
            }
            if ($file01_extension != "") {
                $status_file1 = move_uploaded_file($_FILES['file1']['tmp_name'], $upload_path01);

                if ($status_file1 == false) {
                    echo "ไม่สามารถบันทึก รูปถ่าย";
                    //exit();
                }
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql_update = "UPDATE " . $_POST['m'] . " SET file_name_1 =  '" . $new_file01_name . "' WHERE  reg_card_id = '" . $_POST['student_id'] . "'";
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

        ?>


        <!-- back to index -->
        <form class="form" action="status.php" method="post">
            <input type="hidden" name="id_card" value="<?php echo $id ?>">
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