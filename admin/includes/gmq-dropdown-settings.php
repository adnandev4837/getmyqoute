<?php 
$optionName = array();
$optionValue = array();
$optionRate = array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST["optionName"]) && isset($_POST["optionValue"]) && isset($_POST["optionRate"])) {
foreach ($_POST["optionName"] as $key=>$val) {$optionName[$key] = $val;}
foreach ($_POST["optionValue"] as $key=>$val) {$optionValue[$key] = $val;}
foreach ($_POST["optionRate"] as $key=>$val) {$optionRate[$key] = $val;}
$dropDownOptions = array(
        'optionName' => $optionName,
        'optionValue' => $optionValue,
        'optionRate' => $optionRate
    );
    update_option('gmq_dropdown_options', $dropDownOptions);
    add_action( 'admin_notices', 'admin_notice__success' );
 }}
 $dropdownOptions=get_option('gmq_dropdown_options');
 
 function admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Success! Dropdown setting saved', GMQ_TEXT_DOMAIN ); ?></p>
    </div>
    <?php
  }
  do_action( 'admin_notices' );
 ?>
<p><h1>Dropdown Settings</h1> Please provide option name and value for showing on front perfect and rate for the cost of that option..</p>
    <form name="add_name" id="add_name" action=""  method="POST">
        <div class="doropdown-row">  
            <table class="" id="dynamic_field">  
                <tr>    
                    <button type="button"  class="button" name="add" id="add" class="form-btn">Click to add option</button>
                </tr>  
            </table>  
            <input type="submit" id="option-save" class="button" name="submit" value="Save Settings" class="form-btn" >
        </div>
    </form>  