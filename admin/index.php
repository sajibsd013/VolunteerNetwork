<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../partials/_css_files.php'; ?>


    <title>Volunteer Network</title>
</head>

<body>
    <div class="admin_root ">

        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            $user_type = $_SESSION["user_type"];
            if ($user_type == "admin") {
                include 'partials/_header.php';
                include '../db/_db.php';

                include 'partials/_home.php';
            } else {
                include '../partials/_page_not_found.php';
            }
        } else {
            include '../partials/_page_not_found.php';
        }
        ?>

    </div>



    <!--  JS Files -->
    <?php include '../partials/_js_files.php'; ?>




</body>

</html>