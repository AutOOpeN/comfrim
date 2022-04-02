<?php
    session_start();
    if (!isset($_SESSION['ref1'])) {
        header("Location: login.php");
        exit;
    }
    
    // if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 18000000)) {
        session_start();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

  


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
    
    <title>ห้องเรียนทั่วไป | โรงเรียนสตรีภูเก็ต</title>

</head>

<body>    

<?php
  
    try{
      $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
    // $sql_student ="SELECT * FROM confirm_student WHERE m1s003 = '" . $_SESSION['ref1'] . "'";
    // $sql_father ="SELECT * FROM confirm_student WHERE m1s003 = '" . $_SESSION['ref1'] . "'";
    // $sql_mother ="SELECT * FROM confirm_student WHERE m1s003 = '" . $_SESSION['ref1'] . "'";
    // $sql_ ="SELECT * FROM confirm_student WHERE m1s003 = '" . $_SESSION['ref1'] . "'";

    // $stmt = $conn->prepare($_SESSION['sql_confirm']);

    $sql = "SELECT * 
        FROM ((confirm_student 
        INNER JOIN confirm_father ON confirm_student.m1s003 = confirm_father.fStudent_id)
        INNER JOIN confirm_mother ON confirm_student.m1s003 = confirm_mother.mStudent_id)
        INNER JOIN confirm_parent ON confirm_student.m1s003 = confirm_parent.pStudent_id
        WHERE m1s003 = '" . $_SESSION['ref1'] . "'";


    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $bloodType = array("N"=>"ไม่ทราบ","A"=>"A","B"=>"B","O"=>"O","AB"=>"AB","ARh+"=>"ARh+","ARh-"=>"ARh-","BRh+"=>"BRh+","BRh-"=>"BRh-","ABRh+"=>"ABRh+","ABRh-"=>"ABRh-","ORh+"=>"ORh+","ORh-"=>"ORh-");
    $occupation = array(
      "0"=>"ไม่ได้ประกอบอาชีพ",
      "1"=>"รับราชการ",
      "2"=>"พนักงานรัฐวิสาหกิจ",
      "3"=>"นักธุรกิจ-ค้าขาย",
      "4"=>"เกษตรกรรม",
      "5"=>"รับจ้าง",
      "6"=>"พนักงาน/เจ้าหน้าที่ของรัฐ/ลูกจ้างประจำ/ลูกจ้างชั่วคราว",
      "7"=>"ข้าราชการ/พนักงานของรัฐเกษียณ",
      "8"=>"พระ/นักบวช",
      "99"=>"อื่นๆ");
    $religion = array(
      "พุทธ"=>"พุทธ",
      "อิสลาม"=>"อิสลาม",
      "คริสต์"=>"คริสต์",
      "ซิกส์"=>"ซิกส์",
      "พราหมณ์/ฮินดู"=>"พราหมณ์/ฮินดู",
      "อื่นๆ"=>"อื่นๆ");
      
?>

    <div class="container">
      <div class="logo">
        <img src="logo.png" alt="Satreephuket Logo">

      </div>
      
      <div class="title pb-2 text-center">
        ใบมอบตัวนักเรียนเข้าเรียนในโรงเรียนสตรีภูเก็ต
        <p class="text-center">ชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION['m'] . "  " . $strEducationYear ?></p>
      </div>
      
      <hr>
      <section class="explanation">
        <div class="alert alert-warning" role="alert">
          *** การกรอกข้อมูลถูกต้อง และครบถ้วนสมบูรณ์ ใช้เป็นข้อมูลในการทำหลักฐานของนักเรียน  และรายงาน สพฐ. ทราบในการเบิกจ่ายเงินอุดหนุนรายหัวให้กับโรงเรียนต่อไป
        </div>
      </section>


    <form method="POST" action="confirm_action.php" class="needs-validation" novalidate>

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
              <input type="text" class="form-control" name="studentFirstNameEN" id="studentFirstNameEN" placeholder="Name" value="<?php echo $row['studentFirstNameEN']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ ชื่อ
              </div>
            </div>

            <div class="col-sm-6">
              <label for="studentLastNameEN" class="form-label">นามสกุล (อังกฤษ)</label>
              <input type="text" class="form-control" name="studentLastNameEN" id="studentLastNameEN" placeholder="LastName" value="<?php echo $row['studentLastNameEN']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ นามสกุล
              </div>
            </div>

            <!--  -->
            <?php

              $y =  substr($row['m1s040'],0,4);
              $m = substr($row['m1s040'],4,2);
              $d = substr($row['m1s040'],6,2);
              ?>
            <div class="col-md-4">
              <label for="studentBirthdayDay" class="form-label">เกิดวันที่</label>
              <select class="form-select" id="studentBirthdayDay" name="studentBirthdayDay" required>
              <option value="">-วันที่-</option>
               <?php

                for ($i = 1; $i <= 31; $i++) {
                  if($d == $i){
                      if ($i < 10) {
                        echo "<option value='0" . $i . "' selected>0" . $i . "</option>";
                      } else {
                          echo "<option value='" . $i . "' selected>" . $i . "</option>";
                      }
                  }
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

            <div class="col-md-4">
              <label for="studentBirthdayMonth" class="form-label">เดือน</label>
              <select class="form-select" id="studentBirthdayMonth"  name="studentBirthdayMonth" required>
                <option value="">-เดือน-</option>
                <option value="01" <?php if($m=='01'){echo "selected"; } ?> >มกราคม</option>
                <option value="02" <?php if($m=='02'){echo "selected"; } ?> >กุมภาพันธ์</option>
                <option value="03" <?php if($m=='03'){echo "selected"; } ?> >มีนาคม</option>
                <option value="04" <?php if($m=='04'){echo "selected"; } ?> >เมษายน</option>
                <option value="05" <?php if($m=='05'){echo "selected"; } ?> >พฤษภาคม</option>
                <option value="06" <?php if($m=='06'){echo "selected"; } ?> >มิถุนายน</option>
                <option value="07" <?php if($m=='07'){echo "selected"; } ?> >กรกฎาคม</option>
                <option value="08" <?php if($m=='08'){echo "selected"; } ?> >สิงหาคม</option>
                <option value="09" <?php if($m=='09'){echo "selected"; } ?> >กันยายน</option>
                <option value="10" <?php if($m=='10'){echo "selected"; } ?> >ตุลาคม</option>
                <option value="11" <?php if($m=='11'){echo "selected"; } ?> >พฤศจิกายน</option>
                <option value="12" <?php if($m=='12'){echo "selected"; } ?> >ธันวาคม</option>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ  เดือนเกิด
              </div>
            </div>

            <div class="col-md-4">
              <label for="studentBirthdayYear" class="form-label">พ.ศ.</label>
              <select class="form-select" id="studentBirthdayYear"  name="studentBirthdayYear" required>
              <option value="">-พ.ศ.-</option>
              <?php
                                    $tmp_year = date("Y");
                                    $tmp_year_start = ($tmp_year + 543) -20;
                                    $tmp_year_end = ($tmp_year + 543) - 8;
                                    for ($i = $tmp_year_start; $i <= $tmp_year_end; $i++) {
                                      if ($y == $i){
                                        echo "<option value='" . $i . "' selected>" . $i . "</option>";
                                      }
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ พ.ศ. เกิด
              </div>
            </div>
            <!--  -->
            <div class="col-md-2">
              <label for="studentRace" class="form-label">เชื้อชาติ</label>
              <input type="text" class="form-control" id="studentRace" name="studentRace" placeholder=""  value="<?php echo $row['studentRace']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-2">
              <label for="studentNation" class="form-label">สัญชาติ</label>
              <input type="text" class="form-control" id="studentNation" name="studentNation" placeholder="" value="<?php echo $row['studentNation']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-2">
              <label for="studentReligion" class="form-label">ศาสนา</label>
              <select id="studentReligion" name="studentReligion" class="form-select"  required>
                <option value="">-- เลือกศาสนา --</option>
                <?php
                  foreach ($religion as $key =>$val){
                    $selected="";
                    if($row['studentReligion']==$key){
                      $selected="selected";
                    }
                    echo '<option value="'. $key .'" '.$selected .'>' . $val .'</option>';
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
  
            <div class="col-md-3">
            <label for="studentSpeakLang" class="form-label">ภาษาที่ใช้เป็นหลัก</label>
              <input type="text" class="form-control" id="studentSpeakLang" name="studentSpeakLang" placeholder=""  value="<?php echo $row['studentSpeakLang']?>">
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>              
            </div>
            <div class="col-md-3">
            <label for="studentSpeakOther" class="form-label">ภาษาอื่น</label>
              <input type="text" class="form-control" id="studentSpeakOther" name="studentSpeakOther" placeholder="" value="<?php echo $row['studentSpeakOther']?>">
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            
            <div class="col-md-4">
              <label for="studentBornTambon" class="form-label">สถานที่เกิด  ตำบล</label>
              <input type="text" class="form-control" id="studentBornTambon" name="studentBornTambon" placeholder="" value="<?php echo $row['studentBornTambon']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-md-4">
              <label for="studentBornAmphur" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" id="studentBornAmphur" name="studentBornAmphur" placeholder="" value="<?php echo $row['studentBornAmphur']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-md-4">
              <label for="studentBornProvince" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" id="studentBornProvince" name="studentBornProvince" placeholder="" value="<?php echo $row['studentBornProvince']?>" required>
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
      $checked="";
      if ($row['studentLiveWith']==$x){
        $checked = "checked";
      }
      // }elseif($row['studentLiveWith']=== NULL){
      //   $checked="";
      // }
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentLiveWith" id="studentLiveWith'. $x .'" value="'. $value_studentLiveWith .'"'. $checked .'  required>';
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
      $checked="";
      if ($row['studentDisadvantaged']==$i){
        $checked = "checked";
      }
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentDisadvantaged" id="studentDisadvantaged'. $i .'" value="'. $value_studentDisadvantaged .'" '. $checked .' required>';
        echo    '<label class="form-check-label" for="studentDisadvantaged'. $i .'">'. $value_studentDisadvantaged .'</label>';
        echo '</div>';
        $i++;
    }
?>
        <hr class="my-4">
        <div class="mb-3 ">ความขาดแคลน</div>
          <div class="form-check form-check-inline">
            <?php
              $checked01="";
              if ($row['studentScarcity01']==1){
                $checked01 = "checked";
              }             
              $checked02="";
              if ($row['studentScarcity02']==1){
                $checked02 = "checked";
              }             
              $checked03="";
              if ($row['studentScarcity03']==1){
                $checked03 = "checked";
              }             
              $checked04="";
              if ($row['studentScarcity04']==1){
                $checked04 = "checked";
              }             
            ?>
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity01" value="1" <?php  echo $checked01 ?>>
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนแบบเรียน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity02" value="1"  <?php  echo $checked02 ?>>
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนอาหารกลางวัน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity03" value="1"  <?php  echo $checked03 ?>>
            <label class="form-check-label" for="inlineCheckbox1">ขาดแคลนเครื่องเขียน</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="studentScarcity04" value="1"  <?php  echo $checked04 ?>>
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
      $checked="";
      if ($row['studentTraveling']==$z){
        $checked = "checked";
      }      
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentTraveling" id="studentTraveling'. $z .'" value="' .$value_studentTraveling . '" '. $checked .' required>';
        echo    '<label class="form-check-label" for="studentTraveling'. $z .'">'.$value_studentTraveling .'</label>';
        echo '</div>';
        $z++;
    }
?>


        <div class="row g-3">

            <!--  -->
            <div class="col-sm-12">
              <label for="studentTimeDt" class="form-label">ระยะเวลาเดินทางจากบ้านถึงโรงเรียน (นาที)</label>
              <input type="number" class="form-control" id="studentTimeDt" name="studentTimeDt" placeholder="ไม่มีระบุ 0" value="<?php echo $row['studentTimeDt']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="studentWaterDt" class="form-label">ระยะห่างจากโรงเรียนทางน้ำ (กม.) </label>
              <input type="number" class="form-control" id="studentWaterDt" name="studentWaterDt" placeholder="ไม่มีระบุ 0" value="<?php echo $row['studentWaterDt']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ 
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentRockDt" class="form-label">ระยะห่างจากโรงเรียนทางถนนลูกรัง (กม.)</label>
              <input type="number" class="form-control" id="studentRockDt" name="studentRockDt" placeholder="ไม่มีระบุ 0"  value="<?php echo $row['studentRockDt']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentRubberDt" class="form-label">ระยะห่างจากโรงเรียนทางถนนลาดยาง (กม.)</label>
              <input type="number" class="form-control" id="studentRubberDt" name="studentRubberDt" placeholder="ไม่มีระบุ 0" value="<?php echo $row['studentRubberDt']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="studentWeight" class="form-label">น้ำหนัก (กิโลกรัม)</label>
              <input type="number" class="form-control" id="studentWeight" name="studentWeight" placeholder="" value="<?php echo $row['studentWeight']?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="studentHeight" class="form-label">ส่วนสูง (เซนติเมตร)</label>
              <input type="number" class="form-control" id="studentHeight" name="studentHeight" placeholder="" value="<?php echo $row['studentHeight']?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>              
            <div class="col-sm-4">
              
              <label for="studentBlood" class="form-label">กลุ่มเลือด</label>

              <select class="form-select" id="studentBlood" name="studentBlood" required>
                <option value="">-- กลุ่มเลือด --</option>
                <?php
                  foreach ($bloodType as $key =>$val){
                    $selected = "";
                    if( $row['studentBlood'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>
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
      $checked = "";
      if( $row['studentFamily'] == $a){
        $checked = "checked";
      }      
        echo '<div class="form-check form-check-inline">';
        echo    '<input class="form-check-input" type="radio" name="studentFamily" id="studentFamily'. $a .'" value="'.  $value_studentFamily  .' " '. $checked .'  required>';
        echo    '<label class="form-check-label" for="studentFamily'. $a .'">'. $value_studentFamily .'</label>';
        echo '</div>';
        $a++;
    }
?>


        <div class="row g-3 pt-3">
            <div class="col-sm-3">
              <label for="studentOlderBorthers" class="form-label">จำนวนพี่ชาย</label>
              <input type="number" class="form-control" id="studentOlderBorthers" name="studentOlderBorthers" placeholder="จำนวนพี่ชาย" value="<?php echo $row['studentOlderBorthers']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentYoungerBorthers" class="form-label">จำนวนน้องชาย</label>
              <input type="number" class="form-control" id="studentYoungerBorthers" name="studentYoungerBorthers" placeholder="จำนวนน้องชาย" value="<?php echo $row['studentYoungerBorthers']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentOlderSisters" class="form-label">จำนวนพี่สาว</label>
              <input type="number" class="form-control" id="studentOlderSisters" name="studentOlderSisters" placeholder="จำนวนพี่สาว" value="<?php echo $row['studentOlderSisters']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentYoungerSisters" class="form-label">จำนวนน้องสาว</label>
              <input type="number" class="form-control" id="studentYoungerSisters" name="studentYoungerSisters" placeholder="จำนวนน้องสาว" value="<?php echo $row['studentYoungerSisters']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-6">
              <label for="studentNumOfStudyingSiblings" class="form-label">จำนวนพี่น้องที่ศึกษาอยู่ (ไม่รวมตัวนักเรียนเอง)</label>
              <input type="number" class="form-control" id="studentNumOfStudyingSiblings" name="studentNumOfStudyingSiblings" placeholder="" value="<?php echo $row['studentNumofStudyingSiblings']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-6">
              <label for="studentChildIndex" class="form-label">นักเรียนเป็นบุตรลำดับที่</label>
              <input type="number" class="form-control" id="studentChildIndex" name="studentChildIndex" placeholder="" value="<?php echo $row['studentChildIndex']?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <!-- ==========ที่อยู่ตามทะเบียนบ้านของนักเรียน ========= -->     
            <div class="followMeBar ">ที่อยู่ตามทะเบียนบ้านของนักเรียน</div>
            <div class="col-sm-3">
              <label for="psHomeIdNo" class="form-label">รหัสบ้าน</label>
              <input type="text" class="form-control" id="psHomeIdNo" name="psHomeIdNo" placeholder="รหัสบ้าน" value="<?php echo $row['psHomeIdNo'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psHomeNo" class="form-label">บ้านเลขที่</label>
              <input type="text" class="form-control" id="psHomeNo" name="psHomeNo" placeholder="บ้านเลขที่" value="<?php echo $row['m1s050'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psMoo" class="form-label">หมู่ที่ (ถ้าไม่มีใส่ 0)</label>
              <input type="text" class="form-control" id="psMoo" name="psMoo" placeholder="(ถ้าไม่มีใส่ 0)" value="<?php echo $row['psMoo'] //*********************/ ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="psSoi" class="form-label">ซอย (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="psSoi" name="psSoi" placeholder="(ุถ้าไม่มีใส่ -)"  value="<?php echo $row['psSoi'] ?>" required>
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
              <input type="text" class="form-control" id="studentHomeIdNo" name="studentHomeIdNo" placeholder="รหัสบ้าน" value="<?php echo $row['studentHomeIdNo'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentHomeNo" class="form-label">บ้านเลขที่</label>
              <input type="text" class="form-control" id="studentHomeNo" name="studentHomeNo" placeholder="บ้านเลขที่" value="<?php echo $row['studentHomeNo'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentMoo" class="form-label">หมู่ที่ (ถ้าไม่มีใส่ 0)</label>
              <input type="text" class="form-control" id="studentMoo" name="studentMoo" placeholder="(ถ้าไม่มีใส่ 0)" value="<?php echo $row['studentMoo'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-3">
              <label for="studentSoi" class="form-label">ซอย (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentSoi" name="studentSoi" placeholder="(ุถ้าไม่มีใส่ -)" value="<?php echo $row['studentSoi'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->  
            <div class="col-sm-4">
              <label for="studentStreet" class="form-label">ถนน (ุถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentStreet" name="studentStreet" placeholder="(ุถ้าไม่มีใส่ -)" value="<?php echo $row['studentStreet'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="studentTumbol" class="form-label">ตำบล</label>
              <input type="text" class="form-control" id="studentTumbol" name="studentTumbol" placeholder="ตำบล" value="<?php echo $row['studentTumbol'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <div class="col-sm-4">
              <label for="studentAmphur" class="form-label">อำเภอ</label>
              <input type="text" class="form-control" id="studentAmphur" name="studentAmphur" placeholder="อำเภอ" value="<?php echo $row['studentAmphur']  ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>   
            <!--  -->  
            <div class="col-sm-4">
              <label for="studentProvince" class="form-label">จังหวัด</label>
              <input type="text" class="form-control" id="studentProvince" name="studentProvince" placeholder="จังหวัด" value="<?php echo $row['studentProvince'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentPostCode" class="form-label">รหัสไปรษณีย์</label>
              <input type="text" class="form-control" id="studentPostCode" name="studentPostCode" placeholder="รหัสไปรษณีย์" value="<?php echo $row['studentPostCode'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-4">
              <label for="studentTelNo" class="form-label">หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)</label>
              <input type="text" class="form-control" id="studentTelNo" name="studentTelNo" placeholder="หมายเลขโทรศัพท์ (ถ้าไม่มีใส่ -)" value="<?php echo $row['studentTelNo'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <hr>
            <div class="col-sm-12">
              <label for="oldSchoolName" class="form-label">ก่อนที่จะมาเข้าเรียนโรงเรียนนี้ ได้เรียนจบจากโรงเรียน</label>
              <input type="text" class="form-control" name="oldSchoolName"  id="oldSchoolName" placeholder="เรียนจบจากโรงเรียน" value="<?php echo trim($row['m1s260'], " ")?>"  required>
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


            <div class="col-sm-2">
              <label for="fatherTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="fatherTitleName" name="fatherTitleName" placeholder="" value="<?php echo $row['fTitle'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="fatherFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName" placeholder="" value="<?php echo $row['fFirst_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="fatherLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="fatherLastName" name="fatherLastName" placeholder="" value="<?php echo $row['fLast_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="fatherCifNo" class="form-label">เลขประจำตัวประชาชนบิดา</label>
              <input type="text" class="form-control" id="fatherCifNo" name="fatherCifNo" placeholder=" (ถ้าไม่มีใส่ -)" value="<?php echo $row['fCard_id'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-2">
              <label for="fatherCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="fatherCifType" id="fatherCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I" <?php if($row['fCard_type']=='I'){echo "selected"; } ?> >บัตรประชาชน</option>
                <option value="P" <?php if($row['fCard_type']=='P'){echo "selected"; } ?> >พาสปอร์ต</option>
                <option value="A" <?php if($row['fCard_type']=='A'){echo "selected"; } ?> >บัตรต่างด้าว</option>
                <option value="O" <?php if($row['fCard_type']=='O'){echo "selected"; } ?> >อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>

            <div class="col-md-2"> 
              <label for="fatherBlood" class="form-label">กลุ่มเลือด</label>
              <select class="form-select" id="fatherBlood" name="fatherBlood" required>
                <option value="">-- เลือกกลุ่มเลือด --</option>
                <?php
                  foreach ($bloodType as $key =>$val){
                    $selected = "";
                    if( $row['fBlood_type'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="fatherEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="fatherEdu" name="fatherEdu" placeholder="" value="<?php echo $row['fQualification'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="fatherOccupation" class="form-label">อาชีพ</label>
              <select id="fatherOccupation" name="fatherOccupation" class="form-select"  required>
                <option value="">-- เลือกอาชีพ --</option>
                <?php
                    
                                 
                  foreach ($occupation as $key =>$val){
                    $selected = "";
                    if( $row['fOccupation'] == $key){
                      $selected = "selected";
                    }  
                    echo '<option value="'. $key .'" '. $selected.'>' . $val .'</option>';
                  }
                ?>
              </select>

              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="fatherJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="fatherJobPlace" name="fatherJobPlace" placeholder="" value="<?php echo $row['fOffice'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="fatherSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="number" class="form-control" id="fatherSalary" name="fatherSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0"  value="<?php echo $row['fIncome'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="fatherTelNo" class="form-label">เบอร์โทรศัพท์บิดา</label>
              <input type="text" class="form-control" id="fatherTelNo" name="fatherTelNo" placeholder="" value="<?php echo $row['fTel'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->

            <!-- ###############    มารดา    ###############  -->
            <div class="followMeBar ">ข้อมูลมารดา</div>

            <div class="col-sm-2">
              <label for="motherTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="motherTitleName" name="motherTitleName" placeholder="" value="<?php echo $row['mTitle'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="motherFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="motherFirstName" name="motherFirstName" placeholder="" value="<?php echo $row['mFirst_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="motherLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="motherLastName" name="motherLastName" placeholder="" value="<?php echo $row['mLast_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="motherCifNo" class="form-label">เลขประจำตัวประชาชนมารดา</label>
              <input type="text" class="form-control" id="motherCifNo" name="motherCifNo" placeholder=" (ถ้าไม่มีใส่ -)" value="<?php echo $row['mCard_id'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-2">
              <label for="motherCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="motherCifType" id="motherCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I" <?php if($row['mCard_type']=='I'){echo "selected"; } ?>>บัตรประชาชน</option>
                <option value="P" <?php if($row['mCard_type']=='P'){echo "selected"; } ?>>พาสปอร์ต</option>
                <option value="A" <?php if($row['mCard_type']=='A'){echo "selected"; } ?>>บัตรต่างด้าว</option>
                <option value="O" <?php if($row['mCard_type']=='O'){echo "selected"; } ?>>อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>

            <div class="col-md-2">
            <label for="motherBlood" class="form-label">กลุ่มเลือด</label>
              <select class="form-select" id="motherBlood" name="motherBlood" required>
                <option value="">-- เลือกกลุ่มเลือด --</option>
                <?php
                  foreach ($bloodType as $key =>$val){
                    $selected = "";
                    if( $row['mBlood_type'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="motherEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="motherEdu" name="motherEdu" placeholder="" value="<?php echo $row['mQualification'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="motherOccupation" class="form-label">อาชีพ</label>
              <select id="motherOccupation" name="motherOccupation" class="form-select"  required>
                <option value="" >-- เลือกอาชีพ --</option>
                <?php
                  foreach ($occupation as $key =>$val){
                    $selected = "";
                    if( $row['mOccupation'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>              
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="motherJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="motherJobPlace" name="motherJobPlace" placeholder=""  value="<?php echo $row['mOffice'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="motherSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="number" class="form-control" id="motherSalary" name="motherSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0" value="<?php echo $row['mIncome'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="motherTelNo" class="form-label">เบอร์โทรศัพท์มารดา</label>
              <input type="text" class="form-control" id="motherTelNo" name="motherTelNo" placeholder="" value="<?php echo $row['mTel'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <!-- =============ข้อมูลผู้ปกครอง============ -->
            <div class="followMeBar ">ข้อมูลผู้ปกครอง</div>
            <div>
              <button id="btn-copy-parentFather" name="btn-copy-parentFather" class="btn btn-info" type="button" value="copy">บิดาเป็นผู้ปกครอง</button>
              <input type="hidden" name="fatherParent" value="บิดา">

              <button id="btn-copy-parentMother" name="btn-copy-parentMother" class="btn btn-info" type="button" value="copy">มารดาเป็นผู้ปกครอง</button>
              <input type="hidden" name="motherParent" value="มารดา">
            </div>
            <div class="col-sm-12">
              <label for="parentRelation" class="form-label">ผู้ปกครองที่มอบตัวนักเรียน เกี่ยวข้องเป็น </label>
              <input type="text" class="form-control" id="parentRelation"  name="parentRelation" placeholder="ผู้ปกครองที่มอบตัวนักเรียน เกี่ยวข้องเป็น...............ของนักเรียน" value="<?php echo $row['pRelationship'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>      
              <!--  -->
            <div class="col-sm-2">
              <label for="parentTitleName" class="form-label">คำนำหน้านาม</label>
              <input type="text" class="form-control" id="parentTitleName" name="parentTitleName" placeholder=""  value="<?php echo $row['pTitle'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-5">
              <label for="parentFirstName" class="form-label">ชื่อ</label>
              <input type="text" class="form-control" id="parentFirstName" name="parentFirstName" placeholder=""  value="<?php echo $row['pFirst_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-sm-5">
              <label for="parentLastName" class="form-label">นามสกุล</label>
              <input type="text" class="form-control" id="parentLastName" name="parentLastName" placeholder=""  value="<?php echo $row['pLast_name'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="parentCifNo" class="form-label">เลขประจำตัวประชาชนผู้ปกครอง</label>
              <input type="text" class="form-control" id="parentCifNo" name="parentCifNo" placeholder=" (ถ้าไม่มีใส่ -)"  value="<?php echo $row['pCard_id'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <div class="col-sm-2">
              <label for="parentCifType" class="form-label">ชนิดบัตร</label>
              <select class="form-select" name="parentCifType" id="parentCifType" required>
                <option value="">-- ชนิดบัตร --</option>
                <option value="I" <?php if($row['pCard_type']=='I'){echo "selected"; } ?> >บัตรประชาชน</option>
                <option value="P" <?php if($row['pCard_type']=='P'){echo "selected"; } ?> >พาสปอร์ต</option>
                <option value="A" <?php if($row['pCard_type']=='A'){echo "selected"; } ?> >บัตรต่างด้าว</option>
                <option value="O" <?php if($row['pCard_type']=='O'){echo "selected"; } ?> >อื่นๆ/ไม่มีเอกสาร</option>
              </select>
            </div>
            <div class="col-md-2">
            <label for="parentBlood" class="form-label">กลุ่มเลือด</label>
              <select class="form-select" id="parentBlood" name="parentBlood" required>
                <option value="">-- เลือกกลุ่มเลือด --</option>
                <?php
                  foreach ($bloodType as $key =>$val){
                    $selected = "";
                    if( $row['pBlood_type'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>

            <div class="col-md-4">
              <label for="parentEdu" class="form-label">วุฒิ / ระดับการศึกษา</label>
              <input type="text" class="form-control" id="parentEdu" name="parentEdu" placeholder=""  value="<?php echo $row['pQualification'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->
            <div class="col-sm-4">
              <label for="parentOccupation" class="form-label">อาชีพ</label>
              <select id="parentOccupation" name="parentOccupation" class="form-select" required>
                <option value="">-- เลือกอาชีพ --</option>
                <?php
                  foreach ($occupation as $key =>$val){
                    $selected = "";
                    if( $row['pOccupation'] == $key){
                      $selected = "selected";
                    }
                    echo '<option value="'. $key .'"  '. $selected  .'>' . $val .'</option>';
                  }
                ?>
              </select>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="parentJobPlace" class="form-label">สถานที่ทำงาน</label>
              <input type="text" class="form-control" id="parentJobPlace" name="parentJobPlace" placeholder="" value="<?php echo $row['pOffice'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <div class="col-sm-4">
              <label for="parentSalary" class="form-label">รายได้ต่อปี (บาท)</label>
              <input type="number" class="form-control" id="parentSalary" name="parentSalary" placeholder="ถ้าไม่มีรายได้ หรือ ไม่ได้ประกอบอาชีพ ให้ระบุ 0" value="<?php echo $row['pIncome'] ?>"  required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>            
            <!--  -->
            <div class="col-sm-12">
              <label for="parentTelNo" class="form-label">เบอร์โทรศัพท์ผู้ปกครอง</label>
              <input type="text" class="form-control" id="parentTelNo" name="parentTelNo" placeholder="" value="<?php echo $row['pTel'] ?>" required>
              <div class="invalid-feedback">
                ** ต้องระบุ
              </div>
            </div>
            <!--  -->

            <hr class="my-4">  
            <div class="col-sm-6">
              <button class="btn btn-success form-control" type="submit"><i class='bx bx-save bx-sm'></i> บันทึกใบมอบตัว </button>
            </div> 
            
            <div class="col-sm-6">
              <button class="btn btn-primary form-control"  onclick="window.open('confirm_print.php','_blank')"   > 
                <i class="bx bx-printer bx-sm"></i> 
                พิมพ์ใบมอบตัว (*กรณีกรอกข้อมูลครบถ้วน)
              </button>
            </div> 
            <!--  -->     
        </div>
 
        </div> <!--  <div class="row g-3"> -->
        </form>
        <div class="text-center">
          <p class="mt-5 mb-5 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
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
    $("select[name=parentBlood]").val($("select[name=fatherBlood]").val());
    $("select[name=parentOccupation]").val($("select[name=fatherOccupation]").val());
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
    $("select[name=parentBlood]").val($("select[name=motherBlood]").val());
    $("select[name=parentOccupation]").val($("select[name=motherOccupation]").val());
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



(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    alert("กรุณากรอกข้อมูลให้ครบ (**ช่องที่มีกรอบสีแดง)");
                }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();

</script>

