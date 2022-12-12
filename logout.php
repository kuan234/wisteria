<?php
session_start();

if(isset($_POST['logout']))
{
    //session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_role']); //1-administrator, 0-staff
    unset($_SESSION['auth_admin']);

    $_SESSION['message'] = "Logged out Successfully";
    header("Location: adminlogin.php");
    exit(0);
}

?>