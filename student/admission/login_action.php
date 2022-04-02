<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
        
    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $str_id_card = $_POST['id_card'];
    $str_id_exam = ($_POST['id_exam']);
    $str_plan = substr($str_id_exam,0,2);

    switch ($str_plan){
        case 10:
            $tbl_reg = "m1";
            $tbl_confirm = "confirm_m1";
            $tbl_res = "result_m1";
            $m = "1";
            break;
        case 38:
            $tbl_reg = "m4";
            $tbl_confirm = "confirm_m4";
            $tbl_res = "result_m4";
            $m = "4";
            break;
        case 39:
            $tbl_reg = "m4";
            $tbl_confirm = "confirm_m4";
            $tbl_res = "result_m4";
            $m = "4";
            break;
        case 40:
            $tbl_reg = "m4";
            $tbl_confirm = "confirm_m4";
            $tbl_res = "result_m4";
            $m = "4";
            break;

        default:
            header('location:login.php');
    }

    try {

        $str_sql = "SELECT * FROM ".  $tbl_res ." WHERE ref1 = :uname AND exam_id = :psw";
        // echo $str_sql . "<br>";
        // echo $str_id_card . "<br>";
        // echo $str_id_exam . "<br>";
        $stmt = $conn->prepare($str_sql);
        $stmt->execute(
            array(
                'uname' => $str_id_card,
                'psw' => $str_id_exam
                )
            );
        $count = $stmt->rowCount();
        if ($count == 1 ) {
            while ($row = $stmt->fetch()){
                $_SESSION['ref1'] = $row['ref1'];
                $_SESSION['ex_id'] =$str_id_exam;
                $_SESSION['plan'] =$str_plan;
                $_SESSION['m'] =$m;
                $_SESSION['tbl_reg'] = $tbl_reg;
                $_SESSION['tbl_confirm'] = $tbl_confirm;
                $_SESSION['tbl_res'] = $tbl_res;
                $_SESSION['sql_res'] ="SELECT * FROM ".  $tbl_res ." WHERE ref1 = '" . $str_id_card . "'AND  exam_id = '" . $str_id_exam . "'";
                $_SESSION['sql_reg'] ="SELECT * FROM ".  $tbl_reg ." WHERE reg_card_id = '" . $str_id_card . "'";
                $_SESSION['sql_confirm'] ="SELECT * FROM ".  $tbl_confirm ." WHERE reg_card_id = '" . $str_id_card . "'";
                $_SESSION['lang'] = "th";
            }
            $_SESSION['LAST_ACTIVITY'] = time();
            // echo "$count";
             header('location:index.php');
        } else {
            header('location:login.php');
        }

    } catch (PDOException $e) {
        
        echo $e->getMessage();

    }
?>