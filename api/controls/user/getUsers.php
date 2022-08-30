<?php
include_once '../../../private/common/getHeaders.php';

include_once '../../classes/users.php';





$User = new User($link);         

if(isset($_GET['sort']))
{
    $sort = !empty($_GET['sort']) ? " ORDER BY {$_GET['sort']} DESC":  null;

}
else
{
    $sort = null;
}
$server_results = $User->getUsers($sort);
  





echo json_encode($server_results,JSON_HEX_APOS | JSON_HEX_QUOT);
?> 