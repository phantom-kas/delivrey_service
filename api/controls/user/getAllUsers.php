<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/users.php';





$User = new User($link);         

$server_results = $User->getAllUsers();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 