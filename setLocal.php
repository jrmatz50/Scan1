<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json");
include "mcon.php";

//var_dump($_POST);

if (isset($_POST['device'])){
    $formType = $_POST['formType'];
    $device = $_POST['device'];
    $user = $_POST['user'];
    $towhs = $_POST['towhs'];
    $ref = $_POST['ref'];
    $fromwhs = $_POST['fromwhs'];
    $item = $_POST['item'];
    $qty = $_POST['qty'];
    if (trim($towhs) == null){
        $towhs = 0;
    }
    
    // does the item already exist in the table if so - add the quantity
    $r = mysqli_query($mcon, "SELECT count(*) as CNT FROM Inventory.trans where item = '$item'")
    or die (mysqli_error($mcon));
    $row = mysqli_fetch_assoc($r);
    $cnt = $row['CNT'];
    
  if ($cnt > 99){
   $s =  "Update Inventory.trans set qty = qty+ $qty where item = '$item'";
       
      
  } else {
      $s = "insert into Inventory.trans values(
$fromwhs,
$towhs,
'$item',
'$ref',
$qty,
'$formType',
'$user',
 CURRENT_TIMESTAMP,
'$device'
)  ";   
  }
  $r = mysqli_query($mcon,$s);
  if (!$r) {
      $msg = mysqli_error($mcon);
      $data['sql'] = $s;
      $data['message']  = $msg;
      $data['status'] = 'failure';
  } else {
      $data['status'] = 'success';
      
  }
  Echo json_encode($data);
    
    
}