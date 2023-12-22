
<?php
 //require_once('./admin-class.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    foreach ($_POST["unit"] as $key=>$val) 
    {
      update_option( 'gmq_distance_unit', $val ); 
    }
   
    $distanceRate = sanitize_text_field($_POST["distanceRate"]);
    update_option( 'gmq_distance_rate', $distanceRate ); 

    add_action( 'admin_notices', 'admin_notice_success' ); 
    do_action( 'admin_notices' );
  }

  function admin_notice_success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success! Map setting saved', GMQ_TEXT_DOMAIN ); ?></p>
    </div>
    <?php
  }
 
?>
<p><h1>Map Settings</h1> Enter correct rate for perfect calculation.</p>

<form action="" id="form-admin" method="POST" >
 
      <div class="row">
      <lable class="form-lable">Distance Rate</lable>
      <input type="text" value="<?php echo get_option( 'gmq_distance_rate'); ?>" id="distanceRate" class="style-font-size numberOnly" name="distanceRate" placeholder="Enter Rate" required>
      </div>
      <div class="row">
      <lable class="form-lable">Distance Unit</lable>
      <select name="unit[]" id="unit" class="style-font-size"  required>
      <option value="" disabled selected>Choose Unit</option>
      <option value="kilometer">Kilometer</option>
      <option value="meter">Meter</option>
      <option value="mile">Mile</option>
      </select>
      </div>
      <div class="row">
        <input type="submit" class="button" name="submit" value="Save Settings" class="form-btn" >
       
  </div>
</form>



