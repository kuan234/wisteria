<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Dropdown Menu Using Html CSS & Vanilla Javascript</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
</head> 
<body>

<style>
    *{
    font-family: "poppins", sans-serif;
    margin: 0;
    padding: 0;
}
body{
    background-color: #333;
    height: 100vh;
}
.icons-size{
    color: #333;
    font-size: 14px;
}
.action{
    position: fixed;
    right: 30px;
    top:20px
}
.action .profile{
    border-radius: 60%;
    cursor: pointer;
    height: 60px;
    overflow: hidden;
    position: relative;
    width: 60px;
}
.action .profile img{
    width: 100%;
    top:0;
    position: absolute;
    object-fit: cover;
    left: 0;
    height: 100%;
}
.action .menu{
    background-color:#FFF;
    box-sizing:0 5px 25px rgba(0,0,0,0.1);
    border-radius: 15px;
    padding: 10px 20px;
    position: absolute;
    right: -10px;
    width: 200px;
    transition: 0.5s;
    top: 120px;
    visibility: hidden;
    opacity: 0;
}
.action .menu.active{
    opacity: 1;
    top: 80px;
    visibility: visible;
}
.action .menu::before{
    background-color:#fff;
    content: '';
    height: 20px;
    position: absolute;
    right: 30px;
    transform:rotate(45deg);
    top:-5px;
    width: 20px;
}
.action .menu h3{
    color: #555;
    font-size: 16px;
    font-weight: 600;
    line-height: 1.3em;
    padding: 20px 0px;
    text-align: left;
    width: 100%;
}
.action .menu h3 div{
    color: #818181;
    font-size: 14px;
    font-weight: 400;
}
.action .menu ul li{
    align-items: center;
    border-top:1px solid rgba(0,0,0,0.05);
    display: flex;
    justify-content: left;
    list-style: none;
    padding: 10px 0px;
}
.action .menu ul li img{
    max-width: 20px;
    margin-right: 10px;
    opacity: 0.5;
    transition:0.5s
}
.action .menu ul li a{
    display: inline-block;
    color: #555;
    font-size: 14px;
    font-weight: 600;
    padding-left: 15px;
    text-decoration: none;
    text-transform: uppercase;
    transition: 0.5s;
}
.action .menu ul li:hover img{
    opacity: 1;
}
.action .menu ul li:hover a{
    color:#ff00ff;
}
</style>


    <div class="action">
        <div class="profile" onclick="menuToggle();">
            <img src="image/profile.png" alt="">
        </div>

        <div class="menu">
            <h3>
                User Account
                <div>
                    Operational Team
                </div>
            </h3>
            <ul>
                <li>
                    <span class="material-icons icons-size">person</span>
                    <a href="#">My Profile</a>
                </li>
                <li>
                    <span class="material-icons icons-size">receipt</span>
                    <a href="#">My Orders</a>
                </li>
                <li>
                    <span class="material-icons icons-size">shopping_cart</span>
                    <a href="#">Shopping Cart</a>
                </li>
                <li>
                    <span class="material-icons icons-size">logout</span>
                    <a href="#">Log Out</a>
                </li>
               
                <!-- <li>
                    <span class="material-icons icons-size">account_balance_wallet</span>
                    <a href="#">Wallet</a>
                </li> -->
            </ul>
        </div>
    </div>
    <script>
        function menuToggle(){
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
    </script>
</body>
</html>