<div class="container">
    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <h4 class="fw-normal heading_color">Blog Post</h4>

        <thead class="bg-white">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Published</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody class="text-secondary bg-light">

            <?php

            $sql = "SELECT * FROM `blog`";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $BlogID   = $row['BlogID'];
                $title   = $row['blog_title'];
                $timestand = $row['timestand'];
                $UserID = $row['UserID'];

                $blog_dlt = $root_url . '/admin/blog/_config.php?BlogID=' . $BlogID;
                $blog_url = $root_url . '/blog/article/?p=' . $BlogID;
                $user_url = $root_url . '/profile/?p=' . $UserID;

                $sql_user = "SELECT * FROM `users` WHERE `UserID`=" . $UserID;
                $result_user = mysqli_query($con, $sql_user);
                $row_user = mysqli_fetch_assoc($result_user);
                $name = $row_user['name'];




                echo '
        <tr>
            <td>
                <a class="text-decoration-none text-bold pointer"  
                onclick="redirectTo(`' . $blog_url . '`)" >' . $title . '</a>
            </td>
            <td>
                <a class="text-decoration-none text-bold pointer"  onclick="redirectTo(`' . $user_url . '`)"  >' . $name . '</a>
            </td>
            <td>
                <span class="text-bold "  >' . $timestand . '</a>
            </td>
           
            <td class="d-flex ">
            <a class="shadow-lg  p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $blog_dlt . '`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
            </td>

        </tr>

';
            }

            ?>


        </tbody>
    </table>
</div>