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
                <h3  style="color:#102c4c;text-shadow: 2px 2px 4px #000000;">รายงานรับสมัครนักเรียนเข้าศึกษาต่อระดับชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา 2562 ห้องเรียนปกติ</h3>
                <hr>
            </div>
        </div>

        <div class="container">
        <?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $total_ = $conn->prepare("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต' AND record_time BETWEEN '2019-03-22 00:00:01' AND '2019-03-22 16:30:00' ")->fetchColumn();
    //22
    $count_located22 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-22 00:00:01' AND '2019-03-22 16:30:00' ")->fetchColumn();
    $count_outside22 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-22 00:00:01' AND '2019-03-22 16:30:00' ")->fetchColumn();
    //23
    $count_located23 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-22 16:30:01' AND '2019-03-23 16:30:00' ")->fetchColumn();
    $count_outside23 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-22 16:30:01' AND '2019-03-23 16:30:00' ")->fetchColumn();
    //24
    $count_located24 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-23 16:30:01' AND '2019-03-24 16:30:00' ")->fetchColumn();
    $count_outside24 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-23 16:30:01' AND '2019-03-24 16:30:00' ")->fetchColumn();
    //25
    $count_located25 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-24 16:30:01' AND '2019-03-25 16:30:00' ")->fetchColumn();
    $count_outside25 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-24 16:30:01' AND '2019-03-25 16:30:00' ")->fetchColumn();
    //26
    $count_located26 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-25 16:30:01' AND '2019-03-26 16:30:00' ")->fetchColumn();
    $count_outside26 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-25 16:30:01' AND '2019-03-26 16:30:00' ")->fetchColumn();
    //27
    $count_located27 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name = 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-26 16:30:01' AND '2019-03-27 16:30:00' ")->fetchColumn();
    $count_outside27 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name <> 'สตรีภูเก็ต'AND record_time BETWEEN '2019-03-26 16:30:01' AND '2019-03-28 00:00:01' ")->fetchColumn();

    $stmt  = $conn->prepare("SELECT reg_plan1_name, count(*) as number FROM m4 GROUP BY reg_plan1_name");
    $stmt2 = $conn->prepare("SELECT reg_plan2_name, count(*) as number FROM m4 GROUP BY reg_plan2_name");

    $stmt->execute();
    $stmt2->execute();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">สรุปยอดเวลา 16:30 น. ของทุกวัน</th>
                  <th scope="col">ม.3 โรงเรียนเดิม</th>
                  <th scope="col">โรงเรียนอื่น</th>
                  <th scope="col">รวม</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">22 มีนาคม 2562</th>
                  <td><?php echo $count_located22; ?></td>
                  <td><?php echo $count_outside22; ?> </td>
                  <td><?php echo $count_total22 = $count_located22 + $count_outside22; ?> </td>
                </tr>
                <tr>
                  <th scope="row">23 มีนาคม 2562</th>
                  <td><?php echo $count_located23; ?></td>
                  <td><?php echo $count_outside23; ?> </td>
                  <td><?php echo $count_total23 = $count_located23 + $count_outside23; ?> </td>
                </tr>
                <tr>
                  <th scope="row">24 มีนาคม 2562</th>
                  <td><?php echo $count_located24; ?></td>
                  <td><?php echo $count_outside24; ?> </td>
                  <td><?php echo $count_total24 = $count_located24 + $count_outside24; ?> </td>
                </tr>
                <tr>
                  <th scope="row">25 มีนาคม 2562</th>
                  <td><?php echo $count_located25; ?></td>
                  <td><?php echo $count_outside25; ?> </td>
                  <td><?php echo $count_total25 = $count_located25 + $count_outside25; ?> </td>
                </tr>
                <tr>
                  <th scope="row">26 มีนาคม 2562</th>
                  <td><?php echo $count_located26; ?></td>
                  <td><?php echo $count_outside26; ?> </td>
                  <td><?php echo $count_total26 = $count_located26 + $count_outside26; ?> </td>
                </tr>
                <tr>
                  <th scope="row">27 มีนาคม 2562</th>
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

              google.charts.load('current', {'packages':['corechart']});
              google.charts.setOnLoadCallback(drawChartPie);

              function drawChartPie() {

                var datapie = google.visualization.arrayToDataTable([
                          ['reg_plan1_id', 'Number'],
                          <?php
while ($row = $stmt->fetch()) {
    echo "['" . $row["reg_plan1_name"] . "', " . $row["number"] . "],";
}
?>

                          ]);
                var datapie2 = google.visualization.arrayToDataTable([
                          ['reg_plan2_id', 'Number'],
                          <?php
while ($row2 = $stmt2->fetch()) {
    echo "['" . $row2["reg_plan2_name"] . "', " . $row2["number"] . "],";
}
?>

                          ]);
                var options = {
                  title: 'สรุปจำนวนผู้สมัครทั้งหมด แผนการเรียนลำดับที่ 1 คิดเป็นร้อยละ(%)',
                  backgroundColor: { fill:'transparent' }
                };
                var options2 = {
                  title: 'สรุปจำนวนผู้สมัครทั้งหมด แผนการเรียนลำดับที่ 2 คิดเป็นร้อยละ(%)',
                  backgroundColor: { fill:'transparent' }
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(datapie, options);
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                chart.draw(datapie2, options2);
              }
            </script>

            <div id="piechart" style="width: 900px; height: 500px;"></div>
            <div id="piechart2" style="width: 900px; height: 500px;"></div>
        </div>

</script>
    <?php
$spkObject->spkFooter();
?>
    </body>

</html>
