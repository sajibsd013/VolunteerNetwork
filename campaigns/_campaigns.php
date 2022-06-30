<section class="container section_top ">
    <h2 class=" mb-3">Introduction our <span class="text-info">Campaign</span></h2>
    <div class="row g-5">

        <?php

        $sql = "SELECT * FROM `campaigns`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $CampaignID     = $row['CampaignID'];
            $title    = $row['title'];
            $description    = $row['description'];
            $img    = $row['img'];
            $goals    = $row['goals'];
            $raised    = $row['raised'];
            $to_go = $goals - $raised;
            $percent  = ($raised / $goals) * 100;

        ?>
            <div class="col-md-4 ">
                <div class="card">
                    <img class='card-img-top ' height="350px" src="<?php echo $root_url ?>/assets/img/campaigns/<?php echo $img ?>" alt="">

                    <div class="card-body">
                        <h5 class="card-title text-success"><?php echo $title ?></h5>
                        <p class="card-text"><?php echo $description ?></p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo $percent ?>%;" aria-valuenow="<?php echo number_format($percent, 2); ?>" aria-valuemin="0" aria-valuemax="100"><?php echo number_format($percent, 2) ?>%</div>
                        </div><br>
                        <div class="row">
                            <div class="col-4">
                                <h6>Goals</h6>
                                <p>$<?php echo $goals ?></p>
                            </div>
                            <div class="col-4">
                                <h6>Raised</h6>
                                <p>$<?php echo $raised ?></p>
                            </div>
                            <div class="col-4">
                                <h6>To Go</h6>
                                <p>$<?php echo $to_go ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a class="btn btn-outline-dark btn-sm w-100" href="#">Donate Now</a>
                    </div>
                </div>
            </div>


        <?php


        }

        ?>



    </div>
</section>