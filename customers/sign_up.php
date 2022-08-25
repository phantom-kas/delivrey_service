<?php
    include_once '../public/components.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<?php
    head($root,'sign up');
?>
<body class = 'mxvw v-flex c-c'>
<script>
    function countrySelectOptions(dt)
{
    for (let i = 0; i < dt.length; i++) {
      $('#Country').append(
        `<option vlaue = '${dt[i].CID}'>${dt[i].country}</option>`
      );
        
    }
}


function citySelectOptions(dt)
{
    for (let i = 0; i < dt.length; i++) {
      $('#City').append(
        `<option vlaue = '${dt[i].city_ID}'>${dt[i].city}</option>`
      );
        
    }
}

        $(document).ready(function () {
            serverRequest('country/getcountries','get',null,countrySelectOptions)
            serverRequest('city/getcities','get',null,citySelectOptions)
           
        });
</script>

<div class = 'mxvw mt2 v-flex c-c'>
        <div id = '' class = 'mb1 cont sdw '>
            <form onsubmit="serverRequest('user/register_user','post')">
                <h1>Sign Up</h1>
                <?php
                    txtim('first_name');
                    txtim('last_name');
                    txtim('email');
                    txtim('password');
                    echo "<h2 class = 'mt2'>Address</h2>";
                    seltxt('Country');
                    seltxt('City');
                    txtim('address');
                ?>
                <h2 class = 'mt2'>Delivery Service</h2>
                <div class = 'mpw mt1'>
                    <span>Delivery payment method</span>
                    <div>
                        <label class = 'mr2'>Monthly suscribtion <input type="radio" name="pm" value = ''id=""></label>
                        <label>On delivery <input type="radio" name="pm" value = '' id=""></label>
                    <div>
                   
                </div>
                <div class = 'v-flex c-c mt1'>
                    <input type="submit" class = 'obtn btn'>
                </div>

               
            </form>
        </div>
</div>
    
</body>
</html>