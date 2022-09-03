<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container">
        <p>View All Category</p>
        <div class="table-responsive card p-4 mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-heading" scope="col">Category ID</th>
                        <th class="table-heading" scope="col">Category Icon</th>
                        <th class="table-heading" scope="col">Category Name</th>
                        <th class="table-heading" scope="col">Category Description</th>
                        <th class="table-heading" scope="col">Category added on</th>
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
    </div>
</div>
<?php include('includes/footer.php') ?>