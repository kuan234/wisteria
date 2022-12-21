<?php

include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="hbody">

<style>
.hbody{
    font-family: "poppins", sans-serif;
    margin: 0;
    padding: 0;
    overflow-x:hidden;
}

.icons-size{
    color: #333;
    font-size: 14px;
}
/* .haction{
    position: fixed;
    right: 30px;
    top:20px
} */
.haction .profile{
    border-radius: 60%;
    cursor: pointer;
    height: 40px;
    overflow: hidden;
    position: relative;
    width: 40px;
}
.haction .profile img{
    width: 100%;
    top:0;
    position: absolute;
    object-fit: cover;
    left: 0;
    height: 100%;
    border: 2px solid black;
}
.haction .menu{
    background-color:#FFF;
    box-sizing:0 5px 25px rgba(0,0,0,0.1);
    border-radius: 15px;
    padding: 10px 20px;
    position: absolute;
    right: -5px;
    width: 200px;
    transition: 0.5s;
    top: 120px;
    visibility: hidden;
    opacity: 0;
}
.haction .menu.active{
    opacity: 1;
    top: auto;
    visibility: visible;
    z-index:10;
}
.haction .menu::before{
    background-color:#fff;
    content: '';
    height: 20px;
    position: absolute;
    right: 80px;
    transform:rotate(45deg);
    top:-5px;
    width: 20px;
}
.haction .menu h3{
    color: #555;
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3em;
    padding: 20px 0px;
    text-align: left;
    width: 100%;
}
.haction .menu h3 div{
    color: #818181;
    font-size: 11px;
    font-weight: 400;
}

.haction .menu ul{
    margin:0;
    padding:0;
}

.haction .menu ul li{
    align-items: center;
    border-top:1px solid rgba(0,0,0,0.05);
    display: flex;
    justify-content: left;
    list-style: none;
    padding: 10px 15px;
}
.haction .menu ul li img{
    max-width: 20px;
    margin-right: 10px;
    opacity: 0.5;
    transition:0.5s
}
.haction .menu ul li a{
    display: inline-block;
    color: #555;
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    text-decoration: none;
    text-transform: uppercase;
    transition: 0.5s;
}
.haction .menu ul li:hover img{
    opacity: 1;
}
.haction .menu ul li:hover a{
    color:#ff00ff;
}
    /*--------------Header-----------*/
.header
{
    font-family: 'Poppins', sans-serif;
}

.navbar
{
    display:flex;
    align-items: center;
}

nav
{
    flex: 1;
    text-align: right;
}

nav ul
{
    display: inline;
    list-style: none;
}

nav ul li
{
    display: inline-block;
    margin-right: 20px;
}

a
{
    text-decoration: none;
    color: black;
}

.hcontainer
{
    max-width: 1500px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}

li .mnav
{
    text-decoration: none;
    color: black;
}

li .mnav:hover {
    color: #024dbc;
}

/* .row
{
    display: flex;
    justify-content: space-around;
} */

.col-2
{
    min-width: 300px;
}
.col-2 img
{
    max-width: 100%;
    height: 500px;
    width: 1120px;
    margin: auto;
}

.menu-icon
{
    width: 28px;
    margin-left: 20px;
    display: none;
}

