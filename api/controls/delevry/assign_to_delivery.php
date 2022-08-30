<?php
include_once '../../../private/common/postheaders.php';
include_once '../../classes/package_types.php';
include_once '../../classes/delivery.php';
include_once '../../classes/chart.php';




$D = new delivery($link);
$P = new packages($link);
$DI = new  delivery_item($link);

$D->city_IDV = $D->pg_var('city','post','error no package type specified');
 $D->countryV = $D->pg_var('country','post','error no package tyDp specified');
$P->idV = $D->pg_var('PPID','post','error no package type specified');;
 //$D->idV = $D->pg_var('DID','post','error no package type specified');
$D->from_city_IDV = $_SESSION['currentCity'];

if ($_SESSION['country'] == $D->countryV )
{

 $class = 'B';

}
else
{
    $class = 'A';
}
    $server_result = $P->getPackageVolume();
    if($server_result['status'] === 'success')
    {
        $extraV = $server_result['data']; 
        
        $server_result = $D->getAvailableVansInCity($extraV,$class);
        if($server_result['status'] === 'success')
        {
            $DI->DIDV = $server_result['data']['DID'];
            $DI->IIDV = $D->pg_var('IID','post','error no package type specified');
            $server_result = $DI->addToDelivery();
           
            if($server_result['status'] === 'success')
            {
                $D->idV =  $DI->DIDV ;
                $server_result = $D->updateNumItemsAdd();
            $server_result = $D->updateDelevryWeight($extraV);

            }
          
        }
        
    }

else
{
   
    $server_result = $D->errorMessage('NA');


}



 

   

         
            
                  
      
    echo json_encode($server_result,JSON_HEX_APOS | JSON_HEX_QUOT);
  ?>