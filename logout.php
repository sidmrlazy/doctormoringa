<?php
// if (!isset($_SESSION)) {
//     session_start();
// }
// $_SESSION = array();
// session_destroy();
// header("Location: index.php");

// if (session_status() === PHP_SESSION_ACTIVE)
//     session_destroy();
// header("Location: index"); 
// exit();

// Or wherever you want to redirect
// exit();
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION = array();
session_destroy();
header("Location:index", true, 301); // Or wherever you want to redirect
exit;