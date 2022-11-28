<?php
session_start();
$connect = mysqli_connect("localhost","root","","wisteria");

if(!$connect)
{
    echo("Failed to connect database.");
}


?> 

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Responsive Registration Form</title>
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0"/>
        <link rel= "stylesheet" href= "registration.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>
    <body>
        <div class="backtomain" name="backtomainpage"><a href="login.php">Login</a></div>
        <div class="container">
        <h1 class="form-title">Registration</h1>
        <form method="POST">
            <div class="main-user-info">
                <div class="user-input-box">
                    <label for="email">Email</label>
                    <input type="email"
                             id="email"
                             name="uemail"
                             placeholder="Enter Email"/>
                </div>
                <div class="user-input-box">
                    <label for="password">Password</label>
                    <input type="password"
                             id="password"
                             name="upassword"
                             placeholder="Enter Password"/>
                </div>
            </div>
            
            <div class="form-submit-btn">
                <input type="submit" name="submit" value="Register">
            </div>

            
            <!-- <div class="form-submit-btn">
                <input type="Login" name="submit" value="Login">
            </div> -->
        </form>   
        </div>

        <?php
        if(isset($_POST['submit']))
        {
            $password =$_POST["upassword"];
            $email =$_POST["uemail"];
            $select = mysqli_query($connect, "SELECT * from `user_reg` where `email` = '$email'");

            if(mysqli_num_rows($select)>0){
                echo '<script type="text/javascript">swal("Failed", "Please change another email!", "error");</script>';
            }
            else{
                //insert into database
                mysqli_query($connect,"INSERT INTO `user_reg`( `email`,`password`) values('$email','$password')");
          
                ?>
                <script>
                    swal({
                        title: "Success!",
                        text: "Redirecting in 2 seconds.",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                        }, function(){
                            window.location.href = "login.php";
                        });
                </script>
                <?php
                
            }
           

            
        }

    ?>

    </body>
</html>