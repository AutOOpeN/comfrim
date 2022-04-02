<?php

echo "แสดงค่าต้นฉบับ ก่อนแก้ไข" . "<br/>";
echo "จังหวัด : " . $_POST['province'] . "<br/>";
echo "อำเภอ : " . $_POST['amphur'] . "<br/>";
echo "ตำบล : " . $_POST['district'] . "<br/>";
echo "<hr>";
echo "แสดงค่าหลังแก้ไข" . "<br/>";
// จังหวัด
echo "PROVINCE <br/>";
$prov = SplitString($_POST['province']);
echo "<pre>";
print_r($prov);
echo "</pre>";
echo "<br>รหัสจังหวัด = " . $prov[0];
echo "<br>ชื่อจังหวัด = " . $prov[1];
echo "<hr/>";

//อำเภอ
echo "AMPHUR <br/>";
$am = SplitString($_POST['amphur']);
echo "<pre>";
print_r($am);
echo "</pre>";
echo "<br>รหัสอำเภอ = " . $am[0];
echo "<br>ชื่ออำเภอ = " . $am[1];
echo "<br>รหัสไปรษณีย์ = " . $am[2];
echo "<hr/>";

//ตำบล
echo "DISTRICT <br/>";
$dis = SplitString($_POST['district']);
echo "<pre>";
print_r($dis);
echo "</pre>";
echo "<br>รหัสตำบล = " . $dis[0];
echo "<br>ชื่อตำบล = " . $dis[1];

function SplitString($str)
{
    $checkAt = substr_count($str, "@"); //นับจำนวน @
    if ($checkAt == 1) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); // id
        $myString[1] = substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)); // name
        return $myString;
    } elseif ($checkAt == 2) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); //id
        $myString[1] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), 0, strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@"));
        $myString[2] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), (strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@") + 1), (strlen(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1))) - 1));
        return $myString;
    } else {
        return false;
    }

}
