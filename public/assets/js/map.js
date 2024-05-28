if(!en_public_data.map_api_key) var geocodingClient = mapboxSdk({accessToken: 'pk.eyJ1IjoiYWRuYW5tYWxpazQ4MzciLCJhIjoiY2w5dTMyeHl0MWd1bDN2cDVweXFld2NxOCJ9.jZF'});
else var geocodingClient = mapboxSdk({accessToken: en_public_data.map_api_key});

function autocompleteSuggestionMapBoxAPI(inputParams, callback) {
    geocodingClient.geocoding.forwardGeocode({
        query: inputParams,
        autocomplete: true,
        limit: 5,
    })
        .send()
        .then(response => {
            const match = response.body;
            callback(match);
        });
}

function autocompleteInputBox(inp) {
    var currentFocus;
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) {
            return false;
        }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(a);
        // suggestion list MapBox api called with callback
        autocompleteSuggestionMapBoxAPI(jQuery('#'+localStorage.getItem("inputType")).val(), function (results) {
            results.features.forEach(function (key) {
                b = document.createElement("DIV");
                b.innerHTML = "<strong>" + key.place_name.substr(0, val.length) + "</strong>";
                b.innerHTML += key.place_name.substr(val.length);
                b.innerHTML += "<input type='hidden' data-lat='" + key.geometry.coordinates[1] + "' data-lng='" + key.geometry.coordinates[0] + "'  value='" + key.place_name + "'>";
                b.addEventListener("click", function (e) {
          
                    let  lat = jQuery(this).find('input').attr('data-lat');
                    let  long = jQuery(this).find('input').attr('data-lng');
                    inp.value = jQuery(this).find('input').val();
                    jQuery(inp).attr('data-lat', lat);
                    jQuery(inp).attr('data-lng', long);
                    if ((lat != "" && lat != null)&& (long != "" && long != null)) {
                       // console.log(lat);
                      //console.log(long);
                     if(localStorage.getItem("inputType")=="pickupAddress")
                     {
                         localStorage.setItem("pickupAddressLat",lat);
                         localStorage.setItem("pickupAddressLong",long);
                     }  
                     if(localStorage.getItem("inputType")=="dropAddress")       
                     {
                                 localStorage.setItem("dropAddressLat",lat);
                                 localStorage.setItem("dropAddressLong",long);
                     }
                     }
                    closeAllLists();
                });
                a.appendChild(b);
            });
        })
    });


    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }

    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }

    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }

    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}


jQuery(document).ready(function ($) {
	$("#userDistance,#noOfItems").on("change", function(){   
    if ($(this).val() === "0" || $(this).val() === "00" || $(this).val() === "000" || $(this).val() === "0000" || $(this).val() === "00000" || $(this).val() === "000000" || $(this).val() === "0000000" || $(this).val() === "00000000"|| $(this).val() === "000000000" || $(this).val() === "0000000000"|| $(this).val() === "00000000000") {
      $(this).val("1");
    }
		console.log("asdasda");
	});

     jQuery("#pickupAddress,#dropAddress").keypress(function () {
        localStorage.setItem("inputType", jQuery(this).attr("id"));
        autocompleteInputBox(document.getElementById(jQuery(this).attr("id")));
    });
    $("#type").on("change", function(){   
        var typeText= $('#type').find(":selected").text();
        document.cookie = "type="+typeText;
      });
      $(".numberOnly").keypress(function (e) {
        if (!String.fromCharCode(e.keyCode).match(/^[0-9]+$/i)) return false;
    });
        $("#qoute-submit,#mailCheckbox,#qouteEmail").on("click", function(){    
            if ($("#pickupAddress").val()!='' && $("#dropAddress").val()!='' && $("#type").val()!='' && $("#noOfItems").val()!='' && $("#userDistance").val()!=''){

            var pickupAddressLat=localStorage.getItem("pickupAddressLat");
            var pickupAddressLong=localStorage.getItem("pickupAddressLong");
            var dropAddressLat=localStorage.getItem("dropAddressLat");
            var dropAddressLong=localStorage.getItem("dropAddressLong");
            // console.log(pickupAddressLat+pickupAddressLong+dropAddressLat+dropAddressLong);
            request =$.ajax({
            url: "https://api.mapbox.com/directions/v5/mapbox/driving-traffic/"+pickupAddressLong+"%2C"+pickupAddressLat+"%3B"+dropAddressLong+"%2C"+dropAddressLat+"?access_token="+en_public_data.map_api_key,
             type: 'GET',
             dataType: 'json', // added data type
              success: function(res) {
                  var distance_m=res.routes[0].distance;
                  distance_km = distance_m/1000;
                  distance_mile = distance_m*0.000621371;
                  var distanceUnit=en_public_data.distanceUnit;
                  var distance;
                  if (distanceUnit=="meter")  distance=distance_m;
                  if (distanceUnit=="kilometer")  distance=distance_km;
                  if (distanceUnit=="mile")  distance=distance_mile;
                  //get distance on basis of address
                  quotation(distance);
         
                  },
              error: function(xhr) {
                 console.log("Error: " + xhr.statusText);
                 user_distance=$("#userDistance").val();
                 //get distance on the basis of user distance
                 quotation(user_distance);
          
                     }
                    });
                   
  }
 
   if ($("#pickupAddress").val()) $("#pickupAddress").removeClass("error");
   else $("#pickupAddress").addClass("error");
   if ($("#dropAddress").val() ) $("#dropAddress").removeClass("error");
   else $("#dropAddress").addClass("error");
   if ($("#type").val() ) $("#type").removeClass("error");
   else $("#type").addClass("error");
   if ($("#noOfItems").val()) $("#noOfItems").removeClass("error");
   else $("#noOfItems").addClass("error");
   if ($("#userDistance").val()) $("#userDistance").removeClass("error");
   else $("#userDistance").addClass("error");
});

});
function getTypeQoutation() {
var rate=0;
var noOfItems= jQuery("#noOfItems").val();
var type= jQuery('#type').find(":selected").val();
     var dropdownOptions=en_public_data.dropdownOptions;
     for (let val = 0; val < dropdownOptions.optionName.length; val++) {
        if(type==dropdownOptions.optionValue[val]) 
        {
            rate=dropdownOptions.optionRate[val]*noOfItems; 
            return rate;
        } 
     }
    }
function quotation(distance) {
  var typeRate=getTypeQoutation();
  var distanceRate=en_public_data.distanceRate;
  var totalRate=parseFloat(typeRate)+(parseFloat(distance)*parseFloat(distanceRate));
  var totalFare= jQuery("#totalFare").val(totalRate);
  var totalMailFare= jQuery("#mailFare").val(totalRate);
}



 