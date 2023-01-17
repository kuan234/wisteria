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
<script>var i =0;</script>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>


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
  $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
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
    $dst="../image/" .$fnm;
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
  // echo $pctg;

}



//Add Product
if(isset($_POST['addbtn'])){
  $pname = $_POST['productname'];
  
  $pdesc = $_POST['description'];
  $pprice = $_POST['price'];
  $pqty = $_POST['quantity'];
  $pctg = $_POST['category'];

  if(isset($_FILES["aimage"]["name"])){
  $imageName = $_FILES["aimage"]["name"];
  $imageSize = $_FILES["aimage"]["size"];
  $tmpName = $_FILES["aimage"]["name"];

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
    $fnm = $_FILES["aimage"]["name"];
    $dst="../image/upload_image/" .$fnm;
    move_uploaded_file($_FILES["aimage"]["tmp_name"],$dst);

    $chkproduct = mysqli_query($connect,"SELECT * FROM product where `product_name` = '$pname'");
    if(mysqli_num_rows($chkproduct)>0)
    {
      echo '<script type="text/javascript">swal("Failed", "Product Name cannot be same", "info");</script>';
    }
    else
    {
      $insertsql = "INSERT INTO `product`( `product_name`, `product_price`, `product_image`, `description`, `quantity`, `category`, `is_delete`) 
      VALUES ('$pname','$pprice','$newImageName','$pdesc','$pqty','$pctg','0') ";
      $insertsql_run = mysqli_query($connect,"$insertsql");
      if($insertsql_run){
        echo '<script type="text/javascript">swal("Saved", "New Record Saved", "success");</script>';  
    }
    }
    
    
  }
  }
}




// Delete/Hide the Product 
if(isset($_GET['delete'])){
  $remove_id = $_GET['delete'];
  mysqli_query($connect, "UPDATE `product` SET `is_delete` = '1' WHERE `prodID` = '$remove_id'");
  header('location:view_product.php');
};

