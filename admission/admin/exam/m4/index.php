<?php
require_once "../../../config/function.php";
require_once '../../../config/settings.config.php';
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: ../../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: ../../login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
    //include("../config/graph.inc.php");
 
    function fetch_data()
    {
        $servername = "localhost";
        $username   = "root";
        $password   = ",uok8,";
        $dbname     = "admission";
        $output = '';             
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT m4.id, m4.reg_card_id, m4.reg_name_title, m4.reg_name, m4.reg_suname, m4.old_school_name , m4.reg_plan1_id, m4.reg_plan2_id, ex_m4.ex_room, ex_m4.ex_id,m4.reg_onet_point  FROM m4 ";
            $sql .= " INNER JOIN ex_m4 ON m4.reg_card_id = ex_m4.ref1  ORDER BY ex_m4.ex_id ASC ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $reg_id = $row['ex_id'];
                if ($reg_id < 1000) {
                    if ($reg_id < 10) {
                        $reg_id =  "4000" . $reg_id;
                    } elseif ($reg_id < 100) {
                        $reg_id = "400" . $reg_id;
                    } else {
                        $reg_id = "40" . $reg_id;
                    }
                }else{
                    $reg_id = "4" . $reg_id;
                }
                switch ($row['reg_plan1_id']){
                    case 1:
                        $plan1 = "วิทยาศาสตร์ - คณิตศาสตร์";
                        break;
                    case 2:
                        $plan1 = "อังกฤษ - คณิตศาสตร์";
                        break;
                    case 3:
                        $plan1 = "อังกฤษ - ฝรั่งเศส";
                        break;
                    case 4:
                        $plan1 = "อังกฤษ - เยอรมัน";
                        break;
                    case 5:
                        $plan1 = "อังกฤษ - จีน";
                        break;
                    case 6:
                        $plan1 = "อังกฤษ - ญี่ปุ่น";
                        break;
                    default:
                        $plan1 = "";
                }

        
                switch ($row['reg_plan2_id']){
                    case 1:
                        $plan2 = "วิทยาศาสตร์ - คณิตศาสตร์";
                        break;
                    case 2:
                        $plan2 = "อังกฤษ - คณิตศาสตร์";
                        break;
                    case 3:
                        $plan2 = "อังกฤษ - ฝรั่งเศส";
                        break;
                    case 4:
                        $plan2 = "อังกฤษ - เยอรมัน";
                        break;
                    case 5:
                        $plan2 = "อังกฤษ - จีน";
                        break;
                    case 6:
                        $plan2 = "อังกฤษ - ญี่ปุ่น";
                        break;
                    default:
                        $plan2 = "";
                    
                }                    
                    
                    // switch ($row['area_id']) {
                    //     case 1:
                    //         $area = "ทั่วไป";
                    //         break;
                    //     case 2:
                    //         $area = "ในเขต";
                    //         break;
                    //     default:
                    //         $area = "";
                    //         break;
                    // }
             
                $output .= " 
                    <tr>
                        <td> $row[ex_room]</td>
                        <td> $reg_id</td>
                        <td> $row[reg_name_title]</td>
                        <td>$row[reg_name]</td>  
                        <td>$row[reg_suname]</td>
                        <td> $row[old_school_name] </td>
                        <td> $plan1 </td>
                        <td> $plan2 </td>
                        
                    </tr>
                ";

            }
            
            return $output;
    
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../../../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../../css/app_css.css">    
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

</head>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>


<body>
    <div class="container">
        <div class=" text-center">
            <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
                <hr>
        </div>
        
        <div style="margin: 2.0rem"></div>    
        <div class="text-center">
            <h4 class="text-center" style="color:#043c96;text-shadow: 2px 2px 4px #000000;">รายชื่อผู้มีสิทธิสอบ ชั้นมัธยมศึกษาปีที่ 4</h4>
        </div>
        <div style="margin: 2.0rem"></div>
        
        <div class="row">
            <div class="btn-group col-md-3" role="group">
                <a class="btn btn-info btn-lg"  href="../../" role="button"><i class="fas fa-home"></i> หน้าแรก </a>
            </div>
            <div class="btn-group col-md-3" role="group">
                <a class="btn btn-warning btn-lg"  href="room_add.php" role="button"><i class="fa-solid fa-book-open-reader"></i>สร้างห้องสอบ </a>
            </div>            
            <div class="btn-group col-md-3" role="group">
                <a class="btn btn-primary btn-lg"  href="ex_create_m4.php" role="button"><i class="fas fa-tasks"></i> สร้างผู้มีสิทธิสอบ </a>
            </div>
            <div class="btn-group col-md-3" role="group">       
                <a class="btn btn-success btn-lg"  href="excel.php" role="button"><i class="far fa-file-excel"></i>  นำข้อมูลออกไฟล์ Excel  </a>
            </div>
        </div>
        <div style="margin: 2.0rem"></div>  
        <div class="table-responsive">
            
        
            <table class="table">
                <thead>
                    <tr>
                        <th>ห้องสอบที่</th>
                        <th>เลขประจำตัวสอบ</th>
                        <th>คำนำหน้านาม</th>
                        <th>ชื่อ</th>
                        <th>สกุล</th>
                        <th>ชื่อโรงเรียนเดิม</th>
                        <th>แผนการเรียนที่ 1</th>
                        <th>แผนการเรียนที่ 2</th>
                       
                    </tr>
                </thead>

                <?php

               echo fetch_data();
            ?>
            </table>
        </div>

    </div>
    <div class="footer">
            <p>
			  	<i class='far fa-copyright'></i><?php echo (date('Y')) ?>
			  </p>
    </div>

</body>

</html>