<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

include "mcon.php";
$newName = $_GET['newName'];
$r = mysqli_query($mcon, "Update Inventory.Device set User = '$newName'");

if (!$r) {
    $msg = mysqli_error($mcon);
     
    $data['message']  = $msg;
    $data['status'] = 'failure';
} else {
    $data['status'] = 'success';
    
}

Echo json_encode($data);
 

