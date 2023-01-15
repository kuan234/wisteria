<?php
include ("connection.php");
session_start();   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="image/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

    <?php
        if(isset($_POST['sendbtn']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['contact_number'];
            $message = $_POST['message'];

            $contact_sql = mysqli_query($connect,"INSERT INTO `contact`( `contact_name`, `contact_email`,`contact_phone`, `contact_message`) VALUES ('$name','$email','$phone','$message')");
            
            if($contact_sql)
            {
                ?>
                <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Sended',
                            text: 'Your Message have Send!',
                            timer: '2000'
                        })
                            
                </script>
                <?php
            }
        }
    ?>







    <style>
        body{
            background-color: #f2f6fc;
        }

        /* Contact Form */
        .wrapper {
    height: 100vh;
    background: #000;
    background: url("./image/background-newyear.jpg");
    background-size: cover;
    width: 100%
    }

    .overlay {
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8)
    }

    .contact-us {
        margin-top: 50px;
        margin-bottom: 50px
    }

    .contact-us h3,
    p {
        color: #fff;
    }

    .address {
        margin-top: 14px !important;
        margin-left: 10px
    }

    .address span {
        color: #0dcaf0;
    }

    .icons {
        width: 50px;
        height: 50px;
        min-width: 50px;
        min-height: 50px;
        border-radius: 50%;
        background-color: #fff;
        display: inline-block;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .icons i {
        font-size: 20px
    }

    .forms {
        padding: 20px
    }

    .inputs input {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #eee
    }

    .inputs input:focus {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #7B1FA2;
        box-shadow: none
    }

    .inputs textarea {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #eee;
        width: 100%;
        resize: none
    }

    .inputs textarea:focus {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #7B1FA2;
        box-shadow: none;
        resize: none
    }

    .form-control {
        padding: .375rem .25rem
    }

        

        /*----------------Footer--------------*/
        .footer h3
        {
            font-size: 20px;
            color: #4b6043;
            margin-bottom: 10px;
        }

        .footer h3
        {
            margin-left: 40px;
        }

        .footer-col-2,.footer-col-3
        {
            margin-top: 5px;
            text-align: center;
        }

        .footer ul
        {
            list-style: none;
        }

        .footer-col-2 li, .footer-col-3 li
        {
            padding: 10px;
        }

        .footer-col-2 a
        {
            color: #4b6043;
        }

        .footer-col-2 a:hover
        {
            text-decoration: underline;
        }

        .footer-col-3 a
        {
            color: #4b6043;
        }

        .copy
        {
            text-align: center;
        }


        .menu-icon
        {
            width: 28px;
            margin-left: 20px;
            display: none;
        }


       
    </style>

    <?php
    include('php/header.php');
    ?>


<div class="wrapper"> 
    <div class="overlay"> 
        <div class="row d-flex justify-content-center align-items-center"> 
            <div class="col-md-9"> <div class="contact-us text-center"> 
                <h3>Contact Us</h3> 
                <p class="mb-5">If you have a feedback or question, our team is always happy to hear from you.</p> 
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="mt-5 text-center px-3"> 
                            <div class="d-flex flex-row align-items-center"> 
                                <span class="icons"><i class="fa fa-map-marker"></i></span> 
                                <div class="address text-start"> 
                                    <span>Address</span> 
                                    <p>3, Jalan Medan Putra 3, Medan Putra Bussiness Centre, Bandar Menjalara, Kepong, 52200 Kuala Lumpur</p> 
                                </div> 
                            </div> 
                            <div class="d-flex flex-row align-items-center mt-3"> 
                                <span class="icons"><i class="fa fa-phone"></i></span> 
                                <div class="address text-start"> 
                                    <span>Phone</span> 
                                    <p>011-2315 4865</p> 
                                </div> 
                            </div> 
                            <div class="d-flex flex-row align-items-center mt-3"> 
                                <span class="icons"><i class="fa fa-envelope-o"></i></span> 
                                <div class="address text-start"> <span>Email</span> <p>fypwisteriaplant@gmail.com</p> 
                            </div> 
                        </div> 
                    </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="text-center px-1"> 
                            <form action="" method="POST">
                                <div class="forms p-4 py-5 bg-white"> 
                                    <h5>Send Message</h5> 

                                    <div class="mt-4 inputs"> 
                                        <input type="text" name="name" class="form-control" placeholder="Name*" required> 
                                        <input type="email" name="email" class="form-control" placeholder="Email*" required> 
                                        <input type="tel" name="contact_number" class="form-control" minlength="9" maxlength="11" pattern="[0-9]+" title="Only Number Accepted"  placeholder="Phone*" required> 
                                        <textarea class="form-control" name="message" placeholder="Type your message*"  required></textarea> 
                                    </div> 

                                    <div class="button mt-4 text-start"> 
                                        <button class="btn btn-dark" type="submit" name="sendbtn">Send</button> 
                                    </div> 
                                </div> 
                            </form>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
</div>



        <!------------------Footer--------------->
        <div class="footer" 
            style="background: #ddead1;
            color: #4b6043;
            font-size: 18px;  ">
            <div class="container">
                <div class="row pt-5">
                    <div class="col-sm-4 footer-col-1 text-center">
                        <a href="index.php"><img src="image/logo.png" 
                            style="width: 150px;
                            margin-bottom: 10px;
                            padding: auto;"></a>
                    </div>
                    <div class="col-sm-4 footer-col-2 ">
                        <h3>Support</h3>
                        <ul>
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="product.php">Product</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-col-3">
                        <h3>Follow us</h3>
                        <ul>
                            <li><a href=""><i class="fa fa-instagram" style="font-size: 36px;"></i></a></li>
                            <li><a href=""><i class="fa fa-facebook-square" style="font-size: 36px;"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter" style="font-size: 36px;"></i></a></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="copy">
                    &copy; designed by FYP - Wisteria
                </div>
            </div>
        </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>