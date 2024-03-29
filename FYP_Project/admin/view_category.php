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
//Add New Product Category
if(isset($_POST['addbtn'])){
  $cname = $_POST['categoryname'];

  $chkcategory = mysqli_query($connect,"SELECT * FROM category where `category_name` = '$cname'");
    if(mysqli_num_rows($chkcategory)>0)
    {
      echo '<script type="text/javascript">swal("Failed", "Category Name exists", "info");</script>';
    }
    else
    {
      $insertsql = "INSERT INTO `category`( `category_name`) 
      VALUES ('$cname') ";
      $insertsql_run = mysqli_query($connect,"$insertsql");
      if($insertsql_run){
        echo '<script type="text/javascript">swal("Saved", "Category added", "success");</script>';  
    }
    }
    
    
}

//edit category & update
if(isset($_POST['savebtn'])){
  $cname = $_POST['categoryname'];
  $cid = $_POST['categoryid'];

  $chkcategory = mysqli_query($connect,"SELECT * FROM category where `id` = '$cid'");
    if(mysqli_num_rows($chkcategory)>0)
    {
      $update_sql = mysqli_query($connect,"UPDATE `category` SET `category_name`='$cname' WHERE `id` = '$cid'");
      if($update_sql){echo '<script type="text/javascript">swal("Updated Category Successfully", "", "success");</script>';}
      
    }
    else
    {
      echo '<script type="text/javascript">swal("Please Type Correct Information", "", "wrong");</script>';
    }
    
    
}




// Delete/Hide the Category 
if(isset($_GET['delete'])){
  $remove_id = $_GET['delete'];
  $chk_category = mysqli_query($connect, "SELECT * FROM product,category WHERE product.category = category.id AND product.category = '$remove_id'");
  if(mysqli_num_rows($chk_category)>0)
  {
    echo '<script type="text/javascript">swal("Cannot Delete Category.", "There are product inside the category", "info");</script>';  
  }
  else
  {
    $delete_sql = mysqli_query($connect,"UPDATE `category` SET `status`=1 WHERE `id` = '$remove_id'");
    if($delete_sql)
    {
      echo '<script type="text/javascript">swal("Category Deleted.","", "success");</script>';  
    }
  }
  
};

//restore category
if(isset($_GET['restore'])){
  $remove_id = $_GET['restore'];
  $chk_category = mysqli_query($connect, "SELECT * FROM category WHERE id = '$remove_id'");
  if(mysqli_num_rows($chk_category)>0)
  {
    $restore_sql = mysqli_query($connect,"UPDATE `category` SET `status`=0 WHERE `id` = '$remove_id'");
    if($restore_sql)
    {
      echo '<script type="text/javascript">swal("Category Restored Sucessfully.","", "success");</script>';  
    }  
  }

  
};

?>


    <?php
        include('admin_header.php');
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
          <li class=" nav-item"><a href="view_product.php"><i class="material-symbols-rounded">potted_plant</i><span class="menu-title" data-i18n="">Products</span></a>
           
                </li>
          <li class=" nav-item active"><a href="view_category.php"><i class="material-symbols-rounded">category</i><span class="menu-title" data-i18n="">Category</span></a>
           
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
      <div class="content-wrapper mt-3">
        </div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            
      <div class="row match-height">
        <div class="col-12">
            <div class="container-fluid">

            <table class="table table-striped fs-5 " width="100%" id="myTable">
              <thead class="table-dark">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Category Name</th>
                  <th colspan="2" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $viewcat = "SELECT * FROM `category`";

                $sql_run = mysqli_query($connect,"$viewcat");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      $i=1;
                        while($row = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                  <th scope="row" class="text-center"><?php echo $i++?></th>
                  <td class="text-center"><?php echo $row['category_name']?></td>     
                  <td class="text-center">
                  <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']?>">
                      Edit
                      
                    </button>
                    <!-- Modal Edit Category -->
                    <div class="modal fade " id="editModal<?php echo $row['id']?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Edit Product Category ";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputcategoryid">Category ID</label>
                                        <input type="hidden" id="inputcategoryid" name="categoryid" value="<?php echo $row['id']?>">
                                        <input class="form-control" name="categoryid" id="inputcategoryid" type="text" placeholder="Category ID" value="<?php echo $row['id']?> " disabled>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputcategoryname">Category Name</label>
                                        <input class="form-control" name="categoryname" id="inputcategoryname" type="text" placeholder="Enter Category Name" value="<?php echo $row['category_name']?>" required>
                                    </div>

                                </div>
                                
                              </div>

                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="savebtn" type="submit">Save Change</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                        </form>
                        </div>
                        </div>
                        </div>
                    
                    <?php 
                      if($row['status']== 0)
                      {
                        ?>
                        <a href="view_category.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Remove <?php echo $row['category_name'];?> From Category?')" ><button type="submit" class="btn btn-danger text-white" >
                    Delete
                    </button></a>
                    <?php
                      }
                      else
                      {
                        ?>
                        <a href="view_category.php?restore=<?php echo $row['id'] ?>" onclick="return confirm('Restore <?php echo $row['category_name'];?> From Category?')" ><button type="submit" class="btn btn-success " >
                    Restore
                    </button></a>
                        <?php
                      }
                    ?>
                    
                    
                </td>  
                </tr>           

                <?php

                    }}
                    ?>
              </tbody>
            </table>

            <button class="btn btn-primary mb-4" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" >Add Category</button>
                    
                    <!-- Modal Add Category -->
                    <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Add New Product Category ";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputcategoryid">Category ID</label>
                                        <input class="form-control" name="categoryid" id="inputcategoryid" type="text" placeholder="Category ID" value=" " disabled>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputcategoryname">Category Name</label>
                                        <input class="form-control" name="categoryname" id="inputcategoryname" type="text" placeholder="Enter Category Name" value="" required>
                                    </div>

                                </div>
                                
                              </div>

                              
                            
                           
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="addbtn" type="submit">Add Category</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



            </div>
        </div>
                
         </div> <!------- close div for app-content------>
          


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
    <script src = "search.js"></script>
  </body>
</html>



