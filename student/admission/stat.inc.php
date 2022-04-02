<?php
    include "../../config/app/interface.dbconnection.php";
    include "../../config/app/class.mysql.php";
    include "../../config/app/class.gw.php";
    include "../../config/app/class.table.php";

$day1 = "2022-02-19";
$day2 = "2022-02-20";
$day3 = "2022-02-21";
$day4 = "2022-02-22";
$day5 = "2022-02-23";
$day6 = "2022-02-24";

$day1_start = $day1 .  " 00:00:00";
$day1_end = $day1 . " 23:59:59";

$day2_start = $day2 .  " 00:00:00";
$day2_end = $day2 . " 23:59:59";

$day3_start = $day3 .  " 00:00:00";
$day3_end = $day3 . " 23:59:59";

$day4_start = $day4 .  " 00:00:00";
$day4_end = $day4 . " 23:59:59";


$day5_start = $day5 .  " 00:00:00";
$day5_end = $day5 . " 23:59:59";


$day6_start = $day6 .  " 00:00:00";
$day6_end = $day6 . " 23:59:59";

try {


    // $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query_m1_s = new AppGW(new Table(Mysql::getInstance()->connect(),"m1_s"));

    $tmp = $query_m1_s->select("m1s003")->where("m1s081 = '880' AND  m1s340 BETWEEN ' $day1_start ' AND '$day1_end' ")->exec();

    while ($row = $tmp->fetch()){
        $t[] = $row;
        echo $row[5] . "<br>";
    }
    // $m1_s  = $tmp->fetchColumn();
    // echo $m1_s;


// ****************************
//          day1
// ****************************


//     $m1_smte_in_day1 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m1_smte_out_day1 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
// //Education HUB(IP 2)
//     $m1_ip2_in_day1 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m1_ip2_out_day1 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
// //Cambridge(4)
//     $m1_ip4_in_day1 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m1_ip4_out_day1 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();


// //   M4
//     $m4_smte_in_day1 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m4_smte_out_day1 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();

// //Education HUB(IP 2)
//     $m4_ip2_in_day1 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 <> '4'  AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m4_ip2_out_day1 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
// //Cambridge(4)
//     $m4_ip4_in_day1 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();
//     $m4_ip4_out_day1 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day1_end' ")->fetchColumn();

    
// // ****************************
// // day2
// // ****************************

//     $m1_smte_in_day2 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m1_smte_out_day2 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
// //Education HUB(IP 2)
//     $m1_ip2_in_day2 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m1_ip2_out_day2 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
// //Cambridge(4)
//     $m1_ip4_in_day2 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m1_ip4_out_day2 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();

// //   M4
//     $m4_smte_in_day2 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m4_smte_out_day2 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();

// //Education HUB(IP 2)
//     $m4_ip2_in_day2 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 <> '4'  AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m4_ip2_out_day2 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
// //Cambridge(4)
//     $m4_ip4_in_day2 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();
//     $m4_ip4_out_day2 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day2_start' AND '$day2_end' ")->fetchColumn();

    

// // ****************************
// // day3
// // ****************************    
//     $m1_smte_in_day3 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m1_smte_out_day3 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
// //Education HUB(IP 2)
//     $m1_ip2_in_day3 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m1_ip2_out_day3 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
// //Cambridge(4)
//     $m1_ip4_in_day3 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m1_ip4_out_day3 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();

// //   M4
//     $m4_smte_in_day3 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m4_smte_out_day3 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();

// //Education HUB(IP 2)
//     $m4_ip2_in_day3 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 <> '4'  AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m4_ip2_out_day3 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
// //Cambridge(4)
//     $m4_ip4_in_day3 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
//     $m4_ip4_out_day3 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day3_start' AND '$day3_end' ")->fetchColumn();
   
// // ****************************
// // day4
// // ****************************   
//    $m1_smte_in_day4 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m1_smte_out_day4 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     //Education HUB(IP 2)
//     $m1_ip2_in_day4 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m1_ip2_out_day4 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     //Cambridge(4)
//     $m1_ip4_in_day4 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m1_ip4_out_day4 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     //   M4
//     $m4_smte_in_day4 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m4_smte_out_day4 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     //Education HUB(IP 2)
//     $m4_ip2_in_day4 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 <> '4'  AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m4_ip2_out_day4 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();

//     //Cambridge(4)
//     $m4_ip4_in_day4 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
//     $m4_ip4_out_day4 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day4_start' AND '$day4_end' ")->fetchColumn();
   
// // ****************************    
// // day5
// // ****************************    
//    $m1_smte_in_day5 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m1_smte_out_day5 = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
// //Education HUB(IP 2)
//     $m1_ip2_in_day5 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m1_ip2_out_day5 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
// //Cambridge(4)
//     $m1_ip4_in_day5 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m1_ip4_out_day5 = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();



// //   M4
//     $m4_smte_in_day5 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m4_smte_out_day5 = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();

// //Education HUB(IP 2)
//    $tmp_sql = "SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s340 BETWEEN '$day5_start' AND '$day5_end'";
//     // echo $tmp_sql;

//     $m4_ip2_in_day5 = $conn->query($tmp_sql)->fetchColumn();
//     // $m4_ip2_in_day5 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 <> '4'  AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m4_ip2_out_day5 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
// //Cambridge(4)
//     $m4_ip4_in_day5 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
//     $m4_ip4_out_day5 = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day5_start' AND '$day5_end' ")->fetchColumn();
   

// //*****************************
// //  Total
// // ****************************
//     // M1
//     $total_m1_s_in = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 = '880' AND  m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();

//     $total_m1_s_out = $conn->query("SELECT count(*) FROM m1_s WHERE m1s081 <> '880' AND  m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn() ;
    
//     $total_m1_ip2_in = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
//     $total_m1_ip2_out = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '2' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
    
//     $total_m1_ip4_in = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 = '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
//     $total_m1_ip4_out = $conn->query("SELECT count(*) FROM m1_ip WHERE m1s081 <> '880' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
//     // M4
//     $total_m4_s_in = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
//     $total_m4_s_out = $conn->query("SELECT count(*) FROM m4_s WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
//     // $tmp_sql = "SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s340 BETWEEN '2022-02-19 00:00:00' AND '2022-02-23 23:59:59'";
//     // $tmp_sql = "SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s340 BETWEEN '$day1_start' AND '$day5_end'";
//     // echo $tmp_sql;
//     // $total_m4_ip2_in = $conn->query($tmp_sql)->fetchColumn();
//     $total_m4_ip2_in = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND  m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();
    
//     $total_m4_ip2_out = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 <> '4' AND m1s340 BETWEEN'$day1_start' AND '$day5_end' ")->fetchColumn();;
//     $total_m4_ip4_in = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();;
//     $total_m4_ip4_out = $conn->query("SELECT count(*) FROM m4_ip WHERE m1s260 NOT LIKE '%สตรีภูเก็ต' AND m1s290 = '4' AND m1s340 BETWEEN '$day1_start' AND '$day5_end' ")->fetchColumn();

} catch (\Throwable $th) {
    //throw $th;
    echo 'error' . $th;
}
$conn = null;
?> 