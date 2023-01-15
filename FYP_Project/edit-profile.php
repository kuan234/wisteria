<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
        die;
    }
    else
    {
        $sid = $_SESSION['user_id']; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<?php

if(isset($_FILES["image"]["name"])){
     

    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)){
      echo
      "
      <script>
        alert('Invalid Image Extension');
        
      </script>
      ";
    }
    elseif ($imageSize > 1200000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
        
      </script>
      ";
    }
    else{
      $newImageName = $imageName; // Generate new image name
      //move_uploaded_file($tmpName, './image/' .$newImageName);
      $fnm = $_FILES["image"]["name"];
      $dst="./image/upload_image/" .$fnm;
      move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
      $query = "UPDATE user_info SET user_image = '$newImageName' WHERE `user_id` = $sid";
      mysqli_query($connect, $query);
      echo '<script type="text/javascript">swal("Saved","","success");</script>';
    }
  }

//update profile 
if(isset($_POST['savebtn']))
    {
        $uname = $_POST['username'];
        $uaddress = $_POST['address'];
        $ustate = $_POST['state'];
        $ucity = $_POST['city'];
        $upostcode = $_POST['postcode'];
        $uphone = $_POST['phone'];
        $ubirthday = $_POST['birthday'];
        

        // $fnm = $_FILES["upload_image"]["name"];
        // $dst="./image/" .$fnm;
        // $dst1=$fnm;
        // move_uploaded_file($_FILES["upload_image"]["tmp_name"],$dst);

        // mysqli_query($connect,"UPDATE `user_info` SET `username` = '$uname', `address` = '$uaddress', `phone` = '$uphone' WHERE `user_id` = '$id'");
        //mysqli_query($connect,"UPDATE `user_reg` SET `email` = $uemail WHERE `uid` = '$id'");
        $work = mysqli_query($connect," UPDATE `user_info` SET `username`='$uname',`address`='$uaddress',`state`='$ustate',`city`='$ucity',`postcode`='$upostcode',`phone`='$uphone',`birthday`='$ubirthday',`user_id`='$sid' WHERE `user_id` = '$sid'");
        // $change_email = mysqli_query($connect, "UPDATE `user_reg` SET `email` = '$uemail' WHERE `uid` = '$sid'");

        echo '<script type="text/javascript">swal("Saved", "New Record Saved", "success");</script>';        
        
    }
    ?>


    <style>
        body{
            margin-top:20px;
            background-color:#f2f6fc;
            color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
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

.input-group{
    margin-right :-1px;
}

.input-group-text{
    padding: 0.6rem 1.0rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    border-radius: 0.25rem;

}

        </style>
    

<?php 
    $sid = $_SESSION['user_id'];
    $result = mysqli_query($connect,"SELECT * from `user_reg` where `uid` = '$sid'");

                            if(mysqli_num_rows($result) > 0)
                            {
                                while($e = mysqli_fetch_assoc($result)){
                                $email = $e['email'];
                                }
                            }
    $info= mysqli_query($connect,"SELECT * FROM `user_info` WHERE `user_id` = '$sid'");
    if(mysqli_num_rows($info) < 1)
    {
        mysqli_query($connect, "INSERT INTO `user_info`(`user_id`,`phone`) value('$sid','01123456789')");
    }
    
    include('php/header.php');

    $select_info = mysqli_query($connect,"SELECT * FROM `user_info` WHERE `user_id` = '$sid'");
    

    if(mysqli_num_rows($select_info) > 0)
    {
        while($row = mysqli_fetch_assoc($select_info)){
        ?>




<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="edit-profile.php" target="__blank">Profile</a>
        <a class="nav-link" href="order.php" target="__blank">History</a>
        <a class="nav-link" href="change-password.php" target="__blank">Security</a>
        
    </nav>
    <hr class="mt-0 mb-4">
    <form method='POST' id='upload_image' enctype="multipart/form-data">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="./image/upload_image/<?php echo $row['user_image']; ?>" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input class="btn btn-primary" name="image" id="image" type="file" accept=".jpg, .jpeg, .png">

                </div>
            </div>
        </div>
        </form>

        <!-- Upload new image -->
        <script type="text/javascript">
            document.getElementById("image").onchange = function(){
            document.getElementById("upload_image").submit();
            };
        </script>


<?php
    
    ?>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">


                    <form method='POST' >
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Full Name</label>
                            <input class="form-control" name="username" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $row['username'];?>">
                        </div>
                        <!-- Form Row-->
                        <!-- <div class="row gx-3 mb-3">
                             //Form Group (first name)
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                            </div>
                             //Form Group (last name)
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                            </div>
                        </div> -->
                        <!-- Form Row        -->
                        <div class="mb-3">
                            <!-- Form Group (location)-->
                            
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <input class="form-control" name="address" id="inputLocation" type="text" placeholder="No x, Jalan XXX, Taman XXX" value="<?php echo $row['address'];?>">
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                            <label class="small mb-1" for="state">State</label>
                            <input class="form-control" type="text" name="state"  placeholder="Enter Your State" value="<?php echo $row['state'];?>">
                            </div>
                            <div class="col-md-4">
                            <label class="small mb-1" for="city">City</label>
                            <input class="form-control" type="text" name="city" placeholder="Enter Your City" value="<?php echo $row['city'];?>">
                            </div>
                            <div class="col-md-4">
                            <label class="small mb-1" for="postcode">Postcode</label>
                            <input class="form-control" type="text" id="postcode" name="postcode" pattern="[0-9]{5}" title="Only contain 5 digit" placeholder="Enter Your Postcode" value="<?php echo $row['postcode'];?>"  >
                            </div>
                        </div>

                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" name="email" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="
                            <?php                           
                            echo $email;
                            ?>" disabled>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+60</span>
                                </div>
                                <input class="form-control" name="phone" id="inputPhone" type="tel" placeholder="Enter your phone number" pattern="[0-9]+" title="Only Number Accepted" minlength="9" maxlength="10" value="<?php echo $row['phone'];?>">
        </div>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <!-- <label class="small mb-1" for="inputBirthday">Birthday</label> -->
                                <input class="form-control" name="birthday" id="inputBirthday" type="hidden" name="birthday" placeholder="Enter your birthday(yyyy-MM-dd)" value="<?php echo $row['birthday'];?>">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" name="savebtn" type="submit">Save changes</button>
                        <!-- <a class="btn btn-primary" href="logout.php" role="button">Log Out</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        }
    }

?>

</body>
</html>


    