

<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    // $conn->exec("SET NAMES TIS620");

    $row=1;
    // $sql="";
    if (($handle = fopen("student_m4_quota.csv", "r")) !== FALSE) {
        
        while (($data = fgetcsv($handle)) !== FALSE) {
            // $num = count($data);
            // echo "<p> $num fields in line $row: <br /></p>\n";
            
            // for ($c=0; $c < $num; $c++) {
            //     echo $data[$c] . "   |   ";
            // }
            
            // echo "<br />\n";

            try{
                if($row != 1){
                    $sql_student = "INSERT INTO confirm_student (m1s003,m1s010,m1s020,m1s030) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
                    // $sql_father = "INSERT INTO confirm_father (fStudent_id) VALUES ('$data[0]')";
                    // $sql_mother = "INSERT INTO confirm_mother (mStudent_id) VALUES ('$data[0]')";
                    // $sql_parent = "INSERT INTO confirm_parent (pStudent_id) VALUES ('$data[0]')";
                    echo $sql_student . "<br>";
                    // $stmt = $conn->prepare($sql);
                    // $conn->exec($sql_student);
                    // echo "Student new id: " . $conn->lastInsertId() . "<br>";
                    // $conn->exec($sql_father);
                    // echo "Father new id: " . $conn->lastInsertId() . "<br>";
                    // $conn->exec($sql_mother);
                    // echo "Mother new id: " . $conn->lastInsertId() . "<br>";
                    // $conn->exec($sql_parent);
                    // echo "Parent new id: " . $conn->lastInsertId() . "<br>";
                }
                $row++;
            } catch (PDOException $e) {

                echo "Error: " . $e->getMessage() . "<br>";
        
            }



        }
        fclose($handle);        
        $conn = null;
    }

// }
// echo "Upload & Import Done.";
?>
