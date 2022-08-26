<?php
require('server/config.php');


$fetch_visitor = "SELECT * FROM `traffic`";
$fetch_visitor_result = mysqli_query($connection, $fetch_visitor);

while ($row = mysqli_fetch_assoc($fetch_visitor_result)) {
    $host_name = $row['traffic_host_name'];
}
$host_name;
$traffic_page_name = "shop.php";
$traffic_agent = $_SERVER['HTTP_USER_AGENT'];
$traffic_ip = $_SERVER['REMOTE_ADDR'];
$traffic_host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

if ($host_name !== $traffic_host_name) {
    $query = "INSERT INTO traffic(
            traffic_time,  
            traffic_agent, 
            traffic_ip, 
            traffic_page_name, 
            traffic_host_name) VALUES (
                curdate(),
                '$traffic_agent',
                '$traffic_ip',
                '$traffic_page_name',
                '$traffic_host_name')";

    $result = mysqli_query($connection, $query);
}