<?php
    require "../../../config/settings.config.php";
    require "../../../config/function.php";
    $tbl = "room_m1";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ระบบรับนักเรียน</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../css/app_css.css">    
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
</head>

<body >



    <div class="container">
        <div class=" text-center">
            <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
                    <hr>
        </div>

            <form action="" method="post" class="form">
                <label for="room_name">ชื่อห้องสอบ: </label>
                <input type="text" id="room_name" name="room_name">
                <input type="submit" value="Submit">
            </form>
        

    <?php
    
        if (isset($_POST['room_name'])) {
            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO ". $tbl . " (r_name,r_max) VALUES (:r_name, :r_max)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ":r_name" =>  $_POST['room_name'],
                    ":r_max" =>  20  )
                );
                echo "ADD ROOM id:" . $conn->lastInsertId();
                $sql_show = "SELECT * FROM " . $tbl . " ORDER BY rid ASC";
                $stmt_show = $conn->prepare($sql_show);
                $stmt_show->execute();
                echo "<table class='table'>";
                echo "<tr><td>ลำดับที่</td><td>ชื่อห้องสอบ</td><td>จำนวนที่นั่ง</td></tr>";
                while ($row = $stmt_show->fetch()){
                    echo "<tr><td>" . $row['rid'] . "</td><td>" . $row['r_name'] . "</td><td>". $row['r_max'] ."</td></tr>";
                }
                echo "</table>";
            } catch (Exception $e){
            
                echo $e->getMessage();
            }
        }else{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql_show = "SELECT * FROM " . $tbl . " ORDER BY rid ASC";
            $stmt_show = $conn->prepare($sql_show);
            $stmt_show->execute();
            echo "<table class='table'>";
            echo "<tr><td>ลำดับที่</td><td>ชื่อห้องสอบ</td><td>จำนวนที่นั่ง</td></tr>";
            while ($row = $stmt_show->fetch()){
                echo "<tr><td>" . $row['rid'] . "</td><td>" . $row['r_name'] . "</td><td>". $row['r_max'] ."</td></tr>";
            }
            echo "</table>";
        }
        $conn = null;
    ?>
</div>
</body>


</html>