<?php
    session_start();
    include("connection.php");
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
    if($order)
    {echo"<script>alert('done')</script>";};
}
?>



<div class="container mt-5 px-5">

<div class="mb-4">

    <h2>Confirm order and pay</h2>
<span>please make the payment, after that you can enjoy all the features and benefits.</span>
    
</div>
<form action="" method="POST">
    <div class="row">

        <div class="col-md-8">
    

    <div class="card p-3">

        <h6 class="text-uppercase">Payment details</h6>
        <div class="inputbox mt-3"> <input type="text" name="cname" class="form-control" required="required"> <span>Name on card</span> </div>


        <div class="row">

            <div class="col-md-6">

                <div class="inputbox mt-3 mr-2"> <input type="text" name="cardnum" class="form-control" required="required" data-slots="0" data-accept="\d" size="19"> <i class="fa fa-credit-card"></i> <span>Card Number</span> 


                </div>
                

            </div>

            <div class="col-md-6">

                 <div class="d-flex flex-row">


                     <div class="inputbox mt-3 mr-2"> <input type="text" name="expiry" class="form-control" required="required"> <span>Expiry(xx/xx)</span> </div>

                  <div class="inputbox mt-3 mr-2"> <input type="text" name="cvv" class="form-control" required="required"> <span>CVV</span> </div>
                     

                 </div>
                

            </div>
            

        </div>



        <div class="mt-4 mb-4">

            <h6 class="text-uppercase">Billing Address</h6>


            <div class="row mt-3">

                <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="address" class="form-control" required="required"> <span>Address</span> </div>
                    

                </div>


                 <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="city" class="form-control" required="required"> <span>City</span> </div>
                    

                </div>


                

            </div>


            <div class="row mt-2">

                <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="state" class="form-control" required="required"> <span>State</span> </div>
                    

                </div>


                 <div class="col-md-6">

                    <div class="inputbox mt-3 mr-2"> <input type="text" name="postcode" class="form-control" required="required"> <span>Postcode</span> </div>
                    

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

</div>

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
