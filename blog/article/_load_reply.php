<?php

$sql = "SELECT * FROM `reply` WHERE `CommentID` = $CommentID  ORDER BY `timestand` DESC";
$result2 = mysqli_query($con, $sql);
$rows2 = mysqli_num_rows($result2);

if ($rows2 > 0) {

    while ($row2 = mysqli_fetch_assoc($result2)) {
        $ReplyID  = $row2['ReplyID'];
        $reply = $row2['reply_content'];
        $timestand = $row2['timestand'];
        $reply_by_id = $row2['UserID'];

        $sql2 = "SELECT * FROM `users` WHERE `UserID` =" . $reply_by_id;
        $result3 = mysqli_query($con, $sql2);

        $row3 = mysqli_fetch_assoc($result3);
        $reply_by = $row3['username'];



        $post_time = postTime($timestand);


        $sql_count_vote2 = "SELECT * FROM `votes` WHERE `ReplyID`='$ReplyID' ";
        $result_count_vote2 = mysqli_query($con, $sql_count_vote2);
        $total_vote2 = mysqli_num_rows($result_count_vote2);

        if ($total_vote2 == 0) {
            $reply_vote_text = '';
        } else {
            $reply_vote_text = '
            <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger" style="font-size:12px;"></i> ' . $total_vote2 . '</small>
            ';
        }


        if (isset($_SESSION["userId"])) {
            $user_id = $_SESSION["userId"];
            $vote_url_reply = '/E-learning/blog/config/_vote.php?ReplyID=' . $ReplyID . '&BlogID=' . $BlogID;

            $sql_isLiked = "SELECT * FROM `votes` WHERE `ReplyID`='$ReplyID' AND `UserID`= '$user_id'";
            $result_isLiked = mysqli_query($con, $sql_isLiked);
            $isLiked = mysqli_num_rows($result_isLiked);

            if ($isLiked == 0) {
                $class_like2 = "dark";
            } else {
                $class_like2 = "danger";
                if ($total_vote2 == 1) {
                    $reply_vote_text = '
                    <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger"  style="font-size:12px;"></i> You</small>
                    ';
                } else {
                    $total_vote_r = $total_vote2 - 1;
                    $reply_vote_text = '
                    <small class="d-block text-muted"> <i class="mx fa fa-heart text-danger"  style="font-size:12px;"></i> You and ' . $total_vote_r . ' others</small>
                    ';
                }
            }

            if ($reply_by_id == $user_id) {
                $rpl_update_url = '/E-learning/blog/update/?reply=' . $ReplyID;
                $rpl_dlt_url = '/E-learning/blog/config/_delete.php?ReplyID=' . $ReplyID;

                $reply_update_delete_code = '
                <div class="dropdown dropstart " style="position: absodlute;">
                    <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span>
                            <i class="fa fa-ellipsis-h text-muted"></i> 
                        </span>
                    </a>
                    <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" onclick="redirectTo(`' . $rpl_update_url . '`)"  style="cursor: pointer;" ">Edit</a></li>
                        <li><a class="dropdown-item"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $rpl_dlt_url . '`)"  style="cursor: pointer;" ">Delete</a></li>
                    </ul>
                </div>
                ';
            } else {
                $reply_update_delete_code = '';
            }


            $Like_Code_reply = '
            <small class=" text-muted ">
                ' . $post_time . ' 
                <small  style="cursor: pointer; background-color: lightgrey;" class="px-2 px-sm-3  mx-1 py-1 rounded-pill " onclick="getFunc(`' . $vote_url_reply . '`)">
                    <i  class="mx fa fa-heart text-' . $class_like2 . '"></i>
                </small> 
            </small>
            
            ';
        } else {
            $Like_Code_reply = '';
            $reply_update_delete_code = '';
        }

?>

        <div class="my-2 border bg-white px-3 py-2 rounded">
            <div class="">
                <small class="my-1 text-muted d-flex">
                    <span class="me-auto">
                        <i class="fa fa-user-circle text-primary me-1"></i>
                        <?php echo $reply_by ?>
                    </span>
                    <?php echo $reply_update_delete_code ?>

                </small>
                <pre class=""><?php echo $reply ?></pre>
                <?php echo $reply_vote_text ?>
                <?php echo $Like_Code_reply ?>
            </div>
        </div>



<?php
    }
}

?>