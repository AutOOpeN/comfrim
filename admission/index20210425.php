<?php
// require_once 'config/settings.config.php';
include_once('../spk/word.php');
require_once "config/function.php";
require_once '../spk/word.php';
// $spkObject = new spk();
// $spkObject->spkHeader();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <title>ระบบรับนักเรียน ห้องเรียนปกติ ปีการศึกษา 2563</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
  <link rel='stylesheet' type='text/css' href='../../../Font-Awesome/css/all.css'>
  <script src='../../../js/jquery-3.3.1.min.js'></script>
  <script src='../../../js/popper.min.js'></script>
  <script src='../../../bootstrap/dist/js/bootstrap.min.js'></script>

  <link rel='stylesheet' type='text/css' href='css/app_css.css'>
</head>

<body>
  <div class=" text-center">
    <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
    <div class="container">
      <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> </h1>
      <p class="lead text-muted"></p>
      <div class='h3'>ระบบรับสมัครนักเรียนประจำ<?php echo $strEducationYear ?></div>
      <div class='h3'>ประเภทห้องเรียนทั่วไป</div>
    </div>
  </div>
  <div class="container text-center">
    <div class="row content">
      <div class="col-md-10 text-left">
        <hr>
        <!-- <p class="h1 text-danger">เลื่อนการรับสมัคร </p>
    <p  class="h2 text-danger">ตามประกาศปิดสถานศึกษากรณีพิเศษ ตามมติคณะรัฐมนตรีและประกาศกระทรวงศึกษาธิการ</p>
    <hr>
    <br><br><br> -->

        <h3>ขั้นตอนการสมัครออนไลน์</h3>
        
        <div class="card-deck">
          <div class="card border-primary">
            <div class="card-body">
              <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">1. ตรวจสอบรายละเอียดผู้สมัคร</h5>
              <br>
              <p><?php echo $strAdmissionRegStep1 ?></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-body">
              <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 2. กรอกใบสมัคร</h5>
              <br>
              <p><?php echo $strAdmissionRegStep2 ?></p>
              <br>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-body">
              <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">3. พิมพ์แบบฟอร์มชำระเงิน </h5>
              <br>
              <p><?php echo $strAdmissionRegStep3 ?></p>
            </div>
          </div>
          <div class="card border-primary">
            <div class="card-body">
              <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 4. ตรวจสอบรายชื่อผู้มีสิทธิ์สอบและพิมพ์บัตรประจำตัวผู้สอบ</h5>
              <br>
              <p><?php echo $strAdmissionRegStep4 ?></p>
              <br>

            </div>
          </div>
        </div> <!-- <div class="card-deck"> -->
        <hr>


        <h3>สมัครออนไลน์ <i class="far fa-hand-point-right"></i></h3>

        <div class="text-center">
          <div class="btn-group-vertical">
            <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 1</a>
            <a class="btn btn-success" href="registrationM1" role="button">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 1</a>
            <a class="btn btn-success" href="registrationM1/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 1 </a>
            <!-- <a class="btn btn-success" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
            <a class="btn btn-success" href="print" role="button">พิมพ์ใบชำระเงิน</a>
            <a class="btn btn-success" href="#" role="button">พิมพ์บัตรประจำตัวผู้สอบ</a>
          </div>
        </div> <!-- <div class="text-center"> -->

        <div class="text-center pt-4 pb-4">

          <div class="btn-group-vertical">
            <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 4</>
              <a class="btn btn-warning" href="registrationM4" role="button">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 4</a>
              <a class="btn btn-warning" href="registrationM4/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 4 </a>
              <!-- <a class="btn btn-warning" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
              <a class="btn btn-warning" href="print" role="button">พิมพ์ใบชำระเงิน</a>
              <a class="btn btn-warning" href="#" role="button">พิมพ์บัตรประจำตัวผู้สอบ</a>
          </div>
        </div> <!-- <div class="text-center"> -->


      </div> <!-- <div class="col-sm-10 text-left"> -->
      <?php
      // $spkObject->spkFooter();
      ?>

    </div> <!-- <div class="row content"> -->
  </div><!-- <div class="container-fluid text-center"> -->
</body>

</html>