<?php

// include($_SERVER['DOCUMENT_ROOT']. "/config/settings.config.php");
// include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// require_once '../config/settings.config.php';


// ****************************
//         24
// ****************************
$m1_in_03 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-09 16:30:00' ")->fetchColumn();
// echo ("-----------". $m1_in_03);
$m1_out_03 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-09 16:30:00' ")->fetchColumn();
//   M4
$m4_in_03 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-09 16:30:00' ")->fetchColumn();
$m4_out_03 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-09 16:30:00' ")->fetchColumn();


// ****************************
//  25
// ****************************

$m1_in_04 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-09 16:30:01' AND '2022-03-10 16:30:00' ")->fetchColumn();
$m1_out_04 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-09 16:30:01' AND '2022-03-10 16:30:00' ")->fetchColumn();

//   M4
$m4_in_04 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 16:30:01' AND '2022-03-10 16:30:00' ")->fetchColumn();
$m4_out_04 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 16:30:01' AND '2022-03-10 16:30:00' ")->fetchColumn();


// ****************************
// 26
// ****************************    
$m1_in_05 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-10 16:30:01' AND '2022-03-11 16:30:00' ")->fetchColumn();
$m1_out_05 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-10 16:30:01' AND '2022-03-11 16:30:00' ")->fetchColumn();


//   M4
$m4_in_05 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-10 16:30:01' AND '2022-03-11 16:30:00' ")->fetchColumn();
$m4_out_05 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-10 16:30:01' AND '2022-03-11 16:30:00' ")->fetchColumn();

// ****************************
// 27
// ****************************   
//  M1    
$m1_in_06 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-11 16:30:01' AND '2022-03-12 16:30:00' ")->fetchColumn();
$m1_out_06 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-11 16:30:01' AND '2022-03-12 16:30:00' ")->fetchColumn();

//   M4
$m4_in_06 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-11 16:30:01' AND '2022-03-12 16:30:00' ")->fetchColumn();
$m4_out_06 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-11 16:30:01' AND '2022-03-12 16:30:00' ")->fetchColumn();

// ****************************
// 28
// ****************************   
//  M1    
$m1_in_07 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-12 16:30:01' AND '2022-03-13 16:30:00' ")->fetchColumn();
$m1_out_07 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-12 16:30:01' AND '2022-03-13 16:30:00' ")->fetchColumn();

//   M4
$m4_in_07 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-12 16:30:01' AND '2022-03-13 16:30:00' ")->fetchColumn();
$m4_out_07 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-12 16:30:01' AND '2022-03-13 16:30:00' ")->fetchColumn();

// ****************************
// 08
// ****************************   
//  M1    
$m1_in_08 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();
$m1_out_08 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();

//   M4
$m4_in_08 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();
$m4_out_08 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-07 16:30:01' AND '2020-05-08 16:30:00' ")->fetchColumn();

// ****************************
// 09
// ****************************   
//  M1    
$m1_in_09 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();
$m1_out_09 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();

//   M4
$m4_in_09 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();
$m4_out_09 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-08 16:30:01' AND '2020-05-09 16:30:00' ")->fetchColumn();

// ****************************
// 10
// ****************************   
//  M1    
$m1_in_10 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();
$m1_out_10 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();

//   M4
$m4_in_10 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();
$m4_out_10 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-09 16:30:01' AND '2020-05-10 16:30:00' ")->fetchColumn();

// ****************************
// 11
// ****************************   
//  M1    
$m1_in_11 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();
$m1_out_11 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();

//   M4
$m4_in_11 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();
$m4_out_11 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-10 16:30:01' AND '2020-05-11 16:30:00' ")->fetchColumn();

// ****************************
// 12
// ****************************   
//  M1    
$m1_in_12 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
$m1_out_12 = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();

//   M4
$m4_in_12 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();
$m4_out_12 = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2020-05-11 16:30:01' AND '2020-05-12 16:30:00' ")->fetchColumn();


//*****************************
//  Total
// ****************************
// M1
$total_m1_in = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id = '66' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-13 18:00:00' ")->fetchColumn();

$total_m1_out = $conn->query("SELECT count(*) FROM m1 WHERE reg_province_id <> '66' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-13 18:00:00' ")->fetchColumn() ;

// M4
$total_m4_in = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-13 18:00:00' ")->fetchColumn();
$total_m4_out = $conn->query("SELECT count(*) FROM m4 WHERE old_school_name NOT LIKE '%สตรีภูเก็ต' AND  record_time BETWEEN '2022-03-09 00:00:00' AND '2022-03-13 18:00:00' ")->fetchColumn();

$conn = null;
?>