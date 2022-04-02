<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: ../../login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../../css/app_css.css">    
    

</head>

<body >



    <div class="container">
        <div class=" text-center">
            <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SYSTEMNAME"]; ?></h1>
                    <hr>
                    <div class="h3 text-center"> 
                    สร้างห้องสอบ ชั้นมัธยมศึกษาปีที่ 1 
        </div>
        </div>

        <div class="p-4">
            <a href="index.php" class="btn btn-outline-primary"> <i class="fas fa-step-backward"></i> กลับ</a>
        </div>
        <div class="text-end">
            <form method="post" action="" class="form">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delRoomModal"> <i
                        class="fas fa-trash-alt"></i> ลบห้องสอบทั้งหมด</button>
            </form>
        </div>
        <div>
            <form action="" method="post" class="form">
                <div class="mb-3">
                    <label for="room_name">ชื่อห้องสอบ: </label>
                    <input class="form-control" type="text" id="room_name" name="room_name">
                </div>
                <div class="mb-3">
                    <label for="room_name">จำนวนที่นั่ง: </label>
                    <input class="form-control" type="number" id="room_max" name="room_max">
                    <div id="RoomMaxHelp" class="form-text">จำนวนผู้เข้าสอบสูงสุดต่อห้อง</div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> เพิ่มห้องสอบ</button>
            </form>
        </div>
     


        <!-- Modal -->
        <div class="modal fade" id="delRoomModal" tabindex="-1" aria-labelledby="delRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="delRoomModalLabel">แจ้งเตือน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ต้องการลบห้องสอบทั้งหมด ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ไม่ต้องการ</button>
                        <form action="" method="post">
                            <button type="submit" name="clear-room" class="btn btn-danger">ยืนยันการลบ</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>        

    <?php
    
        if (isset($_POST['room_name']) && isset($_POST['room_max'])) {
            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO ". $tbl . " (r_name,r_max) VALUES (:r_name, :r_max)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(array(
                    ":r_name" =>  $_POST['room_name'],
                    ":r_max" =>   $_POST['room_max']  )
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
            if( isset($_POST['clear-room'])){
                $conn->exec("TRUNCATE TABLE $tbl");
            }

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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</div>
</body>


</html>