<?php
$message = '';

if (isset($_POST['newTitle'])) {
  $title =  $_POST['newTitle'];
  $description =  $_POST['description'];
  $goals =  $_POST['goals'];
  $image =  $_FILES['image']['name'];
  $tmp_name =  $_FILES['image']['tmp_name'];
  $size =  $_FILES['image']['size'];
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
    if ($size <= 104857600) {
      $sql = "INSERT INTO `campaigns` (`title`,`description`,`img`, `goals`) VALUES ('$title','$description','$image', '$goals')";

      $result = mysqli_query($con, $sql);
      if ($result) {
        $path = "../../assets/img/campaigns/";
        if (!is_dir($path)) {
          mkdir($path);
        }
        move_uploaded_file($tmp_name, $path . "/" . $image);
        $message = "Added!";
      }
    } else {
      $message = "Image should be or Less or Equal 10 MB!";
    }
  } else {
    $message = "Your file is invalid! Please upload PBG or JPG file";
  }
}

?>


<div class="container">
  <table class="table bg-white border border-top-0" style="font-size: 13px;">
    <h4 class="fw-normal heading_color">Campaigns</h4>

    <thead class="bg-white">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Goals</th>
        <th scope="col">Raised</th>
        <th scope="col">Images</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody class="text-secondary bg-light">

      <?php
      $sql = "SELECT * FROM `campaigns` ORDER BY  `CampaignID` DESC";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $CampaignID  = $row['CampaignID'];
        $title = $row['title'];
        $goals = $row['goals'];
        $raised = $row['raised'];
        $img = $row['img'];
        $description = $row['description'];
        $dlt_url = $root_url . '/admin/campaigns/_config.php?CampaignID=' . $CampaignID;
        $update_url = $root_url . '/admin/campaigns/update.php?p=' . $CampaignID;
        $upload_image = $root_url . '/admin/campaigns/upload.php?p=' . $CampaignID;

        echo '
            <tr>
                <td>
                ' . $title . '
                </td>
                <td>
                ' . $description . '
                </td>
                <td>
                $' . $goals . '
                </td>
                <td>
                $' . $raised . '
                </td>
                <td>
                <img class="pointer " style="max-width:50px"  src="../../assets/img/campaigns/' . $img . '" />

                </td>

                <td class="d-flex ">
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded"  onclick="redirectTo(`' . $update_url . '`)" ><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                  <a class="shadow-lg mx-2 p-1 px-2 bg-white pointer rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $dlt_url . '`)"  ><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
                </td>
            </tr>

                ';
      }

      $action_url = $root_url . "/admin/campaigns/_config.php";


      ?>


    </tbody>
  </table>


  <div class="row justify-content-center g-3 my-2 ">
    <div class="col-lg-6 col-md-9  bg-white shadow-lg rounded p-4">
      <h5 class="heading_color mb-4">Add New campaigns</h5>
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="newTitle">Title</label>
          <input type="text" class="form-control _form_data" id="newTitle" name="newTitle" placeholder=" " required>
        </div>
        <div class="form-group my-2">
          <label for="address">Description</label>
          <textarea class="form-control _form_data" id="description" name="description" placeholder=" " rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="newTitle">Goals</label>
          <input type="text" class="form-control _form_data" id="goals" name="goals" placeholder=" " required>
        </div>
        <div class="form-group my-2">
          <label for="image">Select image</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" id="submit" class="btn btn-dark btn-sm my-3 w-100 fw-bold">Add campaigns</button>
      </form>

    </div>
  </div>
</div>