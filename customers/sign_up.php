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
        `<option value = ${dt[i].CID}>${dt[i].country}</option>`
      );
        
    }
}


function citySelectOptions(dt)
{
    for (let i = 0; i < dt.length; i++) {
      $('#City').append(
        `<option value = ${dt[i].city_ID}>${dt[i].city}</option>`
      );
        
    }
}

        $(document).ready(function () {
            $('input[name = PID]').change(function (e) { 
                e.preventDefault();
                if($('input[name = PID]:checked').val() === '1')
                {
                    $('#cc-c').show();
                  
                }
                else
                {
                    $('#cc-c').hide();

                }
                
            });

            serverRequest('country/getcountries','get',null,countrySelectOptions)
            serverRequest('city/getcities','get',null,citySelectOptions)

            $('#pp').change(function (e) { 
            e.preventDefault();

            var reader = new FileReader();
            if(this.files && this.files[0]){
            reader.onload = function(e)
            {
                $("#pppp").attr('src', e.target.result);
                
            }
            reader.readAsDataURL(this.files[0]);
            console.log(e.target.result);
        }
        
            
        });
           
        });
</script>

<div class = 'mxvw mt2 v-flex c-c'>
        <div id = '' class = 'mb1 cont sdw '>
            <form id = 'form' onsubmit="serverRequest('user/register_user','post'); return false;">
                <h1>Sign Up</h1>
                <div>
                    <div class = 'mxpw v-flex c-c mb2'><img id = 'pppp' src='../assets/imgs/nouser.jpg' class = 'imgr bdbg' alt=''/>  </div>
                    <div>
                        <input id = 'pp' type='file' name = 'profile_pic' required>
                    </div>
                </div>
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
                        <label class = 'mr2'>Monthly suscribtion <input type="radio" name="PID" value = '1' id=""></label>
                        <label>On delivery <input type="radio" name="PID" value = '2' id=""></label>
                    <div class = 'ndis' id = 'cc-c'>
                        <?php
                            txtim('Creadit_card_number');
                        ?>
                   
                    </div>
                <div class = 'v-flex c-c mt1'>
                    <input type="submit" class = 'obtn btn'>
                </div>

               
            </form>
        </div>
</div>
    
</body>
</html>