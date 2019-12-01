<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

include "mcon.php";
$item = $_GET['item'];
$tt = $_GET['tranType'];
$u = $_GET['user'];
$r = mysqli_query($mcon, "Delete from Inventory.trans where item = '$item' and trantype = '$tt' and usr = '$u'");

if (!$r) {
    $msg = mysqli_error($mcon);
    
    $data['message']  = $msg;
    $data['status'] = 'failure';
} else {
    $data['status'] = 'success';
    
}

Echo json_encode($data);


