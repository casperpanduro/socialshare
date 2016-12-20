<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://frankly.dk
 * @since             1.0.0
 * @package           Frankly_Social_Share
 *
 * @wordpress-plugin
 * Plugin Name:       Frankly Social+
 * Plugin URI:        http://frankly.dk
 * Description:       Frankly SocialShare is a privated owned plugin - only to be used by Frankly A/S and Frankly customers.
 * Version:           1.0.0
 * Author:            Frankly A/S
 * Author URI:        http://frankly.dk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       frankly-social-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-frankly-social-share-activator.php
 */
function activate_frankly_social_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-frankly-social-share-activator.php';
	Frankly_Social_Share_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-frankly-social-share-deactivator.php
 */
function deactivate_frankly_social_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-frankly-social-share-deactivator.php';
	Frankly_Social_Share_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_frankly_social_share' );
register_deactivation_hook( __FILE__, 'deactivate_frankly_social_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-frankly-social-share.php';



/** Step 2 (from text above). */
add_action( 'admin_menu', 'plugin_menu' );

/** Step 1. */
function plugin_menu() {
	add_menu_page( 'My Plugin Options', 'Frankly Social+', 'manage_options', 'options-page', 'plugin_options', 'dashicons-share' );
	add_action( 'admin_init', 'plugin_settings' );
}

/** Step 3. */
function plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	require plugin_dir_path( __FILE__ ) . 'admin/partials/frankly-social-share-admin-display.php';
	echo '</div>';
}

function plugin_settings() { // whitelist options
	
}

// Add Shortcode
function frankly_plugin_shortcode() {
	ob_start();
	$output = require plugin_dir_path( __FILE__ ) . 'public/partials/frankly-social-share-public-display.php';
	$output = ob_get_clean();
	return $output;
}
add_shortcode( 'frankly-social-plus', 'frankly_plugin_shortcode' );


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_frankly_social_share() {

	$plugin = new Frankly_Social_Share();
	$plugin->run();

}
run_frankly_social_share();
