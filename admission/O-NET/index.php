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
    	<h4 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">อัพโหลดเอกสาร O-NET</h4>
            <form class="form" method="post" action="">
            	<div class="form-group">
            		<label for="reg_card_id">เลขประจำตัวประชาชน: (#Ref. 1) </label>
                  	<input type="text" class="form-control" name="reg_card_id"  required>
               	</div>
               	<div class="form-group">
                	<label for="mm">สมัครระดับชั้นที่สมัคร: </label>
                	<select name="mm" class="custom-select" >
            			<option value="m1">ม.1</option>
            			<option value="m4">ม.4</option>
            		</select>
            	</div>
            	<div class="form-group">
                    <button class="btn btn-outline-primary btn-lg btn-block" type="submit" id="button-id"><i class="fas fa-search"></i> ค้นหา</button>
            	</div>

            </form>
            <hr>
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
            echo "<h4 style='color:#043c96;text-shadow: 2px 2px 4px #000000;'> ชื่อผู้สมัคร : " . $row['reg_name_title'] . "" . $row['reg_name'] . " " . $row['reg_suname'] . "</h4>";
            $reg_card_id = $row['reg_card_id'];
            $ONetFile    = $row['file_name_6'];
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-warning' role='alert'>
                <i class='fas fa-info-circle'></i> ไม่พบผู้สมัคร เลขประจำตัวประชาชน/เลือกระดับชั้นที่สมัคร ไม่ถูกต้อง
            </div>
        "; // . $e->getMessage();
        exit();
    }

    if ($ONetFile == "none") {
        $mm = $_POST['mm']; //ระดับที่สมัคร
        echo "
				<fieldset class='myfieldset'>
                    <legend class='myfieldset'>หลักฐานการสมัคร O-NET (ไฟล์เอกสารจากเว็บไซต์ สทศ. เท่านั้น)</legend>
        ";
        echo "
			<form method='post'  action='' enctype='multipart/form-data' class='form'>
                <div class='form-group'>
                    <div class='col-md-4 mb-3'>
                        <label for='reg_onet_point'>คะแนน O-NET: </label>
                        <input type='text' name='reg_onet_point' size='4' class='form-control' required>
                    </div>
                </div>
				<div class='form-group'>
				    <div class='custom-file'>
				    	<input type='hidden' name='send_reg_card_id' value=$reg_card_id>
				    	<input type='hidden' name='send_reg_class' value=$mm>
				        <input type='file' class='custom-file-input' name='file6' id='customFile6' accept='application/pdf' required>
				        <label class='custom-file-label' for='customFile6'>ผลการทดสอบระดับชาติ (O-NET) ไฟล์เอกสารจากเว็บไซต์ สทศ. เท่านั้น <u> สามารถ upload ได้หลังจากสมัครไปแล้ว ไฟล์ PDF เท่านั้น</u> </label>
				    </div>
				</div>
				<div class='alert alert-warning text-center' role='alert'>
                      ** คะแนน และเอกสาร O-NET สามารถ upload ได้หลังจากวันที่ 24 มีนาคม 2563
                      <img src='../../images/ex_onet2563.jpg' width='943' height='435' >
                </div>
			    <div class='form-group'>
			    	<button class='btn btn-outline-primary btn-block btn-lg' type='submit' id='button-id'>
			    		<i class='fas fa-file-upload'></i> Upload O-NET
			    	</button>
			    </div>
			</form>
        	";
        echo "
			</fieldset>
			<br><br>
        ";

    } else {

        echo "
			<div class='alert alert-success' role='alert'>
  				อัพโหลดเอกสาร O-NET แล้ว
			</div>
        ";
    }

}

/*
 *  update status file6 O-NET
 */
if (isset($_POST['reg_onet_point'])) {
    //echo "file6" . $_POST['send_reg_class'];
    // สำเนาผลการทดสอบระดับชาติ (O-NET)
    $file06_extension = pathinfo(basename($_FILES['file6']['name']), PATHINFO_EXTENSION);
    if ($file06_extension != "") {
        $new_file06_name = $_POST['send_reg_class'] . '_file_' . $_POST['send_reg_card_id'] . "." . $file06_extension;
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
            exit();
        }
    }
    // update database;
    try {
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql_update_onet = "UPDATE " . $_POST['send_reg_class'] . " SET file_name_6 = '" . $new_file06_name . "' ,reg_onet_point = '" . $_POST['reg_onet_point'] . "' WHERE reg_card_id = '" . $_POST['send_reg_card_id'] . "'";
        $update_onet     = $conn2->prepare($sql_update_onet);
        $update_onet->execute();
        $conn2 = null;
        echo "
    	<div class='alert alert-success' role='alert'>
  			File upload success.
		</div>
	";
    } catch (PDOException $e) {
        echo "Error "; // . $e->getMessage();
    }
}
?>
              <script>
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
                    });
                </script>
    </div><!-- <div class="col-sm-10 text-left"> -->
<?php
$spkObject->spkFooter();
?>
  </div>

</div>

</body>
</html>
