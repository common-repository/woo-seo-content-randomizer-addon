<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://intellasoftplugins.com
 * @since             1.0.0
 * @package           ISSWSCR
 *
 * @wordpress-plugin
 * Plugin Name:       IntellaSoft SEO WooCommerce Content Randomizer Addon
 * Plugin URI:        https://intellasoftplugins.com
 * Description:       The official IntellaSoft Solutions WooCommerce SEO Content Randomizer Addon.
 * Version:           1.2.5
 * Author:            IntellaSoft Solutions
 * Author URI:        https://intellasoftplugins.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       isswscr
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Freemius SDK access.
 */
require_once plugin_dir_path( __FILE__ ) . 'freemius.php';
require_once plugin_dir_path( __FILE__ ) . 'freemius-addon.php';

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ISSWSCR_VERSION', '1.2.5' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-isswscr-activator.php
 */
function activate_isswscr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-isswscr-activator.php';
	ISSWSCR_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-isswscr-deactivator.php
 */
function deactivate_isswscr() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-isswscr-deactivator.php';
	ISSWSCR_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_isswscr' );
register_deactivation_hook( __FILE__, 'deactivate_isswscr' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-isswscr.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_isswscr() {

	$plugin = new ISSWSCR();
	$plugin->run();

}
run_isswscr();
