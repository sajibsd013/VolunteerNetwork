<?php
session_start();
include '../../db/_db.php';
$db = new DB();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $UserID = $_SESSION["userId"];
    if (isset($_POST['comment'])) {
        $comment_content = mysqli_real_escape_string($con, $_POST['comment']);
        $BlogID = mysqli_real_escape_string($con, $_POST['BlogID']);
        $sql = "INSERT INTO `comments` (`comment_content`, `BlogID`, `UserID`) VALUES('$comment_content','$BlogID','$UserID')";
        $result = $db->execute($sql);
        if ($result) {
            $sql_b = "SELECT `UserID` FROM `blog` WHERE `BlogID`=" . $BlogID;
            $rows = $db->execute($sql_b);
            foreach ($rows as $row) {
                $user_name = $_SESSION['userName'];
                $content = "<b>" . $user_name . "</b> commented on your post";
                $path = "/blog/article/?p=" . $BlogID;
                $n_to = $row['UserID'];
                $notification = new Notification($content,$n_to,$path);
            }

            echo 3;
        }
    }
    $db->close();
}
