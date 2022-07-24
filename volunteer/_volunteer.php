<section class="container section_top ">
    <div class="text-center">
        <h6 class='_section_title'>Our TEAM</h6>
        <h2 class='font-weight-bold py-2'>Our Hardworking <span class='text-success'>Team</span> </h2>

    </div>
    <div class="row g-4 py-5 justify-content-center _modal_mx_width mx-auto">
        <?php
        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $name  = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $address = $row['address'];
            $User_ID = $row['UserID'];
        ?>
            <div class="col-md-4 col-sm-6 _cursor_pointer">
                <div class='card shadow rounded'>

                    <div class="card-body text-center">
                        <i class="fa fa-user-circle fa-4x text-primary mb-2"></i>

                        <h6 class="card-title my-1"><?php echo $name ?></h6>
                        <small class="card-text d-block text-muted"><?php echo $email ?></small>
                        <small class="card-text d-block text-muted"><?php echo $mobile ?></small>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-dark w-100" onclick="redirectTo('<?php echo $root_url ?>/profile/?p=<?php echo $User_ID ?>')">View Profile</button>
                    </div>
                </div>
            </div>
        <?php


        }

        ?>


    </div>

</section>