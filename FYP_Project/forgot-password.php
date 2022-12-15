<?php
session_start();
include('connection.php');


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($email,$password)
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
        <h2>Forgot Password</h2>
        <h4>New Password has been updated. Please use this password to login your account.</h4>
        <br /><br />
        New Password : <b>$password<b>
    ";

    $mail->Body = $email_template;
    $mail->send();
    //echo 'Message has been sent';

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

</head>
<body class="login-page" style="min-height: 320px;">
<style>

.login-logo,
.register-logo {
  font-size: 2.1rem;
  font-weight: 300;
  margin-bottom: .9rem;
  text-align: center;

  a {
    color: gray;
  }
}

.login-page,
.register-page {
  align-items: center;
  background-color:#f2f6fc;
  display: flex;
  flex-direction: column;
  height: 100vh;
  justify-content: center;
}

.login-box,
.register-box {
  width: 360px;
}
  .card {
    margin-bottom: 0;
  }


.login-card-body,
.register-card-body {
  background-color: $white;
  border-top: 0;
  color: #666;
  padding: 20px;
}
  .input-group {
    .form-control {
      border-right: 0;

      &:focus {
        box-shadow: none;

        ~ .input-group-prepend .input-group-text,
        ~ .input-group-append .input-group-text {
          border-color: $input-focus-border-color;
        }
      }

      &.is-valid {
        &:focus {
          box-shadow: none;
        }

        ~ .input-group-prepend .input-group-text,
        ~ .input-group-append .input-group-text {
          border-color: $success;
        }
      }

      &.is-invalid {
        &:focus {
          box-shadow: none;
        }

        ~ .input-group-append .input-group-text {
          border-color: $danger;
        }
      }
    }

    .input-group-text {
      background-color: transparent;
      border-bottom-right-radius: $border-radius;
      border-left: 0;
      border-top-right-radius: $border-radius;
      color: #777;
      transition: $input-transition;
    }
  }


.login-box-msg,
.register-box-msg {
  margin: 0;
  padding: 0 20px 20px;
  text-align: center;
}

.social-auth-links {
  margin: 10px 0;
}



    </style>


        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="homepage.php" class="h1"><b>Wisteria</b></a>
                </div>

                <div class="card-body">
                    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name = "email" class="form-control" placeholder="Email" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" name="submitbtn" class="btn btn-primary btn-block">Request new password</button>
                                </div>

                            </div>
                        </form>

                    <p class="mt-3 mb-1">
                       <a href="login.php">Login</a>
                    </p>
            </div>

            </div>
        </div>

        <?php
        if(isset($_POST['submitbtn'])){
            $email = $_POST['email'];
            $password = md5(rand());

            $checkemail = "SELECT * from user_reg WHERE `email` = '$email' && `verify_status` = 1";
            $result = mysqli_query($connect,"$checkemail");
            if(mysqli_num_rows($result)>0)
            {
                mysqli_query($connect,"UPDATE `user_reg` SET `password` = '$password' where `email` = '$email'");
                sendemail_verify($email,$password);
                echo '<script type="text/javascript">swal("Success","Get Your New Password In Email!","success");</script>';
            }
            else
            {
                echo '<script type="text/javascript">swal("Wrong","Email not exists","error");</script>';
            }
        }
        ?>
</body>
</html>