<div class="container register-section">
    <div class="col-md-6">
        <div class="register-header">
            <h1>Login </h1>
            <p>New User? <span><a href="register">Register Here </a></span></p>
        </div>
        <form action="" method="POST">
            <?php
            include('admin/includes/server/config.php');

            if (isset($_POST['submit'])) {
                $user_contact = mysqli_real_escape_string($connection, $_POST['user_contact']);
                $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

                $fetch_data = "SELECT * FROM `user`";
                $result = $connection->query($fetch_data);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $fetched_password =  $row['user_password'];
                        $user_type = $row['user_type'];
                        $user_name = $row['user_name'];
                        $user_id = $row['user_id'];

                        if (password_verify($user_password, $fetched_password)) {
                            $query = "SELECT * FROM user WHERE user_contact = '$user_contact' AND user_password = '$fetched_password' AND user_type = 2";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $count = mysqli_num_rows($result);

                            if ($count == 1 && $row) {
                                $_SESSION['user_name'] = $user_name;

                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    session_start();
                                    header('Location:index', true, 301);
                                    return true;
                                }
                                echo "<div class='alert alert-success text-center' role='alert'>Success, Please go to Home Screen to start shopping!</div>";
                            } else {
                                echo "<div class='alert alert-danger text-center' role='alert'>Username or Password is Incorrect!</div>";
                            }

                            // elseif ($user_type !== 2) {
                            //     echo "<div class='alert alert-danger text-center' role='aler'>Oops, looks like your'e not registered with us.</div>";
                            // }
                        }
                    }
                }
            }
            ?>
            <div class="form-floating mb-3">
                <input name="user_contact" type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input name="user_password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div>
                <button class="register-btn" type="submit" name="submit">LOGIN</button>
            </div>

            <div class="register-header">
                <p>Forgot Password?<span><a href="regiser">Click Here </a></span></p>
            </div>

        </form>
    </div>

    <div class="col-md-6 register-section-banner">
        <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_xlmz9xwm.json" background="transparent"
            speed="1" class="newletter-lottie" loop autoplay></lottie-player>
    </div>

</div>