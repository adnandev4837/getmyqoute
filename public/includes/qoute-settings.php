<head>
    <script src="https://code.jquery.com/jquery-3.4.1.js" type="text/javascript"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>

</head>
<style>
div#success-alert {
    color: black;
    background-color: lightcyan;
    padding: 10px;
    border-radius: 5px;
}
div#error-alert {
    color: black;
    background-color: lightyellow;
    padding: 10px;
    border-radius: 5px;
}
 .qouteAmount{
    color: <?php if(!empty(get_option( 'gmq_fields_color' ))){ echo get_option( 'gmq_fields_color' );}else {echo '#F7941D';}?> !important;
    padding: 5px !important;
    border: none !important;
    width: 25% !important;
    border-bottom: 1px solid <?php if(!empty(get_option( 'gmq_fields_color' ))){ echo get_option( 'gmq_fields_color' );}else {echo '#F7941D';}?> !important;
    pointer-events: none !important;
}
.container {
/*     margin:<?php if(!empty(get_option( 'gmq_container_margin_top' ))){ echo get_option( 'gmq_container_margin_top' );}else {echo '0';}?> <?php if(!empty(get_option( 'gmq_container_margin_right' ))){ echo get_option( 'gmq_container_margin_right' );}else {echo '0';}?> <?php if(!empty(get_option( 'gmq_container_margin_bottom' ))){ echo get_option( 'gmq_container_margin_bottom' );}else {echo '0';}?> <?php if(!empty(get_option( 'gmq_container_margin_left' ))){ echo get_option( 'gmq_container_margin_left' );}else {echo '0';}?> !important; */
	    margin:none;
}

    .form-input
    {
    border:none !important;
	border-bottom: 1px solid <?php if(!empty(get_option( 'gmq_fields_color' ))){ echo get_option( 'gmq_fields_color' );}else {echo '#F7941D';}?> !important;
    border-width: 0 0 1px 0 !important;
    border-color: <?php if(!empty(get_option( 'gmq_fields_color' ))){ echo get_option( 'gmq_fields_color' );}else {echo '#F7941D';}?> !important;
    font-size: <?php if(!empty(get_option( 'gmq_fields_font_size' ))){ echo get_option( 'gmq_fields_font_size' );}else {echo '0.8rem';}?> !important;
    margin: 10px 0 10px 0 !important;
    width: 100% !important;
    padding: 1em !important;
    }
    .form-lable
    {   
    	font-weight: bold !important;
        font-size:<?php if(!empty(get_option( 'gmq_sub_label_font_size' ))){ echo get_option( 'gmq_sub_label_font_size' );}else {echo '0.9rem;';}?> !important;
        color: <?php if(!empty(get_option( 'gmq_label_color' ))){ echo get_option( 'gmq_label_color' );}else {echo '#F7941D';}?> !important;
    }
    .top-lable
    {   	
        font-weight: bold !important;
        font-size: <?php if(!empty(get_option( 'gmq_main_label_font_size' ))){ echo get_option( 'gmq_main_label_font_size' );}else {echo '2.4rem;';}?> !important;
        color:  <?php if(!empty(get_option( 'gmq_label_color' ))){ echo get_option( 'gmq_label_color' );}else {echo '#F7941D';}?> !important;
    }
    .form-btn {
    border: none !important;
    border-radius: 3px !important;
    margin-top: 2% !important;
    color:white !important;
    padding: 0.6em !important;
    background :<?php if(!empty(get_option( 'gmq_button_color' ))){ echo get_option( 'gmq_button_color' );}else {echo '#F7941D';}?> !important;
    font-size: <?php if(!empty(get_option( 'gmq_button_font_size' ))){ echo get_option( 'gmq_button_font_size' );}else {echo '0.9rem';}?> !important;
    }
    .form-btn:hover {
    background: <?php if(!empty(get_option( 'gmq_button_hover_color' ))){ echo get_option( 'gmq_button_hover_color' );}else {echo '#F7941D';}?> !important;
}
    </style>
 
<body>

<div class="container">
<form  autocomplete="off"  action="" id="form-gmq" method="POST" >

