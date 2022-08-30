<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/chart.php';
include_once '../../classes/delevery_log.php';
include_once '../../classes/delivery.php';
include_once '../../classes/users.php';



  $server_result['status'] = 'success';
 $u = new User($link);
    $Delivery_item = new delivery_item($link);
    $D = new delivery($link);
$Delivery_item->IIDV = $Delivery_item->pg_var('IID','post','no item specified');

$server_result = $Delivery_item->reportDelivered();
if( $server_result['status'] === 'success')
{
    $Dl = new delivery_log($link);
    $Dl->IIDV = isset($_POST['IID']) && !empty($_POST['IID']) ? $_POST['IID'] : null;
    $Dl->DFIDV = isset($_POST['IID']) && !empty($_POST['IID']) ? 3 : 0;
    $Dl->UIDV = $_SESSION['user_id'];
    $Dl->reportV = isset($_POST['report']) && !empty($_POST['report']) ? $_POST['report'] : null;
    $Dl->DIDV = $Delivery_item->pg_var('DID','post','no did specified');
    $D->idV = $Delivery_item->pg_var('DID','post','no did specified');
    $server_result = $D->removeit();
   
    $server_result = $Dl->enterLog();

}          
                
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>