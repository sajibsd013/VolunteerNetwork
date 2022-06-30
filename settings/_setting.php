<?php
include('../db/_db.php');

$UserID = $_SESSION['UserID'];

$sql = "SELECT * FROM `users` WHERE `UserID`='$UserID'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);

$action_url =  $root_url . '/settings/config/_config.php';
$action_url_pass = $root_url . '/settings/config/_change_pass.php';
?>
<div class="row  section_top">
    <div class="col-md-11 col-11 mx-auto">

        <div class="row ">
            <!--Right side navbar-->
            <div class="col-lg-3 col-md-4 d-md-block">
                <div class="card bg-common card-left">
                    <div class="card-body">
                        <nav class="nav d-md-block d-none ">
                            <div class="nav nav-tabs d-md-block d-none" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile
                                </a>
                                <a class="nav-link " id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="false">Account
                                </a>
                                <a class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security
                                </a>
                                <a class="nav-link" id="notification-tab" data-bs-toggle="tab" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="false">Notification
                                </a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
            <!--Right side bar starts-->
            <div class="col-lg-8 col-md-9">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-md-none ">
                        <ul class="nav nav-tabs card-header-tabs nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">P
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="account-tab" data-bs-toggle="tab" data-bs-target="#account" type="button" role="tab" aria-controls="account" aria-selected="true">A
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="true">S
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="notification-tab" data-bs-toggle="tab" data-bs-target="#notification" type="button" role="tab" aria-controls="notification" aria-selected="true">N
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h6>Your profile information</h6>
                            <hr>

                            <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control _form_data" name="name" id="name" value="<?php echo $row["name"] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="mobile" class="form-label">Mobile</label>
                                    <input type="text" class="form-control _form_data" name="mobile" id="mobile" value="<?php echo $row["mobile"] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control _form_data" name="birthday" id="birthday" value="<?php echo $row["birthday"] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="last_blood_donate" class="form-label">Last blood donate</label>
                                    <input type="date" class="form-control _form_data" name="last_blood_donate" id="last_blood_donate" value="<?php echo $row["last_blood_donate"] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <textarea class="form-control _form_data" id="address" name="address" placeholder=" " rows="2"><?php echo $row["address"] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                            Are you sure?
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" id="update_profile" class="btn w-100 btn-dark">Update profile</button>
                            </form>
                        </div>
                        <div class="tab-pane p-3 fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <h6> Account Setting</h6>
                            <hr>
                            <h6 for="" class="text-danger">Deactivate Account</h6>
                            <p class="text-muted">Anytime you can reactivate your account</p>
                            <button class="btn btn-danger" onclick="return confirm(`Are you sure?`) && getFunc(`/E-learning/settings/config/_update_profile.php?deactivete=<?php echo $_SESSION['userId'] ?>`)">Deactivate Account</button>
                            <hr>
                            <h6 for="" class="text-danger">Delete Account</h6>
                            <p class="text-muted">Once you delete your account. There is no going back.Please! be certain.</p>
                            <button class="btn btn-danger " onclick="return confirm(`Are you sure?`) && getFunc(`/E-learning/settings/config/_update_profile.php?delete=<?php echo $_SESSION['userId'] ?>`)">Delete Account</button>


                        </div>
                        <div class="tab-pane p-3 fade" id="security" role="tabpanel" aria-labelledby="security-tab">

                            <h6> Security Setting</h6>
                            <hr>
                            <form onsubmit="submitForm(event,'<?php echo $action_url_pass ?>')">
                                <label for="exampleFormControlInput1" class="form-label">Change password</label>
                                <div class="form-floating">
                                    <input type="password" minlength="8" class="form-control my-1 _form_data" id="cpassword" name="cpassword" placeholder=" " required>
                                    <label for="cpassword">Current Password</label>

                                </div>
                                <div class="form-floating my-2">
                                    <input type="password" minlength="8" class="form-control my-1 _form_data" id="password1" name="password1" placeholder=" " required>
                                    <label for="password1">Password</label>

                                </div>
                                <div class="form-floating">
                                    <input type="password" minlength="8" class="form-control my-1 _form_data" id="password2" name="password2" placeholder=" " required>
                                    <label for="password2">Confirm Password</label>

                                </div>
                                <button type="submit" id="submit" class="btn btn-primary my-3">Update Password</button>
                            </form>

                        </div>
                        <div class="tab-pane p-3 fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                            <h6>Notification Setting</h6>
                            <hr>
                            <form>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label d-block">Security Alerts</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                                    <small class="form-text text-muted">Receive security alert notifications
                                        via email
                                    </small>

                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            email each a vulnerability is found
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            email a digest summary of vulnerability
                                        </label>
                                    </div>
                                </div>
                                <!--SMS notification part-->
                                <div classs="mb-3">
                                    <label classs="d-block mb-2">SMS Notifications</label>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Comments
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>

                                        </li>

                                        <li class="list-group-item">
                                            Update froom people
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>

                                        </li>

                                        <li class="list-group-item">
                                            Reminders
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>

                                        </li>

                                        <li class="list-group-item">
                                            Events
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>

                                        </li>
                                        <li class="list-group-item">
                                            Page you follow
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>