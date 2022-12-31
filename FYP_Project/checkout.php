<?php
    session_start();
    include("connection.php");
    include('php/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="checkout-style.css">
    
</head>
<body>

<?php


if(isset($_POST['confirmbtn']))
{
    $id = $_SESSION['user_id'];
    $name = $_POST['cname'];
    $cardnum = $_POST['cardnum'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    

    $order = mysqli_query($connect, "INSERT INTO `order_manage`(`order_name`, `order_cardnum`, `order_address`, `order_city`, `order_state`, `order_postcode` ,`order_user_id`) VALUES ('$name','$cardnum','$address','$city','$state','$postcode','$id') ");
    $order_id = mysqli_insert_id($connect);
     $_SESSION['oid'] = $order_id;
    $query2 = "select * from order_manage order by order_number desc limit 1";
            $result2 = mysqli_query($connect,$query2);
            $row = mysqli_fetch_array($result2);
            $last_id = $row['order_number'];
            if ($last_id == "")
            {
                $oid = "W000000100";
            }
            else
            {
                $oid = substr($last_id, 3);
                $oid = intval($oid);
                $oid = "W000000" . ($oid + 1);
            }
    $query3 = mysqli_query($connect,"UPDATE `order_manage` SET `order_number`='$oid' WHERE `orderID` = $order_id");
    $date = date("Y-m-d", strtotime("+1 week"));
    $update = mysqli_query($connect,"UPDATE `order_manage` SET `delivery_date`='$date' WHERE `orderID` = $order_id");

    if($order)
    {  
        $result = mysqli_query($connect, "SELECT * from cart where user_id = $id");	
        while($row = mysqli_fetch_assoc($result))
        {
            $product_id = $row['prod_id'];
            $product_name = $row['name'];
            $price = $row['price'];
            $quantity = $row['quantity'];
            $image = $row['image'];
            $order2 =mysqli_query($connect,"INSERT INTO `user_order`(`order_id`, `product_name`, `price`, `quantity`, `image`) VALUES ('$order_id','$product_name','$price','$quantity','$image')");
            
                            $price = $row['price'] * $row['quantity'];
                            $subtotal = $subtotal + $price;
                            $total = $total + $price;
            $updatetotal = mysqli_query($connect,"UPDATE `order_manage` SET `order_price`='$total' WHERE `orderID` = $order_id");
            
            $sql_upd_prod_qtty = mysqli_query($connect, "SELECT * from product where prodID = '$product_id'");	
            while($r2 = mysqli_fetch_assoc($sql_upd_prod_qtty))
            {
                $qty = $r2['quantity'];
                $qtty = $qty - $quantity;
                $upd_prod_qtty = mysqli_query($connect,"UPDATE `product` SET `quantity`='$qtty'WHERE `prodID` = '$product_id'");
            }

        }
        echo "<script>alert('Order Successful!');
        </script>";
        if($order2)
        {
            mysqli_query($connect, "DELETE FROM `cart` WHERE user_id = $id");
        }
        ?>
        <script>window.location.href="order_detail.php"</script>
        <?php
    }
    else
    {
        echo "<script>alert('something wrong');
        </script>";
    }
    

}
?>



<div class="container mt-5 px-5">

<div class="mb-4">

    <h2>Confirm order and pay</h2>
<span>please make the payment, after that you can enjoy all the features and benefits.</span>
    
</div>

<?php
    $id = $_SESSION['user_id'];
    $sql1_run = mysqli_query($connect,"SELECT * FROM `user_info` WHERE `user_id` = $id" );
    if(mysqli_num_rows($sql1_run)>0)
    {
        while($r1 = mysqli_fetch_assoc($sql1_run))
        {
            
        
?>
<form action="" method="POST">
    <div class="row">

        <div class="col-md-8">
    

    <div class="card p-3">

        <h6 class="text-uppercase">Payment details</h6>
        <?php
        if($r1['username']==null)
        {?>
            <div class="inputbox mt-3"> <input type="text" name="cname" class="form-control" required="required"> <span>Name on card</span> </div>
        <?php
        }else{
            ?><div class="inputbox mt-3"> <input type="text" name="cname" class="form-control" value="<?php echo $r1['username'] ?>" required="required"> <span>Name on card</span> </div><?php
        }
        ?>

        <div class="row">

            <div class="col-md-6">

                <div class="inputbox mt-3 mr-2"> <input type="text" name="cardnum" id="cc" class="form-control" required="required" data-slots="0" data-accept="\d" size="16" onkeypress="return checkDigit(event)"> <i class="fa fa-credit-card"></i> <span>Card Number</span> 


                </div>
                

            </div>

            

                 <div class="d-flex flex-row">

                
                 <select class="form-select inputbox mt-3 mr-2" aria-label="Default select example" required>
                    <option selected>Month</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select class="form-select inputbox mt-3 mr-2" aria-label="Default select example" required>
                <option selected>Year</option>
                    <option value="1">23</option>
                    <option value="2">24</option>
                    <option value="3">25</option>
                    <option value="4">26</option>
                    <option value="5">27</option>
                    <option value="6">28</option>
                    <option value="7">29</option>
                    <option value="8">30</option>
                </select>
                  <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv" class="form-control" required="required"> <span>CVV</span> </div>
                     

                 </div>
                

            
            

        </div>


        <div class="mt-4 mb-4">

            <h6 class="text-uppercase">Delivery Address</h6>


            <div class="row mt-3">

                <div class="col-md-6">
                    <?php
                    if($r1['address']==null)
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="address" class="form-control" required="required"> <span>Address</span>
                    
                        </div>
                        <?php
                    }
                    else
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="address" class="form-control" value="<?php echo $r1['address'];?>"><span>Address</span>
                            
                        </div>
                        <?php
                    }
                    
                    ?>

                </div>


                 <div class="col-md-6">

                    <?php
                        if($r1['city']==null)
                        {?>
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control" required="required"> <span>City</span>
                        
                            </div>
                            <?php
                        }
                        else
                        {?>
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control" value="<?php echo $r1['city'];?>"><span>City</span>
                                
                            </div>
                            <?php
                        }
                        
                        ?>    

                </div>              

            </div>

            <div class="row mt-2">

                <div class="col-md-6">
                <?php
                    if($r1['state']==null)
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control" required="required"> <span>State</span>
                    
                        </div>
                        <?php
                    }
                    else
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control" value="<?php echo $r1['state'];?>"><span>State</span>
                            
                        </div>
                        <?php
                    }
                    
                    ?>                   

                </div>

                 <div class="col-md-6">
                 <?php
                    if($r1['postcode']==null)
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="postcode" class="form-control" required="required"> <span>Postcode</span>
                    
                        </div>
                        <?php
                    }
                    else
                    {?>
                        <div class="inputbox mt-3 mr-2"> <input type="text" name="postcode" class="form-control" value="<?php echo $r1['postcode'];?>"><span>Postcode</span>
                            
                        </div>
                        <?php
                    }
                    
                    ?>
                    
                </div>        

            </div>

        </div>

    </div>


    <div class="mt-4 mb-4 d-flex justify-content-between">


                <span><a href = 'cart.php'>Previous step</a></span>


                <button class="btn btn-success px-3" name="confirmbtn" type="submit">Confirm</button>


                

            </div>

