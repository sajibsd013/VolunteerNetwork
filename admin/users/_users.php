<div class="container">
    <table class="table bg-white border border-top-0" style="font-size: 13px;">
        <h4 class="fw-normal heading_color">Users</h4>

        <thead class="bg-white">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Last Donate</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>

            </tr>
        </thead>

        <tbody class="text-secondary bg-light">

            <?php

            $sql = "SELECT * FROM `users`";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $UserID   = $row['UserID'];
                $name   = $row['name'];
                $mobile   = $row['mobile'];
                $email   = $row['email'];
                $gender   = $row['gender'];
                $address   = $row['address'];
                $blood_group   = $row['blood_group'];
                $last_blood_donate   = $row['last_blood_donate'];

                $user_dlt = $root_url.'/admin/users/_config.php?UserID=' . $UserID;


                echo '
        <tr>
            <td>
                <a class="text-decoration-none text-bold pointer"  >' . $name . '</a>
            </td>

            <td class="">
            ' . $mobile . '
            </td>
            
            <td class="">
            ' . $email . '
            </td>
            
            <td class="">
            ' . $gender . '
            </td>
            
            <td class="">
            ' . $blood_group . '
            </td>
            <td class="">
            ' . $last_blood_donate . '
            </td>
            <td class="" style="max-width:100px">
            ' . $address . '
            </td>
            <td class="d-flex ">
            <a class="shadow-lg  p-1 px-2 bg-white rounded"  onclick="return confirm(`Are you sure?`) && getFunc(`' . $user_dlt . '`)"  style="cursor: pointer;" "><i class="fa fa-trash text-danger" aria-hidden="true"></i></a>
            </td>

        </tr>

';
            }

            ?>


        </tbody>
    </table>
</div>