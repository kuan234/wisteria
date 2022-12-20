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
           
  
  <?php
  // View and Edit Product Details
if(isset($_POST['editsavebtn'])){
  $pname = $_POST['productname'];
  $pid = $_POST['productid'];
  $pdesc = $_POST['description'];
  $pprice = $_POST['price'];
  $pqty = $_POST['quantity'];
  $pctg = $_POST['category'];

  if(isset($_FILES["image"]["name"])){
  $imageName = $_FILES["image"]["name"];
  $imageSize = $_FILES["image"]["size"];
  $tmpName = $_FILES["image"]["name"];

  // Image validation
  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $imageName);
  $imageExtension = strtolower(end($imageExtension));
  if (!in_array($imageExtension, $validImageExtension)){
    echo '<script type="text/javascript">swal("", "Invalid Image Extension", "Error");</script>';
  }
  elseif ($imageSize > 1200000){
    echo '<script type="text/javascript">swal("", "Image Size Too Large", "Error");</script>';
  }
  else{
    $newImageName = $imageName; // Generate new image name
    //move_uploaded_file($tmpName, './image/' .$newImageName);
    $fnm = $_FILES["image"]["name"];
    $dst="../image/upload_image/" .$fnm;
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
    $imgudp = "UPDATE `product` SET `product_image`='$newImageName' WHERE `prodID`='$pid'";
    $imgudp_run = mysqli_query($connect,"$imgudp");
  }
  }

  $udpsql = "UPDATE `product` SET `product_name`='$pname',`product_price`='$pprice',`description`='$pdesc',`quantity`='$pqty',`category`='$pctg' WHERE `prodID`='$pid'";
  $udpsql_run = mysqli_query($connect,"$udpsql");

    if($udpsql_run || $imgudp_run){
      echo '<script type="text/javascript">swal("Saved", "New Record Saved", "success");</script>';  
  }

}



