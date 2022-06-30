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
    include '../../partials/_header.php';
    $action_url = $root_url . '/auth/recover/_recover.php';

    ?>
    <div class="container section_top">
        <div class="row justify-content-center my-3 g-1">
            <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded p-4">
                <h3 class=" heading_color my-3 ">Recover your password </h3>
                <form onsubmit="submitForm(event,'<?php echo $action_url ?>')" class="my-3">
                    <div class="form-floating text-muted">
                        <input type="email" minlength="6" class="form-control _form_data" id="email" name="email" placeholder=" " required>
                        <label for="email">Enter your email</label>

                    </div>
                    <div class="form-floating text-muted">
                        <input type="password" minlength="6" class="form-control _form_data my-2" id="password1" name="password1" placeholder=" " required>
                        <label for="password1">New Password</label>

                    </div>
                    <div class="form-floating  text-muted">
                        <input type="password" minlength="6" class="form-control _form_data my-2" id="password2" name="password2" placeholder=" " required>
                        <label for="password2">Confirm Password</label>
                    </div>
                    <h6 class="text-muted ">Security Question</h6>
                    <div class="form-floating text-muted">
                        <input type="date" class="form-control _form_data" id="birthday " name="birthday" placeholder=" " required>
                        <label for="birthday">Date of Birth</label>
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary  w-100 mt-3">Change Password</button>
                </form>
            </div>
        </div>
    </div>

    <?php include '../../partials/_footer.php' ?>




    <!--  JS Files -->
    <?php include '../../partials/_js_files.php'; ?>



</body>

</html>