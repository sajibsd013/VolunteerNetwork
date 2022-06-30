<?php
session_start();
session_destroy();
session_start();

include '../../db/_db.php';

if (isset($_POST['loginEmail'])) {
	$email = mysqli_real_escape_string($con, $_POST['loginEmail']);
	$password = mysqli_real_escape_string($con, $_POST['loginPassword']);
	$email_search = "SELECT * from users where email='$email'";

	$query = mysqli_query($con, $email_search);
	$email_count = mysqli_num_rows($query);


	if ($email_count) {
		$row = mysqli_fetch_assoc($query);
		$user_id = $row['UserID'];
		$name = $row['name'];
		$user_type = $row['user_type'];
		$user_pass_hash = $row['password'];
		$pass_decode = password_verify($password, $user_pass_hash);
		if ($pass_decode) {
			$_SESSION["loggedin"] = true;
			$_SESSION["name"] =   $name;
			$_SESSION["UserID"] =   $user_id;
			$_SESSION["user_type"] = $user_type;
			echo 1;
		} else {
			echo "Sorry! User & Password not matched...";
		}
	} else {
		echo "Sorry! User not found...";
	}
}
