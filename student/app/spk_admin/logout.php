<?php
session_start();
unset($_SESSION['admin_confirm']);
header("Location:login.php");
?>