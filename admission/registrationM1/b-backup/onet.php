<?php

require_once "../config/function.php";
require_once '../config/settings.config.php';
$spkObject = new spk();
$spkObject->spkHeader();
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

<div class="container-fluid text-center">
  <div class="row content">
    <?php $spkObject->spkMenu();?>
    <div class="col-sm-10 text-left">
<!--     	<form class="form" action="" method="post">
            <label for="reg_card_id">เลขที่บัตรประชาชน: </label>
            <input type="text" class="form-control" name="reg_card_id"  placeholder="เลขที่บัตรประชาชน" required>
            <label for="mm">สมัครระดับชั้น * </label>
                <select id="mm" class="custom-select" >
            	<option value="m1">ม.1</option>
            	<option value="m4">ม.4</option>
            </select>
			<button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> ค้นหาใบสมัคร</button>
    	</form> -->
            <form class="form" method="post">
            	<label for="reg_card_id">เลขประจำตัวประชาชน #Ref. 1 </label>
                  <input type="text" class="form-control" name="reg_card_id"  required>
                  <label for="mm">สมัครระดับชั้นที่สมัคร </label>
                <select name="mm" class="custom-select" >
            	<option value="m1">ม.1</option>
            	<option value="m4">ม.4</option>
            </select>

                    <button class="btn btn-outline-primary" type="submit" id="button-id"><i class="fas fa-search"></i> ค้นหา</button>


            </form>
    	<?php
if (isset($_POST['reg_card_id'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql  = "SELECT * FROM " . $_POST['mm'] . " WHERE reg_card_id = '" . $_POST['reg_card_id'] . "'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $stmt->fetch()) {
            echo $row['reg_name_title'] . "" . $row['reg_name'] . " " . $row['reg_suname'];
            $reg_card_id = $row['reg_card_id'];
            $ONetFile    = $row['file_name_6'];
        }
    } catch (PDOException $e) {
        echo "Error "; // . $e->getMessage();
    }

    if ($ONetFile == "none") {
        $mm = $_POST['mm'];
        echo "
			<form class='form' method='post' enctype='multipart/form-data'>
			    <div class='custom-file'>
			    	<input type='hidden' name='send_reg_card_id' value=$reg_card_id>
			    	<input type='hidden' name='send_reg_class' value=$mm>
			        <input type='file' class='custom-file-input' name='file6' id='customFile6' accept='application/pdf' required>
			        <label class='custom-file-label' for='customFile6'>สำเนาผลการทดสอบระดับชาติ (O-NET) พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง * สามารถ upload ได้หลังจากสมัครไปแล้ว *ไฟล์ PDF เท่านั้น    </label>
			    </div>
			    <button class='btn btn-outline-primary' type='submit' id='button-id'><i class='fas fa-search'></i> Upload O-NET</button>
			</form>
        ";
    } else {
        echo "อัพโหลดเอกสาร O-NET แล้ว";
    }

} else {
    echo '0';
}
if (isset($_FILES['file6'])) {
    //echo "file6" . $_POST['send_reg_class'];
    // สำเนาผลการทดสอบระดับชาติ (O-NET)
    $file06_extension = pathinfo(basename($_FILES['file6']['name']), PATHINFO_EXTENSION);
    if ($file06_extension != "") {
        $new_file06_name = 'm1_file_' . $_POST['send_reg_card_id'] . "." . $file06_extension;
        $file6_path      = "/var/www/html/admission/file6/";
        $upload_path06   = $file6_path . $new_file06_name;
    } else {
        $new_file06_name = "none";
    }
//file06
    if ($file06_extension != "") {
        $status_file6 = move_uploaded_file($_FILES['file6']['tmp_name'], $upload_path06);
        if ($status_file6 == false) {
            echo "ไม่สามารถบันทึก ผลการทดสอบระดับชาติ (O-NET) ";
            //exit();
        }
    }
    echo "Upload Success";
} else {
    echo "f" . $reg_card_id;
}
?>
    </div>

  </div>
</div>
	<?php
$spkObject->spkFooter();
?>
</body>
</html>
