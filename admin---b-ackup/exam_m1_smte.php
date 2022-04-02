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
    
    #$sql = "SELECT ex_m1_s.ex_id, m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s260,ex_m1_s.ex_room, m1_s.m1s001, m1_s.m1s003 FROM m1_s INNER JOIN ex_m1_s ON m1_s.m1s003=ex_m1_s.ref1";
    $sql = "SELECT * FROM m1_s WHERE status = 4 ORDER BY m1s001 ASC";
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<table border='1'>";
    #echo "<tr><td>เลขที่นั่งสอบ</td><td>คำนำหน้านาม</td></td><td>ชื่อ-สกุล</td><td>โรงเรียนเดิม</td><td>ห้องสอบที่</td><td>Ref#2</td><td>Ref#1</td></tr>";
    $i = 1;
    $room = 1;
    $sql_insert = "INSERT INTO ex_m1_s (ref1,ref2,ex_room) VALUES (?,?,?)";
    while ($row_data = $data->fetch()) {
        $m1_smte_exec = $conn->prepare("SELECT * FROM room WHERE rid < 21 AND r_current <= 39 LIMIT 1");
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