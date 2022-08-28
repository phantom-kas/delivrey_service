<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/chart.php';
include_once '../../classes/uploader.php';


  $server_result['status'] = 'success';
  $delivery_itemProfileImageName = $_FILES['profile_pic']['name'];
  $location = "../../../assets/imgs/".$delivery_itemProfileImageName;
  $Fil = new Uploader('profile_pic');
    $Delivery_item = new delivery_item($link);

    


   $Delivery_item->from_UIDV = $_SESSION['user_id'];
   $Delivery_item->to_UIDV = $Delivery_item->pg_var('To_user','post','Please specify destination');

    
  $Delivery_item->time_stampV = date('y-m-d H:i:s');
    $Delivery_item->img_srcV = 'DI'.$_SESSION['user_id'].$Delivery_item->time_stampV.'.jpg';

    $img_src =str_replace(':','',$Delivery_item->img_srcV);  
    $Delivery_item->img_srcV = $img_src;


   

            $server_result = $Delivery_item->addItemToBeDelivered();
                    if($server_result['status'] === 'success')
                    {
                         
                        
                    
                    
                        
                        $Fil->name =  $img_src ;
                         if (!$Fil->uploadProfileImage())
                            {
                                $server_result['status'] = 'error';
                                $server_result['message'] = 'image upload error';
                            }
                    
                }
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>