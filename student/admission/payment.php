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
    
    <title>โรงเรียนสตรีภูเก็ต | ประกาศผลสอบ โครงการพิเศษ  <?php echo $strEducationYear ?></title>
</head>

<body>
    <div class="container">
        <div class="text-center">
        <img class="mb-4" src="../../images/logo_spk.gif" alt="logo" width="120" height="150">
            <h1 class="h1 mb-3 fw-normal text-primary">โรงเรียนสตรีภูเก็ต</h1>
            <h3 class="h4 mb-3 fw-normal">นักเรียนประเภทห้องเรียนพิเศษ  <?php echo $strEducationYear ?></h3>
        </div>
        <hr class="my-4">
        <div class="text-start p-5">
            <span class="h4 fw-normal">หลักฐานการชำระค่าบำรุงการศึกษา</span>
        </div>

        <form action="" method="post" class="row g-3 needs-validation pb-4" novalidate enctype="multipart/form-data">
            
                <!--  -->
                <div class="col-sm-12">
                    <input type="file" name="payment" class="form-control" accept="image/*" aria-label="file example" required>
                    <div class="invalid-feedback">เลือกรูปภาพ หลักฐานการชำระค่าบำรุงการศึกษา </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit"><i class='bx bx-upload' ></i> ส่งหลักฐานการชำระค่าบำรุงการศึกษา</button>
                </div>
            
        </form>

    <?php
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_FILES['payment'])) {
        $file01_extension = pathinfo(basename($_FILES['payment']['name']), PATHINFO_EXTENSION);
        if ($file01_extension != "") {
            $new_file01_name = $_SESSION['ref1'] . "." . $file01_extension;
            $file01_path     = "/var/www/html/app/payment/";
            $upload_path01   = $file01_path . $new_file01_name;
        } else {
            $new_file01_name = "none";
            // echo $new_image_name;
        }

        if ($file01_extension != "") {
            $status_file3 = move_uploaded_file($_FILES['payment']['tmp_name'], $upload_path01);
            if ($status_file3 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งหลักฐานการชำระค่าบำรุงการศึกษา  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            ";                
            //exit();
            }
            try {

            $sql_update = "UPDATE " . $_SESSION['tbl_res'] . " SET payment = 1 , payment_name = '" . $new_file01_name . "' WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
            $stmt = $conn->prepare($sql_update);
            $stmt->execute();
            echo "
                    <div class='alert alert-success text-center pt-4' role='alert'>
                       ส่งหลักฐานการชำระค่าบำรุงการศึกษา  สำเร็จ <i class='bx bx-check-circle'></i>
                    </div>
                ";
            } catch (PDOException $e) {
                
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ระบบผิดพลาด !!
                </div>
            ";   
            }
        }
    }

    $sql = "SELECT * FROM "  . $_SESSION['tbl_res'] . " WHERE payment = 1 AND ref1 = '" . $_SESSION['ref1'] . "'";
    $stmt_img = $conn->prepare($sql);
    $stmt_img->execute();    
    $row_img = $stmt_img->fetch();
    $t = time();
    if ($row_img['payment'] == 1){
        echo '
        <div class="text-center">
        <hr class="my-4">   
        <p> เอกสาร หลักฐานการชำระค่าบำรุงการศึกษา</p>
            <img src="../../app/payment/' . $row_img['payment_name'] . '?' . $t. '" class="rounded" alt="img"  width="200" height="200">
        </div>';
        
    }
    
    $conn = null;
    ?>

    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
    </div>
    
</body>
</html>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

</script>