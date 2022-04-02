<?php

require "../config/function.php";
require_once '../config/settings.config.php';
?>
<html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    </head>
    
<body>
        <?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //3
    $count_located03 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-03 16:30:00' ")->fetchColumn();
    $count_outside03 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-03 16:30:00' ")->fetchColumn();
    //4
    $count_located04 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-03 16:30:01' AND '2020-05-04 16:30:00' ")->fetchColumn();
    $count_outside04 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-03 16:30:01' AND '2020-05-04 16:30:00' ")->fetchColumn();
    //5
    $count_located05 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-04 16:30:01' AND '2020-05-05 16:30:00' ")->fetchColumn();
    $count_outside05 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-04 16:30:01' AND '2020-05-05 16:30:00' ")->fetchColumn();
    //6
    $count_located06 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-05 16:30:01' AND '2020-05-06 16:30:00' ")->fetchColumn();
    $count_outside06 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-05 16:30:01' AND '2020-05-06 16:30:00' ")->fetchColumn();
    //7
    $count_located07 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-06 16:30:01' AND '2020-05-07 16:30:00' ")->fetchColumn();
    $count_outside07 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-06 16:30:01' AND '2020-05-07 16:30:00' ")->fetchColumn();
    //8
    $count_located08 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();
    $count_outside08 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();
    //9
    $count_located09 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();
    $count_outside09 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();
    //10
    $count_located10 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();
    $count_outside10 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();
    //11
    $count_located11 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();
    $count_outside11 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();
    //12
    $count_located12 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $count_outside12 = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    //sum
    $count_located_total = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id = '880' AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $count_outside_total = $conn->query("SELECT count(*) FROM m1 WHERE reg_amphoe_id <> '880' AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
        <h5>สรุปจำนวนผู้สมัครเข้าเรียนชั้นมัธยมศึกษาปีที่ 1 ภาคปกติ ปีการศึกษา 2563 แบ่งตามประเภท</h5>
            
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChartBar);

              function drawChartBar() {
                var data = google.visualization.arrayToDataTable([
                  ['วันรับสมัคร', 'ในเขตพื้นที่บริการ', 'ทั่วไป'],
                  ['3-พฤษภาคม-2563', <?php echo $count_located03; ?>, <?php echo $count_outside03; ?>],
                  ['4-พฤษภาคม-2563', <?php echo $count_located04; ?>, <?php echo $count_outside04; ?>],
                  ['5-พฤษภาคม-2563', <?php echo $count_located05; ?>, <?php echo $count_outside05; ?>],
                  ['6-พฤษภาคม-2563', <?php echo $count_located06; ?>, <?php echo $count_outside06; ?>],
                  ['7-พฤษภาคม-2563', <?php echo $count_located07; ?>, <?php echo $count_outside07; ?>],
                  ['8-พฤษภาคม-2563', <?php echo $count_located08; ?>, <?php echo $count_outside08; ?>],
                  ['9-พฤษภาคม-2563', <?php echo $count_located09; ?>, <?php echo $count_outside09; ?>],
                  ['10-พฤษภาคม-2563', <?php echo $count_located10; ?>, <?php echo $count_outside10; ?>],
                  ['11-พฤษภาคม-2563', <?php echo $count_located11; ?>, <?php echo $count_outside11; ?>],
                  ['12-พฤษภาคม-2563', <?php echo $count_located12; ?>, <?php echo $count_outside12; ?>]
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
                  ['ในเขตพื้นที่บริการ',   <?php echo $count_located_total; ?>  ],
                  ['ทั่วไป', <?php echo $count_outside_total; ?>]
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

        

</script>
</body>
</html>