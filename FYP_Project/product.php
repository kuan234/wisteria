<?php
    session_start();
    include('connection.php');
    // $id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <!-- <script src="sweetalert2.min.js"></script>
        <link rel="stylesheet" href="sweetalert2.min.css"> -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="container">
        <div class="row text-center py-5">

            <?php
            $query = "SELECT * from product ORDER BY prodID ASC";
            $res= mysqli_query($connect,$query);
            if($res)
            {
                if(mysqli_num_rows($res)>0)
                while($prod = mysqli_fetch_assoc($res)){
                  //  print_r($prod);
                }
            }
            ?>
            
            <?php
                
                $result = mysqli_query($connect, "SELECT * from product");	
                while($row = mysqli_fetch_assoc($result))
                    {
                            
                        
                    ?>	
                    <div class="col-md-3 col-sm-6 my-3 my-md-0">
                        <form acion="" method="POST">
                            <div class="card shadow">
                                <div class="img-fluid card-img-top">
                                <img src= "./image/<?php echo $row['product_image']; ?>" alt="" >
                                </div>

                                

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row["product_name"]; ?></h5>
                                    <h6>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </h6>
                                    
                                    <h5>
                                        
                                        <span class="price">RM<?php echo $row["product_price"]; ?></span>
                                        <small><del class='text-secondary'>RM<?php echo $row['product_price'] *2.0;?></del></small>
                                    </h5>

                                    <input type='hidden' name='product_id' value='<?php echo $row["prodID"]; ?>'>
                                    <input type='hidden' name='product_name' value='<?php echo $row["product_name"]; ?>'>
                                    <input type='hidden' name='product_price' value='<?php echo $row['product_price']?>'>
                                    <input type='hidden' name='product_image' value='<?php echo $row['product_image']; ?>'>
                                    <button type="submit" class="btn btn-warning my-3" value='add to cart' name="add_to_cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                                    
                                    
                                </div>
                            </div>
                        </form>
                        
                    </div>
                <?php
                    
                }		
                
                ?>
            
        </div>
    </div>

    

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>