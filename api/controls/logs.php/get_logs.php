<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/delevery_log.php';





$DL = new delivery_log($link);         

if(isset($_GET['IID']))
{
    $DL->IIDV = isset($_GET['IID']) && !empty($_GET['IID'])  ?  $_GET['IID'] : null;
}
else
{
    $DL->IIDV = null;
}
$where = $DL->IIDV === null  ? "WHERE 1" : "Where IID = $DL->IIDV || IID = 0";


$server_results = $DL->getDeliverylogs($where);
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 