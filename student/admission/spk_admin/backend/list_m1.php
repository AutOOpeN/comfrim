

<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    $sql = "select * from m4";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while($row=$stmt->fetch()){
        $sql_s = "INSERT INTO confirm_student (m1s003,m1s010,m1s020,m1s030,m1s040,m1s050,m1s060,
        m1s070,m1s071,m1s080,m1s081,m1s090,m1s091,
        m1s100,m1s110,m1s260,m1s270,m1s271,m1s280,m1s281)VALUES(
        '" . $row['reg_card_id']."',
       '" . $row['reg_name_title']."',
       '" . $row['reg_name']."',
       '" . $row['reg_suname']."',
       '" . $row['reg_date']."',
       '" . $row['reg_no']."',
       '" . $row['reg_road']."',
       '" . $row['reg_tambol']."',
       '" . $row['reg_tambol_id']."',
       '" . $row['reg_amphoe']."',
       '" . $row['reg_amphoe_id']."',
       '" . $row['reg_province']."',
       '" . $row['reg_province_id']."',
       '" . $row['reg_postcode']."',
       '" . $row['reg_tel']."',
       '" . $row['old_school_name']."',
       '" . $row['old_school_amphoe']."',
       '" . $row['old_school_amphoe_id']."',
       '" . $row['old_school_province']."',
       '" . $row['old_school_province_id']."')";
    
        $sql_f = "INSERT INTO confirm_father (fStudent_id) VALUES('". $row['reg_card_id'] ."')";
        $sql_m = "INSERT INTO confirm_mother (mStudent_id) VALUES('". $row['reg_card_id'] ."')";
        $sql_p = "INSERT INTO confirm_parent (pStudent_id) VALUES('". $row['reg_card_id'] ."')";
        
        $conn->exec($sql_s);
        $conn->exec($sql_f);
        $conn->exec($sql_m);
        $conn->exec($sql_p);
        echo "New record created successfully";
        
    }
} catch (PDOException $e) {
    echo "Error--> " . $e->getMessage();
}

    $conn = null;


// }
// echo "Upload & Import Done.";
?>
