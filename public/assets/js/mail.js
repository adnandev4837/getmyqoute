jQuery(document).ready(function () {

    $('#mailField').hide();
    $('#qoute-mail').hide();
   $('#get-qoute-mail').hide();
   $("#mailFare").keydown(function(e){
    return false;
});
    $('#mailCheckbox').change(function() {
        if(this.checked) {
            var returnVal = confirm("Are you sure?");
          $(this).prop("checked", returnVal);
        if(returnVal)
        {
           $('#qoute-mail').show();
            $('#mailField').show();
            $('#get-qoute').hide();
            $('#get-qoute-mail').show();
        }
        }
        else
        {   $('#get-qoute-mail').hide();
            $('#mailField').hide();
            $('#qoute-mail').hide();
            $('#get-qoute').show();
        }
        $('#mailCheckbox').val(this.checked);        
    });
    $("#qouteEmail").on("click", function(){ 
        $('#qoute-mail').show();
        $('#get-qoute-mail').show();
    });
       $("#noOfItems,#userDistance,#pickupAddress,#dropAddress,#type").on("change", function(){ 
        $('#qoute-mail').hide();
        $('#get-qoute-mail').hide();
        $('#mailField').hide();
        $('#get-qoute').show();
        $( "#mailCheckbox" ). prop( "checked", false );
        });
});