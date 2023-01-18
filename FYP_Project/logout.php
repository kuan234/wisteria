<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_email']);
unset($_SESSION['user_password']);
header("location:index.php");
?>