<?php
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DB','shopinganddeliver');
    $link = new mysqli(HOST,USER,PASSWORD,DB);  
    $timeZone = "Etc/GMT+0";    
    date_default_timezone_set($timeZone);
    $last = isset($_GET['last']) && !empty($_GET['last']) ? $_GET['last'] : 0;
   
?>