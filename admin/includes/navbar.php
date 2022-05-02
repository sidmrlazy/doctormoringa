<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/logo/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="dashboard.php">
                        <ion-icon name="home-outline" class="outer-nav-icon"></ion-icon>Home
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon name="cart-outline" class="outer-nav-icon"></ion-icon>Orders
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">
                                <ion-icon name="bag-add-outline" class="inner-nav-icon"></ion-icon>New Orders
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <ion-icon name="bag-check-outline" class="inner-nav-icon"></ion-icon>Completed Orders
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon name="people-outline" class="outer-nav-icon"></ion-icon>Users
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="view-users.php">
                                <ion-icon name="people-circle-outline" class="inner-nav-icon"></ion-icon>View Users
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="add-users.php">
                                <ion-icon name="person-add-outline" class="inner-nav-icon"></ion-icon>Add Users
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <ion-icon name="apps-outline" class="outer-nav-icon"></ion-icon>
                        Inventory
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="add-category.php">
                                <ion-icon class="inner-nav-icon" name="duplicate-outline"></ion-icon>Add Category
                            </a></li>
                        <li><a class="dropdown-item" href="view-category.php">
                                <ion-icon class="inner-nav-icon" name="options-outline"></ion-icon>View Category
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="add-items.php">
                                <ion-icon class="inner-nav-icon" name="fast-food-outline"></ion-icon>Add Items
                            </a></li>
                        <li><a class="dropdown-item" href="view-inventory.php">
                                <ion-icon class="inner-nav-icon" name="receipt-outline"></ion-icon>View Inventory
                            </a></li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Inventory</a>
                </li> -->
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav ml-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <ion-icon name="log-out-outline" class="outer-nav-icon"></ion-icon> Logout
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="key-outline" class="outer-nav-icon"></ion-icon>
                            <?php echo $_SESSION["user_name"]; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="view-users.php">
                                    <ion-icon name="people-circle-outline" class="inner-nav-icon"></ion-icon>View Users
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="add-users.php">
                                    <ion-icon name="person-add-outline" class="inner-nav-icon"></ion-icon>Add Users
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
                <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button> -->
            </form>
        </div>
    </div>
</nav>