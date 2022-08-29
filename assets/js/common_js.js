var rootURL ="http://localhost:1080/SS/delivrey_service";



var currentUrl = window.location.pathname;
var currentFile = currentUrl.substr(currentUrl.lastIndexOf('/') + 1);


function hudError(error)
{
    alert(error);
}

function sttload()
{
    $("button , input[type  = 'submit]").prop('disabled',true);
    $('#loader-c').addClass('loader');
   
    
}


function sh(x)
{
   
  
}
function h(x)
{
    
}
function ch(n,x,d)
{
    if($(d).val() !== "")
    {

        $(n).fadeIn(500);
       
    }
    else
    {
        $(n).fadeOut();
        
    }
    
}




function endload()
    {
        $("button , input[type  = 'submit]").prop('disabled',false);
        $('#loader-c').removeClass('loader');
    }

    var GET = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };




function serverRequest(rqFile_dir,method = 'post',form = 'form',showFn1 = null,showFn2 = null,redirect = null)
{
    sttload();
    
    dt = form !== null ? new FormData(document.getElementById(form)) : null;
            $.ajax({
                type: method,
                url: rootURL+"/api/controls/"+rqFile_dir+'.php',
                data: dt,
                dataType: "text",
                contentType: false,
                processData: false,
                success: function (response)
                 {  
                    var res = JSON.parse(response);
                    endload();
                    if(res.status === 'success')
                    {
                       
                        if(showFn1 !==  null)
                        {
                            showFn1(res.data);
                        }
                        if(showFn2 !==  null)
                        {
                            showFn1(res.data);
                        }
                        if(res.message !== undefined)
                        {
                            hudError(res.message);    
                        }
                        if(redirect !== null)
                        {
                            window.setTimeout("window.location='"+rootURL+'/'+redirect+"?'", 50);
                        }
                    }
                    else 
                    {
                        
                        hudError(res.message);
                        
                    }
                } 
            });
}


function server_Request(rqFile_dir,method = 'post',form = 'form',showFn1 = null,showFn2 = null,redirect = null)
{
    sttload();
    
    dt = form !== null ?  $('#'+form).serialize() : null;
            $.ajax({
                type: method,
                url: rootURL+"/api/controls/"+rqFile_dir+'.php',
                data: dt,
                dataType: "text",
                
                success: function (response)
                 {  
                    var res = JSON.parse(response);
                    endload();
                    if(res.status === 'success')
                    {
                       
                        if(showFn1 !==  null)
                        {
                            showFn1(res.data);
                        }
                        if(showFn2 !==  null)
                        {
                            showFn1(res.data);
                        }
                        if(res.message !== undefined)
                        {
                            hudError(res.message);    
                        }
                        if(redirect !== null)
                        {
                            window.setTimeout("window.location='"+rootURL+'/'+redirect+"?'", 50);
                        }
                    }
                    else 
                    {
                        
                        hudError(res.message);
                        
                    }
                } 
            });
}




function showPop(n)
{
    $('#'+n).css('transition-property','none');
    $('#'+n).show(200).css('display','block');
    
}
function twoTogle(x1,x2)
{
    $('#'+x1 +","+"#"+x2).css('transition-property','none');
    $("#"+x2).fadeOut();
    $("#"+x1).fadeIn(200);
}
function closePop(n=null)

{
    if(n !== null)
    {
    $("#"+n).hide(200);
    }
    else
    {
     
        $("#"+event.srcElement.id).parent().hide(200);
    }
   
}



function countrySelectOptions(dt)
{
    cls('Country');
    for (let i = 0; i < dt.length; i++) {
      $('#Country').append(
        `<option value = ${dt[i].CID}>${dt[i].country}</option>`
      );
        
    }
}


function citySelectOptions(dt)
{
    cls('City');
    for (let i = 0; i < dt.length; i++) {
      $('#City').append(
        `<option value = ${dt[i].city_ID}>${dt[i].city}</option>`
      );
        
    }
}


function selectUser(dt)
{
    cls('To_user');
    for (let i = 0; i < dt.length; i++) {
      $('#To_user').append(
        `<option value = ${dt[i].UID}>${dt[i].first_name} ${dt[i].last_name}</option>`
      );
        
   
    }
}


function weightClassSelectOptions(dt)
{
    cls('weight_class');
    for (let i = 0; i < dt.length; i++) {
      $('#weight_class').append(
        `<option value = '${dt[i].WID}'>${dt[i].min} - ${dt[i].max}   price:${dt[i].cost}</option>`
      );
        
    }
}



function packages(dt)
{
    cls('Package_type');
    for (let i = 0; i < dt.length; i++) {
      $('#Package_type').append(
        `<option value = '${dt[i].PPID}'>${dt[i].package}</option>`
      );
        
    }
}
function showDeliveries(dt)
{
    for (let i = 0; i < dt.length; i++) {
       
        $('#rows').append(`
        <div class = 'dit'>
            <div class = 'mxpw'>
                <img src="../assets/imgs/${dt[i].itemImg}" class = 'mxpw' alt="">
                <div>
                    <div class = 'h-flex fs-c mb05'>
                        <img src = '../assets/imgs/${dt[i].img_urn}' class = 'mr1'> <p>${dt[i].first_name} ${dt[i].last_name}</p>
                    </div>  
                    <div class = 'h-flex fs-c mb1'>
                    <p class = 'mr1'>${dt[i].u1first_name} ${dt[i].u1last_name}</p> <img src = '../assets/imgs/${dt[i].u1img_urn}'>
                    </div>
                    <div>${dt[i].reqtime}</div>
                </div>
            </div>
        </div>
        `);
    }
}

function claerFilter()
{
    $('#rows').html('');
}
function cls(n)
{
    $('#'+n).html('');
}