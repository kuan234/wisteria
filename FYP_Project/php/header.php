<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<style>
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
    display: inline-block;
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

.container
{
    max-width: 1500px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}

.row
{
    display: flex;
    justify-content: space-around;
}

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
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="homepage.php"><img src="image/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="edit-profile.php">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.php"><img src="image/cart.png" width="30px" height="30px"></a>
                <img src="image/menu.png" class="menu-icon" onclick="menutoggle()">
            </div>
            
        </div>
    </div>

    <!--------Js for toggle menu-------->
    <script>
        let MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px"; 

        function menutoggle()
        {
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
            else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

</body>
</html>