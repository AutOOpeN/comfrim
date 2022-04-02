<?php
    
        
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

$conn2 = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql_update_status = "UPDATE system  SET status = " . $_POST['chk_status'] ;
$edit_status = $conn2->prepare($sql_update_status);
    $edit_status->execute();
    $conn2 = null;
    header("Location: index.php");
    ?>

