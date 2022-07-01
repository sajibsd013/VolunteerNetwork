<?php
session_start();
include '../../db/_db.php';


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $user_id = $_SESSION["UserID"];
    if (isset($_POST['reply'])) {
        $reply = mysqli_real_escape_string($con, $_POST['reply']);
        $CommentID = mysqli_real_escape_string($con, $_POST['CommentID']);
        $BlogID = mysqli_real_escape_string($con, $_POST['BlogID']);

        $sql = "INSERT INTO `reply` (`reply_content`, `CommentID`, `UserID`) VALUES('$reply','$CommentID','$user_id')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo 1;
        }
    }
}
