<div class="container">
    <div class="container col-md-10 card user-section">
        <h1>View All Users</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">City</th>
                    <th scope="col">User Type</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');

                $query = "SELECT * FROM `user`";
                $get_users = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($get_users)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $user_contact = $row['user_contact'];
                    $user_city = $row['user_city'];
                    $user_type = $row['user_type'];

                ?>
                <tr>
                    <th scope="row"><?php echo $user_id ?></th>
                    <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_contact; ?></td>
                    <td><?php echo $user_city; ?></td>
                    <td><?php
                            if ($user_type == "1") {
                                echo 'Admin';
                            } elseif ($user_type == "2") {
                                echo 'Customer';
                            }
                            ?></td>
                </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>
</div>