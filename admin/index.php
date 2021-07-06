<?php include "includes/admin_header.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Options
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Gift</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Regift</a>
                            </nav>
                        </div>
                        
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Notification
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Profile
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    member name
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Admin Area</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Gift</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Get Gifted</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Regift</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Get Regifted</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card py-5">
                        <div class="tree my-5">
                        <h2 class="mx-5">Gifting Circle</h2>
                            <ul>
                                <li><a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="mx-2" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <ul>
                                        <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Child One</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#"><img src="images/avatar-m1.png" alt=""><span>Child two</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Child three</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-m1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Child four</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card py-5 my-5">
                        <h2 class="mx-5">Receiving Gift Circle 1</h2>
                        <div class="tree my-5">
                            <ul>
                                <li><a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="mx-2" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <ul>
                                        <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Child One</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#"><img src="images/avatar-m1.png" alt=""><span>Child two</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Child three</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-m1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Child four</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card py-5 my-5">
                        <h2 class="mx-5">Receiving Gift Circle 2</h2>
                        <div class="tree my-5">
                            <ul>
                                <li><a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="mx-2" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <a class="" href="#"><img src="images/avatar-m1.png" alt=""><span>Core
                                            Child</span></a>
                                    <ul>
                                        <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Child One</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="#"><img src="images/avatar-m1.png" alt=""><span>Child two</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Child three</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatar-m1.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><img src="images/avatar-f1.png" alt=""><span>Child four</span></a>
                                            <ul>
                                                <li><a href="#"><img src="images/avatar-m2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                                <li><a href="#"><img src="images/avatart-f2.png" alt=""><span>Grand
                                                            Child</span></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card py-5 my-5">
                    <p class="text-center">onecommunity4us.com/register.php?ref=<?php echo  $_SESSION['user_role'] ?></p>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; One Community 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
