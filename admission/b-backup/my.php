<?php

require_once "config/function.php";
require 'config/settings.config.php';
//require dirname(__FILE__) . "/src/PDO.class.php";
//$DB        = new Db(DBHost, DBPort, DBName, DBUser, DBPassword);
$spkObject = new spk();
$spkObject->spkHeader();

?>
<link rel='stylesheet' type='text/css' href='css/app_css.css'>
	</head>
<body>
	<?php
function dieR($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    die();
}

/*
$re = $DB->query("SELECT * FROM amphur");
//dieR($re);
foreach ($re as $row) {
echo $row['AMPHUR_ID'] . "->" . $row['AMPHUR_NAME'];
echo '<hr>';
}

try {
$DB->beginTransaction();
var_dump($DB->inTransaction()); // print "true"
$DB->commit();
} catch(Exception $ex) {
// handle Error
$DB->rollBack();
}
 */

//var_export($DB->query("lock tables my write"));
//$re = $DB->query("INSERT INTO my(name,suname) VALUES(?,?)", array("ทะเล", "สีคราม")); //Parameters must be ordered

//var_export($DB->query("show full processlist"));
//var_export($DB->query("unlock tables"));

//$queryC = $DB->querycount;
//echo $queryC;
//$re = $DB->query("INSERT INTO my(id,name,suname) VALUES(?,?,?)", array(1, "mango", "yellow")); //Parameters must be ordered
//$DB->query("INSERT INTO fruit(id,name,color) VALUES(:id,:name,:color)", array("color"=>"yellow","name"=>"mango","id"=>null));//Parameters order free
/*ervername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";
 */
$condb = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
$condb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$condb->beginTransaction();
$condb->exec('LOCK TABLES my WRITE');
$sql = "INSERT INTO my(name,suname) VALUES ('ท้องฟ้า','สีฟ้า')";
$condb->exec($sql);
$condb->commit();
$condb->exec('UNLOCK TABLES');

$spkObject->spkFooter();
?>
</body>
<html>