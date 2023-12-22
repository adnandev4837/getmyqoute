$(document).ready(function(){    

    var postURL = "";
    var i=1;  
    $('#add').click(function(){  
         i++;  
         $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="optionName[]" id="option_name" placeholder="Option Name" class="form-control" required /><input type="text" id="option_value" name="optionValue[]" placeholder="Option Value" class="form-control" required /><input type="number" min="0" name="optionRate[]" id="option_rate" placeholder="Option Rate" class="form-control" required /></td><td><button type="button" name="remove" id="'+i+'"  class="button form-btn btn_remove">Remove</button></td></tr>'); 
    });
    $(document).on('click', '.btn_remove', function(){ 
        var button_id = $(this).attr("id");   
        console.log(i);
        $('#row'+button_id+'').remove(); 
   });  

   var dropdownOptions=en_admin_data.dropdownOptions;
  for (let val = 0; val < dropdownOptions.optionName.length; val++) {
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="optionName[]" id="option_name" value="'+dropdownOptions.optionName[val]+'" placeholder="Option Name" class="form-control" required /><input type="text" id="option_value" name="optionValue[]" placeholder="Option Value" value="'+dropdownOptions.optionValue[val]+'"  class="form-control" required /><input type="text" name="optionRate[]" id="option_rate" placeholder="Option Rate" value="'+dropdownOptions.optionRate[val]+'" class="numberOnly form-control" required /></td><td><button type="button" name="remove" id="'+i+'"  class="button form-btn btn_remove">Remove</button></td></tr>');

   };
  
   var distanceUnit=en_admin_data.distanceUnit;
   if (distanceUnit=="meter")  $("select option[value='meter']").attr("selected","selected");
   if (distanceUnit=="kilometer")  $("select option[value='kilometer']").attr("selected","selected");
   if (distanceUnit=="mile")  $("select option[value='mile']").attr("selected","selected");
 
   //allow numbers only
   $(".numberOnly").keypress(function (e) {
    if (!String.fromCharCode(e.keyCode).match(/^[0-9]+$/i)) return false;
});

  });  