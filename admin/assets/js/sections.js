$(document).ready(function(){    
    // style sections
    $(".section_0").show();
    $(".section_1").hide();
    $(".section_2").hide();
    $(".section_3").hide();
    $("#input_fields_styling").on("click", function(){ 
       $(".section_0").show();
       $(".section_1").hide();
       $(".section_2").hide();
       $(".section_3").hide();
    });
    $("#label_styling").on("click", function(){ 
        $(".section_0").hide();
        $(".section_1").show();
        $(".section_2").hide();
        $(".section_3").hide();
     });
    $("#button_styling").on("click", function(){ 
        $(".section_0").hide();
        $(".section_1").hide();
        $(".section_2").show();
        $(".section_3").hide();
     });
    $("#other_styling").on("click", function(){ 
        $(".section_0").hide();
        $(".section_1").hide();
        $(".section_2").hide();
        $(".section_3").show();
     });

     //label sections
     $(".section_00").show();
     $(".section_11").hide();
     $(".section_22").hide();
     $("#input_fields_labels").on("click", function(){ 
        $(".section_00").show();
        $(".section_11").hide();
        $(".section_22").hide();
     
     });
    $("#button_labels").on("click", function(){ 
        $(".section_00").hide();
        $(".section_11").show();
        $(".section_22").hide();
     
     });
    $("#other_labels").on("click", function(){ 
        $(".section_00").hide();
        $(".section_11").hide();
        $(".section_22").show();
     });

});