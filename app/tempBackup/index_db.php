<?php

#require_once 'class/app.class.php';
include '../config/config.inc.php';
#$db = new spkapp("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,DB_USER,DB_PASS,DB_OPTION);
include "../class/PDO.class.php";

$DB = new DB(DBHost, DBName, DBUser, DBPassword);

#$aa = $DB->query("SELECT * FROM province WHERE GEO_ID = 2 ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");
$select_geopraphy = $DB->query("SELECT * FROM geography  ORDER BY CONVERT(GEO_NAME USING TIS620) ASC ");
$select_district  = $DB->query("SELECT * FROM district  ORDER BY CONVERT(DISTRICT_NAME USING TIS620) ASC ");
$select_amphur    = $DB->query("SELECT * FROM amphur  ORDER BY CONVERT(AMPHUR_NAME USING TIS620) ASC ");
$select_provice   = $DB->query("SELECT * FROM province  ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");
#  ภาค
echo "<select name='' >";
echo "<option value='#''>ภาค</option>";
foreach ($select_geopraphy as $key => $x1_value) {
    # code...
    foreach ($x1_value as $key1 => $value) {
        # code...
        #echo "key2 = {$key2}  value =  {$value}<br />";
        #echo $value;
        if ($key1 == "GEO_NAME") {
            # code...
            echo "<option value='{$value}'>{$value}</option>";
        }
    }
}
echo "</select>";
#  จังหวัด
echo "<select name='' >";
echo "<option value='#''>จังหวัด</option>";
foreach ($select_provice as $key => $x_value) {
    # code...
    foreach ($x_value as $key2 => $value) {
        # code...
        #echo "key2 = {$key2}  value =  {$value}<br />";
        #echo $value;
        if ($key2 == "PROVINCE_NAME") {
            # code...
            echo "<option value='{$value}'>{$value}</option>";
        }
    }
}
echo "</select>";
#  ตำบล
#  อำเภอ
echo "<select name='' >";
echo "<option value='#''>อำเภอ</option>";
foreach ($select_amphur as $key => $x_value) {
    # code...
    foreach ($x_value as $key2 => $value) {
        # code...
        #echo "key2 = {$key2}  value =  {$value}<br />";
        #echo $value;
        if ($key2 == "AMPHUR_NAME") {
            # code...
            echo "<option value='{$value}'>{$value}</option>";
        }
    }
}
echo "</select>";

/*
echo "<hr />";
print "<pre>";
print_r($select_geopraphy);
print "</pre>";
 */
