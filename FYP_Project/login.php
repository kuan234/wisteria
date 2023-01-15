<?php
session_start();
include('php/header.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login Form</title>
        
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="image/logo.png">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>

    </head>
    <body>
        <main>
        <div class="container">
        <h1 class="form-title">Login</h1>
        <form method="POST" action=''>
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="userEmail">Email</label>
                    <input type="text"
                             id="userEmail"
                             name="userEmail"
                             placeholder="Enter Email"
                             required/>
                </div>
                <div class="user-input-box">
                    <label for="password">Password</label>
                    <input type="password"
                             id="inputpassword"
                             name="upassword"
                             placeholder="Enter Password"
                             required/>
                </div>
                <div class="" style="color:white; font-size:14px "><input type="checkbox" onclick="myFunction()" style="margin-right:3px">Show Password</div>
            
            </div>
            <div class="form-submit-btn">
                <input type="submit" name="submit" value="Login">
            </div>

            <br>
            <!-- <div class="checkbox">
                <input type="checkbox" checked="checked" name="Agree"><br> I agree to the terms and condition and the privacy policy.
            </div> -->
            <br>
            <p><a href="forgot-password.php">Forgot password</a></p>
            <p>Don't have an account? <a href="registration.php">Register here</a></p>
        </form>   
        </div>

        <?php
            $connect = mysqli_connect("localhost","root","","wisteria");

            if(!$connect)
            {
                echo("Failed to connect database.");
            }

            if (isset($_POST["submit"]))
            {
                $email=$_POST["userEmail"];
                $pass=$_POST["upassword"];
                
                $sql = "SELECT * from `user_reg` where `email` = '$email' and `password` = '$pass'";
                $result = mysqli_query($connect, $sql);
                $count=mysqli_num_rows($result);

                if($count != 0)
                {
                    $row=mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row['uid'];
                    $_SESSION['user_email'] = $row['email'];         
                    $_SESSION['user_password'] = $row['password'];  
                    if($row['verify_status'] == '0')
                    {
                        echo '<script type="text/javascript">swal("Failed", "Please Verify Your Email", "warning");</script>';
                    }
                    else
                    {
                        ?>
                        <script>window.location.href="edit-profile.php";</script>
                        <?php
                    }
                }
                else
                {
                    echo '<script type="text/javascript">swal("Failed", "Please try again", "error");</script>';
                }
                
            
                
            }
        ?>
    </main>
    </body>
</html>