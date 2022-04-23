<?php
 
//save crop image in php
 
if(isset($_POST["nId"]))
{
 
    $regId =$_POST["nId"];
    $dType =$_POST["device_type"];
 
    // INCLUDE YOUR FCM FILE
    include_once 'fcm.php';    
 
    $arrNotification= array();          
                                         
    $arrNotification["body"] ="PHP Push Notification";
    $arrNotification["title"] = "PHP Push Notification";
    $arrNotification["sound"] = "default";
    $arrNotification["type"] = 1;
 
    $fcm = new FCM();
    $result = $fcm->send_notification($regId, $arrNotification,$dType);
    print_r($result);
}