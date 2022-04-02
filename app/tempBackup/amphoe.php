<?php
include_once '../config/config.inc.php';
include_once '../class/PDO.class.php';
echo $_POST['province'];
if (!empty($_POST['province'])) {
    $database = new DB(DBHost, DBName, DBUser, DBPassword);
    $result   = $database->query("SELECT * FROM amphur WHERE PROVINCE_ID = " . $_POST['province']);
    if (!empty($result)) {
        /*
        foreach ($result as $value) {
        echo '<option value="' . $value->AMPHUR_ID . '">' . $value->AMPHUR_NAME . '</option>';
        }
         */
        foreach ($result as $key => $x_value) {
            # code...
            foreach ($x_value as $key2 => $value) {
                # code...
                echo "<br />key2 = {$key2}  value =  {$value}<hr />";
                //echo $value;
                if ($key2 == "AMPHUR_NAME") {
                    # code...
                    $a_name = "{$value}";
                } elseif ($key2 == "AMPHUR_ID") {
                    $a_id = "{$value}";
                }
            }
            echo "<option value='$a_id'>$a_name</option>";
        }
    } else {
        return false;
    }
}
exit();
