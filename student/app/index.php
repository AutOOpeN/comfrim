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

    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    
    try{
    
        // $stmt_res = $conn->prepare($_SESSION['sql_res']);
        $stmt_res = $conn->prepare($_SESSION['sql_res']);
        $stmt_res->execute();
        
        $row_res = $stmt_res->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    try{
    
        // $stmt_reg = $conn->prepare($_SESSION['sql_reg']);
        $stmt_reg = $conn->prepare($_SESSION['sql_reg']);
        $stmt_reg->execute();
        
        $row_reg = $stmt_reg->fetch();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    switch ($_SESSION['plan']){
        case 11: // m1-smte
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            $str_table_thead = "<thead><tr>
                <th>วิทยาศาสตร์ (40)</th>
                <th>คณิตศาสตร์ (40)</th>
                <th>อังกฤษ (20)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] + $row_res[5],2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4]. "</td><td>"  . $row_res[5]. "</td><td>" . $total ."</td></tr>";
            break;
        case 12: // m1-ip
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            $str_table_thead = "<thead><tr>
                <th>คณิตศาสตร์ (20)</th>
                <th>อังกฤษ (50)</th>
                <th>สัมภาษณ์ (30)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] + $row_res[5],2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4]. "</td><td>"  . $row_res[5]. "</td><td>" . $total ."</td></tr>";            
            break;
        case 13: // m1-ipc
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            $str_table_thead = "<thead><tr>
                <th>วิทยาศาสตร์ (25)</th>
                <th>คณิตศาสตร์ (25)</th>
                <th>อังกฤษ (25)</th>
                <th>สัมภาษณ์ (25)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] + $row_res[5] + $row_res[6],2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4]. "</td><td>"  . $row_res[5]. "</td><td>" . $row_res[6]. "</td><td>" . $total ."</td></tr>";            
            break;
        case 41; // m4-smte
            $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
            $str_table_thead = "<thead><tr>
                <th>วิทยาศาสตร์ (50)</th>
                <th>คณิตศาสตร์ (50)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] ,2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4].  "</td><td>" . $total ."</td></tr>";
            break;
        case 42: // m4-ip
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
            $str_table_thead = "<thead><tr>
                <th>คณิตศาสตร์ (20)</th>
                <th>อังกฤษ (50)</th>
                <th>สัมภาษณ์ (30)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] + $row_res[5],2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4]. "</td><td>"  . $row_res[5]. "</td><td>" . $total ."</td></tr>";
            break;
        case 43: // m4-ipc
            $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
            $str_table_thead = "<thead><tr class='text-center'>
                <th>วิทยาศาสตร์ (25)</th>
                <th>คณิตศาสตร์ (25)</th>
                <th>อังกฤษ (25)</th>
                <th>สัมภาษณ์ (25)</th>
                <th>รวม (100)</th>
            </tr></thead>";
            $total = number_format($row_res[3] + $row_res[4] + $row_res[5] + $row_res[6],2);
            $str_table_td = "<tr><td>" . $row_res[3] ."</td><td>" . $row_res[4]. "</td><td>"  . $row_res[5]. "</td><td>" . $row_res[6]. "</td><td>" . $total ."</td></tr>";            
            break;
        default:
            $str_table_thead = "<thead><tr>
                <th>#</th>
                <th>#</th>
                <th>#</th>
                <th>#</th>
            </tr></thead>";
            $str_sql = "";          
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
    <title>โรงเรียนสตรีภูเก็ต | ประกาศผลสอบ โครงการพิเศษ <?php echo $strEducationYear ?></title>
</head>

<body>
<?php

