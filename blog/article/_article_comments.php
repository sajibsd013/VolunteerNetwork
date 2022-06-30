<?php
$BlogID = $_GET['p'];

$sql = "SELECT * FROM `comments` WHERE `BlogID` ='$BlogID' ORDER BY `timestand` DESC";
$result = mysqli_query($con, $sql);
$rows = mysqli_num_rows($result);
echo '
    <h3 class="px-3 py-2"> 
        <i class="fa fa-comments text-primary "></i>
        ' . $rows . ' Discussions
    </h3>
    ';
include('../config/_config.php');

$noResult = true;
while ($row = mysqli_fetch_assoc($result)) {
    $noResult = false;
    $CommentID = $row['CommentID'];
    $comment = $row['comment_content'];
    $comment_time = $row['timestand'];
    $comment_by_id = $row['UserID'];

    $sql2 = "SELECT * FROM `users` WHERE `UserID` =" . $comment_by_id;
    $result2 = mysqli_query($con, $sql2);

    $row2 = mysqli_fetch_assoc($result2);
    $comment_by = $row2['username'];


    $post_time = postTime($comment_time);

    $sql_count_vote = "SELECT * FROM `votes` WHERE `CommentID`='$CommentID'";
    $result_count_vote = mysqli_query($con, $sql_count_vote);
    $total_vote = mysqli_num_rows($result_count_vote);
    if ($total_vote == 0) {
        $comment_vote_text = '';
    } else {
        $comment_vote_text = '
            <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> ' . $total_vote . '</small>
            ';
    }

    if (isset($_SESSION["userId"])) {
        $user_id = $_SESSION["userId"];
        $vote_url_comment = '/E-learning/blog/config/_vote.php?cmnt=' . $CommentID . '&BlogID=' . $BlogID;

        $sql_isLiked = "SELECT * FROM `votes` WHERE `CommentID`='$CommentID' AND `UserID`= '$user_id'";
        $result_isLiked = mysqli_query($con, $sql_isLiked);
        $isLiked = mysqli_num_rows($result_isLiked);
        if ($isLiked == 0) {
            $class_like = "dark";
        } else {
            $class_like = "danger";

            if ($total_vote == 1) {
                $comment_vote_text = '
                    <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> You</small>
                    ';
            } else {
                $total_vote_r = $total_vote - 1;
                $comment_vote_text = '
                    <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> You and ' . $total_vote_r . ' others</small>
                    ';
            }
        }
        if ($comment_by_id == $user_id) {
            $cmt_update_url = '/E-learning/blog/update/?comment=' . $CommentID;
            $comment_dlt_url = '/E-learning/blog/config/_delete.php?CommentID=' . $CommentID;
            $comment_update_delete_code = '
                        <div class="dropdown dropstart">
                            <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span>
                                    <i class="fa fa-ellipsis-h text-muted"></i> 
                                </span>
                            </a>
                            <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item pointer" href="' . $cmt_update_url . '" >Edit</a></li>
                                <li><a class="dropdown-item "  onclick="return confirm(`Are you sure?`) && getFunc(`' . $comment_dlt_url . '`)"  style="cursor: pointer;" ">Delete</a></li>
                            </ul>
                        </div>
                    ';
        } else {
            $comment_update_delete_code = '';
        }


        $like_reply__code = '

            <div class="">
                <small>
                    ' . $post_time . ' 
                </small>
                <small  style="cursor: pointer; background-color: lightgrey;" class="  px-3 mx-1 py-1 rounded-pill " onclick="getFunc(`' . $vote_url_comment . '`)">
                    <i  class="fa fa-heart text-' . $class_like . '"></i>
                </small> 
                <small style="cursor: pointer; background-color: lightgrey;" class=" px-3 py-1 rounded-pill text-dark" 
                onclick="displayForm(' . $CommentID . ')" >Reply</small>  
            </div>
            
            ';
    } else {
        $like_reply__code = '';
        $comment_update_delete_code = '';
    }


    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        $reply_form = '
                    <form onsubmit="postReply(event,' . $CommentID . ','.$BlogID.')" style="display:none;" id="reply_form' . $CommentID . '" >
                        <div class="form-group my-2 ">
                            <label for="">Write a Reply</label>
                            <textarea class="form-control  my-1" id="reply' . $CommentID . '" name="reply' . $CommentID . '" rows="1" required></textarea>
                        </div>
                        <button type="submit" id="post_reply" class="btn btn-success my-2">Reply</button>
                    </form>
            ';
    } else {
        $reply_form = " ";
    }
?>

    <div class="my-2 border bg-white px-3 py-2 rounded">
        <div class="mb-2">
            <small class="my-1 text-muted d-flex">
                <span class="me-auto"><i class="fa fa-user-circle text-primary me-1"></i> <?php echo $comment_by ?></span>
                <?php echo $comment_update_delete_code ?>
            </small>
            <pre class=""><?php echo $comment ?></pre>

            <?php echo $comment_vote_text ?>
            <?php echo $like_reply__code ?>


        </div>
        <?php echo $reply_form ?>
        <?php
        $sql = "SELECT * FROM `reply` WHERE `CommentID` =" . $CommentID;
        $result2 = mysqli_query($con, $sql);
        $rows2 = mysqli_num_rows($result2);
        if ($rows2 > 0) {
        ?>

            <div class="accordion " id="accordionExample">
                <div class="accordion-item border-0">
                    <h4 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed border py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $CommentID ?>" aria-expanded="false" aria-controls="collapse<?php echo $CommentID ?>">
                            <i class="fa fa-comments text-primary me-1"></i>
                            <?php echo $rows2; ?> Replays
                        </button>
                    </h4>
                    <div id="collapse<?php echo $CommentID ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-1 ">
                            <?php include '_load_reply.php'; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php

        }
        ?>

    </div>
<?php
}

if ($noResult) {
    echo '
        <div class="p-md-5 p-3  my-3 rounded bg-white">
            <h1 class="fw-normal">No Comment Found!</h1>
            <p class="lead">Be the first person to add Comment </p>
        </div>
        ';
}
?>