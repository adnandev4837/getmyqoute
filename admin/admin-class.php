<?php

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

class getmyqoutes_admin_class {

    public function __construct() {
      add_action( 'admin_enqueue_scripts', array($this, 'plugin_enqueue_admin_scripts') );
    }

   /**
     * Enqueue the main Plugin admin scripts and styles
     * @method plugin_enqueue_scripts
     */
   function plugin_enqueue_admin_scripts($hook_suffix) {
       
    wp_register_style( 'wps-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin.css', array(), null );
    wp_deregister_script( 'wps-admin-script' );
     wp_register_script( 'wps-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin.js' ,false, NULL, true );
    //wp_enqueue_script( 'dropdown-script', '//ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', array('jquery'), false );
// echo "bvnm,bvcnm,bvbnvcnm,bm,uaoiuoiasudoiuasoduoasuid:".$hook_suffix;
     if ($hook_suffix == 'toplevel_page_getmyqoute_plugin' || $hook_suffix == 'get-my-qoute_page_label_settings' || $hook_suffix == 'get-my-qoute_page_map_settings' || $hook_suffix == 'get-my-qoute_page_dropdown_settings' || $hook_suffix == 'get-my-qoute_page_email_settings' || $hook_suffix == 'get-my-qoute_page_style_customization' || $hook_suffix == 'get-my-qoute_page_user_guide') {
            wp_deregister_script('jquery');
            wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', false, '3.6.3', true);
            wp_enqueue_script('jquery');
        }
     wp_register_script( 'wps-sections-script', plugin_dir_url(__FILE__) . 'assets/js/sections.js' ,false, NULL, true );
     
     wp_enqueue_script('wps-sections-script');

    wp_enqueue_script('wps-admin-script');
    wp_enqueue_style('wps-admin-style');
        wp_localize_script('wps-admin-script', 'en_admin_data', array(
            'dropdownOptions' => get_option('gmq_dropdown_options'),
            'distanceUnit' => get_option('gmq_distance_unit'),
            'plugins_file'=>plugin_dir_url(__FILE__),
            'version'=>'1.0.0'
        ));
     }

  
}
new getmyqoutes_admin_class;