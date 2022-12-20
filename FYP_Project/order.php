<?php
session_start();
$subtotal = 0;
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        include('php/header.php');
    ?>
<style>
    body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}

.row{
    justify-content:space-around;
}

.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}


    </style>

<div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
        <a class="nav-link  ms-0" href="edit-profile.php" target="__blank">Profile</a>
        <a class="nav-link active" href="order.php" target="__blank">History</a>
        <a class="nav-link" href="change-password.php" target="__blank">Security</a>
        
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Transaction History</div>
                    <div class="card-body">
                        <form method='POST' >

                            <table class="table table-striped" width="100%">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col" class="text-center">Order ID</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Order Date</th>
                                <th scope="col" class="text-center">Total Price</th>
                                <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $vieworder = "SELECT * FROM `order_manage` WHERE `order_user_id` =" .$_SESSION['user_id'];

                                $sql_run = mysqli_query($connect,"$vieworder");
                                
                                    if(mysqli_num_rows($sql_run)>0)
                                    {
                                    
                                        while($row = mysqli_fetch_assoc($sql_run)){
                                    
                                    
                                ?>
                                <tr>
                                    <th scope="row" class="text-center"><?php echo $row['order_number'];?></th>
                                    <td class="text-center"><?php echo $row['order_name'];?></td>
                                    <td class="fs-5 text-center"><?php echo $row['order_date']?></td>
                                    <td class="fs-5 text-center"><?php echo "RM " .$row['order_price']?></td>
                                    <td class="text-center">
                                        <!-- ############################################################################################################### --> 
                                        <!-- Button trigger modal -->
                    

                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#detailModal<?php echo $row['orderID'] ?>">
                                            Details
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade text-left" id="detailModal<?php echo $row['orderID'] ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="detailModalLabel">Order Detail</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
            <!-- Modal Body  -->
                                        <?php
            $sql1 = mysqli_query($connect,"SELECT * FROM `order_manage` WHERE `orderID` =" .$row['orderID'] ); 
                        
                            while($r1 = mysqli_fetch_assoc($sql1)){

                        
    ?>                    
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="receipt bg-white p-3 rounded"><img src="./image/logo.png" width="120">
                    <h4 class="mt-2 mb-3">Your order is confirmed!</h4>
                    <h6 class="name">Hello <?php
                    //  $sql1 = mysqli_query($connect,"SELECT `username` FROM `user_info` WHERE `user_id` = $sid"); 
                    // if(mysqli_num_rows($sql1)>0)
                    // {
                    //     $row = mysqli_fetch_assoc($sql1);
                        echo $r1['order_name'];
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
                            echo $r1['order_date'];
                        // }
                        ?>
                        </span></div>
                        <div><span class="d-block fs-12">Order number</span><span class="font-weight-bold">
                        <?php 
                        // $sql1 = mysqli_query($connect,"SELECT `order_number` FROM `order_manage` WHERE `orderID` = $orderid "); 
                        // if(mysqli_num_rows($sql1)>0)
                        // {
                        //     $row = mysqli_fetch_assoc($sql1);
                            echo $r1['order_number'];
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
                            echo $r1['order_address'];
                        // }
                        
                        ?>
                        </span></div>
                    </div>
                    <hr>
<?php      
                    $sql2 = mysqli_query($connect,"SELECT * FROM `user_order` WHERE `order_id` =" .$row['orderID']); 
                    
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
                            echo $price;
                                        
                                        
                                        $total = $total + $price;
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
                        
                        echo $r1['delivery_date'];
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
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal" <?php $subtotal = 0;
$total = 0; ?> >Close</button>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- ############################################################################################################### --> 
                                    </td>           
                                                
                                    </tr>

                                    <?php

                                        }}?>
                                    </tbody>
                                    </table>        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                
                                
</body>
</html>