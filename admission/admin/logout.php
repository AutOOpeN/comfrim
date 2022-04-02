<?php
session_start();
unset($_SESSION['admin_level']);
header("Location:login.php");
?>