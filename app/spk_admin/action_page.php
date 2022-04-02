<?php
    session_start();
    $servername = "localhost";
    $username   = "root";
    $password   = ",uok8,";
    $dbname     = "SpkEntrance";

    try {
        //$md5_pass = md5(mysql_real_escape_string($_POST['psw']));
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $str_sql = "SELECT * FROM user WHERE name = :uname AND pass = :psw";
        $stmt = $conn->prepare($str_sql);
        $stmt->execute(
            array(
                'uname' => $_POST['uname'],
                'psw' => $_POST['psw']
                )
            );
        $count = $stmt->rowCount();
        if ($count == 1 ) {
            while ($row = $stmt->fetch()){
                $_SESSION['admin_level'] = $row['access'];
            }
            $_SESSION['LAST_ACTIVITY'] = time();
            header('location:index.php');
            //echo $_SESSION['admin_level'];
            //echo '1';
        } else {
            //echo '2';
            header('location:login.php');
        }


    } catch (PDOException $e) {
        echo $str_sql . "<br>";
        echo "Error: " . $e->getMessage();

    }
?>