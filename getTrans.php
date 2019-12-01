<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");

include "mcon.php";

//var_dump($mcon);

$r = mysqli_query($mcon, "SELECT * FROM Inventory.trans")
or die (mysqli_error($mcon));
while ($row = mysqli_fetch_assoc($r)){
    $data['root'][] = $row;
}
$data['success'] = true;
echo $_GET['callback'] . '(' . json_encode($data). ')';

// fromWhs, toWhs, item, ref, qty, trantype, usr, ts, Device