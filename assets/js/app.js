$(document).ready(function () {
  

    

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