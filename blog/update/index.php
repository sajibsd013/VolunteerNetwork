<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/_css_files.php' ?>

    <title>E-learning</title>
</head>

<body>
    <div class="container " onmousemove="j_editor()" onload="console.log('LOad')">
        <?php
        include '../../db/_db.php';

        include '../../partials/_header.php';

        if (isset($_GET['comment'])) {
            $CommentID =  $_GET['comment'];
            $sql_cmt_v = "SELECT * FROM comments WHERE CommentID=" . $CommentID;
            $result = mysqli_query($con, $sql_cmt_v);
            $row = mysqli_fetch_assoc($result);
            if ($row["UserID"] == $_SESSION["userId"]) {
        ?>
                <div class="row justify-content-center g-1 my-2 ">
                    <div class="col-lg-10 col-md-7 col-sm-10  bg-white shadow-lg rounded p-4">
                        <form onsubmit="updateComment(event)">
                            <input type="text" class="d-none  _comment_data" id="CommentID" name="CommentID" value="<?php echo $CommentID; ?>">
                            <div class="form-group my-2">
                                <h3 class="pb-2"> <i class="fa fa-comment text-primary lead"></i> Update comment</h3>
                                <textarea class="form-control bg-light my-1 _comment_data" id="editor" name="comment" rows="3" required><?php echo $row["comment_content"]; ?></textarea>
                            </div>
                            <button type="submit" id="post_comment" class="btn btn-success my-2">Update Comment</button>
                        </form>
                    </div>
                </div>
            <?php
            } else {
                include '../partials/_page_not_found.php';
            }
        } elseif (isset($_GET['reply'])) {
            $ReplyID =  $_GET['reply'];
            $sql_rpl_v = "SELECT * FROM reply WHERE ReplyID =" . $ReplyID;
            $result = mysqli_query($con, $sql_rpl_v);
            $row = mysqli_fetch_assoc($result);
            if ($row["UserID"] == $_SESSION["userId"]) {
            ?>
                <div class="row justify-content-center g-1 my-2 ">
                    <div class="col-lg-10 col-md-7 col-sm-10  bg-white shadow-lg rounded p-4">
                        <form onsubmit="updateReply(event)">
                            <input type="text" class="d-none  _reply_data" id="ReplyID" name="ReplyID" value="<?php echo $ReplyID; ?>">
                            <div class="form-group my-2">
                                <h3 class="pb-2"> <i class="fa fa-comment text-primary lead"></i> Update Reply</h3>
                                <textarea class="form-control bg-light my-1 _reply_data" id="editor" name="reply" rows="3" required><?php echo $row["reply_content"]; ?></textarea>
                            </div>
                            <button type="submit" id="post_comment" class="btn btn-success my-2">Update Reply</button>
                        </form>
                    </div>
                </div>
            <?php
            } else {
                include '../partials/_page_not_found.php';
            }
        } elseif (isset($_GET['blog'])) {
            $BlogID =  $_GET['blog'];
            $sql_blog_v = "SELECT * FROM blog WHERE BlogID =" . $BlogID;
            $result = mysqli_query($con, $sql_blog_v);
            $row = mysqli_fetch_assoc($result);
            if ($row["UserID"] == $_SESSION["userId"]) {
            ?>
                <div class="row justify-content-center g-1 my-2 ">
                    <div class="col-lg-10 col-sm-10  bg-white shadow-lg rounded p-4">
                        <form onsubmit="updatePost(event)">
                            <h3 class="pb-2"> Update Post</h3>
                            <input type="text" class="d-none  _blog_data" id="BlogID" name="BlogID" value="<?php echo $BlogID; ?>">

                            <div class="form-group">
                                <label for="problem_title">Problem title</label>
                                <input type="text" class="form-control my-1 _blog_data" id="title" name="problem_title" value="<?php echo $row['blog_title'] ?>" required>
                            </div>
                            <div class="form-group my-2">
                                <label for="elaborate_problem ">Short Description </label>
                                <textarea class="form-control my-1 _blog_data" id="" name="short_desc" rows="2" required><?php echo $row['short_desc'] ?></textarea>
                            </div>
                            <div class="form-group my-2">
                                <label for="elaborate_problem ">Elaborate Your Concern </label>
                                <textarea class="form-control my-1 _blog_data" id="editor" name="elaborate_problem" rows="10" required><?php echo $row['blog_desc'] ?></textarea>
                            </div>
                            <button type="submit" id="submit" class="btn btn-success my-2">Update</button>
                        </form>
                    </div>
                </div>
        <?php
            } else {
                include '../partials/_page_not_found.php';
            }
        } else {
            include '../partials/_page_not_found.php';
        }

        ?>

    </div>



    <!--  JS Files -->
    <?php include '../../partials/_js_files.php' ?>



</body>

</html>