<?php
    include_once '../public/components.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class = 'mxvw v-flex c-c'>
    
<div class = 'mxvw mt2 v-flex c-c'>
        <div id = '' class = 'mb1 cont sdw '>
            <form>
                <h1>Sign Up</h1>
                <?php
                    txtim('email');
                    txtim('email');
                    txtim('email');
                    echo "<h2 class = 'mt2'>Address</h2>";
                    seltxt('country');
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