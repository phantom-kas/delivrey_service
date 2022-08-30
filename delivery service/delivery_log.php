
<!DOCTYPE html>
<html lang="en">
<?php
include_once '../public/components.php';
head($root,'deliveries');
?>
<body class = 'v-flex fs-c'>

<?php
    
    
    nav($root);



    ?>

    <script> 

    function uts(dt)
    {
        cls();
        serverRequest('cart/getCharItems','get',null,showDeliveries);
    }

    function showDeliveries(dt)
    {
        for (let i = 0; i < dt.length; i++) {
            if(dt[i].DID <= 0)
            {
                continue;
            }
            btn = `
            <div class = 'h-flex c-c  mt05 mxpw'><button class ='bbtn btn' onclick = "server_Request('cart/report_damaged','POST','form_${dt[i].IID}',uts)">Report damaged</button></div>

            <div class = 'h-flex c-c mb1 mt05 mxpw'><button class ='bbtn btn' onclick = "server_Request('cart/report_delivered','POST','form_${dt[i].IID}',uts)">Report delivered</button></div>
            `;
            if(dt[i].flag === 3)
            {
                btn ='<div><h4>Delivered</h4></div>';
            }
            if(dt[i].flag === -3)
            {
                btn ='<div><h4>Dammaged</h4></div>';
            }

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
                        <input type = 'hidden' name ='IID' value = '${dt[i].IID}'>
                        <input type = 'hidden' name ='city' value = '${dt[i].city_ID}'>
                        <input type = 'hidden' name ='country' value = '${dt[i].CID}'>
                        <input type = 'hidden' name = 'PPID' value = '${dt[i].PPID}'>
                        <input type = 'hidden' name = 'DID' value = '${dt[i].DID}'>
                       
                    </form>
                   ${btn}
                   <div class = 'mxpw  h-flex fe-c'><a href = '${rootURL}/delivery%20service/logs.php?IID=${dt[i].IID}' class = 'f07'>View logs</a></div>
                   <div>${dt[i].reqtime}</div>
               </div>
           </div>
       </div>
       `);
    }
    }
      serverRequest('cart/getCharItems','get',null,showDeliveries);
    </script>


<div class = 'v-flex c-c'>
    <div id = 'rows' class = 'pgw'>


        



    </div>
</div>





</body>

</html>
