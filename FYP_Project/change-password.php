<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="icon" href="image/logo.png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <?php
        include('php/header.php');
    ?>
<style>
    body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}

.row{
    justify-content:space-around;
}

.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}


.password_required
{
    display: none;
}

.password_required ul
{
    padding: 0;
    margin: 0 0 15px;
    list-style: none;
}

.password_required ul li
{
    margin-bottom: 8px;
    color: red;
    font-weight: 700;
}

.password_required ul li.active
{
    color:#29ff5e;
}

.password_required ul li span::before
{
    content:"✖ ";
}

.password_required ul li.active span::before
{
    content:"✔ ";
    
}

.card-body button{
    cursor: pointer;
    pointer-events: none;
}

.card-body button.active{
    pointer-events: auto;
}

    </style>

<div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
        <a class="nav-link  ms-0" href="edit-profile.php" target="__blank">Profile</a>
        <a class="nav-link" href="order.php" target="__blank">History</a>
        <a class="nav-link active" href="change-password.php" target="__blank">Password</a>
        
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method='POST'>
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="currentPassword" type="password" placeholder="Enter current password" required>
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" id="password" name="newPassword" type="password" placeholder="Enter new password" onfocus="passwordvalidation()" required>
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="confirmPassword" type="password" placeholder="Confirm new password" required>
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

                            <button class="input_submit btn btn-primary" name="change-password" type="submit">Save</button>
                        </form>
                    </div>
                </div>

                <?php
                include('connection.php');

                if(isset($_POST['change-password']))
                {
                    $sid = $_SESSION["user_id"];
                    $currentp = $_POST['currentPassword'];
                    $newp = $_POST['newPassword'];
                    $confirmp = $_POST['confirmPassword'];

                    $result =mysqli_query($connect,"SELECT * FROM user_reg WHERE `uid` = '$sid'");
                    $count=mysqli_num_rows($result);
                    if($count != 0)
                    {
                        $row=mysqli_fetch_assoc($result);

                            //validation 
                            if($currentp === $row['password'])
                            {

                                if($newp === $confirmp && $newp!=$row['password'])
                                { 
                                    $change_pass = mysqli_query($connect, "UPDATE `user_reg` SET `password` = '$newp' WHERE `uid` = '$sid'");
                                    echo '<script type="text/javascript">swal("Successfully!", "Password Updated", "success");</script>';
                                }
                                if($newp==$row['password'])
                                {
                                    echo '<script type="text/javascript">swal("Wrong", "New password Cannot Same with Current Password", "error");</script>';
                                }

                                if($newp!=$currentp && $confirmp != $newp )
                                {
                                    echo '<script type="text/javascript">swal("Wrong", "Confirm Password Wrong", "error");</script>';
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">swal("Wrong", "Current Password Wrong", "error");</script>';
                            }
                    }
                }

                ?>
                <script src="script.js"></script>
</body>
</html>