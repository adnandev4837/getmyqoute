<?php

/**
 * @package           Getmyqoute
 * @author            Muhammad Adnan
 * @copyright         2022 Coreword
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Get my Qoute
 * Description:       Get qotation with mapboxdistance API's and also you can customize your fields with mapbox.Use Shortcode <code>[getqoute]</code>
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Muhammad Adnan
 * Text Domain:       getmyqoute
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */
/*
Getmyqoute is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Getmyqoute is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// Block direct access to file
defined( 'ABSPATH' ) or die( 'Not Authorized!' );

// Plugin Defines
define( "GMQ_FILE", __FILE__ );
define( "GMQ_DIRECTORY", dirname(__FILE__) );
define( "GMQ_TEXT_DOMAIN", dirname(__FILE__) );
define( "GMQ_DIRECTORY_BASENAME", plugin_basename( GMQ_FILE ) );
define( "GMQ_DIRECTORY_PATH", plugin_dir_path( GMQ_FILE ) );
define( "GMQ_DIRECTORY_URL", plugins_url( null, GMQ_FILE ) );
//api key
define( "GMQ_API_KEY", get_option( 'gmq_map_api_key' ));
// Require the tabs class file
require_once( GMQ_DIRECTORY_PATH . '/tabs-class.php' );

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
function add_action_links ( $links ) {
	$mylinks = array(
		'<a href="' . admin_url( 'admin.php?page=getmyqoute_plugin' ) . '">Settings</a>',
		'<a href="' . admin_url( 'admin.php?page=user_guide' ) . '">Support</a>',
	);
 
	return array_merge( $links, $mylinks );
}