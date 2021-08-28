<?php  include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require 'vendor/phpmailer/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
//Load Composer's autoloader
require 'vendor/autoload.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = escape($_POST['username']);
    $email    = escape($_POST['email']);
    $password = escape($_POST['password']);
    $firstname = escape($_POST['firstname']);
    $lastname = escape($_POST['lastname']);
    $phone = escape($_POST['phone']);
    $confirmpassword = escape($_POST['confirmpassword']);
    $refer = escape($_POST['referral']);
    $agree = escape($_POST['agree']);
    $comfortable = escape($_POST['comfortable']);
    $token = random_int(100000, 999999);
    $token = escape($token);
    $error = [
        'username'=> '',
        'email'=> '',
        'password'=> '',
        'referral'=> '',
        'agree'=> '',
        'comfortable'=> ''
    ];
    if(strlen($username) < 4){
        $error['username'] = 'Username needs to be longer';
    }
    if($username == ''){
        $error['username'] = 'Username cannot be empty';
    }
    if(username_exists($username)){
        $error['username'] = 'Username already taken! Choose another one';
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
     if($agree == ''){
        $error['agree'] = 'You must agree to the Terms and Conditions to register';
    }
     if($comfortable == ''){
        $error['comfortable'] = 'You have to be comfortable with crowdfunding to proceed';
    }
    
    foreach ($error as $key => $value) {
    if(empty($value)){
        unset($error[$key]);
    }
   }//foreach
   if(empty($error)){
       
    try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'onecommunity4us.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@onecommunity4us.com';                     //SMTP username
    $mail->Password   = '.LEN13EE~h.G';                               //SMTP password
    $mail->SMTPSecure ="ssl";            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@onecommunity4us.com', 'One Community');
    $mail->addAddress($email, $firstname .' '. $lastname);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
   //  $mail->addReplyTo('support@onecommunity4us.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = '<p style="font-size:16px;"><b>Hello '.$username.',</b></p><div style="font-size:16px;">
    You have successfully created an account. Please copy the code below to verify your email address and complete your registration.</div>
    <div style="font-size:20px;margin:20px 10px;"><b>'.$token.'</b></div>
     <div style="margin-top: 10px;"><a href="https://www.onecommunity4us.com/email_verification.php"
            style="background-color: #008CBA; padding: 12px 28px 12px 28px; color:aliceblue; border-radius: 8px; text-decoration: none;"><b>Verify
            E-mail</b></a></div>
    <div style="font-size:16px;">Warm Regards!
    <p>Any questions? We are always here to help you.<br>Contact us at <a href="mailto:support@onecommunity4us.com">support@onecommunity4us.com</a>
    and we\'ll get back to you. </p></div>';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    register_user($username, $email, $password, $firstname, $lastname, $phone, $refer, $token);
    
    redirect("/email_verification.php");
}
}
?>
<?php
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'){
    redirect("/admin/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'member'){
    redirect("/member/index.php");
}elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'orphan'){
    redirect("/orphan/index.php");
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
                            <div class="form-check d-block mb-3">
                                <input class="form-check-input me-2" type="checkbox" value="agree" id="form1" name="agree"/>
                                <label class="form-check-label" for="form1">
                                    I agree to the <a href="terms-conditions.html" target="_blank" class="astalavee-color fw-bold">Terms and Conditions</a>
                                </label>
                                <p class="text-danger"><?php echo isset($error['agree']) ? $error['agree'] : '' ?></p>
                            </div>
                            <div class="form-check d-block mb-3">
                                <input class="form-check-input me-2" type="checkbox" value="comfortable" id="form2" name="comfortable"/>
                                <label class="form-check-label" for="form2">
                                    I am comfortable with Crowdfunding
                                </label>
                                <p class="text-danger"><?php echo isset($error['comfortable']) ? $error['comfortable'] : '' ?></p>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="register"
                                    class="btn btn-lg bg-astalavee text-light shadow btn-login-page mb-3">Register</button>
                            </div>
                            <div class="text-center">
                                <p>Already a member? <a href="login.php" class="astalavee-color">Sign into your account</a></p>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Background image -->


    <!-- footer section -->
    <!--<footer class="bg-light text-dark footer-section py-5 px-3">-->
    <!--    <div class="container align-items-center">-->
    <!--        <div class="row justify-content-between align-items-center g-5">-->
    <!--            <div class="col-md-3">-->
    <!--                <h2 class="astalavee-color">One Community</h2>-->
                    <!--  <img src="img/Astalavee-dark.png" class="img-fluid footer-logo" alt="logo"> -->

    <!--                <div class="d-none d-sm-block">-->
    <!--                    <div class="py-3">-->
    <!--                        <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                        <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--                    </div>-->
    <!--                    <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-9">-->
    <!--                <div class="row g-5">-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Links</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Home</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">About-->
    <!--                                    Us</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Pricing</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links"><a href="#" class="text-dark text-decoration-none fs-5">How it-->
    <!--                                    works</a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Products</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Collaboration</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Affiliates</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">FAQs</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Guides</a></li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                    <div class="col-6 col-md-4">-->
    <!--                        <h4 class="astalavee-header pb-2">Other Links</h4>-->
    <!--                        <ul class="navbar-nav">-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Terms & Conditions</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Privacy Policy</a>-->
    <!--                            </li>-->
    <!--                            <li class="footer-links pb-1"><a href="#"-->
    <!--                                    class="text-dark text-decoration-none fs-5">Help Center</a>-->
    <!--                            </li>-->
    <!--                        </ul>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="text-center pt-5 d-block d-sm-none">-->
    <!--        <div class="py-3">-->
    <!--            <i class="bi bi-instagram me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-youtube me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-linkedin me-2" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--            <i class="bi bi-facebook" style="font-size: 1.5rem; color: #410056;"></i>-->
    <!--        </div>-->
    <!--        <p class="lead text-secondary">Copyright 2021. All Rights Reserved.</p>-->
    <!--    </div>-->
    <!--</footer>-->



    <!-- Script -->
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!-- Custom script -->
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
