
<!DOCTYPE html>
<html lang ="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>WP Login</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="stylesheet" href="admstyle.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="fullpg">
        <div class="framebox">
            <div class="image">
                <img src ="../image/logo.png" style="padding-bottom: -20px;"alt>
            </div>
            <form action="" method="POST">
                <h3>Welcome back, Admin!</h3>
                <div class="admloginform">
                    
                    <!----use fave icon to put people---->
                    <input type="text" name="emailaddress" placeholder="Enter email address" class="frameboxform" required>
                    
                    <!----use fave icon to put email---->
                    <input type="password" name="pw" placeholder="Password" class="frameboxform"  required>
                </div>
                <br><br>
                <div class="admloginbtn">
                    <button type="submit" name="admlogin_btn">Login</button>
                    
                </div>
                <div class="forgetpw">
                    <p>"Forgot password ? "
                        <a href="forgot-pass">Click here</a>
                    </p>
                </div>

                <?php
                    // Your message code
                    include('message.php');
                    // if(isset($_SESSION['message']))
                    // {
                    //     echo '<h4 class="alert alert-warning">'.$_SESSION['message'].'</h4>';
                    //     unset($_SESSION['message']);
                    // } // Your message code
                ?>

            </form>
        </div>
    </div>
</body>
</html>

<?php
session_start();
include('connection.php');

if(isset($_POST['admlogin_btn']))
{
    $emailaddress = mysqli_real_escape_string($connect, $_POST['emailaddress']);
    $passw = mysqli_real_escape_string($connect, $_POST['pw']);

    $login_query = "SELECT * FROM `admlogin` WHERE `emailaddress`='$emailaddress' AND `pw`='$passw' LIMIT 1";
    $login_query_run = mysqli_query($connect, $login_query);      

    $count=mysqli_num_rows($login_query_run);

    if($count != 0)
    {
        $row=mysqli_fetch_assoc($login_query_run);
        $_SESSION['admin_id'] = $row['aid'];
        $_SESSION['admin_email'] = $row['email'];         
        $_SESSION['admin_password'] = $row['password'];       
        header("Location: admproducts.php");
    }
    else
    {
        echo '<script type="text/javascript">swal("Failed", "Please try again", "error");</script>';
    }
                
}          
                
            
//     if(mysqli_num_rows($login_query_run) > 0)
//     {   
//         foreach($login_query_run as $data){
//             $admin_id = $data['admid'];
//             $admin_name = $data['firstname'].' '.$data['lastname'];
//             $admin_email = $data['emailaddress'];
//             $role_as = $data["role_as"];
            
//             'admin_id'->$data['id'];
//             'admin_name'->$data['name'];  
//             'admin_email'->$data['email'];
//             'role_as'->$data['role_as'];
            
//         }
//         $_SESSION['auth'] = true;
//         $_SESSION['auth_role'] = "$role_as"; //1-SuperAdmin, 0-Admin
//         $_SESSION['auth_admin'] = 
//         [ 'admin_id'->$admin_id,
//           'admin_name'->$admin_name,
//           'admin_email'->$admin_email,];
        
//         if($_SESSION['auth_role'] == '1')   //1-Super Administrator
//         {
//             $_SESSION['message'] = "Welcome to Admin Dashboard";
//             header("Location: admproducts.php");
//             exit(0);
//         }
//         elseif($_SESSION['auth_role'] == '0')    //0-Admin
//         {
//             $_SESSION['message'] = "You are successfully logged in.";
//             header("Location: admproducts.php");
//             exit(0);
//         }
//     }
//     else
//     {
//         $_SESSION['message'] = "Invalid Emaill address or Password!";
//         header("Location: adminlogin.php");
//         exit(0);
//     }
// }
// else
// {
//     $_SESSION['message'] = "You are not allowed to access this file";
//     header("Location: adminlogin.php");
//     exit(0);
// }

?>
?>