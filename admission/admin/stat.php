<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
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
    
    //include("../config/graph.inc.php");
    include("../config/stat.inc.php");
    include_once ("../../spk/word.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน ปีการศึกษา <?php echo $strEducationYear; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="spk.js"></script>

<body>
    <div class="container">
        <div class=" text-center">
            <img src="../../../spkimg/head1.gif" class="img-fluid pull-center">

            <h1 class="jumbotron-heading">รายงานการสมัคร ทั่วไป </h1>
            <p class="h3"><?php echo $strEducationYear?></p>
            <p class="h3">โรงเรียนสตรีภูเก็ต</p>
            <hr>
            <a class="btn btn-outline-primary btn-lg" href="index.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
        </div>
        <br />
        <div>
        <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 1</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>แผนการรับ</th>
                    <th colspan ="3" class="text-center bg-warning">24 เม.ย. 64</th>
                    <th colspan ="3" class="text-center">25 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-warning">26 เม.ย. 64</th>
                    <th colspan ="3" class="text-center">27 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-warning">28 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-success">รวมทั้งสิ้น</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td  class="bg-warning">ในเขต</td>
                    <td  class="bg-warning">นอกเขต</td>
                    <td  class="bg-warning">รวม</td>
                    <td>ในเขต</td>
                    <td>นอกเขต</td>
                    <td>รวม</td>
                    <td class="bg-warning">ในเขต</td>
                    <td class="bg-warning">นอกเขต</td>
                    <td class="bg-warning">รวม</td>
                    <td>ในเขต</td>
                    <td>นอกเขต</td>
                    <td>รวม</td>
                    <td class="bg-warning">ในเขต</td>
                    <td class="bg-warning">นอกเขต</td>
                    <td class="bg-warning">รวม</td>
                    <td class="bg-success">ในเขต</td>
                    <td class="bg-success">นอกเขต</td>
                    <td class="bg-success">รวม</td>
                    
                </tr>
                <tr>
                    <td>ทั่วไป</td>
                    <td  class="bg-warning"><?php echo $m1_in_03 ?></td>
                    <td  class="bg-warning"> <?php echo $m1_out_03?></td>
                    <td  class="bg-warning"> <?php echo $m1_in_03 + $m1_out_03?></td>
                    <td><?php echo $m1_in_04 ?></td>
                    <td><?php echo $m1_out_04 ?></td>
                    <td><?php echo $m1_in_04 + $m1_out_04 ?></td>
                    <td class="bg-warning"><?php echo $m1_in_05 ?></td>
                    <td class="bg-warning"><?php echo $m1_out_05 ?></td>
                    <td class="bg-warning"><?php echo $m1_in_05 + $m1_out_05 ?></td>
                    <td><?php echo $m1_in_06 ?></td>
                    <td><?php echo $m1_out_06 ?></td>
                    <td><?php echo $m1_in_06 + $m1_out_06 ?></td>
                    <td class="bg-warning"><?php echo $m1_in_07 ?></td>
                    <td class="bg-warning"><?php echo $m1_out_07 ?></td>
                    <td class="bg-warning"><?php echo $m1_in_07 + $m1_out_07 ?></td>
                    <td class="bg-success"><?php echo $total_m1_in ?></td>
                    <td class="bg-success"><?php echo $total_m1_out ?></td>
                    <td class="bg-success"><?php echo $total_m1_in + $total_m1_out ?></td>
                    
                </tr>


            </tbody>
        </table>

        <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 4</p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>แผนการรับ</th>
                    <th colspan ="3" class="text-center bg-warning">24 เม.ย. 64</th>
                    <th colspan ="3" class="text-center">25 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-warning">26 เม.ย. 64</th>
                    <th colspan ="3" class="text-center">27 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-warning">28 เม.ย. 64</th>
                    <th colspan ="3" class="text-center bg-success">รวมทั้งสิ้น</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td  class="bg-warning">ม.3 รร.เดิม</td>
                    <td  class="bg-warning">ม.3 รร.อื่น</td>
                    <td  class="bg-warning">รวม</td>
                    <td>ม.3 รร.เดิม</td>
                    <td>ม.3 รร.อื่น</td>
                    <td>รวม</td>
                    <td class="bg-warning">ม.3 รร.เดิม</td>
                    <td class="bg-warning">ม.3 รร.อื่น</td>
                    <td class="bg-warning">รวม</td>
                    <td>ม.3 รร.เดิม</td>
                    <td>ม.3 รร.อื่น</td>
                    <td>รวม</td>
                    <td class="bg-warning">ม.3 รร.เดิม</td>
                    <td class="bg-warning">ม.3 รร.อื่น</td>
                    <td class="bg-warning">รวม</td>
                    <td class="bg-success">ม.3 รร.เดิม</td>
                    <td class="bg-success">ม.3 รร.อื่น</td>
                    <td class="bg-success">รวม</td>
                    
                </tr>
                <tr>
                    <td>ทั่วไป</td>
                    <td  class="bg-warning"><?php echo $m4_in_03 ?></td>
                    <td  class="bg-warning"> <?php echo $m4_out_03?></td>
                    <td  class="bg-warning"> <?php echo $m4_in_03 + $m4_out_03?></td>
                    <td><?php echo $m4_in_04 ?></td>
                    <td><?php echo $m4_out_04 ?></td>
                    <td><?php echo $m4_in_04 + $m4_out_04 ?></td>
                    <td class="bg-warning"><?php echo $m4_in_05 ?></td>
                    <td class="bg-warning"><?php echo $m4_out_05 ?></td>
                    <td class="bg-warning"><?php echo $m4_in_05 + $m4_out_05 ?></td>
                    <td><?php echo $m4_in_06 ?></td>
                    <td><?php echo $m4_out_06 ?></td>
                    <td><?php echo $m4_in_06 + $m4_out_06 ?></td>
                    <td class="bg-warning"><?php echo $m4_in_07 ?></td>
                    <td class="bg-warning"><?php echo $m4_out_07 ?></td>
                    <td class="bg-warning"><?php echo $m4_in_07 + $m4_out_07 ?></td>
                    <td class="bg-success"><?php echo $total_m4_in ?></td>
                    <td class="bg-success"><?php echo $total_m4_out ?></td>
                    <td class="bg-success"><?php echo $total_m4_in + $total_m4_out ?></td>
                    
                </tr>


            </tbody>
        </table>
        </div>
    </div>
    <hr>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>

</body>

</html>