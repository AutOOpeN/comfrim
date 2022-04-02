

<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

    $row=1;
    if (($handle = fopen("result_m1_2565_csv_2.csv", "r")) !== FALSE) {
        
        while (($data = fgetcsv($handle)) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "   |   ";
            }
            echo "<br />\n";
            // try{}

            $strSQL = "INSERT INTO result_m1 ";
            $strSQL .="(exam_id,ref1,math,sci,eng,thai,soc,result_no,result_number,result_status,result_text) ";
            $strSQL .="VALUES ";
            $strSQL .="('".$data[0]."','".$data[1]."',".$data[2]. "," .$data[3] ."," .$data[4] ."," .$data[5] ."," .$data[6];
            // $strSQL .="(".$data[3].",".$data[4].",".$data[5]." ";
            $strSQL .=",'".$data[7]."',".$data[8]."";
            $strSQL .=",".$data[9].",'".$data[10]."') ";

            $conn->exec($strSQL);
            // $objQuery = mysql_query($strSQL);
        }
        fclose($handle);        
        $conn = null;
    }

// }
// echo "Upload & Import Done.";
?>
