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
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
require_once "../config/function.php";
require_once '../config/settings.config.php';
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";
$spkObject  = new spk();
$spkObject->spkHeader();
?>

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
            <h4 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">ตรวจสอบเอกสารประกอบการสมัคร</h4>
            <form class="form" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="id_card" placeholder="เลขประจำตัวประชาชน #Ref. 1" aria-label="เลขประจำตัวประชาชน #Ref. 1" aria-describedby="button-id" required>
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="button-id"><i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                </div>
            </form>
            <?php
if (isset($_POST['id_card'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        //$conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $m1Result  = null;
        $m4_Result = null;
        $m1_Result = $conn->query("SELECT count(*) FROM m1 WHERE reg_card_id = '" . $_POST['id_card'] . "'")->fetchColumn();
        $m4_Result = $conn->query("SELECT count(*) FROM m4 WHERE reg_card_id = '" . $_POST['id_card'] . "'")->fetchColumn();
        //echo "m1_s: " . $m1_s_Result . "  | m1_ip: " . $m1_ip_Result . "  | m4_s: " . $m4_s_Result . "  | m4_ip: " . $m4_ip_Result . "  |||" . $sum_Row;
        if ($m1_Result == 1) {
            $tmp_sql      = "SELECT * FROM m1 WHERE reg_card_id = '" . $_POST['id_card'] . "'";
            $m            = "1";
            $table_update = "m1";
        } elseif ($m4_Result == 1) {
            $tmp_sql      = "SELECT * FROM m4 WHERE reg_card_id = '" . $_POST['id_card'] . "'";
            $m            = "4";
            $table_update = "m4";
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

            switch ($row['register_status']) {
                case 0:
                    $chk_checked_0 = "checked";
                    break;
                case 1:
                    $chk_checked_1 = "checked";
                    break;
                case 2:
                    $chk_checked_2 = "checked";
                    break;
                case 3:
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
            $reg_tel = $row['reg_tel'];
            if ($m == "4") {
                $student_plan1 = $row['reg_plan1_name'];
                $student_plan2 = $row['reg_plan2_name'];
            }
            $student_name   = $row['reg_name_title'] . $row['reg_name'] . " " . $row['reg_suname'];
            $student_id_reg = $row['id'];
            if ($student_id_reg < 1000) {
                if ($student_id_reg < 10) {
                    $student_id_reg = "000" . $student_id_reg;
                } elseif ($student_id_reg < 100) {
                    $student_id_reg = "00" . $student_id_reg;
                } else {
                    $student_id_reg = "0" . $student_id_reg;
                }
            }
            $student_id_card = $row['reg_card_id'];
            $str_file1       = $row['file_name_1'];
            $str_file2       = $row['file_name_2'];

            if ($row['file_name_3'] != "none") {
                $str_file3 = $row['file_name_3'];
            } else {
                $str_file3 = "none";
            }

            if ($row['file_name_4'] != "none") {
                $str_file4 = $row['file_name_4'];
            } else {
                $str_file4 = "none";
            }

            if ($row['file_name_5'] != "none") {
                $str_file5 = $row['file_name_5'];
            } else {
                $str_file5 = "none";
            }
// O-NET
            if ($row['file_name_6'] != "none") {
                $str_file6 = $row['file_name_6'];
            } else {
                $str_file6 = "none";
            }
            $str_ONET = $row['reg_onet_point'];
        }

    } catch (PDOException $e) {
        echo "<div class='alert alert-warning' role='alert'>
                ไม่พบผู้สมัคร!! </div>";
        //echo "Error: " . $e->getMessage();
        exit();
    };
    $conn = null;
    ?>
<div >

                <table class="table">
                    <tr class="table-primary">
                        <th scope="row" class="text-right">สมัครเข้าเรียน:</th>
                        <td><?php echo "ห้องเรียนปกติ ชันมัธยมศึกษาปีที่ " . $m; ?></td>
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

    if ($m == "m1") {
        ?>

                    <?php

    } elseif ($m == "4") {
        ?>
                    <tr class="table-primary">
                        <th scope="row" class="text-right">แผนการเรียนลำดับที่ 1  </th>
                        <td><?php echo $student_plan1; ?></td>
                    </tr>
                    <tr class="table-primary">
                        <th scope="row" class="text-right">แผนการเรียนลำดับที่ 2</th>
                        <td><?php echo $student_plan2; ?></td>
                    </tr>
                    <?php
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
		                        	<input class="form-check-input" type="radio" name="change_status" value="0" id="radio1" required <?php echo $chk_checked_0; ?>>
		                        	<label class="form-check-label" for="radio1">รอการชำระเงิน</label>
		                    	</div>
			                    <div class="form-check">
			                        <input class="form-check-input" type="radio"  name="change_status" value="1" id="radio2" required <?php echo $chk_checked_1; ?>>
			                        <label class="form-check-label" for="radio2">เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)</label>
			                    </div>
			                    <div class="form-check">
			                        <input class="form-check-input" type="radio"  name="change_status" value="2" id="radio3" required  <?php echo $chk_checked_2; ?>>
			                        <label class="form-check-label" for="radio3">ขาดคุณสมบัติ</label>
			                    </div>
			                    <div class="form-check">
			                        <input class="form-check-input" type="radio"  name="change_status" value="3" id="radio4" required <?php echo $chk_checked_3; ?>>
			                        <label class="form-check-label" for="radio4">การสมัครสมบูรณ์</label>
			                    </div>
			                </div>
	                	</div>
	                    <input type="hidden" name="student_id_card_hidden" value="<?php echo $student_id_card; ?>">
	                    <input type="hidden" name="student_name_hidden" value="<?php echo $student_name; ?>">
	                    <input type="hidden" name="table_update_hidden" value="<?php echo $table_update; ?>">
                	</div>
                    <?php

    if ($m == "1") {

        ?>
                	<div class="form-group row">
                		<div class="col-sm-2"> ประเภทที่สมัคร:</div>
                		<div class="col-sm-10">
                			<div class="form-check">
                				<input class="form-check-input" type="radio"  name="area_status" value="0" id="radio00" required <?php echo $area_status_0; ?>>
			                        <label class="form-check-label" for="radio00">รอการตรวจสอบ</label>
                			</div>
                			<div class="form-check">
                				<input class="form-check-input" type="radio"  name="area_status" value="1" id="radio01" required <?php echo $area_status_1; ?>>
			                        <label class="form-check-label" for="radio01">ทั่วไป</label>
                			</div>
                			<div class="form-check">
                				<input class="form-check-input" type="radio"  name="area_status" value="2" id="radio02" required <?php echo $area_status_2; ?>>
			                        <label class="form-check-label" for="radio02">ในเขตพื้นที่บริการ</label>
                			</div>
                		</div>
                	</div>
            <?php

    }
    ;?>
		  			<div class="form-group row">
		    			<label for="editONET" class="col-sm-2 col-form-label">คะแนน O-NET</label>
		    			<div class="col-sm-10">
		      				<input type="text" name="editONET" class="form-control" id="editONET" value='<?php echo ($str_ONET); ?>' required>
		    			</div>
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
    $file_type4 = substr($str_file4, -3);
    $file_type5 = substr($str_file5, -3);
    $file_type6 = substr($str_file6, -3);
    if ($m == "1") {
        echo '<hr>';
        echo "<p class='h4'>รูปถ่าย</p>";
        echo "<image src='../file1/$str_file1' width='350' height='350'>";
        echo "
                <br>
                <form action='../admin/image.php' method='post'>
                <input type='hidden' name='student_id' value='$student_id_card'>
                <input type='hidden' name='student_m' value='$m'>
                <button class='btn btn-warning' type='submit'  >แก้ไขรูปภาพ-</button>
                </form>
             ";
        
        echo '<hr>';
        echo '<h4>สำเนาทะเบียนบ้านหน้าแรกและ หน้าที่มีชื่อเจ้าบ้าน</h4><br>';
        if ($str_file2 != "none") {
            if ($file_type2 == "pdf") {
                echo "<embed src='../file2/" . $str_file2 . "' width='100%'' height='700px' />";
            } else {
                echo "<a href='../file2/" . $str_file2 . "' target='_blank'><img src='../file2/" . $str_file2 . "' width='50%' height='50%' ></a>";
            }
        } else {
            echo "สำเนาทะเบียนบ้านหน้าแรกและ หน้าที่มีชื่อเจ้าบ้าน ไม่มี";
        }

        // file3
        echo '<hr>';
        if ($str_file3 != "none") {
            echo "<h4>สำเนาทะเบียนบ้านหน้าแรกและ หน้าที่มีชื่อผู้สมัคร</h4><br>";
            if ($file_type3 == "pdf") {
                echo "<embed src='../file3/" . $str_file3 . "' width='100%'' height='700px' />";
                echo"<form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาทะเบียนบ้าน</button>
                </form>";
            } else {
                echo "<a href='../file3/" . $str_file3 . "' target='_blank'><img src='../file3/" . $str_file3 . "' width='50%' height='50%' ></a>";
                echo"<form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาทะเบียนบ้าน</button>
                </form>";
            }
        } else {
            echo "<h4 class='text-danger'> ไม่พบ สำเนาทะเบียนบ้านหน้าแรกและหน้าที่มีชื่อผู้สมัคร <br></h4><br>";
            echo"<form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาทะเบียนบ้าน</button>
                </form>";
        }
    }
    //fiel 4
    echo '<hr>';
    if ($str_file4 != "none") {
        echo "<h4>สำเนาหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 1</h4><br>";
        if ($file_type4 == "pdf") {
            echo "<embed src='../file4/" . $str_file4 . "' width='100%'' height='700px' />";
            echo"<br><form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง</button>
                </form>";
        } else {
            echo "<a href='../file4/" . $str_file4 . "' target='_blank'><img src='../file4/" . $str_file4 . "' width='50%' height='50%' ></a>";
            echo"<br><form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง</button>
                </form>";
        }
    } else {
        echo "<h4> สำเนาหนังสือรับรองกำลังศึกษาอยู่ หรือ สำเนา ปพ.1 หน้าที่ 1 ไม่มี</h4><br>";
        echo"<form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง</button>
                </form>";
    }

    //file 5
    echo '<hr>';
    if ($str_file5 != "none") {
        echo "<h4> สำเนา ปพ.1 หน้าที่ 2</h4><br>";
        if ($file_type5 == "pdf") {
            echo "<embed src='../file5/" . $str_file5 . "' width='100%'' height='700px' />";
            echo"<br><form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง หน้า 2</button>
                </form>";
        } else {
            echo "<a href='../file5/" . $str_file5 . "' target='_blank'><img src='../file5/" . $str_file5 . "' width='50%' height='50%' ></a>";
            echo"<br><form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง หน้า 2</button>
                </form>";
        }
    } else {
        echo "<h4> สำเนา ปพ.1 หน้าที่ 2 ไม่มี</h4><br>";
        echo"<form>
                    <button type='button' class='btn btn-warning'>แก้ไขสำเนาหนังสือรับรอง หน้า 2</button>
                </form>";
    }

    //file 6
    echo '<hr>';
    if ($str_file6 != "none") {
        echo "<h4>ผลการทดสอบระดับชาติ (O-NET) </h4><br>";
        if ($file_type6 == "pdf") {
            echo "<embed src='../file6/" . $str_file6 . "' width='100%'' height='700px' />";
        } else {
            echo "<a href='../file6/" . $str_file6 . "' target='_blank'><img src='../file6/" . $str_file6 . "' width='50%' height='50%' ></a>";
        }
    } else {
        echo "<h4>ผลการทดสอบระดับชาติ (O-NET) ไม่มี</h4><br>";
    }
    ?>
    </div>
    <?php

}

// update state
if (isset($_POST['change_status'])) {
    $conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_POST['table_update_hidden'] == "m1") {

        if ($_POST['area_status'] == '0') {
            $area_name = "รอการตรวจสอบ";
        } elseif ($_POST['area_status'] == '1') {
            $area_name = "ทัวไป";
        } elseif ($_POST['area_status'] == '2') {
            $area_name = "ในเขตพื้นที่บริการ";
        }
        $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET register_status = '" . $_POST['change_status'] . "' ,  area_id = '" . $_POST['area_status'] . "' ,  area_name = '" . $area_name . "' ,  reg_onet_point = '" . $_POST['editONET'] . "'  WHERE reg_card_id = '" . $_POST['student_id_card_hidden'] . "'";
        //echo $_POST['student_id_card_hidden'] . $_POST['student_name_hidden'] . $_POST['change_status'];
        //echo "<br>" . $sql_update_status;
    } elseif ($_POST['table_update_hidden'] == "m4") {
        $sql_update_status = "UPDATE " . $_POST['table_update_hidden'] . " SET register_status = '" . $_POST['change_status'] . "' ,   reg_onet_point = '" . $_POST['editONET'] . "'  WHERE reg_card_id = '" . $_POST['student_id_card_hidden'] . "'";
        //echo $sql_update_status;
    }
    switch ($_POST['change_status']) {
        case '0':
            $chk_status = "รอการชำระเงิน";
            $alert_status = "alert-primary";
            break;
        case '1':
            $chk_status = "เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)";
            $alert_status = "alert-warning";
            break;
        case '2':
            $chk_status = "ขาดคุณสมบัติ";
            $alert_status = "alert-danger";
            break;
        case '3':
            $chk_status = "การสมัครสมบูรณ์";
            $alert_status = "alert-success";
            break;
    }
    $edit_status = $conn2->prepare($sql_update_status);
    $edit_status->execute();

    if ($edit_status->rowCount()>0){
    ?>
    <div class="alert <?php echo $alert_status; ?> " role="alert">

        <h4 class="alert-heading">เลขประจำตัวประชาชน #Ref.1 <?php echo $_POST['student_id_card_hidden']; ?><br>
        ชื่อ: <?php echo $_POST['student_name_hidden']; ?>
        <br>เปลี่ยนสถานะเป็น:  <?php echo $chk_status ?></h4>
    </div>
    <?php
    }else{
        echo "<p class='mb-0'> ไม่มีการเปลี่ยนแปลงสถานะ </p>";
    }
}
; //update state
$conn = null;
?>
</table>
</div>
<?php
$spkObject->spkFooter();
?>
</div>
</body>
</html>