<?php

require "../config/function.php";
require_once '../config/settings.config.php';
$spkObject = new spk();
$spkObject->spkHeader();
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<link rel='stylesheet' type='text/css' href='../css/app_css.css'>
</head>
    <body>

        <div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><?php echo $txt['SCHOOLNAME']; ?> </h1>
                <p class="lead text-muted"><?php echo $txt['SYSTEMNAME']; ?></p>
                <hr>
                <h3  style="color:#102c4c;text-shadow: 2px 2px 4px #000000;">รายงานรับสมัครนักเรียนเข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2563 ห้องเรียนปกติ</h3>
                <hr>
            </div>
        </div>

        <div class="container">
        <?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //3
    $count_located22 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-3 00:00:01' AND '2020-05-03 16:30:00' ")->fetchColumn();
    $count_outside22 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-3 00:00:01' AND '2020-05-03 16:30:00' ")->fetchColumn();
    //4
    $count_located23 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-03 16:30:01' AND '2020-05-04 16:30:00' ")->fetchColumn();
    $count_outside23 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-03 16:30:01' AND '2020-05-04 16:30:00' ")->fetchColumn();
    //5
    $count_located24 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-04 16:30:01' AND '2020-05-05 16:30:00' ")->fetchColumn();
    $count_outside24 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-04 16:30:01' AND '2020-05-05 16:30:00' ")->fetchColumn();
    //6
    $count_located25 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-05 16:30:01' AND '2020-05-06 16:30:00' ")->fetchColumn();
    $count_outside25 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-05 16:30:01' AND '2020-05-06 16:30:00' ")->fetchColumn();
    //7
    $count_located26 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-06 16:30:01' AND '2020-05-07 16:30:00' ")->fetchColumn();
    $count_outside26 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-06 16:30:01' AND '2020-05-07 16:30:00' ")->fetchColumn();
    //8
    $count_located27 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();
    $count_outside27 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
        <h5>สรุปจำนวนผู้สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 1 ภาคปกติ ปีการศึกษา 2563 แบ่งตามประเภท</h5>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">สรุปยอดเวลา 16:30 น. ของทุกวัน</th>
                  <th scope="col">ในเขตพื้นที่บริการ(คน)</th>
                  <th scope="col">ทั่วไป(คน)</th>
                  <th scope="col">สมัครรวม(คน)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row"> 3 พฤษภาคม 2563</th>
                  <td><?php echo $count_located22; ?></td>
                  <td><?php echo $count_outside22; ?> </td>
                  <td><?php echo $count_total22 = $count_located22 + $count_outside22; ?> </td>
                </tr>
                <tr>
                  <th scope="row">4 พฤษภาคม 2563</th>
                  <td><?php echo $count_located23; ?></td>
                  <td><?php echo $count_outside23; ?> </td>
                  <td><?php echo $count_total23 = $count_located23 + $count_outside23; ?> </td>
                </tr>
                <tr>
                  <th scope="row">5 พฤษภาคม 2563</th>
                  <td><?php echo $count_located24; ?></td>
                  <td><?php echo $count_outside24; ?> </td>
                  <td><?php echo $count_total24 = $count_located24 + $count_outside24; ?> </td>
                </tr>
                <tr>
                  <th scope="row">6 พฤษภาคม 2563</th>
                  <td><?php echo $count_located25; ?></td>
                  <td><?php echo $count_outside25; ?> </td>
                  <td><?php echo $count_total25 = $count_located25 + $count_outside25; ?> </td>
                </tr>
                <tr>
                  <th scope="row">7 พฤษภาคม 2563</th>
                  <td><?php echo $count_located26; ?></td>
                  <td><?php echo $count_outside26; ?> </td>
                  <td><?php echo $count_total26 = $count_located26 + $count_outside26; ?> </td>
                </tr>
                <tr>
                  <th scope="row">8 พฤษภาคม 2563</th>
                  <td><?php echo $count_located27; ?></td>
                  <td><?php echo $count_outside27; ?> </td>
                  <td><?php echo $count_total27 = $count_located27 + $count_outside27; ?> </td>
                </tr>
                <tr>
                    <th scope="row" class="text-right">รวม</th>
                    <td><?php echo $count_located22 + $count_located23 + $count_located24 + $count_located25 + $count_located26 + $count_located27; ?></td>
                    <td><?php echo $count_outside22 + $count_outside23 + $count_outside24 + $count_outside25 + $count_outside26 + $count_outside27; ?></td>
                    <td><?php echo $count_total22 + $count_total23 + $count_total24 + $count_total25 + $count_total26 + $count_total27; ?></td>
                </tr>
              </tbody>
            </table>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChartBar);

              function drawChartBar() {
                var data = google.visualization.arrayToDataTable([
                  ['วันรับสมัคร', 'ในเขตพื้นที่บริการ', 'ทั่วไป'],
                  ['3 พฤษภาคม 2563', <?php echo $count_located22; ?>, <?php echo $count_outside22; ?>],
                  ['4-พฤษภาคม-2563', <?php echo $count_located23; ?>, <?php echo $count_outside23; ?>],
                  ['5-พฤษภาคม-2563', <?php echo $count_located24; ?>, <?php echo $count_outside24; ?>],
                  ['6-พฤษภาคม-2563', <?php echo $count_located25; ?>, <?php echo $count_outside25; ?>],
                  ['7-พฤษภาคม-2563', <?php echo $count_located26; ?>, <?php echo $count_outside26; ?>],
                  ['8-พฤษภาคม-2563', <?php echo $count_located27; ?>, <?php echo $count_outside27; ?>]
                ]);

                var bar_options = {
                  chart: {
                    title: 'โรงเรียนสตรีภูเก็ต',
                    subtitle: 'รายงานรับสมัครนักเรียน ประจำปีการศึกษา2563 ชั้นมัธยมศึกษาปีที่ 1 ห้องเรียนปกติ ',
                    backgroundColor: { fill:'transparent' }
                  },
                  bars: 'horizontal' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_summary'));

                chart.draw(data, google.charts.Bar.convertOptions(bar_options));
              }

              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChartPie);

              function drawChartPie() {

                var datapie = google.visualization.arrayToDataTable([
                  ['Task', 'Type'],
                  ['ในเขตพื้นที่บริการ',   <?php echo $count_located22 + $count_located23 + $count_located24 + $count_located25 + $count_located26 + $count_located27; ?>  ],
                  ['ทั่วไป', <?php echo $count_outside22 + $count_outside23 + $count_outside24 + $count_outside25 + $count_outside26 + $count_outside27; ?>]
                ]);

                var options = {
                  title: 'สรุปจำนวนผู้สมัครทั้งหมด คิดเป็นร้อยละ(%) แบ่งตามประเภท',
                  backgroundColor: { fill:'transparent' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(datapie, options);
              }
            </script>

            <div id="barchart_summary" style="width: 900px; height: 500px;"></div>
            <br>
            <div id="piechart" style="width: 900px; height: 500px;"></div>

        </div>

</script>
    <?php
$spkObject->spkFooter();
?>
    </body>

</html>
