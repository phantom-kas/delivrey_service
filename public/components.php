<?php
include '../private/db/db.php';
include_once '../private/session/session.php';
function head($root,$title = 'new page')
{
    echo "
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>{$title}</title>
    <link rel='stylesheet' href='../assets/css/style.css'>
    <script src='../assets/js/common_js.js'></script>
    <script src='../assets/js/jquery.js'></script>
</head>";
}

function txtim($name)
{
    $type =  $name === 'password' ? 'password' : 'text';
    echo "
     
    <div class = 'fmit v-flex c-fs '>
                            <div class = 'v-flex   mxpw c-fs fmsh-c'>
                                <span id = '{$name}l' class = 'fmsh'>
                                    {$name}
                                </span>
                            </div>
                            <div class = 'h-flex fs-c'>
                                <input id = {$name} type= {$type} onfocus= "."sh('#{$name}l')"." onblur= "."h('#{$name}l')"." oninput="."ch('#{$name}l','#{$name}er','#{$name}')"." name = {$name}  placeholder = {$name} class = 'iprw irph' value = '' required>
                                <span id = {$name}st>
                                    
                                </span>
                            </div>
                            <div class = 'mxpw v-flex c-fs'>
                                <span id = {$name}er class = 'fmer'>Error</span>
                            </div>
    </div>";
    
}
function seltxt($name)
{echo "
    <div class = 'fmit v-flex c-fs '>
                            <div class = 'v-flex   mxpw c-fs fmsh-c'>
                                <span id = '{$name}l' class = 'fmsh'>
                                    {$name}
                                </span>
                            </div>
                            <div class = 'h-flex fs-c'>
                                <select id = {$name} type='text' onfocus= "."sh('#{$name}l')"." onblur= "."h('#{$name}l')"." oninput="."ch('#{$name}l','#{$name}er','#{$name}')"." name = {$name}  placeholder = {$name} class = 'iprw irph' value = '' required>
                                    <option value = ''>Slect {$name}</potion>
                                </select>
                                <span id = {$name}st>
                                    
                                </span>
                            </div>
                            <div class = 'mxpw v-flex c-fs'>
                                <span id = {$name}er class = 'fmer'>Error</span>
                            </div>
    </div>";
}
function nav($root)
{
    echo "
    <div id = '' class = 'nav mt1 mb1 cont mxvw'>
    <div>
        <a href = 'index.php'>
            Shop
        </a>
        <a href = 'make_delivery.php'>
            Delivery
        </a>
        <a href = 'history.php'>
            History
        </a>
        <a href =  'Profile.php'>
            Profile
        </a>
        
    </div>
</div>
";

    
}




function head2($root,$jslink,$csslink,$title,$ckl = null)
{
    if($ckl === null)
    {
    }
    echo "
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>    
        
        

        
        <link rel='stylesheet' href ={$root}/{$csslink}>
        <link rel='stylesheet' href ={$root}/css/style1.css>
        <script src ='{$root}/js/jquery.js'></script>

        
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js'></script>
        <script src = '{$root}/js/commonjs.js'></script>
        <script src = {$root}/{$jslink}></script>
       
        <script src ='{$root}/js/var.js'></script>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
        
       
        <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel='stylesheet' href=''./style.css'>
      
        
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

       
        <script src = {$root}/js/script2.js></script>
        <title>{$title}</title>
    </head>";
}






function inptxt($nm,$ph=null)
{
    echo "<textarea type = 'text' value = '' placeholder = '{$ph}' id = '{$nm}' name = '{$nm}' class = 'irph iprw' required></textarea>";
}

function shedTImeSetter($days,$day)
{
    echo "
    <tr>
    <td>
        {$day}
    </td>
    <td>
    <input type = 'time' name = '{$days}st'> -
    <input type = 'time' name = '{$days}et'>
    </td>
    <td>
        <button class = 'bbtn' onclick=\"makeFree('{$days}');return false\">Free</button>
    </td>
</tr>";
}
function servercontent()
{
    echo "<div class = 'cont pgw'>
    <div id = 'rows' class = 'mxpw'>
        <div>
            
        </div>
    </div>
</div>";
}
?>