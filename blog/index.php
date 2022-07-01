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


    <title>Volunteer Network</title>
</head>

<body>
    <?php
    include '../db/_db.php';
    include '../partials/_header.php';
    include '../blog/partials/_blog_post.php';

    $action_url = '/VolunteerNetwork/blog/config/_create_post.php';

    ?>
    <div class="container ">
        <div class="p-md-5 p-3 border border-muted rounded bg-white">
            <h1 class="display-6">Welcome to <span class="text-success">Volunteer Network</span> Blog </h1>
            <p class="lead">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, soluta.
            </p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.</p>
        </div>
    </div>


    <div class="container my-2">
        <div class="row g-5  justify-content-center">
            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                $UserID = $_SESSION["UserID"];
                $sql1 = "SELECT * FROM `blog` WHERE `status`='pending' AND `UserID`='$UserID'";
                $result1 = mysqli_query($con, $sql1);
                $total_pending = mysqli_num_rows($result1);

            ?>
                <div class="col-lg-12 ">
                    <?php if ($total_pending) { ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $total_pending; ?> Pending Post <a onclick="redirectTo(`/VolunteerNetwork/blog/pending.php`)" class="alert-link pointer">View Post</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php  } ?>

                    <div class="text-center">
                        <a class="btn btn-lg btn-outline-secondary py-2 px-sm-5 " href="/VolunteerNetwork/blog/create.php">
                            Create new post <i class="fa fa-edit ms-3" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>

            <?php
            } else {
            ?>
                <div class="text-center bg-white p-3 my-3 col-lg-8">
                    <p class="lead">
                        You are not logged in.
                        <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/VolunteerNetwork/auth/login`)">Login</a>
                        or
                        <a class="text-decoration-none text-bold" style="cursor: pointer;" onclick="redirectTo(`/VolunteerNetwork/auth/registration`)">Signup</a>
                        now to Post a Comment!
                    </p>
                </div>
            <?php
            }

            ?>
            <div class="col-lg-5">
                <h5 class="text-muted">LATEST Post</h5>
                <?php
                $sql = "SELECT * FROM `blog` WHERE `status`='approved'  ORDER BY `timestand` DESC";
                blogPost($con, $sql);
                ?>
            </div>

            <div class="col-lg-5">
                <h5 class="text-muted">TOP Post</h5>
                <?php
                $sql = "SELECT * FROM `blog` WHERE `status`='approved'  ORDER BY `timestand` ASC LIMIT 4";
                blogPost($con, $sql);
                ?>
            </div>
        </div>
    </div>
    <?php include '../partials/_footer.php' ?>


    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>