<?php
require('server/config.php');

$traffic_page_name = "index.php";
$traffic_agent = $_SERVER['HTTP_USER_AGENT'];
$traffic_ip = $_SERVER['REMOTE_ADDR'];
$traffic_host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

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