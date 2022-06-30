<?php
    session_start();
    include '../../db/_db.php';

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {

        $user_id = $_SESSION["userId"];

        if(isset($_POST['CommentID'])){
            $comment_content=mysqli_real_escape_string($con,$_POST['comment']);
            $CommentID=mysqli_real_escape_string($con,$_POST['CommentID']);
            $sql = "UPDATE `comments` SET `comment_content` = '$comment_content' WHERE `CommentID` = $CommentID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }
        }elseif(isset($_POST['ReplyID'])){
            $reply_content=mysqli_real_escape_string($con,$_POST['reply']);
            $ReplyID=mysqli_real_escape_string($con,$_POST['ReplyID']);
            $sql = "UPDATE `reply` SET `reply_content` = '$reply_content' WHERE `ReplyID` = $ReplyID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }

        }elseif(isset($_POST['BlogID'])){
            $problem_title=mysqli_real_escape_string($con,$_POST['problem_title']);
            $short_desc=mysqli_real_escape_string($con,$_POST['short_desc']);
            $elaborate_problem=mysqli_real_escape_string($con,$_POST['elaborate_problem']);
            $BlogID=mysqli_real_escape_string($con,$_POST['BlogID']);

            $sql = "UPDATE `blog` SET `blog_title` = '$problem_title', `blog_desc` = '$elaborate_problem' , `short_desc`= '$short_desc' WHERE `BlogID` = $BlogID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }

        }
    }
?>