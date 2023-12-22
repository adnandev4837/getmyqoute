<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST["mapApiKey"]))
  {
    $mapApiKey = sanitize_text_field($_POST["mapApiKey"]);
    update_option( 'gmq_map_api_key', $mapApiKey ); 
    add_action( 'admin_notices', 'admin_notice__success' );
  }
  if(isset($_POST["submit-delete"]))
  {
    delete_option( 'gmq_map_api_key');
  }
}
function admin_notice__success() {
  ?>
  <div class="notice notice-success is-dismissible">
      <p><?php _e( 'Success! Connection setting saved', GMQ_TEXT_DOMAIN ); ?></p>
  </div>
  <?php
}
do_action( 'admin_notices' );
?>

<p><h1>Connection Settings</h1> Please provide all connection details for perfect working.</p>
<form action="" id="form-admin" method="POST" >
  <div class="conn-row">
      <div class="col">
      <lable class="form-lable">Map Api Key</lable>
      <input type="text" value="<?php echo get_option( 'gmq_map_api_key' );?>" id="mapApiKey" name="mapApiKey" class="form-input connection-class" placeholder="Enter Map Api Key" required>
    
      </div>
      <span>Get Your MapBox Access Token <a href="https://account.mapbox.com/access-tokens/" target="_balnk">Here</a>.</span>
      <div class="col">
        <input type="submit" class="button" name="submit" value="Save Settings" class="form-btn" >
        <input type="submit" class="button" name="submit-delete" value="Delete Token" class="form-btn" >
       
  </div>
</form>



