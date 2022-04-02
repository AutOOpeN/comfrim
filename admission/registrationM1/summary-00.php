<?php

require_once "../config/function.php";
require_once '../config/settings.config.php';
//require_once "../src/PDO.class.php";
//$DB        = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);
$spkObject = new spk();
$spkObject->spkHeader($strEducationYear);
$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP

?>
        <script src='spk.js'> </script>
        <link rel='stylesheet' type='text/css' href='../css/app_css.css'>
	</head>
<body>
		<div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
                <p class="lead text-muted"><?php echo $txt["SYSTEMNAME"]; ?></p>
                <hr>
            </div>
        </div>
        <div class="container">

<?php
if ($_POST['reg_card_id'] == "") {
    exit();
}
$prov   = SplitString($_POST['province']);
$prov_3 = SplitString($_POST['province_3']);

$am   = SplitString($_POST['amphur']);
$am_3 = SplitString($_POST['amphur_3']);

$dis = SplitString($_POST['district']);

$yyyymmdd = $_POST['myOptionYY'] . $_POST['myOptionMM'] . $_POST['myOptionDD']; //วันเดือนปีเกิดผู้สมัคร
$rec_date = date('Y-m-d H:i:s'); // เวลาสมัคร

/*
 *  edit file name b4 upload
 */
/*

$file01_extension = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
if ($file01_extension != "") {
$new_file01_name = $_POST['send_reg_class'] . '_file_' . $_POST['send_reg_card_id'] . "." . $file01_extension;
$file1_path      = "/var/www/html/admission/file1/";
$upload_path01   = $file1_path . $new_file01_name;
} else {
$new_file01_name = "none";
}

 */

//รูปถ่าย
$file01_extension = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
if ($file01_extension != "") {
    $new_file01_name = 'm1_img_' . $_POST['reg_card_id'] . "." . $file01_extension;
    $file01_path     = "/var/www/html/admission/file1/";
    $upload_path01   = $file01_path . $new_file01_name;
} else {
    $new_image_name = "none";
}
if ($file01_extension != "") {
    $status_file1 = move_uploaded_file($_FILES['file1']['tmp_name'], $upload_path01);
    if ($status_file1 == false) {
        echo "ไม่สามารถบันทึก รูปถ่าย";
        //exit();
    }
}
//สำเนาทะเบียนบ้านหน้าแรก
$file02_extension = pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
if ($file02_extension != "") {
    $new_file02_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file02_extension;
    $file2_path      = "/var/www/html/admission/file2/";
    $upload_path02   = $file2_path . $new_file02_name;
} else {
    $new_file02_name = "none";
}

//สำเนาทะเบียนบ้าน(หน้าที่มีชื่อเจ้าบ้าน)

$file03_extension = pathinfo(basename($_FILES['file3']['name']), PATHINFO_EXTENSION);
if ($file03_extension != "") {
    $new_file03_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file03_extension;
    $file3_path      = "/var/www/html/admission/file3/";
    $upload_path03   = $file3_path . $new_file03_name;
} else {
    $new_file03_name = "none";
}


//$new_file03_name = "none";

//สำเนาทะเบียนบ้าน(หน้าที่มีชื่อผู้สมัคร)
$file04_extension = pathinfo(basename($_FILES['file4']['name']), PATHINFO_EXTENSION);
if ($file04_extension != "") {
    $new_file04_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file04_extension;
    $file4_path      = "/var/www/html/admission/file4/";
    $upload_path04   = $file4_path . $new_file04_name;
} else {
    $new_file04_name = "none";
}

//สำเนาหนังสือรับรองกำลังศึกษาอยู่ชั้น ป.6 หรือ สำเนา ปพ.1
$file05_extension = pathinfo(basename($_FILES['file5']['name']), PATHINFO_EXTENSION);
if ($file05_extension != "") {
    $new_file05_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file05_extension;
    $file5_path      = "/var/www/html/admission/file5/";
    $upload_path05   = $file5_path . $new_file05_name;
} else {
    $new_file05_name = "none";
}

// สำเนาผลการทดสอบระดับชาติ (O-NET)
$file06_extension = pathinfo(basename($_FILES['file6']['name']), PATHINFO_EXTENSION);
if ($file06_extension != "") {
    $new_file06_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file06_extension;
    $file6_path      = "/var/www/html/admission/file6/";
    $upload_path06   = $file6_path . $new_file06_name;
} else {
    $new_file06_name = "none";
}

//ความสามารถพิเศษ 1
$file07_extension = pathinfo(basename($_FILES['file7']['name']), PATHINFO_EXTENSION);
if ($file07_extension != "") {
    $new_file07_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file07_extension;
    $file7_path      = "/var/www/html/admission/file7/";
    $upload_path07   = $file7_path . $new_file07_name;
} else {
    $new_file09_name = "none";
}

