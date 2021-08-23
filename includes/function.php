<?php
function redirect($location){
    return header("Location:". $location);
} 

function confirmQuery($result){
    
    global $connection;
    if(!$result){
        die("QUERY FAILED .". mysqli_error($connection));
}
}

function escape($string){
    global $connection;
return mysqli_real_escape_string($connection, trim($string));
}

function username_exists($username){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function email_exists($email){
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function referral_used($refer){
    global $connection;
    $query = "SELECT user_referral FROM users WHERE user_referral = '$refer' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) >= 2 && $refer !== 'One Community'){
        return true;
    }else{
        return false;
    }
}

function referral_exists($refer){
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$refer' AND user_role != 'orphan' ";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    if(mysqli_num_rows($result) > 0){
        return true;
    }else{
        return false;
    }
}

function user_placement($username,$refer){
    global $connection;

   $query = "SELECT user_left, user_right FROM users WHERE username = '$refer' ";
   $result = mysqli_query($connection, $query);

   while($row = mysqli_fetch_array($result)){
     $user_left = $row['user_left'];
     $user_right = $row['user_right'];
     if($user_left == ''){
       $updatequery = "UPDATE users SET user_left= '$username' WHERE username= '$refer' ";
       $update_downline = mysqli_query($connection,$updatequery);
       confirmQuery($update_downline);
       $number_referral = "UPDATE users SET number_referral = number_referral + 1 WHERE username = '$refer' ";
       $increment_query = mysqli_query($connection,$number_referral);
       confirmQuery($increment_query);
     }elseif($user_right == ''){
       $updatequery = "UPDATE users SET user_right= '$username' WHERE username= '$refer' ";
       $update_downline = mysqli_query($connection,$updatequery);
       confirmQuery($update_downline);
       $number_referral = "UPDATE users SET number_referral = number_referral + 1 WHERE username = '$refer' ";
       $increment_query = mysqli_query($connection,$number_referral);
       confirmQuery($increment_query);
     }else{
       
     }
   }   
}

function register_user($username, $email, $password, $firstname, $lastname, $phone, $refer, $token){
    global $connection;
         $username = mysqli_real_escape_string($connection, $username);
         $email = mysqli_real_escape_string($connection, $email);
         $password = mysqli_real_escape_string($connection, $password);
         $firstname = mysqli_real_escape_string($connection, $firstname);
         $lastname = mysqli_real_escape_string($connection, $lastname);
         $phone = mysqli_real_escape_string($connection, $phone);
         $refer = mysqli_real_escape_string($connection, $refer);
         $token = mysqli_real_escape_string($connection, $token);

         $hash_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
         
        if($refer == 'One Community' || !referral_exists($refer)){
         $query = "INSERT INTO users(username,user_email,user_password,user_role,user_firstname,user_lastname,user_mobile,user_referral,user_status,user_token) ";
         $query.= "VALUES('{$username}','{$email}','{$hash_password}','orphan','{$firstname}','{$lastname}','{$phone}','One Community','0','{$token}') ";
         $register_query = mysqli_query($connection, $query);
        }else{
            $query = "INSERT INTO users(username,user_email,user_password,user_role,user_firstname,user_lastname,user_mobile,user_referral,user_token) ";
            $query.= "VALUES('{$username}','{$email}','{$hash_password}','member','{$firstname}','{$lastname}','{$phone}','{$refer}','{$token}') ";
            $register_query = mysqli_query($connection, $query);
            user_placement($username,$refer);
        }
        confirmQuery($register_query);
        
        }

    function login_user($username, $password){
        global $connection; 
         $username = mysqli_real_escape_string($connection, $username);
         $password = mysqli_real_escape_string($connection, $password);
 
            $query = "SELECT * FROM users WHERE username = '{$username}' ";
            $select_user_query = mysqli_query($connection,$query);
            confirmQuery($select_user_query);
            while($row = mysqli_fetch_array($select_user_query)){
                $db_user_id = $row['user_id'];
                $db_username = $row['username'];
                $db_user_password = $row['user_password'];
                $db_user_firstname = $row['user_firstname'];
                $db_user_lastname = $row['user_lastname'];
                $db_user_role = $row['user_role'];
                $db_user_referral = $row['user_referral'];
                $db_user_left = $row['user_left'];
                $db_user_right = $row['user_right'];
                $db_user_email_verify = $row['user_email_verify'];
            }
            if(password_verify($password, $db_user_password) && $db_user_role == 'admin' && $db_user_email_verify == 1){
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['user_role'] = $db_user_role;
                $_SESSION['user_referral'] = $db_user_referral;
                $_SESSION['user_left'] = $db_user_left ;
                $_SESSION['user_right'] = $db_user_right;
                redirect("/admin/index.php");
            }elseif(password_verify($password, $db_user_password) && $db_user_role == 'member' && $db_user_email_verify == 1){
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['user_role'] = $db_user_role;
                $_SESSION['user_referral'] = $db_user_referral;
                $_SESSION['user_left'] = $db_user_left ;
                $_SESSION['user_right'] = $db_user_right;
                redirect("/member/index.php");
            }elseif(password_verify($password, $db_user_password) && $db_user_role == 'orphan' && $db_user_email_verify == 1){
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['username'] = $db_username;
                $_SESSION['firstname'] = $db_user_firstname;
                $_SESSION['lastname'] = $db_user_lastname;
                $_SESSION['user_role'] = $db_user_role;
                $_SESSION['user_referral'] = $db_user_referral;
                redirect("/orphan/index.php");
        }else{
                redirect("/login.php");
            }
}

function recordCount($table) {
    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_post = mysqli_query($connection,$query);
    $result = mysqli_num_rows($select_all_post);
    confirmQuery($select_all_post);
     return $result;  
     
}
?>