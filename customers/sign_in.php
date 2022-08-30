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
    <script src="../assets/js/common_js.js"></script>
    <script src='../assets/js/jquery.js'></script>

</head>
<body class = 'mxvw mxvh v-flex c-c ovfscl'>
 
    
        <div id = '' class = 'mb1 cont sdw '>
            <form id = 'form' onsubmit= "serverRequest('user/sigin_user','post','form',null,null,'customers/index.php');return false;">
                <h1>Sign in</h1>
                <?php
                    txtim('email');
                    txtim('password');
                ?>
               
              <input type = 'hidden' id = 'ut' name = 'ut' value = ''>

                <div class = 'v-flex c-c mt1'>
                    <input type="submit" name = ''  onclick="$('#ut').val('ad')" value = 'Sign in as Admin' class = 'obtn btn'>
                </div>
                
                <div class = 'v-flex c-c mt1'>
                    <input type="submit" name = '' onclick="$('#ut').val('od')" value  = 'Sign in'class = 'obtn btn'>
                </div>

                <div class = 'v-flex c-c mt1 f07'>
                   <span>Don't have an account?</span>
                   <a href = '<?php echo $root?>/customers/sign_up.php' class = 'glowOrange'>Register</a>
                </div>

               
            </form>
        </div>
    
        <div id = 'loader-c'>
<div>
</div>
</div>

</div>
</body>

</html>