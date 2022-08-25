<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/country.php';





$countries = new country($link);         

$server_results = $countries->selectAll();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 