<?php

function blogPost($con, $sql)
{

    $sql = $sql;
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

        $blog_title = $row['blog_title'];
        $short_desc = $row['short_desc'];
        $timestand = $row['timestand'];
        $BlogID = $row['BlogID'];
        $UserID = $row['UserID'];

        $sql2 = "SELECT * FROM `users` WHERE `UserID` =" . $UserID;
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $name = $row2['name'];
        $start = new DateTime();
        $end = new DateTime($timestand, timezone_open('asia/dhaka'));

        $interval = $start->diff($end);

        $year = $interval->format('%y');
        $months = $interval->format('%m');
        $days = $interval->format('%a');
        $hours = $interval->format('%h');
        $min = $interval->format('%i');
        $post_time = "Just now";

        if ($year > 0) {
            $post_time = $year . ' yers ago';
        } else if ($months > 0) {
            $post_time = $months . ' months ago';
        } else if ($days > 0) {
            $post_time = $days . ' days ago';
        } else if ($hours > 0) {
            $post_time = $hours . ' hours ago';
        } else if ($min > 0) {
            $post_time = $min . ' mins ago';
        }



        $url = "/VolunteerNetwork/blog/article/?p=" . $BlogID;


        $sql3 = "SELECT * FROM `comments` WHERE `BlogID` =" . $BlogID;
        $result3 = mysqli_query($con, $sql3);
        $rows3 = mysqli_num_rows($result3);


        if (isset($_SESSION['userId']) && ($_SESSION['userId'] == $UserID)) {
            $post_update_url = '/VolunteerNetwork/blog/update/?blog=' . $BlogID;
            $post_dlt_url = '/VolunteerNetwork/blog/config/_delete.php?BlogID=' . $BlogID;
            $post_update_delete_code = '
                    <div class="dropdown dropstart " style="position: absolute; right:10px">
                        <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <i class="fa fa-ellipsis-h text-muted"></i> 
                            </span>
                        </a>
                        <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item " onclick="redirectTo(`' . $post_update_url . '`)"  style="cursor: pointer;" ">Edit</a></li>
                            <li><a class="dropdown-item "  onclick="return confirm(`Are you sure?`) && getFunc(`' . $post_dlt_url . '`)"  style="cursor: pointer;" ">Delete</a></li>
                        </ul>
                    </div>
                ';
        } else {
            $post_update_delete_code = '';
        }


?>
        <div class="my-2">
            <div class="card">
                <div class="card-header bg-white">
                    <small class="text-muted d-flex">
                        <span>
                            <i class="fa fa-user-circle text-primary me-1"></i> <?php echo $name ?>
                        </span>
                        <?php echo $post_update_delete_code ?>
                    </small>
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $blog_title ?>
                    </h5>
                    <p class="card-text small"><?php echo $short_desc; ?>...</p>
                    <a onclick="redirectTo('<?php echo $url ?>')" class="text-decoration-none pointer">Continue reading</a>

                </div>
                <div class="card-footer text-muted">
                    <p class="card-text d-flex justify-content-between">
                        <small class="text-muted"><?php echo $post_time ?> </small>
                        <small class="text-muted"><?php echo $rows3 ?> Comments </small>
                    </p>
                </div>
            </div>


        </div>
<?php
    }
}

?>