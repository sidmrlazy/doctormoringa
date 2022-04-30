<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="index.html" class="d-block auth-logo">
                                    <img src="assets/images/logo/logo.png" alt="" height="28" />
                                    <!-- <span class="logo-txt">Minia</span> -->
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Admin !</h5>
                                    <p class="text-muted mt-2">
                                        Sign in to continue to Admin.
                                    </p>
                                </div>
                                <form method="POST" class="mt-4 pt-2" action="">
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        // username and password sent from form 

                                        $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
                                        $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

                                        $sql = "SELECT * FROM user WHERE user_name = '$user_name' and user_password = '$user_password'";
                                        $result = mysqli_query($connection, $sql);
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        //$active = $row['active'];

                                        $count = mysqli_num_rows($result);

                                        // If result matched $user_name and $mypassword, table row must be 1 row

                                        if ($count == 1) {
                                            session_start();
                                            $_SESSION['user_name'] = $user_name;
                                            header("location: dashboard.php");
                                        } else {
                                            echo "<div class='alert alert-danger text-center' role='aler'>
                                            Username or Password is Incorrect!
                                          </div>";
                                        }
                                    }
                                    ?>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="user_name" class="form-control" id="username"
                                            placeholder="Enter username" />
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label">Password</label>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="user_password" class="form-control"
                                                placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon" />
                                            <button class="btn btn-light shadow-none ms-0" type="button"
                                                id="password-addon">
                                                <i class="mdi mdi-eye-outline"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button name="submit" class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">
                                            Log In
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">
                                    ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    Doctor Moringa . Crafted with
                                    <i class="mdi mdi-heart text-danger"></i> by ONLYN
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->