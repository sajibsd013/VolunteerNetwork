<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../partials/_css_files.php'; ?>



    <title>Volunteer Network</title>
</head>

<body>

    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
        include '../../partials/_page_not_found.php';
    } else {
        include '../../partials/_header.php';
        $action_url = $root_url . '/auth/login/_login.php';

    ?>
        <div class="container section_top">

            <div class="row justify-content-center g-3 my-2 ">
                <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">



                    <h3 class="heading_color mb-4">Welcome Back!</h3>

                    <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                        <div class="form-floating  text-muted">
                            <input type="email" class="form-control _form_data" id="loginEmail" name="loginEmail" placeholder="name@example.com" required>
                            <label for="loginEmail">Email address</label>
                        </div>

                        <div class="form-floating my-2 text-muted">
                            <input type="password" class="form-control _form_data" id="loginPassword" name="loginPassword" placeholder=" " required>
                            <label for="loginPassword">Enter your Password</label>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary my-3 w-100 fw-bold">Login</button>
                    </form>
                    <h6 style="cursor: pointer;" onclick="redirectTo('<?php echo $root_url ?>/auth/recover')" class="text-center text-primary">Forgotten password?</h6>
                    <p class="text-center text-muted fw-bold">or</p>
                    <button id="" onclick="redirectTo('<?php echo $root_url ?>/auth/registration')" class="btn btn-sm btn-success m-auto d-block my-3 fw-bold ">Create new account</button>


                </div>
            </div>
        </div>

    <?php

    }
    ?>

    <?php include '../../partials/_footer.php' ?>


    <!--  JS Files -->
    <?php include '../../partials/_js_files.php'; ?>

</body>

</html>