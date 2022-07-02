<?php
/**
 * Plugin Name:       CP Directory Proposal
 * Plugin URI:        https://mediauganda.com
 * Description:       CP Directory Proposal with REST API Endpoint for themes and plugins.
 * Author:            Laurence Bahiirwa
 * Author URI:        https://mediauganda.com
 * Text Domain:       cp_directory_proposal
 * Version:           1.0.0
 * Requires PHP:      5.6
 * Requires at least: 4.9
 * Domain Path:       /languages
 *
 * @package blockli
 */

defined( 'ABSPATH' ) or die( 'Unauthorized Access!' );

// Define constants.
if ( ! defined( 'CP_DIRECTORY_DIR_PATH' ) ) {
	define( 'CP_DIRECTORY_DIR_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
}

if ( ! defined( 'CP_DIRECTORY_DIR_URL' ) ) {
	define( 'CP_DIRECTORY_DIR_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}

if ( ! defined( 'CP_DIRECTORY_PLUGIN' ) ) {
	define( 'CP_DIRECTORY_PLUGIN', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'CP_DIRECTORY_SLUG' ) ) {
	define( 'CP_DIRECTORY_SLUG', 'cp-directory' );
}

if( ! function_exists( 'get_plugin_data' ) ){
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$plugin_data = get_plugin_data( __FILE__ );

if ( ! defined( 'CP_DIRECTORY_PLUGIN_VERSION' ) ) {
	define( 'CP_DIRECTORY_PLUGIN_VERSION', $plugin_data['Version'] );
}

// Load the classes required.
require_once CP_DIRECTORY_DIR_PATH . 'includes/class-cp-directory-loader.php';
