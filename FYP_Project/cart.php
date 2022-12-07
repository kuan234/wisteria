<?php
session_start();
include('connection.php');
$id = $_SESSION['user_id'];
if(!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
    }

//update quantity
if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($connect, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:cart.php');
    };
 };

 //discount code
//  if(isset($_POST['update_discount_btn'])){
//    $promodecode = $_POST['discountcode'];
//    //$discount = mysqli_query($connect, "SELECT `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
//    header('location:cart.php');
//  }
 
 //remove item
 if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($connect, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:cart.php');
 };
 
 if(isset($_GET['delete_all'])){
    mysqli_query($connect, "DELETE FROM `cart` WHERE user_id = $id");
    header('location:cart.php');
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
    
</head>
<body>
<?php
include('./php/header.php');
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
            <td><img src="image/<?php echo $fetch_cart['image']; ?>" height="100px" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>RM<?php echo number_format($fetch_cart['price']); ?>/-</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                  <input type="submit" value="update" name="update_update_btn">
               </form>   
            </td>
            <td>RM<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total = $grand_total + $sub_total;  
            };
         }
         else
         {
            ?>
            <tr>
            <td colspan="6"><h3>Cart is Empty</h3><td>
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

         <tr class="table-bottom">
            <td><a href="product.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>RM<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>

</div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>