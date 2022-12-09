
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"> -->
    <link rel="icon" href="image/logo.png">
</head>
<body>
    <?php
    session_start();
    
    if(isset($_SESSION['user_id']))
    {  
        ?>
        <script>
                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                })

                                Toast.fire({
                                icon: 'success',
                                title: 'Signed in successfully'
                                })
                        // const Toast = Swal.mixin({
                        // toast: true,
                        // position: 'top',
                        // showConfirmButton: false,
                        // timer: 3000,
                        // timerProgressBar: true,
                        // didOpen: (toast) => {
                        //     toast.addEventListener('mouseenter', Swal.stopTimer)
                        //     toast.addEventListener('mouseleave', Swal.resumeTimer)
                        // }
                        // })

                        // Toast.fire({
                        // icon: 'success',
                        // title: 'Signed in successfully'
                        // })
          </script>
          <?php
    }

    include('php/header.php');
    ?>
    <!-- ------------Header---------------->
    <div class="header">
        <div class="container">
            <!-- <div class="navbar">
                <div class="logo">
                    <a href="homepage.php"><img src="image/logo.png" width="125px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="homepage.php">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Account</a></li>
                    </ul>
                </nav>
                <a href="#"><img src="image/cart.png" width="30px" height="30px"></a>
                <img src="image/menu.png" class="menu-icon" onclick="menutoggle()">
            </div> -->
            <div class="row">
                <div class="col-2">
                    <img src="image/page heading backgorund.PNG">
                </div> 
            </div>
        </div>
    </div>


<!---------------------------Index --------------------------------->

    <!-- --------Featured categories-----
    <div class="categories">
        <div class="row">
            <div class="col-6">
                <img src="image/Aloe_Vara.jpg">
            </div>

            <div class="col-6">
                <img src="image/Baby_Rubber.jpg">
            </div>

            <div class="col-6">
                <img src="image/Calathea.jpg">
            </div>
        </div>
    </div> -->

    <!----------Featured product------------>
    <div class="small-container">
        <h2 class="title">Featured Products</h2> 
        <div class="row">
            <div class="col-3">
                <a href="#"><img src = "image/Aloe_Vara.jpg" ></a>
                <h4>Aloe Vera</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>RM 50.00</p>
                <hr>
                <div class="cart">
                    <div class="row no-gutters">
                        <button class="btn">ADD TO CART</button>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#"><img src = "image/Baby_Rubber.jpg"></a>
                <h4>Baby Rubber</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>RM 45.00</p>
                <hr>
                <div class="cart">
                    <div class="row no-gutters">
                        <button class="btn">ADD TO CART</button>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#"><img src = "image/Calathea.jpg"></a>
                <h4>Calathea Medallion</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
                <p>RM 89.00</p>
                <hr>
                <div class="cart">
                    <div class="row no-gutters">
                        <button class="btn">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="small-container">
        <h2 class="title">Latest Products</h2> 
        <div class="row">
            <div class="col-3">
                <a href="#"><img src = "image/Marble pothos.PNG" ></a>
                <h4>Marble Pothos</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>RM 89.00</p>
                <hr>
                <div class="cart">
                    <div class="row no-gutters">
                        <button class="btn">ADD TO CART</button>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <a href="#"><img src = "image/Peace Lily.PNG"></a>
                <h4>Peach Lily</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>RM 78.00</p>
                <hr>
                <div class="cart">
                    <div class="row no-gutters">
                        <button class="btn">ADD TO CART</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="brands">
        <div class="small-container">
            <div class="row">
                <div class="col-4">
                    <img src="image/free-shipping.png">
                </div>
                <div class="col-4">
                    <img src="image/guaranteed.png">
                </div>
                <div class="col-4">
                    <img src="image/parcel.png">
                </div>
            </div>
        </div>
    </div>



    <!------------------Footer--------------->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <a href="homepage.php"><img src="image/logo.png"></a>
                </div>
                <div class="footer-col-2">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Product</a></li>
                        <li><a href="#">Feeback</a></li>
                    </ul>
                </div>
                <div class="footer-col-3">
                    <h3>Follow us</h3>
                    <ul>
                        <li><a href=""><i class="fa fa-instagram" style="font-size: 36px;"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook-square" style="font-size: 36px;"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter" style="font-size: 36px;"></i></a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="copy">
                &copy; designed by FYP - Wisteria
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