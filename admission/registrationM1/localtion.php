<?php

// // include_once '../config/settings.config.php';
// include_once '../../config/config.inc.php';
// //include_once '../../config/config.inc.php';
// //include_once '../src/PDO.class.php';
// include_once '../../class/PDO.class.php';

require_once "../config/function.php";
require_once '../config/settings.config.php';

// $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

$data = $_GET['data'];
$val  = $_GET['val'];

if ($data == 'province') {
    $database = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

    // $database = new DB(DBHost, DBName, DBUser, DBPassword);
    $result   = $database->query("SELECT * FROM province  ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");
    echo "<select class='form-control' required name='province' onChange=\"dochange('amphur', this.value)\">";
    echo "<option value=''>- เลือกจังหวัด -</option>\n";
    foreach ($result as $key => $x_value) {
        foreach ($x_value as $key2 => $value) {
            if ($key2 == "PROVINCE_NAME") {
                $p_name = "{$value}";
            } elseif ($key2 == "PROVINCE_ID") {
                $p_id = "{$value}";
            }
        }
        echo "<option value='$p_id@$p_name'>$p_name</option>";
    }
} else if ($data == 'amphur') {
    echo "<select  class='form-control' required name='amphur' onChange=\"dochange('district', this.value)\">";
    echo "<option value=''>- เลือกอำเภอ -</option>\n";
    
    $database2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $database2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    $result2   = $database2->query("SELECT * FROM amphur WHERE PROVINCE_ID = '$val' ORDER BY CONVERT(AMPHUR_NAME USING TIS620) ASC");
    foreach ($result2 as $key => $x_value) {
        foreach ($x_value as $key2 => $value) {
            // echo "<br />key2 = {$key2}  value =  {$value}<hr />";
            if ($key2 == "AMPHUR_NAME") {
                $a_name = "{$value}";
            } elseif ($key2 == "AMPHUR_ID") {
                $a_id = "{$value}";
            } elseif ($key2 == "POSTCODE") {
                $a_postcode = "{$value}";
            }
        }
        echo "<option value='$a_id@$a_name@$a_postcode'>$a_name</option>";
        //echo "<input type='text' name='xm1s100' value='$a_postcode'>";
    }
} else if ($data == 'district') {
    echo "<select  class='form-control' required  name='district'>\n";
    echo "<option value=''>- เลือกตำบล -</option>\n";
    $database3 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $database3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
    // $database3 = new DB(DBHost, DBName, DBUser, DBPassword);
    $result3   = $database3->query("SELECT * FROM district WHERE AMPHUR_ID = '$val'  ORDER BY CONVERT(DISTRICT_NAME USING TIS620) ASC");
    foreach ($result3 as $key => $x_value) {
        foreach ($x_value as $key2 => $value) {
            if ($key2 == "DISTRICT_NAME") {
                $d_name = "{$value}";
            } elseif ($key2 == "DISTRICT_ID") {
                $d_id = "{$value}";
            }
        }
        echo "<option value='$d_id@$d_name'>$d_name</option>";
    }
}
echo "</select>\n";
