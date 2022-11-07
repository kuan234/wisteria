
<!DOCTYPE html>
<html lang ="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>WP Login</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="stylesheet" href="admstyle.css">
    
</head>

<body>
    <div class="fullpg">
        <div class="framebox">
            <div class="image">
                <img src ="../image/logo.png" style="padding-bottom: -20px;"alt>
            </div>
            <form action="admlogin.php" method="POST">
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
include('connection.php');
?>