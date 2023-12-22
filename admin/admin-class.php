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
   function plugin_enqueue_admin_scripts() {
       
    wp_register_style( 'wps-admin-style', plugin_dir_url(__FILE__) . 'assets/css/admin.css', array(), null );
    wp_deregister_script( 'wps-admin-script' );
     wp_register_script( 'wps-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin.js' ,false, NULL, true );
    wp_enqueue_script( 'dropdown-script', '//ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js', array('jquery'), false );

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