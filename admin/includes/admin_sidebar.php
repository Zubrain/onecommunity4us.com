<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/onecommunity4us.com/index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-home purple"></i></div>
                        <span class="purple">HomePage</span> 
                    </a>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt purple"></i></div>
                        <span class="purple">Dashboard</span>
                    </a>
                    <div class="sb-sidenav-menu-heading">Community</div>
                    <a class="nav-link" href="users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users purple"></i></div>
                        <span class="purple"> All Users</span>
                    </a>
                    <a class="nav-link" href="all-members.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users purple"></i></div>
                        <span class="purple">All Members</span>
                    </a>
                    <a class="nav-link" href="all-orphans.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users purple"></i></div>
                        <span class="purple">All Orphans</span>
                    </a>
                    <a class="nav-link" href="all-activities.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-history purple"></i></div>
                        <span class="purple">Monitor Activities</span>
                    </a>
                    <!-- <a class="nav-link" href="admin_profile.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Admin Profile
                    </a> -->
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo '<b>'.$_SESSION['username'].'</b>' ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">