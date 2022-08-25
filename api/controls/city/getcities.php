<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/city.php';





$countries = new city($link);         

$server_results = $countries->selectAll();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 