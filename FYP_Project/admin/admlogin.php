<?php
session_start();
include('connection.php');

if(isset($_POST['admlogin_btn']))
{
    $emailaddress = mysqli_real_escape_string($connect, $_POST['emailaddress']);
    $passw = mysqli_real_escape_string($connect, $_POST['pw']);

    $login_query = "SELECT * FROM `admlogin` WHERE `emailaddress`='$emailaddress' AND `pw`='$passw' LIMIT 1";
    $login_query_run = mysqli_query($connect, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {   
        foreach($login_query_run as $data){
            $admin_id = $data['admid'];
            $admin_name = $data['firstname'].' '.$data['lastname'];
            $admin_email = $data['emailaddress'];
            $role_as = $data["role_as"];
            
            'admin_id'->$data['id'];
            'admin_name'->$data['name'];  
            'admin_email'->$data['email'];
            'role_as'->$data['role_as'];
            
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; //1-SuperAdmin, 0-Admin
        $_SESSION['auth_admin'] = 
        [ 'admin_id'->$admin_id,
          'admin_name'->$admin_name,
          'admin_email'->$admin_email,];
        
        if($_SESSION['auth_role'] == '1')   //1-Super Administrator
        {
            $_SESSION['message'] = "Welcome to Admin Dashboard";
            header("Location: admproducts.php");
            exit(0);
        }
        elseif($_SESSION['auth_role'] == '0')    //0-Admin
        {
            $_SESSION['message'] = "You are successfully logged in.";
            header("Location: admproducts.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['message'] = "Invalid Emaill address or Password!";
        header("Location: adminlogin.php");
        exit(0);
    }
}
else
{
    $_SESSION['message'] = "You are not allowed to access this file";
    header("Location: adminlogin.php");
    exit(0);
}

?>