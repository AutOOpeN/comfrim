<?php
include ("config/graph.inc.php");
?>"


<!DOCTYPE html>
<html lang="en">

<head>
    <title>โรงเรียนสตรีภูเก็ต</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Day', 'ม.1 SMTE', 'ม.1 IP', 'ม.4 SMTE', 'ม.4 IP',  'Average'],
          ['22-02-2563',  <?php echo $m1_smte_22 .", ". $m1_ip_22 .", ". $m4_smte_22 . ", " . $m4_ip_22 . ", " . $average_22;?>],
          ['23-02-2563',  <?php echo $m1_smte_23 .", ". $m1_ip_23 .", ". $m4_smte_23 . ", " . $m4_ip_23 . ", " . $average_23;?>],
          ['24-02-2563',  <?php echo $m1_smte_24 .", ". $m1_ip_24 .", ". $m4_smte_24 . ", " . $m4_ip_24 . ", " . $average_24;?>],
          ['25-02-2563',  <?php echo $m1_smte_25 .", ". $m1_ip_25 .", ". $m4_smte_25 . ", " . $m4_ip_25 . ", " . $average_25;?>],
          ['26-02-2563',  <?php echo $m1_smte_26 .", ". $m1_ip_26 .", ". $m4_smte_26 . ", " . $m4_ip_26 . ", " . $average_26;?>]
        ]);

        var options = {
          title : 'รายงานจำนวนผู้สมัครเข้าเรียนโครงการพิเศษ โรงเรียนสตรีภูเก็ต',
          vAxis: {title: 'คน'},
          hAxis: {title: 'วันที่ รับสมัคร'},
          seriesType: 'bars',
          series: {4: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>

<body>
    <div class="container-top">
        <img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
    </div>


    <main role="main">

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div>
            <div class="container">
                <h1 class="text-center">โรงเรียนสตรีภูเก็ต</h1>
                <h2 class="text-center">ระบบรับนักเรียน โครงการพิเศษ ปีการศึกษา 2563 </h2>
                <hr>
                <h3>ประกาศโรงเรียนสตรีภูเก็ต เรื่อง การรับสมัครนักเรียนเข้าเรียนโครงการพิเศษ </h3>
                <br>
                <ul>
                    <li><a href="pdf/M1_SMTE_IP.pdf">ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a></li>
                    <li><a href="pdf/M4_SMTE_IP.pdf">ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></li>
                </ul>
                <hr>
                <br>

                <h2 class="card text-center text-white bg-info">ขั้นตอนการสมัครออนไลน์</h2>

                <div class="card-deck">

                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            1. ตรวจสอบคุณสมบัติ
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ตรวจสอบคุณสมบัติของผู้สมัคร
                                และไฟล์สำเนาเอกสารการสมัครพร้อมเซ็นรับรองสำเนาถูกต้องทุกหน้าก่อนการ Upload</h5>
                        </div>
                    </div>



                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            2. กรอกใบสมัคร
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">กรอกใบสมัครจากแบบฟอร์มออนไลน์ด้านล่าง</h5>
                        </div>
                    </div>



                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            3. พิมพ์แบบฟอร์มชำระเงิน
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">พิมพ์แบบฟอร์มชำระเงิน
                                นำไปชำระได้ที่เคาน์เตอร์ธนาคารกรุงไทยจนถึงวันที่ 27 กุมภาพันธ์ 2563 เวลา 16:30 น.
                                เท่านั้น</h5>
                        </div>
                    </div>



                    <div class="card text-center text-white bg-info">
                        <div class="card-header">
                            4. ตรวจสอบรายชื่อผู้สมัครพร้อมพิมพ์บัตรประจำตัวผู้สอบ
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">ตรวจสอบรายชื่อผู้สมัครพร้อมพิมพ์บัตรประจำตัวผู้สอบ ตามโครงการที่สมัคร
                            </h5>
                        </div>
                    </div>


                </div>
                <br>
                <hr>
                <div class="text-white text-center bg-info">
                    <h2><i class="fas fa-sign-in-alt"></i> สมัครสอบ</h2>
                </div>
                <p></p>
                <!-- สมัครออนไลน์ -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card text-center text-white bg-info">
                            <div class="card-header">
                                โครงการ SMTE มัธยมศึกษาปีที่ 1
                            </div>
                            <div class="card-body">
                                <p class="card-text"><a href="pdf/M1_SMTE_IP.pdf"
                                        class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                                <p class="card-text"><a href="app/m1_smte" class="btn btn-secondary"
                                        target="_blank">สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 1 </a></p>
                                <p class="card-text"><a href="app/m1_smte/student_list.php"
                                        class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 1
                                    </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-center text-white bg-info">
                            <div class="card-header">
                                โครงการ SMTE มัธยมศึกษาปีที่ 4
                            </div>
                            <div class="card-body">
                                <p class="card-text"><a href="pdf/M4_SMTE_IP.pdf"
                                        class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                                <p class="card-text"><a href="app/m4_smte" class="btn btn-secondary"
                                        target="_blank">สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 4 </a></p>
                                <p class="card-text"><a href="app/m4_smte/student_list.php"
                                        class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ SMTE มัธยมศึกษาปีที่ 4
                                    </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-header">
                                โครงการ IP มัธยมศึกษาปีที่ 1
                            </div>
                            <div class="card-body">
                                <p class="card-text"><a href="pdf/M1_SMTE_IP.pdf"
                                        class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                                <p class="card-text"><a href="app/m1_ip" class="btn btn-secondary" target="_blank">สมัคร
                                        โครงการ IP มัธยมศึกษาปีที่ 1 </a></p>
                                <p class="card-text"><a href="app/m1_ip/student_list.php"
                                        class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ IP มัธยมศึกษาปีที่ 1
                                    </a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-center text-white bg-primary">
                            <div class="card-header">
                                โครงการ IP มัธยมศึกษาปีที่ 4
                            </div>
                            <div class="card-body">

                                <p class="card-text"><a href="pdf/M4_SMTE_IP.pdf"
                                        class="btn btn-secondary">คุณสมบัติผู้สมัคร</a></p>
                                <p class="card-text"><a href="app/m4_ip" class="btn btn-secondary" target="_blank">สมัคร
                                        โครงการ IP มัธยมศึกษาปีที่ 4 </a></p>
                                <p class="card-text"><a href="app/m4_ip/student_list.php"
                                        class="btn btn-secondary">ตรวจสอบรายชื่อผู้สมัคร โครงการ IP มัธยมศึกษาปีที่ 4
                                    </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

        <div class="container">
                <br />
                <hr />
            <fieldset class="myfieldset">
                <legend class="myfieldset text-primary h3">
                    <i class="fas fa-chart-pie"></i> รายงานการสมัคร
                </legend>
                <br />
                <div id="chart_div" style="width: auto; height: 500px;"></div>
            </fieldset>
            <?php  echo $m1_smte_23 .", ". $m1_ip_23 .", ". $m4_smte_23 . ", " . $m4_ip_23 . ", " . $average_23;?>
            <br />
                <fieldset class="myfieldset ">
                    <legend class="myfieldset text-primary">
                        <i class="fas fa-map-marker-alt"></i> ติดต่อ โรงเรียนสตรีภูเก็ต
                    </legend>
                    <p>โทร: 0 7622 2368 </p>
                    <p>E-mail: <a href="mailto:stpk@satreephuket.ac.th">stpk@satreephuket.ac.th</a> </p>
                </fieldset> 
        </div>
    </main>
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="footer">
        <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง
            ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000 โทร 0 7622 2368 E-mail: <a
                href="mailto:stpk@satreephuket.ac.th">stpk@satreephuket.ac.th</a> </p>
    </div>
</body>

</html>