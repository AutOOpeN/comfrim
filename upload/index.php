<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
if (isset($_FILES['userfile'])) {
    preR($_FILES);
    move_uploaded_file($_FILES['userfile']['tmp_name'], 'upload_images/' . $_FILES['userfile']['name']);

}
if (isset($_POST['ID'])) {
    if (isValidNationalId($_POST['txtID'])) {
        echo $_POST['txtID'] . "  OK";
    } else {
        echo $_POST['txtID'] . "  NOT";
    }
}
function preR($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function isValidNationalId(string $nationalId)
{
    if (strlen($nationalId) === 13) {
        $digits    = str_split($nationalId);
        $lastDigit = array_pop($digits);
        $sum       = array_sum(array_map(function ($d, $k) {
            return ($k + 2) * $d;
        }, array_reverse($digits), array_keys($digits)));
        return $lastDigit === strval((11 - $sum % 11) % 10);
    }
    return false;
}
?>
<body>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="userfile" />
		<input type="submit" value="Upload">
	</form>
	<form action="" method="POST">
		<input type="text" name="txtID">
		<input type="submit" name="ID" value="ตรวจสอบ">
	</form>
</body>
</html>
<?php

;