?>
    <div class="container">

    <div class="text-center">
        <img class="mb-4" src="../../images/logo_spk.gif" alt="logo" width="120" height="150">
            <h1 class="h2 mb-3 fw-normal text-primary">โรงเรียนสตรีภูเก็ต</h1>
            <h3 class="h4 mb-3 fw-normal">นักเรียนประเภทห้องเรียนพิเศษ  <?php echo $strEducationYear ?></h3>
    </div>
        <hr class="my-1">
        <a class="btn btn-primary" role="button" href="logout.php"><i class='btn bx bx-log-out'></i> ออกจากระบบ</a>
        <div class="pb-2">
            <table class="table table-borderless">
                <tr>
                    <td class="text-end fw-bold">ชื่อ - นามสกุล :</td>
                    <td class="text-start"><?php echo  $row_reg['m1s010'] . $row_reg['m1s020'] . "  " . $row_reg['m1s030'] ?></td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">เลขประจำตัวประชาชน :</td>
                    <td class="text-start"><?php echo $_SESSION['ref1'] ?></td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">รหัสประจำตัวสอบ :</td>
                    <td class="text-start"><?php echo $_SESSION['ex_id'] ?></td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">ระดับชั้นมัธยมศึกษาปีที่ :</td>
                    <td class="text-start"><?php echo $_SESSION['m'] ?></td>
                </tr>
                <tr>
                    <td class="text-end fw-bold">แผนการเรียน :</td>
                    <td class="text-start"><?php echo $str_plan ?></td>
                </tr>

                <?php
                    if ($row_res["result_status"] == 1){

                        $str_payment = '<span class="text-warning bg-dark">รอชำระเงิน</span>';
                        $str_confirm01 = '<span class="text-warning bg-dark">รอการยืนยัน</span>';
                        $str_confirm02 = '<span class="text-warning bg-dark">รอการยืนยัน</span>';
                        if ($row_res['confirm02_file01_status'] == 2 && $row_res['confirm02_file02_status'] == 2 
                            && $row_res['confirm02_file03_status'] == 2 && $row_res['confirm02_file04_status'] == 2
                            && $row_res['confirm02_file05_status'] == 2 && $row_res['confirm02_file06_status'] == 2)
                            {
                                $str_confirm02 = '<span class="text-success bg-dark">การมอบตัวสมบูรณ์</span>';
                            }

                        if($row_res["payment"] == 1){
                            $str_payment = '<span class="text-info bg-dark">ได้รับหลักฐานการจ่ายเงินแล้ว</span>';
                            if($row_res["confirm01_status"] == 1){
                                $str_confirm01 = '<span class="text-success bg-dark">การรายงานตัว สมบูรณ์</span>';
                            }
                        }
                        if($row_res["confirm01_status"] == 3){
                            $str_confirm01 = '<span class="text-warning bg-dark">สละสิทธิ์</span>';
                            $str_confirm02 = '<span class="text-warning bg-dark">สละสิทธิ์</span>';
                        }

                        echo '
                            <tr>
                                <td class="text-end fw-bold">หลักฐานการชำระเงินเพื่อรายงานตัว :</td>
                                <td class="text-start">' . $str_payment . '</td>
                            </tr>
                                <tr>
                                    <td class=" text-end fw-bold">สถานะการรายงานตัว :</td>
                                    <td class="text-start">'. $str_confirm01 .'</td>
                                </tr>
                            <tr>
                                <td class="text-end fw-bold">สถานะการมอบตัว :</td>
                                <td class="text-start">'. $str_confirm02 .'</td>
                            </tr>
                        ';
                ?>
            </table>
            <div class="accordion " id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        หลักฐานเอกสารที่ใช้ในการมอบตัวออนไลน์ ประกอบด้วย
                    </button>
                </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
            
                    <ul>
                        <li>สำเนาทะเบียนบ้านของ นักเรียน <?php if($row_res['confirm02_file01_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle"></i></span>';}?> </li>
                        <li>สำเนาทะเบียนบ้านของ บิดา* <?php if($row_res['confirm02_file02_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle "></i></span>';}?></li>
                        <li>สำเนาทะเบียนบ้านของ มารดา* <?php if($row_res['confirm02_file03_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle "></i></span>';}?></li>
                        <li>สำเนาทะเบียนบ้านของ ผู้ปกครอง (กรณีที่ บิดา มารดาไม่ใช่ผู้ปกครอง ผู้ปกครองต้องมีชื่ออยู่ในทะเบียนบ้านเดียวกันกับนักเรียน) <?php if($row_res['confirm02_file03_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle "></i></span>';}?></li>
                        <li>หลักฐานการสำเร็จการศึกษา ป.พ.1 (ให้นำส่งภายใน วันที่ 1 เมษายน 2565 ทางเว็บไซต์) <?php if($row_res['confirm02_file05_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle "></i></span>';}?></li>
                        <li>รูปถ่ายนักเรียนขนาด 1.5 นิ้ว เครื่องแบบนักเรียนโรงเรียนสตรีภูเก็ต (ให้นำส่งภายใน วันที่ 1 เมษายน 2565 ทางเว็บไซต์) <?php if($row_res['confirm02_file06_status'] != 0 ){ echo '<span class="text-success bg-dark">ส่งเอกสารแล้ว <i class="bx bx-check-circle "></i></span>';}?></li>
                    </ul>

                </div>
            </div>
        </div>                    
            <?php } //if ($row_res["result_status"] == 1){ ?>
        </div>

        <div class="result">
            <div class="h3">
                ผลคะแนนสอบ
                <hr>
            </div>
            <table class="table">
                <?php
                    echo $str_table_thead;
                ?>
                <tbody>
                    <tr class="text-center">
                    <?php
                    echo $str_table_td;
                    ?>

                    </tr>
                </tbody>
            </table>
            
            <table class="table table-bordered border-b mt-5">
                <thead>
                    <tr>
                        <th>ลำดับที่สอบได้</th>
                        <th>ผลการสอบ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row_res['result_no'] ?></td>
                        <td><?php echo $row_res['result_text'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="link_btn text-center">
            <button class="button" onclick="window.open('index-print.php','_blank')"> 
                <i class='bx bx-printer'></i>
                พิมพ์ใบรายงานผลการสอบ
            </button>
                <?php
                if ($row_res["result_status"] == 1){
                    if($row_res["confirm01_status"] == 0  ){ //ยังไม่จ่าย
                ?>
                    <button class="button"  onclick="window.open('payment.php','_blank')"> 
                        <i class='bx bxs-user-check'></i>
                        ส่งหลักฐานการชำระเงินเพื่อรายงานตัว
                    </button>
                    <?php
                    }
                        if($row_res["confirm01_status"] == 1){

                    ?>
                    <button class="button"  onclick="window.open('confirm_upload.php','_blank')" > 
                        <i class='bx bxs-user-check'></i>
                        ส่งหลักฐานการมอบตัว
                    </button>
                    <a class="btn button" role="button" href="confirm.php" > 
                        <i class='bx bxs-user-check'></i>
                        กรอกข้อมูลเพื่อมอบตัวนักเรียน
                        </a>
                    <?php
                        }
                    ?>
                <?php
                }
                ?>


            


        </div>
        </div>
    </div>

    <div class="text-center">
        <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>

</body>

</html>