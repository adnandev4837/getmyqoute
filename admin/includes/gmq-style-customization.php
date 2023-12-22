<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
  
    //update fields styling
    $fieldsColor = sanitize_text_field($_POST["fieldsColor"]);
    $fieldsFontSize = sanitize_text_field($_POST["fieldsFontSize"]);
    update_option( 'gmq_fields_color', $fieldsColor ); 
    update_option( 'gmq_fields_font_size', $fieldsFontSize ); 
    
    //update label styling 
    $labelColor = sanitize_text_field($_POST["labelColor"]);
    $mainLabelFontSize = sanitize_text_field($_POST["mainLabelFontSize"]);
    $subLabelFontSize = sanitize_text_field($_POST["subLabelFontSize"]);
    update_option( 'gmq_label_color', $labelColor ); 
    update_option( 'gmq_main_label_font_size', $mainLabelFontSize ); 
    update_option( 'gmq_sub_label_font_size', $subLabelFontSize ); 

    //update button styling
    $buttonColor = sanitize_text_field($_POST["buttonColor"]);
    $buttonHoverColor = sanitize_text_field($_POST["buttonHoverColor"]);
    $buttonFontSize = sanitize_text_field($_POST["buttonFontSize"]);
    update_option( 'gmq_button_color', $buttonColor ); 
    update_option( 'gmq_button_hover_color', $buttonHoverColor ); 
    update_option( 'gmq_button_font_size', $buttonFontSize ); 

    //other styling
    $styleMarginTop = sanitize_text_field($_POST["styleMarginTop"]);
    $styleMarginRight = sanitize_text_field($_POST["styleMarginRight"]);
    $styleMarginBottom = sanitize_text_field($_POST["styleMarginBottom"]);
    $styleMarginLeft = sanitize_text_field($_POST["styleMarginLeft"]);
    update_option( 'gmq_container_margin_top', $styleMarginTop ); 
    update_option( 'gmq_container_margin_right', $styleMarginRight ); 
    update_option( 'gmq_container_margin_bottom', $styleMarginBottom);
    update_option( 'gmq_container_margin_left', $styleMarginLeft);

    add_action( 'admin_notices', 'admin_notice__success' );  
  }
  function admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success! Style setting saved', GMQ_TEXT_DOMAIN ); ?></p>
    </div>
    <?php
  }
  do_action( 'admin_notices' );
?>

 <nav class="nav-sections">
  <!-- Input Fields styling Section -->
  <label id="input_fields_styling" class="section-menu">Input Fields</label>
  <!-- Label styling Section -->
  <label id="label_styling" class="section-menu">Labels</label>
  <!-- Button styling Section -->
  <label id="button_styling" class="section-menu">Buttons</label>
  <!-- Other styling Section -->
  <label id="other_styling" class="section-menu">Other</label>
  </nav>

  <!-- <h3>Style Customization</h3> -->
<p><h1>Style Customization</h1> Enter values to customize your style.</p>
<form action="" id="form-admin" method="POST" >
      
      <div class="section_0">
      <!-- <h4>Input Fields Styling</h4> -->
      <div class="color-column">
      <lable class="form-lable">Input Fields Color</lable>
      <input type="color" id="fieldsColor" name="fieldsColor" class="style-color" value="<?php if(!empty(get_option( 'gmq_fields_color' ))){ echo get_option( 'gmq_fields_color' );}else {echo '#F7941D';} ?>">
      </div>
      <div class="color-column">
      <lable class="form-lable">Input Fields Font Size(in rem)</lable>
      <input type="text" id="fieldsFontSize" name="fieldsFontSize" class="style-font-size" placeholder="in rem" value="<?php if(!empty(get_option( 'gmq_fields_font_size' ))){ echo get_option( 'gmq_fields_font_size' );}else {echo '0.8rem';} ?>">
      </div>
      </div>

      <div class="section_1">
      <!-- <h4>Label Styling</h4> -->
      <div class="color-column">
      <lable class="form-lable">Label Color</lable>
      <input type="color" id="labelColor" name="labelColor" class="style-color" value="<?php if(!empty(get_option( 'gmq_label_color' ))){ echo get_option( 'gmq_label_color' );}else {echo '#F7941D';} ?>">
      </div>
      <div class="color-column">
      <lable class="form-lable">Main Label Font Size(in rem)</lable>
      <input type="text" id="mainLabelFontSize" name="mainLabelFontSize" class="style-font-size" placeholder="in rem" value="<?php if(!empty(get_option( 'gmq_main_label_font_size' ))){ echo get_option( 'gmq_main_label_font_size' );}else {echo '2.4rem';} ?>">
      </div>
      <div class="color-column">
      <lable class="form-lable">Sub Label Font Size(in rem)</lable>
      <input type="text" id="subLabelFontSize" name="subLabelFontSize" class="style-font-size" placeholder="in rem" value="<?php if(!empty(get_option( 'gmq_sub_label_font_size' ))){ echo get_option( 'gmq_sub_label_font_size' );}else {echo '0.9rem';} ?>">
      </div>
      </div>

      <div class="section_2">
      <!-- <h4>Button Styling</h4> -->
      <div class="color-column">
      <lable class="form-lable">Button Color</lable>
      <input type="color" id="buttonColor" name="buttonColor" class="style-color" value="<?php if(!empty(get_option( 'gmq_button_color' ))){ echo get_option( 'gmq_button_color' );}else {echo '#F7941D';} ?>">
      </div>
      <div class="color-column">
      <lable class="form-lable">Button Hover Color</lable>
      <input type="color" id="buttonHoverColor" name="buttonHoverColor" class="style-color" value="<?php if(!empty(get_option( 'gmq_button_hover_color' ))){ echo get_option( 'gmq_button_hover_color' );}else {echo '#F7941D';} ?>">
      </div>
      <div class="color-column">
      <lable class="form-lable">Button Font Size(in rem)</lable>
      <input type="text" id="buttonFontSize" name="buttonFontSize" class="style-font-size" placeholder="in rem" value="<?php if(!empty(get_option( 'gmq_button_font_size' ))){ echo get_option( 'gmq_button_font_size' );}else {echo '0.9rem';} ?>">
      </div>
      </div>

      <div class="section_3">
      <!-- <h4>Other Styling</h4> -->
      <div class="color-column">
      <lable class="form-lable">Container Margin (T-R-B-L) </lable>
      <input type="text" id="styleMarginTop" name="styleMarginTop" class="style-margin" placeholder="in vw" value="<?php if(!empty(get_option( 'gmq_container_margin_top' ))){ echo get_option( 'gmq_container_margin_top' );}else {echo '0';} ?>">
      <input type="text" id="styleMarginRight" name="styleMarginRight" class="style-margin" placeholder="in vw" value="<?php if(!empty(get_option( 'gmq_container_margin_right' ))){ echo get_option( 'gmq_container_margin_right' );}else {echo '0';} ?>">
      <input type="text" id="styleMarginBottom" name="styleMarginBottom" class="style-margin" placeholder="in vw" value="<?php if(!empty(get_option( 'gmq_container_margin_bottom' ))){ echo get_option( 'gmq_container_margin_bottom' );}else {echo '0';} ?>">
      <input type="text" id="styleMarginLeft" name="styleMarginLeft" class="style-margin" placeholder="in vw" value="<?php if(!empty(get_option( 'gmq_container_margin_left' ))){ echo get_option( 'gmq_container_margin_left' );}else {echo '0';} ?>">
      </div>
      </div>
      <div class="row">
        <input type="submit" class="button" name="submit" value="Save Settings" class="form-btn" >
       </div>
</form>



