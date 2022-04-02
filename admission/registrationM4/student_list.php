<?php

require_once "../config/function.php";
require_once '../config/settings.config.php';
//require_once "../src/PDO.class.php";
//$DB        = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);
$spkObject = new spk();
$spkObject->spkHeader($strEducationYear);
$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP

?>
<script src='spk.js'> </script>
<link rel='stylesheet' type='text/css' href='../css/app_css.css'>
</head>

<body>
    <div class=" text-center">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
            <p class="lead text-muted"><?php echo $txt["SYSTEMNAME"]; ?></p>
            <hr>
        </div>
    </div>

    <div class="container-fluid text-center">
        <div class="row content">
            <?php $spkObject->spkMenu(); ?>
            <div class="col-sm-10 text-left">
                <h4 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><?php echo $txt["HEADDERM4"] ?></h4>
                <hr />
                <table class="table table-striped">
                    <tr>
                        <th>ลำดับที่ (Ref.# 2)</th>
                        <th>ชื่อ-สกุล</th>
                        <!-- <th>เอกสาร O-NET</th> -->
                        <th>สถานะการสมัคร</th>
                    </tr>
                    <?php

                    $servername = "localhost";
                    $username   = "root";
                    $password   = ",uok8,";
                    $dbname     = "admission";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $conn->prepare("SELECT * FROM m4 ORDER BY id ASC");
                        $stmt->execute();

                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo "<tr>";

                            if ($row['id'] < 1000) {
                                if ($row['id'] < 10) {
                                    $reg_id = "000" . $row['id'];
                                } elseif ($row['id'] < 100) {
                                    $reg_id = "00" . $row['id'];
                                } else {
                                    $reg_id = "0" . $row['id'];
                                }
                            }

                            echo "<td>" . $reg_id . "</td>";

                            echo "<td>" . $row['reg_name_title'] . $row['reg_name'] . " " . $row['reg_suname'] . "</td>";
                            // if ($row['file_name_6'] == "none") {

                            //     echo "<td><a href='../O-NET/' class='text-danger'> ไม่สมบูรณ์</a> </td>";

                            // } else {
                            //     echo "<td><p class='text-success'>สมบูรณ์</p></td>";
                            // }

                            switch ($row['register_status']) {
                                case 0:
                                    $status = "<p class='text-info'>*รอการชำระเงิน</p>";
                                    break;
                                case 1:
                                    $status = "<p class='text-warning'>*เอกสารไม่สมบูรณ์(ติดต่อโรงเรียน)</p>";
                                    break;
                                case 2:
                                    $status = "<p class='text-danger'>*ขาดคุณสมบัติ</p>";
                                    break;
                                case 3:
                                    $status = "<p class='text-success'>*การสมัครสมบูรณ์</p>";
                                    break;
                            }
                            echo "<td>$status</td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;

                    ?>
                </table>

            </div>

            <?php

            $spkObject->spkFooter();
            ?>

        </div>



</body>

</html>