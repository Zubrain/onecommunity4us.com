<?php  ob_start(); ?>
<?php  session_start(); ?>
<?php
    if(! isset($_SESSION['user_role'])){
            header("Location: ../index.php");
        }elseif($_SESSION['user_role'] == 'member' || $_SESSION['user_role'] == 'orphan'){
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
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/placement.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
        <style>
    .bg-purple {
      background-color: #7c00a4;
    }
    .bg-purp {
      background-color: #410056;
    }
    .purple {
        color: #410056;
    }
    </style>
    <script type="text/javascript" src="https://cdn.weglot.com/weglot.min.js"></script>
<script>
    Weglot.initialize({
        api_key: 'wg_645709af4b7b7f407fd2c8d1e76924ef7'
    });
</script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color:#410056">
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
                    <li><a class="dropdown-item" href="users.php">Users</a></li>
                    <li><a class="dropdown-item" href="all-activities.php">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="admin_logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>