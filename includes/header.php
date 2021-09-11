<?php  ob_start(); ?>
<?php  session_start(); ?>
<?php include "function.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/font/bootstrap-icons.css" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/cdnjs/sweet-alert.min.css" />

    <title>One Community</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/cdnjs/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

<style>
    .form-check-input:checked {
    background-color: #060039;
    border-color: #060039;
}
.form-check-input:focus {
    outline: 0;
    box-shadow: none;
}
 .navbar-dark .navbar-toggler-icon {
    background-image: url(../images/menu-icon.png);
  }
</style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-astalavee navbar-dark py-3 shadow">
        <div class="container">
            <a href="/" class="navbar-brand logo">
                 <img src="../assets/images/logo.svg" class="img-fluid" alt="logo" width="50"> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto pt-2">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#events" class="nav-link">Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="/#contact" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="col-lg-6 col-xl-5 text-lg-end">
                <?php
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
                           echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                           echo "<a href='/member/index.php' type='button' class='btn btn-signup px-5 py-2'>Dashboard</a>";
                        }elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
                           echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                           echo "<a href='/admin/index.php' type='button' class='btn btn-signup px-5 py-2'>Admin</a>";  
                        }elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
                            echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                            echo "<a href='/orphan/index.php' type='button' class='btn btn-signup px-5 py-2'>Waiting</a>"; 
                        }else{
                           echo "<a href='login.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Login</a>";
                           echo "<a href='register.php' type='button' class='btn btn-signup px-5 py-2'>Sign-up</a>";
                        }
                     
                ?>
                </div>
            </div>
        </div>
    </nav>