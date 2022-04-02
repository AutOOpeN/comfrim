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
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    

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
    
    <title>โรงเรียนสตรีภูเก็ต | ห้องเรียนทั่วไป  <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class="container">
        <div class="text-center">
        <img class="mb-4" src="../../images/logo_spk.gif" alt="logo" width="120" height="150">
            <h1 class="h1 mb-3 fw-normal text-primary">โรงเรียนสตรีภูเก็ต</h1>
            <h3 class="h4 mb-3 fw-normal">นักเรียนประเภท ห้องเรียนทั่วไป  <?php echo $strEducationYear ?></h3>
        </div>
        <hr class="my-4">
        <?php
            $sql = "SELECT * FROM ".$_SESSION['tbl_res'] . " WHERE ref1 = " . $_SESSION['ref1']; 
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $row = $stmt -> fetch();
            $strDisable = "";
            $strChk1 = "";
            $strChk2 = "";
            $str_status = '<div class="alert alert-primary" role="alert">ยืนยันสิทธิ์ได้เพียงครั้งเดียวเท่านั้น</div>';
            if ($row['confirm01_status'] == "1"){
                $strDisable = "disabled";
                $strChk1= "checked";
                $str_status = '<div class="alert alert-success" role="alert">ยืนยันสิทธิ์การเข้าเรียน ต้องการเข้าเรียน</div>';
            }elseif($row['confirm01_status'] == "2"){
                $strDisable = "disabled";
                $str_status = '<div class="alert alert-warning" role="alert"> ยืนยันสิทธิ์การเข้าเรียน สละสิทธิ์การเข้าเรียน </div>';
                $strChk2="checked";
            }        
        ?>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"  >
                        ยืนยันสิทธิ์การเข้าเรียน ชั้นมัธยมศึกษาปีที่ <?php echo $_SESSION['m'] ?>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                    <div class="accordion-body">
                        <?php echo $str_status  ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-start pt-5 pb-3">
            <span class="h4 fw-normal">ยืนยันสิทธิ์การเข้าเรียน</span>
        </div>

        <form action="" method="post" class="row g-3 needs-validation pb-4" novalidate>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="1" <?php echo $strDisable . " "; echo $strChk1;  ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    ต้องการเข้าเรียน
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="2" <?php echo $strDisable. " "; echo $strChk2;  ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    สละสิทธิ์การเข้าเรียน
                </label>
            </div>
            
            <div class="col-5 pt-3">
                
                <button class="btn btn-primary form-control" type="submit" name="submit" onclick="return confirm('ต้องการดำเนินการยืนยันสิทธิ์ ?');"  <?php echo $strDisable  ?>> ดำเนินการ </button>
            </div>

        </form>

    <?php

    if (isset($_POST['submit'])) {

            // try {

                $sql_update = "UPDATE " . $_SESSION['tbl_res'] . " SET confirm01_status = " . $_POST['flexRadioDefault'] . " WHERE ref1 = " . $_SESSION['ref1'] ;
                $stmt = $conn->prepare($sql_update);
                $stmt->execute();
                
 
                    echo "<SCRIPT LANGUAGE='JavaScript'>window.alert('เปลี่ยนสถานะสำเร็จ')</SCRIPT>";
                    header('location:index.php');

                // echo "
                //         <div class='alert alert-success text-center pt-4' role='alert'>
                //         ส่งหลักฐานการชำระค่าบำรุงการศึกษา  สำเร็จ <i class='bx bx-check-circle'></i>
                //         </div>
                //     ";
            // } catch (PDOException $e) {
                
            //     echo "
            //     <div class='alert alert-danger text-center pt-4' role='alert'>
            //     ระบบผิดพลาด !!
            //     </div>
            // ";   
            // }
    }
        
    $conn = null;
    ?>

    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </div>
    </div>
    
</body>
</html>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields



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
                    alert("กรุณายืนยันสิทธิ์ ");
                }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();



</script>