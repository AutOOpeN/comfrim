<?php
//รูปถ่าย

//echo "file6" . $_POST['send_reg_class'];
// สำเนาผลการทดสอบระดับชาติ (O-NET)
$file01_extension = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
if ($file01_extension != "") {
    $new_file01_name = $_POST['send_reg_class'] . '_file_' . $_POST['send_reg_card_id'] . "." . $file01_extension;
    $file1_path      = "/var/www/html/admission/file1/";
    $upload_path01   = $file1_path . $new_file01_name;
} else {
    $new_file01_name = "none";
}
//file06
if ($file01_extension != "") {
    $status_file1 = move_uploaded_file($_FILES['file1']['tmp_name'], $upload_path01);
    if ($status_file1 == false) {
        echo "ไม่สามารถบันทึก ผลการทดสอบระดับชาติ (O-NET) ";
        exit();
    }
}

$file02_extension = pathinfo(basename($_FILES['file2']['name']), PATHINFO_EXTENSION);
if ($file02_extension != "") {
    $new_file02_name = 'm1_file_' . $_POST['reg_card_id'] . "." . $file02_extension;
    $file2_path      = "/var/www/html/admission/file88/";
    $upload_path02   = $file2_path . $new_file02_name;
} else {
    $new_file02_name = "none";
}
//file02
if ($file02_extension != "") {
    $status_file2 = move_uploaded_file($_FILES['file2']['tmp_name'], $upload_path02);
    if ($status_file2 == false) {
        echo "ไม่สามารถบันทึก สำเนาทะเบียนบ้านหน้าแรก";
        //exit();
    }
}
echo "<hr>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
