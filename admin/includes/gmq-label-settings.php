
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mainLabel = sanitize_text_field($_POST["mainLabel"]);
    $pickUpAddressLabel = sanitize_text_field($_POST["pickUpAddressLabel"]);
    $dropAddressLabel = sanitize_text_field($_POST["dropAddressLabel"]);
    $typeLabel = sanitize_text_field($_POST["typeLabel"]);
    $itemsLabel = sanitize_text_field($_POST["itemsLabel"]);
    $userDistanceLabel = sanitize_text_field($_POST["userDistanceLabel"]);
    $userEmailLabel = sanitize_text_field($_POST["userEmailLabel"]);
    $mailCheckboxLabel = sanitize_text_field($_POST["mailCheckboxLabel"]);
    $buttonLabel = sanitize_text_field($_POST["buttonLabel"]);
    $fareLabel = sanitize_text_field($_POST["fareLabel"]);
    update_option( 'gmq_main_label', $mainLabel ); 
    update_option( 'gmq_pickup_label', $pickUpAddressLabel ); 
    update_option( 'gmq_drop_label', $dropAddressLabel ); 
    update_option( 'gmq_type_label', $typeLabel ); 
    update_option( 'gmq_items_label', $itemsLabel ); 
    update_option( 'gmq_user_distance_label', $userDistanceLabel ); 
    update_option( 'gmq_user_email_label', $userEmailLabel ); 
    update_option( 'gmq_mail_checkbox_label', $mailCheckboxLabel ); 
    update_option( 'gmq_button_label', $buttonLabel ); 
    update_option( 'gmq_fare_label', $fareLabel ); 
    add_action( 'admin_notices', 'admin_notice__success' );
  }
  function admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success! Label setting saved', GMQ_TEXT_DOMAIN ); ?></p>
    </div>
    <?php
  }
  do_action( 'admin_notices' );
?>
 <nav class="nav-sections">
  <!-- Fields Section -->
  <label id="input_fields_labels" class="section-menu">Field labels</label>
  <!-- Button Section -->
  <label id="button_labels" class="section-menu">Buttons</label>
  <!-- Other Section -->
  <label id="other_labels" class="section-menu">Other</label>
  </nav>

 <p><h1>Label Settings</h1>Fill label fields if empty default set.</p>
<form action="" id="form-admin" method="POST" >
 
      <div class="section_00"> 
      <div class="row">
      <lable class="form-lable">Pick Up Address Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_pickup_label' );?>" id="pickUpAddressLabel" name="pickUpAddressLabel" class="style-font-size" placeholder="Enter Pickup Address Label" >
      </div>
      <div class="row">
      <lable class="form-lable">Drop Address Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_drop_label'); ?>" id="dropAddressLabel" class="style-font-size" name="dropAddressLabel" placeholder="Enter Pickup Address Label" >
      </div>
      <div class="row">
      <lable class="form-lable">Type Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_type_label'); ?>" id="typeLabel" class="style-font-size" name="typeLabel" placeholder="Enter Type Label" >
      </div>
      <div class="row">
      <lable class="form-lable">No of Items Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_items_label'); ?>" id="itemsLabel" class="style-font-size" name="itemsLabel" placeholder="Enter No of Items Label" >
      </div>
      <div class="row">
      <lable class="form-lable">User Distance Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_user_distance_label'); ?>" id="userDistanceLabel" class="style-font-size" name="userDistanceLabel" placeholder="Enter User Distance Label" >
      </div>
      <div class="row">
      <lable class="form-lable">User Email Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_user_email_label'); ?>" id="userEmailLabel" class="style-font-size" name="userEmailLabel" placeholder="Enter User Email Label" >
      </div>
      </div>
      <div class="section_11"> 
      <div class="row">
      <lable class="form-lable">Button label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_button_label'); ?>" id="buttonLabel" class="style-font-size" name="buttonLabel" placeholder="Enter Button Label" >
      </div>
      </div>
      <div class="section_22"> 
      <div class="row">
      <lable class="form-lable"><Label>Main Label As</Label></lable>
      <input type="text" value="<?php echo get_option( 'gmq_main_label' );?>" id="mainLabel" name="mainLabel" class="style-font-size"  placeholder="Main Label As" >
      </div>
      <div class="row">
      <lable class="form-lable">Mail Checkbox Label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_mail_checkbox_label'); ?>" id="mailCheckboxLabel" class="style-font-size" name="mailCheckboxLabel" placeholder="Enter Mail Checkbox Label" >
      </div>
      <div class="row">
      <lable class="form-lable">Total Fare label</lable>
      <input type="text" value="<?php echo get_option( 'gmq_fare_label'); ?>" id="fareLabel" class="style-font-size" name="fareLabel" placeholder="Enter Total Fare Label" >
      </div>
      </div>
      <div class="row">
        <input type="submit" class="button" name="submit" value="Save Settings" class="form-btn" >
  </div>
</form>



