

<!DOCTYPE html>
<html lang="en">
<?php
include_once '../public/components.php';
head($root,'history');
?>



<body class = 'v-flex fs-c'>


    <?php
    
    
    nav($root);



    ?>




<div class = 'v-flex c-c'>
    <div id = '' class = 'pgw' style='overflow-x:auto;'>

  
    <table id = 'rows' class = 'table mxpw'>
        <tr>
        <th>
                From user
            </th>
            
            <th>
                Destination address
            </th>
            <th>
                cost of Delivery
            </th>
            <th>
                Date
            </th>
        </tr>
    </table>


        



    </div>
</div>


<script>
function cls()
{$('#rows').html(`
    <tr>
            <th>
                From user
            </th>
            
            <th>
                Destination address
            </th>
            <th>
                cost of Delivery
            </th>
            <th>
                Date
            </th>
        </tr>
    `);}
function showbill(dt)
{
    let sum = 0;
    
    for (let i = 0; i < dt.length; i++) {
           
        sum += dt[i].cost_of_delivery;
       $('#rows').append(`
       <tr>
            <td>
                ${dt[i].first_name} ${dt[i].last_name}
            </td>
            <td>
               $ ${dt[i].address}
            </td>
            <td>
               $ ${dt[i].cost_of_delivery}
            </td>
            <td>
                ${dt[i].time_stamp}
            </td>
        </tr>
        `)
    }
    $('#rows').append(`
       <tr>
       <th>
        Total bill :
       </th>

            <th colspan = '3'>
           $${sum}
            </th>
        </tr>

        `)
}
      server_Request('user_bill/getUserBil','get',null,showbill);
     
</script>
</body>
</html>