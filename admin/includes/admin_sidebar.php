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
                    <?php
                        $query = "SELECT user_id, username, user_regift_admin_second, user_regift_admin_second_confirmed  FROM users WHERE user_regift_admin_second= 'admin' AND user_regift_admin_second_confirmed IS NULL";
                        $select_users = mysqli_query($connection, $query);
                        $pending_confirmation = mysqli_num_rows($select_users);
                    ?>
                    <a class="nav-link" href="confirm_fee.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill purple"></i></div>
                        <span class="purple"> Confirm Fee</span> <span class="badge mx-2 bg-purple"><?php echo $pending_confirmation;?></span>
                    </a>
                    <?php
                        $query = "SELECT user_id, username FROM users WHERE user_pledge= 'pledged' AND user_pledge_confirm IS NULL";
                        $select_users = mysqli_query($connection, $query);
                        $pledge_confirmation = mysqli_num_rows($select_users);
                    ?>
                    <a class="nav-link" href="confirm_pledge.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-certificate purple"></i></div>
                        <span class="purple"> Confirm Pledge</span> <span class="badge mx-2 bg-purple"><?php echo $pledge_confirmation;?></span>
                    </a>
                    <a class="nav-link" href="users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users purple"></i></div>
                        <span class="purple"> All Users</span>
                    </a>
                    <a class="nav-link" href="all-members.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-friends purple"></i></div>
                        <span class="purple">All Members</span>
                    </a>
                    <a class="nav-link" href="all-orphans.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-slash purple"></i></div>
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