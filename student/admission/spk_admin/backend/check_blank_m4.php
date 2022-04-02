

<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    $conn->exec("SET NAMES TIS620");

    //  $row=1;
    $sql="";
    // if (($handle = fopen("result_m4_2565_csv_1.csv", "r")) !== FALSE) {
        
        // while (($data = fgetcsv($handle)) !== FALSE) {
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

        // $sql = "SELECT m4.reg_card_id,m4.reg_name_title,m4.reg_name,m4.reg_suname,temp_m4.ref1,temp_m4.title,temp_m4.name,temp_m4.suname from m4 RIGHT JOIN temp_m4 on m4.reg_card_id = temp_m4.ref1";
        // SELECT m4.reg_card_id,m4.reg_name_title,m4.reg_name,m4.reg_suname,temp_m4.ref1,temp_m4.title,temp_m4.name,temp_m4.suname from m4 RIGHT JOIN temp_m4 on m4.reg_card_id = temp_m4.ref1
        
        
        // ใช้อันนี้
        $sql = "SELECT temp_m4.ref1,temp_m4.title,temp_m4.name,temp_m4.suname from m4 RIGHT JOIN temp_m4 on m4.reg_card_id = temp_m4.ref1 WHERE m4.reg_card_id is null";

            try{

                // $strSQL = "INSERT INTO temp_m4 ";
                // $strSQL .="(exam_id,ref1,title,name,suname,math,sci,eng,thai,soc,total,result_no,result_status,result_text,room) ";
                // $strSQL .="VALUES ";
                // $strSQL .="('".$data[0]."','".$data[1]."','".$data[2]. "','" .$data[3] ."','" .$data[4] ."','" .$data[5] ."','" .$data[6];
                // $strSQL .="','".$data[7]."','".$data[8]."'";
                // $strSQL .=",'".$data[9]."','".$data[10]."'";
                // $strSQL .=",'".$data[11]."','".$data[12]."'";
                // $strSQL .=",'".$data[13]."','".$data[14]."') ";
                // echo $strSQL. "<br>";
                $student_m4 = array();

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                while($row = $stmt->fetch()){    
                    $student_m4[] = $row;
                // echo '<pre>'; print_r($row); echo '</pre>';
                }
                // echo "new id: " . $conn->lastInsertId() . "<br>";

                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Disposition: attachment; filename=student_m4_1.csv');
                $output = fopen('php://output', 'w');
                fputcsv($output, array('Id', 'Title' ,'First Name', 'Last Name'));
                
                if (count($student_m4) > 0) {
                    foreach ($student_m4 as $row) {
                        fputcsv($output, $row);
                    }
                }
                

            } catch (PDOException $e) {

                echo "Error: " . $e->getMessage() . "<br>";
            }

        // }
        // fclose($handle);        
        $conn = null;
    // }

// }
// echo "Upload & Import Done.";
?>
