<?php
session_start();
include('connection.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>View Customer</title>
    <link rel="icon" href="../image/logo.png">
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <!--ICON-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet">
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



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
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!---navbar SIDEBAR-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
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
          <li class=" nav-item active ">
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
          <li class=" nav-item"><a href="settings.php"><i class="material-symbols-rounded">settings</i><span class="menu-title" data-i18n="">Settings</span></a>
          </li>
          <li class=" nav-item"><a href="logout.php"><i class="material-symbols-rounded">logout</i><span class="menu-title" data-i18n="">Logout</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>

    <div class="app-content content">
      <div class="content-wrapper mt-3">
        </div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            
    <div class="row match-height">
        <div class="col-12">
            <div class="container-fluid">
            <table class="table table-striped fs-5 " width="100%">
              <thead class="table-dark">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Email</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-center">Created At</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $viewcus = "SELECT * FROM `user_reg`";

                $sql_run = mysqli_query($connect,"$viewcus");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      $i=1;
                        while($row = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                  <th scope="row" class="text-center"><?php echo $i++;?></th>
                  <td class="text-center"><?php echo $row['email']?></td>
                  <td class="text-center">
                    <?php 
                    if($row['verify_status']==0)
                    {
                      echo "Unactivated";
                    }
                    else
                    {
                      echo "Actived";
                    }
                    
                    ?>
                    </td>
                  <td class="text-center"><?php echo $row['created_at']?></td>
                </tr>

                <?php

                    }}
                    ?>
              </tbody>
            </table>


            </div>
        </div>
    </div>



    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow fixed-bottom">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2022  &copy; Wisteria Plant Copyright</span>
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
  </body>
</html>
