

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

    <div class = 'mxpw h-flex fs'>
        <form id = 'form'>
        <select id = 'sort' name = 'sort'>
            <option value="">Order by</option>
            <option value="total_deliveries">number of deliveries</option>
            <option value="total_cost">Cost of Deliveries</option>
        </select>
        </form>
    </div>
    <table id = 'rows' class = 'table mxpw'>
        <tr>
        <th>
                Users
            </th>
            <th>
                Address
            </th>
            
            <th>
                Total deliveries
            </th>
            <th>
                Total cost of Deliveries
            </th>
            <th>
                Date signed up
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
                Users
            </th>
            <th>
                Address
            </th>
            
            <th>
                Total deliveries
            </th>
            <th>
                Total cost of Deliveries
            </th>
            <th>
                Date signed up
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
                ${dt[i].address}
            </td>
            <td>
                ${dt[i].total_deliveries}
            </td>
            <td>
                $${dt[i].total_cost}
            </td>
            <td>
                ${dt[i].time_stamp}
            </td>
        </tr>
        `)
    }
    
}
      server_Request('user/getUsers','get',null,showbill);

      $(document).ready(function () {
        $('#sort').change(function (e) { 
            e.preventDefault();
            if($(this).val() !== '')
            {
                cls();
               server_Request('user/getUsers','get','form',showbill);
            }
           
        });
      });
     
</script>
</body>
</html>