<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/chart.php';
include_once '../../classes/delevery_log.php';
include_once '../../classes/delivery.php';



  $server_result['status'] = 'success';
 
    $Delivery_item = new delivery_item($link);
    $D = new delivery($link);
$Delivery_item->IIDV = $Delivery_item->pg_var('IID','post','no item specified');

$server_result = $Delivery_item->reportDamaged();
if( $server_result['status'] === 'success')
{
    $Dl = new delivery_log($link);
    $Dl->IIDV = $Delivery_item->pg_var('IID','post','no item specified');
    $Dl->UIDV = $_SESSION['user_id'];
    $Dl->DFIDV = -3;
    $Dl->reportV = isset($_POST['report']) && !empty($_POST['report']) ? $_POST['report'] : null;
    $Dl->DIDV = $Delivery_item->pg_var('DID','post','no did specified');
    $D->idV = $Delivery_item->pg_var('DID','post','no did specified');
   
    $server_result = $Dl->enterLog();


}          
                
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>