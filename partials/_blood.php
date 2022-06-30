    <div class="container">
        <div class="row align-items-center flex-md-row-reverse">
            <div class="col-md-6 ">
                <img class="img-fluid " src="assets/img/blood_1.png" alt="">
            </div>
            <div class="col-md-6">
                <div class=" ms-md-5 ps-3">
                    <h1 class='fw-normal'>Become a <span class="text-success">Blood Donor</span> </h1>
                    <h6 class="text-muted mb-4">If you are completely new to blood donation Register now..</h6>
                <?php
                    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {}else{
                ?>
                    <a  class="btn btn-primary me-2 py-2 btn-sm mb-2 pointer" onclick="redirectTo('<?php echo $root_url ?>/auth/registration')">
                        Donate Now <i class="fa fa-heart  ms-1 "></i>
                    </a>
                <?php
                    }

                ?>

                    <a class="btn btn-outline-primary me-2 py-2 btn-sm mb-2 pointer" onclick="redirectTo('<?php echo $root_url ?>/blood/')">
                        Search Donor <i class="fa fa-search   ms-1 "></i>
                    </a>
                </div>
            </div>
        </div>
    </div>