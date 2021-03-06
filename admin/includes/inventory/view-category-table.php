<div class="container section-wrapper">
    <p class="section-heading">View All Category</p>
    <p class="section-details">View all categories added by you below</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Category ID</th>
                <th scope="col">Category Icon</th>
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
                $category_image = $row['category_image'];
                $category_name = $row['category_name'];
                $category_description = $row['category_description'];
                $category_added_on = $row['category_added_on'];
            ?>
            <tr>
                <th scope="row"><?php echo $category_id ?></th>
                <td><img class="inventory-table-img" src="assets/images/uploaded/<?php echo $category_image ?>">
                </td>
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