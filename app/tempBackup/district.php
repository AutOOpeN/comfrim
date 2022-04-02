<?php
include_once '../config/config.inc.php';
include_once '../class/PDO.class.php';
echo $_POST['amphoe'];
if (!empty($_POST['amphoe'])) {
    $database = new DB(DBHost, DBName, DBUser, DBPassword);

    $result = $database->query("SELECT * FROM district WHERE AMPHUR_ID = " . $_POST['amphoe']);
    if (!empty($result)) {
        /*
        foreach ($result as $value) {
        echo '<option value="' . $value->DISTRICT_ID . '">' . $value->DISTRICT_NAME . '</option>';
        }
         */
        foreach ($result as $key => $x_value) {
            # code...
            foreach ($x_value as $key2 => $value) {
                # code...
                //echo "<br />key2 = {$key2}  value =  {$value}<hr />";
                //echo $value;
                if ($key2 == "DISTRICT_NAME") {
                    # code...
                    $d_name = "{$value}";
                } elseif ($key2 == "DISTRICT_ID") {
                    $d_id = "{$value}";
                }
            }
            echo "<option value='$d_id'>$d_name</option>";
        }
    } else {
        return false;
    }
}
exit();
