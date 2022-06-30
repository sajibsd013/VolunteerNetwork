<?php

$sql = "SELECT * FROM `users`";
$result = mysqli_query($con, $sql);
$total_users = mysqli_num_rows($result);

$sql = "SELECT * FROM `campaigns`";
$result1 = mysqli_query($con, $sql);
$total_campaigns = mysqli_num_rows($result1);

$name = $_SESSION["name"];


?>


<div class=" bg-light p-3 py-4 border-success" style="border-left: 4px solid">
    <h1 class="fw-normal">Welcome, <?php echo $name; ?>!</h1>
    <p class="text-muted">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum, nemo.</p>
</div>


<div class="row g-4 my-3 justify-content-center">
    <div class="col-lg-4 col-md-6">
        <div class="card mx-auto" style="width:300px">
            <div class="card-body " style="background-color: #5cb85c;">
                <div class="row text-white">
                    <div class="col-3">
                        <i class="fa fa-book fa-5x" aria-hidden="true"></i>

                    </div>
                    <div class="col-9 text-end">
                        <h1 class=""><?php echo $total_campaigns; ?></h1>
                        <div>Total Campaigns!</div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card mx-auto" style="width:300px">
            <div class="card-body " style="background-color: #8e14b3c3;">
                <div class="row text-white">
                    <div class="col-3">
                        <i class="fa fa-user fa-5x" aria-hidden="true"></i>

                    </div>
                    <div class="col-9 text-end">
                        <h1 class=""><?php echo $total_users; ?> </h1>
                        <div>Total active Users!</div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card mx-auto" style="width:300px">
            <div class="card-body " style="background-color: #337ab7;">
                <div class="row text-white">
                    <div class="col-3">
                        <i class="fa fa-tasks fa-5x "></i>
                    </div>
                    <div class="col-9 text-end">
                        <h1 class=""><?php echo 100; ?></h1>
                        <div>Total Blog Article!</div>
                    </div>
                </div>

            </div>
            <div class="card-footer bg-light">
                <a style="cursor:pointer" onclick="redirectTo('/E-learning/admin/blog/')">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </a>
            </div>
        </div>
    </div>


</div>