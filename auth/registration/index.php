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
        $action_url = $root_url . '/auth/registration/_registration.php';
    ?>
        <section class="container section_top">
            <div class="row justify-content-center g-3 my-2">
                <div class="col-lg-8 bg-white shadow-lg rounded p-4">
                    <h3 class="heading_color">Hi There,</h3>
                    <p class="mb-6 lead">Register now to explore more</p>

                    <form class="text-muted" onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                        <div class="row g-2 justify-content-center">
                            <div class="form-floating  col-md-12">
                                <input type="text" minlength="6" class="form-control _form_data" id="name" name="name" placeholder=" " required>
                                <label for="name">Full Name </label>
                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="email" minlength="6" class="form-control _form_data" id="email" name="email" aria-describedby="emailHelp" placeholder=" " required>
                                <label for="email">Email address</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="txet" minlength="7" class="form-control _form_data" id="mobile" name="mobile" placeholder=" " required>
                                <label for="mobile">Phone Number</label>

                            </div>
                            <div class="form-floating col-md-6">
                                <select class="form-select _form_data" id="gender" name="gender">
                                    <option disabled selected>......</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Others</option>
                                </select>
                                <label for="gender">Gender</label>
                            </div>
                            <div class="form-floating col-md-6">
                                <select class="form-select _form_data" id="blood_group" name="blood_group">
                                    <option disabled selected>......</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                                <label for="blood_group">Blood Group</label>
                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="date" class="form-control _form_data" id="birthday " name="birthday" placeholder=" " required>
                                <label for="birthday">Date of Birth</label>
                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="date" class="form-control _form_data" id="last_blood_donate " name="last_blood_donate" placeholder=" ">
                                <label for="last_blood_donate">Last Blood Donote</label>
                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="password" minlength="6" class="form-control _form_data" id="password1" name="password1" placeholder=" " required>
                                <label for="password1">Password</label>

                            </div>
                            <div class="form-floating  col-md-6">
                                <input type="password" minlength="6" class="form-control _form_data" id="password2" name="password2" placeholder=" " required>
                                <label for="password2">Confirm Password</label>
                            </div>
                            <div class="col-12">
                                <label for="address">Address</label>
                                <textarea class="form-control _form_data" id="address" name="address" placeholder=" " rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                                    <label class="form-check-label" for="invalidCheck3">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary px-6 my-3">Signup</button>

                        </div>
                    </form>
                    <p class="text-center text-muted fw-bold">or</p>
                    <button id="" onclick="redirectTo('<?php echo $root_url ?>/auth/login')" class="btn btn-sm btn-success m-auto d-block my-3 fw-bold px-6">Login Now</button>


                </div>
            </div>
        </section>

    <?php

    }
    ?>


    <?php include '../../partials/_footer.php' ?>


    <!--  JS Files -->
    <?php include '../../partials/_js_files.php'; ?>





</body>

</html>