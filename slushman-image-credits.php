<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://www.slushman.com
 * @since             1.0.0
 * @package           ImageCredits
 *
 * @wordpress-plugin
 * Plugin Name:       		Slushman Image Credits
 * Plugin URI:        		https://www.github.com/slushman/slushman-image-credits
 * Description:       		Adds image credit fields to photos and adds those fields to the REST API.
 * Version:           		1.0.0
 * Author:            		slushman
 * Author URI:        		https://www.slushman.com
 * GitHub Plugin URI: 		https://github.com/slushman/slushman-image-credits/
 * Github Branch: 			master
 * License:           		GPL-2.0+
 * License URI:       		http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       		slushman-image-credits
 * Domain Path:       		/languages
 */

use ImageCredits\Includes as Inc;
use ImageCredits\Admin as Admin;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) { die; }

/**
 * Set plugin constants.
 */
define( 'IMAGE_CREDITS_VERSION', '1.0.0' );

/**
 * Include the autoloader.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/class-autoloader.php';

/**
 * Activation and Deactivation Hooks.
 */
register_activation_hook( __FILE__, array( 'ImageCredits\Includes\Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ImageCredits\Includes\Deactivator', 'deactivate' ) );

/**
 * Initializes each class and adds the hooks action in each to init.
 */
function image_credits_init() {

	$classes[] = new Inc\i18n();
	$classes[] = new Admin\Image_Meta();
	$classes[] = new Inc\Rest_Fields();

	foreach ( $classes as $class ) {

		add_action( 'init', array( $class, 'hooks' ) );

	}

} // image_credits_init()

add_action( 'plugins_loaded', 'image_credits_init' );