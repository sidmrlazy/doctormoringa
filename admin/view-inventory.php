<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-10 card user-section">
        <h1>View complete inventory</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product Image</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Item Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');
                $query = "SELECT * FROM `items` WHERE item_status = 1";
                $get_details = mysqli_query($connection, $query);

                if (@$get_details->num_rows > 0) {
                    $previous_category = "";
                    while ($row = $get_details->fetch_assoc()) {
                        $item_filename = $row['item_filename'];
                        $item_category = $row['item_category'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_price = $row['item_price'];


                        if ($previous_category !== $item_category) {
                            $previous_category = $item_category;
                        }


                ?>
                <tr>
                    <td><img class="inventory-table-img" src="assets/images/uploaded/<?php echo $item_filename ?>"></td>
                    <th scope="row"><?php echo $item_category ?></th>
                    <td><?php echo $item_name ?></td>
                    <td><?php echo $item_description ?></td>
                    <td><?php echo $item_price ?></td>
                </tr>
                <?php

                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>