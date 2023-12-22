<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $emailFrom = sanitize_text_field($_POST["emailFrom"]);
    $copyTo = sanitize_text_field($_POST["copyTo"]);
    $bccTo = sanitize_text_field($_POST["bccTo"]);
    $emailSubject = sanitize_text_field($_POST["emailSubject"]);
    update_option( 'gmq_email_from', $emailFrom ); 
    update_option( 'gmq_copy_to', $copyTo ); 
    update_option( 'gmq_bcc_to', $bccTo ); 
    update_option( 'gmq_email_subject', $emailSubject ); 

    add_action( 'admin_notices', 'admin_notice__success' );  
  }
  function admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success! Email setting saved', GMQ_TEXT_DOMAIN ); ?></p>
    </div>
    <?php
  }
  do_action( 'admin_notices' );
?>
<p><h1>Email Settings</h1>Set email setting with correct details.</p>
<form action="" id="form-admin" method="POST" >
      
      <div class="email-row">
      <div class="color-column">
      <lable class="form-lable">Email From</lable>
      <input type="email" id="emailFrom" name="emailFrom" class="style-font-size" placeholder="Email From" value="<?php if(!empty(get_option( 'gmq_email_from' ))){ echo get_option( 'gmq_email_from' );}else {echo 'example@gmail.com';} ?>" required>
      </div>
      <div class="color-column">
      <lable class="form-lable">Copy to (CC)</lable>
      <input type="email" id="copyTo" name="copyTo" class="style-font-size" placeholder="CC" value="<?php if(!empty(get_option( 'gmq_copy_to' ))){ echo get_option( 'gmq_copy_to' );}else {echo 'example@gmail.com';} ?>" required>
      </div>
      <div class="color-column">
      <lable class="form-lable">Bcc to</lable>
      <input type="email" id="bccTo" name="bccTo" class="style-font-size" placeholder="BCC" value="<?php if(!empty(get_option( 'gmq_bcc_to' ))){ echo get_option( 'gmq_bcc_to' );}else {echo 'example@gmail.com';} ?>" required>
      </div>
      <div class="color-column">
      <lable class="form-lable">Subject</lable>
      <input type="text" id="emailSubject" name="emailSubject" class="style-font-size" placeholder="Subject" value="<?php if(!empty(get_option( 'gmq_email_subject' ))){ echo get_option( 'gmq_email_subject' );}else {echo 'This Is Your Estimated Qoute';} ?>" required>
      </div>
    </div>

      <div class="row">
        <input type="submit" class="button" name="submit" value="Save Settings" class="form-btn" >
       
  </div>
</form>



