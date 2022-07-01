<?php
include '../../db/_db.php';


if ($_POST["amount"]) {
    $amount = $_POST["amount"];
    $CampaignID = $_POST["CampaignID"];
    $sql = "SELECT * FROM `campaigns` WHERE `CampaignID` =" . $CampaignID;
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $raised    = $row['raised'];
    $total_amount = $amount + $raised;

    $sql_update = "UPDATE `campaigns` SET `raised` = '$total_amount' WHERE `CampaignID` = '$CampaignID'";
    $result_update = mysqli_query($con, $sql_update);
    if ($result_update) {
        echo "back";
    }
}
