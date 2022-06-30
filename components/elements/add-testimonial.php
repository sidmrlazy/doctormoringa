<div class="container section-wrapper">
    <p class="section-heading">Leave a review</p>
    <p class="section-details">Leave a review on products that you have liked</p>

    <?php
    include('admin/includes/server/config.php');
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = 0;
    }
    $user_query = "SELECT * FROM user WHERE user_id = $user_id";
    $user_result = mysqli_query($connection, $user_query);
    while ($row = mysqli_fetch_assoc($user_result)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_contact = $row['user_contact'];
        if (isset($_POST['submit'])) {
            $feedback_user_id = $user_id;
            $feedback_user_name = $user_name;
            $feedback_user_contact = $user_contact;
            $feedback_content = mysqli_real_escape_string($connection, $_POST['feedback_content']);
            $feedback_item_id = $_POST['feedback_item_id'];
            $feedback_status = "Blocked";
            $add_feedback_query = "INSERT INTO `feedback`(
                `feedback_user_id`, 
                `feedback_user_name`, 
                `feedback_user_contact`, 
                `feedback_item_id`,
                `feedback_content`, 
                `feedback_status`) VALUES (
                    '$feedback_user_id',
                    '$feedback_user_name',
                    '$feedback_user_contact',
                    '$feedback_item_id',
                    '$feedback_content',
                    '$feedback_status')";
            $add_feedback_result = mysqli_query($connection, $add_feedback_query);

            if ($add_feedback_result) {
                echo "<div class='alert alert-success w-100' role='alert'>
                Thank you for your feedback!
              </div>";
            } else {
                echo "<div class='alert alert-danger w-100' role='alert'>
                THERE WAS SOME PROBLEM! PLEASE TRY AGAIN.
              </div>";
            }
        }
    }

    ?>
    <form action="" method="POST" class="insert-function-form">
        <div class="form-floating mb-3">
            <select name="feedback_item_id" class="form-select" id="floatingSelect"
                aria-label="Floating label select example">
                <option>Open this select menu</option>
                <?php
                $fetch_item_query = "SELECT * FROM items";
                $fetch_item_result = mysqli_query($connection, $fetch_item_query);

                while ($row = mysqli_fetch_assoc($fetch_item_result)) {
                    $item_id = $row['item_id'];
                    $item_name = $row['item_name'];
                    $item_weight = $row['item_weight'];
                ?>
                <option value="<?php echo $item_id; ?>"><?php echo $item_name; ?> (<?php echo $item_weight; ?>)</option>
                <?php } ?>
            </select>
            <label for="floatingSelect">Works with selects</label>
        </div>
        <div class="form-floating mb-3">
            <textarea maxlength="250" class="form-control" name="feedback_content" placeholder="Leave a comment here"
                id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Give Feedback</label>
        </div>

        <button type="submit" name="submit" class="submit-btn">Submit Testimonials</button>
    </form>
</div>