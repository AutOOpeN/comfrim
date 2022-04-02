<?php

require_once "../../../config/function.php";
require_once '../../../config/settings.config.php';
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: ../../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: ../../login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../../../../../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../../css/app_css.css">    
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

</head>
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>


<body>
    <div class="container">
        <div class=" text-center">
        <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
                <hr>
        </div>
<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data_trun_ex_m4 = $conn->prepare("TRUNCATE TABLE ex_m4");
    $data_trun_ex_m4->execute();
    $reset_room_m4 = $conn->prepare("UPDATE room_m4 SET r_current=0 WHERE r_current >= 1  " );
    $reset_room_m4->execute();
    $sql = "SELECT * FROM m4 WHERE register_status = 3 ORDER BY id ASC";
    $data = $conn->prepare($sql);
    $data->execute();
    // echo "กำลังสร้างรายชื่อผู้มีสิทธิสอบ ชั้นมัธยมศึกษาปีที่ 4";
    // echo "<table border='1'>";

    $i = 1;
    $sql_insert = "INSERT INTO ex_m4 (ref1,ref2,ex_room) VALUES (?,?,?)";
    while ($row_data = $data->fetch()) {
        $m4_exec = $conn->prepare("SELECT * FROM room_m4 WHERE  r_current <= 19 LIMIT 1");
        $m4_exec->execute();

        while ($row_m4=$m4_exec->fetch()) {
            $tmp_rid = $row_m4['rid'];
            $tmp_room = $row_m4['r_name'];
            $tmp_current = $row_m4['r_current'] + 1;
        }
        if ($tmp_current == 20) {
            $str_sql_update = "UPDATE room_m4 SET r_status= 1, r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
        }else{
            $str_sql_update = "UPDATE room_m4 SET r_current = " . $tmp_current . " WHERE rid = " . $tmp_rid;
        }
        
        $conn ->exec($str_sql_update);
        $conn ->prepare($sql_insert)->execute([$row_data['reg_card_id'],$row_data['id'],$tmp_room]);

        // echo "<tr><td>" . $row_data['id'] . "</td><td>" . $row_data['reg_name_title'] ."</td><td>" . $row_data['reg_name'] ."</td><td>" . $row_data['reg_suname'] . "</td></tr>";

    $i++;
    }
    ?>
    <!-- Progress bar HTML -->
<div class="progress" style="height: 40px;">
    <div class="progress-bar progress-bar-striped" style="min-width: 20px;"></div>
</div>
    <?php
} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
};
// echo "</table>";
$conn = null;


?>

</div> <!-- container-->
</body>
</html>
<!-- jQuery Script -->
<script type="text/javascript">
    var i = 0;
    function makeProgress(){
        if(i < 100){
            i = i + 1;
            $(".progress-bar").css("width", i + "%").text("กำลังสร้างรายชื่อผู้มีสิทธิสอบ ชั้นมัธยมศึกษาปีที่ 4 " + i + " %");
        }else{
            window.location = "index.php";
        }
        // Wait for sometime before running this script again
        setTimeout("makeProgress()", 100);
        
    }
    makeProgress();
    
</script>