<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">
        <p>View All Users</p>

        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">City</th>
                        <th scope="col">No. of Orders</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('includes/server/config.php');
                    $query = "SELECT * FROM `user` WHERE `user_type` = '2'";
                    $get_users = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($get_users)) {
                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $user_email = $row['user_email'];
                        $user_contact = $row['user_contact'];
                        $user_city = $row['user_city'];
                        $user_type = $row['user_type'];

                        $count_query = "SELECT * FROM `uder_order` WHERE `order_user_id` = $user_id";
                        $count_result = mysqli_query($connection, $count_query);

                        $count = mysqli_num_rows($count_result);
                    ?>
                    <tr>
                        <th scope="row"><?php echo $user_id ?></th>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $user_email; ?></td>
                        <td><?php echo $user_contact; ?></td>
                        <td><?php echo $user_city; ?></td>
                        <!-- <td><?php
                                        if ($user_type == "1") {
                                            echo 'Admin';
                                        } elseif ($user_type == "2") {
                                            echo 'Customer';
                                        }
                                        ?></td> -->
                        <td><?php echo $count; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>