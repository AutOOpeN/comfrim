<?php
    session_start();
    if (!isset($_SESSION['admin_level'])) {
        header("Location: login.php");
        exit;
    }
    
    if (isset($_SESSION['LAST_ACTIVITY']) && (time()- $_SESSION['LAST_ACTIVITY'] > 1800)) {
        session_start();
        //session_unset();
        session_destroy();
        header("Location: login.php");
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
require "../config/function.php";
require '../config/settings.config.php';


$spkObject = new spk();
$spkObject->spkHeader($strEducationYear);
?>
<script src='spk.js'> </script>
<link rel='stylesheet' type='text/css' href='../css/app_css.css'>

</head>

<body>


    <div class=" text-center">
        <img src="../../spkimg/head1.gif" class="img-fluid pull-center">
        <div class="container">
            <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><?php echo $txt['SCHOOLNAME']; ?> </h1>
            <p class="lead text-muted"><?php echo $txt['SYSTEMNAME']; ?></p>
            <hr>

            <form  action="" method="post">
                <input class="form-control form-control" type="text"  name="talent" placeholder="ความสามารถพิเศษ: ">
                <button type="submit" class=" btn btn-primary">เพิ่ม</button>
            </form>

            
            <table class="table table-striped">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </thead>
                <?php
                    $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
                    $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    if (isset($_POST['talent'])) {
                        try{
                            $sql = "INSERT INTO StudentTalent(student_talent_name) VALUES (:name)";
                            $execInsert = $condb->prepare($sql);
                            $execInsert->execute(array(':name'=> $_POST['talent']));

                        } catch (PDOException $e) {
                            echo $e -> getMessage();
                        }
                    }else{

                    }

                if (isset($_POST['del'])) {
                    try{
                        $stmt = $condb->prepare('DELETE FROM StudentTalent WHERE student_talent_id = :talent_id');
                        $stmt->execute(array(':talent_id'=>$_POST['talent_id']));
                    } catch (PDOException $e) {
                        echo $e -> getMessage();
                    }
                }       
            
                try {
                    $stmt = $condb->prepare("SELECT * FROM StudentTalent");
                    $stmt->execute();
                    $i=1;
                    while ($row = $stmt->fetch()) {
                        echo "<tr> <th scope='row'>$i</th>";
                        echo "<td>$row[1]</td>";
                        echo "<td>
                                <form method='post'>
                                    <input type='hidden' value='$row[0]' name='talent_id'>
                                    <button type='submit' name='del' class='btn btn-danger'  onclick='return confirm('Are you sure to delete?')' ><i class='fas fa-trash'></i></button>
                                </form>
                                </td> </tr>";
                        $i++;
                    }
                } catch (PDOException $e) {
                    echo $e -> getMessage();
                }
            ?>

            </table>

        </div>
    </div>
    <?php
        $spkObject->spkFooter();
        

        
    ?>
</body>

</html>