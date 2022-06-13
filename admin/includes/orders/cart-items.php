<?php
include 'includes/server/config.php';

// GET CART DETAILS QUERY
if (isset($_POST['submit'])) {
    // USER DETAILS
    $order_id = $_POST['order_id'];
    $order_user_name = $_POST['order_user_name'];
    $order_user_contact = $_POST['order_user_contact'];
    $new_order_time = $_POST['order_time'];
    $order_gross_amount = $_POST['order_gross_amount'];
    $order_total_amount = $_POST['order_total_amount'];
    $order_tax = $_POST['order_tax'];
    $generated_order = str_replace(array(
        '\'', '"', ',', ';', '<', '-', " "
    ), '', $new_order_time);
?>
<div class="cart-item-details">

    <div class="cart-user-details">
        <div class="cart-element">
            <p class="">Order ID: </p>
            <p class="cart-user-contact"><?php echo "DRM" . $generated_order . $order_id; ?></p>
        </div>
        <div class="cart-element">
            <p class="cart-user-name"><?php echo $order_user_name; ?></p>
            <p class="cart-user-contact"><?php echo $order_user_contact; ?></p>
        </div>
        <div class="cart-element">
            <p class="cart-total-price">₹<?php echo $order_gross_amount; ?></p>
            <p class="cart-order-time"><?php echo $new_order_time; ?></p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="inner-table">
                <tr>
                    <th class="table-header" scope="col">Item ID</th>
                    <th class="table-header" scope="col">Image</th>
                    <th class="table-header" scope="col">Category</th>
                    <th class="table-header" scope="col">Product Name</th>
                    <th class="table-header" scope="col">Weight</th>
                    <th class="table-header" scope="col">Qty</th>
                    <th class="table-header" scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'includes/server/config.php';

                    // CART ITEMS ORDERED BY USER
                    $show_all_items_query = "SELECT * FROM `uder_order_details` WHERE `uod_order_id` = $order_id";
                    $new_result = mysqli_query($connection, $show_all_items_query);
                    while ($row = mysqli_fetch_assoc($new_result)) {
                        $uder_order_details = $row['uder_order_details'];
                        $uod_item_id = $row['uod_item_id'];
                        $uod_price = $row['uod_price'];
                        $uod_quantity = $row['uod_quantity'];

                        $get_item_details = "SELECT * FROM `items` WHERE item_id = $uod_item_id";
                        $get_item_details_result = mysqli_query($connection, $get_item_details);
                        while ($row = mysqli_fetch_assoc($get_item_details_result)) {
                            $item_id = $row['item_id'];
                            $item_name = $row['item_name'];
                            $item_weight = $row['item_weight'];
                            $item_price = $row['item_price'];
                            $item_image = "assets/images/products/" . $row['item_image'];
                            $item_category = $row['item_category'];
                    ?>
                <tr>
                    <td scope="row"><?php echo $item_id; ?></td>
                    <td class="product-img"><img src="<?php echo $item_image; ?>" alt=""></td>
                    <td><?php echo $item_category; ?></td>
                    <td><?php echo $item_name; ?></td>
                    <td><?php echo $item_weight; ?></td>
                    <td><?php echo $uod_quantity; ?></td>
                    <td><?php echo $item_price; ?></td>
                </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="bottom-card">
        <div class="bottom-card-row">
            <p>Delivery Charges </p>
            <h5><?php echo "₹" .  $order_tax; ?></h5>
        </div>

        <div class="bottom-card-row">
            <p>Item Total</p>
            <h5><?php echo "₹" .  $order_total_amount; ?></h5>
        </div>

        <div class="bottom-card-row mt-3">
            <p>Grand Total</p>
            <h5 class="grand-total"><?php echo "₹" .  $order_gross_amount; ?></h5>
        </div>
    </div>
</div>