/*-----------media query for menu--------*/
@media only screen and (max-width: 800px)
{
    nav ul
    {
        position: absolute;
        top:90px;
        left: 0;
        background: #333;
        width: 100%;
        overflow: hidden;
        transition: 0.5s;
    }

    nav ul li
    {
        display: block;
        margin-right: 80px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    nav ul li a
    {
        color:#fff;
        
    }

    .menu-icon
    {
        display: block;
        cursor: pointer;
    }
}


    </style>
    <!--------------Header---------------->
    <div class="header">
        <div class="hcontainer">
            <div class="navbar">
                <div class="logo">
                    <a href="homepage.php"><img src="image/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a class="mnav" href="homepage.php">Home</a></li>
                        <li><a class="mnav" href="product.php">Products</a></li>
                        <li><a class="mnav" href="#">About</a></li>
                        <li><a class="mnav" href="#">Contact</a></li>
                        
                    
                <li class="haction">
                
                    <div class="profile" onclick="menuToggle();">
                        <?php
                        if(isset($_SESSION['user_id']))
                        {
                            $sl = mysqli_query($connect,"SELECT * FROM `user_info` WHERE `user_id` =" .$_SESSION['user_id']);
        
                            if(mysqli_num_rows($sl) > 0)
                            {
                                while($r = mysqli_fetch_assoc($sl)){
                                    
                                    if($r['user_image'] == null)
                                    {
                                        ?>
                                        <img src="./image/profile.png" class="rounded-circle" alt="">
                                        <?php
                                    }

                                    if($r['user_image'] != null){
                                ?>
                                
                                <img src="./image/upload_image/<?php echo $r['user_image']; ?>" alt="">
                                <?php
                                    }
                                    
                                }
                            }
                            
                        }
                        else
                        {
                            ?>
                            <img src="image/profile.png" class="rounded-circle" alt="">
                            <?php
                        }


                            ?>
                    </div>

                    

                    <!------ Check User Login In or not ------>
                    <!------ If not dropdown menu display Login & Register ------>
                    <?php
                    if(isset($_SESSION['user_id']))
                    {
                    ?>
                    <div class="menu">
                    <h3>
                        <?php
                        $select_info = mysqli_query($connect,"SELECT * FROM `user_info` WHERE `user_id` =" .$_SESSION['user_id']);
        

                        if(mysqli_num_rows($select_info) > 0)
                        {
                            while($row = mysqli_fetch_assoc($select_info)){
                            
                            
                            echo $row['username'];
                            ?>
                            <div>
                            <?php
                            
                            $query1 = mysqli_query($connect,"SELECT * FROM `user_reg` WHERE `uid` =" .$_SESSION['user_id']);
            
    
                            if(mysqli_num_rows($query1) > 0)
                            {
                                while($r1 = mysqli_fetch_assoc($query1)){
                                    echo $r1['email'];
                                }
                            ?>
                            </div><?php
                            }
                            }
                        }
                        ?>
                        
                        
                    </h3>
                    <ul>
                        <li>
                            <span class="material-icons icons-size">person</span>
                            <a href="edit-profile.php">My Profile</a>
                        </li>
                        <li>
                            <span class="material-icons icons-size">receipt</span>
                            <a href="order.php">My Orders</a>
                        </li>
                        <li>
                            <span class="material-icons icons-size">shopping_cart</span>
                            <a href="cart.php">Cart</a>
                        </li>
                        <li>
                            <span class="material-icons icons-size">logout</span>
                            <a href="logout.php">Log Out</a>
                        </li>
                    
                        <!-- <li>
                            <span class="material-icons icons-size">account_balance_wallet</span>
                            <a href="#">Wallet</a>
                        </li> -->
                    </ul>
                <?php 
                }else
                {?>
                <div class="menu">
                    <h3>
                        User Account
                    </h3>
                    <ul>
                    <li>
                        <span class="material-icons icons-size">how_to_reg</span>
                        <a href="registration.php">Sign Up</a>
                    </li>
                    <li>
                        <span class="material-icons icons-size">login</span>
                        <a href="login.php">Log In</a>
                    </li>
                    
                </ul>       
                <?php } ?>
                <li>
                </ul>
    </nav>
            </div>
                <img src="image/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            
        </div>
    </div>

    <!--------Js for toggle menu-------->
    <script>
        let mi = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px"; 

        function menutoggle()
        {
            if(mi.style.maxHeight == "0px")
            {
                mi.style.maxHeight = "200px";
            }
            else
            {
                mi.style.maxHeight = "0px";
            }
        }
    </script>

<script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
    </script>

</body>
</html>