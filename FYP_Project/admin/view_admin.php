<?php
session_start();
include('connection.php');
$roleid = $_SESSION['admin_role'];
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
  // View and Edit Admin Details
if(isset($_POST['editsavebtn'])){
  $editadminid = $_POST['eadminid'];
  $editfname = $_POST['efirstname'];
  $editlname = $_POST['elastname'];
  $editrole = $_POST['erole'];
  
  if($editrole == '0')
  {
    $editsql = "UPDATE `admlogin` SET `firstname`='$editfname', `lastname`='$editlname', `role_as`='0' WHERE `admid` ='$editadminid' ";
    $editsql_run = mysqli_query($connect,"$editsql");
    if($editsql_run)
    {
      echo '<script type="text/javascript">swal("Saved", "Updated Admin Successful", "success");</script>';
    }
    else
    {
      echo '<script type="text/javascript">swal("", "Something Wrong!", "error");</script>';
    }
  }
  else
  {
    $editsql = "UPDATE `admlogin` SET `firstname`='$editfname', `lastname`='$editlname', `role_as`='$editrole' WHERE `admid` = '$editadminid' ";
    $editsql_run = mysqli_query($connect,"$editsql");
    if($editsql_run)
    {
      echo '<script type="text/javascript">swal("Saved", "Updated SuperAdmin Successful", "success");</script>';
    }
    else
    {
      echo '<script type="text/javascript">swal("", "Something Wrong!", "error");</script>';
    }
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


//delete admin 
if(isset($_GET['delete'])){
  $remove_id = $_GET['delete'];
  mysqli_query($connect, "DELETE FROM `admlogin` WHERE `admid` = '$remove_id'");
  header('location:view_admin.php');
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
          <li class=" nav-item "><a href="view_product.php"><i class="material-symbols-rounded">potted_plant</i><span class="menu-title" data-i18n="">Products</span></a>
           
                </li>
          <li class=" nav-item"><a href="view_category.php"><i class="material-symbols-rounded">category</i><span class="menu-title" data-i18n="">Category</span></a>
           
          </li>
          <li class=" nav-item "><a href="view_order.php"><i class="material-symbols-rounded">receipt_long</i><span class="menu-title" data-i18n="">Orders</span></a>
           
          </li>
          <li class=" nav-item active"><a href="view_admin.php"><i class="material-symbols-rounded">manage_accounts</i><span class="menu-title" data-i18n="">Admins</span></a>
            
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

                <table class="table table-striped" width="100%" id="myTable">
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
                $editadmin = "SELECT * FROM `admlogin` ";

                $sql_run = mysqli_query($connect,"$editadmin");
                
                    if(mysqli_num_rows($sql_run)>0)
                    {
                      $i=1;
                        while($e1 = mysqli_fetch_assoc($sql_run)){
                    
                    
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $i++?></th>
                    <td class="fs-5 text-center"><?php echo $e1['firstname'] .$e1['lastname'];?></th>
                    <td class="fs-5 text-center"><?php echo $e1['emailaddress'];?></td>
                    <td class="fs-5 text-center">
                      <?php 
                        if($e1['role_as']==0)
                        {
                          echo "Admin";
                        }
                        else
                        {
                          echo "SuperAdmin";
                        }
                      ?>
                      </td>
                    <td class="fs-5 text-center"><?php echo $e1['created_at']?></td>
                 
                  <td class="text-center">
                     <!-- ############################################################################################################### --> 
                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $e1['admid']?>">
                      Edit
                      
                    </button>
                          <!--Edit & View  Modal -->      
            <div class="modal fade " id="editModal<?php echo $e1['admid']?>" <?php $_SESSION['editid'] = $e1['admid'] ?> tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
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
                                        <input class="form-control" name="eadminid" id="adminid" type="text" placeholder="Admin ID" value="<?php echo $e1['admid']?> " readonly>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="firstname">First Name</label>
                                        <input class="form-control" name="efirstname" id="firstname" type="text" placeholder="First Name" value="<?php echo $e1['firstname']?>" readonly>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="lastname">Last Name</label>
                                        <input class="form-control" name="elastname" id="lastname" type="text" placeholder="Last Name" value="<?php echo $e1['lastname']?>" readonly>
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" type="eemail" name="email" id="email" placeholder="Email" value="<?php echo $e1['emailaddress'] ?>" readonly>
                                    
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                      
                                      <label class="small mb-1" for="role">Role As</label>
                                      <?php if($_SESSION['admin_role']== '1') {?>
                                      <select class="form-select" name="erole"  value="<?php echo $e1['role_as']?>" >
     
                                            <option value="<?php echo $e1['role_as']?>" selected >
                                            <?php 
                                              if($e1['role_as'] == 1)
                                                echo "1 - SuperAdmin 1" ;
                                              else
                                                echo "0 - Admin";
                                            ?> </option>
                                            <option value="0">0 - Admin</option>
                                            <option value="1">1 - SuperAdmin</option>
                                        <?php } 
                                            else{
                                        ?>
                                          <select class="form-control" name="erole" value="<?php echo $e1['role_as']?>" disabled>
     
                                            <option value="<?php echo $e1['role_as']?>" selected >
                                            <?php 
                                              if($e1['role_as']==1)
                                              echo "1 - SuperAdmin 0";
                                            else
                                              echo "0 - Admin";
                                            ?> </option>
                                            <option value="0">0 - Admin</option>
                                            <option value="1">1 - SuperAdmin</option>

                                            <?php        
                                            }
                        
                                        
                                        ?>

                                            
                                      </select>
                                    </div>
                                </div>
                                
                               

                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="editsavebtn" type="submit">Save Changes</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
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
               

              
            <?php  
                $checkrole = mysqli_query($connect,"SELECT * FROM admlogin WHERE role_as = 1 AND admid = ".$_SESSION['admin_id'] );
                if(mysqli_num_rows($checkrole)>0){
                  while($cr = mysqli_fetch_assoc($checkrole)){

                       ?> <button class="btn btn-primary" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" >Add Admin</button>
  
             <?php   }
                }else
                {
                  ?>  <button class="btn btn-primary" name="modaladdbtn" type="submit" data-bs-toggle="modal" data-bs-target="#addModal" disabled>Add Admin</button> 
                  <?php
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
                                      <select class="form-select" name="role"  required>
     
                                            <option value="" selected >SELECT </option>
                                            <option value="0">0 - Admin</option>
                                            <option value="1">1 - SuperAdmin</option>
            
                                            
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
    <script src = "search.js"></script>

  </body>
</html>



