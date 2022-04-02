<?php

require_once "../../config/function.php";
require_once '../../config/settings.config.php';
$spkObject = new spk();
$spkObject->spkHeader();
$ipaddress = $_SERVER['REMOTE_ADDR']; //Get user IP

?>
        <script src='spk.js'> </script>
        <link rel='stylesheet' type='text/css' href='../css/app_css.css'>
    </head>
<body>

        <div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"> <?php echo $txt["SCHOOLNAME"]; ?></h1>
                <p class="lead text-muted"><?php echo $txt["SYSTEMNAME"]; ?></p>
                <hr>
            </div>
        </div>

<div class="container-fluid text-center">
  <div class="row content">
    <?php $spkObject->spkMenu();?>
    <div class="col-sm-10 text-left">
        <h4 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><i class="fas fa-print"></i> พิมพ์เอกสารชำระเงิน</h4>
            <form class="form" method="post">
                <div class="form-group">
                    <label for="reg_card_id">เลขประจำตัวประชาชน: (#Ref. 1) </label>
                    <input type="text" class="form-control" name="reg_card_id"  required>
                </div>
                <div class="form-group">
                    <label for="mm">สมัครระดับชั้นที่สมัคร: </label>
                    <select name="mm" class="custom-select" >
                        <option value="m1_smte">ม.1 SMTE</option>
                        <option value="m1_ip">ม.1 IP หรือ IPC</option>
                        <option value="m4_smte">ม.4 SMTE</option>
                        <option value="m4_ip">ม.4 IP หรือ IPC</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-primary btn-block" type="submit" id="button-id"><i class="fas fa-search"></i> ค้นหา</button>
                </div>

            </form>
            <hr>
        <?php
if (isset($_POST['reg_card_id'])) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $tlb_tmp = $_POST['mm'];

        switch ($tlb_tmp) {
            case 'm1_smte':
                $tlb = 'm1_s';
                break;
            case 'm1_ip':
                $tlb = 'm1_ip';
                break;
            case 'm4_smte':
                $tlb = 'm4_s';
                break;
            case 'm4_ip':
                $tlb = 'm4_ip';
                break;

        }
        $sql  = "SELECT * FROM " . $tlb . " WHERE m1s003 = '" . $_POST['reg_card_id'] . "'";
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //$reg_card_id = "";
        while ($row = $stmt->fetch()) {
            echo "<h4 style='color:#043c96;text-shadow: 2px 2px 4px #000000;'> ชื่อผู้สมัคร : " . $row['m1s010'] . "" . $row['m1s020'] . " " . $row['m1s030'] . "</h4>";
            $reg_card_id = $row['m1s003'];
            //$ONetFile    = $row['file_name_6'];
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger' role='alert'>
                Error
            </div>
            ";
    }

    if (!empty($reg_card_id)) {
        $mm = $_POST['mm']; //ระดับที่สมัคร

        echo "
            <form class='form' method='post' action='../bill/payment.php'>
                <div class='form-group'>
                    <div class='custom-file'>
                        <input type='hidden' name='id_card' value=$reg_card_id>
                        <input type='hidden' name='plan' value=$mm>

                    </div>
                </div>

                <div class='form-group'>
                    <button class='btn btn-primary btn-lg btn-block ' type='submit' id='button-id'>
                        <i class='fas fa-print'></i> พิมพ์เอกสารชำระเงินชำระเงิน
                    </button>
                </div>
            </form>
            ";
    } else {

        echo "
            <div class='alert alert-info' role='alert'>
                ไม่พบผู้สมัคร
            </div>
        ";
    }

}

?>
    </div>
<?php
$spkObject->spkFooter();
?>
  </div>

</div>

</body>
</html>
