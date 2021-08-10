<?php  include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
<?php
// the message
//$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
//mail("zubillion1@gmail.com","My subject",$msg);
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $phone = trim($_POST['phone']);
    $confirmpassword = trim($_POST['confirmpassword']);
    $refer = trim($_POST['referral']);
    $length = 50;
    $token = bin2hex(openssl_random_pseudo_bytes($length));
    $error = [
        'username'=> '',
        'email'=> '',
        'password'=> '',
        'referral'=> ''
    ];
    if(strlen($username) < 4){
        $error['username'] = 'Username needs to be longer';
    }
    if($username == ''){
        $error['username'] = 'Username cannot be empty';
    }
    if(username_exists($username)){
        $error['username'] = 'Username already exists! Choose another one';
    }
    if($email == ''){
        $error['email'] = 'Email cannot be empty';
    }
    if(email_exists($email)){
        $error['email'] = 'Email already exists! <a href ="login.php">Please Log In</a>';
    }
    if($password == ''){
        $error['password'] = 'Password cannot be empty';
    }   
    if($password !== $confirmpassword){
        $error['confirmpassword'] = 'Password does not match';
    }   
    if(referral_used($refer)){
        $error['referral'] = 'Maximum limit reached! Enter One Community as Referrer';
    }
    foreach ($error as $key => $value) {
    if(empty($value)){
        unset($error[$key]);
    }
   }//foreach
   if(empty($error)){
    register_user($username, $email, $password, $firstname, $lastname, $phone, $refer, $token);
    //login_user($username, $password);
}
}
?>
<?php
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
    redirect("/onecommunity4us.com/admin/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
    redirect("/onecommunity4us.com/member/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
    redirect("/onecommunity4us.com/orphan/index.php");
}else{

}
?>
<?php
    if(isset($_GET['ref'])){
        $ref_id = escape($_GET['ref']);
        if($ref_id == ''){
            redirect("index.php");
        } else {
        $query = "SELECT * FROM users WHERE user_id = $ref_id";
        $select_all_users = mysqli_query($connection, $query);
        confirmQuery($select_all_users);
            while ($row = mysqli_fetch_assoc($select_all_users)) {
                $unique_id = $row['user_id'];
                $ref_name = $row['username'];
            }
        }
    } else {
        $ref_name = 'One Community';
    }
?>
    <!-- Background image -->
    <section class="login-section">
        <div class="d-flex align-items-center" style="background-color: rgba(65, 0, 86, 0.1);">
            <div class="container py-2">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-9 col-lg-7 col-xl-6 my-5">
                        <form role="form" action="register.php" method="post" id="register-form" autocomplete="off" class="bg-light rounded shadow-5-strong py-5 px-4 px-sm-5">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example1">First name</label>
                                        <input type="text" id="form3Example1" class="form-control" name="firstname" autocomplete="on" placeholder="Enter first name" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form3Example2">Last name</label>
                                        <input type="text" id="form3Example2" class="form-control" name="lastname" autocomplete="on" placeholder="Enter last name" required/>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example3">Email address</label>
                                <input type="email" id="email" class="form-control" name="email" autocomplete="on" placeholder="Enter email address" value="<?php echo isset($email) ? $email : '' ?>" required/>
                                <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                            </div>

                            <!-- Phone Number input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example3">Mobile Number</label>
                                <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter phone number" required/>
                            </div>
                            <!-- Username input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example3">Username</label>
                                <input type="text" id="username" class="form-control" name="username" autocomplete="off" placeholder="Enter Username" value="<?php echo isset($username) ? $username : '' ?>" required/>
                                <p class="text-danger"><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Password</label>
                                <input type="password" class="form-control" name="password" id="key" placeholder="Password" autocomplete="off" />
                                <p class="text-danger"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Re-enter Password</label>
                                <input type="password" id="form3Example4" class="form-control" name="confirmpassword" autocomplete="off" placeholder="Confirm password" />
                                <p class="text-danger"><?php echo isset($error['confirmpassword']) ? $error['confirmpassword'] : '' ?></p>
                            </div>

                            <!-- Referral link input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form3Example4">Referral</label>
                                <input type="text" id="form3Example4" class="form-control" name="referral" autocomplete="off" placeholder="Enter Referrer Name" value="<?php echo (isset($ref_name))? $ref_name: 'One community';?>" required readonly/>
                                <p class="text-danger"><?php echo isset($error['referral']) ? $error['referral'] : '' ?></p>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-3">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3"/>
                                <label class="form-check-label" for="form2Example3">
                                    I agree to Terms and Conditions
                                </label>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="register"
                                    class="btn btn-lg bg-astalavee text-light shadow btn-login-page mb-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Background image -->


    <!-- footer section -->
    <footer class="bg-light text-dark footer-section py-5 px-3">
        <div class="container align-items-center">
            <div class="row justify-content-between align-items-center g-5">
                <div class="col-md-3">
                    <h2 class="astalavee-color">One Community</h2>
                    <!--  <img src="img/Astalavee-dark.png" class="img-fluid footer-logo" alt="logo"> -->

                    <div class="d-none d-sm-block">
                        <div class="py-3">
                            <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>
                            <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>
                            <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>
                            <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>
                        </div>
                        <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row g-5">
                        <div class="col-6 col-md-4">
                            <h4 class="astalavee-header pb-2">Links</h4>
                            <ul class="navbar-nav">
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Home</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">About
                                        Us</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Pricing</a>
                                </li>
                                <li class="footer-links"><a href="#" class="text-dark text-decoration-none fs-5">How it
                                        works</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-4">
                            <h4 class="astalavee-header pb-2">Products</h4>
                            <ul class="navbar-nav">
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Collaboration</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Affiliates</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">FAQs</a>
                                </li>
                                <li class="footer-links"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Guides</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-4">
                            <h4 class="astalavee-header pb-2">Other Links</h4>
                            <ul class="navbar-nav">
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Terms & Conditions</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Privacy Policy</a>
                                </li>
                                <li class="footer-links pb-1"><a href="#"
                                        class="text-dark text-decoration-none fs-5">Help Center</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-5 d-block d-sm-none">
            <div class="py-3">
                <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>
                <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>
                <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>
                <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>
            </div>
            <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>
        </div>
    </footer>



    <!-- Script -->
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom script -->
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
