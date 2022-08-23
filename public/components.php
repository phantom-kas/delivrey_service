<?php
include '../private/db/db.php';
function head($root,$jslink,$csslink,$title)
{
    echo "
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>    
        
       
                
        
        

        

        <link rel='stylesheet' href ={$root}/{$csslink}>


        <script src ='{$root}/js/jquery.js'></script>
        <script src ='{$root}/js/var.js'></script>

       
        <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js'></script>

        <script src = 'js/adfunction.js'></script>
        <script src = {$root}/{$jslink}></script>
        
        


        <link rel='stylesheet' href ={$root}/css/style1.css>


        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
       
        <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'><link rel='stylesheet' href=''./style.css'>
      
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>


        
        <script src = {$root}/js/script2.js></script>

        <title>{$title}</title>
    </head>";
}

function txtim($name)
{echo "
    <div class = 'fmit v-flex c-fs '>
                            <div class = 'v-flex   mxpw c-fs fmsh-c'>
                                <span id = '{$name}l' class = 'fmsh'>
                                    {$name}
                                </span>
                            </div>
                            <div class = 'h-flex fs-c'>
                                <input id = {$name} type='text' onfocus= "."sh('#{$name}l')"." onblur= "."h('#{$name}l')"." oninput="."ch('#{$name}l','#{$name}er','#{$name}')"." name = {$name}  placeholder = {$name} class = 'iprw irph' value = '' required>
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
                                    <option>Slect item</potion>
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
        <a>
            Shop
        </a>
        <a>
            Delivery
        </a>
        <a>
            History
        </a>
        <a>
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
function adder()
{
    echo" <div id ='add-ccc' class = 'v-flex c-fe'>
    <div id = 'fmen' class = 'v-flex sb-fe mb1'>
        <a class = '' onclick = showPop('frqf')>
            Financial <br> request
        </a>
        <a onclick = showPop('taskAdder') class = ''>
            Report
        </a>
        <a>
            Request <br> leave
        </a>

    </div>
    <div id = 'add-c' class = 'v-flex c-c f15'>
        <i class='fa fa-solid fa-plus'></i>
        </div>
    </div>";
}
function nav2($root)
{
    echo "";

}
function taskViewer()
{
    echo"<div id = 'taskViewer' class = 'mxvh mxvw pos-start v-flex c-c'>
            <div id = 'taskCloser' class = 'blbg pos-abs pos-start mxvw mxvh' onclick = closePop('taskViewer')>

            </div>
            <div class = 'v-flex fs-c tbg foward scrollable'>
                <div class = 'p  class = 'v-flex fs-fs'>
                <div class = 'h-flex fe-c' onclick = closePop('taskViewer')>
                    <i class = 'fa fa-close'></i>
                </div>
                    <div class = 'v-flex sb-fs mb1 poptxw'>
                        <h4>Name</h4>
                        <span class = ''> 
                            <span id = 'txkfname' class = ''></span> &nbsp
                            <span id = 'txkfname'></span>
                        </span>
                    </div>
                    <div class = 'v-flex sb-fs mb1 poptxw'>
                        <h4>ID</h4>
                        <span id = 'txkid'></span>
                    </div>

                    <div class = 'v-flex sb-fs mb1 poptxw'>
                        <h4>Project</h4>
                        <span id = 'txkproject'></span>
                    </div>

                    <div class = 'v-flex sb-fs mb1 poptxw'>
                        <h4>Assigned By</h4>
                        <span id = 'txkasby'> </span>
                    </div>

                    <div class = 'v-flex sb-fs mb1 poptxw'>
                        <h4>Platform</h4>
                        <span id = 'txkptfm'></span>
                    </div>

                   

                    

                    <div class = 'v-flex sb-fs mb1'>
                        <h4>Accomplised</h4>
                        <span id = 'txkaq'>
                            sdsadsakjkk
                        </span>
                    </div>
                        <div class = 'h-flex fe-c mxpw mb1'>
                            
                            <span id = 'txtdate'> </span>
                        </div>
                        <div id = 'mar' class = 'mxpw v-flex c-c'>
                        
                    </div>
                </div>
            </div>

    </div>";
}
function taskAdder()
{
    echo"<div id = 'taskAdder' class = 'mxvh mxvw pos-start v-flex c-c'>
            <div id = 'taskCloser' class = 'blbg closer pos-abs pos-start mxvw mxvh' onclick = closePop('taskAdder')>

            </div>
            <div class = 'v-flex fs-c tbg foward scrollable'>
                <form id = 'userReport' class = 'pop v-flex fs-fs'>
                <div class = 'h-flex fe-c clr mxpw ' onclick = closePop('taskAdder')>
                    <i class = 'fa fa-close grow'></i>
                </div>
                   
                    <div class = 'v-flex sb-fs mb1'>
                        
                        <input name = 'project' id = 'project' type = 'text' placeholder = 'Projects'/>
                    </div>

                    <div class = 'v-flex sb-fs mb1'>
                       
                        <input name = 'assigned_by' id = 'assigned_by' type = 'text' placeholder = 'Assigned By'/>
                    </div>

                    <div class = 'v-flex sb-fs mb1'>
                       
                        <input name = 'platform'  id = 'platform' type = 'text' placeholder = 'Platform'/>
                    </div>

                    

                    <div class = 'v-flex sb-fs mb1'>
                       
                        <textarea name = 'accompished'  id = 'accompished'  placeholder = 'Type report here'> </textarea>
                    </div>
                    <div class = 'mxpw v-flex c-fs'>
                        <input class = 'btn grow' type = 'submit'/> 
                    </div>
                    
                </form>
            </div>

    </div>";
}
function proFileUser()
{
    echo "
    <div id = 'epromenu'  class = 'foward v-flex fs-c'>
            <div class = 'p f15 mxpw'><i class='fa fa-long-arrow-left' onclick=closePop('epromenu') aria-hidden='true'></i></div>
            <div class = ''>
                <div class = 'mxpw v-flex c-c'>
                    <span id = 'Epibb'><img class = 'imgr' src='../assets/imgs/userPs/Ama.jpg' alt=''></span>
                    <div><h2 class = 'mt05' id = 'Efn'>Kassdsad dsadsad</h2></div>
                </div>
                <div id =  'sfs' class = 'v-flex fs-c mta'>
                    <div class = 'v-flex fs-fs'>
                        <div class = 'h-flex fs-fs fr mb1'>
                            <h3 class = 'mr01'>Name</h3>
                            <span id = 'En' >Kassadasd</span>
                        </div>
                        <div class = 'h-flex fs-c fr mb1'>
                            <h3 class = 'mr01'>Position</h3>
                            <span id = 'Epo'>Kassadasd</span>
                        </div>
                        <div class = 'h-flex fs-c fr '>
                            <h3 class = 'mr01'>Created on</h3>
                            <span id = 'Eco'>Kassadasd</span>
                        </div>
                        <a class = 'h-flex fs-c fr '>
                            <h4 class = 'mr01'><i class ='fa fa-sign-out'>&nbsp Sign-out</i></h4>
                            
                        </a>
                    </div>
                </div>
                
            </div>
        </div>";
}
function fRequestAdder()
{
    echo "<div id = 'frqf' class = 'mxvh mxvw pos-start v-flex c-c'>
    <div id = 'frqcls' class = 'blbg closer pos-abs pos-start mxvw mxvh' onclick = closePop('frqf')>

    </div>
    <form id = 'frequestfm' class = 'popp foward wbg v-flex c-c'>
        <div class = 'v-flex c-fs'>
            <div class = 'h-flex fe-c clr mxpw ' onclick = closePop('frqf')>
                <i class = 'fa fa-close grow'></i>
            </div>
            <div class = 'h-flex fs-c  mxpw mb1'>
                <h2>Financial Request Form</h2>
            </div>
            <div class = 'v-flex c-fs  mxpw mb05'>
               <lable class = 'h-flex fs-c fr mxpw'>
                
                <input type = 'number' class = 'gbtn' name='ammount_requested' id='' placeholder = 'Requset amount(GH&#8373)'></input>
               </lable>
            </div>
            <div class = 'v-flex c-fs  mxpw'>
               <lable class = 'v-flex c-fs  mxpw'>
                
                <textarea class = 'mxpw pt05' name='reason' id='reason' cols='30' rows='5' placeholder = 'Please type what you are buying and its cost'></textarea>
               </lable>
            </div>
            <div class = 'v-flex c-fs  mxpw'>
               <lable class = 'v-flex c-fs  mxpw'>

                    <textarea class = 'mxpw pt05' name='purpose' id='purpose' cols='30' rows='5' placeholder = 'Purpose'></textarea>
               </lable>
            </div>
            <div class = 'h-flex sa-c fr pt1'>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'Building'>&nbsp Building</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'Bishop_personal'>&nbsp Bishop personal</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'Food'>&nbsp Food</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'General_Office'>&nbsp General Office</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'Box_breaker'>&nbsp Box breaker</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'boots_on_the_Ground'>&nbsp boots on the Ground</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'KGF'>&nbsp KGF</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = 'Bennett_Global'>&nbsp Bennett Global</label>
                <label class = 'p'><input value = '0' class = '' type ='checkbox' name = '12_horsemen'>&nbsp 12 horsemen</label>
            </div>
            <div class = 'v-flex c-c  mxpw mt1'>
                <button type = 'submit' class = 'p gbtn rbtn'>Send</button>
            </div>
            
        </div>
    </form>
</div>";
}
function backTitle($title,$back = null)
{
    echo 
    "<div class = 'h-flex sb-c wr'>
        <h2 class = 'fres'>
            
            {$title}
        </h2>
        <a><button class = 'bbtn' onclick='goback()'>Go back</button></a>
    </div>
    
    ";
}
function filterReportsE($subfunc)
{
    echo "
    <div class = 'v-flex fs-fs mxpw box bd'>
                        <form  id = 'filters' class = 'ml1' onsubmit='return false;'>
                            <div class = 'mxpw'>
                                Filters
                            </div>
                            <div class = 'h-flex sb-c fg1 mxpw mt05'>
                                <button class = 'mr05 bbtn' onclick =\"setFilter('today');getCompletedTasksReports(showCompletedTaskForEmployee)\">Today</button>
                                <button class = 'mr05 bbtn' onclick = \"setFilter('this_week');getCompletedTasksReports(showCompletedTaskForEmployee)\">This week</button>
                                <button class = 'mr05 bbtn' onclick = \"setFilter('this_month');getCompletedTasksReports(showCompletedTaskForEmployee)\">This month</button>
                                <!-- <button class = 'mr05 bbtn' onclick = setFilter('today')>This year</button> -->
                                <button class = 'mr05 bbtn' >Custom Search</button>
                                <button class = 'mr05 bbtn' onclick =  \"setFilter('All');getCompletedTasksReports(showCompletedTaskForEmployee)\">All</button>
                            </div>
                            <input id= 'filter' type = 'hidden' name = 'filter' value = 'All'>
                            <input type = 'hidden' name = 'datefilter'>
                            <input type = 'hidden' name = 'last' id = 'last'>
                        </form>
                        
                            
                       
                    </div>";
}
function employeeFilterFr()
{
    echo "<form id = 'Filter'class = 'mxpw' onsubmit='return false;'>
    <div class = 'mxpw' onclick = \"slideFlex('.frqfilters')\">
        Filters
    </div>
    <div class = 'frqfilters'>
        <div id = 'frqfilters' class = 'h-flex fs-c '>
           
            <input type = 'hidden' id = 'filter' name = 'filter' value = ''>
            <input type = 'hidden' name = 'last' id = 'last'>
            <input type = 'hidden' id = 'eid' name = 'eid' value = '{$_SESSION['user_id']}'>
        </div>
    </div>
    <div class = 'frqfilters'>
        <div class = 'h-flex fs-c mxpw  fr'>
        
                <button class = 'mr01 bbtn' onclick =  \"(setFilter('today'));getFinancialReport(showFinancialrequests)\"> Today </button>
                <button class = 'mr01 bbtn' onclick =  \"(setFilter('this_week'));getFinancialReport(showFinancialrequests)\" > This Week</button>
                <button class = 'mr01 bbtn' onclick =  \"(setFilter('this_month'));getFinancialReport(showFinancialrequests)\" > This Month</button>
                <button class = 'mr01 bbtn' onclick =  \"(setFilter('All'));getFinancialReport(showFinancialrequests)\"> All time</button>
                <button class = 'mr01 bbtn' onclick = ''> Custom</button>
                <div>
                    <label class = 'v-flex c-c mr01'>Approved<input type='radio'name = 'isApproved' value = '1'></label>
                </div>
                <div>
                    <label class = 'v-flex c-c mr01'> Denied<input type='radio'name = 'isApproved' value = '0'></label>
                </div>
                <div>
                    <label class = 'v-flex c-c mr01'> Pending<input type='radio'name = 'isApproved' value = '-1'></label>
                </div>
                <div>
                    <label class = 'v-flex c-c mr01'> Completed<input type='radio'name = 'isApproved' value = '2'></label>
                </div>
                <div>
                    <label class = 'v-flex c-c'> All <input type='radio'name = 'isApproved' value = '4'></label>
                </div>
            
        </div>
    </div>
    
</form>";
}
function adminFilters()
{

}
function nav3($root)
{
    echo 
    
    "
   



    <div class='navbar-lower'>
  <nav class='z-depth-0 nav-extended'>
    <div class='nav-wrapper'>
      <div class='row'>
        <div class='col s12'>
          <a href='#' data-activates='mobile-demo' class='button-collapse show-on-large'><i class='material-icons'>menu</i></a>
         
          
        </div>
        <div class='nav-content '>
          <div class='col s12 nav-content red lighten-3'>
            
            <ul class='side-nav grey darken-2' id='mobile-demo'>
              <li class='sidenav-header red lighten-2'>
          <div class='row'>
            <div class='col s4'>
                <img src='{$root}/assets/imgs/userPs/{$_SESSION['img_src']}' width='48px' height='48px' alt=' class='circle responsive-img valign profile-image'>
            </div>
            <div class='col s8'>
                <a class='btn-flat dropdown-button waves-effect waves-light white-text' href='#' data-activates='profile-dropdown'>{$_SESSION['user_name']}<i class='mdi-navigation-arrow-drop-down right'></i></a>
                <ul id='profile-dropdown' class='dropdown-content'>
                    <li><a href='{$root}/Employees/vie_user_profile.php?uid={$_SESSION['user_id']}><i class='material-icons'>person</i></a></li>
                    
                    <li class='divider'></li>
                    
                    <li><a href='signout.php'><i class='material-icons'>exit_to_app</i></a></li>
                </ul>
            </div>
          </div>
        </li>
        
              <li class='red lighten-2'>
          <ul class='collapsible collapsible-accordion'>
              <li>
                <a class='collapsible-header white-text waves-effect waves-blue '><i class='material-icons white-text '>language</i>Add <i class='material-icons right white-text' style='margin-right:0;'>arrow_drop_down</i></a>
                <div class='collapsible-body z-depth-3'>
                  <ul>
                   
                    

                <li><a href='{$root}/Employees/Submit_Report.php' class='waves-effect waves-blue' href='#'>Submit Report</a></li>
                
                    
                      <li><a href='{$root}/Employees/add_financial_request.php' class='waves-effect waves-blue' href='#'>Make financial request</a></li>
                       
                    
                    <li><div class='divider'></div></li>
                  </ul>
                </div>
              </li>
          </ul>
        </li>
        
        
        
              
              <li class='white'>
                
              </li>
              <li class='white'><a href='{$root}/Employees/index.php' class='waves-effect waves-blue'><i class='material-icons'>mail</i>Home</a></li>
              
                    
                   
                 
             
              
              <li class='white'><a href='{$root}/Employees/reports.php' class='waves-effect waves-blue'><i class='material-icons'>people</i> View Reports </a></li>
             
              <li class='white'><a href='{$root}/Employees/financial_request.php' class='waves-effect waves-blue'><i class='material-icons'>people</i> View Financial Requests </a></li>
              
              <li class='white'><a href='{$root}/Employees/view_Assigned_tasks.php' class='waves-effect waves-blue'><i class='material-icons'>people</i> View Assigned Tasks </a></li>
              <li class='white'><a href='{$root}/Employees/view_employees_performance_reviews.php' class='waves-effect waves-blue'><i class='material-icons'>people</i>View Performance Reviews </a></li>

              
              
              <li class='white'><div class='divider'></div></li>
              <li class='white'><a href='#' class='waves-effect waves-blue'><i class='material-icons'>language</i> Menu item<span class='new badge right yellow darken-3'></span></a></li>
                
              
            </ul>
          </div>
        </div>
      </div>

      
      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href='#!'>A really long item here</a></li>
        <li><a href='#!'>two</a></li>
        <!-- <li class='divider'></li> -->
        <li><a href='#!'>grade</i>three</a></li>
      </ul>
      
      
      <a class='btn-floating btn-large halfway-fab waves-effect waves-light teal hide-on-med-and-down scale-transition scale-out pulse' href='#modal1'>
          <i class='material-icons'>call</i>
      </a>

    </div>
  </nav>

  <div id = 'loader-c'>
<div>
</div>
</div>

</div>



    ";
}
function nav1($root)
{
    echo 
    
    "
  


    <div class='navbar-lower'>
  <nav class='z-depth-0 nav-extended'>
    <div class='nav-wrapper'>
      <div class='row'>
        <div class='col s12'>
          <a href='#' data-activates='mobile-demo' class='button-collapse show-on-large'><i class='material-icons'>menu</i></a>
         
          
        </div>
        <div class='nav-content '>
          <div class='col s12 nav-content red lighten-3'>
            
            <ul class='side-nav grey darken-2' id='mobile-demo'>
              <li class='sidenav-header red lighten-2'>
          <div class='row'>
            <div class='col s4'>
                <img src='{$root}/assets/imgs/userPs/{$_SESSION['img_src']}' width='48px' height='48px' alt='' class='circle' responsive-img valign profile-image'>
            </div>
            <div class='col s8'>
                <a class='btn-flat dropdown-button waves-effect waves-light white-text' href='#' data-activates='profile-dropdown'>{$_SESSION['name']}<i class='mdi-navigation-arrow-drop-down right'></i></a>
                <ul id='profile-dropdown' class='dropdown-content'>
                    <li><a href='{$root}/Employees/vie_user_profile.php?uid={$_SESSION['admin_id']}><i class='material-icons'>person</i></a></li>
                    
                    <li class='divider'></li>
                    
                    <li><a href='signout.php'><i class='material-icons'>exit_to_app</i></a></li>
                </ul>
            </div>
          </div>
        </li>
        
              <li class='red lighten-2'>
          <ul class='collapsible collapsible-accordion'>
              <li>
                <a class='collapsible-header white-text waves-effect waves-blue '><i class='material-icons white-text '>language</i>Add <i class='material-icons right white-text' style='margin-right:0;'>arrow_drop_down</i></a>
                <div class='collapsible-body z-depth-3'>
                  <ul>
                   
                    

                    ";
                    if($_SESSION['canAssignTasks'] === 1)
                    {
                    echo "<li><a href='{$root}/Admin/assign_task.php' class='waves-effect waves-blue' href='#'>Assign Task</a></li>";
                    };
                    
                        if($_SESSION['canRegisterUsers'] === 1)
                        {
                        echo "<li><a href='{$root}/Admin/register_employee.php' class='waves-effect waves-blue' href='#'>Register Employee</a></li>";
                        };
                        if($_SESSION['can_review'] === 1)
                        {
                        echo "<li><a href='{$root}/Admin/make_performance_review.php' class='waves-effect waves-blue' href='#'>Make Performance Review</a></li>";
                        };
                    echo "
                    <li><div class='divider'></div></li>
                  </ul>
                </div>
              </li>
          </ul>
        </li>
        
        
        
              
              <li class='white'>
                
              </li>
              <li class='white'><a href='{$root}/Admin/index.php' class='waves-effect waves-blue'><i class='material-icons'>mail</i>Home</a></li>
              ";
              if($_SESSION['can_view_financial_request'] === 1)
                {
                echo "<li class='white'><a href='{$root}/Admin/financial_request.php' class='waves-effect waves-blue'><i class='material-icons'>people</i>Financial Requests </a></li>
                    ";
                }
                    
                    if($_SESSION['can_view_reports'] === 1){
             echo " <li class='white'><a href='{$root}/Admin/reports.php' class='waves-effect waves-blue'><i class='material-icons'>android</i> Reports</a></li>
                   "; };
             
                if($_SESSION['can_view_assigned_tasks'] === 1)
                {
              echo "
              
              <li class='white'><a href='{$root}/Admin/view_Assigned_tasks.php' class='waves-effect waves-blue'><i class='material-icons'>people</i>View Assigned Tasks </a></li>
              ";
                };
              echo "
              
              <li class='white'><a href='{$root}/Admin/employees.php' class='waves-effect waves-blue'><i class='material-icons'>people</i> Employees </a></li>";
              if($_SESSION['can_view_reviews'] === 1)
                        {
                            echo "<li class='white'><a href='{$root}/Admin/view_employees_performance_reviews.php' class='waves-effect waves-blue'><i class='material-icons'>people</i> View Performance Teviews </a></li>
                      ";  };
                        echo "
              <li class='white'><div class='divider'></div></li>
              <li class='white'><a href='#' class='waves-effect waves-blue'><i class='material-icons'>language</i> Menu item<span class='new badge right yellow darken-3'></span></a></li>
                
              
            </ul>
          </div>
        </div>
      </div>

      
      <!-- Dropdown Structure -->
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href='#!'>A really long item here</a></li>
        <li><a href='#!'>two</a></li>
        <!-- <li class='divider'></li> -->
        <li><a href='#!'>grade</i>three</a></li>
      </ul>
      
      
      <a class='btn-floating btn-large halfway-fab waves-effect waves-light teal hide-on-med-and-down scale-transition scale-out pulse' href='#modal1'>
          <i class='material-icons'>call</i>
      </a>

    </div>
  </nav>

  <div id = 'loader-c'>
<div>
</div>
</div>


</div>



    ";


}
function rating($name)
{
    echo"
    <select name='{$name}' id='{$name}' class = 'irph rating' required>
        <option value='' class = 'poor'>Rate</option>
        <option value='1' class = 'poor'>Poor<b1> 1 point</option>
        <option value='2' class = 'fair'>Fair<b1> 2 point</option>
        <option value='3' class = 'sat'>Satisfactory<b1> 3 points</option>
        <option value='4' class = 'good'>Good<b1> 4 points</option>
        <option value='5' class = 'exlnt'>Excellent<b1> 5 points</option>
    </select>";
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

?>