<?php
    session_start();
    include('connection.php');
    // $id = $_SESSION['user_id'];
    $sort = 0;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="icon" href="image/logo.png">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <!-- <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include('php/header.php');
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

<style>
    .prod{
        
        overflow: hidden;
    }

    .image-photo >.img
    {
        object-fit: cover;
        width:100%;
        height: 100%;
        transition: all .3s ease-in-out;

    }

    .image-photo:hover > img{
        text-decoration: underline;
        color: black;
        transform: scale(1.1);
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


    <div class="container">
        <h2 class="text-center">
            All Plants
        </h2>

            <div class="row ms-5 mt-5">            
                <label class="" style="max-width:90px;">Sort by: </label>
                <select name="price-sorting" id="sort" class="form-select form-select-sm " style="max-width:170px">
                    <option selected="" disabled="">Default Sorting</option>
                    <option value="l2h">Price: Low to High</option>
                    <option value="h2l">Price: High to Low</option>
                </select>              
            </div>

            <div class="row text-center py-3 product">
                <?php
                    
                    $categoryid = $_GET['cid'];
                    $result = mysqli_query($connect, "SELECT * from product where is_delete = 0 AND category = '$categoryid' order by product_name ASC");
                    if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result))
                        {
                                
                            
                        ?>	
                        
                        <div class="product_list col-md-4 col-sm-6 my-3 my-md-0 ">
                            
                            <form acion="" method="POST">

                                <a class="prod" href="product-detail.php?id=<?php echo $row['prodID'];?>">

                                <div class="card" data-price="<?= $row['product_price'] ?>"  style="border:none; background-color: #f2f6fc;" >
                                    <div class="img-fluid card-img-top image-photo">
                                    <img src= "./image/<?php echo $row['product_image']; ?>" style="height:300px; width:300px;" class="img img-fluid" alt="" >
                                    </div>

                                    

                                    <div class="card-body">
                                        <p class="card-title" ><?php echo $row["product_name"]; ?></p>
                                    </a>
                                        <p style="font-size:11px">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </p>
                                        
                                        <h5>
                                            
                                            <span class="price" data-price="<?= $row['product_price'] ?>">RM<?php echo number_format($row["product_price"],2); ?></span>
                                            <!-- <small><del class='text-secondary'>RM<?php echo $row['product_price'] *2.0;?></del></small> -->
                                        </h5>
                        
                                        <input type='hidden' name='product_id' value='<?php echo $row["prodID"]; ?>'>
                                        <input type='hidden' name='product_name' value='<?php echo $row["product_name"]; ?>'>
                                        <input type='hidden' name='product_price' value='<?php echo $row['product_price']?>'>
                                        <input type='hidden' name='product_image' value='<?php echo $row['product_image']; ?>'>
                                        
                                        <?php
                                        if($row['quantity']>0)
                                        {
                                            ?>
                                            <button type="submit" class="btn btn-warning my-3" value='add to cart' name="add_to_cart">Add to cart <i class="fas fa-shopping-cart"></i></button>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <button type="button" class="btn btn-danger my-3" value='out of stock' name="add_to_cart" style="cursor:not-allowed" >Out of Stock <i class="fas fa-shopping-cart"></i></button>
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    <?php
                        
                    }	}
                    else
                    {
                        ?>
                        
                        <div class="container">
                            <div class="row">
                                <h5>No Product In This Category</h5>
                            </div>
                        </div>

                        <?php
                    }	
                ?>
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



    <script src="script.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>