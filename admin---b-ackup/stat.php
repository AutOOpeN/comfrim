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
    
    include("../spk/word.php");
    include("../config/stat.inc.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน ม. 1 โครงการพิเศษ IP ปีการศึกษา <?php echo $strEducationYear; ?></title>
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

            <h1 class="jumbotron-heading">รายงานการสมัครโครงการพิเศษ </h1>
            <p class="h3"> <?php echo $strEducationYear; ?></p>
            <p class="h3">โรงเรียนสตรีภูเก็ต</p>
            <hr>
            <a class="btn btn-outline-primary btn-lg" href="index.php"><i class="fas fa-home"></i> กลับหน้าแรก</a>
        </div>
        <br />
        <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 1</p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>แผนการรับ</th>
                    <th colspan ="3" class="text-center bg-warning">22 ก.พ. 63</th>
                    <th colspan ="3" class="text-center">23 ก.พ. 63</th>
                    <th colspan ="3" class="text-center bg-warning">24 ก.พ. 63</th>
                    <th colspan ="3" class="text-center">25 ก.พ. 63</th>
                    <th colspan ="3" class="text-center bg-warning">26 ก.พ. 63</th>
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
                    <td>วิทยาศาสตร์-คณิตศาสตร์-สิ่งแวดล้อม</td>
                    <td  class="bg-warning"><?php echo $m1_smte_in_22 ?></td>
                    <td  class="bg-warning"> <?php echo $m1_smte_out_22?></td>
                    <td  class="bg-warning"> <?php echo $m1_smte_in_22 + $m1_smte_out_22?></td>
                    <td><?php echo $m1_smte_in_23 ?></td>
                    <td><?php echo $m1_smte_out_23 ?></td>
                    <td><?php echo $m1_smte_in_23 + $m1_smte_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_in_24 + $m1_smte_out_24 ?></td>
                    <td><?php echo $m1_smte_in_25 ?></td>
                    <td><?php echo $m1_smte_out_25 ?></td>
                    <td><?php echo $m1_smte_in_25 + $m1_smte_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_in_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_smte_in_26 + $m1_smte_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m1_s_in ?></td>
                    <td class="bg-success"><?php echo $total_m1_s_out ?></td>
                    <td class="bg-success"><?php echo $total_m1_s_in + $total_m1_s_out ?></td>
                    
                </tr>
                <tr>
                    <td>Education HUB</td>
                    <td  class="bg-warning"><?php echo $m1_ip2_in_22 ?></td>
                    <td  class="bg-warning"><?php echo $m1_ip2_out_22 ?></td>
                    <td  class="bg-warning"><?php echo $m1_ip2_in_22 + $m1_ip2_out_22 ?></td>
                    <td><?php echo $m1_ip2_in_23 ?></td>
                    <td><?php echo $m1_ip2_out_23 ?></td>
                    <td><?php echo $m1_ip2_in_23 + $m1_ip2_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_in_24 + $m1_ip2_out_24 ?></td>
                    <td><?php echo $m1_ip2_in_25 ?></td>
                    <td><?php echo $m1_ip2_out_25 ?></td>
                    <td><?php echo $m1_ip2_in_25 + $m1_ip2_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_in_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip2_in_26 + $m1_ip2_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip2_in ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip2_out ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip2_in + $total_m1_ip2_out ?></td>
                </tr>
                <tr>
                    <td>Cambridge</td>
                    <td  class="bg-warning"><?php echo $m1_ip4_in_22 ?></td>
                    <td  class="bg-warning"><?php echo $m1_ip4_out_22 ?></td>
                    <td  class="bg-warning"><?php echo $m1_ip4_in_22 + $m1_ip4_out_22 ?></td>
                    <td><?php echo $m1_ip4_in_23 ?></td>
                    <td><?php echo $m1_ip4_out_23 ?></td>
                    <td><?php echo $m1_ip4_in_23 + $m1_ip4_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_in_24 + $m1_ip4_out_24 ?></td>
                    <td><?php echo $m1_ip4_in_25 ?></td>
                    <td><?php echo $m1_ip4_out_25 ?></td>
                    <td><?php echo $m1_ip4_in_25 + $m1_ip4_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_in_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m1_ip4_in_26 + $m1_ip4_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip4_in ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip4_out ?></td>
                    <td class="bg-success"><?php echo $total_m1_ip4_in + $total_m1_ip4_out ?></td>
                </tr>
            </tbody>
        </table>

        <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 4</p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>แผนการรับ</th>
                    <th colspan ="3" class="text-center bg-warning">22 ก.พ. 63</th>
                    <th colspan ="3" class="text-center">23 ก.พ. 63</th>
                    <th colspan ="3" class="text-center bg-warning">24 ก.พ. 63</th>
                    <th colspan ="3" class="text-center">25 ก.พ. 63</th>
                    <th colspan ="3" class="text-center bg-warning">26 ก.พ. 63</th>
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
                    <td>วิทยาศาสตร์-คณิตศาสตร์-สิ่งแวดล้อม</td>
                    <td  class="bg-warning"><?php echo $m4_smte_in_22 ?></td>
                    <td  class="bg-warning"> <?php echo $m4_smte_out_22?></td>
                    <td  class="bg-warning"> <?php echo $m4_smte_in_22 + $m4_smte_out_22 ?></td>
                    <td><?php echo $m4_smte_in_23 ?></td>
                    <td><?php echo $m4_smte_out_23 ?></td>
                    <td><?php echo $m4_smte_in_23 + $m4_smte_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m4_smte_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_smte_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_smte_in_24 + $m4_smte_out_24?></td>
                    <td><?php echo $m4_smte_in_25 ?></td>
                    <td><?php echo $m4_smte_out_25 ?></td>
                    <td><?php echo $m4_smte_in_25 + $m4_smte_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m4_smte_in_26 ?></td>
                    <td class="bg-warning" ><?php echo $m4_smte_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m4_smte_in_26 + $m4_smte_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m4_s_in ?></td>
                    <td class="bg-success"><?php echo $total_m4_s_out ?></td>
                    <td class="bg-success"><?php echo $total_m4_s_in + $total_m4_s_out?></td>
                    
                </tr>
                <tr>
                    <td>Education HUB</td>
                    <td  class="bg-warning"><?php echo $m4_ip2_in_22 ?></td>
                    <td  class="bg-warning"><?php echo $m4_ip2_out_22 ?></td>
                    <td  class="bg-warning"><?php echo $m4_ip2_in_22 + $m4_ip2_out_22 ?></td>
                    <td><?php echo $m4_ip2_in_23 ?></td>
                    <td><?php echo $m4_ip2_out_23 ?></td>
                    <td><?php echo $m4_ip2_in_23 + $m4_ip2_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_in_24 + $m4_ip2_out_24 ?></td>
                    <td><?php echo $m4_ip2_in_25 ?></td>
                    <td><?php echo $m4_ip2_out_25 ?></td>
                    <td><?php echo $m4_ip2_in_25 + $m4_ip2_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_in_26 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip2_in_26 + $m4_ip2_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip2_in ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip2_out ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip2_in + $total_m4_ip2_out ?></td>
                </tr>
                <tr>
                    <td>Cambridge</td>
                    <td  class="bg-warning"><?php echo $m4_ip4_in_22 ?></td>
                    <td  class="bg-warning"><?php echo $m4_ip4_out_22 ?></td>
                    <td  class="bg-warning"><?php echo $m4_ip4_in_22 + $m4_ip4_out_22 ?></td>
                    <td><?php echo $m4_ip4_in_23 ?></td>
                    <td><?php echo $m4_ip4_out_23 ?></td>
                    <td><?php echo $m4_ip4_in_23 + $m4_ip4_out_23 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_in_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_out_24 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_in_24 + $m4_ip4_out_24 ?></td>
                    <td><?php echo $m4_ip4_in_25 ?></td>
                    <td><?php echo $m4_ip4_out_25 ?></td>
                    <td><?php echo $m4_ip4_in_25 + $m4_ip4_out_25 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_in_26 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_out_26 ?></td>
                    <td class="bg-warning"><?php echo $m4_ip4_in_26 + $m4_ip4_out_26 ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip4_in ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip4_out ?></td>
                    <td class="bg-success"><?php echo $total_m4_ip4_in + $total_m4_ip4_out ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 076-222368 </p>
    </div>

</body>

</html>