//ความสามารถพิเศษ 2
$file08_extension = pathinfo(basename($_FILES['file8']['name']), PATHINFO_EXTENSION);
if ($file08_extension != "") {
    $new_file08_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file08_extension;
    $file8_path      = "/var/www/html/admission/file8/";
    $upload_path08   = $file8_path . $new_file08_name;
} else {
    $new_file09_name = "none";
}

//ความสามารถพิเศษ 3
$file09_extension = pathinfo(basename($_FILES['file9']['name']), PATHINFO_EXTENSION);
if ($file09_extension != "") {
    $new_file09_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file09_extension;
    $file9_path      = "/var/www/html/admission/file9/";
    $upload_path09   = $file9_path . $new_file09_name;
} else {
    $new_file09_name = "none";
}

/*
 * upload file
 */

/*
//file06
if ($file01_extension != "") {
$status_file1 = move_uploaded_file($_FILES['file1']['tmp_name'], $upload_path01);
if ($status_file1 == false) {
echo "ไม่สามารถบันทึก ผลการทดสอบระดับชาติ (O-NET) ";
exit();
}
}

 */

//file02
if ($file02_extension != "") {
    $status_file2 = move_uploaded_file($_FILES['file2']['tmp_name'], $upload_path02);
    if ($status_file2 == false) {
        echo "ไม่สามารถบันทึก สำเนาทะเบียนบ้านหน้าแรก";
        //exit();
    }
}
//file03
if ($file03_extension != "") {
    $status_file3 = move_uploaded_file($_FILES['file3']['tmp_name'], $upload_path03);
    if ($status_file3 == false) {
        echo "ไม่สามารถบันทึก สำเนาทะเบียนบ้าน(หน้าที่มีชื่อเจ้าบ้าน)";
        //exit();
    }
}

//file04
if ($file04_extension != "") {
    $status_file4 = move_uploaded_file($_FILES['file4']['tmp_name'], $upload_path04);
    if ($status_file4 == false) {
        echo "ไม่สามารถบันทึก สำเนาทะเบียนบ้าน(หน้าที่มีชื่อผู้สมัคร)";
        //exit();
    }
}

//file05
if ($file05_extension != "") {
    $status_file5 = move_uploaded_file($_FILES['file5']['tmp_name'], $upload_path05);
    if ($status_file5 == false) {
        echo "ไม่สามารถบันทึก สำเนาหนังสือรับรองกำลังศึกษาอยู่ชั้น ป.6 หรือ สำเนา ปพ.1 ";
        //exit();
    }
}

//file06
if ($file06_extension != "") {
    $status_file6 = move_uploaded_file($_FILES['file6']['tmp_name'], $upload_path06);
    if ($status_file6 == false) {
        echo "ไม่สามารถบันทึก ผลการทดสอบระดับชาติ (O-NET) ";
        //exit();
    }
}

//file07
if ($file07_extension != "") {
    $status_file7 = move_uploaded_file($_FILES['file7']['tmp_name'], $upload_path07);
    if ($status_file7 == false) {
        echo "ไม่สามารถบันทึก เอกสารประกอบความสามารถพิเศษไฟล์ 1 ";
        //exit();
    }
}

//file08
if ($file08_extension != "") {
    $status_file8 = move_uploaded_file($_FILES['file8']['tmp_name'], $upload_path08);
    if ($status_file8 == false) {
        echo "ไม่สามารถบันทึก เอกสารประกอบความสามารถพิเศษไฟล์ 2 ";
        //exit();
    }
}

//file09
if ($file09_extension != "") {
    $status_file9 = move_uploaded_file($_FILES['file9']['tmp_name'], $upload_path09);
    if ($status_file9 == false) {
        echo "ไม่สามารถบันทึก เอกสารประกอบความสามารถพิเศษไฟล์ 3";
        //exit();
    }
}

/*
 *  Insert DATA
 */
