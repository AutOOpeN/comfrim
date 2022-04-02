<?php

// include_once '../../config/config.inc.php';
// include_once '../../class/PDO.class.php';

require_once "../config/function.php";
require_once '../config/settings.config.php';
$data = $_GET['data'];
$val  = $_GET['val'];

if ($data == 'province_3') {
    $database = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    // $database = new DB(DBHost, DBName2, DBUser, DBPassword);
    $result   = $database->query("SELECT * FROM province  ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");
    echo "<select class='custom-select' required name='province_3' onChange=\"dochange_3('amphur_3', this.value)\">";
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

} else if ($data == 'amphur_3') {
    echo "<select class='custom-select' required name='amphur_3' onChange=\"dochange_3('district_3', this.value)\">";
    echo "<option value=''>- เลือกอำเภอ -</option>\n";
    $database2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $database2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    // $database2 = new DB(DBHost, DBName2, DBUser, DBPassword);
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
}
echo "</select>\n";
