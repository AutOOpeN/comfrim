<?php
/*
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: ../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: ../login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  */
  
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
/*
$fileName = "../../app/file1/m1s.csv";
$ojbWrite = fopen("../../app/file1/m1s.csv","w");
*/

//$k = 42%41;
//echo " k = $k";
echo "<br>";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    $sql = "SELECT * FROM m4_ip WHERE status = 4 ORDER BY m1s001 ASC";
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<table border='1'>";
    
    $i = 1;
    $room = 1;
   
    while ($row_data = $data->fetch()) {
        if ($row_data['m1s290'] == '4'){
            $m1_smte_exec = $conn->prepare("SELECT * FROM room WHERE rid = 40 AND r_current <= 39 LIMIT 1");
            $sql_insert = "INSERT INTO ex_m4_ip_cam (ref1,ref2,ex_room) VALUES (?,?,?)";
        }else{
            $m1_smte_exec = $conn->prepare("SELECT * FROM room WHERE rid > 36 AND r_current <= 39 LIMIT 1");
            $sql_insert = "INSERT INTO ex_m4_ip (ref1,ref2,ex_room) VALUES (?,?,?)";
        }
        
        $m1_smte_exec->execute();

        while ($row_m1smte=$m1_smte_exec->fetch()) {
            $tmp_rid = $row_m1smte['rid'];
            $tmp_room = $row_m1smte['r_name'];
            $tmp_current = $row_m1smte['r_current'] + 1;
        }
        $str_sql_update = "UPDATE room SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
        $conn ->exec($str_sql_update);
        $conn ->prepare($sql_insert)->execute([$row_data['m1s003'],$row_data['m1s001'],$tmp_room]);

        echo "<tr><td>" . $row_data['m1s001'] . "</td><td>" . $row_data['m1s010'] ."</td><td>" . $row_data['m1s020'] ."</td><td>" . $row_data['m1s030'] . "</td></tr>";
        #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td>" .$row_data[7] . "</td></tr>";
        # code...
       //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
    $i++;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
};
echo "</table>";
$conn = null;

?>