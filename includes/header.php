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

    <title>One Community</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-astalavee navbar-dark py-3 shadow">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <h2>One Community</h2>
                <!-- <img src="images/" class="img-fluid" alt="logo" width="170"> -->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto pt-2">
                    <li class="nav-item">
                        <a href="#" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">What we do</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="col-lg-6 col-xl-5 text-lg-end">
                <?php
                        if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
                           echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                           echo "<a href='/onecommunity4us.com/member/index.php' type='button' class='btn btn-signup px-5 py-2'>Dashboard</a>";
                        }elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
                           echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                           echo "<a href='/onecommunity4us.com/admin/index.php' type='button' class='btn btn-signup px-5 py-2'>Admin</a>";  
                        }elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
                            echo "<a href='logout.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Logout</a>";
                            echo "<a href='/onecommunity4us.com/orphan/index.php' type='button' class='btn btn-signup px-5 py-2'>Waiting</a>"; 
                        }else{
                           echo "<a href='login.php' type='button' class='btn btn-login me-3 px-4 px-sm-5 py-2'>Login</a>";
                           echo "<a href='register.php' type='button' class='btn btn-signup px-5 py-2'>Sign-up</a>";
                        }
                     
                ?>
                </div>
            </div>
        </div>
    </nav>