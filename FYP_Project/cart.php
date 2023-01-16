<?php
session_start();
include('connection.php');
$id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="cart-style.css">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>
<body>
<?php
include('./php/header.php');
?>

<?php

//update quantity
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_product_id = $_POST['update_product_id'];
   
   $chkq = mysqli_query($connect,"SELECT * FROM product where prodID = '$update_product_id'");
   if(mysqli_num_rows($chkq)>0)
   {
     
     while($c1 = mysqli_fetch_assoc($chkq))
     {
        if($update_value <= $c1['quantity'])
        {
           $update_quantity_query = mysqli_query($connect, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'"); 
        }
        else
        {
           ?>
           <script>
           Swal.fire(
              'Wrong',
              'We dont have that much stock',
              'question',
            )
            </script>
            <?php
        }

     }
   }
       
};

//Check Product & Quantity is in stock
if(isset($_POST['checkoutbtn']))
{
   $chkq = mysqli_query($connect,"SELECT * FROM cart where user_id = '$id'");
   $chkp = mysqli_query($connect,"SELECT * FROM product where is_delete = 0;");
   if(mysqli_num_rows($chkq)>0)
   {
     
     while($c1 = mysqli_fetch_assoc($chkq))
     {
         while($c2 = mysqli_fetch_assoc($chkp))
         {
            if($c1['name'] == $c2['product_name'])
            {
               if(($c2['quantity']!= 0) && ($c1['quantity']<=$c2['quantity']))
               {
                  ?>
               
                  <script>window.location.href="checkout.php"</script> 
                  <?php
               }else
               {
                  ?>
               <script>
               Swal.fire(
                  'Wrong',
                  "Product <?= $c1['name'] ?> Already Sold Out.",
                  'question',
                  )
                  </script>
                  <?php
               }
               
               
            }
            else
            {
               ?>
               <script>
               Swal.fire(
                  'Wrong',
                  '<?= $c1['name'] ?> Already Sold Out.',
                  'question',
                  )
                  </script>
                  <?php
            }
      }

     }
   }
}

//promocode code
//  if(isset($_POST['update_discount_btn'])){
//    $promodecode = $_POST['discountcode'];
//    $discount = mysqli_query($connect, "SELECT `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
//    header('location:cart.php');
//  }

//remove item
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($connect, "DELETE FROM `cart` WHERE id = '$remove_id'");
   ?>
        <script>window.location.href="cart.php"</script>
        <?php
};

if(isset($_GET['delete_all'])){
   mysqli_query($connect, "DELETE FROM `cart` WHERE user_id = $id");
   ?>
        <script>window.location.href="cart.php"</script>
        <?php
}
?>


<style>
   .hcontainer{
      font-size:large;
   }

   .swal2-popup {
      font-size: 1.5rem !important;
      font-family: Georgia, serif;
   }
   </style>
   <?php
      $selectcart = mysqli_query($connect, "SELECT * FROM `cart` WHERE `user_id` = '$id'");
      
   ?>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($connect, "SELECT * FROM `cart` WHERE `user_id` = '$id'");
         $grand_total = 0;
         
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="./image/<?php echo $fetch_cart['image']; ?>" height="100px" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>RM<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="hidden" name="update_quantity_id"  value="<?=  $fetch_cart['id']; ?>" >
                  <input type="hidden" name="update_product_id"  value="<?=  $fetch_cart['prod_id']; ?>" >
                  <input type="submit" value="update" id="<?= $fetch_cart['prod_id'] ?>" name="update_update_btn">
                  
            </td>
            <td>RM<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
            </form>
         <?php
           $grand_total = $grand_total + $sub_total;  
            };
         }
         else
         {
            ?>
            <tr>
            <td colspan="6"><div class="col-sm-12 empty-cart-cls text-center">
									<img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
									<h3><strong>Your Cart is Empty</strong></h3>
									<h4>Add something to make me happy :)</h4>
								
								</div><td>
            </tr>
            <?php
         }
         
         ?>
         <!-- <tr >
            <td>Discount Code</td>
            <td><input class="form-control form-control-lg" type="text" name="discountcode" value="" ></td>
            <td colspan='1'><form action="" method="post">
                  <input type="submit" value="update" name="update_discount_btn">
               </form>  </td>
            
         </tr> -->
         
         <form action="" method="post">
         <tr class="table-bottom">
            <td><a href="product.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>RM<?php echo $grand_total; ?>/-</td>
          
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

    
   <div class="checkout-btn">
      <button class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" name= "checkoutbtn">proceed to checkout</button>
   </div>
</form>
</section>

</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>