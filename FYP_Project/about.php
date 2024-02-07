<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

</head>
<body>
    <style>
        body{
            background-color: #f2f6fc;
        }


        /*----------------Footer--------------*/
        .footer h3
        {
            font-size: 20px;
            color: #4b6043;
            margin-bottom: 10px;
        }

        .footer h3
        {
            margin-left: 40px;
        }

        .footer-col-2,.footer-col-3
        {
            margin-top: 5px;
            text-align: center;
        }

        .footer ul
        {
            list-style: none;
        }

        .footer-col-2 li, .footer-col-3 li
        {
            padding: 10px;
        }

        .footer-col-2 a
        {
            color: #4b6043;
        }

        .footer-col-2 a:hover
        {
            text-decoration: underline;
        }

        .footer-col-3 a
        {
            color: #4b6043;
        }

        .copy
        {
            text-align: center;
        }


        .menu-icon
        {
            width: 28px;
            margin-left: 20px;
            display: none;
        }

       
    </style>

    <?php
    session_start();

    include('php/header.php');
    ?>
    <div class="container">

       <div class="container text-center mt-5">
            <div class="title-h2" >
                <h2 class="h2-title pt-5 mb-3">WHY WISTERIA PLANT ? </h2>
            </div>
            <div class="row text-center pt-5 mb-5">
                <div class="col-sm-4 ">
                    <div class="card" style="width:18rem; border:none; background-color: #f2f6fc; ">
                        <img src="./image/cup.jpg" class="card-img-top rounded-circle" alt="">
                    </div>
                    <div class="card-body mt-3" style="width:18rem">
                        <strong>Curated Design-</strong> Clueless of plant decor? Let us do the work. Each houseplant & pot pairing are carefully curated by our team. Sleek and refined design is our main goal to ensure a calm and classic look to your home.
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width:18rem; border:none;background-color: #f2f6fc;">
                        <img src="./image/soil.jpg" class="card-img-top rounded-circle" alt="">
                    </div>
                    <div class="card-body mt-3" style="width:18rem">
                        <strong>Quality Soil- </strong>We repot with premium soil mixes. Customise to fit every plant. So that you could take care of them at ease, and allowing them to thrive at your home.            
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card" style="width:18rem; border:none; background-color: #f2f6fc;">
                        <img src="./image/water-leaf.jpg" class="card-img-top rounded-circle" alt="">
                    </div>
                    <div class="card-body mt-3" style="width:18rem">
                        <strong>All the help you need-</strong> We are always happy to have new plant parents to join our community. Hence, we offer advices and care tips if you have any quiries. Together we learn.
                    </div>
                </div>
            </div>

        </div><!-- /div for display product card -->
    </div> <!-- /div for container product-->

       <div class="container mb-5">
            <div class="title-h3 text-center">
                <h3 class="h3-title pt-5 mb-3">SIMPLE GUIDES ON BUYING PLANTS </h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="col">
                        <ul style="list-style:none">
                            <li>
                                <h2 class="" style="font-size:18px"><b>Select Plant</b></p>
                                <p class="fw-light" style="font-size:16px">Determine amount of sunlight received in your plant area. From there, choose whether bright light or low light plant is suitable for your home. Not sure? Find out how to choose placement here</p>
                            </li>
                            <li>
                                <h2 class="" style="font-size:18px"><b>Delivery</b></p>
                                <p class="fw-light" style="font-size:16px">We can deliver your plants to you, or you may self pick-up in our shop. Ensure that your address is filled up to let us delivered your parcel to the address</p>
                            </li>
                        </ul>
                    </div> 
                </div>

                <div class="col">
                    <div class="col-md-6">
                        <img src="./image/still-life-789624_1920-1024x683.jpg" style="max-height:500px; max-width:500px" alt="">
                    </div>
                </div>

            </div>

            <div class="row mt-5 mb-5"></div>

           
<!-- 
            <div class="row mt-5">
                <div class="title-h4 text-center mb-5">
                    <h4>Wisteria Team</h4>
                </div>
                <div class="row">
                    <div class="col-sm-4 text-center" >
                        <img src="./image/about2.jpg" class="img rounded-circle" style="width:200px; height:200px" alt="">
                        <div class="label text-center mt-4">
                            <label for="form-label"><strong>Team Leader</strong></label><br>
                            <label for="form-label">Kuan Sheng Zhe</label>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <img src="./image/about1.jpg" class="img rounded-circle" style="width:200px; height:200px" alt="">
                        <div class="label text-center mt-4">
                            <label for="form-label"><strong>Team Member</strong></label><br>
                            <label for="form-label">Ong Chu Jing</label>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <img src="./image/about3.jpg" class="img rounded-circle" style="width:200px; height:200px" alt="">
                        <div class="label text-center mt-4">
                            <label for="form-label"><strong>Team Member</strong></label><br>
                            <label for="form-label">Liong Xin Yei</label>
                        </div>
                    </div> -->

                </div>
                
            </div>
           

      


       </div>

    </div>

        <!------------------Footer--------------->
        <div class="footer" 
            style="background: #ddead1;
            color: #4b6043;
            font-size: 18px;  ">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-sm-4 footer-col-1 text-center">
                        <a href="index.php"><img src="image/logo.png" 
                            style="width: 150px;
                            margin-bottom: 10px;
                            padding: auto;"></a>
                    </div>
                    <div class="col-sm-4 footer-col-2 ">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="product.php">Product</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-col-3">
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

<?php
        if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['user_id']))
        {
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = 1;

            $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE name = '$product_name' && `user_id` =" . $_SESSION['user_id']);

            if(mysqli_num_rows($select_cart) > 0)
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
                                    icon: 'error',
                                    title: 'Product is in Cart'
                                    })
                           
            </script>
            <?php
            }
            else{
                $insert_product = mysqli_query($connect,"INSERT INTO `cart`( name,price,image,quantity,`user_id`,`prod_id`)
                VALUES('$product_name','$product_price','$product_image','$product_quantity','{$_SESSION['user_id']}','$product_id')");
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
                                        title: 'Add to Cart Successful'
                                        })
                               
                </script>
                <?php
            }
        }
        else
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
                                    icon: 'info',
                                    title: 'Please Log In'
                                    })
                           
            </script>
            <?php
        }
    }

 

?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>