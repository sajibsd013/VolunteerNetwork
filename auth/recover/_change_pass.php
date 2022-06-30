<?php
session_start();
include '../../db/_db.php';

if(isset($_POST['email'])){
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password=mysqli_real_escape_string($con,$_POST['password1']);
	$cpassword=mysqli_real_escape_string($con,$_POST['password2']);

	if($password==$cpassword){
		$pass=password_hash($password, PASSWORD_BCRYPT);
		$updatequery="UPDATE `users` SET `password`='$pass' WHERE `email`='$email'";
		$query= mysqli_query($con,$updatequery);
        echo 1;
		session_destroy();
    }else{
        echo'Password not matched!';
    }
}
?>
