<?php
session_start();

include '../../db/_db.php';
$user_id =  $_SESSION['UserID'];

if (isset($_POST['name'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
    $last_blood_donate = mysqli_real_escape_string($con, $_POST['last_blood_donate']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $sql = "UPDATE `users` SET `name` = '$name', `mobile` = '$mobile', `birthday` = '$birthday',`last_blood_donate`='$last_blood_donate',`address`='$address'  WHERE `UserID` =$user_id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $_SESSION["name"] =   $name;
        echo "Profile Updated";
    }
}

if (isset($_GET['delete'])) {
    $userid = $_GET['delete'];
    $sql = "DELETE FROM `users` WHERE `UserID` = $userid";
    $result = mysqli_query($con, $sql);
    session_destroy();
    echo 3;
}
if (isset($_GET['deactivete'])) {
    $userid = $_GET['deactivete'];
    $sql = "UPDATE `users` SET `status` = 'deactivete' WHERE `UserID` =$userid";
    $result = mysqli_query($con, $sql);

    $sql1 = "SELECT * FROM `blog` WHERE `UserID`='$userid' AND `status`='approved'";
    $result1 = mysqli_query($con, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $BlogID = $row['BlogID'];
        $sql2 = "UPDATE `blog` SET `status` = 'hidden' WHERE `BlogID`=$BlogID";
        $result2 = mysqli_query($con, $sql2);
    }
    session_destroy();
    echo 3;
}
