<?php
session_start();
$sid = $_SESSION['user_id']; 
$semail = $_SESSION['user_email'];
$orderid = $_SESSION['oid'];
$total =0;
$subtotal=0;

include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
        include('php/header.php');
    ?>
<style>
    body {
  background-color: #f2f6fc;
}

.fs-12 {
  font-size: 12px;
}

.fs-15 {
  font-size: 15px;
}

.name {
  margin-bottom: -2px;
}

.product-details {
  margin-top: 13px;
}
</style>
<?php
$sql1 = mysqli_query($connect,"SELECT * FROM `order_manage` WHERE `orderID` = $orderid "); 
                        
                            while($row = mysqli_fetch_assoc($sql1)){

                        
    ?>                    
<div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="receipt bg-white p-3 rounded"><img src="./image/logo.png" width="120">
                    <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
                    <h6 class="name">Hello <?php
                    //  $sql1 = mysqli_query($connect,"SELECT `username` FROM `user_info` WHERE `user_id` = $sid"); 
                    // if(mysqli_num_rows($sql1)>0)
                    // {
                    //     $row = mysqli_fetch_assoc($sql1);
                        echo $row['order_name'];
                    // }
                    ?>,
                    </h6><span class="fs-12 text-black-50">your order has been confirmed and will be shipped in two days</span>
                    <hr>
                    <div class="d-flex flex-row justify-content-between align-items-center order-details">
                        <div><span class="d-block fs-12">Order date</span><span class="font-weight-bold">
                        <?php 
                        // $sql1 = mysqli_query($connect,"SELECT `order_date` FROM `order_manage` WHERE `orderID` = $orderid "); 
                        // if(mysqli_num_rows($sql1)>0)
                        // {
                        //     $row = mysqli_fetch_assoc($sql1);
                            echo $row['order_date'];
                        // }
                        ?>
                        </span></div>
                        <div><span class="d-block fs-12">Order number</span><span class="font-weight-bold">
                        <?php 
                        // $sql1 = mysqli_query($connect,"SELECT `order_number` FROM `order_manage` WHERE `orderID` = $orderid "); 
                        // if(mysqli_num_rows($sql1)>0)
                        // {
                        //     $row = mysqli_fetch_assoc($sql1);
                            echo $row['order_number'];
                        // }
                        ?>
                        </span></div>
                        <div><span class="d-block fs-12">Payment method</span><span class="font-weight-bold">Credit card</span><img class="ml-1 mb-1" src="https://i.imgur.com/ZZr3Yqj.png" width="20"></div>
                        <div><span class="d-block fs-12">Shipping Address</span><span class="font-weight-bold text-success">
                        <?php 
                        // $sql1 = mysqli_query($connect,"SELECT `order_address` FROM `order_manage` WHERE `orderID` = $orderid "); 
                        // if(mysqli_num_rows($sql1)>0)
                        // {
                        //     $row = mysqli_fetch_assoc($sql1);
                            echo $row['order_address'];
                        // }
                        
                        ?>
                        </span></div>
                    </div>
                    <hr>
<?php      
                    $sql2 = mysqli_query($connect,"SELECT * FROM `user_order` WHERE `order_id` = $orderid "); 
                    
                            while($pd = mysqli_fetch_assoc($sql2)){
                                
                             ?>
                    <div class="d-flex justify-content-between align-items-center product-details">
                        <div class="d-flex flex-row product-name-image">
                        <img src= "./image/<?php echo $pd['image']; ?>" alt="" width="80">
                            <div class="d-flex flex-column justify-content-between ml-2">
                                <div><span class="d-block font-weight-bold p-name">
                                    <?php
                                        echo $pd['product_name'];
                                        
                                    ?>
                                </span>
                                <!-- <span class="fs-12">Clothes</span> -->
                            </div>
                                <span class="fs-12">Qty: 
                                    <?php
                                    echo $pd['quantity'];
                                    ?>
                                </span></div>
                        </div>
                        <div class="product-price">
                            <h5>
                            <?php
                            echo"RM ";
                            $price = $pd['price'] * $pd['quantity'];
                            $subtotal = $subtotal + $price;
                            $total = $total + $price;
                            echo $price;
                                        
                                        
                                    ?>
                            </h5>
                        </div>
                    </div>


                    <?php } ?>
                    <!-- <div class="d-flex justify-content-between align-items-center product-details">
                        <div class="d-flex flex-row product-name-image"><img class="rounded" src="https://i.imgur.com/b7Ve3fJ.jpg" width="80">
                            <div class="d-flex flex-column justify-content-between ml-2">
                                <div><span class="d-block font-weight-bold p-name">Ralco formal Belt for men</span><span class="fs-12">Accessories</span></div><span class="fs-12">Qty: 1pcs</span></div>
                        </div>
                        <div class="product-price">
                            <h6>$50</h6>
                        </div>
                    </div> -->
 
                    <div class="mt-5 amount row">
                        <div class="d-flex justify-content-center col-md-6">
                        <!-- <img src="https://i.imgur.com/.gif" width="250" height="100"> -->
                        </div>
                        <div class="col-md-6">
                            <div class="billing">
                                
                                <div class="d-flex justify-content-between"><span>Subtotal</span><span class="font-weight-bold">
                                    <?php
                                        
                                        echo "RM " .$subtotal;
                            
                                    ?>
                                </span></div>
                                <!-- <div class="d-flex justify-content-between mt-2"><span>Shipping fee</span><span class="font-weight-bold">$15</span></div>
                                <div class="d-flex justify-content-between mt-2"><span>Tax</span><span class="font-weight-bold">$5</span></div>
                                <div class="d-flex justify-content-between mt-2"><span class="text-success">Discount</span><span class="font-weight-bold text-success">$25</span></div> -->
                                <hr>
                                <div class="d-flex justify-content-between mt-1"><span class="font-weight-bold">Total</span><span class="font-weight-bold text-success">
                                    <?php
                                    echo "RM " .$total;
                                    ?>
                                </span></div>
                            </div>
                        </div>
                        
                    </div><span class="d-block">Expected delivery date</span><span class="font-weight-bold text-success">
                        <?php
                        
                        echo $row['delivery_date'];
                        ?>
                    </span><span class="d-block mt-3 text-black-50 fs-15">We will be sending a shipping confirmation email when the item is shipped!</span>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center footer">
                        <div class="thanks"><span class="d-block font-weight-bold">Thanks for shopping</span><span>Wisteria team</span></div>
                        <div class="d-flex flex-column justify-content-end align-items-end"><span class="d-block font-weight-bold">Need Help?</span><span>Call - 01123456789</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

                        }
    ?>
</body>
</html>