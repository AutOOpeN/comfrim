<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ระบบรับนักเรียน โรงเรียนสตรีภูเก็ต</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="../js/spk.js"></script>
    <body>
        <section class="jumbotron text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 class="jumbotron-heading">ระบบรับนักเรียน โรงเรียนสตรีภูเก็ต </h1>


            </div>
        </section>

        <div class="container">
    <?php

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM m4_ip");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    while ($row = $stmt->fetch()) {
        $string_tmp = $row['m1s010'] . $row['m1s020'] . $row['m1s030'] . "<img src='../file1/" . $row['file_name_1'] . "' width='80' height='80'><img src='../file2/" . $row['file_name_2'] . "' width='80' height='80'><br> ";
        echo $string_tmp;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

        </div>
        <hr>
        <footer class="footer">
            <div class="container">
                <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368 </p>
                <p></p>
            </div>
      </footer>
    </div>


    </body>

</html>
