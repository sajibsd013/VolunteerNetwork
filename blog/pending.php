<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../partials/_css_files.php' ?>


    <title>E-learning</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <?php
                include '../db/_db.php';
                include '../partials/_header.php';

                $sql = "SELECT * FROM `blog` WHERE `status`='pending' AND `UserID`=" . $_SESSION['userId'];

                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $blog_title = $row['blog_title'];
                    $blog_desc = $row['blog_desc'];
                    $timestand = $row['timestand'];
                    $BlogID = $row['BlogID'];
                    $UserID = $row['UserID'];

                    $url = "/E-learning/blog/article/?p=" . $BlogID;

                    if (isset($_SESSION['userId']) && ($_SESSION['userId'] == $UserID)) {
                        $post_update_url = '/E-learning/blog/update/?blog=' . $BlogID;
                        $post_dlt_url = '/E-learning/blog/config/_delete.php?BlogID=' . $BlogID;
                        $post_update_delete_code = '
                    <div class="dropdown dropstart " style="position: absolute; right:10px">
                        <a href="#" class="d-block link-dark text-decoration-none " id="dropdownUser1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <i class="fa fa-ellipsis-h text-muted"></i> 
                            </span>
                        </a>
                        <ul class="dropdown-menu text-small my-2" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item pointer" href="'.$post_update_url.'"  ">Edit</a></li>
                            <li><a class="dropdown-item "  onclick="return confirm(`Are you sure?`) && getFunc(`' . $post_dlt_url . '`)"  style="cursor: pointer;" ">Delete</a></li>
                        </ul>
                    </div>
                ';
                    } else {
                        $post_update_delete_code = '';
                    }

                ?>

                    <div class="card my-2">
                        <div class="card-header bg-white py-3 ">
                            <?php echo $post_update_delete_code ?>

                            <h4 class="card-title d-flex">
                                <?php echo $blog_title ?>

                            </h4>
                        </div>
                        <div class="card-body">
                            <pre class="" style="margin: 0;"><?php echo $blog_desc ?></pre>

                        </div>

                    </div>
                <?php
                }

                ?>

            </div>
        </div>
    </div>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>


</body>

</html>