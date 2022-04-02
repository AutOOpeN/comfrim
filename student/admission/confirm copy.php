<?php
    session_start();
    if (!isset($_SESSION['ref1'])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    // Set Language variable
    if(isset($_GET['lang']) && !empty($_GET['lang'])){
      $_SESSION['lang'] = $_GET['lang'];
    
      if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
      echo "<script type='text/javascript'> location.reload(); </script>";
      }
    }

    // Include Language file
    if(isset($_SESSION['lang'])){
      include($_SERVER['DOCUMENT_ROOT']. "/spk/lang_".$_SESSION['lang'].".php");
    }else{
      include($_SERVER['DOCUMENT_ROOT']. "/spk/lang_th.php");
    }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../../css/student/student.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    
    <title>โรงเรียนสตรีภูเก็ต | ประกาศผลสอบ โครงการพิเศษ</title>

</head>

<body>    
  <script>
    function changeLang(){
      document.getElementById('form_lang').submit();
    }
    </script>  
<?php
  
    try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

    $stmt = $conn->prepare($_SESSION['sql_confirm']);
    $stmt->execute();
    $row = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    

?>

    <div class="container">
      <!-- Language -->
         <div class="col-2 ">
          <form method='get' action='' id='form_lang' class="form" >
            <?= _SELECT_LANGUAGE ?> : <select name='lang' onchange='changeLang();' class="form-select" >
            <option value='th' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'th'){ echo "selected"; } ?> >ภาษาไทย</option>
            <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >English</option>
            </select>
          </form>           
        </div> 
        <div class="title pb-4 text-center">
                ใบมอบตัวนักเรียนเข้าเรียนในโรงเรียนสตรีภูเก็ต
        </div>
