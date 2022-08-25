 <?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/users.php';


  $server_result['status'] = 'success';
    $User = new User($link);

    
   $User->emailV = $User->pg_var('email','post','email must be provided');
   $User->pasV = $User->pg_var('password','post','password must be provided');

            $server_result = $User->getSigninfo();
            
                    if($server_result['status'] === 'success')
                    {
                        $server_result = $User->signInUser();
                    }
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>