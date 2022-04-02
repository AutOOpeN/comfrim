<?php

require "../config/function.php";
require '../config/settings.config.php';


$spkObject = new spk();
$spkObject->spkHeader();
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
            <a class="btn btn-primary" href="#" role="button">ADD</a>
            <form class="form" action="" method="post">
                <div class="form-group">
                    <label for="talent">ความสามารถพิเศษ</label>
                    <input type="text" name="talent" placeholder="">
                </div>
                <input type="submit" value="Submit">
            </form>
            <table class="table table-striped">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">action</th>
                </thead>
                <?php
                    $condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
                    $condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                    if (isset($_POST['talent'])) {
                        try{
                            $sql = "INSERT INTO StudentTalent(student_talent_name) VALUES (:name)";
                            $execInsert = $condb->prepare($sql);
                            $execInsert->execute(array(':name'=>$_POST['talent']));
                            //echo '<div>' . $condb->$lastInsertId() . '  </div>';
                            $stmt = $condb->prepare("SELECT * FROM StudentTalent");
                            $stmt->execute();
                            $i=1;
                            while ($row = $stmt->fetch()) {
                                echo "<tr> <th scope='row'>$i</th>";
                                echo "<td>$row[1]</td>";
                                echo "<td><form method='post'><input type='hidden' value='$row[0]' name='talent_id'><button type='button' class='btn btn-primary'><i class='fas fa-edit'></i> </button><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button></button></form></td> </tr>";
        
                                //echo "$i  $row[1] <form method='post'><input type='hidden' value='$row[0]' name='talent_id'><input type='submit' value='delete'></form><br>";
                                $i++;
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                    }else{
                        try {
                            $stmt = $condb->prepare("SELECT * FROM StudentTalent");
                            $stmt->execute();
                            $i=1;
                            while ($row = $stmt->fetch()) {
                                echo "<tr> <th scope='row'>$i</th>";
                                echo "<td>$row[1]</td>";
                                echo "<td><form method='post'><input type='hidden' value='$row[0]' name='talent_id'><button type='button' class='btn btn-primary'><i class='fas fa-edit'></i> </button><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i></button></button></form></td> </tr>";
        
                                //echo "$i  $row[1] <form method='post'><input type='hidden' value='$row[0]' name='talent_id'><input type='submit' value='delete'></form><br>";
                                $i++;
                            }
                        } catch (PDOException $e) {
                            echo $e;
                        }
                    }

                if (isset($_POST['talent_id'])) {
                    //$execDelete = $condb->prepare('DELETE FROM StudentTalent WHERE student_talent_id = :stu_id');
                    //$execDelete->execute(array(':stu_id' => $_POST['talent_id']));
                    //echo $execDelete->rowCount() . ' row (s) deleted';
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