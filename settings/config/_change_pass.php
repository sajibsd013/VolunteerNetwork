<?php
session_start();

include '../../db/_db.php';

// $db = new Database();
$user_id =  $_SESSION['UserID'];
if (isset($_POST['cpassword'])) {
	  $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
      
    $email_search="SELECT * from users where `UserID`='$user_id'";
    $query=mysqli_query($con,$email_search);
    $row=mysqli_fetch_assoc($query);
    $user_pass_hash = $row["password"];
    $pass_decode=password_verify($cpassword, $user_pass_hash);
    if($pass_decode){
          $pass1=mysqli_real_escape_string($con,$_POST['password1']);
          $pass2=mysqli_real_escape_string($con,$_POST['password2']);

      
          if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_BCRYPT);
            $sql = "UPDATE `users` SET `password` = '$hashpass' WHERE `UserID` =$user_id";
            $result = mysqli_query($con, $sql);
            echo "Password Updated";
          }else{
              echo "Password Not Matched!";
          }
        
      }else{
          echo "Incorrect Current Password!";
      }
  }

?>