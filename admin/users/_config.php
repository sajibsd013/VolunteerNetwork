<?php
session_start();
include '../../db/_db.php';

if (isset($_GET['UserID'])) {
    $UserID  = $_GET['UserID'];
    $sql = "DELETE FROM `users` WHERE `UserID` = $UserID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 1;
    }
}
