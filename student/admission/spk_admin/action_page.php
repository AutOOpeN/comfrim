<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");

    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

    try {
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
                // $_SESSION['admin_level'] = $row['access'];
                $_SESSION['admin_confirm'] = $row['access'];
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

        echo "Error: " . $e->getMessage();

    }
?>