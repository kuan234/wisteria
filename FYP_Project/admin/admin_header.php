<?php
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  </head>

  <?php
    if(isset($_POST['profile_edit_btn']))
    {
      $prof_firstname = $_POST['firstname'];
      $prof_lastname = $_POST['lastname'];

      $profile_edit_sql = mysqli_query($connect,"UPDATE `admlogin` SET `firstname`='$prof_firstname',`lastname`='$prof_lastname' WHERE `admid` =" .$_SESSION['admin_id']);
      if($profile_edit_sql)
      {
        ?>
        <script>
           Swal.fire(
              'Saved',
              '',
              'success',
            )
            </script>
            <?php
      }
    }


    if(isset($_POST['change_password_btn']))
    {
      $current = $_POST['current'];
      $newpassword = $_POST['newpassword'];
      $confirm = $_POST['confirm'];

      $result =mysqli_query($connect,"SELECT * FROM admlogin WHERE `admid` =" .$_SESSION['admin_id']);
                    $count=mysqli_num_rows($result);
                    if($count != 0)
                    {
                        $row3=mysqli_fetch_assoc($result);

                            //validation 
                            if($current === $row3['pw'])
                            {

                                if($newpassword === $confirm && $newpassword!=$row3['pw'])
                                { 
                                    $change_pass = mysqli_query($connect, "UPDATE `admlogin` SET `pw` = '$newpassword' WHERE `admid` =" .$_SESSION['admin_id']);
                                    
                                    ?>
                                      <script>
                                        Swal.fire(
                                            'Successfully',
                                            'Password Updated',
                                            'success',
                                          )
                                      </script>
                                    <?php
                                }
                                if($newpassword==$row3['pw'])
                                {
                                  ?>
                                      <script>
                                        Swal.fire(
                                            'Wrong',
                                            'New Password Cannot Same With Current Password',
                                            'error',
                                          )
                                      </script>
                                    <?php
                                }

                                if($newpassword!=$current && $confirm != $newpassword )
                                {
                                  ?>
                                      <script>
                                        Swal.fire(
                                            'Wrong',
                                            'Confirm Password Wrong',
                                            'error',
                                          )
                                      </script>
                                    <?php
                                }
                            }
                            else
                            {
                              ?>
                                      <script>
                                        Swal.fire(
                                            'Wrong',
                                            'Current Password Wrong',
                                            'error',
                                          )
                                      </script>
                                    <?php
                            }
                    }

    }


  ?>

  <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
   
  <style>
    .password_required
    {
        display: none;
    }

    .password_required ul
    {
        padding: 0;
        margin: 0 0 15px;
        list-style: none;
    }

    .password_required ul li
    {
        margin-bottom: 8px;
        color: red;
        font-weight: 700;
    }

    .password_required ul li.active
    {
        color:#29ff5e;
    }

    .password_required ul li span::before
    {
        content:"✖ ";
    }

    .password_required ul li.active span::before
    {
        content:"✔ ";
        
    }
    </style>
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
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"><img src="../image/wisteria.png" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                <?php 
                        $getname = mysqli_query($connect,"SELECT * from admlogin where admid = ".$_SESSION['admin_id']);
                        if(mysqli_num_rows($getname)>0)
                        {
                          while($g = mysqli_fetch_assoc($getname))
                          {
                            ?>
                        
                  <div class="arrow_box_right"><a class="dropdown-item" href="#"><span class="avatar avatar-online"><img src="../image/wisteria.png" alt="avatar"><span class="user-name text-bold-700 ml-1">
                    
                  <?php
                  echo $g['firstname']. " " .$g['lastname'];
                  ?>
                  </span></span></a>
                  <?php
                } 
              }
          ?>
                    <div class="dropdown-divider"></div><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModal" href="#"><i class="ft-user"></i> Edit Profile</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#passwordModal" href="#"><i class="ft-lock"></i> Change Password</a>

                    <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

            <?php
              $profile_sql = mysqli_query($connect,"SELECT * from admlogin where admid = " .$_SESSION['admin_id'] );
              if(mysqli_num_rows($profile_sql)>0)
              {
                while($pf = mysqli_fetch_assoc($profile_sql))
                {
                  
                
            ?>
       <!-- profile modal -->
       <div class="modal fade " id="profileModal" tabindex="-1" aria-labelledby="profileModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="profileLabel"><?php echo "Profile";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="adminid">Admin ID</label>
                                        <input class="form-control" name="adminid" id="adminid" type="text" placeholder="Admin ID" value=" <?php echo $pf['admid'] ?>" disabled>
                                    </div>
                                  
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="firstname">First Name</label>
                                        <input class="form-control" name="firstname" id="firstname" type="text" placeholder="First Name" value="<?php echo $pf['firstname'] ?>" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="lastname">Last Name</label>
                                        <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Last Name" value="<?php echo $pf['lastname'] ?>" required>
                                    </div>

                                </div>
                                <!-- Form Row        -->
                                <div class="mb-3">
                                    <!-- Form Group (location)-->
                                    
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="<?php echo $pf['emailaddress'] ?>" disabled>
                                    
                                </div>
                              
                            
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="profile_edit_btn" type="submit">Save Changes</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



            </div>


            <!-- ######################################################################## -->
            <!-- Change Password Modal -->
       <div class="modal fade " id="passwordModal" tabindex="-1" aria-labelledby="passwordModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content ">
                            <div class="modal-header">
                              <h5 class="modal-title " id="passwordLabel"><?php echo "Change Password";?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-start">
                                <form method='POST' enctype="multipart/form-data" >

                                <div class="mb-3">
                                    <!-- Form Group (location) -->
                                    
                                        <label class="small mb-1" for="password">Current Password</label>
                                        <input class="form-control" type="password" name="current" id="current" placeholder="Password" value="" required>
                                    
                                </div>

                                <div class="mb-3">
                                    <!-- Form Group (location) -->
                                    
                                        <label class="small mb-1" for="password">New Password</label>
                                        <input class="form-control" type="password" name="newpassword" id="password" placeholder="Password" value="" onfocus="passwordvalidation()" required>

                                </div>

                                <div class="mb-3">
                                    <!-- Form Group (location) -->
                                    
                                        <label class="small mb-1" for="confirm">Confirm Password</label>
                                        <input class="form-control" type="password" name="confirm" id="confirm" placeholder="Confirm Password" value="" required>
                                    
                                </div>

                                <div class="password_required">
                                  <ul>
                                      <li class = 'length'><span></span>At Least 8 Character</li>
                                      <li class = 'lowercase'><span></span>One Lower Letter</li>
                                      <li class = 'uppercase'><span></span>One Capiter Letter</li>
                                      <li class = 'number'><span></span>One Number</li>
                                      <li class = 'special'><span></span>One Special Character</li>
                                  </ul>
                                </div>

 
                              </div>
                              <div class="modal-footer">
                                <!-- Save changes button-->
                                <button class="btn btn-primary" name="change_password_btn" type="submit">Save Changes</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>



            </div>


            <?php
            }
          }
          ?>

            <script src="../script.js"></script>
  </body>
</html>
