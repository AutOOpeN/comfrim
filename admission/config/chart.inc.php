<?php
require_once "config/function.php";

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

// M4
    $plan01_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 1 OR reg_plan1_id = '' AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $plan02_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 2 AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $plan03_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 3 AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $plan04_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 4 AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $plan05_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 5 AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
    $plan06_03 =$conn->query("SELECT count(*) FROM m4 WHERE reg_plan1_id = 6 AND record_time BETWEEN '2020-05-03 00:00:01' AND '2020-05-12 16:30:00' ")->fetchColumn();

} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
?>