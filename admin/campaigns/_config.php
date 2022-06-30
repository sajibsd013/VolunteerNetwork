<?php
session_start();
include '../../db/_db.php';


if (isset($_POST['updateTitle'])) {

    $title =  $_POST['updateTitle'];
    $description =  $_POST['description'];
    $CampaignID =  $_POST['CampaignID'];


    $sql = "UPDATE `campaigns` SET `title` = '$title', `description`='$description' WHERE `CampaignID` =$CampaignID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "Updated!";
    }
}


if (isset($_GET['CampaignID'])) {
    $CampaignID  = $_GET['CampaignID'];
    $sql = "DELETE FROM `campaigns` WHERE `CampaignID` = $CampaignID";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo 1;
    }
}

if (isset($_GET['ImageID'])) {
    $ImageID  = $_GET['ImageID'];
    $sql = "DELETE FROM `r_images` WHERE `ImageID` = $ImageID";
    $result = mysqli_query($con, $sql);
    $file = $_GET['file'];
    unlink($file);

    if ($result) {
        echo 1;
    }
}
