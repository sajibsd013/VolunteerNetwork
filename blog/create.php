<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../partials/_css_files.php' ?>


    <title>E-learning</title>
</head>

<body>
    <?php
    include '../db/_db.php';
    include '../partials/_header.php';
    $action_url = '/E-Learning/blog/config/_create_post.php';

    ?>
    <div class="container ">
        <div class=" bg-white shadow-lg rounded p-4">
            <h2 class=" text-center">Start a Discussion</h2>
            <form onsubmit="submitForm(event,'<?php echo $action_url ?>')">
                <div class="form-group">
                    <label for="problem_title">Problem title</label>
                    <input type="text" class="form-control my-1 _form_data" id="title" name="problem_title" required>
                </div>
                <div class="form-group my-2">
                    <label for="short_desc ">Short Description </label>
                    <textarea class="form-control my-1 _form_data"  name="short_desc" rows="2"  required></textarea>
                </div>
                <div class="form-group my-2">
                    <label for="elaborate_problem ">Elaborate Your Concern </label>
                    <textarea class="form-control my-1 _form_data" id="editor" name="elaborate_problem" rows="8"  required></textarea>
                </div>
                <button type="submit" id="submit" class="btn btn-success my-2">Submit</button>
            </form>
        </div>
    </div>


    <?php include '../partials/_footer.php' ?>


    <!--  JS Files -->
    <?php include '../partials/_js_files.php' ?>



</body>

</html>