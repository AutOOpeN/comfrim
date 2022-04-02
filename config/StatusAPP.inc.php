<?php

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM system");
    $stmt->execute();
    while  ($row = $stmt->fetch()) {
        $status= $row['status'];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn=null;
?>