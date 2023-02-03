<?php
/**
 * Plugin Name:       Business Directory Post Types and Taxonomies
 * Plugin URI:        http://github.com/jcasabona/lil-post-types/
 * Description:       A simple plugin for creating custom post types and taxonomies related to a business directory.
 * Version:           1.0.0
 * Author:            Joe Casabona
 * Author URI:        https:/casabona.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lil-post-types
 * Domain Path:       /languages
 */

 if ( ! defined('WPINC')) {
    die;
 }

define( 'LIL_VERSION', '1.0.0' );
define( 'LILDOMAIN', 'lil-post-types' );
define( 'LILPATH', plugin_dir_path( __FILE__ ) );

require_once(LILPATH . '/post-types/register.php');
add_action('init', 'lil_register_business_type');
add_action('init', 'lil_register_event_type');

require_once(LILPATH . '/taxonomies/register.php');
add_action('init', 'lil_register_size_taxonomy');
add_action('init', 'lil_register_location_taxonomy');

register_activation_hook( __FILE__, 'lil_rewrite_flush' );
function lil_rewrite_flush() {
   lil_register_business_type();
    flush_rewrite_rules();
}

