<?php session_start(); ?>
    <?php include "config.php"; ?>
    <?php include "function.php"; ?>
<?php 
if(isset($_POST['username']) && isset($_POST['password'])){

    login_user($_POST['username'], $_POST['password']);


}else {


    redirect('https://onecommunity4us.com/login.php');
}
?>
    