<?php  include "includes/config.php"; ?>
<?php include "includes/header.php"; ?>
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
            $query = "SELECT user_referral FROM users WHERE user_referral = '$ref_name' ";
            $result = mysqli_query($connection, $query);
            confirmQuery($result);
            if(mysqli_num_rows($result) >= 2){
                $ref_name = 'One Community';
            }else{
    
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
                        <form role="form" action="registerprocessor.php" method="post" id="register-form" autocomplete="off" class="bg-light rounded shadow-5-strong py-5 px-4 px-sm-5">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="firstname">First name <span class="text-danger">*</span></label>
                                        <input type="text" id="firstname" class="form-control" name="firstname" autocomplete="off" placeholder="Enter first name" required/>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="lastname">Last name <span class="text-danger">*</span></label>
                                        <input type="text" id="lastname" class="form-control" name="lastname" autocomplete="off" placeholder="Enter last name" required/>
                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="email">Email address <span class="text-danger">*</span></label>
                                <input type="email" id="email" class="form-control" name="email" autocomplete="off" placeholder="Enter email address" value="<?php echo isset($email) ? $email : '' ?>" required/>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                            </div>
                            
                            <!-- Phone Number input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="phone">Mobile Number <span class="text-danger">*</span></label>
                                <input type="tel" id="phone" class="form-control" name="phone" placeholder="Enter phone number" autocomplete="off" required minlength="10" maxlength="14"/>
                            </div>
                            <!-- Username input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="username">Username <span class="text-danger">* (with no spaces)</span></label>
                                <input type="text" id="username" class="form-control" name="username" autocomplete="off" placeholder="Enter Username" value="<?php echo isset($username) ? $username : '' ?>" required/>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required/>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                            </div>

                            <!-- Confirm Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="confirmpassword">Re-enter Password <span class="text-danger">* (must be same as password)</span></label>
                                <input type="password" id="confirmpassword" class="form-control" name="confirmpassword" autocomplete="off" placeholder="Confirm password" required/>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['confirmpassword']) ? $error['confirmpassword'] : '' ?></p>
                            </div>

                            <!-- Referral link input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" for="referral">Referral <span class="text-danger">(filled automatically)</span></label>
                                <input type="text" id="referral" class="form-control" name="referral" autocomplete="off" placeholder="Enter Referrer Name" value="<?php echo (isset($ref_name))? $ref_name: 'One community';?>" required readonly/>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-block mb-3">
                                <input class="form-check-input me-2" type="checkbox" value="agree" id="agree" name="agree"/>
                                <label class="form-check-label" for="agree">
                                   <span class="text-danger">*</span> I agree to the <a href="terms-conditions.html" target="_blank" class="astalavee-color fw-bold">Terms and Conditions</a>
                                </label>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['agree']) ? $error['agree'] : '' ?></p>
                            </div>
                            <div class="form-check d-block mb-3">
                                <input class="form-check-input me-2" type="checkbox" value="comfortable" id="comfortable" name="comfortable"/>
                                <label class="form-check-label" for="comfortable">
                                  <span class="text-danger">*</span>  I am comfortable with Crowdfunding
                                </label>
                                <p id="form-message" class="form-message text-danger"><?php echo isset($error['comfortable']) ? $error['comfortable'] : '' ?></p>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button type="submit" name="register" id="register"
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
   
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
    <!-- Custom script -->
    <script type="text/javascript" src="js/script.js"></script>
   <!-- <script>-->
   <!--$(function () {-->
   <!--     $('#register-form').on('submit', function (event) {-->
   <!--       event.preventDefault();-->
   <!--             var firstname = $("#firstname").val();-->
   <!--             var lastname = $("#lastname").val();-->
   <!--             var email = $("#email").val();-->
   <!--             var phone = $("#phone").val();-->
   <!--             var username = $("#username").val();-->
   <!--             var password = $("#password").val();-->
   <!--             var confirmpassword = $("#confirmpassword").val();-->
   <!--             var referral = $("#referral").val();-->
   <!--             var agree = $("#agree").val();-->
   <!--             var comfortable = $("#comfortable").val();-->
   <!--             var register = $("#register").val();-->
   <!--     $.ajax({-->
   <!--        url: 'registerprocessor.php',-->
   <!--        method: 'post',-->
   <!--         data: {firstname:firstname,lastname:lastname,email:email,phone:phone,username:username,password:password,confirmpassword:confirmpassword,referral:referral,agree:agree,comfortable:comfortable},-->
   <!--             beforeSend: function(){-->
   <!--             console.log('sending to php');-->
   <!--             },-->
   <!--             success: function (data) {-->
   <!--                 if(data == 1){-->
   <!--                      alert('username needs to be longer');-->
   <!--                 }-->
   <!--                 if(data == 2){-->
   <!--                     alert('username already taken');-->
   <!--                 }-->
   <!--                 if(data == 3){-->
   <!--                     alert('email exist');-->
   <!--                 }-->
   <!--                 if(data == 4){-->
   <!--                     alert('password does not match');-->
   <!--                 }-->
   <!--                 if(data == 5){-->
   <!--                     alert('you must agree');-->
   <!--                 }-->
   <!--                 if(data == 6){-->
   <!--                     alert('you have to be comfortable');-->
   <!--                 }-->
   <!--                 if(data == 0){-->
   <!--                     alert('Registration Successful');-->
                        <!--// Swal.fire(-->
                        <!--//   'Registration Successful!',-->
                        <!--//   'Check your email or spam folder for verification code',-->
                        <!--//   'success'-->
                        <!--// )-->
   <!--                 }-->
   <!--              console.log('Submission was successful.');-->
   <!--              console.log(data);-->
   <!--              Swal.fire(-->
   <!--                       'Received!',-->
   <!--                       'Checking',-->
   <!--                       'success'-->
   <!--                     )-->
   <!--             },-->
   <!--         error: function (data) {-->
   <!--             console.log('An error occurred.');-->
   <!--             console.log(data);-->
   <!--         }-->
   <!--     });-->

   <!--    });-->

   <!--  });-->
   <!-- </script>-->

</body>

</html>
