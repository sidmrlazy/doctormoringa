<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-10 card user-section">
        <h1>View All Category</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Category added on</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');

                $query = "SELECT * FROM `category`";
                $get_category = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($get_category)) {
                    $category_id = $row['category_id'];
                    $category_name = $row['category_name'];
                    $category_description = $row['category_description'];
                    $category_added_on = $row['category_added_on'];
                ?>
                <tr>
                    <th scope="row"><?php echo $category_id ?></th>
                    <td><?php echo $category_name ?></td>
                    <td><?php echo $category_description ?></td>
                    <td><?php echo $category_added_on ?></td>
                </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>