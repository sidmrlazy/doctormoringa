<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<?php //include('includes/side-nav.php') 
?>
<?php
include 'includes/server/config.php'; ?>

<div class="container section-wrapper">
    <?php
    include 'includes/server/config.php';

    if (isset($_POST['confirm'])) {
        $customer_order_id = $_POST['customer_order_id'];
        $update_order = "UPDATE `customer_order` SET `customer_order_tracking_status`='1' WHERE `customer_order_id` = $customer_order_id";
        $update_order_result = mysqli_query($connection, $update_order);

        if ($update_order_result) {
            echo "<div class='container alert w-100 alert-success' role='alert'>ORDER CONFIRMED</div>";
        } else {
            echo die("<div class='container  alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
        }
    }

    if (isset($_POST['packed'])) {
        $customer_order_id = $_POST['customer_order_id'];
        $update_order = "UPDATE `customer_order` SET `customer_order_tracking_status`='2' WHERE `customer_order_id` = $customer_order_id";
        $update_order_result = mysqli_query($connection, $update_order);

        if ($update_order_result) {
            echo "<div class='container alert w-100 alert-success' role='alert'>ORDER CONFIRMED</div>";
        } else {
            echo die("<div class='container  alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
        }
    }

    if (isset($_POST['shipped'])) {
        $customer_order_id = $_POST['customer_order_id'];
        $update_order = "UPDATE `customer_order` SET `customer_order_tracking_status`='3' WHERE `customer_order_id` = $customer_order_id";
        $update_order_result = mysqli_query($connection, $update_order);

        if ($update_order_result) {
            echo "<div class='container alert w-100 alert-success' role='alert'>ORDER CONFIRMED</div>";
        } else {
            echo die("<div class='container  alert w-100 alert-success' role='alert'>ORDER STATUS COULD NOT BE CHANGED</div>" . mysqli_error($connection));
        }
    }

    if (isset($_POST['submit'])) {
        // User details
        $customer_order_user_name = $_POST['customer_order_user_name'];
        $customer_order_user_contact = $_POST['customer_order_user_contact'];
        $customer_order_user_state = $_POST['customer_order_user_state'];
        $customer_order_user_city = $_POST['customer_order_user_city'];
        $customer_order_user_address = $_POST['customer_order_user_address'];
        $customer_order_user_pincode = $_POST['customer_order_user_pincode'];

        // Product Details
        $customer_order_id = $_POST['customer_order_id'];
        $customer_order_generated_id = $_POST['customer_order_generated_id'];
        $customer_order_date = $_POST['customer_order_date'];
        $customer_order_user_subtotal = $_POST['customer_order_user_subtotal'];
        $customer_order_user_delivery = $_POST['customer_order_user_delivery'];
        $customer_order_user_grandtotal = $_POST['customer_order_user_grandtotal'];
        $customer_order_user_grandtotal = $_POST['customer_order_user_grandtotal'];
    }
    ?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>

                    <th scope="col">CUSTOMER</th>
                    <th scope="col">CONTACT</th>
                    <th scope="col">DELIVERY ADDRESS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <td><?php echo $customer_order_generated_id ?></td> -->
                    <td><?php echo $customer_order_user_name ?></td>
                    <td><?php echo $customer_order_user_contact ?></td>
                    <td><?php echo $customer_order_user_address . ", " . $customer_order_user_city . ". " . $customer_order_user_state . " - " . $customer_order_user_pincode  ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">WEIGHT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_product_details = "SELECT * FROM `customer_cart` WHERE cart_user_order_id = '$customer_order_generated_id' AND cart_order_id = $customer_order_id";
                $get_product_result = mysqli_query($connection, $get_product_details);

                while ($row = mysqli_fetch_assoc($get_product_result)) {
                    $cart_user_item_id = $row['cart_user_item_id'];
                    $cart_user_item_qty = $row['cart_user_item_qty'];

                    $query = "SELECT * FROM `items` WHERE item_id = $cart_user_item_id";
                    $res = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($res)) {
                        $item_name = $row['item_name'];
                        $item_price = $row['item_price'];
                        $item_weight = $row['item_weight']; ?>

                <tr>
                    <td><?php echo $item_name ?></td>
                    <td><?php echo $item_weight ?></td>
                    <td>₹<?php echo $item_price ?></td>
                    <td><?php echo $cart_user_item_qty ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-3 col-md-6">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col">DELIVERY CHARGE</th>
                    <th scope="col">GRAND TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_product_details = "SELECT * FROM `customer_order` WHERE customer_order_id = '$customer_order_id'";
                $get_product_result = mysqli_query($connection, $get_product_details);

                while ($row = mysqli_fetch_assoc($get_product_result)) {
                    $customer_order_user_subtotal = $row['customer_order_user_subtotal'];
                    $customer_order_user_delivery = $row['customer_order_user_delivery'];
                    $customer_order_user_grandtotal = $row['customer_order_user_grandtotal'];
                ?>
                <tr>
                    <td>₹<?php echo $customer_order_user_subtotal ?></td>
                    <td>₹<?php echo $customer_order_user_delivery ?></td>
                    <td>₹<?php echo $customer_order_user_grandtotal ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <form action="" method="POST" class="mt-3">
        <input type="text" name="customer_order_id" value="<?php echo $customer_order_id ?>" hidden>

        <?php
        $query = "SELECT * FROM `customer_order` WHERE customer_order_id = $customer_order_id";
        $res = mysqli_query($connection, $query);

        $customer_order_tracking_status = "";
        while ($row = mysqli_fetch_assoc($res)) {
            $customer_order_tracking_status = $row['customer_order_tracking_status'];
        }

        if ($customer_order_tracking_status == 0) {
        ?>
        <button type="submit" name="confirm" class="btn btn-sm btn-outline-success">Confirm Order</button>
        <?php } else if ($customer_order_tracking_status == 1) { ?>
        <button type="submit" name="packed" class="btn btn-sm btn-outline-primary">Order Packed</button>
        <?php } else if ($customer_order_tracking_status == 2) { ?>
        <button type="submit" name="shipped" class="btn btn-sm btn-outline-success">Shipped</button>
        <?php } else { ?>
        <button type="submit" name="shipped" class="btn btn-sm btn-outline-success d-none">Shipped</button>
        <?php } ?>
    </form>
</div>


<?php include('includes/footer.php') ?>