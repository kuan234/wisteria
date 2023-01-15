<?php
session_start();
include('connection.php');

if(!isset($_SESSION['admin_id']))
{
    ?>
    <script>window.location.href="admlogin.php"</script>
    <?php
}

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin Dashboard</title>
    <link rel="icon" href="../image/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


  </head>
  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
            
  <?php
        include('admin_header.php');

        $recent_product_sql = mysqli_query($connect,"SELECT `product_image` FROM product ORDER BY prodID desc limit 3");

    ?>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!---navbar-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Wisteria admin logo" src="../image/logo.png"/>
              <h3 class="brand-text">Wisteria Plant</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
    
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" active"><a href="index.php"><i class="material-symbols-rounded">account_circle</i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          <!-- <li class=" nav-item"><a href="#"><i class="material-symbols-rounded">notifications_active</i><span class="menu-title" data-i18n="">Notifications</span></a>
          </li> -->
          <li class=" nav-item ">
            <a href="view_customer.php"><i class="material-symbols-rounded">group</i><span class="menu-title" data-i18n="">Customers</span></a>
                   
            </li>
          <li class=" nav-item "><a href="view_product.php"><i class="material-symbols-rounded">potted_plant</i><span class="menu-title" data-i18n="">Products</span></a>
           
                </li>
            <li class=" nav-item"><a href="view_category.php"><i class="material-symbols-rounded">category</i><span class="menu-title" data-i18n="">Category</span></a>
           
          </li>
          <li class=" nav-item "><a href="view_order.php"><i class="material-symbols-rounded">receipt_long</i><span class="menu-title" data-i18n="">Orders</span></a>
           
          </li>
          <li class=" nav-item "><a href="view_admin.php"><i class="material-symbols-rounded">manage_accounts</i><span class="menu-title" data-i18n="">Admins</span></a>
            
          </li>
          <li class=" nav-item"><a href="reports.php"><i class="material-symbols-rounded">monitoring</i><span class="menu-title" data-i18n="">Reports</span></a>
          </li>
          <li class=" nav-item"><a href="contactform.php"><i class="material-symbols-rounded">edit_note</i><span class="menu-title" data-i18n="">Contact</span></a>
          </li>
          <li class=" nav-item has-sub"><a href="#"><i class="material-symbols-rounded">settings</i><span class="menu-title" data-i18n="">Settings</span></a>
            <ul class="menu-content">
              <li class="is-shown">
                <a class="menu-item" data-bs-toggle="modal" data-bs-target="#profileModal" href="#">Profile</a>
              </li>
              <li class="is-shown">
                <a class="menu-item" data-bs-toggle="modal" data-bs-target="#passwordModal" href="#">Change Password</a>
              </li>
              
            </ul> 
        </li>
          <li class=" nav-item"><a href="logout.php"><i class="material-symbols-rounded">logout</i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body">
<div class="row match-height mb-5">
    
</div>
<!-- eCommerce statistic -->
<div class="row mt-5">
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">Total Customers</h5>
                <div>
                    <i class="ft-user danger font-large-1 float-right p-1"></i>
                </div>
                <div class=" ">
                        <?php
                            $total_user_sql = mysqli_query($connect,"SELECT * FROM `user_reg`;");
                            $count = 0;
                            while($t = mysqli_fetch_assoc($total_user_sql)){
                                $count++;
                            }
                        ?>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <h1 class=""><?= $count ?></h1>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="card pull-up ecom-card-1 bg-white">
        <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">Total Product</h5>
                <div>
                    <i class="material-symbols-rounded info font-large-1 float-right p-1">potted_plant</i>
                    
                </div>
                <div class=" ">
                        <?php
                            $total_user_sql = mysqli_query($connect,"SELECT * FROM `product` where is_delete = 0;");
                            $count = 0;
                            while($t = mysqli_fetch_assoc($total_user_sql)){
                                $count++;
                            }
                        ?>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <h1 class=""><?= $count ?></h1>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card pull-up ecom-card-1 bg-white">
        <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted danger position-absolute p-1">Total Orders</h5>
                <div>
                    <i class="material-symbols-rounded warning font-large-1 float-right p-1">receipt</i>
                </div>
                <div class=" ">
                        <?php
                            $total_user_sql = mysqli_query($connect,"SELECT * FROM `order_manage`;");
                            $count = 0;
                            while($t = mysqli_fetch_assoc($total_user_sql)){
                                $count++;
                            }
                        ?>
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <h1 class=""><?= $count ?></h1>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ eCommerce statistic -->

<!-- Statistics -->
<div class="row match-height">
    
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Recent products</h4>
                    <h6 class="card-subtitle text-muted"></h6>
                </div>
                <div id="carousel-area" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                            $i = 0;
                            foreach($recent_product_sql as $rp){
                                $actives = '';
                                if($i == 0){
                                    $actives = 'active';
                                }
                            
                        ?>
                        <li data-target="#carousel-area" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

                        <?php $i++;} ?>
                        <!-- <li data-target="#carousel-area" data-slide-to="1"></li>
                        <li data-target="#carousel-area" data-slide-to="2"></li> -->
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    <?php
                            $i = 0;
                            foreach($recent_product_sql as $rp){
                                $actives = '';
                                if($i == 0){
                                    $actives = 'active';
                                }
                            
                        ?>
                        <div class="carousel-item <?= $actives ?>">
                            <img src="../image/<?= $rp['product_image'] ?>" class="d-block w-100" style=" max-height:400px ;" alt="Slide">
                        </div>

                        <?php $i++;} ?>

                    </div>
                    <a class="carousel-control-prev" href="#carousel-area" role="button" data-slide="prev">
                            <span class="la la-angle-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                    <a class="carousel-control-next" href="#carousel-area" role="button" data-slide="next">
                            <span class="la la-angle-right icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Buyers</h4>
                <a class="heading-elements-toggle">
                    <i class="fa fa-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a data-action="reload">
                                <i class="ft-rotate-cw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="recent-buyers" class="media-list">
                   <?php
                   
                    $recent_user_sql = mysqli_query($connect,"SELECT * FROM  user_reg where verify_status=1 order by uid desc limit 5");
                    while($ru = mysqli_fetch_assoc($recent_user_sql)){
                        $id = $ru['uid'];
                        $info = mysqli_query($connect,"SELECT * from user_info where user_id = '$id'");
                        $in = mysqli_fetch_assoc($info);
                   ?>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-online">
                                <img class="media-object rounded-circle" src="../image/<?= $in['user_image'] ?>" alt="Generic placeholder image">
                                <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <span class="list-group-item-heading"><?= $ru['email'] ?>

                            </span>
                   
                        </div>
                    </a>

                    <?php }?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Statistics -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2022  &copy; Wisteria Plant Copyright</span>
      </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
