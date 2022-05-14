<?php
if (isset($_SESSION["user_name"]) != true) {
    echo "<script type='text/javascript'>
    $(document).ready(function() {
        $('#loginModal').modal('show');
    });
    </script>";
}
?>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-left col-md-4">
                <h1>Login</h1>
                <p>Get access to your Orders, Wishlist and Recommendations</p>
                <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_sop8cbmc.json"
                    background="transparent" speed="1" class="login-lottie" loop autoplay></lottie-player>
            </div>
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
                            $query = "SELECT * FROM user WHERE user_contact = '$user_contact' AND user_password = '$fetched_password' AND $user_type = 2";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $count = mysqli_num_rows($result);

                            if ($count == 1 && $row) {

                                echo "<div class='w-100 m-5 alert alert-success text-center' role='aler'>Login Successful!</div>
                                <form method='POST' class='login-modal-form d-none col-md-8'>
                                ";
                                $_SESSION['user_name'] = $user_name;
                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    session_start();
                                    if (isset($_SESSION["user_name"]) != true) {
                                    }
                                    header('Location:index', true, 301);
                                    exit;
                                    return true;
                                }
                            } elseif ($user_type !== 2) {
                                echo "<div class='alert alert-danger text-center' role='aler'>Oops, looks like your'e not registered with us.</div>";
                            } else {
                                echo "<div class='alert alert-danger text-center' role='aler'>Username or Password is Incorrect!</div>";
                            }
                        }
                    }
                }
            }
            ?>
            <form method="POST" class="login-modal-form col-md-8">
                <div class="form-floating mb-3">
                    <input type="text" name="user_contact" class="form-control" id="floatingInput"
                        placeholder="Mobile Number">
                    <label for="floatingInput">Mobile Number</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="user_password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="login-modal-disclaimer">
                    <p>By continuing, you agree to Doctor Moringa's Terms of Use and Privacy Policy.</p>
                </div>
                <input class="login-modal-btn" type="submit" name="submit">
            </form>
        </div>
    </div>
</div>