<div class="main-lable">
<lable class="top-lable"><?php if(!empty(get_option( 'gmq_main_label' ))){ echo get_option( 'gmq_main_label' );}else {echo 'Get Qoute';} ?></lable>
</div>
<div class="form-full">
  <!-- Pickup Address -->
  <div class="autocomplete form-full" >
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_pickup_label' ))){ echo get_option( 'gmq_pickup_label' );}else {echo 'Starting Address';} ?></lable>
        <input id="pickupAddress" type="text" name="pickupAddress" class="form-input" placeholder="<?php if(!empty(get_option( 'gmq_pickup_label' ))){ echo get_option( 'gmq_pickup_label' );}else {echo 'Starting Address';} ?>" required>
    </div>
  
    <!-- Drop Address -->
    <div class="autocomplete form-full">
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_drop_label' ))){ echo get_option( 'gmq_drop_label' );}else {echo 'Ending Address';} ?></lable>
        <input id="dropAddress" type="text" name="dropAddress" class="form-input"  placeholder="<?php if(!empty(get_option( 'gmq_drop_label' ))){ echo get_option( 'gmq_drop_label' );}else {echo 'Ending Address';} ?>" required>
    </div>
   <!--User Distance -->
    <div class="form-one-third-col form-hal-col-width-right">
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_user_distance_label' ))){ echo get_option( 'gmq_user_distance_label' );}else {echo 'Distance(km)';} ?></lable>
    <input type="text" value="" id="userDistance" name="userDistance" placeholder="<?php if(!empty(get_option( 'gmq_user_distance_label' ))){ echo get_option( 'gmq_user_distance_label' );}else {echo 'Distance(km)';} ?>" class="form-input numberOnly" maxlength="10" required>
    </div>

    <!-- Type -->
    <div class="form-one-third-col form-hal-col-width-right">
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_type_label' ))){ echo get_option( 'gmq_type_label' );}else {echo 'Type';} ?></lable>

    <select name="type[]" id="type" class="form-input" required >
        <option value="" disabled selected>Choose option</option>
   <?php 
    $dropdownOptions=get_option('gmq_dropdown_options');
   for ($optionCount = 0; $optionCount < sizeof($dropdownOptions['optionName']); ++$optionCount) {?>
  <option value="<?= $dropdownOptions['optionValue'][$optionCount] ?>"><?= $dropdownOptions['optionName'][$optionCount] ?></option>
   <?php } ?>
    </select>
    </div>

    <!-- No of Items -->
    <div class="form-one-third-col ">
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_items_label' ))){ echo get_option( 'gmq_items_label' );}else {echo 'Total Items';} ?></lable>
    <input type="text" value="" id="noOfItems" name="noOfItems" placeholder="<?php if(!empty(get_option( 'gmq_items_label' ))){ echo get_option( 'gmq_items_label' );}else {echo 'Total Items';} ?>" class="form-input numberOnly" maxlength="10" required>
    </div>
     <!-- Email -->
  <div class="autocomplete form-full" id="mailField">
    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_user_email_label' ))){ echo get_option( 'gmq_user_email_label' );}else {echo 'Your Email';} ?></lable>
        <input id="qouteEmail" type="email" name="qouteEmail" class="form-input" placeholder="<?php if(!empty(get_option( 'gmq_user_email_label' ))){ echo get_option( 'gmq_user_email_label' );}else {echo 'Email(Uncheck below checkbox if you do not want mail)';} ?>" required>
    </div>
       <!-- Mail checkbox-->
  <div class="form-full" >
        <input id="mailCheckbox" type="checkbox" name="mailCheckbox" class="" required>
        <lable class="mail-lable"><?php if(!empty(get_option( 'gmq_mail_checkbox_label' ))){ echo get_option( 'gmq_mail_checkbox_label' );}else {echo 'Want qoute mail ? please check';} ?></lable>
    </div>
  
</div>
<div class="form-full" id="get-qoute-mail">
<input type="submit" name="qouteMailSubmit" id="qoute-mail" value="<?php if(!empty(get_option( 'gmq_button_label' ))){ echo get_option( 'gmq_button_label' );}else {echo 'SEND ME MAIL';} ?>" class="form-btn" >
<lable class="form-lable"><?php if(!empty(get_option( 'gmq_fare_label' ))){ echo get_option( 'gmq_fare_label' );}else {echo 'Total Fare : ';} ?>  <input id="mailFare" type="text" placeholder="Amount" name="mailFare" class="qouteAmount" required ></lable>
</div>

