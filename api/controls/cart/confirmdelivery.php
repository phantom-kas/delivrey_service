<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/chart.php';
include_once '../../classes/users.php';



    $D = new delivery_item($link);
$U = new User($link);
     $D->WIDV = $D->pg_var('weight_class','post','no weight_class specified');

    
    $D->PPIDV = $D->pg_var('Package_type','post','no Package_type specified');
    $D->IIDV = $D->pg_var('item_id','post','no item_id specified');
    
   $server_result =  $D->getdelevryCost();

   if($server_result['status'] === 'success')
   {
     $D->costV = $server_result['data'];

     $U->idV = $D->pg_var('UID','post','no item_id specified');
$U->updateCost($D->costV);
$U->updateNumdeliveries();

include_once '../../classes/delevery_log.php';
$Dl = new delivery_log($link);
$Dl->IIDV = isset($_POST['item_id']) && !empty($_POST['item_id']) ? $_POST['item_id'] : null;
$Dl->DFIDV = isset($_POST['item_id']) && !empty($_POST['item_id']) ? 2 : 0;
$Dl->UIDV = $_SESSION['user_id'];
$Dl->reportV = isset($_POST['report']) && !empty($_POST['report']) ? $_POST['report'] : null;
$Dl->DIDV = 0;


$server_result = $Dl->enterLog();


$server_result =  $D->approveDelivery();

  
   }
    




   

    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>