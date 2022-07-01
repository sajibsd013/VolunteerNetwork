<?php
include '../../db/_db.php';
session_start();
$UserID =  $_SESSION['UserID'];

if (isset($_GET['cmnt'])) {

    $CommentID =  $_GET['cmnt'];
    $BlogID =  $_GET['BlogID'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
    $r1 = mysqli_query($con, $sql_isLiked);
    $isLiked = mysqli_num_rows($r1);

    $sql = "INSERT INTO `votes` (`CommentID`, `UserID`) VALUES ('$CommentID','$UserID')";
    if ($isLiked) {
        $sql = " DELETE FROM `votes` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
    }
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "reload";
    }
}
if (isset($_GET['ReplyID'])) {

    $ReplyID =  $_GET['ReplyID'];
    $BlogID =  $_GET['BlogID'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `ReplyID`='$ReplyID' AND `UserID`= '$UserID'";
    $r1 = mysqli_query($con, $sql_isLiked);
    $isLiked = mysqli_num_rows($r1);



    $sql = "INSERT INTO `votes` (`ReplyID`, `UserID`) VALUES ('$ReplyID','$UserID')";
    if ($isLiked) {
        $sql = " DELETE FROM `votes` WHERE `ReplyID`='$ReplyID' AND `UserID`= '$UserID'";
    }
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "reload";
    }
}

if (isset($_GET['blog'])) {
    $BlogID =  $_GET['blog'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `BlogID`='$BlogID' AND `UserID`= '$UserID'";
    $r1 = mysqli_query($con, $sql_isLiked);
    $isLiked = mysqli_num_rows($r1);
    $sql = "INSERT INTO `votes` (`BlogID`, `UserID`) VALUES ('$BlogID','$UserID')";


    if ($isLiked) {
        $sql = "DELETE FROM `votes` WHERE `BlogID`='$BlogID' AND `UserID`= '$UserID'";
    }
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "reload";
    }
}
