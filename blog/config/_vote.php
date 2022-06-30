<?php
include '../../db/_db.php';
session_start();
$UserID =  $_SESSION['userId'];
$db = new DB();


if (isset($_GET['cmnt'])) {

    $CommentID =  $_GET['cmnt'];
    $BlogID =  $_GET['BlogID'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
    $result_isLiked = mysqli_query($con, $sql_isLiked);
    $isLiked = $db->getCount($sql_isLiked);
    $sql = "INSERT INTO `votes` (`CommentID`, `UserID`) VALUES ('$CommentID','$UserID')";

    if ($isLiked) {
        $sql = " DELETE FROM `votes` WHERE `CommentID`='$CommentID' AND `UserID`= '$UserID'";
    } else {
        $sql_b = "SELECT `UserID` FROM `comments` WHERE `CommentID`=" . $CommentID;
        $rows = $db->execute($sql_b);
        foreach ($rows as $row) {
            $user_name = $_SESSION['userName'];
            $content = "<b>" . $user_name . "</b> likes your comment";
            $path = "/blog/article/?p=" . $BlogID;
            $n_to = $row['UserID'];
            $notification = new Notification($content, $n_to, $path);
        }
    }
    $db->execute($sql);
    echo 1;
}
if (isset($_GET['ReplyID'])) {

    $ReplyID =  $_GET['ReplyID'];
    $BlogID =  $_GET['BlogID'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `ReplyID`='$ReplyID' AND `UserID`= '$UserID'";
    $isLiked = $db->getCount($sql_isLiked);

    $sql = "INSERT INTO `votes` (`ReplyID`, `UserID`) VALUES ('$ReplyID','$UserID')";
    if ($isLiked) {
        $sql = " DELETE FROM `votes` WHERE `ReplyID`='$ReplyID' AND `UserID`= '$UserID'";
    }else{
        $sql_b = "SELECT `UserID` FROM `reply` WHERE `ReplyID`=" . $ReplyID;
        $rows = $db->execute($sql_b);
        foreach ($rows as $row) {
            $user_name = $_SESSION['userName'];
            $content = "<b>" . $user_name . "</b> likes your reply";
            $path = "/blog/article/?p=" . $BlogID;
            $n_to = $row['UserID'];
            $notification = new Notification($content, $n_to, $path);
        }
    }
    $db->execute($sql);
    echo 1;
}

if (isset($_GET['blog'])) {
    $BlogID =  $_GET['blog'];

    $sql_isLiked = "SELECT * FROM `votes` WHERE `BlogID`='$BlogID' AND `UserID`= '$UserID'";
    $isLiked = $db->getCount($sql_isLiked);
    $sql = "DELETE FROM `votes` WHERE `BlogID`='$BlogID' AND `UserID`= '$UserID'";

    if ($isLiked == 0) {
        $sql = "INSERT INTO `votes` (`BlogID`, `UserID`) VALUES ('$BlogID','$UserID')";
        $db->execute($sql);
        $sql_b = "SELECT `UserID` FROM `blog` WHERE `BlogID`=" . $BlogID;
        $rows = $db->execute($sql_b);
        foreach ($rows as $row) {
            $user_name = $_SESSION['userName'];
            $content = "<b>" . $user_name . "</b> likes your post";
            $path = "/blog/article/?p=" . $BlogID;
            $n_to = $row['UserID'];
            $notification = new Notification($content, $n_to, $path);
        }
    } 
    $db->execute($sql);

    echo 1;
}
$db->close();
