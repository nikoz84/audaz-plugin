<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/nikoz84
 * @since             1.0.0
 * @package           Audaz_Construct
 *
 * @wordpress-plugin
 * Plugin Name:       Audaz Construct
 * Plugin URI:        https://github.com/nikoz84/audaz-plugin
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Nicolás Romero
 * Author URI:        https://github.com/nikoz84
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       audaz-construct
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AUDAZ_CONSTRUCT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-audaz-construct-activator.php
 */
function activate_audaz_construct() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-audaz-construct-activator.php';
	Audaz_Construct_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-audaz-construct-deactivator.php
 */
function deactivate_audaz_construct() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-audaz-construct-deactivator.php';
	Audaz_Construct_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_audaz_construct' );
register_deactivation_hook( __FILE__, 'deactivate_audaz_construct' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-audaz-construct.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_audaz_construct() {

	$plugin = new Audaz_Construct();
	$plugin->run();

}
run_audaz_construct();
