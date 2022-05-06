<div class="login-section">


    <div class="col-md-4 form-section">
        <img src="assets/images/logo/logo.png" alt="">
        <form class="admin-form" method="POST">
            <?php
            session_start();
            if (isset($_SESSION["user_name"])) {
                header("location:dashboard.php");
            }

            if (isset($_POST['submit'])) {
                $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
                $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);
                // $rememberme = $_POST['rememberme'];

                $fetch_data = "SELECT * FROM `user`";
                $result = $connection->query($fetch_data);


                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $fetched_password =  $row['user_password'];

                        if (password_verify($user_password, $fetched_password)) {
                            $query = "SELECT * FROM user WHERE user_name = '$user_name' AND user_password = '$fetched_password'";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                            $count = mysqli_num_rows($result);

                            if ($count == 1 && $row) {
                                session_start();
                                $_SESSION['user_name'] = $user_name;
                                if (isset($_SESSION['user_name'])) {
                                    header("location:dashboard.php");
                                }
                                return true;
                            } else {
                                echo "<div class='alert alert-danger text-center' role='aler'>Username or Password is Incorrect!</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger text-center' role='aler'>Error 404</div>";
                        }
                    }
                }
            }
            ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_name" id="floatingInput"
                    placeholder="Mobile Number or Username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="user_password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <!-- <div class="form-check mt-3">
                <input class="form-check-input" name="rememberme" type="checkbox" value="rememberme"
                    id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Remember me
                </label>
            </div> -->
            <!-- <a href="dashboard.php">Dashboard</a> -->
            <button type="submit" name="submit" class="btn btn-primary admin-login-btn">Submit</button>
        </form>
    </div>

    <div class="col-md-4 login-section-banner">
        <img src="assets/images/background/login-banner.jpg" alt="">
    </div>
</div>