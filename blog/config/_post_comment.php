<?php
session_start();
include '../../db/_db.php';
$UserID = $_SESSION["UserID"];
if (isset($_POST['comment'])) {
    $comment_content = mysqli_real_escape_string($con, $_POST['comment']);
    $BlogID = mysqli_real_escape_string($con, $_POST['BlogID']);
    $sql = "INSERT INTO `comments` (`comment_content`, `BlogID`, `UserID`) VALUES('$comment_content','$BlogID','$UserID')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "reload";
    }
}
