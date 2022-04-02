<?php
    session_start();
    if (!isset($_SESSION['admin_confirm'])) {
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

    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");    
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
    <link rel='stylesheet' type='text/css' href='../../../css/student/student.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>ห้องเรียนทั่วไป | โรงเรียนสตรีภูเก็ต<?php echo $strEducationYear ?></title>
</head>

<body>


  <div class="container">
        <div class=" text-center">
            <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
                <p class="lead text-muted"> ระบบรับนักเรียน <?php echo $strEducationYear;; ?> ห้องเรียนทั่วไป</p>
                <hr class="my-4">
            </div>
        </div>

        <div class="row btn-container">
          <div class="text-end"><a class="btn btn-info" role="button" href="logout.php">ออกจากระบบ <i class='bx bx-log-out'></i> </a></div>
          
          <p class="fw-bold"><i class='bx bx-money-withdraw bx-md'></i> ตรวจสอบการยืนยันสิทธิ์</p>
          <?php
            for ($n = 3; $n <= 10; $n++) {
                if ($n == 3 ){
                    echo '<div class="row mb-3">';
                }elseif($n ==7){
                    echo '<div class="row mb-3">';
                }
            ?>
                <div class="col-3">
                    <a href="payment?p=m1&m=<?php echo $n ?>" class="btn-edit yellow" role="button" aria-pressed="true">
                    <div>
                        <div class="topic">ม.1/<?php echo $n?></div>
                    </div>
                    </a>
                </div>
            
            <?php
                if($n == 6){
                    echo "</div>";
                }elseif($n == 10 ){
                    echo "</div>";
                }
            }
            echo '<hr>';
            for ($x = 2; $x <= 11; $x++) {
                if ($x == 2 ){
                    echo '<div class="row mb-3">';
                }elseif($x ==6){
                    echo '<div class="row mb-3">';
                }elseif($x ==10){
                    echo '<div class="row mb-3">';
                }
            ?>
                <div class="col-3">
                    <a href="payment?p=m4&m=<?php echo $x ?>" class="btn-edit green01" role="button" aria-pressed="true">
                    <div>
                        <div class="topic">ม.4/<?php echo $x?></div>
                    </div>
                    </a>
                </div>
            
            <?php
                if($x == 5){
                    echo "</div>";
                }elseif($x == 9 ){
                    echo "</div>";
                }elseif($x == 11 ){
                    echo "</div>";
                }
            }
          ?>

        </div>

        <div class="row btn-container">
          <p class="fw-bold"><i class='bx bx-user-check bx-md' ></i> ตรวจหลักฐานการมอบตัว</p>
          <?php
            for ($n = 3; $n <= 10; $n++) {
                if ($n == 3 ){
                    echo '<div class="row mb-3">';
                }elseif($n ==7){
                    echo '<div class="row mb-3">';
                }
            ?>
                <div class="col-3">
                    <a href="confirm?p=m1&m=<?php echo $n ?>" class="btn-edit pink" role="button" aria-pressed="true">
                    <div>
                        <div class="topic">ม.1/<?php echo $n?></div>
                    </div>
                    </a>
                </div>
            
            <?php
                if($n == 6){
                    echo "</div>";
                }elseif($n == 10 ){
                    echo "</div>";
                }
            }
            echo '<hr>';
            for ($x = 2; $x <= 11; $x++) {
                if ($x == 2 ){
                    echo '<div class="row mb-3">';
                }elseif($x ==6){
                    echo '<div class="row mb-3">';
                }elseif($x ==10){
                    echo '<div class="row mb-3">';
                }
            ?>
                <div class="col-3">
                    <a href="confirm?p=m4&m=<?php echo $x ?>" class="btn-edit purple" role="button" aria-pressed="true">
                    <div>
                        <div class="topic">ม.4/<?php echo $x?></div>
                    </div>
                    </a>
                </div>
            
            <?php
                if($x == 5){
                    echo "</div>";
                }elseif($x == 9 ){
                    echo "</div>";
                }elseif($x == 11 ){
                    echo "</div>";
                }
            }
          ?>
        </div> <!--<div class="row btn-container">-->

        <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>        
  </div> <!--<div class="container"> -->


</body>

</html>