try {
    $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
    $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$condb->beginTransaction();
    //$condb->exec('LOCK TABLES m1 WRITE');
    $sql = "INSERT INTO m1(
reg_card_id,
reg_name_title,
reg_name_id,
reg_name,
reg_suname,
reg_date,
reg_email,
reg_no,
reg_road,
reg_tambol,
reg_tambol_id,
reg_amphoe,
reg_amphoe_id,
reg_province,
reg_province_id,
reg_postcode,
reg_tel,
father_name,
father_suname,
father_job,
father_tel,
mother_title,
mother_name,
mother_suname,
mother_job,
mother_tel,
parent_title,
parent_name,
parent_suname,
relationship,
parent_tel,
old_school_name,
old_school_amphoe,
old_school_amphoe_id,
old_school_province,
old_school_province_id,
reg_plan_id,
reg_plan_name,
file_name_1,
file_name_1_status,
file_name_2,
file_name_2_status,
file_name_3,
file_name_3_status,
file_name_4,
file_name_4_status,
file_name_5,
file_name_5_status,
reg_onet_point,
file_name_6,
file_name_6_status,
file_name_7,
file_name_7_status,
file_name_8,
file_name_8_status,
file_name_9,
file_name_9_status,
record_time,
reg_ip_address
) VALUES (
'" . $_POST['reg_card_id'] . "',
'" . $_POST['reg_name_title'] . "',
'" . $_POST['reg_name_id'] . "',
'" . $_POST['reg_name'] . "',
'" . $_POST['reg_suname'] . "',
'" . $yyyymmdd . "',
'" . $_POST['reg_email'] . "',
'" . $_POST['reg_no'] . "',
'" . $_POST['reg_road'] . "',
'" . $dis[1] . "',
'" . $dis[0] . "',
'" . $am[1] . "',
'" . $am[0] . "',
'" . $prov[1] . "',
'" . $prov[0] . "',
'" . $am[2] . "',
'" . $_POST['reg_tel'] . "',
'" . $_POST['father_name'] . "',
'" . $_POST['father_suname'] . "',
'" . $_POST['father_job'] . "',
'" . $_POST['father_tel'] . "',
'" . $_POST['mother_title'] . "',
'" . $_POST['mother_name'] . "',
'" . $_POST['mother_suname'] . "',
'" . $_POST['mother_job'] . "',
'" . $_POST['mother_tel'] . "',
'" . $_POST['parent_title'] . "',
'" . $_POST['parent_name'] . "',
'" . $_POST['parent_suname'] . "',
'" . $_POST['relationship'] . "',
'" . $_POST['parent_tel'] . "',
'" . $_POST['old_school_name'] . "',
'" . $am_3[1] . "',
'" . $am_3[0] . "',
'" . $prov_3[1] . "',
'" . $prov_3[0] . "',
'" . $_POST['reg_plan_id'] . "',
'" . $_POST['reg_plan_name'] . "',
'" . $new_file01_name . "',
'" . $status_file1 . "',
'" . $new_file02_name . "',
'" . $status_file2 . "',
'" . $new_file03_name . "',
'" . $status_file3 . "',
'" . $new_file04_name . "',
'" . $status_file4 . "',
'" . $new_file05_name . "',
'" . $status_file5 . "',
'" . $_POST['reg_onet_point'] . "',
'" . $new_file06_name . "',
'" . $status_file6 . "',
'" . $new_file07_name . "',
'" . $status_file7 . "',
'" . $new_file08_name . "',
'" . $status_file8 . "',
'" . $new_file09_name . "',
'" . $status_file9 . "',
'" . $rec_date . "',
'" . $ipaddress . "'
)";
    $condb->exec($sql);
    // echo "<br>$sql<br>";
//$condb->commit();
    //$condb->exec('UNLOCK TABLES');
    ?>
            <div class="alert alert-success text-center" role="alert">
              <h4 class="alert-heading">ลงทะเบียนสำเร็จ</h4>
              <p>กรุณาพิมพ์แบบฟอร์มชำระเงิน เพื่อนำไปชำระเงินที่เคาน์เตอร์ธนาคารกรุงไทย หรือ Mobile Banking ตั้งแต่วันนี้ <?php  ?> ถึงวันที่ 14 มีนาคม 2565 เท่านั้น</p>
              <p>*** สำหรับผู้สมัครความสามารพิเศษ ชำระได้ถึงวันที่ 14 มีนาคม 2565 เท่านั้น</p>
            <form action="../bill/index.php" method="post">
                <input type="hidden" name="send_reg_card_id" value=<?php echo $_POST['reg_card_id']; ?>>
                <input type="hidden" name="send_reg_class" value="m1">
                <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> พิมพ์ใบชำระเงินค่าสมัครสอบ</button>
            </form>
              <hr>
              <p class="mb-0">สามารถตรวจสอบรายชื่อผู้มีสิทธิ์สอบและสถานที่สอบในวันที่ 21 มีนาคม 2565</p>
              <p class="mb-0">ความสามารถพิเศษ สามารถตรวจสอบรายชื่อผู้มีสิทธิ์สอบและสถานที่สอบในวันที่ 22 มีนาคม 2565</p>
            </div>
<?php
} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {
        ?>
        <div class="container">
            <div class="alert alert-danger text-center" role="alert">
              <h4 class="alert-heading">ลงทะเบียน ไม่สำเร็จ!!!</h4>
              <p><?php echo "บัตรประจำตัวเลขที่ " . $_POST['reg_card_id'] . " ไม่สามารถลงทะเบียนได้"; ?></p>

            </div>

       </div>

<?php

    } else {
        echo $e->getMessage();
        // an error other than duplicate entry occurred
    }
}
?>


        </div>
<?php

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
$spkObject->spkFooter();
?>

</body>
</html>