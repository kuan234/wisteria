<?php
session_start();
$connect = mysqli_connect("localhost","root","","wisteria");
include('php/header.php');

if(!$connect)
{
    echo("Failed to connect database.");
}
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($email, $verify_token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;
    $mail->isSMTP();   
      
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;  
    $mail->Username = 'kuanzhesheng02@gmail.com';
    $mail->Password = 'culiopxhvjtqfkaq';

    $mail->SMTPSecure = 'ssl';   
    $mail->Port = 465;

    $mail->setFrom('kuanzhesheng02@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification from Wisteria';

    $email_template = "
        <h2>You have Registered In Wisteria</h2>
        <h4>Click the link to Verify your email address to login with the below given link</h4>
        <br /><br />
        <a href='http://localhost/FYP_Project/verify-email.php?token=$verify_token'> Click Me to Verify Email</a>
    ";

    $mail->Body = $email_template;
    $mail->send();
    //echo 'Message has been sent';

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
        <script src="script.js"></script>
    </head>
    <body > 
        <main>
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
                <div class="user-input-box">
                    <label for="password">Confirm Password</label>
                    <input type="password"
                             id="cpassword"
                             name="cpassword"
                             placeholder="Enter Password" required/>
                </div>

                <div class="password_required">
                    <ul>
                        <li class = 'length'><span></span>At Least 8 Character</li>
                        <li class = 'lowercase'><span></span>One Lower Letter</li>
                        <li class = 'uppercase'><span></span>One Capiter Letter</li>
                        <li class = 'number'><span></span>One Number</li>
                        <li class = 'special'><span></span>One Special Character</li>
                    </ul>
                </div>

            </div>
            
            <div class="form-submit-btn">
                <input class="input_submit" type="submit" name="submit" value="Register">
            </div>

            
            <p><a href="login.php">Already have an account? Login!</a></p>

            
            <!-- <div class="form-submit-btn">
                <input type="Login" name="submit" value="Login">
            </div> -->
        </form>   
        </div>

        <?php
        if(isset($_POST['submit']))
        {
            $name = "kuan";
            $password =$_POST["upassword"];
            $email =$_POST["uemail"];
            $confirmp = $_POST['cpassword'];
            $select = mysqli_query($connect, "SELECT * from `user_reg` where `email` = '$email'");
            $verify_token = md5(rand());
            
            if(mysqli_num_rows($select)>0){
                echo '<script type="text/javascript">swal("Email already Exists", "Please change another email!", "error");</script>';
            }
            else if($confirmp!=$password )
            {
                echo '<script type="text/javascript">swal("Wrong", "Confirm Password Must Same with password", "error");</script>';
            }
            else{
                //insert into database
                mysqli_query($connect,"INSERT INTO `user_reg`( `email`,`password`,`token`) values('$email','$password','$verify_token')");
          
                ?>
                <script>
                    swal({
                        title: "Success!",
                        text: "Please Check Your Email For Verify Purpose",
                        type: "success",
                        timer: 3000,
                        showConfirmButton: false
                        }, function(){
                            window.location.href = "login.php";
                        });
                </script>
                <?php
                sendemail_verify("$email","$verify_token");
            }
           

            
        }

    ?>
    <script src="script.js"></script>
    </main>
    </body>
</html>