</div>



</div>
</form>
<?php
}
}
?>
</div>

<script>
    function cc_format(value) {
  var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
  var matches = v.match(/\d{4,16}/g);
  var match = matches && matches[0] || ''
  var parts = []
  for (i=0, len=match.length; i<len; i+=4) {
    parts.push(match.substring(i, i+4))
  }
  if (parts.length) {
    return parts.join(' ')
  } else {
    return value
  }
}

onload = function() {
  document.getElementById('cc').oninput = function() {
    this.value = cc_format(this.value)
  }
}
function checkDigit(event) {
    var code = (event.which) ? event.which : event.keyCode;

    if ((code < 48 || code > 57) && (code > 31)) {
        return false;
    }

    return true;
}
    </script>

<!------------------->
<!--------
<div class="col-md-4">

    <div class="card card-blue p-3 text-white mb-3">

       <span>You have to pay</span>
        <div class="d-flex flex-row align-items-end mb-3">
            <h1 class="mb-0 yellow">$549</h1> <span>.99</span>
        </div>

        <span>Enjoy all the features and perk after you complete the payment</span>
        <a href="#" class="yellow decoration">Know all the features</a>

        <div class="hightlight">

            <span>100% Guaranteed support and update for the next 5 years.</span>
            

        </div>
        
    </div>
    
</div>
------->

<!---------------->

</body>
</html>
