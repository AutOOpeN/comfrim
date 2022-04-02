<?php

/*
 * database connection settings
 * bukpee@gmail.com
 */
define('DBHost', '127.0.0.1');
define('DBPort', 3306);
define('DBName', 'admission');
define('DBUser', 'root');
define('DBPassword', ',uok8,');

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";

// require_once '../../spk/word.php';

$txt               = array();
$txt["SYSTEMNAME"] = "ระบบรับนักเรียนประจำ ปีการศึกษา 2565 ห้องเรียนทั่วไป";
$txt["SYSTEMTITLEM1"] = "ใบสมัคร ชั้นมัธยมศึกษาปีที่ 1 ห้องเรียนทั่วไป  ปีการศึกษา 2565 " ;
$txt["SYSTEMTITLEM4"] = "ใบสมัคร ชั้นมัธยมศึกษาปีที่ 4 ห้องเรียนทั่วไป ปีการศึกษา 2565"  ;
$txt["SCHOOLNAME"] = "โรงเรียนสตรีภูเก็ต";

# register
$txt["HEADDERM1"]="รายชื่อผู้สมัคร ชั้นมัธยมศึกษาปีที่ 1 ห้องเรียนทั่วไป ปีการศึกษา 2565" ;
$txt["HEADDERM4"]="รายชื่อผู้สมัคร ชั้นมัธยมศึกษาปีที่ 4 ห้องเรียนทั่วไป ปีการศึกษา 2565" ;

# bill
$txt["BillComment"]="หมายเหตุ : ชำระเงินที่ธนาคารกรุงไทยทุกสาขา ตั้งแต่วันนี้ ถึง 19 เมษายน พ.ศ. 2564 เท่านั้น";
$txt["CODEBANK"] = "81846";

# admin
$txtp["Title_talent"] = "";