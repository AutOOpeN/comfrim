

<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    //  $row=1;
    $sql="";
    if (($handle = fopen("result_m4_2565_csv_1.csv", "r")) !== FALSE) {
        
        while (($data = fgetcsv($handle)) !== FALSE) {
            // $num = count($data);
            // echo "<p> $num fields in line $row: <br /></p>\n";
            
            // for ($c=0; $c < $num; $c++) {
            //     echo $data[$c] . "   |   ";
            // }
            
            // echo "<br />\n";

            // try{
            //     if($row != 1){
            //         $sql_update = "UPDATE result_m1 SET room = " . $data[1] . " WHERE ref1 = " . $data[0] ;
            //         // echo $sql_update . "<br>";

            //         $stmt_update = $conn->prepare($sql_update);
            //         $stmt_update->execute();
            //         echo $stmt_update->rowCount() . " แถว <br>";


            // $sql = "SELECT count(*) as num FROM result_m1 WHERE ref1 =" . $data[0]; 
            // $stmt = $conn->prepare($sql);
            // $stmt->execute();
            // $numb = $stmt->fetch();
            // echo $data[0] . "--->" . $numb['num'] . "<br>";
            
        
        // }
            // $row++;
        // } catch (PDOException $e) {

        //     echo "Error: " . $e->getMessage() . "<br>";
    
        // }
             try{

            $strSQL = "INSERT INTO result_m4 ";
            $strSQL .="(exam_id,ref1,math,sci,eng,thai,soc,result_no,result_status,result_text,room) ";
            $strSQL .="VALUES ";
            $strSQL .="('".$data[0]."','".$data[1]."',".$data[5]. "," .$data[6] ."," .$data[7] ."," .$data[8] ."," .$data[9];
            $strSQL .=",'".$data[11]."',".$data[12]."";
            $strSQL .=",'".$data[13]."','".$data[14]."') ";
            $stmt = $conn->prepare($strSQL);
            $stmt->execute();
            echo "new id: " . $conn->lastInsertId() . "<br>";
                    } catch (PDOException $e) {

            echo "Error: " . $e->getMessage() . "<br>";
    
        }
            // $objQuery = mysql_query($strSQL);
        }
        fclose($handle);        
        $conn = null;
    }

// }
// echo "Upload & Import Done.";
?>
