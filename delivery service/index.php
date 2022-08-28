

<!DOCTYPE html>
<html lang="en">
<?php
include_once '../public/components.php';
head($root,'deliveries');
?>
<body class = 'v-flex fs-c'>
    <script>

        function completeDeliveriy(dt)
        {
            showPop('md');
            $('#Country').val(dt[0].country);
                $('#City').val(dt[0].city);
                $('#address').val(dt[0].address);

        }
        function showDeliveries(dt)
{
    for (let i = 0; i < dt.length; i++) {
       
        $('#rows').append(`
        <div class = 'dit'>
            <div class = 'mxpw'>
                <img src="../assets/imgs/${dt[i].itemImg}" class = 'mxpw' alt="">
                <div>
                    <div class = 'h-flex fs-c mb05'>
                        <img src = '../assets/imgs/${dt[i].img_urn}' class = 'mr1'> <p>${dt[i].first_name} ${dt[i].last_name}</p>
                    </div>  
                    <div class = 'h-flex fs-c mb1'>
                    <p class = 'mr1'>${dt[i].u1first_name} ${dt[i].u1last_name}</p> <img src = '../assets/imgs/${dt[i].u1img_urn}'>
                    </div>
                    <form id = 'form_${dt[i].IID}'>
                    <input type = 'hidden' name =  'IID' value = '${dt[i].IID}'>
                    </form>
                    <div class = 'h-flex fe-c mb1 mxpw'><button class ='bbtn btn' onclick = "server_Request('cart/getSingkeDelivryItem','get','form_${dt[i].IID}',completeDeliveriy)">Complete</button></div>
                    <div>${dt[i].reqtime}</div>
                </div>
            </div>
        </div>
        `);
    }
}

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


    servercontent();
    ?>
<div class = 'v-flex v-flex c-c'>
    <div class = 'pgw'>
        <span onclick = "showPop('md')">+</span>
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
                <h1> Deliver Item</h1>
                
                <?php
                seltxt('weight_class');
                seltxt('Box_type');
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
</html>