<?php
    session_start();
    include '../../db/_db.php';
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true) {
        if(isset($_GET['CommentID'])){
            $CommentID = $_GET['CommentID'];
            $sql = "DELETE FROM `comments` WHERE `CommentID` = $CommentID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }
        }
        elseif(isset($_GET['ReplyID'])){
            $ReplyID = $_GET['ReplyID'];
            $sql = "DELETE FROM `reply` WHERE `ReplyID` = $ReplyID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 1;
            }
        }
        elseif(isset($_GET['BlogID'])){
            $BlogID = $_GET['BlogID'];
            $sql = "DELETE FROM `blog` WHERE `BlogID` = $BlogID";
            $result = mysqli_query($con,$sql);
            if($result){
                echo 2;
            }
        }
    }
?>