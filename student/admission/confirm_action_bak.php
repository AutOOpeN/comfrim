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
    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
    include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");




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

    <title>รายงานตัว โครงการพิเศษ | โรงเรียนสตรีภูเก็ต</title>

</head>

<body>
    <?php
        $studentBirthday = $_POST['studentBirthdayYear'] . $_POST['studentBirthdayMonth']  . $_POST['studentBirthdayDay'];

        $data_student = array(
            "studentTitleName"=>$_POST['studentTitleName'],
            "studentFirstNameTH"=>$_POST['studentFirstNameTH'],
            "studentLastNameTH"=>$_POST['studentLastNameTH'],
            "studentFirstNameEN"=>$_POST['studentFirstNameEN'],
            "studentLastNameEN"=>$_POST['studentLastNameEN'],
            "studentBirthday"=>$studentBirthday,
            "studentRace"=>$_POST['studentRace'],
            "studentNation"=>$_POST['studentNation'],
            "studentReligion"=>$_POST['studentReligion'],
            "studentSpeakLang"=>$_POST['studentSpeakLang'],
            "studentSpeakOther"=>$_POST['studentSpeakOther'],
            "studentTambon"=>$_POST['studentTambon'],
            "studentAmphur"=>$_POST['studentAmphur'],
            "studentProvince"=>$_POST['studentProvince'],
            "studentLiveWith"=>$_POST['studentLiveWith'],
            "studentDisadvantaged"=>$_POST['studentDisadvantaged'],
            "studentScarcity01"=>$_POST['studentScarcity01'],
            "studentScarcity02"=>$_POST['studentScarcity02'],
            "studentScarcity03"=>$_POST['studentScarcity03'],
            "studentScarcity04"=>$_POST['studentScarcity04'],
            "studentTraveling"=>$_POST['studentTraveling'],
            "studentTimeDt"=>$_POST['studentTimeDt'],
            "studentWaterDt"=>$_POST['studentWaterDt'],
            "studentRockDt"=>$_POST['studentRockDt'],
            "studentRubberDt"=>$_POST['studentRubberDt'],
            "studentWeight"=>$_POST['studentWeight'],
            "studentHeight"=>$_POST['studentDeight'],
            "studentBlood"=>$_POST['studentBlood'],
            "studentFamily"=>$_POST['studentFamily'],
            "studentOlderBorthers"=>$_POST['studentOlderBorthers'],
            "studentYoungerBorthers"=>$_POST['studentYoungBorthers'],
            "studentOlderSisters"=>$_POST['studentOlderSisters'],
            "studentYoungerSisters"=>$_POST['studentYoungerSisters'],
            "studentNumofStudyingSiblings"=>$_POST['studentNumOfStudyingSiblings'],
            "studentChildIndex"=>$_POST['studentChildIndex'],
            // ที่อยู่ตามทะเบียนบ้าน
            "psHomeIdNo"=>$_POST['psHomeIdNo'],
            "psHomeNo"=>$_POST['psHomeNo'],
            "psMoo"=>$_POST['psMoo'],
            "psSoi"=>$_POST['psSoi'],
            "psStreet"=>$_POST['psStreet'],
            "psTumbol"=>$_POST['psTumbol'],
            "psAmphur"=>$_POST['psAmphur'],
            "psProvince"=>$_POST['psProvince'],
            "psPostCode"=>$_POST['psPostCode'],
            "psTelNo"=>$_POST['psTelNo'],
            // ที่อยู่ปัจจุบันของนักเรียน
            "studentHomeIdNo"=>$_POST['studentHomeIdNo'],
            "studentHomeNo"=>$_POST['studentHomeNo'],
            "studentMoo"=>$_POST['studentMoo'],
            "studentSoi"=>$_POST['studentSoi'],
            "studentStreet"=>$_POST['studentStreet'],
            "studentTumbol"=>$_POST['studentTumbol'],
            "studentAmphur"=>$_POST['studentAmphur'],
            "studentProvince"=>$_POST['studentProvince'],
            "studentPostCode"=>$_POST['studentPostCode'],
            "studentTelNo"=>$_POST['StudentTelNo'],
            "oldSchoolName"=>$_POST['oldSchoolName'],
            "oldSchoolAmphur"=>$_POST['oldSchoolAmphur'],
            "oldSchoolProvince"=>$_POST['oldSchoolProvince'],
            "idCard"=>$_SESSION['ref1']
        );

        $data_father = array(
            "fatherTitleName"=>$_POST['fatherTitleName'],
            "fatherFirstName"=>$_POST['fatherFirstName'],
            "fatherLastName"=>$_POST['fatherLastName'],
            "fatherCifNo"=>$_POST['fatherCifNo'],
            "fatherCifType"=>$_POST['fatherCifType'],
            "fatherBlood"=>$_POST['fatherBlood'],
            "fatherEdu"=>$_POST['fatherEdu'],
            "fatherOccupation"=>$_POST['fatherOccupation'],
            "fatherJobPlace"=>$_POST['fatherJobPlace'],
            "fatherSalary"=>$_POST['fatherSalary'],
            "fatherTelNo"=>$_POST['fatherTelNo'],
            "idCard"=>$_SESSION['ref1']
        );

        $data_mother = array(
            "motherTitleName"=>$_POST['motherTitleName'],
            "motherFirstName"=>$_POST['motherFirstName'],
            "motherLastName"=>$_POST['motherLastName'],
            "motherCifNo"=>$_POST['motherCifNo'],
            "motherCifType"=>$_POST['motherCifType'],
            "motherBlood"=>$_POST['motherBlood'],
            "motherEdu"=>$_POST['motherEdu'],
            "motherOccupation"=>$_POST['motherOccupation'],
            "motherJobPlace"=>$_POST['motherJobPlace'],
            "motherSalary"=>$_POST['motherSalary'],
            "motherTelNo"=>$_POST['motherTelNo'],
            "idCard"=>$_SESSION['ref1']
        );

        $data_parent = array(
            "parentRelation"=>$_POST['parentRelation'],
            "parentTitleName"=>$_POST['parentTitleName'],
            "parentFirstName"=>$_POST['parentFirstName'],
            "parentLastName"=>$_POST['parentLastName'],
            "parentCifNo"=>$_POST['parentCifNo'],
            "parentCifType"=>$_POST['parentCifType'],
            "parentBlood"=>$_POST['parentBlood'],
            "parentEdu"=>$_POST['parentEdu'],
            "parentOccupation"=>$_POST['parentOccupation'],
            "parentJobPlace"=>$_POST['parentJobPlace'],
            "parentSalary"=>$_POST['parentSalary'],
            "parentTelNo"=>$_POST['parentTelNo'],
            "idCard"=>$_SESSION['ref1']
        );
        
        $sql_student = "UPDATE confirm_student SET 
            m1s010=:studentTitleName ,
            m1s020=:studentFirstNameTH,
            m1s030=:studentLastNameTH,
            studentFirstNameEN=:studentFirstNameEN ,
            studentLastNameEN=:studentLastNameEN,
            m1s040:=studentBirthday,
            studentRace=:studentRace,
            studentNation=:studentNation,
            studentReligion=:studentReligion,
            studentSpeakLang=:studentSpeakLang,
            studentSpeakOther=:studentSpeakOther,
            studentBornTambon=:studentBornTambon,
            studentBornAmphur=:studentBornAmphur,
            studentBornProvince=:studentBornProvince,
            studentLiveWith=:studentLiveWith,
            studentDisadvantaged=:studentDisadvantaged,
            studentScarcity01=:studentScarcity01,
            studentScarcity02=:studentScarcity02,
            studentScarcity03=:studentScarcity03,
            studentScarcity04=:studentScarcity04,
            studentTraveling=:studentTraveling,
            studentTimeDt=:studentTimeDt,
            studentWaterDt=:studentWaterDt,
            studentRockDt=:studentRockDt,
            studentRubberDt:=studentRubberDt,
            studentWeight:=studentWeight,
            studentHeight:=studentHeight,
            studentBlood:=studentBlood,
            studentFamily:=studentFamily,
            studentOlderBorthers:=studentOlderBorthers,
            studentYoungerBorthers:=studentYoungerBorthers,
            studentOlderSisters:=studentOlderSisters,
            studentYoungerSisters:=studentYoungerSisters,
            studentNumofStudyingSiblings:=studentNumofStudyingSiblings,
            studentChildIndex:=studentChildIndex,
            m1s050=:psHomeNo,
            psMoo:=psMoo,
            psSoi:=psSoi,
            m1s060:=psStreet,
            m1s070:=psTumbol,
            m1s080:=psAmphur,
            m1s090:=psProvince,
            m1s100:=psPostCode,
            m1s110:=psTelNo,
            studentHomeIdNo:=studentHomeIdNo,
            studentHomeNo:=studentHomeNo,
            studentMoo:=studentMoo,
            studentSoi:=studentSoi,
            studentStreet:=studentStreet,
            studentTumbol:=studentTumbol,
            studentAmphur:=studentAmphur,
            studentProvince:=studentProvince,
            studentPostCode:=studentPostCode,
            studentTelNo:=studentTelNo,
            m1s260:=oldSchoolName,
            m1s270:=oldSchoolAmphur,
            m1s280:=oldSchoolProvince

            WHRER m1s003=:idCard             
    "; 
    $sql_father = ""; 
    $sql_mother = ""; 
    $sql_parent = ""; 
        $data2 = array(
            "studentTitleName"=>$_POST['studentTitleName'],
            "studentFirstNameTH"=>$_POST['studentFirstNameTH'],
            "studentLastNameTH"=>$_POST['studentLastNameTH'],
            "studentFirstNameEN"=>$_POST['studentFirstNameEN'],
            "studentLastNameEN"=>$_POST['studentLastNameEN'],
            "studentBirthdayDay"=>$_POST['studentBirthdayDay'],
            "studentBirthdayMonth"=>$_POST['studentBirthdayMonth'],
            "studentBirthdayYear"=>$_POST['studentBirthdayYear'],
            "studentRace"=>$_POST['studentRace'],
            "studentNation"=>$_POST['studentNation'],
            "studentReligion"=>$_POST['studentReligion'],
            "studentSpeakLang"=>$_POST['studentSpeakLang'],
            "studentSpeakOther"=>$_POST['studentSpeakOther'],
            "studentTambon"=>$_POST['studentTambon'],
            "studentAmphur"=>$_POST['studentAmphur'],
            "studentProvince"=>$_POST['studentProvince'],
            "studentLiveWith"=>$_POST['studentLiveWith'],
            "studentDisadvantaged"=>$_POST['studentDisadvantaged'],
            "studentScarcity01"=>$_POST['studentScarcity01'],
            "studentScarcity02"=>$_POST['studentScarcity02'],
            "studentScarcity03"=>$_POST['studentScarcity03'],
            "studentScarcity04"=>$_POST['studentScarcity04'],
            "studentTraveling"=>$_POST['studentTraveling'],
            "studentTimeDt"=>$_POST['studentTimeDt'],
            "studentWaterDt"=>$_POST['studentWaterDt'],
            "studentRockDt"=>$_POST['studentRockDt'],
            "studentRubberDt"=>$_POST['studentRubberDt'],
            "studentWeight"=>$_POST['studentWeight'],
            "studentHeight"=>$_POST['studentDeight'],
            "studentBlood"=>$_POST['studentBlood'],
            "studentFamily"=>$_POST['studentFamily'],
            "studentOlderBorthers"=>$_POST['studentOlderBorthers'],
            "studentYoungerBorthers"=>$_POST['studentYoungBorthers'],
            "studentOlderSisters"=>$_POST['studentOlderSisters'],
            "studentYoungerSisters"=>$_POST['studentYoungerSisters'],
            "studentNumofStudyingSiblings"=>$_POST['studentNumOfStudyingSiblings'],
            "studentChildIndex"=>$_POST['studentChildIndex'],
            // ที่อยู่ตามทะเบียนบ้าน
            "psHomeIdNo"=>$_POST['psHomeIdNo'],
            "psHomeNo"=>$_POST['psHomeNo'],
            "psMoo"=>$_POST['psMoo'],
            "psSoi"=>$_POST['psSoi'],
            "psStreet"=>$_POST['psStreet'],
            "psTumbol"=>$_POST['psTumbol'],
            "psAmphur"=>$_POST['psAmphur'],
            "psProvince"=>$_POST['psProvince'],
            "psPostCode"=>$_POST['psPostCode'],
            "psTelNo"=>$_POST['psTelNo'],
            // ที่อยู่ปัจจุบันของนักเรียน
            "studentHomeIdNo"=>$_POST['studentHomeIdNo'],
            "studentHomeNo"=>$_POST['studentHomeNo'],
            "studentMoo"=>$_POST['studentMoo'],
            "studentSoi"=>$_POST['studentSoi'],
            "studentStreet"=>$_POST['studentStreet'],
            "studentTumbol"=>$_POST['studentTumbol'],
            "studentAmphur"=>$_POST['studentAmphur'],
            "studentProvince"=>$_POST['studentProvince'],
            "studentPostCode"=>$_POST['studentPostCode'],
            "studentTelNo"=>$_POST['StudentTelNo'],
            "oldSchoolName"=>$_POST['oldSchoolName'],
            "oldSchoolAmphur"=>$_POST['oldSchoolAmphur'],
            "oldSchoolProvince"=>$_POST['oldSchoolProvince'],
            // บิดา
            "father"=>array(
            $_POST['fatherTitleName'],
            $_POST['fatherFirstName'],
            $_POST['fatherLastName'],
            $_POST['fatherCifNo'],
            $_POST['fatherCifType'],
            $_POST['fatherBlood'],
            $_POST['fatherEdu'],
            $_POST['fatherOccupation'],
            $_POST['fatherJobPlace'],
            $_POST['fatherSalary'],
            $_POST['fatherTelNo']
            ),

            // "fatherTitleName"=>$_POST['fatherTitleName'],
            // "fatherFirstName"=>$_POST['fatherFirstName'],
            // "fatherLastName"=>$_POST['fatherLastName'],
            // "fatherCifNo"=>$_POST['fatherCifNo'],
            // "fatherCifType"=>$_POST['fatherCifType'],
            // "fatherBlood"=>$_POST['fatherBlood'],
            // "fatherEdu"=>$_POST['fatherEdu'],
            // "fatherOccupation"=>$_POST['fatherOccupation'],
            // "fatherJobPlace"=>$_POST['fatherJobPlace'],
            // "fatherSalary"=>$_POST['fatherSalary'],
            // "fatherTelNo"=>$_POST['fatherTelNo'],
            // มารดา
            "mother"=>array(
                $_POST['motherTitleName'],
                $_POST['motherFirstName'],
                $_POST['motherLastName'],
                $_POST['motherCifNo'],
                $_POST['motherCifType'],
                $_POST['motherBlood'],
                $_POST['motherEdu'],
                $_POST['motherOccupation'],
                $_POST['motherJobPlace'],
                $_POST['motherSalary'],
                $_POST['motherTelNo']

            ),
            // "motherTitleName"=>$_POST['motherTitleName'],
            // "motherFirstName"=>$_POST['motherFirstName'],
            // "motherLastName"=>$_POST['motherLastName'],
            // "motherCifNo"=>$_POST['motherCifNo'],
            // "motherCifType"=>$_POST['motherCifType'],
            // "motherBlood"=>$_POST['motherBlood'],
            // "motherEdu"=>$_POST['motherEdu'],
            // "motherOccupation"=>$_POST['motherOccupation'],
            // "motherJobPlace"=>$_POST['motherJobPlace'],
            // "motherSalary"=>$_POST['motherSalary'],
            // "motherTelNo"=>$_POST['motherTelNo'],
            
            // ผู้ปกครอง
            "parent"=>array(
            $_POST['parentRelation'],
            $_POST['parentTitleName'],
            $_POST['parentFirstName'],
            $_POST['parentLastName'],
            $_POST['parentCifNo'],
            $_POST['parentCifType'],
            $_POST['parentBlood'],
            $_POST['parentEdu'],
            $_POST['parentOccupation'],
            $_POST['parentJobPlace'],
            $_POST['parentSalary'],
            $_POST['parentTelNo']
            ),

            // "parentRelation"=>$_POST['parentRelation'],
            // "parentTitleName"=>$_POST['parentTitleName'],
            // "parentFirstName"=>$_POST['parentFirstName'],
            // "parentLastName"=>$_POST['parentLastName'],
            // "parentCifNo"=>$_POST['parentCifNo'],
            // "parentCifType"=>$_POST['parentCifType'],
            // "parentBlood"=>$_POST['parentBlood'],
            // "parentEdu"=>$_POST['parentEdu'],
            // "parentOccupation"=>$_POST['parentOccupation'],
            // "parentJobPlace"=>$_POST['parentJobPlace'],
            // "parentSalary"=>$_POST['parentSalary'],
            // "parentTelNo"=>$_POST['parentTelNo'],

        );
        echo "<pre>";
        print_r($data_student);
        echo "</pre>";
        echo "<hr>";
        echo "<pre>";
        print_r($data_father);
        echo "</pre>";
        echo "<hr>";
        echo "<pre>";
        print_r($data_mother);
        echo "</pre>";
        echo "<hr>";
        echo "<pre>";
        print_r($data_parent);
        echo "</pre>";
        
        // foreach ($data as $val => $model){
        //   echo $model . "<br>";
        //   foreach($model as $models){
        //     echo $models . "<br>";
        //   }
      
        // } 
    ?>
</body>

</html>