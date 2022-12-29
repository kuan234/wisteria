<?php
session_start();
include('connection.php');
$total = 0;
$subtotal = 0;
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin-Product</title>
    <link rel="icon" href="../image/logo.png">
    <!--ICON-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <!-- <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css"> -->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>


  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
           
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="collapse navbar-collapse show" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">
              <li class="nav-item d-block d-md-none"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
              <!-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li> -->
              <li class="nav-item dropdown navbar-search"><a class="nav-link dropdown-toggle hide" data-toggle="dropdown" href="#"><i class="ficon ft-search"></i></a>
                <ul class="dropdown-menu">
                  <li class="arrow_box">
                    <form>
                      <div class="input-group search-box">
                        <div class="position-relative has-icon-right full-width">
                          <input class="form-control" id="search" type="text" placeholder="Search here...">
                          <div class="form-control-position navbar-search-close"><i class="ft-x">   </i></div>
                        </div>
                      </div>
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- <ul class="nav navbar-nav float-right">         
              <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>
                <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                  <div class="arrow_box"><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> Chinese</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-ru"></i> Russian</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"><i class="flag-icon flag-icon-es"></i> Spanish</a></div>
                </div>
              </li>
            </ul> -->
            <ul class="nav navbar-nav float-right">
              <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><i class="ft-book"></i> Read Mail</a><a class="dropdown-item" href="#"><i class="ft-bookmark"></i> Read Later</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Mark all Read       </a></div>
                </div>
              </li> -->
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">             <span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <?php 
                        $getname = mysqli_query($connect,"SELECT * from admlogin where admid = ".$_SESSION['admin_id']);
                        if(mysqli_num_rows($getname)>0)
                        {
                          while($g = mysqli_fetch_assoc($getname))
                          {
                            ?>
                        
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">
                    
                  <?php
                  echo $g['firstname']. " " .$g['lastname'];
                  ?>
                  </span></span></a>
                  <?php
                } 
              }
          ?>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!---navbar-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="adminindex.php"><img class="brand-logo" alt="Wisteria admin logo" src="../image/logo.png"/>
              <h3 class="brand-text">Wisteria Plant</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="adminindex.php"><i class="material-symbols-rounded">account_circle</i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <!-- <li class=" nav-item"><a href="#"><i class="material-symbols-rounded">notifications_active</i><span class="menu-title" data-i18n="">Notifications</span></a>
          </li> -->
          <li class=" nav-item  ">
            <a href="view_customer.php"><i class="material-symbols-rounded">group</i><span class="menu-title" data-i18n="">Customers</span></a>
                   
            </li>
          <li class=" nav-item "><a href="view_product.php"><i class="material-symbols-rounded">potted_plant</i><span class="menu-title" data-i18n="">Products</span></a>
           
            </li>
          <li class=" nav-item"><a href="view_category.php"><i class="material-symbols-rounded">category</i><span class="menu-title" data-i18n="">Category</span></a>
           
           </li>
          <li class=" nav-item active"><a href="view_order.php"><i class="material-symbols-rounded">receipt_long</i><span class="menu-title" data-i18n="">Orders</span></a>
           
          </li>
          <li class=" nav-item "><a href="view_admin.php"><i class="material-symbols-rounded">manage_accounts</i><span class="menu-title" data-i18n="">Admins</span></a>
            
          </li>
          <li class=" nav-item"><a href="reports.php"><i class="material-symbols-rounded">monitoring</i><span class="menu-title" data-i18n="">Reports</span></a>
          </li>
          <li class=" nav-item"><a href="settings.php"><i class="material-symbols-rounded">settings</i><span class="menu-title" data-i18n="">Settings</span></a>
          </li>
          <li class=" nav-item"><a href="logout.php"><i class="material-symbols-rounded">logout</i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        </div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            
    <div class="row match-height">
        <div class="col-12">
            <div class="container-fluid">

                <table class="table table-striped" width="100%">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Order ID</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Order Date</th>
                                <th scope="col" class="text-center">Total Price</th>
                                <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $vieworder = "SELECT * FROM `order_manage`";

                                $sql_run = mysqli_query($connect,"$vieworder");
                                
                                    if(mysqli_num_rows($sql_run)>0)
                                    {
                                    $i=1;
                                        while($row = mysqli_fetch_assoc($sql_run)){
                                    
                                   $oid = $row['order_user_id']; 
                                ?>
                                <tr>
                                <th scope="row" class="text-center"><?php echo $i++;?></th>
                                    <th scope="row" class="text-center"><?php echo $row['order_number'];?></th>
                                    <td class="fs-5 text-center">
                                    <?php
                                $vieworderemail = "SELECT * FROM `user_reg` where uid = '$oid'";

                                $vieworderemail_sql_run = mysqli_query($connect,"$vieworderemail");
                                
                                    if(mysqli_num_rows($vieworderemail_sql_run)>0)
                                    {
                                    
                                        while($r2 = mysqli_fetch_assoc($vieworderemail_sql_run)){
                                          echo $r2['email'];
                                        }
                                        }?>    
                                  </td>
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
                <div class="receipt bg-white p-3 rounded"><img src="../image/logo.png" width="120">
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
                        <img src= "../image/<?php echo $pd['image']; ?>" alt="" width="80">
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
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" <?php $subtotal = 0; $total = 0; ?> >Close</button>
                                                           
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
                </div>


                
                </div>

                
                
            </div>

              




            </div>
        </div>
    </div>



    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow fixed-bottom">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">2022  &copy; Wisteria Plant Copyright</span>
      </div>
    </footer>

    

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  </body>
</html>



