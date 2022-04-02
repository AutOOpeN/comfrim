<?php
    session_start();
    if (!isset($_SESSION['ref1'])) {
        header("Location: login.php");
        exit;
    }
    
    // if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 18000000)) {
        session_start();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    // include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    // include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

    include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");

    $conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../../css/student/student.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

    <title>รายงานตัว  | โรงเรียนสตรีภูเก็ต</title>

</head>

<body>
    <?php
        $studentBirthday = $_POST['studentBirthdayYear'] . $_POST['studentBirthdayMonth']  . $_POST['studentBirthdayDay'];

       
        $sql_student = "UPDATE confirm_student SET 
            m1s010='".$_POST['studentTitleName']."',
            m1s020='".$_POST['studentFirstNameTH']."',
            m1s030='".$_POST['studentLastNameTH']."',
            studentFirstNameEN='".$_POST['studentFirstNameEN']."',
            studentLastNameEN='".$_POST['studentLastNameEN']."',
            m1s040='".$studentBirthday ."',
            studentRace='".$_POST['studentRace']."',
            studentNation='".$_POST['studentNation']."',
            studentReligion='".$_POST['studentReligion']."',
            studentSpeakLang='".$_POST['studentSpeakLang']."',
            studentSpeakOther='".$_POST['studentSpeakOther']."',
            studentBornTambon='".$_POST['studentBornTambon']."',
            studentBornAmphur='".$_POST['studentBornAmphur']."',
            studentBornProvince='".$_POST['studentBornProvince']."',
            studentLiveWith='".$_POST['studentLiveWith']."',
            studentDisadvantaged='".$_POST['studentDisadvantaged']."',
            studentScarcity01='".$_POST['studentScarcity01']."',
            studentScarcity02='".$_POST['studentScarcity02']."',
            studentScarcity03='".$_POST['studentScarcity03']."',
            studentScarcity04='".$_POST['studentScarcity04']."',
            studentTraveling='".$_POST['studentTraveling']."',
            studentTimeDt='".$_POST['studentTimeDt']."',
            studentWaterDt='".$_POST['studentWaterDt']."',
            studentRockDt='".$_POST['studentRockDt']."',
            studentRubberDt='".$_POST['studentRubberDt']."',
            studentWeight='".$_POST['studentWeight']."',
            studentHeight='".$_POST['studentHeight']."',
            studentBlood='".$_POST['studentBlood']."',
            studentFamily='".$_POST['studentFamily']."',
            studentOlderBorthers='".$_POST['studentOlderBorthers']."',
            studentYoungerBorthers='".$_POST['studentYoungerBorthers']."',
            studentOlderSisters='".$_POST['studentOlderSisters']."',
            studentYoungerSisters='".$_POST['studentYoungerSisters']."',
            studentNumofStudyingSiblings='".$_POST['studentNumOfStudyingSiblings']."',
            studentChildIndex='".$_POST['studentChildIndex']."',
            psHomeIdNo='".$_POST['psHomeIdNo']."',
            m1s050='".$_POST['psHomeNo']."',
            psMoo='".$_POST['psMoo']."',
            psSoi='".$_POST['psSoi']."',
            m1s060='".$_POST['psStreet']."',
            m1s070='".$_POST['psTumbol']."',
            m1s080='".$_POST['psAmphur']."',
            m1s090='".$_POST['psProvince']."',
            m1s100='".$_POST['psPostCode']."',
            m1s110='".$_POST['psTelNo']."',
            studentHomeIdNo='".$_POST['studentHomeIdNo']."',
            studentHomeNo='".$_POST['studentHomeNo']."',
            studentMoo='".$_POST['studentMoo']."',
            studentSoi='".$_POST['studentSoi']."',
            studentStreet='".$_POST['studentStreet']."',
            studentTumbol='".$_POST['studentTumbol']."',
            studentAmphur='".$_POST['studentAmphur']."',
            studentProvince='".$_POST['studentProvince']."',
            studentPostCode='".$_POST['studentPostCode']."',
            studentTelNo='".$_POST['studentTelNo']."',
            m1s260='".$_POST['oldSchoolName']."',
            m1s270='".$_POST['oldSchoolAmphur']."',
            m1s280='".$_POST['oldSchoolProvince'] ."'

            WHERE m1s003=". $_SESSION['ref1'] ; 

        $sql_father = "UPDATE confirm_father SET 
            fTitle='".$_POST['fatherTitleName']."',
            fFirst_name='". $_POST['fatherFirstName']."',
            fLast_name='". $_POST['fatherLastName']."',
            fCard_id='". $_POST['fatherCifNo']."',
            fCard_type='". $_POST['fatherCifType']."',
            fBlood_type='". $_POST['fatherBlood']."',
            fQualification='". $_POST['fatherEdu']."',
            fOccupation='". $_POST['fatherOccupation']."',
            fOffice='". $_POST['fatherJobPlace']."',fIncome=". $_POST['fatherSalary'].",fTel='". $_POST['fatherTelNo']."' WHERE fStudent_id=". $_SESSION['ref1'] ; 
  
        $sql_mother = "UPDATE confirm_mother SET 
            mTitle='".$_POST['motherTitleName']."',
            mFirst_name='". $_POST['motherFirstName']."',
            mLast_name='". $_POST['motherLastName']."',
            mCard_id='". $_POST['motherCifNo']."',
            mCard_type='". $_POST['motherCifType']."',
            mBlood_type='". $_POST['motherBlood']."',
            mQualification='". $_POST['motherEdu']."',
            mOccupation='". $_POST['motherOccupation']."',
            mOffice='". $_POST['motherJobPlace']."',
            mIncome=". $_POST['motherSalary'].",
            mTel='". $_POST['motherTelNo'] ."'

            WHERE mStudent_id=". $_SESSION['ref1'] ; 

        $sql_parent = "UPDATE confirm_parent SET
            pRelationship='".$_POST['parentRelation']."',
            pTitle='".$_POST['parentTitleName']."',
            pFirst_name='".$_POST['parentFirstName']."',
            pLast_name='".$_POST['parentLastName']."',
            pCard_id='".$_POST['parentCifNo']."',
            pCard_type='".$_POST['parentCifType']."',
            pBlood_type='".$_POST['parentBlood']."',
            pQualification='".$_POST['parentEdu']."',
            pOccupation='".$_POST['parentOccupation']."',
            pOffice='".$_POST['parentJobPlace']."',
            pIncome=".$_POST['parentSalary'].",
            pTel='".$_POST['parentTelNo']."'
            WHERE pStudent_id=". $_SESSION['ref1'] ; 
        
    try{
        // student
        $stmt_student = $conn->prepare($sql_student);
        $stmt_student->execute(); 
        //father 
        $stmt_father = $conn->prepare($sql_father);
        $stmt_father->execute(); 
        // mother
        $stmt_mother = $conn->prepare($sql_mother);
        $stmt_mother->execute(); 
        // parent
        $stmt_parent = $conn->prepare($sql_parent);
        $stmt_parent->execute();  
        
        
        echo $stmt_student->rowCount() . " ข้อมูลนักเรียน บันทึกสำเร็จ student<br>";  
        echo $stmt_father->rowCount() . " ข้อมูลบิดา บันทึกสำเร็จ<br>";  
        echo $stmt_mother->rowCount() . " ข้อมูลมารดา บันทึกสำเร็จ<br>";
        echo $stmt_parent->rowCount() . " ข้อมูลผู้ปกครอง บันทึกสำเร็จ<br>";
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Succesfully Updated');
                window.location.href='confirm.php';
            </script>");
        // header('Location: index.php');
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062){
            echo "ซ้ำ";        
        }else{
           echo "Student Error ==".$e->getMessage(); 
        }
        
    }
   


    // $data_father = array(
    //     "fatherTitleName"=>$_POST['fatherTitleName'],
    //     "fatherFirstName"=>$_POST['fatherFirstName'],
    //     "fatherLastName"=>$_POST['fatherLastName'],
    //     "fatherCifNo"=>$_POST['fatherCifNo'],
    //     "fatherCifType"=>$_POST['fatherCifType'],
    //     "fatherBlood"=>$_POST['fatherBlood'],
    //     "fatherEdu"=>$_POST['fatherEdu'],
    //     "fatherOccupation"=>$_POST['fatherOccupation'],
    //     "fatherJobPlace"=>$_POST['fatherJobPlace'],
    //     "fatherSalary"=>$_POST['fatherSalary'],
    //     "fatherTelNo"=>$_POST['fatherTelNo'],
    //     "idCard"=>$_SESSION['ref1']
    // );

    // $data_mother = array(
    //     "motherTitleName"=>$_POST['motherTitleName'],
    //     "motherFirstName"=>$_POST['motherFirstName'],
    //     "motherLastName"=>$_POST['motherLastName'],
    //     "motherCifNo"=>$_POST['motherCifNo'],
    //     "motherCifType"=>$_POST['motherCifType'],
    //     "motherBlood"=>$_POST['motherBlood'],
    //     "motherEdu"=>$_POST['motherEdu'],
    //     "motherOccupation"=>$_POST['motherOccupation'],
    //     "motherJobPlace"=>$_POST['motherJobPlace'],
    //     "motherSalary"=>$_POST['motherSalary'],
    //     "motherTelNo"=>$_POST['motherTelNo'],
    //     "idCard"=>$_SESSION['ref1']
    // );

    // $data_parent = array(
    //     "parentRelation"=>$_POST['parentRelation'],
    //     "parentTitleName"=>$_POST['parentTitleName'],
    //     "parentFirstName"=>$_POST['parentFirstName'],
    //     "parentLastName"=>$_POST['parentLastName'],
    //     "parentCifNo"=>$_POST['parentCifNo'],
    //     "parentCifType"=>$_POST['parentCifType'],
    //     "parentBlood"=>$_POST['parentBlood'],
    //     "parentEdu"=>$_POST['parentEdu'],
    //     "parentOccupation"=>$_POST['parentOccupation'],
    //     "parentJobPlace"=>$_POST['parentJobPlace'],
    //     "parentSalary"=>$_POST['parentSalary'],
    //     "parentTelNo"=>$_POST['parentTelNo'],
    //     "idCard"=>$_SESSION['ref1']
    // );

        // echo "<pre>";
        // print_r($data_student);
        // echo "</pre>";
        // echo "<hr>";
        // echo "<pre>";
        // print_r($data_father);
        // echo "</pre>";
        // echo "<hr>";
        // echo "<pre>";
        // print_r($data_mother);
        // echo "</pre>";
        // echo "<hr>";
        // echo "<pre>";
        // print_r($data_parent);
        // echo "</pre>";
    ?>
</body>

</html>