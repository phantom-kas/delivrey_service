<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/users.php';
include_once '../../classes/uploader.php';


  $server_result['status'] = 'success';
  $userProfileImageName = $_FILES['profile_pic']['name'];
  $location = "../../../assets/imgs/".$userProfileImageName;
  $Fil = new Uploader('profile_pic');
    $User = new User($link);

    
   $User->emailV = $User->pg_var('email','post','email must be provided');


   $User->pasV = $User->pg_var('password','post','password must be provided');

   $User->cityV = $User->pg_var('City','post','email must be provided');
   $User->countryV = $User->pg_var('Country','post','password must be provided');
   $User->addressV = $User->pg_var('address','post','email must be provided');
   $User->first_nameV = $User->pg_var('first_name','post','password must be provided');
   $User->last_nameV = $User->pg_var('last_name','post','email must be provided');


   

            $server_result = $User->HasUser();
            
                    if(!isset($server_result['status']))
                    {
                        $server_result = $server_result ? $User->register : $User->errorMessage('user already exist wwith the email provided <br/>Please pick another one');
                    }
                    if($server_result['status'] === 'success')
                    {
                        $Fil->name = "pi{$user->idV}.jpg";
                         if (!$Fil->uploadProfileImage())
                            {
                                $server_result['status'] = 'error';
                                $server_result['message'] = 'image upload error';
                            }
                    }
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>