<p class="text-center">ชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION['m'] . "  " . $strEducationYear ?></p>
        <section class="explanation">
        </section>


    <form method="POST" action="" class="needs-validation" novalidate>
        <div>
            
            <p class="font-italic"><span class="fw-bold" ><?= _STUDENT_NAME ?> :    </span><span class="text-decoration-underline fst-italic"><?php echo $row['m1s010'] . $row['m1s020'] . "  " . $row['m1s030']?></span></p>
            <p><span class="fw-bold" ><?= _IDCARD ?> : </span> <span class="text-decoration-underline fst-italic"><?php  echo $_SESSION['ref1'] ?></span></p>
            
        </div>

        <div class="followMeBar ">รายละเอียดนักเรียน</div>

        <div class="row g-3">
            <!--  -->
            <div class="col-sm-2">
              <label for="studentTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" name="studentTitleName" id="studentTitleName" placeholder="" value="<?php echo trim($row['m1s010']," ")?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ คำนำหน้านาม
              </div>
            </div>
            <div class="col-sm-5">
              <label for="StudentFirstNameTH" class="form-label">ชื่อ (ภาษาไทย)</label>
              <input type="text" class="form-control" name="studentFirstNameTH" id="studentFirstNameTH" placeholder="ชื่อ" value="<?php echo trim($row['m1s020']," ")?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ ชื่อ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="studentLastNameTH" class="form-label">นามสกุล (ภาษาไทย)</label>
              <input type="text" class="form-control" name="studentLastNameTH" id="studentLastNameTH" placeholder="นามสกุล" value="<?php echo $row['m1s030']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ นามสกุล
              </div>
            </div>

            <!--  -->

            <div class="col-sm-6">
              <label for="studentFirstNameEN" class="form-label">ชื่อ (อังกฤษ)</label>
              <input type="text" class="form-control" name="studentFirstNameEN" id="studentFirstNameEN" placeholder="Name"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ ชื่อ
              </div>
            </div>

            <div class="col-sm-6">
              <label for="studentLastNameEN" class="form-label">นามสกุล (อังกฤษ)</label>
              <input type="text" class="form-control" name="studentLastNameEN" id="studentLastNameEN" placeholder="LastName"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ นามสกุล
              </div>
            </div>

            <!--  -->
            <div class="col-md-2">
              <label for="studentBirthdayDay" class="form-label">เกิดวันที่</label>
              <select class="form-select" id="studentBirthdayDay" name="studentBirthdayDay" required>
              <option value="">-วันที่-</option>
               <?php

                for ($i = 1; $i <= 31; $i++) {
                    if ($i < 10) {
                        echo "<option value='0" . $i . "'>0" . $i . "</option>";
                    } else {
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                }               
               
               ?>

              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ วันเกิด
              </div>
            </div>

            <div class="col-md-2">
              <label for="studentBirthdayMonth" class="form-label">เดือน</label>
              <select class="form-select" id="studentBirthdayMonth"  name="studentBirthdayMonth" required>
                <option value="">-เดือน-</option>
                <option value="01">มกราคม</option>
                <option value="02">กุมภาพันธ์</option>
                <option value="03">มีนาคม</option>
                <option value="04">เมษายน</option>
                <option value="05">พฤษภาคม</option>
                <option value="06">มิถุนายน</option>
                <option value="07">กรกฎาคม</option>
                <option value="08">สิงหาคม</option>
                <option value="09">กันยายน</option>
                <option value="10">ตุลาคม</option>
                <option value="11">พฤศจิกายน</option>
                <option value="12">ธันวาคม</option>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ  เดือนเกิด
              </div>
            </div>

            <div class="col-md-2">
              <label for="studentBirthdayYear" class="form-label">พ.ศ.</label>
              <select class="form-select" id="studentBirthdayYear"  name="studentBirthdayYear" required>
              <option value="">-พ.ศ.-</option>
              <?php
                                    $tmp_year = date("Y");
                                    $tmp_year_start = ($tmp_year + 543) -15;
                                    $tmp_year_end = ($tmp_year + 543) - 10;
                                    for ($i = $tmp_year_start; $i <= $tmp_year_end; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ พ.ศ. เกิด
              </div>
            </div>

            <div class="col-md-2">
              <label for="zip" class="form-label">เชื้อชาติ</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-2">
              <label for="zip" class="form-label">สัญชาติ</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-2">
              <label for="zip" class="form-label">ศาสนา</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <!--  -->
            
            <div class="col-md-4">
              <label for="zip" class="form-label">สถานที่เกิดตำบล</label>
              <input type="text" class="form-control" id="zip" placeholder="" value="<?php echo $row['m1s070']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-md-4">
              <label for="zip" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" id="zip" placeholder="" value="<?php echo $row['m1s080']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-md-4">
              <label for="zip" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" id="zip" placeholder="" value="<?php echo $row['m1s090']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->

        </div><!-- <div class="row g-3"> -->

        <hr class="my-4">

        <div class="mb-3">การพักนอน</div>
<?php
    $studentLiveWith = array(
        "อาศัยอยู่กับบิดามารดา",
        "อาศัยอยู่กับญาติ",
        "อาศัยอยู่กับครู",
        "อาศัยอยู่กับพระ",
        "องค์กรการกุศล"
    );
    $x = 0;
    foreach ($studentLiveWith as $value_studentLiveWith){
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentLiveWith" id="studentLiveWith'. $x .'" value="'. $value_studentLiveWith .'">';
        echo    '<label class="form-check-label" for="studentLiveWith'. $x .'">'. $value_studentLiveWith .'</label>';
        echo '</div>';
        $x++;
    }
?>
        <hr class="my-4">
        <div class="mb-3 ">ความด้อยโอกาส</div>

<?php
    $studentDisadvantaged = array(
        "ไม่ด้อยโอกาส",
        "เด็กยากจน",
        "เด็กถูกทอดทิ้ง",
        "เด็กเร่ร่อน",
        "เด็กในสถานพินิจและคุ้มครองเด็กเยาวชน",
        "ผลกระทบจากเอดส์",
        "ชนกลุ่มน้อย",
        "เด็กที่ถูกทำร้ายทารุณ",
        "เด็กที่มีปัญหาเกี่ยวกับยาเสพติด",
        "กำพร้า",
        "ทำงานรับผิดชอบตัวเองและครอบครัว",
        "ถูกบังคับให้ขายแรงงาน",
        "เด็กอยู่ในธุรกิจทางเพศ"
    );
    $i = 0;
    foreach ($studentDisadvantaged as $value_studentDisadvantaged){
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentDisadvantaged" id="studentDisadvantaged'. $i .'" value="'. $value_studentDisadvantaged .'">';
        echo    '<label class="form-check-label" for="studentDisadvantaged'. $i .'">'. $value_studentDisadvantaged .'</label>';
        echo '</div>';
        $i++;
    }
?>
        <hr class="my-4">
        <div class="mb-3 ">ความขาดแคลน</div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity01" value="1">
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนแบบเรียน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity02" value="2">
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนอาหารกลางวัน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity03" value="3">
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนเครื่องเขียน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity04" value="4">
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนเครื่องแบบนักเรียน</label>
          </div>

        <hr class="my-4">
        <div class="mb-3 ">การเดินทางมาโรงเรียน</div>
<?php
    $studentTraveling = array(
        "เดินเท้า",
        "พาหนะไม่เสียค่าโดยสาร",
        "พาหนะเสียค่าโดยสาร",
        "จักรยานยืมเรียน"
    );

    $z = 0;
    foreach ($studentTraveling as $value_studentTraveling){
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentTraveling" id="studentTraveling'. $z .'" value="' .$value_studentTraveling . '">';
        echo    '<label class="form-check-label" for="studentTraveling'. $z .'">'.$value_studentTraveling .'</label>';
        echo '</div>';
        $z++;
    }
?>


        <div class="row g-3">

            <!--  -->
            <div class="col-sm-12">
              <label for="titleName" class="form-label">ระยะเวลาเดินทางจากบ้านถึงโรงเรียน (นาที)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="titleName" class="form-label">ระยะห่างจากโรงเรียนทางน้ำ (กม.) </label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="titleName" class="form-label">ระยะห่างจากโรงเรียนทางถนนลูกรัง (กม.)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="titleName" class="form-label">ระยะห่างจากโรงเรียนทางถนนลาดยาง (กม.)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-6">
              <label for="titleName" class="form-label">น้ำหนัก (กิโลกรัม)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-6">
              <label for="titleName" class="form-label">ส่วนสูง (เซนติเมตร)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>              
            <!--  -->         
        </div> <!--  <div class="row g-3"> -->
        <hr class="my-4">
        <div class="mb-3 ">สถานะภาพสมรสของบิดา-มารดา</div>
<?php
    $studentFamily = array(
        "อยู่ด้วยกันจดทะเบียนสมรส",
        "อยู่ด้วยกันไม่ได้จดทะเบียนสมรส",
        "โสด",
        "หย่าร้าง",
        "แยกกันอยู่",
        "บิดาถึงแก่กรรม",
        "มารดาถึงแก่กรรม",
        "บิดาถึงแก่กรรมมารดาแต่งงานใหม่",
        "มารดาถึงแก่กรรมบิดาแต่งงานใหม่"
        
    );

    $a = 0;
    foreach ($studentFamily as $value_studentFamily){
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentFamily" id="studentFamily'. $a .'" value="'.  $value_studentFamily  .'">';
        echo    '<label class="form-check-label" for="studentFamily'. $a .'">'. $value_studentFamily .'</label>';
        echo '</div>';
        $a++;
    }
?>


        <div class="row g-3 pt-3">
            <div class="col-sm-3">
              <label for="student_" class="form-label">จำนวนพี่ชาย</label>
              <input type="text" class="form-control" id="titleName" placeholder="จำนวนพี่ชาย" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="titleName" class="form-label">จำนวนน้องชาย</label>
              <input type="text" class="form-control" id="titleName" placeholder="จำนวนน้องชาย" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="titleName" class="form-label">จำนวนพี่สาว</label>
              <input type="text" class="form-control" id="titleName" placeholder="จำนวนพี่สาว" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="titleName" class="form-label">จำนวนน้องสาว</label>
              <input type="text" class="form-control" id="titleName" placeholder="จำนวนน้องสาว" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-6">
              <label for="titleName" class="form-label">จำนวนพี่น้องที่ศึกษาอยู่ (ไม่รวมตัวนักเรียนเอง)</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-6">
              <label for="titleName" class="form-label">นักเรียนเป็นบุตรลำดับที่</label>
              <input type="text" class="form-control" id="titleName" placeholder="" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <!-- ==========ที่อยู่ตามทะเบียนบ้านของนักเรียน ========= -->     
            <div class="followMeBar ">ที่อยู่ตามทะเบียนบ้านของนักเรียน</div>
            <div class="col-sm-3">
              <label for="psHomeIdNo" class="form-label">รหัสบ้าน</label>
              <input type="text" class="form-control" id="psHomeIdNo" name="psHomeIdNo" placeholder="รหัสบ้าน" value="<?php echo $row['m1s050'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psHomeNo" class="form-label">บ้านเลขที่</label>
              <input type="text" class="form-control" id="psHomeNo" name="psHomeNo" placeholder="บ้านเลขที่" value="<?php echo $row['m1s071'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psMoo" class="form-label">หมู่ที่ (ถ้าไม่มีใส่ 0)</label>
              <input type="text" class="form-control" id="psMoo" name="psMoo" placeholder="(ถ้าไม่มีใส่ 0)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psSoi" class="form-label">ซอย (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="psSoi" name="psSoi" placeholder="(ุถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->  
            <div class="col-sm-4">
              <label for="psStreet" class="form-label">ถนน (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="psStreet" name="psStreet" placeholder="(ุถ้าไม่มีใส่ -)" value="<?php echo trim($row['m1s060']," ") ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="psTumbol" class="form-label">ตำบล</label>
              <input type="text" class="form-control" id="psTumbol" name="psTumbol" placeholder="ตำบล" value="<?php echo trim($row['m1s070'], " ") ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="psAmphur" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" id="psAmphur" name="psAmphur" placeholder="อำเภอ" value="<?php echo trim($row['m1s080'], " ") ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <!--  -->  
            <div class="col-sm-4">
              <label for="psProvince" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" id="psProvince" name="psProvince" placeholder="จังหวัด" value="<?php echo trim($row['m1s090'], " ") ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="psPostCode" class="form-label">รหัสไปรษณีย์</label>
              <input type="text" class="form-control" id="psPostCode" name="psPostCode" placeholder="รหัสไปรษณีย์" value="<?php echo trim($row['m1s100'], " ") ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="psTelNo" class="form-label">หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="psTelNo" name="psTelNo" placeholder="หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)" value="<?php echo $row['m1s110'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->


            <!-- =============ที่อยู่ปัจจุบันของนักเรียน============== -->     
            <div class="followMeBar ">ที่อยู่ปัจจุบันของนักเรียน</div>
            <div>
              <button id="btn-copy-psAddress" name="btn-copy-psAddress" class="btn btn-info" type="button" value="copy">คัดลอกจากที่อยู่ตามทะเบียนบ้าน</button>
            </div>
            <div class="col-sm-3">
              <label for="studentHomeIdNo" class="form-label">รหัสบ้าน</label>
              <input type="text" class="form-control" id="studentHomeIdNo" name="studentHomeIdNo" placeholder="รหัสบ้าน"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentHomeNo" class="form-label">บ้านเลขที่</label>
              <input type="text" class="form-control" id="studentHomeNo" name="studentHomeNo" placeholder="บ้านเลขที่"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentMoo" class="form-label">หมู่ที่ (ถ้าไม่มีใส่ 0)</label>
              <input type="text" class="form-control" id="studentMoo" name="studentMoo" placeholder="(ถ้าไม่มีใส่ 0)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentSoi" class="form-label">ซอย (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentSoi" name="studentSoi" placeholder="(ุถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->  
            <div class="col-sm-4">
              <label for="studentStreet" class="form-label">ถนน (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentStreet" name="studentStreet" placeholder="(ุถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="studentTumbol" class="form-label">ตำบล</label>
              <input type="text" class="form-control" id="studentTumbol" name="studentTumbol" placeholder="ตำบล" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="studentAmphur" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" id="studentAmphur" name="studentAmphur" placeholder="อำเภอ"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <!--  -->  
            <div class="col-sm-4">
              <label for="studentProvince" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" id="studentProvince" name="studentProvince" placeholder="จังหวัด"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentPostCode" class="form-label">รหัสไปรษณีย์</label>
              <input type="text" class="form-control" id="studentPostCode" name="studentPostCode" placeholder="รหัสไปรษณีย์"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentTelNo" class="form-label">หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentTelNo" name="studentTelNo" placeholder="หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <hr>
            <div class="col-sm-12">
              <label for="oldSchoolName" class="form-label">ก่อนที่จะมาเข้าเรียนโรงเรียนนี้ ได้เรียนจบจากโรงเรียน</label>
              <input type="text" class="form-control" name="oldSchoolName"  id="oldSchoolName" placeholder="เรียนจบจากโรงเรียน" value="<?php echo $row['m1s260']?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>              
            <!--  -->   
            <div class="col-sm-6">
              <label for="oldSchoolAmphur" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" name="oldSchoolAmphur" id="oldSchoolAmphur" placeholder="อำเภอ" value="<?php echo trim($row['m1s270']," " )?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-6">
              <label for="oldSchoolProvince" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" name="oldSchoolProvince" id="oldSchoolProvince" placeholder="จังหวัด" value="<?php echo trim($row['m1s280']," ")?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>  
            <!--  --> 
            <!-- ###############    บิดา    ###############  -->
            <div class="followMeBar ">ข้อมูลบิดา</div>

            <div>
              <button id="btn-copy-parentFather" name="btn-copy-parentFather" class="btn btn-info" type="button" value="copy">เป็นผู้ปกครอง</button>
              <input type="hidden" name="fatherParent" value="บิดา">
            </div>
            <div class="col-sm-2">
              <label for="fatherTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="fatherTitleName" name="fatherTitleName" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="fatherFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName" placeholder="" value="<?php echo $row['m1s120'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="fatherLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="fatherLastName" name="fatherLastName" placeholder="" value="<?php echo $row['m1s130'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="fatherCifNo" class="form-label">เลขประจำตัวประชาชนบิดา</label>
              <input type="text" class="form-control" id="fatherCifNo" name="fatherCifNo" placeholder=" (ถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-2">
              <label for="fatherCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="fatherCifType" id="fatherCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I">บัตรประชาชน</option>
                <option value="P">พาสปอร์ต</option>
                <option value="A">บัตรต่างด้าว</option>
                <option value="O">อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="fatherBlood" class="form-label">กลุ่มเลือด</label>
              <input type="text" class="form-control" id="fatherBlood" name="fatherBlood" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="fatherEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="fatherEdu" name="fatherEdu" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="fatherJob" class="form-label">อาชีพบิดา</label>
              <input type="text" class="form-control" id="fatherJobPlace" name="fatherJob" placeholder="" value="<?php echo $row['m1s140'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="fatherJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="fatherJobPlace" name="fatherJobPlace" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="fatherSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="text" class="form-control" id="fatherSalary" name="fatherSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="fatherTelNo" class="form-label">เบอร์โทรศัพท์บิดา</label>
              <input type="text" class="form-control" id="fatherTelNo" name="fatherTelNo" placeholder="" value="<?php echo $row['m1s150'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->

            <!-- ###############    มารดา    ###############  -->
            <div class="followMeBar ">ข้อมูลมารดา</div>
            <div>
              <button id="btn-copy-parentMother" name="btn-copy-parentMother" class="btn btn-info" type="button" value="copy">เป็นผู้ปกครอง</button>
              <input type="hidden" name="motherParent" value="มารดา">
            </div>
            <div class="col-sm-2">
              <label for="motherTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="motherTitleName" name="motherTitleName" placeholder="" value="<?php echo $row['m1s160'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="motherFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="motherFirstName" name="motherFirstName" placeholder="" value="<?php echo $row['m1s170'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="motherLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="motherLastName" name="motherLastName" placeholder="" value="<?php echo $row['m1s180'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="motherCifNo" class="form-label">เลขประจำตัวประชาชนมารดา</label>
              <input type="text" class="form-control" id="motherCifNo" name="motherCifNo" placeholder=" (ถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-2">
              <label for="motherCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="motherCifType" id="motherCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I">บัตรประชาชน</option>
                <option value="P">พาสปอร์ต</option>
                <option value="A">บัตรต่างด้าว</option>
                <option value="O">อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>

            <div class="col-md-2">
              <label for="motherBlood" class="form-label">กลุ่มเลือด</label>
              <input type="text" class="form-control" id="motherBlood" name="motherBlood" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="motherEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="motherEdu" name="motherEdu" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="motherJob" class="form-label">อาชีพมารดา</label>
              <input type="text" class="form-control" id="motherJobPlace" name="motherJob" placeholder="" value="<?php echo $row['m1s190'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="motherJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="motherJobPlace" name="motherJobPlace" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="motherSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="text" class="form-control" id="motherSalary" name="motherSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="motherTelNo" class="form-label">เบอร์โทรศัพท์มารดา</label>
              <input type="text" class="form-control" id="motherTelNo" name="motherTelNo" placeholder="" value="<?php echo $row['m1s250'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <!-- =============ข้อมูลผู้ปกครอง============ -->
            <div class="followMeBar ">ข้อมูลผู้ปกครอง</div>

            <div class="col-sm-12">
              <label for="parentRelation" class="form-label">ผู้ปกครองที่มอบตัวนักเรียน เกี่ยวข้องเป็น </label>
              <input type="text" class="form-control" id="parentRelation"  name="parentRelation" placeholder="ผู้ปกครองที่มอบตัวนักเรียน เกี่ยวข้องเป็น...............ของนักเรียน" value="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>      
              <!--  -->
            <div class="col-sm-2">
              <label for="parentTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="parentTitleName" name="parentTitleName" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="parentFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="parentFirstName" name="parentFirstName" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="parentLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="parentLastName" name="parentLastName" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="parentCifNo" class="form-label">เลขประจำตัวประชาชนผู้ปกครอง</label>
              <input type="text" class="form-control" id="parentCifNo" name="parentCifNo" placeholder=" (ถ้าไม่มีใส่ -)"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-2">
              <label for="parentCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="parentCifType" id="parentCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I">บัตรประชาชน</option>
                <option value="P">พาสปอร์ต</option>
                <option value="A">บัตรต่างด้าว</option>
                <option value="O">อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="parentBlood" class="form-label">กลุ่มเลือด</label>
              <input type="text" class="form-control" id="parentBlood" name="parentBlood" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="parentEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="parentEdu" name="parentEdu" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="parentJob" class="form-label">อาชีพผู้ปกครอง</label>
              <input type="text" class="form-control" id="parentJobPlace" name="parentJob" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="parentJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="parentJobPlace" name="parentJobPlace" placeholder=""  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="parentSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="text" class="form-control" id="parentSalary" name="parentSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="parentTelNo" class="form-label">เบอร์โทรศัพท์ผู้ปกครอง</label>
              <input type="text" class="form-control" id="parentTelNo" name="parentTelNo" placeholder="" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->

            <!--  -->     
            <div class="col-sm-12">
                <div class="callout">
                    ** ตามหลักฐานผลการเรียนและสำเนาทะเบียนบ้านดังแนบ
                </div>
            </div>
            <!--  -->   
    
            <!--  -->     
            <hr class="my-4">   
            <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> บันทึกใบมอบตัว</button>
            <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> พิมพ์ใบมอบตัว</button>     
        </div>
 
        </div> <!--  <div class="row g-3"> -->
        </form>
    </div>


</body>

</html>

<script>
    var stickyHeaders = (function() {
        var $window = $(window),
        $stickies;

        var load = function(stickies) {
        if (typeof stickies === "object" && stickies instanceof jQuery && stickies.length > 0) {
        $stickies = stickies.each(function() {
            var $thisSticky = $(this).wrap('<div class="followWrap" />');
            $thisSticky
            .data('originalPosition', $thisSticky.offset().top)
            .data('originalHeight', $thisSticky.outerHeight())
            .parent()
            .height($thisSticky.outerHeight()); 			  
        });

        $window.off("scroll.stickies").on("scroll.stickies", function() {
            _whenScrolling();		
        });
    }
        };  

var _whenScrolling = function() {

  $stickies.each(function(i) {			

    var $thisSticky = $(this),
        $stickyPosition = $thisSticky.data('originalPosition');

    if ($stickyPosition <= $window.scrollTop()) {        
      
      var $nextSticky = $stickies.eq(i + 1),
          $nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');

      $thisSticky.addClass("fixed");

      if ($nextSticky.length > 0 && $thisSticky.offset().top >= $nextStickyPosition) {

        $thisSticky.addClass("absolute").css("top", $nextStickyPosition);
      }

    } else {
      
      var $prevSticky = $stickies.eq(i - 1);

      $thisSticky.removeClass("fixed");

      if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {

        $prevSticky.removeClass("absolute").removeAttr("style");
      }
    }
  });
};

return {
  load: load
};
})();

$(function() {
stickyHeaders.load($(".followMeBar"));
});

// code from https://portal.bopp-obec.info/

  $("#btn-copy-psAddress").click(function() {
    $("input[name=studentHomeIdNo]").val($("input[name=psHomeIdNo]").val());
    $("input[name=studentHomeNo]").val($("input[name=psHomeNo]").val());
    $("input[name=studentMoo]").val($("input[name=psMoo]").val());
    $("input[name=studentSoi]").val($("input[name=psSoi]").val());
    $("input[name=studentStreet]").val($("input[name=psStreet]").val());
    $("input[name=studentTumbol]").val($("input[name=psTumbol]").val());
    $("input[name=studentAmphur]").val($("input[name=psAmphur]").val());
    $("input[name=studentProvince]").val($("input[name=psProvince]").val());
    $("input[name=studentPostCode]").val($("input[name=psPostCode]").val());
    $("input[name=studentTelNo]").val($("input[name=psTelNo]").val());
  });


  $("#btn-copy-parentFather").click(function() {
    $("select[name=parentCifType]").val($("select[name=fatherCifType]").val());
    $("input[name=parentTitleName]").val($("input[name=fatherTitleName]").val());
    $("input[name=parentFirstName]").val($("input[name=fatherFirstName]").val());
    $("input[name=parentLastName]").val($("input[name=fatherLastName]").val());
    $("input[name=parentCifNo]").val($("input[name=fatherCifNo]").val());
    $("input[name=parentBlood]").val($("input[name=fatherBoold]").val());
    $("input[name=parentEdu]").val($("input[name=fatherEdu]").val());
    $("input[name=parentJob]").val($("input[name=fatherJob]").val());
    $("input[name=parentJobPlace]").val($("input[name=fatherJobPlace]").val());
    $("input[name=parentBlood]").val($("input[name=fatherBlood]").val());
    $("input[name=parentSalary]").val($("input[name=fatherSalary]").val());
    $("input[name=parentTelNo]").val($("input[name=fatherTelNo]").val());
    $("input[name=parentRelation]").val($("input[name=fatherParent]").val());
  });

  $("#btn-copy-parentMother").click(function() {
    $("select[name=parentCifType]").val($("select[name=motherCifType]").val());
    $("input[name=parentTitleName]").val($("input[name=motherTitleName]").val());
    $("input[name=parentFirstName]").val($("input[name=motherFirstName]").val());
    $("input[name=parentLastName]").val($("input[name=motherLastName]").val());
    $("input[name=parentCifNo]").val($("input[name=motherCifNo]").val());
    $("input[name=parentBlood]").val($("input[name=motherBoold]").val());
    $("input[name=parentEdu]").val($("input[name=motherEdu]").val());
    $("input[name=parentJob]").val($("input[name=motherJob]").val());
    $("input[name=parentJobPlace]").val($("input[name=motherJobPlace]").val());
    $("input[name=parentBlood]").val($("input[name=motherBlood]").val());
    $("input[name=parentSalary]").val($("input[name=motherSalary]").val());
    $("input[name=parentTelNo]").val($("input[name=motherTelNo]").val());
    $("input[name=parentRelation]").val($("input[name=motherParent]").val());

});
</script>

