<div class="container w-100 d-flex justify-content-center align-content-center">
    <div class="container col-md-10 card user-section">
        <h1>View complete inventory</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Front Image</th>
                    <th scope="col">Back Image</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');

                $query = "SELECT * FROM `items` GROUP BY `item_category`";
                $get_details = mysqli_query($connection, $query);

                if (@$get_details->num_rows > 0) {
                    $previous_category = "";
                    while ($row = $get_details->fetch_assoc()) {
                        $item_id = $row['item_id'];
                        $item_filename = $row['item_filename'];
                        $item_filename_back = $row['item_filename_back'];
                        $item_category = $row['item_category'];
                        $item_name = $row['item_name'];
                        $item_description = $row['item_description'];
                        $item_price = $row['item_price'];
                        if ($previous_category !== $item_category) {
                            $previous_category = $item_category;
                        }
                ?>
                <tr>
                    <td name="item_id"><?php echo $item_id ?></td>
                    <td><img class="inventory-table-img" src="assets/images/uploaded/<?php echo $item_filename ?>"></td>
                    <td><img class="inventory-table-img" src="assets/images/uploaded/<?php echo $item_filename_back ?>">
                    </td>
                    <th scope="row"><?php echo $item_category ?></th>
                    <td><?php echo $item_name ?></td>
                    <td><?php echo $item_description ?></td>
                    <td><?php echo $item_price ?></td>

                    <td>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-outline-success">Edit</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" name="delete" value="delete"
                                class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </td>

                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>