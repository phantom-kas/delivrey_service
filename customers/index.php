

<!DOCTYPE html>
<html lang="en">


<?php
include_once '../public/components.php';
 if(isset($_SESSION['user_id']) && !isset($_SESSION['ad'])):
?>

<?php

head($root,'deliveries');
?>




<body class = 'v-flex fs-c'>
    <script>
        
    function onsucess(dt = null)
    {
        closePop('md');
        claerFilter();
        serverRequest('cart/getCharItems','get',null,showDeliveries);
    }

   
   
    serverRequest('cart/getCharItems','get',null,showDeliveries);
    
            serverRequest('user/getAllUsers','get',null,selectUser);

            function showToUserInfor(dt)
            {
                $('#first_name').val(dt[0].first_name);
                $('#last_name').val(dt[0].last_name);
                $('#Country').val(dt[0].country);
                $('#City').val(dt[0].city);
                $('#address').val(dt[0].address);
              
            }


            $(document).ready(function () {
                $('#To_user').change(function (e) { 
                    e.preventDefault();
                    if($(this).val() != '')
                    {
                        $("input[name = 'HtoUser']").val($(this).val());
                       
                        server_Request('user/getUserByID','get','to_user',showToUserInfor);
                    }
                });
            });
    </script>

    <?php
    
    
    nav($root);


  
    ?>

<div class = 'v-flex v-flex c-c'>
    <div class = 'pgw'>
        <span class  = 'h-flex fs-c' onclick = "showPop('md')"><h1 class = 'plus'>+</h1></span>
    </div>
</div>



<div class = 'v-flex c-c'>
    <div id = 'rows' class = 'pgw'>



        



    </div>
</div>














 <div id = 'md' class = 'mxvw mxvh pop fix v-flex c-c scrollable'>
    <div id = 'md-c' class = 'closer' onclick="closePop('md')">

    </div>

       
            <form id = 'form' class = 'cont mt2  mb1 wmc mla mra  sdw forward wbg' onsubmit="serverRequest('cart/insertItem','post','form',onsucess); return false;">
            <div class = 'mxpw h-flex fe-c'>
                <h4 class = 'cl' onclick="closePop('md')" >X</h4>
            </div>
            <h1> Deliver Item</h1>
                <div>
                    <div class = 'mxpw v-flex c-c mb2'><img id = 'pppp' src='../assets/imgs/box1.png' class = 'imgsq bdbg' alt=''/>  </div>
                    <div>
                        <input id = 'pp' type='file' name = 'profile_pic' required>
                    </div>
                </div>
                <?php
                 seltxt('To_user');
                    txtim('first_name','disabled');
                    txtim('last_name','disabled');
                   
                   
                    echo "<h2 class = 'mt2'>Destination Address</h2>";
                    txtim('Country','disabled');
                    txtim('City','disabled');
                    txtim('address','disabled');
                ?>
                
                   
                      
                   
                <div class = 'v-flex c-c mt1'>
                    <input type="submit" class = 'obtn btn'>
                </div>

               
            </form>
        
</div>
<div>

    <form id = 'to_user'>
            <input type="hidden" name = 'HtoUser'>
    </form>
</body>
<?php
 elseif(isset($_SESSION['ad'])):
$url = "$root/delivery%20service/index.php";

 echo   "<head><meta http-equiv='refresh' content='0;{$url}'></head>";
?>


<?php
 else:
?>
sadasd
<?php
 endif;
?>

</html>