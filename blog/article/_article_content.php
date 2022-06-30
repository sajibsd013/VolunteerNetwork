<?php
$BlogID = $_GET['p'];

$sql = "SELECT * FROM `blog` WHERE `BlogID` = '$BlogID'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $blog_title = $row['blog_title'];
    $blog_desc = $row['blog_desc'];
    $UserID = $row['UserID'];
    $timestand = $row['timestand'];
    $datetime = new DateTime($timestand, timezone_open('asia/dhaka'));
    $date_format = $datetime->format('M d, Y');




    $sql2 = "SELECT * FROM `users` WHERE `UserID` =" . $UserID;
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $username = $row2['username'];

    if (isset($_SESSION['userId']) && $_SESSION['userId'] == $UserID) {
        $post_update_url = '/E-learning/blog/update/?blog=' . $BlogID;
        $post_dlt_url = '/E-learning/blog/config/_delete.php?BlogID=' . $BlogID;
        $post_update_delete_code = '
                <div class="dropdown dropstart " style="position: absolute; right:10px; top:3px">
                    <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <i class="fa fa-ellipsis-h text-muted"></i> 
                        </span>
                    </a>
                    <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item " href="' . $post_update_url . '"  style="cursor: pointer;" ">Edit</a></li>
                        <li><a class="dropdown-item "  onclick="return confirm(`Are you sure?`) && getFunc(`' . $post_dlt_url . '`)"  style="cursor: pointer;" ">Delete</a></li>
                    </ul>
                </div>
            ';
    } else {
        $post_update_delete_code = '';
    }
}


$sql_count_vote = "SELECT * FROM `votes` WHERE `BlogID`='$BlogID' ";
$result_count_vote = mysqli_query($con, $sql_count_vote);
$total_vote = mysqli_num_rows($result_count_vote);
if ($total_vote == 0) {
    $blog_vote_text = '';
} else {
    $blog_vote_text = '
    <small class="d-block text-muted"> <i class="ms-2 fa fa-heart text-danger" style="font-size:12px;"></i> ' . $total_vote . '</small>
    ';
}


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $user_id = $_SESSION["userId"];
    $vote_url_blog = '/E-learning/blog/config/_vote.php?blog=' . $BlogID;

    $sql_isLiked = "SELECT * FROM `votes` WHERE `BlogID`='$BlogID' AND `UserID`= '$user_id'";
    $result_isLiked = mysqli_query($con, $sql_isLiked);
    $isLiked = mysqli_num_rows($result_isLiked);
    if ($isLiked == 0) {
        $class_like = "dark";
    } else {
        $class_like = "danger";
        if ($total_vote == 1) {
            $blog_vote_text = '
            <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> You</small>
            ';
        } else {
            $total_vote_r = $total_vote - 1;
            $blog_vote_text = '
            <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> You and ' . $total_vote_r . ' others</small>
            ';
        }
    }
}
$action_url = "/E-Learning/blog/config/_post_comment.php";

?>


<div class="container my-2">

    <div class="row g-3">
        <div class="col-lg-7">

            <div class="card">
                <div class="card-header bg-white py-3 ">
                    <?php echo $post_update_delete_code ?>

                    <h4 class="card-title d-flex">
                        <span>
                            <?php echo $blog_title ?>
                        </span>
                    </h4>
                    <p class="card-text">
                        <small class="text-muted"><?php echo $date_format ?> by <strong> <?php echo $username ?> </strong> </small>
                    </p>
                </div>
                <div class="card-body">
                    <pre class="" style="margin: 0;"><?php echo $blog_desc ?></pre>
                </div>

                <?php



                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

                ?>

                    <div class="card-footer bg-white">
                        <?php echo $blog_vote_text; ?>
                        <div>
                            <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                                <input type="text" class="d-none  _form_data" id="BlogID" name="BlogID" value="<?php echo $_GET['p']; ?>">

                                <div class="input-group ">
                                    <span class="input-group-text bg-light">
                                        <h2 style="cursor: pointer;" class="px-1" onclick="getFunc(`<?php echo $vote_url_blog; ?>`)">
                                            <i class="fa fa-heart text-<?php echo $class_like; ?>"></i>
                                            </h4>
                                    </span>
                                    <textarea class="form-control _form_data" name="comment" row="5"></textarea>
                                    <span class="input-group-text bg-light">
                                        <button type="submit" id="post_comment" class="btn btn-primary ">
                                            <i class="fa fa-send " aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </div>

                            </form>
                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <div class="card-footer bg-white">
                        <?php echo $blog_vote_text; ?>

                        <p class="lead">
                            You are not logged in.
                            <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/E-learning/auth/login`)">Login</a>
                            or
                            <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/E-learning/auth/registration`)">Signup</a>
                            now to Post a Comment!
                        </p>
                    </div>
                <?php

                }
                ?>
            </div>

        </div>
        <div class="col-lg-5" id="blog_comments">
            <?php include '_article_comments.php'; ?>
        </div>

    </div>

</div>