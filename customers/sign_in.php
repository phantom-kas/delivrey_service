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
<body class = 'mxvw mxvh v-flex c-c ovfscl'>
    
        <div id = '' class = 'mb1 cont sdw '>
            <form>
                <h1>Sign in</h1>
                <?php
                    txtim('email');
                    txtim('Password');
                   
                ?>
               
                <div class = 'v-flex c-c mt1'>
                    <input type="submit" class = 'obtn btn'>
                </div>

               
            </form>
        </div>
    
</body>
</html>