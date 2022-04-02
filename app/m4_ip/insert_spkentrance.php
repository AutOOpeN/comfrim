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
        <title>ระบบรับนักเรียน ม. 4 โครงการพิเศษ IP <?php echo $strEducatonYear ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="spk.js"></script>
    <body>
        <div class="text-center">
        <img src="../../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 class="jumbotron-heading">ระบบรับนักเรียน<?php echo $strEducatonYear ?> </h1>
                <hr>
                <p class="lead text-muted">ใบสมัครเข้าศึกษาโครงการห้องเรียนพิเศษ IP โรงเรียนสตรีภูเก็ต </p>
                <p class="lead text-muted">ชั้นมัธยมศึกษาปีที่ 4 <?php echo $strEducatonYear ?></p>
                <hr>
            </div>
        </div>

    <div class="container">
        <?php
$prov   = SplitString($_POST['province']);
$prov_3 = SplitString($_POST['province_3']);

$am   = SplitString($_POST['amphur']);
$am_3 = SplitString($_POST['amphur_3']);

$dis = SplitString($_POST['district']);

$yyyymmdd = $_POST['myOptionYY'] . $_POST['myOptionMM'] . $_POST['myOptionDD'];
//$tmp_id_card = $_POST['xm1s003'];

//upload image
$img_extension  = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
$new_image_name = 'm4_ip_img_' . $_POST['xm1s003'] . "." . $img_extension;
$file1_path     = "/var/www/html/app/file1/";
$upload_path    = $file1_path . $new_image_name;

$file02_extension = pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
$new_file02_name  = 'm4_ip_file_' . $_POST['xm1s003'] . "." . $file02_extension;
$file2_path       = "/var/www/html/app/file2/";
$upload_path02    = $file2_path . $new_file02_name;

$file03_extension = pathinfo(basename($_FILES['file3']['name']), PATHINFO_EXTENSION);
if ($file03_extension != "") {
    $new_file03_name = 'm4_ip_file_' . $_POST['xm1s003'] . "." . $file03_extension;
    $file3_path      = "/var/www/html/app/file3/";
    $upload_path03   = $file3_path . $new_file03_name;
} else {
    $new_file03_name = "none";
}

//date_default_timezone_set(‘Asia / Bangkok’);
$rec_date = date('Y-m-d H:i:s');

//Insert
try {
    $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO m4_ip(m1s003 , m1s010 , m1s011, m1s020 , m1s030 , m1s040 , m1s050, m1s060 , m1s070 , m1s071 , m1s080 , m1s081 , m1s090 , m1s091 , m1s100, m1s110 , m1s120 , m1s130 , m1s140 , m1s150, m1s160 , m1s170 , m1s180 , m1s190 , m1s200, m1s210 , m1s220 , m1s230 , m1s240 , m1s250, m1s260 , m1s270 , m1s271 , m1s280 , m1s281 , m1s290 , m1s300, m1s310 , m1s320 , m1s330, file_name_1, file_name_2, file_name_3,m1s340 )
    VALUES(
    '" . $_POST['xm1s003'] . "',
    '" . $_POST['xm1s010'] . "',
    '" . $_POST['xm1s011'] . "',
    '" . $_POST['xm1s020'] . "',
    '" . $_POST['xm1s030'] . "',
    " . $yyyymmdd . "  ,
    '" . $_POST['xm1s050'] . "',
    '" . $_POST['xm1s060'] . "',
    '" . $dis[1] . "',
    '" . $dis[0] . "',
    '" . $am[1] . "',
    '" . $am[0] . "',
    '" . $prov[1] . "',
    '" . $prov[0] . "',
    '" . $am[2] . "',
    '" . $_POST['xm1s110'] . "',
    '" . $_POST['xm1s120'] . "',
    '" . $_POST['xm1s130'] . "',
    '" . $_POST['xm1s140'] . "',
    '" . $_POST['xm1s150'] . "',
    '" . $_POST['xm1s160'] . "',
    '" . $_POST['xm1s170'] . "',
    '" . $_POST['xm1s180'] . "',
    '" . $_POST['xm1s190'] . "',
    '" . $_POST['xm1s200'] . "',
    '" . $_POST['xm1s210'] . "',
    '" . $_POST['xm1s220'] . "',
    '" . $_POST['xm1s230'] . "',
    '" . $_POST['xm1s240'] . "',
    '" . $_POST['xm1s250'] . "',
    '" . $_POST['xm1s260'] . "',
    '" . $am_3[1] . "',
    '" . $am_3[0] . "',
    '" . $prov_3[1] . "',
    '" . $prov_3[0] . "',
    '" . $_POST['xm1s290'] . "',
    '" . $_POST['xm1s300'] . "',
    '" . $_POST['xm1s310'] . "',
    '" . $_POST['xm1s320'] . "',
    '" . $_POST['xm1s330'] . "',
    '" . $new_image_name . "',
    '" . $new_file02_name . "',
    '" . $new_file03_name . "',
    '" . $rec_date . "')
    ";
    //

    //echo "<br> SQL string = " . $sql . "<br>";
    $condb->exec($sql);
    //uploading
    $status_file1 = move_uploaded_file($_FILES['file1']['tmp_name'], $upload_path);
    if ($status_file1 == false) {
        echo "ไม่สามารถ upload รูปได้";
        exit();
    }

    //file02
    $status_file2 = move_uploaded_file($_FILES['file2']['tmp_name'], $upload_path02);
    if ($status_file2 == false) {
        echo "ไม่สามารถ upload ไฟล์ 2 ได้";
        exit();
    }

//file03
    if ($file03_extension != "") {
        $status_file3 = move_uploaded_file($_FILES['file3']['tmp_name'], $upload_path03);
        if ($status_file3 == false) {
            echo "ไม่สามารถ upload ไฟล์ 3 ได้";
            exit();
        }
    }

    ?>
        <div class="container">
            <div class="alert alert-success text-center" role="alert">
              <h4 class="alert-heading">ลงทะเบียนสำเร็จ</h4>
              <p><?php echo   $strPrint_Payment ?></p>
            <form action="../bill/payment.php" method="post">
                <input type="hidden" name="id_card" value=<?php echo $_POST['xm1s003']; ?>>
                <input type="hidden" name="plan" value="m4_ip">
                <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> พิมพ์ใบชำระเงินค่าสมัครสอบ</button>
            </form>
              <hr>
              <p class="mb-0"><?php echo $strPrint_CheckPlace ?></p>
            </div>

       </div>


        <?php

} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        ?>
        <div class="container">
            <div class="alert alert-danger text-center" role="alert">
              <h4 class="alert-heading">ลงทะเบียน ไม่สำเร็จ!!!</h4>
              <p><?php echo "บัตรประจำตัวเลขที่ " . $_POST['xm1s003'] . " ไม่สามารถลงทะเบียนได้"; ?></p>

            </div>

       </div>

<?php

    } else {
        echo $e->getMessage();
        // an error other than duplicate entry occurred
    }
}

function SplitString($str)
{
    $checkAt = substr_count($str, "@"); //นับจำนวน @
    if ($checkAt == 1) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); // id
        $myString[1] = substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)); // name
        return $myString;
    } elseif ($checkAt == 2) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); //id
        $myString[1] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), 0, strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@"));
        $myString[2] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), (strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@") + 1), (strlen(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1))) - 1));
        return $myString;
    } else {
        return false;
    }

}
?>

    </div>
    <hr>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368 </p>
    </div>



    </body>

</html>