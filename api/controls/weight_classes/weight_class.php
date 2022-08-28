

<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/weight_class.php';





$item_weight_class = new item_weight_class($link);         

$server_results = $item_weight_class->selectAll();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 