// Restore the Product
if(isset($_GET['restore'])){
  $restore_id = $_GET['restore'];
  mysqli_query($connect, "UPDATE `product` SET `is_delete` = '0' WHERE `prodID` = '$restore_id'");
  header('location:view_product.php');
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
          <li class=" nav-item active"><a href="view_product.php"><i class="material-symbols-rounded">potted_plant</i><span class="menu-title" data-i18n="">Products</span></a>
           
                </li>
          <li class=" nav-item "><a href="view_category.php"><i class="material-symbols-rounded">category</i><span class="menu-title" data-i18n="">Category</span></a>
           
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
        </div>
        <div class="content-header row">
        </div>
        <div class="content-body">
            
    <div class="row match-height">
        <div class="col-12">
            <div class="container-fluid">

            <ul class="nav nav-pills mb-3 float-right" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-available-tab" data-bs-toggle="pill" data-bs-target="#pills-available" type="button" role="tab" aria-controls="pills-available" aria-selected="true">Available</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-unavailable-tab" data-bs-toggle="pill" data-bs-target="#pills-unavailable" type="button" role="tab" aria-controls="pills-unavailable" aria-selected="false">Unavailable</button>
                </li>
                
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-available" role="tabpanel" aria-labelledby="pills-available-tab">
                <table class="table table-striped" width="100%" id="myTable">
              <thead class="table-dark">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Image</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Description</th>
                  <th scope="col" class="text-center">Price</th>
                  <th scope="col" class="text-center">Quantity</th>
                  <th colspan="2" class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $viewcus = "SELECT * FROM `product` WHERE `is_delete` = 0 order by product_name";

                $sql_run = mysqli_query($connect,"$viewcus");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      $i=1; 
                        while($row = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                  <th scope="row" class="text-center"><?php echo $i++ ;?></th>
                  <td class="text-center"><img src= "../image/<?php echo $row['product_image']; ?>" alt="" height="80" width="80"></td>
                  <td class="fs-5 text-center"><?php echo $row['product_name']?></td>
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                     <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#DescModal<?php echo $row['prodID']?>">
                        Description
                      </button>

  

                      <!--Description Modal -->
                      <div class="modal fade " id="DescModal<?php echo $row['prodID']?>" tabindex="-1" aria-labelledby="DescModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="DescModalLabel"><?php echo $row['product_name']; echo " - Description";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                              <?php echo $row['description']?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>

                     <!-- ############################################################################################################### --> 
                  </td>

                  <td class="fs-5 text-center"><?php echo "RM " .$row['product_price']?></td>
                  <td class="fs-5 text-center"><?php echo $row['quantity'] ?></td>
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['prodID']?>">
                      Edit
                      <?php
                      $_SESSION['pid'] = $row['prodID'];
                      ?>
                    </button>
                          <!--Edit & View  Modal -->
                      <div class="modal fade " id="editModal<?php echo $row['prodID']?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Product Detail";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductID">Product ID</label>
                                        <input class="form-control" name="productid" id="inputProductID" type="text" placeholder="Product ID" value="<?php echo $row['prodID']; ?>" readonly>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductname">Product Name</label>
                                        <input class="form-control" name="productname" id="inputProductname" type="text" placeholder="Product Name" value="<?php echo $row['product_name'];?>">
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="description">Description</label>
                                        <textarea class="form-control" rows="3" name="description" id="productdesc<?php echo $row['prodID']; ?>" placeholder="Description" ><?php echo $row['description'];?></textarea>
                                    <script>
                                    CKEDITOR.replace('productdesc<?php echo $row['prodID'];?>');
                                  </script>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="Category">Category</label>
                                      <select class="form-select" name="category" value="<?php $row['category'];?>" >

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
                                                
                                                $cname = $ctg['id'];
                                              ?>
                                              <?php 
                                              if($pcat == $cname)
                                              {
                                                echo "<option selected='selected' value='".$row['category']."'>".$ctg['category_name']."</option>";
                                                
                                              }
                                              else{
                                              ?>
                                              <option value="<?php echo $ctg['id']?>">
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
                                      <input class="form-control" type="number" id="quantity" name="quantity" placeholder="Enter Your Quantity" value="<?php echo $row['quantity'];?>" min="0">
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
                                          <input class="files btn btn-primary" name="image" id="image" type="file"  accept=".jpg, .jpeg, .png" >
                                          <?php $editimage = $row['product_image']; ?>
                                          <!-- onchange="loadImage(this)"  -->
                                      </div>
                                  </div>
                              </div>

                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="editsavebtn" type="submit">Save changes</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      
                     <!-- ############################################################################################################### --> 

                    <a href="view_product.php?delete=<?php echo $row['prodID'] ?>" onclick="return confirm('remove <?php echo $row['product_name'] ?> from product?')" ><button type="submit" class="btn btn-danger text-white" >
                    Delete
                    </button></a>
                  </td>
                
                </tr>

                <?php

                    }}?>
              </tbody>
            </table>
                </div>


                <div class="tab-pane fade" id="pills-unavailable" role="tabpanel" aria-labelledby="pills-unavailable-tab">
                <table class="table table-striped" width="100%" id="myTable">
              <thead class="table-dark">
                <tr>
                  <th scope="col" class="text-center">No</th>
                  <th scope="col" class="text-center">Image</th>
                  <th scope="col" class="text-center">Name</th>
                  <th scope="col" class="text-center">Description</th>
                  <th scope="col" class="text-center">Price</th>
                  <th scope="col" class="text-center">Quantity</th>
                  <th colspan="2" class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $viewcus = "SELECT * FROM `product` WHERE `is_delete` = 1 order by product_name ";

                $sql_run = mysqli_query($connect,"$viewcus");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      $i=1;
                        while($row = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                  <th scope="row" class="text-center"><?php  echo $i++ ;?></th>
                  <td class="text-center"><img src= "../image/<?php echo $row['product_image']; ?>" alt="" height="80" width="80"></td>
                  <td class="fs-5 text-center"><?php echo $row['product_name']?></td>
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                     <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#DescModal<?php echo $row['prodID']?>">
                        Description
                      </button>

  

                      <!--Description Modal -->
                      <div class="modal fade " id="DescModal<?php echo $row['prodID']?>" tabindex="-1" aria-labelledby="DescModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="DescModalLabel"><?php echo $row['product_name']; echo " - Description";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                              <?php echo $row['description']?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                          </div>
                        </div>
                      </div>

                     <!-- ############################################################################################################### --> 
                  </td>

                  <td class="fs-5 text-center"><?php echo "RM " .$row['product_price']?></td>
                  <td class="fs-5 text-center"><?php echo $row['quantity'] ?></td>
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#reditModal<?php echo $row['prodID']?>">
                      Edit
                      <?php
                      $_SESSION['pid'] = $row['prodID'];
                      ?>
                    </button>
                          <!--Edit & View  Modal -->
                      <div class="modal fade " id="reditModal<?php echo $row['prodID']?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Product Detail";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductID">Product ID</label>
                                        <input class="form-control" name="productid" id="inputProductID" type="text" placeholder="Product ID" value="<?php echo $row['prodID']; ?>" readonly>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductname">Product Name</label>
                                        <input class="form-control" name="productname" id="inputProductname" type="text" placeholder="Product Name" value="<?php echo $row['product_name'];?>">
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="description">Description</label>
                                        <textarea class="form-control" rows="3" name="description" id="reproductdesc<?php echo $row['prodID'];?>" placeholder="Description" ><?php echo $row['description'];?></textarea>
                                        <script>
                                    CKEDITOR.replace('reproductdesc<?php echo $row['prodID'];?>');
                                  </script>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="Category">Category</label>
                                      <select class="form-select" name="category" value="<?php $row['category'];?>" >

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
                                                
                                                $cname = $ctg['id'];
                                              ?>
                                              <?php 
                                              if($pcat == $cname)
                                              {
                                                //selected option and pass category ID and display the category name
                                                echo "<option selected='selected' value='".$row['category']."'>".$ctg['category_name']."</option>";
                                                
                                              }
                                              else{
                                              ?>
                                              <option value="<?php echo $ctg['id']?>">
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
                                          <input class="files btn btn-primary" name="image" id="image" type="file" accept=".jpg, .jpeg, .png .webp" >
 <!-- onchange="loadImage(this)"  -->
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

                    <a href="view_product.php?restore=<?php echo $row['prodID'] ?>" onclick="return confirm('Available Product?')" ><button type="submit" class="btn btn-danger text-white" >
                    Restore
                    </button></a>
                  </td>
                
                </tr>

                <?php

                    }}?>
              </tbody>
            </table>
                </div>
                
            </div>

              

            <button class="btn btn-primary mb-4" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" >Add Product</button>
                
            <div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="editLabel"><?php echo "Product Detail";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductID">Product ID</label>
                                        <input class="form-control" name="productid" id="inputProductID" type="text" placeholder="Product ID" value=" " disabled>
                                    </div>
                                  
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputProductname">Product Name</label>
                                        <input class="form-control" name="productname" id="inputProductname" type="text" placeholder="Enter Product Name" value="" required>
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="description">Description</label>
                                        <textarea class="form-control" rows="3" name="description" id="addproductdesc" placeholder="Enter Description" required></textarea>
                                        <script>
                                    CKEDITOR.replace('addproductdesc');
                                  </script>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="Category">Category</label>
                                      <select class="form-select" name="category"  value="" required>
                                        
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
                                            <input class="form-control" name="price" id="inputprice" type="number" placeholder="Price " value="" min="1" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="small mb-1" for="quantity">Quantity</label>
                                      <input class="form-control" type="number" id="quantity" name="quantity" placeholder="Quantity" value="" min="1" required>
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
                                          <input class="files btn btn-primary" name="aimage" id="aimage" type="file"   accept=".jpg, .jpeg, .png" required>
<!-- onchange="addload(this)" -->
                                      </div>
                                  </div>
                              </div>

                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="addbtn" type="submit">Add Product</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



            </div>
        </div>
    </div>



    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow" style="margin-left:0;">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">2022  &copy; Wisteria Plant Copyright</span>
      </div>
    </footer>

    <script>
//     function loadImage(e){
      
//       // if(e.files.length>0){
//       //   e.files = [e.files[1]];
//       // }
      
//       if(e.files[i]){
//         var reader = new FileReader();

//         reader.onload = function(e){

//           document.querySelector('#preview').setAttribute('src',e.target.result);
//         }
//         reader.readAsDataURL(e.files[i]);
//       }
//       i++;
// }


  $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $(".files").on("change", function(e) {
    	var clickedButton = this;
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"pip container border border-dark mt-3 mb-3\">" +
            "<label class=\"container\">Image Preview : </label>" +
            "<img class=\"img-fluid mb-2\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove btn btn-danger mt-3 mb-3\">Remove image</span>" + 
            
            "</div>").insertBefore(clickedButton);
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

// function empimg(e){
//   $("#preview").remove();

//   document.getElementById('preview').src = e.target.result; 

// }
      
    </script>



    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src = "search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    

  </body>
</html>



