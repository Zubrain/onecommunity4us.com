<?php  ob_start(); ?>
<?php  session_start(); ?>
<?php include "function.php";?>
<?php

// $query = "UPDATE users SET ";
//                 $query.= "user_stage= 0, ";
//                 $query.= "user_gift= NULL, ";
//                 $query.= "user_gift_confirmed= NULL, ";
//                 $query.= "user_gifted_one= NULL, ";
//                 $query.= "user_gifted_two= NULL, ";
//                 $query.= "user_gifted_three= NULL, ";
//                 $query.= "user_gifted_four= NULL, ";
//                 $query.= "user_gifted_one_confirm= NULL, ";
//                 $query.= "user_gifted_two_confirm= NULL, ";
//                 $query.= "user_gifted_three_confirm= NULL, ";
//                 $query.= "user_gifted_four_confirm= NULL, ";
//                 $query.= "user_regift_first= NULL, ";
//                 $query.= "user_regift_first_confirmed= NULL, ";
//                 $query.= "user_regifted_first_one= NULL, ";
//                 $query.= "user_regifted_first_two= NULL, ";
//                 $query.= "user_regifted_first_three= NULL, ";
//                 $query.= "user_regifted_first_four= NULL, ";
//                 $query.= "user_regifted_first_one_confirm= NULL, ";
//                 $query.= "user_regifted_first_two_confirm= NULL, ";
//                 $query.= "user_regifted_first_three_confirm= NULL, ";
//                 $query.= "user_regifted_first_four_confirm= NULL, ";
//                 $query.= "user_regift_second= NULL, ";
//                 $query.= "user_regift_second_confirmed= NULL, ";
//                 $query.= "user_regift_admin_second= NULL, ";
//                 $query.= "user_regift_admin_second_confirmed= NULL, ";
//                 $query.= "user_regifted_second_one= NULL, ";
//                 $query.= "user_regifted_second_two= NULL, ";
//                 $query.= "user_regifted_second_three= NULL, ";
//                 $query.= "user_regifted_second_four= NULL, ";
//                 $query.= "user_regifted_second_one_confirm= NULL, ";
//                 $query.= "user_regifted_second_two_confirm= NULL, ";
//                 $query.= "user_regifted_second_three_confirm= NULL, ";
//                 $query.= "user_regifted_second_four_confirm= NULL ";
        

//                 $referral_query = mysqli_query($connection,$query);
//                 confirmQuery($referral_query);
?>
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
<!--    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>-->
<!--<script>-->
<!--    Weglot.initialize({-->
<!--        api_key: 'wg_645709af4b7b7f407fd2c8d1e76924ef7'-->
<!--    });-->
<!--</script>-->
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