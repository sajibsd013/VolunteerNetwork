<section class="container section_top ">
    <?php
    if (isset($_GET["id"])) {
        $action_url = $root_url . '/campaigns/config/_config.php';

    ?>
        <div class="row">

            <div class="col-sm-4 mx-auto">
                <h5>Donate Now</h5>
                <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                    <div class="form-floating  text-muted">
                        <input type="number" class="form-control _form_data" id="amount" name="amount" placeholder=" " required>
                        <label for="loginEmail">Enter Amount</label>
                    </div>
                    <input type="text" class="form-control _form_data d-none" name="CampaignID" id="CampaignID" value="<?php echo $_GET['id'] ?>">
                    <button type="submit" id="submit" class="btn btn-primary btn-sm my-3 w-100">Donate</button>
                </form>
            </div>
        </div>
    <?php
    }
    ?>


</section>