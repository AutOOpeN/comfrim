<?php
$file_name = $_FILES['filUpload']['name'];
$file_tmp  = $_FILES['filUpload']['tmp_name'];
$uploaddir = 'upload_file/';

$upFiles = move_uploaded_file($file_tmp, $uploaddir . $file_name);
if ($upFiles) {
    echo "Copy/Upload Complete<br>";

    //*** Insert Record ***//
    /*
    $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
    $objDB = mysql_select_db("mydatabase");
    $strSQL = "INSERT INTO files ";
    $strSQL .="(Name,FilesName) VALUES ('".$_POST["txtName"]."','".$_FILES["filUpload"]["name"]."')";
    $objQuery = mysql_query($strSQL);
     */

    echo "<img src='upload_file/" . $file_name . "'>";
    echo "<a href='upload_file/" . $file_name . "'>View files</a>";
} else {
    echo $_FILES["filUpload"]["error"];
}

echo "<hr>";
echo "</p>";
echo '<pre>';
echo 'debugging :';
print_r($_FILES);
print "</pre>";

/*
UPLOAD_ERR_INI_SIZE = Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.
UPLOAD_ERR_FORM_SIZE = Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.
UPLOAD_ERR_PARTIAL = Value: 3; The uploaded file was only partially uploaded.
UPLOAD_ERR_NO_FILE = Value: 4; No file was uploaded.
UPLOAD_ERR_NO_TMP_DIR = Value: 6; Missing a temporary folder. Introduced in PHP 5.0.3.
UPLOAD_ERR_CANT_WRITE = Value: 7; Failed to write file to disk. Introduced in PHP 5.1.0.
UPLOAD_ERR_EXTENSION = Value: 8; A PHP extension stopped the file upload
 */
