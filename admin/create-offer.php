<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="d-flex mt-3">
    <?php include('includes/side-nav.php') ?>
    <div class="container section-container mt-5">
        <?php
        include('includes/server/config.php');

        if (isset($_POST['submit'])) {

            $offer_name = mysqli_real_escape_string($connection, $_POST['offer_name']);
            $offer_amount = mysqli_real_escape_string($connection, $_POST['offer_amount']);
            $offer_status = 1;
            $query = "INSERT INTO `offer_main`(
                 `offer_main_name`,
                 `offer_main_amount`,
                 `offer_main_status`
             )
             VALUES(
                 '$offer_name',
                 '$offer_amount',
                 '$offer_status'
             )";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("ERROR 404! " . mysqli_error($connection));
            } else {
                echo '<div class="alert alert-success w-100 mb-3 mt-5" role="alert">
                    Offer Created!
                  </div>';
            }
        }
        ?>
        <form action="" method="POST" class="card p-3 col-md-6 ">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="offer_name" id="offerName" placeholder="name@example.com">
                <label for="offerName">Offer Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="offer_amount" id="offerPrice" placeholder="Password">
                <label for="offerPrice">Offer Price</label>
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-outline-success">Create Offer</button>
            </div>
        </form>
    </div>
</div>
<?php include('includes/footer.php') ?>