<?php
session_start();
include('connection.php');
if(!isset($_SESSION['admin_id']))
{
    ?>
    <script>window.location.href="admlogin.php"</script>
    <?php
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>


  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
           
    <?php
        include('admin_header.php');
    ?>


<?php
// Update Delivered Status
if(isset($_POST['statussavebtn']))
{
    $edit_status = $_POST['status'];
    $edit_status_id = $_POST['order_status_id'];
    $status_update_sql = mysqli_query($connect,"UPDATE `order_manage` SET `status`='$edit_status' WHERE orderID = '$edit_status_id'");
    if($status_update_sql)
    {
        echo '<script type="text/javascript">swal("Status Updated.","", "success");</script>';
    }
}
?>




    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!---navbar-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">       
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><img class="brand-logo" alt="Wisteria admin logo" src="../image/logo.png"/>
              <h3 class="brand-text">Wisteria Plant</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="index.php"><i class="material-symbols-rounded">account_circle</i><span class="menu-title" data-i18n="">Dashboard</span></a>
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
          <li class=" nav-item"><a href="view_order.php"><i class="material-symbols-rounded">receipt_long</i><span class="menu-title" data-i18n="">Orders</span></a>
           
          </li>
          <li class=" nav-item "><a href="view_admin.php"><i class="material-symbols-rounded">manage_accounts</i><span class="menu-title" data-i18n="">Admins</span></a>
            
          </li>
          <li class=" nav-item"><a href="reports.php"><i class="material-symbols-rounded">monitoring</i><span class="menu-title" data-i18n="">Reports</span></a>
          </li>
          <li class=" nav-item active"><a href="contactform.php"><i class="material-symbols-rounded">edit_note</i><span class="menu-title" data-i18n="">Contact</span></a>
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
      <div class="content-wrapper mt-3">
        </div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            
    <div class="row match-height">
        <div class="col-12">
            <div class="container-fluid">

                <table class="table table-striped" width="100%" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Contact Name</th>
                                <th scope="col" class="text-center">Contact Email</th>
                                <th colspan="2" class="text-center">Message</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $viewcontact = "SELECT * FROM `contact`";

                                $sql_run = mysqli_query($connect,"$viewcontact");
                                
                                    if(mysqli_num_rows($sql_run)>0)
                                    {
                                        $i=1;
                                        while($row = mysqli_fetch_assoc($sql_run)){
                                ?>
                                <tr>
                                <th scope="row" class="text-center"><?php echo $i++;?></th>
                                    <th scope="row" class="text-center"><?php echo $row['contact_name'];?></th>
                                    
                                    <td class="fs-5 text-center"><?php echo $row['contact_email']?></td>
                                    
                                    <td class="fs-5 text-center">
                                        <button type="submit" class="btn btn-primary text-white" data-toggle="modal" data-target="#DetailModal<?php echo $row['id'] ?>">
                                            Details
                                        </button>
                                        <!-- Detail Modal -->
                                        <div class="modal fade " id="DetailModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content ">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title " id="detailLabel"><?php echo "Contact Message From ".$row['contact_name'] ;?></h5>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <!-- Form Row-->
                                                            <div class="row gx-3 mb-3">
                                                                <label class="small mb-1" for="inputstatusname">Email</label>
                                                                <input class="form-control" type="text"  value="<?= $row['contact_email']?>" readonly>                                                              

                                                            </div>

                                                            <div class="row gx-3 mb-3">
                                                                <label class="small mb-1" for="inputstatusname">Phone</label>
                                                                <input class="form-control" type="text"  value="+60<?= $row['contact_phone']?>" pattern="" placeholder="0123456789"readonly>                                                              

                                                            </div>

                                                            <div class="row gx-3 mb-3">
                                                                <label class="small mb-1" for="inputstatusname">Message</label>
                                                                <textarea class="form-control" rows="7" readonly><?= $row['contact_message']?></textarea>                                                                   

                                                            </div>
                                                            
                                                        </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                            
                                                    </div>
                                                    </div>
                                                </div>
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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END JS-->
    <!-- END PAGE LEVEL JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src = "search.js"></script>

  </body>
</html>