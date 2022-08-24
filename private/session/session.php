<?php
  error_reporting(E_ALL | E_STRICT);

    session_start();

    if (!isset($_SESSION['token']) || time() > $_SESSION['token_expires'])
    {
        $_SESSION['token'] =  bin2hex(openssl_random_pseudo_bytes(16));
        $_SESSION['token_expires'] = time() + 900;
    // $_SESSION['user_id'] = 1;
    }
    $root = "http://localhost:1080/work%20manage/workManage";
    
    function checkpremission($pres)
    {
              if($_SESSION[$pres] !== 1)
        {
            $server_result['status'] = 'error';
            $server_result['message'] = 'Access denied';
            echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
            exit();
        }
    }
    function checkpremissionAndgb($pres)
    {
      
      if($_SESSION[$pres] !== 1)
      {
        echo "<meta http-equiv='refresh' content='5; url=javascript:history.go(-1).php'>";
      }
    }
    function checkLogInUser($root)
    {
        if(!isset($_SESSION['user_id']))
        {
            echo "<meta http-equiv='refresh' content='0;log_in.php'>";
        }
    }
    function cksignIn($root)
    {
        if(!isset($_SESSION['user_id']) && !isset($_SESSION['admin_id']))
        {
            echo "<meta http-equiv='refresh' content='0;log_in.php'>";
        }
    }
    function checkLogInAdmin($root)
    {
      if(!isset($_SESSION['admin_id']))
      {
          
      }
    }
?>
