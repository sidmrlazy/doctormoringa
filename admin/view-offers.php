<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container ">
        <h5>Select offer</h5>
        <p>Add products to your offers</p>
        <div class="card p-3 col-md-6">
            <?php
            include('includes/server/config.php');
            if (isset($_POST['add'])) {
                $offer_main_id = $_POST['offer_main_id'];
                $offer_item_id = $_POST['offer_item_id'];

                $fetch_item_details = "SELECT * FROM `items` WHERE `item_id` = '$offer_item_id'";
                $fetch_item_result = mysqli_query($connection, $fetch_item_details);

                $item_name = "";
                $item_weight = "";
                $item_price = "";
                $item_status = "";
                while ($row = mysqli_fetch_assoc($fetch_item_result)) {
                    $item_name = $row['item_name'];
                    $item_weight = $row['item_weight'];
                    $item_price = $row['item_price'];
                    $item_status = $row['item_status'];
                }

                $fetch_category = "SELECT * FROM `offer_main` WHERE `offer_main_id` = '$offer_main_id'";
                $fetch_category_r = mysqli_query($connection, $fetch_category);
                $offer_main_name = "";
                while ($row = mysqli_fetch_assoc($fetch_category_r)) {
                    $offer_main_name = $row['offer_main_name'];
                }

                $fetch_status = "SELECT * FROM `offer_products` WHERE `offer_main_id` = $offer_main_id AND `offer_item_id` = $offer_item_id";
                $fetch_status_r = mysqli_query($connection, $fetch_status);
                $count = mysqli_num_rows($fetch_status_r);
                if ($count == 0) {
                    $insert_query = "INSERT INTO `offer_products`(
                        `offer_main_id`,
                        `offer_item_id`
                    )
                    VALUES(
                        '$offer_main_id',
                        '$offer_item_id'
                    )";
                    $insert_r = mysqli_query($connection, $insert_query);
                    if (!$insert_r) {
                        die('<div class="alert alert-danger mb-3" role="alert">
                        Error 404!
                      </div>' . mysqli_error($connection));
                    } else {
                        $insert_item = "INSERT INTO `items`(
                            `item_name`,
                            `item_weight`,
                            `item_price`,
                            `item_category`,
                            `item_status`
                        )
                        VALUES(
                            '$item_name',
                            '$item_weight',
                            '$item_price',
                            '$offer_main_name',
                            '$item_status'
                        )";
                        $insert_item_r = mysqli_query($connection, $insert_item);
                        echo '<div class="alert alert-success mb-3" role="alert">
                        Product Added
                      </div>';
                    }
                } else if ($count > 0) {
                    echo '<div class="alert alert-danger mb-3" role="alert">
                    This product is already added in this offer!
                  </div>';
                }
            }
            ?>
            <form action="" method="POST" class="card p-3">
                <div class="form-floating mb-3">
                    <select class="form-select" name="offer_main_id" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected>Select Offer</option>
                        <?php
                        include('includes/server/config.php');
                        $query = "SELECT * FROM offer_main";
                        $result = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $offer_main_id = $row['offer_main_id'];
                            $offer_main_name = $row['offer_main_name'];
                            $offer_main_amount = $row['offer_main_amount'];
                            $offer_main_status = $row['offer_main_status'];
                        ?>
                        <option value="<?php echo $offer_main_id ?>">
                            <?php echo $offer_main_name . " (₹" . $offer_main_amount . ")"  ?></option>
                        <?php } ?>
                    </select>
                    <label for="floatingSelect">Click here for options</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" name="offer_item_id" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected>Select Product</option>
                        <?php
                        include('includes/server/config.php');
                        $item_query = "SELECT * FROM `items` WHERE `item_status` = 1";
                        $item_result = mysqli_query($connection, $item_query);
                        while ($row = mysqli_fetch_assoc($item_result)) {
                            $item_id = $row['item_id'];
                            $item_name = $row['item_name'];
                            $item_weight = $row['item_weight'];
                            $item_price = $row['item_price'];
                            $item_category = $row['item_category'];
                        ?>
                        <option value="<?php echo $item_id ?>">
                            <?php echo $item_name . " (₹" . $item_price . " | " . $item_weight . " | " . $item_category . ")"  ?>
                        </option>
                        <?php } ?>
                    </select>
                    <label for="floatingSelect">Click here for options</label>
                </div>

                <button type="submit" name="add" class="btn btn-outline-success">Add Product</button>
            </form>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>