<?php

/*
 * database connection settings
 * bukpee@gmail.com
 */
define('DBHost', '127.0.0.1');
define('DBPort', 3306);
define('DBName', 'SpkEntrance');
define('DBUser', 'root');
define('DBPassword', ',uok8,');

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

$education_year = "2565";

$txt               = array();
$txt["SYSTEMNAME"] = "ระบบรับนักเรียนประจำปีการศึกษา " . $education_year ." ห้องเรียนปกติ";
$txt["SYSTEMTITLEM1"] = "ใบสมัคร ชั้นมัธยมศึกษาปีที่ 1 ห้องเรียนปกติ ปีการศึกษา " . $education_year ;
$txt["SYSTEMTITLEM4"] = "ใบสมัคร ชั้นมัธยมศึกษาปีที่ 4 ห้องเรียนปกติ ปีการศึกษา " . $education_year ;
$txt["SCHOOLNAME"] = "โรงเรียนสตรีภูเก็ต";

# register
$txt["HEADDERM1"]="รายชื่อผู้สมัคร ชั้นมัธยมศึกษาปีที่ 1 ห้องเรียนปกติ ปีการศึกษา " . $education_year;
$txt["HEADDERM4"]="รายชื่อผู้สมัคร ชั้นมัธยมศึกษาปีที่ 4 ห้องเรียนปกติ ปีการศึกษา " . $education_year;

# bill
$txt["BillComment"]="หมายเหตุ : ชำระเงินที่ธนาคารกรุงไทยทุกสาขา ตั้งแต่วันนี้ ถึง 13 พฤษภาคม พ.ศ. 2563 เท่านั้น";
$txt["CODEBANK"] = "8006";

# admin
$txtp["Title_talent"] = "";