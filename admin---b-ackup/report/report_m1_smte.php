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
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT ex_m1_s.ex_id, m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s260,ex_m1_s.ex_room, m1_s.m1s001, m1_s.m1s003, m1_s.file_name_1 FROM m1_s INNER JOIN ex_m1_s ON m1_s.m1s003=ex_m1_s.ref1";
    
    $data = $conn->prepare($sql);
    $data->execute();
    echo "<table border='1'>";
    echo "<tr><td>เลขที่นั่งสอบ</td><td>คำนำหน้านาม</td></td><td>ชื่อ</td><td>นามสกุล</td><td>โรงเรียนเดิม</td><td>ห้องสอบที่</td><td>Ref#2</td><td>Ref#1</td><td>PIC</td></tr>";
    while ($row_data = $data->fetch()) {
        #echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td><a href='#'>" .$row_data[7] . "</a></td><td><image src='../../app/file1/". $row_data[8]."' width='90px' height='90px'></image></td></tr>";
        echo "<tr><td>" .$row_data[0] . "</td><td>" . $row_data[1] . "</td><td>" .  $row_data[2] . "</td><td>  ". $row_data['3'] ."</td><td>" . $row_data[4] . " </td><td>  " . $row_data[5] . " </td><td>  ". $row_data[6] . "</td><td>" .$row_data[7] . "</td><td></td></tr>";
        # code...
       //fwrite($ojbWrite, "\"$row_data[0]\",\"$row_data[1]\",\"$row_data[2]\",\"$row_data[3]\",\"$row_data[4]\",\"$row_data[5]\" \n");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
};
echo "</table>";
$conn = null;

?>