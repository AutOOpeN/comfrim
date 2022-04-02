<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
    header("Location: ../login.php");
    exit;
    }

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    session_start();
    //session_unset();
    session_destroy();
    header("Location: ../login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); 
    include("../../../config/settings.config.php");
    include_once("../../../spk/word.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="../../../../css/app_css.css"> -->
    <script src="https://kit.fontawesome.com/c4cecc381a.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>

    <title><?php echo $strTitle . " โครงการพิเศษ " . $strEducationYear; ?></title>



</head>

<body>
    <div class="container">
        <div class=" text-center">
            <img src="../../../../../spkimg/head1.gif" class="img-fluid pull-center">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;">
                <?php echo $strTitle . " โครงการพิเศษ " . $strEducationYear; ?></h1>
            <hr>

        </div>
        <div class="h3 text-center">
            สร้างห้องสอบ ชั้นมัธยมศึกษาปีที่ 1 โครงการ IP
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
        $tbl = "room_m1_ip";
        if (!empty($_POST['room_name']) and !empty($_POST['room_max'])) {

            try {
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO " . $tbl . " (r_name,r_max) VALUES (:r_name, :r_max)";
                $stmt = $conn->prepare($sql);
                $stmt->execute(
                    array(
                        ":r_name" =>  $_POST['room_name'],
                        ":r_max" =>  $_POST['room_max']
                    )
                );
                // echo "ADD ROOM id:" . $conn->lastInsertId();
                echo "<p class='text-success'>ดำเนินการเพิ่มชื่อห้อง" . $_POST['room_name'] . " จำนวนที่นั่ง  " . $_POST['room_max'] . "  สำเร็จ </p>";
                $sql_show = "SELECT * FROM " . $tbl . " ORDER BY rid ASC";
                $stmt_show = $conn->prepare($sql_show);
                $stmt_show->execute();
                echo "<div class='pt-4'>";
                echo "<span class='d-block h3 text-center shadow '>รายชื่อห้องสอบ</span>";
                echo "<table class='table mt-4'>";
                echo "<tr><td>ชื่อห้องสอบ</td><td>จำนวนที่นั่ง</td></tr>";
                while ($row = $stmt_show->fetch()) {
                    echo "<tr><td>" . $row['r_name'] . "</td><td>" . $row['r_max'] . "</td></tr>";
                }
                echo "</table>";
                echo "</div>";
            } catch (Exception $e) {

                echo $e->getMessage();
            }
        } else {

            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "<div class='pt-4'>";
            if( isset($_POST['clear-room'])){
                $conn->exec("TRUNCATE TABLE $tbl");
            }
            $sql_show = "SELECT * FROM " . $tbl . " ORDER BY rid ASC";
            $stmt_show = $conn->prepare($sql_show);
            $stmt_show->execute();            
            echo "<span class='d-block h3 text-center shadow '>รายชื่อห้องสอบ</span>";
            echo "<table class='table mt-4'>";
            echo "<tr><td>ชื่อห้องสอบ</td><td>จำนวนที่นั่ง</td></tr>";
            while ($row = $stmt_show->fetch()) {
                echo "<tr><td>" . $row['r_name'] . "</td><td>" . $row['r_max'] . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        


        ?>
    </div>




    <?php $conn = null; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>