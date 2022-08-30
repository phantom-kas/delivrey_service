<!DOCTYPE html>
<html lang="en">
<?php
include_once '../public/components.php';
head($root,'deliveries');
?>
<body class = 'v-flex fs-c'>

<form id = 'form'>
    <input type = 'hidden' name = 'IID' value = '<?php echo $_GET['IID'] ?>'>
</form>


<script>
    function showlogs(dt)
   
    {
        for (let i = 0; i < dt.length; i++) {
            btn = `
            <div class = 'h-flex c-c  mt05 mxpw'><button class ='bbtn btn' onclick = "server_Request('delevry/assign_to_delivery','POST','form_${dt[i].IID}')">Report damaged</button></div>

            <div class = 'h-flex c-c mb1 mt05 mxpw'><button class ='bbtn btn' onclick = "server_Request('cart/report_delivered','POST','form_${dt[i].IID}',uts)">Report delivered</button></div>
            `;
            if(dt[i].flag === 3)
            {
                btn ='<div><h4>Delivered</h4></div>';
            }

       $('#rows').append(`
                <div class = 'h-flex fs-c'><p class = 'mr1'>${dt[i].discription}</p><span class = 'f07'>${dt[i].time_stamp}</span><div>
       `);
    }}
  server_Request('logs.php/get_logs','get','form',showlogs);
</script>


<?php
    
    
    nav($root);



    ?>


<div class = 'v-flex c-c'>
    <div id = 'rows' class = 'pgw'>



        



    </div>
</div>
</body>
</html>