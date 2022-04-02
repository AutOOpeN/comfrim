<?php
    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    $str_tbl_select = "ex_m1";
    $str_tbl_insert = "result_m1";
    $str_ex_id = "10";
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $str_sql = "SELECT * FROM ". $str_tbl_select;
    // echo $str_sql;
    $stmt = $conn->prepare($str_sql);
    $stmt->execute();
    try{

        while($row = $stmt->fetch()){
            $exam_id = $row['ex_id'];
            if ($exam_id < 1000) {
                if($exam_id<10){
                    $exam_id = $str_ex_id . "00". $exam_id;
                }elseif($exam_id<100){
                    $exam_id = $str_ex_id . "0".$exam_id;
                }else{
                    $exam_id = "{$str_ex_id}{$exam_id}";
                }
            } else {
                $exam_id = "{$str_ex_id}{$exam_id}";
            }
            echo $exam_id;
            $str_sql_insert = "INSERT INTO ". $str_tbl_insert. " (exam_id, ref1) VALUES ( '".  $exam_id ."','" . $row['ref1']. "')";
            echo $str_sql_insert . "<br>";
            try{
            $stmt_insert= $conn->prepare($str_sql_insert);
            $stmt_insert->execute(); 
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
        }
    } catch (PDOException $e) {
    echo $e->getMessage();
    }
