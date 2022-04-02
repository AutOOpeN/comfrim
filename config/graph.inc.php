<?php
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // 2020-02-22
    $m1_smte_22 = $conn->query("SELECT count(*) FROM m1_s WHERE  m1s340 BETWEEN '2020-02-22 00:00:00' AND '2020-02-22 23:59:59' ")->fetchColumn();
    $m1_ip_22 = $conn->query("SELECT count(*) FROM m1_ip WHERE  m1s340 BETWEEN '2020-02-22 00:00:00' AND '2020-02-22 23:59:59' ")->fetchColumn();
    $m4_smte_22 = $conn->query("SELECT count(*) FROM m4_s WHERE  m1s340 BETWEEN '2020-02-22 00:00:00' AND '2020-02-22 23:59:59' ")->fetchColumn();
    $m4_ip_22 = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s340 BETWEEN '2020-02-22 00:00:00' AND '2020-02-22 23:59:59' ")->fetchColumn();
    //$average_22 = (($m1_smte_22 + $m1_ip_22 + $m4_smte_22 + $m4_ip_22 )/4);
    $average_22 = 0;
    
    // 2020-02-23
    $m1_smte_23 = $conn->query("SELECT count(*) FROM m1_s WHERE  m1s340 BETWEEN '2020-02-23 00:00:00' AND '2020-02-23 23:59:59' ")->fetchColumn();
    $m1_ip_23 = $conn->query("SELECT count(*) FROM m1_ip WHERE  m1s340 BETWEEN '2020-02-23 00:00:00' AND '2020-02-23 23:59:59' ")->fetchColumn();
    $m4_smte_23 = $conn->query("SELECT count(*) FROM m4_s WHERE  m1s340 BETWEEN '2020-02-23 00:00:00' AND '2020-02-23 23:59:59' ")->fetchColumn();
    $m4_ip_23 = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s340 BETWEEN '2020-02-23 00:00:00' AND '2020-02-23 23:59:59' ")->fetchColumn();
    $average_23 = 0;

    // 2020-02-24
    $m1_smte_24 = $conn->query("SELECT count(*) FROM m1_s WHERE  m1s340 BETWEEN '2020-02-24 00:00:00' AND '2020-02-24 23:59:59' ")->fetchColumn();
    $m1_ip_24 = $conn->query("SELECT count(*) FROM m1_ip WHERE  m1s340 BETWEEN '2020-02-24 00:00:00' AND '2020-02-24 23:59:59' ")->fetchColumn();
    $m4_smte_24 = $conn->query("SELECT count(*) FROM m4_s WHERE  m1s340 BETWEEN '2020-02-24 00:00:00' AND '2020-02-24 23:59:59' ")->fetchColumn();
    $m4_ip_24 = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s340 BETWEEN '2020-02-24 00:00:00' AND '2020-02-24 23:59:59' ")->fetchColumn();
    $average_24 = 0;
   
    // 2020-02-25
    $m1_smte_25 = $conn->query("SELECT count(*) FROM m1_s WHERE  m1s340 BETWEEN '2020-02-25 00:00:00' AND '2020-02-25 23:59:59' ")->fetchColumn();
    $m1_ip_25 = $conn->query("SELECT count(*) FROM m1_ip WHERE  m1s340 BETWEEN '2020-02-25 00:00:00' AND '2020-02-25 23:59:59' ")->fetchColumn();
    $m4_smte_25 = $conn->query("SELECT count(*) FROM m4_s WHERE  m1s340 BETWEEN '2020-02-25 00:00:00' AND '2020-02-25 23:59:59' ")->fetchColumn();
    $m4_ip_25 = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s340 BETWEEN '2020-02-25 00:00:00' AND '2020-02-25 23:59:59' ")->fetchColumn();
    $average_25 = 0;
    
    // 2020-02-26
    $m1_smte_26 = $conn->query("SELECT count(*) FROM m1_s WHERE  m1s340 BETWEEN '2020-02-26 00:00:00' AND '2020-02-26 23:59:59' ")->fetchColumn();
    $m1_ip_26 = $conn->query("SELECT count(*) FROM m1_ip WHERE  m1s340 BETWEEN '2020-02-26 00:00:00' AND '2020-02-26 23:59:59' ")->fetchColumn();
    $m4_smte_26 = $conn->query("SELECT count(*) FROM m4_s WHERE  m1s340 BETWEEN '2020-02-26 00:00:00' AND '2020-02-26 23:59:59' ")->fetchColumn();
    $m4_ip_26 = $conn->query("SELECT count(*) FROM m4_ip WHERE  m1s340 BETWEEN '2020-02-26 00:00:00' AND '2020-02-26 23:59:59' ")->fetchColumn();
    $average_26 = 0;

} catch (\Throwable $th) {
    //throw $th;
}
$conn = null;
?>