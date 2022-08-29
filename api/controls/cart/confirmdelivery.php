<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/chart.php';



    $D = new delivery_item($link);

     $D->WIDV = $D->pg_var('weight_class','post','no weight_class specified');

    
    $D->PPIDV = $D->pg_var('Package_type','post','no Package_type specified');
    $D->IIDV = $D->pg_var('item_id','post','no item_id specified');

   $server_result =  $D->getCostOfDelivery();

   if($server_result['status'] === 'success')
   {
     $D->costV = $server_result['data'];
   $server_result =  $D->approveDelivery();
   }
    




   

    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>