</form>
   <!-- Price label and button -->
    <div class="form-full" id="get-qoute">
    <input type="submit" name="submit" id="qoute-submit" value="<?php if(!empty(get_option( 'gmq_button_label' ))){ echo get_option( 'gmq_button_label' );}else {echo 'GET QUOTE';} ?>" class="form-btn" >
    <!-- <lable class="form-lable"><?php if(!empty(get_option( 'gmq_fare_label' ))){ echo get_option( 'gmq_fare_label' );}else {echo 'Total Fare : ';} ?><small id="totalFare" name="totalFare" ><?php if(!empty(get_option( 'gmq_total_fare' ))){ echo round(get_option( 'gmq_total_fare'), 2);}else {echo '0';} ?></small></lable> -->

    <lable class="form-lable"><?php if(!empty(get_option( 'gmq_fare_label' ))){ echo get_option( 'gmq_fare_label' );}else {echo 'Total Fare : ';} ?>  <input id="totalFare" type="text" placeholder="Amount" name="totalFare" class="qouteAmount" required ></lable>
</div>
</div>
   </div>

</body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['qouteMailSubmit'])) {
 
    $startingAddressLabel=get_option( 'gmq_pickup_label' );
    $endingAddressLabel=get_option( 'gmq_drop_label' );
    $selectedTypeLabel=get_option( 'gmq_type_label' );
    $userDistanceLabel=get_option( 'gmq_user_distance_label' );
    $noOfItemsLabel=get_option( 'gmq_items_label' );
    $estimatedFairLabel=get_option( 'gmq_fare_label' );

    $startingAddress = (isset($startingAddressLabel) && (!empty($startingAddressLabel))) ? $startingAddressLabel:" Your Starting Address ";
    $endingAddress = (isset($endingAddressLabel) && (!empty($endingAddressLabel))) ? $endingAddressLabel:" Your Ending Address ";
    $selectedType = (isset($selectedTypeLabel) && (!empty($selectedTypeLabel))) ? $selectedTypeLabel:" Your Selected Type ";
    $userDistance = (isset($userDistanceLabel) && (!empty($userDistanceLabel))) ? $userDistanceLabel:" Your Given Distance ";
    $noOfItems = (isset($noOfItemsLabel) && (!empty($noOfItemsLabel))) ? $noOfItemsLabel:" Your Total no of Items ";
    $estimatedFair = (isset($estimatedFairLabel) && (!empty($estimatedFairLabel))) ? $estimatedFairLabel:" Your Total Estimated fare ";
          
    if(isset($_POST['qouteEmail']) )
    {
        $to = $_POST['qouteEmail'];
        $subject = get_option( 'gmq_email_subject' );
        $body = $startingAddress." : ". $_POST['pickupAddress'] ."\r\n".
        $endingAddress." : ". $_POST['dropAddress'] ."\r\n".
        $userDistance." : ". $_POST['userDistance']."\r\n".
        $selectedType." : ". $_COOKIE['type'] ."\r\n".
        $noOfItems ." : ". $_POST['noOfItems'] ."\r\n".
        $estimatedFair." : ". $_POST['mailFare']."\r\n";
        $headers = "From:".get_option( 'gmq_email_from' ) . "\r\n" .
        "CC:".get_option( 'gmq_copy_to' ). "\r\n" .
        "Bcc:".get_option( 'gmq_bcc_to' );
        $mail= wp_mail( $to, $subject, $body, $headers );
    ?>
      <script>
    $(document).ready(function() {
          if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
        $("#error-alert,#success-alert").fadeTo(4000, 500).slideUp(500, function(){
    $("#error-alert,#success-alert").slideUp(500);
});
});
    </script>
    <?php
    if($mail){
        		?>

    
   <div id="success-alert"  >
    <strong>Success!</strong> Mail sended successfully.
  </div>
  <?php
      //  echo 'Mail sended successfully.' ;
    }
    else{?>
         <div id="error-alert">
    <strong>Error!</strong> Mail not sended some error occured.
  </div>
  <?php
        //echo 'Mail not sended some error occured.' ;
    }
     
    }
   
  //  ob_end_clean();
}
?>