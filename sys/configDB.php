<?php
    session_start();
    // if (!isset($_SESSION['admin_level'])) {
    //     header("Location: login.php");
    //     exit;
    // }
    
    // if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
    //     session_start();
    //     //session_unset();
    //     session_destroy();
    //     header("Location: login.php");
    // }
    // $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    
    // include($_SERVER['DOCUMENT_ROOT'] . "/spk/word.php");
    // include($_SERVER['DOCUMENT_ROOT'] . "/config/stat.inc.php");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงเรียนสตรีภูเก็ต</title>
</head>
<body>
    <?php 
        $tarfile = "file3-2564.tar";
        $pd = new PharData($tarfile);
        $pd->buildFromDirectory("/var/www/html/backup/app");
        $pd->compress(Phar::GZ);
    ?>
</body>
</html>