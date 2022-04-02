<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
require "../config/function.php";
require '../config/settings.config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" name="form1">
        <input name="fileCSV" type="file" id="fileCSV">
        <input name="btnSubmit" type="submit" id="btnSubmit" value="Submit">
    </form>
    <?php
    if (isset ($_FILES['fileCSV']))  {
        move_uploaded_file($_FILES["fileCSV"]["tmp_name"],$_FILES["fileCSV"]["name"]); // Copy/Upload CSV
        $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
        $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // $sql = "SELECT ex_m1_s.ex_id, m1_s.m1s010, m1_s.m1s020, m1_s.m1s030, m1_s.m1s260,ex_m1_s.ex_room, m1_s.m1s001, m1_s.m1s003, m1_s.file_name_1 FROM m1_s INNER JOIN ex_m1_s ON m1_s.m1s003=ex_m1_s.ref1";
        // $data = $conn->prepare($sql);
        // $data->execute();
        // $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database"); // Conect to MySQL
        // $objDB = mysql_select_db("mydatabase");
        $row = 1;
        $objCSV = fopen($_FILES["fileCSV"]["name"], "r");
        // while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
        // //     $strSQL = "INSERT INTO customer ";
        // //     $strSQL .="(CustomerID,Name,Email,CountryCode,Budget,Used) ";
        // //     $strSQL .="VALUES ";
        // //     $strSQL .="('".$objArr[0]."','".$objArr[1]."','".$objArr[2]."' ";
        // //     $strSQL .=",'".$objArr[3]."','".$objArr[4]."','".$objArr[5]."') ";
        // //     $objQuery = mysql_query($strSQL);
        //     print_r($objArr). "<br>";
        // }
        // fclose($objCSV);
        while(! feof($objCSV))
        {
        print_r(fgetcsv($objCSV));
        }
      
      fclose($objCSV);
      
         echo "Upload & Import Done.";



    }else{
        echo '1';
    }
        
    ?>


</body>

</html>