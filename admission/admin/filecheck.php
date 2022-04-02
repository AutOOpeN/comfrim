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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file1" id="">
        <input type="submit" value="Submit">
    </form>
    <?php
    $file01_extension = pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
    echo $file01_extension;
    if (isset($_POST['file1'])) {
        $filename = $_FILES['file1']['name'];
        echo $filename;
        echo 'file1';
    } else {
        echo 'error';
    }
    

    $allowed = array('gif', 'png', 'jpg');
$filename = $_FILES['file1']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    echo 'error2';
}


function testimage($path)
{
   if(!preg_match("/\.(png|jpg|gif)$/",$path,$ext)) return 0;
   $ret = null;
   switch($ext)
   {
       case 'png': $ret = @imagecreatefrompng($path); break;
       case 'jpeg': $ret = @imagecreatefromjpeg($path); break;
       // ...
       default: $ret = 0;
   }

   return $ret;
}

$c = get_mime_type($_POST('file1'));

echo "<br>123 $c";

function get_mime_type($file) {
	$mtype = false;
	if (function_exists('finfo_open')) {
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$mtype = finfo_file($finfo, $file);
		finfo_close($finfo);
	} elseif (function_exists('mime_content_type')) {
		$mtype = mime_content_type($file);
	} 
	return $mtype;
}
    ?>
</body>
</html>