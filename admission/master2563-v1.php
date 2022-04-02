<?php
require_once 'config/settings.config.php';
require_once "config/function.php";
$spkObject = new spk();
$spkObject->spkHeader();
?>
<link rel='stylesheet' type='text/css' href='css/app_css.css'>
</head>
<body>
<div class=" text-center">
  <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
  <div class="container">
    <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
    <p class="lead text-muted"><?php echo $txt["SYSTEMNAME"]; ?></p>
    
  </div>
</div>
<div class="container-fluid text-center">
  <div class="row content">
    <?php $spkObject->spkMenu();?>
    <div class="col-sm-10 text-left">
    <hr>
    <!-- <p class="h1 text-danger">เลื่อนการรับสมัคร </p>
    <p  class="h2 text-danger">ตามประกาศปิดสถานศึกษากรณีพิเศษ ตามมติคณะรัฐมนตรีและประกาศกระทรวงศึกษาธิการ</p>
    <hr>
    <br><br><br> -->
      <h3 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">ประกาศโรงเรียนสตรีภูเก็ต</h3>
      <ul class="fa-ul">
        <li><span class="fa-li" ><i class="fas fa-bullhorn"></i></span> ประกาศโรงเรียนสตรีภูเก็ต เรื่อง รับสมัครนักเรียนเข้าเรียนชั้นมัธยมศึกษาปีที่ 1 และ ชั้นมัธยมศึกษาปีที่ 4 ประเภทห้องเรียนปกติ ปีการศึกษา 2563  <a href="http://www.satreephuket.ac.th/academic/ent_2563/normalM1M4/pracas_rub_m1m4.pdf" target="_bank">[อ่านประกาศ] </a>
        </li>
        <li><span class="fa-li" ><i class="fas fa-bullhorn"></i></span>ประกาศโรงเรียนสตรีภูเก็ต เรื่อง รับนักเรียนเงื่อนไขพิเศษ เข้าเรียนชั้นมัธยมศึกษาปีที่ 1 และ ชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา 2563 <a href="http://www.satreephuket.ac.th/academic/ent_2563/normalM1M4/pracas_special_rubm1m4.pdf" target="_bank">[อ่านประกาศ]</a></li>
      </ul>
      <hr>
      <h3>ขั้นตอนการสมัครออนไลน์</h3>
      <div class="card-deck">
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">1. ตรวจสอบรายละเอียดผู้สมัคร</h5>
            <br>
            <p>ตรวจสอบรายละเอียดของผู้สมัคร และไฟล์สำเนาเอกสารการสมัคร พร้อมรับรองสำเนาถูกต้องทุกหน้า ก่อนการ Upload</p>
          </div>
        </div>
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 2. กรอกใบสมัคร</h5>
            <br>
            <p>กรอกใบสมัครจากแบบฟอร์มออนไลน์ <br> วันที่ 3 พฤษภาคม พ.ศ 2563 ถึง วันที่ 12 พฤษภาคม พ.ศ 2563 เวลา 16.30 น.</p>
            <br>
          </div>
        </div>
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">3. พิมพ์แบบฟอร์มชำระเงิน </h5>
            <br>
            <p>ชำระได้ที่เคาน์เตอร์ทุกธนาคาร หรือผ่านทาง Moblie Banking Application จนถึงวันที่ 13 พฤษภาคม 2563 เท่านั้น</p>
          </div>
        </div>
        <div class="card border-primary">
          <div class="card-body">
            <h5 class="card-title" style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> 4. ตรวจสอบรายชื่อผู้มีสิทธิ์สอบและพิมพ์บัตรประจำตัวผู้สอบ</h5>
            <br>
            <p>วันที่ 20 พฤษภาคม 2563</p>
            <br>
            
          </div>
        </div>
      </div> <!-- <div class="card-deck"> -->
      <hr>

      <h3>สมัครออนไลน์ <i class="far fa-hand-point-right"></i></h3>

      <div class="text-center">
        <div class="btn-group-vertical">
          <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 1</a>
          <a class="btn btn-success" href="registrationM1/master2563.php" role="button" target="_blank">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 1</a>
          <a class="btn btn-success" href="registrationM1/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 1 </a>
          <!-- <a class="btn btn-success" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
          <a class="btn btn-success" href="print/index-open.php" role="button">พิมพ์ใบชำระเงิน</a>
          <a class="btn btn-success" href="#" role="button">พิมพ์บัตรประจำตัวผู้สอบ (ตั้งแต่วันที่ 20 พฤษภาคม 2563)</a>
        </div>
        </div> <!-- <div class="text-center"> -->

        <div class="text-center">
          <br><br>
        <div class="btn-group-vertical">
          <a class="btn btn-primary" href="#" role="button">ระดับชั้นมัธยมศึกษาปีที่ 4</>
          <a class="btn btn-warning" href="registrationM4/master2563.php" role="button" target="_blank">สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 4</a>
          <a class="btn btn-warning" href="registrationM4/student_list.php" role="button">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 4 </a>
          <!-- <a class="btn btn-warning" href="#" role="button">อัพโหลดเอกสาร O-NET </a> -->
          <a class="btn btn-warning" href="print/index-open.php" role="button">พิมพ์ใบชำระเงิน</a>
          <a class="btn btn-warning" href="#" role="button">พิมพ์บัตรประจำตัวผู้สอบ (ตั้งแต่วันที่ 20 พฤษภาคม 2563)</a>
        </div>
      </div> <!-- <div class="text-center"> -->
      <h3>ติดต่อสอบถาม</h3>
      <div class="rounded border border-primary bg-white shadow">
          <ul >
            <li><i class="fas fa-envelope-open-text"></i> e-mail  : stpk@satreephuket.ac.th</li>
            <li><i class="fas fa-phone"></i> โทร : 088-7656-681</li>
          </ul>
      </div>

    </div> <!-- <div class="col-sm-10 text-left"> -->
<?php
$spkObject->spkFooter();
?>

  </div> <!-- <div class="row content"> -->
</div><!-- <div class="container-fluid text-center"> -->
</body>
</html>
