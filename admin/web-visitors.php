<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>
<div class="container section-wrapper">
    <div class="container w-100 col-md-10 ">
        <p class="section-heading">Website Visitors data</p>
        <p class="section-details">View all website visitors below</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Source</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Device Name</th>
                    <th scope="col">Landing Page</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                include('includes/server/config.php');
                $query = "SELECT * FROM `traffic`";
                $get_users = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($get_users)) {
                    $traffic_id = $row['traffic_id'];
                    $traffic_time = $row['traffic_time'];
                    $traffic_agent = $row['traffic_agent'];
                    $traffic_ip = $row['traffic_ip'];
                    $traffic_host_name = $row['traffic_host_name'];
                    $traffic_page_name = $row['traffic_page_name'];
                ?>
                <tr>
                    <th scope="row"><?php echo $traffic_id ?></th>
                    <td><?php echo $traffic_time; ?></td>
                    <td><?php echo $traffic_agent; ?></td>
                    <td><?php echo $traffic_ip; ?></td>
                    <td><?php echo $traffic_host_name; ?></td>
                    <td><?php echo $traffic_page_name; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('includes/footer.php') ?>