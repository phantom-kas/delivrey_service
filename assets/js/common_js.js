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
    
    dt = form !== null ? $('#'+form).serialize() : null;
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
                            window.setTimeout(`window.location='${rootURL}/${redirect}`, 50);
                        }
                    }
                    else 
                    {
                        
                        hudError(res.message);
                        
                    }
                } 
            });
}