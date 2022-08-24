 <?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/users.php';


  $server_result['status'] = 'success';
    $User = new User($link);

    if(isset($_POST['user_name']) && isset($_POST['password']))
    {
        if(!empty($_POST['user_name']) && !empty($_POST['password']))
        {
            $User->nameV =$_POST['user_name']; 
            $server_result = $User->getSigninfo();
            if($server_result['status'] === 'success')
            {
               
                    $server_result = $User->checkPass($_POST['password']);
                    if($server_result['status'] === 'success')
                    {
                        $server_result = $User->signInUser();
                    }
                
            }
            
        
        }
            else
            {
                $server_result['status'] = 'error';
                $server_result['message'] = "Error password and user_name must be provided" ;
            }
    }
    else
    {
        $server_result['status'] = 'error';
        $server_result['message'] = "Error password and user_name must be provided" ;
    }
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>