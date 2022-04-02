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
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
    
    $sql_check_file = "SELECT * FROM " . $_SESSION['tbl_res']  . " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
    try{
        $stmt_check = $conn->prepare($sql_check_file);
        $stmt_check->execute();
        $row_file_check = $stmt_check -> fetch(); 
        } catch (PDOException $e) {
         $error = "";
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

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        ขั้นตอนการมอบตัวนักเรียน
                    </button>
                </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                
                    <p>1 .หลักฐานเอกสารที่ใช้ในการมอบตัวออนไลน์ ประกอบด้วย</p>
                    <ul>
                        <li>หลักฐานการจ่ายเงิน</li>
                        <li>สำเนาทะเบียนบ้านของ นักเรียน </li>
                        <li>สำเนาทะเบียนบ้านของ บิดา*</li>
                        <li>สำเนาทะเบียนบ้านของ มารดา*</li>
                        <li>สำเนาทะเบียนบ้านของ ผู้ปกครอง (กรณีที่ บิดา มารดาไม่ใช่ผู้ปกครอง ผู้ปกครองต้องมีชื่ออยู่ในทะเบียนบ้านเดียวกันกับนักเรียน</li>
                        <li>หลักฐานการสำเร็จการศึกษา ป.พ.1 </li>
                        <li>รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต </li>
                    </ul>
                    <p>2.	กรอกข้อมูลเพื่อมอบตัวนักเรียนให้ครบถ้วนพร้อม พิมพ์เอกสารใบมอบตัวนำส่งในวันเปิดเทอม</p>
                    <div class="alert alert-info fst-italic" role="alert">
                        * หมายเหตุ กรณีนักเรียนขาดเอกสารหลักฐานของบิดาหรือมารดา สามารถใช้สำเนาสูติบัตรของนักเรียนแทนได้
                    </div>
                </div>
            </div>
        </div>
        
        
        <form action="" method="post" class="row g-3 pb-4 needs-validation" novalidate enctype="multipart/form-data">
            
                <div class="text-start pt-4">
                    <span class="fw-bold">หลักฐานการชำระค่าบำรุงการศึกษา<?php if($row_file_check['payment'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="payment" class="form-control" accept="image/*" aria-label="file example" 
                    <?php 
                        if($row_file_check['payment'] == 0 ){ 
                            echo "required";
                        }elseif($row_file_check['payment'] == 2 ){ echo "disabled";}
                    ?>                    
                    
                    >
                    <div class="invalid-feedback">เลือกรูปภาพ หลักฐานการชำระค่าบำรุงการศึกษา </div>
                </div>

                <div class="text-start pt-4">
                    <span class="fw-bold">สำเนาทะเบียนบ้านของ นักเรียน <?php if($row_file_check['confirm02_file01_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file01" class="form-control" accept="application/pdf" aria-label="file example" 
                    <?php 
                        if($row_file_check['confirm02_file01_status'] == 0 ){ 
                            echo "required";
                        }elseif($row_file_check['confirm02_file01_status'] == 2 ){ echo "disabled";}
                    ?>
                    >
                    <div class="invalid-feedback">สำเนาทะเบียนบ้านของ นักเรียน </div>
                </div>
                <hr>
                <div class="text-start">
                    <span class="fw-bold">สำเนาทะเบียนบ้านของ บิดา <?php if($row_file_check['confirm02_file02_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file02" class="form-control" accept="application/pdf" aria-label="file example" <?php if($row_file_check['confirm02_file02_status'] == 0 ){ echo "required";}elseif($row_file_check['confirm02_file02_status'] == 2 ){ echo "disabled";}?> >
                    <div class="invalid-feedback">สำเนาทะเบียนบ้านของ บิดา </div>
                </div>
                <hr>
                <div class="text-start ">
                    <span class="fw-bold">สำเนาทะเบียนบ้านของ มารดา <?php if($row_file_check['confirm02_file03_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file03" class="form-control" accept="application/pdf" aria-label="file example" <?php if($row_file_check['confirm02_file03_status'] == 0 ){ echo "required";}elseif($row_file_check['confirm02_file03_status'] == 2 ){ echo "disabled";}?> >
                    <div class="invalid-feedback">สำเนาทะเบียนบ้านของ มารดา </div>
                </div>
                <hr>
                <div class="text-start ">
                    <span class="fw-bold">สำเนาทะเบียนบ้านของ ผู้ปกครอง <?php if($row_file_check['confirm02_file04_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file04" class="form-control" accept="application/pdf" aria-label="file example" <?php if($row_file_check['confirm02_file04_status'] == 0 ){ echo "required";}elseif($row_file_check['confirm02_file04_status'] == 2 ){ echo "disabled";}?> >
                    <div class="invalid-feedback">สำเนาทะเบียนบ้านของ ผู้ปกครอง </div>
                </div>
                <hr>
                <div class="text-start ">
                    <span class="fw-bold">หลักฐานการสำเร็จการศึกษา ป.พ.1 <?php if($row_file_check['confirm02_file05_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span></span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file05" class="form-control" accept="application/pdf" aria-label="file example" <?php if($row_file_check['confirm02_file05_status'] == 2 ){ echo "disabled";}?> >
                    <div class="invalid-feedback">หลักฐานการสำเร็จการศึกษา ป.พ.1  </div>
                </div>
                <hr>
                <div class="text-start ">
                    <span class="fw-bold">รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต <?php if($row_file_check['confirm02_file06_status'] != 0 ){ echo '<span class="text-success bg-warning">ส่งเอกสารแล้ว</span>';}?></span> </span>
                </div>
                <div class="col-sm-12">
                    <input type="file" name="file06" class="form-control" accept="image/*" aria-label="file example" <?php if($row_file_check['confirm02_file06_status'] == 2 ){ echo "disabled";}?>  >
                    <div class="invalid-feedback">รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต </div>
                </div>
                <hr>
                
                <div class="col-12">
                    <button class="btn btn-primary" type="submit"><i class='bx bx-upload' ></i> ส่งหลักฐานการมอบตัว</button>
                </div>
        </form>

    <?php
    // START UPLOAD
    if (isset($_FILES['payment']) || isset($_FILES['file01']) || isset($_FILES['file02']) || isset($_FILES['file03']) || isset($_FILES['file04']) ||isset($_FILES['file05']) || isset($_FILES['file06']) ) {
        
        // 
        $file_payment_extension = pathinfo(basename($_FILES['payment']['name']), PATHINFO_EXTENSION);
        if ($file_payment_extension != "") {
            $new_file_payment_name = $_SESSION['ref1'] . "-payment." . $file_payment_extension;
            $file_payment_path     = "/var/www/html/admission/confirm/";
            $upload_path_payment   = $file_payment_path . $new_file_payment_name;
            $file_payment_status = 1;
        } else {
            $file_payment_status = 0;
        }

        // <li>สำเนาทะเบียนบ้านของ นักเรียน </li>

        $file01_extension = pathinfo(basename($_FILES['file01']['name']), PATHINFO_EXTENSION);
        if ($file01_extension != "") {
            $new_file01_name = $_SESSION['ref1'] . "-file01." . $file01_extension;
            $file01_path     = "/var/www/html/admission/confirm/";
            $upload_path01   = $file01_path . $new_file01_name;
            $file01_status = 1;
        } else {
            $file01_status = 0;
        }

        // <li>สำเนาทะเบียนบ้านของ บิดา*</li>
        $file02_extension = pathinfo(basename($_FILES['file02']['name']), PATHINFO_EXTENSION);
        if ($file02_extension != "") {
            $new_file02_name = $_SESSION['ref1'] . "-file02." . $file02_extension;
            $file2_path      = "/var/www/html/admission/confirm/";
            $upload_path02   = $file2_path . $new_file02_name;
            $file02_status = 1;
        } else {
            // $new_file02_name = "none";
            $file02_status = 0;
        }


        // <li>สำเนาทะเบียนบ้านของ มารดา*</li>

        $file03_extension = pathinfo(basename($_FILES['file03']['name']), PATHINFO_EXTENSION);
        if ($file03_extension != "") {
            $new_file03_name = $_SESSION['ref1'] . "-file03." .  $file03_extension;
            $file3_path      = "/var/www/html/admission/confirm/";
            $upload_path03   = $file3_path . $new_file03_name;
            $file03_status = 1;
        } else {
            // $new_file03_name = "none";
            $file03_status = 0;
        }

        // <li>สำเนาทะเบียนบ้านของ ผู้ปกครอง (กรณีที่ บิดา มารดาไม่ใช่ผู้ปกครอง ผู้ปกครองต้องมีชื่ออยู่ในทะเบียนบ้านเดียวกันกับนักเรียน</li>

        $file04_extension = pathinfo(basename($_FILES['file04']['name']), PATHINFO_EXTENSION);
        if ($file04_extension != "") {
            $new_file04_name = $_SESSION['ref1'] . "-file04." .  $file04_extension;
            $file4_path      = "/var/www/html/admission/confirm/";
            $upload_path04   = $file4_path . $new_file04_name;
            $file04_status = 1;
        } else {
            // $new_file04_name = "none";
            $file04_status = 0;
        }


        // <li>หลักฐานการสำเร็จการศึกษา ป.พ.1 (ให้นำส่งภายใน วันที่ 3 เมษายน 2565 ทางเว็บไซต์)</li>

        $file05_extension = pathinfo(basename($_FILES['file05']['name']), PATHINFO_EXTENSION);
        if ($file05_extension != "") {
            $new_file05_name = $_SESSION['ref1'] . "-file05." .  $file05_extension;
            $file5_path      = "/var/www/html/admission/confirm/";
            $upload_path05   = $file5_path . $new_file05_name;
            $file05_status = 1;
        } else {
            // $new_file05_name = "none";
            $file05_status = 0;
        }

        // <li>รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต (ให้นำส่งภายใน วันที่ 3 เมษายน 2565 ทางเว็บไซต์)</li>
        $file06_extension = pathinfo(basename($_FILES['file06']['name']), PATHINFO_EXTENSION);
        if ($file06_extension != "") {
            $new_file06_name = $_SESSION['ref1'] . "-file06." .  $file06_extension;
            $file6_path      = "/var/www/html/admission/confirm/";
            $upload_path06   = $file6_path . $new_file06_name;
            $file06_status = 1;
        } else {
            // $new_file06_name = "none";
            $file06_status = 0;
        }


        // payment
        if ($file_payment_extension != "") {
            $status_file_payment = move_uploaded_file($_FILES['payment']['tmp_name'], $upload_path_payment);
            if ($status_file_payment == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งหลักฐานการชำระค่าบำรุงการศึกษา  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            ";                
            }
        }    
        // file01
        if ($file01_extension != "") {
            $status_file1 = move_uploaded_file($_FILES['file01']['tmp_name'], $upload_path01);
            if ($status_file1 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งสำเนาทะเบียนบ้านของ นักเรียน  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            ";                
            }
        }    
        //file02
        if ($file02_extension != "") {
            $status_file2 = move_uploaded_file($_FILES['file02']['tmp_name'], $upload_path02);
            if ($status_file2 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งสำเนาทะเบียนบ้านของ บิดา  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            "; 
                //exit();
            }
        }
        //file03
        if ($file03_extension != "") {
            $status_file3 = move_uploaded_file($_FILES['file03']['tmp_name'], $upload_path03);
            if ($status_file3 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งสำเนาทะเบียนบ้านของ มารดา  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            "; 
                //exit();
            }
        }

        //file04
        if ($file04_extension != "") {
            $status_file4 = move_uploaded_file($_FILES['file04']['tmp_name'], $upload_path04);
            if ($status_file4 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งสำเนาทะเบียนบ้านของ ผู้ปกครอง  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            "; 
                //exit();
            }
        }

        //file05
        if ($file05_extension != "") {
            $status_file5 = move_uploaded_file($_FILES['file05']['tmp_name'], $upload_path05);
            if ($status_file5 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งหลักฐานการสำเร็จการศึกษา ป.พ.1   ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            "; 
                //exit();
            }
        }

        //file06
        if ($file06_extension != "") {
            $status_file6 = move_uploaded_file($_FILES['file06']['tmp_name'], $upload_path06);
            if ($status_file6 == false) {
                echo "
                <div class='alert alert-danger text-center pt-4' role='alert'>
                ส่งรูปถ่ายนักเรียน  ไม่สำเร็จ!! <i class='bx bx-x-circle' ></i>
                </div>
            "; 
                //exit();
            }
        }

           

            // $sql_update = "UPDATE ex_m1_s_result_bak" ;
        $str_Err = "<div class='alert alert-danger text-center pt-4' role='alert'>ระบบผิดพลาด !! </div>";
            
            // payment
        if ($file_payment_status == 1){
            $sql_payment = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
            $sql_payment .= "payment_name = '" . $new_file_payment_name . "'";
            $sql_payment .= ", payment = '" . $file_payment_status . "'";
            $sql_payment .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
            try{
                $f1 = $conn->prepare($sql_payment);
                $f1->execute();
                echo "
                <div class='alert alert-success text-center pt-4' role='alert'>
                ส่งหลักฐานการชำระค่าบำรุงการศึกษา  สำเร็จ <i class='bx bx-check-circle'></i>
                </div>";                                        
            } catch (PDOException $e) { 
                echo "payment<br>" . $str_Err; 
            } 
        } // endif file
            // file01
        if ($file01_status == 1){
            $sql_file01 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
            $sql_file01 .= "confirm02_file01 = '" . $new_file01_name . "'";
            $sql_file01 .= ",confirm02_file01_status = '" . $file01_status . "'";
            $sql_file01 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
            try{
                $f1 = $conn->prepare($sql_file01);
                $f1->execute();
                echo "
                    <div class='alert alert-success text-center pt-4' role='alert'>
                    ส่งสำเนาทะเบียนบ้านของ นักเรียน  สำเร็จ <i class='bx bx-check-circle'></i>
                    </div>";                                        
            } catch (PDOException $e) { 
                echo "01<br>" . $str_Err; 
            } 
        } // endif file
            // file02
            if ($file02_status == 1){
                $sql_file02 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
                $sql_file02 .= "confirm02_file02 = '" . $new_file02_name . "'";
                $sql_file02 .= ",confirm02_file02_status = '" . $file02_status . "'";                
                $sql_file02 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
                try{
                    $f2 = $conn->prepare($sql_file02);
                    $f2->execute();
                    echo "
                        <div class='alert alert-success text-center pt-4' role='alert'>
                        ส่งสำเนาทะเบียนบ้านของ บิดา  สำเร็จ <i class='bx bx-check-circle'></i>
                        </div>";                                        
                } catch (PDOException $e) { 
                    echo "02<br>" . $str_Err; 
                } 
            } // endif file
            // file03
            if ($file03_status == 1){
                $sql_file03 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
                $sql_file03 .= "confirm02_file03 = '" . $new_file03_name . "'";
                $sql_file03 .= ",confirm02_file03_status = '" . $file03_status . "'";                
                $sql_file03 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
                try{
                    $f3 = $conn->prepare($sql_file03);
                    $f3->execute();
                    echo "
                        <div class='alert alert-success text-center pt-4' role='alert'>
                        ส่งสำเนาทะเบียนบ้านของ มารดา  สำเร็จ <i class='bx bx-check-circle'></i>
                        </div>";                                        
                } catch (PDOException $e) { 
                    echo "03<br>" . $str_Err; 
                } 
            } // endif file


            // file04
            if ($file04_status == 1){
                $sql_file04 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
                $sql_file04 .= "confirm02_file04 = '" . $new_file04_name . "'";
                $sql_file04 .= ",confirm02_file04_status = '" . $file04_status . "'";                
                $sql_file04 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
                try{
                    $f4 = $conn->prepare($sql_file04);
                    $f4->execute();
                    echo "
                        <div class='alert alert-success text-center pt-4' role='alert'>
                        ส่งสำเนาทะเบียนบ้านของ ผู้ปกครอง  สำเร็จ <i class='bx bx-check-circle'></i>
                        </div>";                                        
                } catch (PDOException $e) { 
                    echo "04<br>" . $str_Err; 
                } 
            } // endif file
            // file05
            if ($file05_status == 1){
                $sql_file05 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
                $sql_file05 .= "confirm02_file05 = '" . $new_file05_name . "'";
                $sql_file05 .= ",confirm02_file05_status = '" . $file05_status . "'";                
                $sql_file05 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
                try{
                    $f5 = $conn->prepare($sql_file05);
                    $f5->execute();
                    echo "
                        <div class='alert alert-success text-center pt-4' role='alert'>
                        ส่งสำเนาทะเบียนบ้านของ หลักฐานการสำเร็จการศึกษา ป.พ.1  สำเร็จ <i class='bx bx-check-circle'></i>
                        </div>";                                        
                } catch (PDOException $e) { 
                    echo "05<br>" . $str_Err; 
                } 
            } // endif file
            // file06
            if ($file06_status == 1){
                $sql_file06 = "UPDATE " . $_SESSION['tbl_res'] . " SET ";   
                $sql_file06 .= "confirm02_file06 = '" . $new_file06_name . "'";
                $sql_file06 .= ",confirm02_file06_status = '" . $file06_status . "'";                
                $sql_file06 .= " WHERE  ref1 = '" . $_SESSION['ref1'] . "'";
                try{
                    $f6 = $conn->prepare($sql_file06);
                    $f6->execute();
                    echo "
                        <div class='alert alert-success text-center pt-4' role='alert'>
                        ส่งสำเนาทะเบียนบ้านของ รูปถ่ายนักเรียน สำเร็จ <i class='bx bx-check-circle'></i>
                        </div>";                                        
                } catch (PDOException $e) { 
                    echo "06<br>" . $str_Err; 
                } 
            } // endif file

    }

    
    $conn = null;
    ?>

    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
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
                    alert("กรุณาส่งเอกสารให้ครบ (ในกรอบสีแดง) ");
                }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();



</script>