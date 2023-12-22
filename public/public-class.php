<?php

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

class getmyqoutes_public_class {

    public function __construct() {
     add_shortcode( 'getqoute', array($this,'getmyqoute_details') );
    }

/**
     * Enqueue the main Plugin admin scripts and styles
     * @method getqoute shortcode
     */
function getmyqoute_details( $atts ){
   wp_enqueue_script( 'getqoutejs', plugin_dir_url(__FILE__) . 'assets/js/map.js');
   wp_enqueue_script( 'getmailjs', plugin_dir_url(__FILE__) . 'assets/js/mail.js');
   wp_enqueue_style( 'getqoutecss', plugin_dir_url(__FILE__) . 'assets/css/public.css' );

   wp_enqueue_style('getqoutecss');
   
   wp_enqueue_script('jquery');
   wp_enqueue_script('wps-admin-script');
   wp_localize_script('getqoutejs', 'en_public_data', array(
    'pluginsUrl' => plugins_url(),
    'plugins_file'=>plugin_dir_url(__FILE__),
    'map_api_key' =>GMQ_API_KEY,
    'dropdownOptions' => get_option('gmq_dropdown_options'),
    'distanceUnit' => get_option('gmq_distance_unit'),
    'distanceRate'=> get_option( 'gmq_distance_rate')
));
  require_once( GMQ_DIRECTORY_PATH . '/public/includes/qoute-settings.php' );
    }
}
new getmyqoutes_public_class;