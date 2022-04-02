<?php
    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameApp;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
    



    try{

        // $r =array("ex_m1_s_result","ex_m1_ip_result","ex_m1_ip_cam_result","ex_m4_s_result","ex_m4_ip_result","ex_m4_ip_cam_result");
        // $p = array("confirm_father","confirm_mother", "confirm_parent");

        // $sql = "SELECT * FROM confirm_student";
        $sql = "SELECT * 
        FROM ((confirm_student 
        INNER JOIN confirm_father ON confirm_student.m1s003 = confirm_father.fStudent_id)
        INNER JOIN confirm_mother ON confirm_student.m1s003 = confirm_mother.mStudent_id)
        INNER JOIN confirm_parent ON confirm_student.m1s003 = confirm_parent.pStudent_id
        WHERE m1s003 = '1909803454668'";
        $m = $conn->prepare($sql);
        $m->execute();
        $row =$m->fetch();
               echo "<pre>";
        print_r($row);
        echo "</pre>";
        // while ($row = $m->fetch()){
        //     echo $row['m1s003']; // student id
        //     // father
        //     if ($row['m1s120']){ // firstname
        //         echo $row['m1s120'] . " ";
        //     }
        //     if ($row['m1s130']){ // lastname
        //         echo $row['m1s130'] . " ";
        //     }
        //     if ($row['m1s140']){ // job
        //         echo $row['m1s140'] . " ";
        //     }
        //     if ($row['m1s150']){ // tel
        //         echo $row['m1s150'] . "<-------------<br>";
        //     }
        //     // mother
        //     if ($row['m1s160']){ // title name
        //         echo $row['m1s160'] . " ";
        //     }
        //     if ($row['m1s170']){ // first name
        //         echo $row['m1s170'] . " ";
        //     }
        //     if ($row['m1s180']){ // last name
        //         echo $row['m1s180'] . " ";
        //     }
        //     if ($row['m1s190']){ // job
        //         echo $row['m1s190'] . " ";
        //     }
        //     if ($row['m1s200']){ // tel
        //         echo $row['m1s200'] . "<-------------<br>";
        //     }

        // }


        // $row = $m->fetchAll();
        // foreach ($row as $key => $val ){
        //     echo  "key = " . $key . "and VALUE = " . $val . "<br>";
        //     if ($key == "m1s120"){
        //         echo $val . "<-------------<br>";
        //     }
        // }

        // foreach ($r as $val){
        //     echo $val . "<br>";
        //     $sql =" SELECT * FROM " . $val . " WHERE result_status = 1 ";
        //     $m = $conn->prepare($sql);
        //     $m->execute();
        //     while ($row = $m->fetch()){

        //         foreach($p as $val_p ){
        //             $sql_ins = "INSERT INTO " .$val_p . " (student_id) VALUES (:id)";
        //             $ins = $conn->prepare($sql_ins);
        //             $ins->execute (array(":id" =>  $row[2]));
        //             echo "New id: " . $conn->lastInsertId();
        //         }
        //     }
        // }

    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062){
            echo "ซ้ำ";        
        }else{
           echo $e->getMessage(); 
        }
        
    }

    //   $pass = addUser("jon@doe.com", "password123");
    // $sql = "
    //     CREATE TABLE user (
    //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         user VARCHAR(30),
    //         pass VARCHAR(30),
    //         firstname VARCHAR(30),
    //         lastname VARCHAR(30),
    //         lastlogin TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    // )";
    // $sql = "insert into user(user,pass,firstname)value("
    // try{
    //     $conn->exec($sql);
    //     echo "Table  created successfully";
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    // }

//     $plaintext_password = "naj2236";
//     // $plaintext_password = "Password@123";
//     // The hash of the password that
//     // can be stored in the database
//     // $hash1 = password_hash($plaintext_password,PASSWORD_DEFAULT);
    
//     // Print the generated hash
//     echo "Generated hash: ".$hash1 . "<br>";
//     $hash1 = "$2y$10$r1lREkagi1QvTT2zs1iFcu/jLawb9/5U5OCD4dqNIOuqImZgt28mS";
//   // Verify the hash against the password entered
//   $verify = password_verify($plaintext_password, $hash1);
// //   $verify = password_verify("naj2236", $hash2);
  
//   // Print the result depending if they match
//   if ($verify) {
//       echo 'Password Verified!';
//   } else {
//       echo 'Incorrect Password!';
//   }