<?php
session_start();
include('connection.php');

if(isset($_POST['admlogin_btn']))
{
    $emailaddress = mysqli_real_escape_string($connect, $_POST['emailaddress']);
    $pw = mysqli_real_escape_string($connect, $_POST['pw']);

    $login_query = "SELECT * FROM admlogin WHERE email='$emailaddress' AND password='$pw' LIMIT 1";
    $login_query_run = mysqli_query($connect, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {   
        foreach($login_query_run as $data){
            'admin_id'->$data['id'];
            'admin_name'->$data['name'];  
            'admin_email'->$data['email'];
            'role_as'->$data['role_as'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; //1-administrator, 0-staff
        $_SESSION['auth_admin'] = 
        [ 'admin_id'->$admin_id,
          'admin_name'->$admin_name,
          'admin_email'->$admin_email,];
        
        if($_SESSION['auth_role'] == '1')   //1-administrator
        {
            $_SESSION['message'] = "Welcome to Admin Dashboard";
            header("Location: adminindex.php");
            exit(0);
        }
        elseif($_SESSION['auth_role'] == '0')    //0-user
        {
            $_SESSION['message'] = "You are successfully logged in.";
            header("Location: adminlogin.php");
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