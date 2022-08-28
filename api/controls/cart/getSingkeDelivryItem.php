<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/chart.php';





$delivery_item = new delivery_item($link);         

$delivery_item->IIDV = $delivery_item->pg_var('IID','get','no delivery item specified');
$server_results = $delivery_item->selectSingleDItems();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 