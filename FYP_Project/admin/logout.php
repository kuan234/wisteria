<?php
session_start();

    //session_destroy();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_role']); //1-administrator, 0-staff
    unset($_SESSION['editid']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_password']);

    $_SESSION['message'] = "Logged out Successfully";
    header("Location: adminlogin.php");
    

?>