<?php
session_start();

$current_path = "/NEUBSSC/auth/registration/";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../../db/_db.php';

    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $mobile =  $_POST['mobile'];
    $gender =  $_POST['gender'];
    $blood_group =  $_POST['blood_group'];
    $birthday =  $_POST['birthday'];
    $last_blood_donate =  $_POST['last_blood_donate'];
    $address =  $_POST['address'];
    $pass1 =  $_POST['password1'];
    $pass2 =  $_POST['password2'];

    $existsql = "SELECT * FROM `users` WHERE `email` = '$email'";

    $result = mysqli_query($con, $existsql);
    $numRows = mysqli_num_rows($result);


    if ($numRows > 0) {
        $showError = "User already in use";
        echo $showError;
    } else {
        if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`name`, `email`,`mobile`,`gender`,`blood_group`,`birthday`,`last_blood_donate`,`address`,`password`) VALUES ('$name', '$email','$mobile','$gender','$blood_group','$birthday','$last_blood_donate','$address','$hashpass')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $_SESSION["message"] = "<b>Signup Success!</b> You can login now";
                echo 2;
            }
        } else {
            $showError = "Passwords do not match";
            echo $showError;
        }
    }
}
