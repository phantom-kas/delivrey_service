<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/users.php';





$User = new User($link);         


$User->idV = $User->pg_var('HtoUser','get','no user id specified');
$server_results = $User->getSingleUserByID();
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 