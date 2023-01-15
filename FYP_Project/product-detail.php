<?php
    session_start();
    include('connection.php');
    
    if(isset($_GET['id']))
    {
      $prodID = $_GET['id'];

      $getprod = mysqli_query($connect,"SELECT * FROM product WHERE prodID = '$prodID'");
    
      $p = mysqli_fetch_assoc($getprod);
      
    }
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
                $product_quantity = $_POST['update_quantity'];

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


        <div class="container mb-5">
          <div class="row mb-5">
            <div class="col-md-6 text-center">
              <img src="./image/<?= $p['product_image'] ?>" style="min-width:500px; min-height:500px; max-height:500px; max-width:500px" alt="">
            </div>
            <div class="col-md-6">
              <div class="wrapper">
                <p style="font-size:10px;">Wisteria Plant</p>
                <div class="product-title">
                  <h1><?= $p['product_name'] ?></h1>
                </div>
                <div class="product-price mt-3">
                  <strong><p>RM <?= number_format($p['product_price'],2)?></p></strong>
                </div>
                <div class="description mt-3">
                  <p><?= $p['description'] ?></p>
                </div>

                <div class="product-input mt-5">
                  <label for="inputquantity"  style="font-size:14px">Quantity</label>
                  <form action="" method="POST">
                      <input type="number" class="text-center mt-1" name="update_quantity" min="1" max="<?php echo $p['quantity']; ?>"  value="1" >
                  
                  <div class="mt-2">
                                        <input type='hidden' name='product_id' value='<?php echo $p["prodID"]; ?>'>
                                        <input type='hidden' name='product_name' value='<?php echo $p["product_name"]; ?>'>
                                        <input type='hidden' name='product_price' value='<?php echo $p['product_price']?>'>
                                        <input type='hidden' name='product_image' value='<?php echo $p['product_image']; ?>'>

                                        <?php
                                        if($p['quantity']>0)
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
                  </form>
                </div>
                
              </div>
            </div>
          </div><!-- row -->

          <div class="container mt-5">
            <div class="row">
                <div class="product-recommend mt-5 text-start">
                  <h4>You May Also Like</h4>
                    <div class="row mt-5" >

                      
                      <?php
                        $pid = $p['prodID'];
                        $cid = $p['category'];
                        $recom = mysqli_query($connect,"SELECT * FROM product WHERE category = '$cid' AND prodID != '$pid' AND is_delete = 0 LIMIT 4 ");
                        if(mysqli_num_rows($recom)>=4){
                        while($g = mysqli_fetch_assoc($recom))
                        {
                          ?>
                          <div class="col-md-3">
                            <a class="prod" href="product-detail.php?id=<?php echo $g['prodID'];?>">

                          <div class="card" data-price="<?= $g['product_price'] ?>"  style="border:none; background-color: #f2f6fc;" >
                              <div class="img-fluid card-img-top image-photo">
                              <img src= "./image/<?php echo $g['product_image']; ?>" style="max-height:200px; max-width:200px;" class="img img-fluid" alt="" >
                              </div>

                              

                              <div class="card-body">
                                  <p class="card-title" ><?php echo $g["product_name"]; ?></p>
                                </a>
                                  <h5>            
                                      <span class="price" data-price="<?= $g['product_price'] ?>">RM<?php echo number_format($g["product_price"],2); ?></span>
                                  </h5>  
                              </div>
                              
                          </div>
                          </div>
                          <?php
                        }}
                        else
                        {
                          
                          $pid = $p['prodID'];
                          $cid = $p['category'];
                          $recom = mysqli_query($connect,"SELECT * FROM product WHERE prodID != '$pid' AND is_delete = 0 LIMIT 4 ");
                          while($g = mysqli_fetch_assoc($recom))
                          {
                            ?>
                            <div class="col-md-3">
                              <a class="prod" href="product-detail.php?id=<?php echo $g['prodID'];?>">

                            <div class="card" data-price="<?= $g['product_price'] ?>"  style="border:none; background-color: #f2f6fc;" >
                                <div class="img-fluid card-img-top image-photo">
                                <img src= "./image/<?php echo $g['product_image']; ?>" style="max-height:200px; max-width:200px;" class="img img-fluid" alt="" >
                                </div>

                                

                                <div class="card-body">
                                    <p class="card-title" ><?php echo $g["product_name"]; ?></p>
                                  </a>
                                    <h5>            
                                        <span class="price" data-price="<?= $g['product_price'] ?>">RM<?php echo number_format($g["product_price"],2); ?></span>
                                    </h5>  
                                </div>
                                
                            </div>
                            </div>
                            <?php
                          }
                        }
                        ?>

                    
                    </div>
                </div>

            
            </div> <!--- 1st row -->
          </div><!-- this container -->

        </div><!--- top container -->
           

    

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