<button onclick="topFunction()" id="myBtn" title="Go to top" class="back-to-top">Back to Top</button>
<div class="container register-section">
    <div class="col-md-6">
        <div class="register-header">
            <h1>Create an Account</h1>
            <p>Already have an account? <span><a href="login">Login</a></span></p>
        </div>
        <form action="" method="POST">
            <?php
            include('admin/includes/server/config.php');
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://api.countrystatecity.in/v1/countries',
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_HTTPHEADER => array(
            //         'X-CSCAPI-KEY: API_KEY'
            //     ),
            // ));
            // $response = curl_exec($curl);
            // curl_close($curl);
            // echo $response;

            if (isset($_POST['submit'])) {
                $user_name = $_POST['user_name'];
                $user_password = $_POST['user_password'];
                $user_confirm_password = $_POST['user_confirm_password'];
                $user_contact = $_POST['user_contact'];
                $user_email = $_POST['user_email'];
                $user_state = $_POST['user_state'];
                $user_city = $_POST['user_city'];
                $user_address = $_POST['user_address'];
                $user_pincode = $_POST['user_pincode'];
                $user_type = "2";
                if (
                    $user_name == ""
                ) {
                    echo "<div class='alert alert-danger' role='alert'>Please enter your name!</div>";
                } else if ($user_password == "" || $user_confirm_password == "") {
                    echo "<div class='alert alert-danger' role='alert'>Looks like you missed out the password or confirm password fields!</div>";
                } else if ($user_contact == "") {
                    echo "<div class='alert alert-danger' role='alert'>We need your mobile number!</div>";
                } else {
                    if ($user_password != $user_confirm_password) {
                        echo "<div class='alert alert-danger' role='alert'>Oops! Passwords do not match.</div>";
                    } else {
                        $secure_password = password_hash($user_password, PASSWORD_BCRYPT);
                        $query = "INSERT INTO user (
                                user_name, 
                                user_password, 
                                user_contact, 
                                user_email,
                                user_state,
                                user_city,
                                user_address,
                                user_pincode,
                                user_type
                                ) VALUES(
                                    '$user_name', 
                                    '$secure_password',
                                    '$user_contact',
                                    '$user_email',
                                    '$user_state',
                                    '$user_city',
                                    '$user_address',
                                    '$user_pincode',
                                    '$user_type'                                    
                                    )";
                        $result = mysqli_query($connection, $query);

                        if (!$result) {
                            echo "<div class='alert alert-danger' role='alert'>Something went wrong!</div>";
                        } else {
                            echo "<div class='alert alert-success' role='alert'>Welcome!</div>";
                        }
                    }
                }
            }

            ?>
            <div class="form-floating mb-3">
                <input name="user_name" type="text" class="form-control" id="floatingInput" placeholder="Username">
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" name="user_contact" class="form-control" id="floatingContactAddress"
                    placeholder="+91 XXXXXXXXXX">
                <label for="floatingInput">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" name="user_email" class="form-control" id="floatingEmailAddress"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="user_confirm_password" class="form-control" id="floatingConfirmPassword"
                    placeholder="Confirm Password">
                <label for="floatingPassword">Confirm Password</label>
            </div>

            <div class="form-floating mb-3">
                <select name="user_state" class="form-select" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>---- Select State ----</option>
                    <option name="user_state" value="UP">One</option>
                    <option name="user_state" value="UK">Two</option>
                    <option name="user_state" value="Kashmir">Three</option>
                </select>
                <label for="floatingSelect">State</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="user_city" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected>---- Select City ----</option>
                    <option name="user_city" value="Lucknow">One</option>
                    <option name="user_city" value="Bareilly">Two</option>
                    <option name="user_city" value="Almorah">Three</option>
                </select>
                <label for="floatingSelect">City</label>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="user_address" placeholder="Leave a comment here"
                    id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Full Address</label>
            </div>

            <div class="form-floating mb-3">
                <input name="user_pincode" type="text" class="form-control" id="floatingInput"
                    placeholder="Full Address">
                <label for="floatingInput">Pincode</label>
            </div>

            <button type="submit" class="register-btn" value="submit" name="submit">SUBMIT</button>
            <p class="text-center mt-2">By creating this account you accept our Terms & Conditions</p>
        </form>
    </div>

    <div class="col-md-6 register-section-banner">
        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_mjlh3hcy.json" background="transparent"
            speed="1" class="newletter-lottie" loop autoplay></lottie-player>
    </div>

</div>