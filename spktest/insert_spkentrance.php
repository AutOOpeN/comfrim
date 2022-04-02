<?php
$servername = "localhost";
$username = "root";
$password = ",uok8,";
$dbname = "SpkEntrance";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO m1_s(m1s003 ,m1s011 
                            , m1s020 , m1s030 , m1s040 , m1s050
                            , m1s060 , m1s070 , m1s080 , m1s090 , m1s100)
                    VALUES('" . $_POST['xm1s003'] . "','" . $_POST['xm1s011'] . "'
                         , '" . $_POST['xm1s020'] . "','" . $_POST['xm1s030'] . "', ". $_POST['xm1s040'] . "  ,'" . $_POST['xm1s050'] . "'
                         , '" . $_POST['xm1s060'] . "','" . $_POST['xm1s070'] . "','" . $_POST['xm1s080'] . "','" . $_POST['xm1s090'] . "','" . $_POST['xm1s100'] . "')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>