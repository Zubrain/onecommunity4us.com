<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="/onecommunity4us.com/index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-home purple"></i></div>
                        <span class="purple">HomePage</span> 
                    </a>
            

            </div>
            <div class="sb-sidenav-footer mt-5">
                <div class="small">Logged in as:</div>
                <?php echo '<b>'.$_SESSION['username'].'</b>' ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">