//Add Admin
if(isset($_POST['addbtn'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $aemail = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm'];
    $arole = $_POST['role'];

    $checkemail = mysqli_query($connect,"SELECT * FROM admlogin WHERE emailaddress = '$aemail'");
    if(mysqli_num_rows($checkemail)>0)
    {
        echo '<script type="text/javascript">swal("Wrong", "Email Already Exists", "error");</script>'; 
    }else if($password === $cpassword)
    {
        $insertsql = "";
        $addadm = mysqli_query($connect,"INSERT INTO `admlogin`( `firstname`, `lastname`, `emailaddress`, `pw`, `role_as`) 
                                        VALUES ('$fname','$lname','$aemail','$password','$arole')");

        if($addadm){
            echo '<script type="text/javascript">swal("Saved", "Admin Added", "success");</script>';
        }
    }else
    {
        echo '<script type="text/javascript">swal("Wrong", "Password and Confirm Password Must Same", "error");</script>';
    }
    

}




// Delete/Hide the Admin 
if(isset($_GET['delete'])){
  $remove_id = $_GET['delete'];
  mysqli_query($connect, "UPDATE `product` SET `is_delete` = '1' WHERE `prodID` = '$remove_id'");
  header('location:view_product.php');
};



?>








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
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="theme-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><span class="user-name text-bold-700 ml-1">John Doe</span></span></a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a>
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
          <li class=" nav-item "><a href="view_order.php"><i class="material-symbols-rounded">receipt_long</i><span class="menu-title" data-i18n="">Orders</span></a>
           
          </li>
          <li class=" nav-item active"><a href="view_admin.php"><i class="material-symbols-rounded">manage_accounts</i><span class="menu-title" data-i18n="">Staffs</span></a>
            
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
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Name</th>
                                <th scope="col" class="text-center">Email</th>
                                <th scope="col" class="text-center">Role As</th>
                                <th scope="col" class="text-center">Created At</th>
                                <th colspan="2" class="text-center">Action</th>
                                </tr>
                </thead>

              <tbody>
                <?php
                $viewadmin = "SELECT * FROM `admlogin` ";

                $sql_run = mysqli_query($connect,"$viewadmin");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      
                        while($row = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $row['admid'];?></th>
                    <td class="fs-5 text-center"><?php echo $row['firstname'] .$row['lastname'];?></th>
                    <td class="fs-5 text-center"><?php echo $row['emailaddress'];?></td>
                    <td class="fs-5 text-center"><?php echo $row['role_as']?></td>
                    <td class="fs-5 text-center"><?php echo $row['created_at']?></td>
                 
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal">
                      Edit
                      
                    </button>
                          <!--Edit & View  Modal -->
                      <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductID">Product ID</label>
                                        <input class="form-control" name="productid" id="inputProductID" type="text" placeholder="Product ID" value="" readonly>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductname">Product Name</label>
                                        <input class="form-control" name="productname" id="inputProductname" type="text" placeholder="Product Name" value="">
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="description">Description</label>
                                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description" ><?php ?></textarea>
                                    
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="Category">Category</label>
                                      <select class="form-select" name="category"  value="">
                                        
                                        <?php
                                          $sqlctg = "SELECT * FROM category";
                                          $sqlctg_run = mysqli_query($connect,"$sqlctg");
                                          $pcat = $row['category'];
                                          if(mysqli_num_rows($sqlctg_run)>0)
                                          {
                                            if($pcat == null)
                                              {
                                                ?>
                                                  <option selected>NULL </option>
                                                <?php
                                              }
                                            
                                            while($ctg = mysqli_fetch_assoc($sqlctg_run))
                                            {
                                                
                                                $cname = $ctg['category_name'];
                                              ?>
                                              <?php 
                                              if($pcat == $cname)
                                              {
                                                ?>
                                                  <option selected><?php echo $row['category'] ?></option>
                                                <?php
                                              }
                                              else{
                                              ?>
                                              <option value="<?php echo $ctg['category_name']?>">
                                              <?php echo $ctg['category_name'];?></option><?php
                                              }

                                            }
                                            
                                          }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="price">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">RM</span>
                                            </div>
                                            <input class="form-control" name="price" id="inputprice" type="number" placeholder="Price " value="<?php echo $row['product_price'];?>" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="quantity">Quantity</label>
                                      <input class="form-control" type="number" id="quantity" name="quantity" placeholder="Enter Your Quantity" value="<?php echo $row['quantity'];?>" min="1">
                                    </div>
                                </div>
                                
                                <!-- Product picture -->
                                <div class="col">
                                  <!-- Profile picture card-->
                                  <div class="card ">
                                      <div class="card-header">Product Picture</div>
                                      <div class="card-body text-center">
                                          <!-- Profile picture image-->
                                          <img class="img-fluid mb-2" name="preview" id="preview" src="../image/<?php echo $row['product_image']; ?>" onclick="triggerClick()" alt="">
                                          <!-- Profile picture help block-->
                                          <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                          <!-- Profile picture upload button-->
                                          <input class="btn btn-primary" name="image" id="image" type="file" onchange="loadImage(this)"  accept=".jpg, .jpeg, .png" >

                                      </div>
                                  </div>
                              </div>

                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="editsavebtn" type="submit">Save changes</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                     <!-- ############################################################################################################### --> 

                    <a href=""  ><button type="submit" class="btn btn-danger text-white" >
                    Delete
                    </button></a>
                  </td>
                
                </tr>

                <?php

                    }}?>
              </tbody>
            </table>
               

              
            <?php  
                $checkrole = mysqli_query($connect,"SELECT * FROM admlogin WHERE role_as = 1");
                if(mysqli_num_rows($checkrole)>0){
                 ?>   <button class="btn btn-primary" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" >Add Admin</button>
             <?php   
                }else
                {
                  ?>  <button class="btn btn-primary" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" disabled>Add Admin</button> <?php
                }
            ?>
            

            <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Add New Admin";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="adminid">Admin ID</label>
                                        <input class="form-control" name="adminid" id="adminid" type="text" placeholder="Admin ID" value=" " disabled>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="firstname">First Name</label>
                                        <input class="form-control" name="firstname" id="firstname" type="text" placeholder="First Name" value="" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="lastname">Last Name</label>
                                        <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Last Name" value="" required>
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="" required>
                                    
                                </div>

                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" value="" required>
                                    
                                </div>

                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="confirm">Confirm Password</label>
                                        <input class="form-control" type="password" name="confirm" id="confirm" placeholder="Confirm Password" value="" required>
                                    
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="role">Role As</label>
                                      <select class="form-select" name="role"  value="">
     
                                            <option selected>SELECT </option>

                                            <option value="1">SuperAdmin</option>
            
                                            <option value="0">Admin</option>
                                      </select>
                                    </div>
                                </div>
                                
                               

                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="addbtn" type="submit">Add Admin</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
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



