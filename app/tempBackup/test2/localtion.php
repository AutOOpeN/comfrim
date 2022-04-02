<?php

include_once '../config/config.inc.php';
include_once '../class/PDO.class.php';
$data = $_GET['data'];
$val  = $_GET['val'];

if ($data == 'province') {
    echo "<select name='province' onChange=\"dochange('amphur', this.value)\">";
    echo "<option value='0'>- เลือกจังหวัด -</option>\n";
    $database = new DB(DBHost, DBName2, DBUser, DBPassword);
    $result   = $database->query("SELECT * FROM province  ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");
    /*
    $result=mysql_query("select * from province order by PROVINCE_NAME");
    while($row = mysql_fetch_array($result)){
    echo "<option value='$row[PROVINCE_ID]' >$row[PROVINCE_NAME]</option>" ;
    }*/
    foreach ($result as $key => $x_value) {
        # code...
        foreach ($x_value as $key2 => $value) {
            # code...
            //echo "<br />key2 = {$key2}  value =  {$value}<hr />";
            //echo $value;
            if ($key2 == "PROVINCE_NAME") {
                # code...
                $p_name = "{$value}";
            } elseif ($key2 == "PROVINCE_ID") {
                $p_id = "{$value}";
            }
        }
        echo "<option value='$p_id'>$p_name</option>";
    }

} else if ($data == 'amphur') {
    echo "<select name='amphur' onChange=\"dochange('district', this.value)\">";
    echo "<option value='0'>- เลือกอำเภอ -</option>\n";
    $result = mysql_query("SELECT * FROM amphur WHERE PROVINCE_ID= '$val' ORDER BY AMPHUR_NAME");
    while ($row = mysql_fetch_array($result)) {
        echo "<option value=\"$row[AMPHUR_ID]\" >$row[AMPHUR_NAME]</option> ";
    }
} else if ($data == 'district') {
    echo "<select name='district'>\n";
    echo "<option value='0'>- เลือกตำบล -</option>\n";
    $result = mysql_query("SELECT * FROM district WHERE AMPHUR_ID= '$val' ORDER BY DISTRICT_NAME");
    while ($row = mysql_fetch_array($result)) {
        echo "<option value=\"$row[DISTRICT_ID]\" >$row[DISTRICT_NAME]</option> \n";
    }
}
echo "</select>\n";

echo mysql_error();
closedb();
