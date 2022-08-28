<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/chart.php';





$delivery_item = new delivery_item($link);         

$server_results = $delivery_item->selectDItems();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 