<?php
session_start();
include '../../db/_db.php';
$db = new DB();


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $user_id = $_SESSION["userId"];
    if (isset($_POST['reply'])) {
        $reply = mysqli_real_escape_string($con, $_POST['reply']);
        $CommentID = mysqli_real_escape_string($con, $_POST['CommentID']);
        $BlogID = mysqli_real_escape_string($con, $_POST['BlogID']);

        $sql = "INSERT INTO `reply` (`reply_content`, `CommentID`, `UserID`) VALUES('$reply','$CommentID','$user_id')";
        $result = $db->execute($sql);
        if ($result) {
            $sql_b = "SELECT `UserID` FROM `comments` WHERE `CommentID`=" . $CommentID;
            $rows = $db->execute($sql_b);
            foreach ($rows as $row) {
                $user_name = $_SESSION['userName'];
                $content = "<b>" . $user_name . "</b> replied on your comment";
                $path = "/blog/article/?p=" . $BlogID;
                $n_to = $row['UserID'];
                $notification = new Notification($content, $n_to, $path);
            }
            echo 1;
        }
    }
}

$db->close();
