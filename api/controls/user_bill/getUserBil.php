<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/chart.php';





$Bill = new delivery_item($link);         



$Where = isset($_SESSION['ad']) ? 'where 1' : "where di.from_UID = {$_SESSION['user_id']}";
$server_results = $Bill->getUserBil($Where);
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 