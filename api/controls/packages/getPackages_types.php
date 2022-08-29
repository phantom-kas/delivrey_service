

<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/package_types.php';





$packages = new packages($link);         

$server_results = $packages->selectAll();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 