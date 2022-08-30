<?php
include_once './private/session/session.php';
 session_start();
 // Free up all the session variables
 session_unset();

 $rul = $root.'/Customers/sign_in.php';
echo " <meta http-equiv='refresh' content='0;{$rul}'>"
?>
<!-- Display the sign-in page -->
