<?php
session_start();

include '../../db/_db.php';


if(isset($_POST['email'])){
	$email=$_POST['email'];
	$password1=$_POST['password1'];
	$password2=$_POST['password2'];
	$birthday=$_POST['birthday'];
	
	$emailquery="SELECT * from `users` WHERE `email`='$email' AND `birthday`='$birthday'";
	$query=mysqli_query($con, $emailquery);
	$count=mysqli_num_rows($query);

	if($count==1){
		if($password1==$password2){
			$pass=password_hash($password1, PASSWORD_BCRYPT);
			$updatequery="UPDATE `users` SET `password`='$pass' WHERE `email`='$email'";
			$query= mysqli_query($con,$updatequery);
			if($query){
                $_SESSION["message"] = "<b>Password Changed!</b> You can login now";
				echo 2;
			}

		}else{
			echo'Password not matched!';
		}
	}else{
		echo "Sorry! User not confirmed...";
	}
}
