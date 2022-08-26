<div class="top-navbar">
    <div class="col-md-6 top-navbar-brand">
        <a href="index"><img src="assets/images/logo/logo.png" alt=""></a>
    </div>

    <div class="col-md-4">
        <div class="top-nav-row">
            <div class="top-nav-inner-row">
                <a href="cart" class="cart-button">
                    <ion-icon name="cart-outline" class="top-nav-icon">
                    </ion-icon>
                    <p>Cart</p>
                    <?php
                    include('admin/includes/server/config.php');

                    $token = session_id();
                    if (!empty($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $token = $_SESSION['session_id'];
                    } else {
                        $user_id = 0;
                    }
                    $quantity = 1;

                    $query = "SELECT * FROM `customer_cart` WHERE cart_user_id = '$token' AND cart_status = 1";
                    $result = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($result);
                    if (!$result) {
                        die(mysqli_error($connection));
                    } else {
                        $cart_user_id = "";
                        $cart_status = "";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cart_user_id = $row['cart_user_id'];
                            $cart_status = $row['cart_status'];
                        }
                    }
                    ?>
                    <?php
                    if ($cart_status == 1) {
                    ?>
                    <span class="badge badge-color badge-dark"><?php echo $count ?></span>
                    <?php } else if ($cart_status == 2) { ?>
                    <span class="badge badge-color badge-dark d-none"><?php echo $count ?></span>
                    <?php } ?>

                </a>
            </div>
            <div class="top-nav-inner-row">
                <?php
                if (isset($_SESSION['user_name']) || isset($_SESSION['user_contact'])) {
                    $user_name = $_SESSION['user_name'];
                    $user_contact = $_SESSION['user_contact'];
                    if ($user_name == null) {
                        echo "<a href='profile'><ion-icon name='person-outline' class='top-nav-icon'></ion-icon><p>$user_contact</p></a>";
                    } else {
                        echo "<a href='profile'><ion-icon name='person-outline' class='top-nav-icon'></ion-icon><p>$user_name</p></a>";
                    }
                } else {
                    // echo "<a href='login'><ion-icon name='person-outline' class='top-nav-icon'></ion-icon><p>Login | Register</p></a>";
                }
                ?>
            </div>
            <div class="top-nav-inner-row">
                <?php
                if (isset($_SESSION['user_name']) || isset($_SESSION['user_contact'])) {
                    echo "<a href='logout.php'><ion-icon name='log-out-outline' class='top-nav-icon'></ion-icon><p>Logout</p></a>";
                } else {
                    echo "<a href='logout.php' class='d-none'><ion-icon name='log-out-outline' class='top-nav-icon'></ion-icon><p>Logout</p></a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index">
            <img src="assets/images/logo/logo.png" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="shop">Shop</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Browse All Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        include('server/config.php');
                        $query = "SELECT * FROM category";
                        $result = $connection->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $category_image = $row['category_image'];
                                $category_name =  $row['category_name'];

                        ?>
                        <li class="dropdown-row">
                            <img src="assets/images/category-icons/<?php echo $category_image
                                                                    ?>" />
                            <a class="dropdown-item" href="shop">Doctor Moringa for
                                <?php echo $category_name;
                                ?></a>
                        </li>
                        <?php
                            }
                        }
                        ?>

                       
                <?php
                include('server/config.php');
                $query = "SELECT * FROM category";
                $result = $connection->query($query);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category_image = $row['category_image'];
                        $category_name =  $row['category_name'];

                ?>
                <li class="mobile-nav"><a class="dropdown-item" href="#">Doctor Moringa for
                        <?php echo $category_name;
                        ?></a></li>
                <?php
                    }
                }
                ?>
            </ul>
            </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="about">Who we are</a></li>
                        <li><a class="dropdown-item" href="contact">Contact</a></li>

                    </ul>
                </li>

                <?php
                if (!empty($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id']; ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="testimonials">Leave a Review</a>
                </li>
                <?php
                } else {
                    $user_id = 0;
                }
                ?>
            </ul>
            <div class="top-nav-support-section">
                <ion-icon name="headset-outline" class="earphone"></ion-icon>
                <div>
                    <h3>+91 88403 46183</h3>
                    <p>Helpline Number</p>
                </div>
            </div>
        </div>
    </div>
</nav>