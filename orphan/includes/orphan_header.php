<?php  ob_start(); ?>
<?php  session_start(); ?>
<?php
        if(! isset($_SESSION['user_role'])){
            header("Location: ../index.php");
        }elseif($_SESSION['user_role'] == 'member'){
            header("Location: ../index.php");
        }
?>
<?php include "../includes/config.php"; ?>
<?php include "../includes/function.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>One Community</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/treestyle.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    
     <link rel="apple-touch-icon" sizes="180x180" href="../assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon-16x16.png">
    <link rel="manifest" href="../assets/site.webmanifest">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.6/dist/clipboard.min.js"></script>
    <style>
    .bg-purple {
      background-color: #048ECB;
    }
    .bg-purp {
      background-color: #060039;
    }
    .purple {
        color: #060039;
    }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#060039">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">One Community</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>

        </form>
                <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i> 
                    <?php
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'] ;
                        }
                     ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item fw-bold" href="../index.php">Home</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="orphan_logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>