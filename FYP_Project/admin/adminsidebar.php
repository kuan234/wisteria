<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!---icon--->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!---stylesheet-->
    <link rel="stylesheet" href="style.css">
</head>

<body> 
            <!-----navbar----->
            <!---nav class = "navbar">
            <h4>Admin Dashboard</h4>
                <div class = "profile">
                    <span class = "fas fa-search" style="margin-left:-120px"></span>
                    <img class = "profile-image" src="https://picsum.photos/200/200?random=7">
                    <p class = "profile-name">Admin 1</p>
                    <a href = "logout.php"><span class ="fas fa-lock"><p>Logout</p></span></a>
                </div>
            </nav---->

            <!------sidebar------>
            <div class="container">
                    <img src="./image/logo.png" width="180px">
                    <h3>Wisteria<span class="lgreen;">&nbsp;Plant</span></h3>
                <!---?php include('message.php');?-->
                              
                    <div class = "sidebar-menu">
                        <a href="#">
                            <span class="material-symbols-rounded">grid_view</span>
                            <h3>Dashboard</h3>
                        </a>
                    </div>

                    <div class = "sidebar-menu">
                        <a href="#">
                            <span class="material-symbols-rounded">notifications_active</span>
                            <h3>Notifications</h3>
                            <!---check how to dynamic count-->
                            <span class="notification-count"></span>
                        </a>
                    </div>

                    <div class = "sidebar-menu">
                        <a href="#">
                            <span class="material-symbols-rounded">group</span>
                            <h3>Customers</h3>
                        </a>
                    </div>

                    <div class = "sidebar-menu">
                        <ul>
                                <a href="#"><span class="material-symbols-rounded">potted_plant</span>
                                <h3>Products</h3></a>
                                <li><a href="addcate.php">Add Category</li>
                                <li><a href="viewcate.php">View Category</li>
                                <li><a href="admproducts.php">Add Product</li>
                        </ul>
                    </div>

                    <div class = "sidebar-menu">
                        <span class="material-symbols-rounded">receipt_long</span>
                        <h3>Orders</h3>
                    </div>

                    <div class = "sidebar-menu">
                        <span class="material-symbols-rounded">manage_accounts</span>
                        <h3>Staff</h3>
                    </div>

                    <div class = "sidebar-menu">
                        <span class="material-symbols-rounded">monitoring</span>
                        <h3>Reports</h3>
                    </div>

                    <div class = "sidebar-menu">
                        <span class="material-symbols-rounded">settings</span>
                        <h3>Settings</h3>
                    </div>

                    <div class = "sidebar-menu">
                        <span class="material-symbols-rounded">logout</span>
                        <h3>Logout</h3>
                    </div>
            </div>
</body>

</html>
