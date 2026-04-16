<?php
/**
 * Plugin Name: QPH Single Builder for MEC
 * Plugin URI: https://quepasahoy.com.co
 * Description: Usa Elementor para diseñar eventos de MEC.
 * Version: 1.0.0
 * Author: QuePasaHoy
 * Author URI: https://quepasahoy.com.co
 * Text Domain: qph-single-builder
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPL v2 or later
 */

if (!defined('ABSPATH')) exit;

define('QPH_MEC_PATH', plugin_dir_path(__FILE__));
define('QPH_MEC_URL', plugin_dir_url(__FILE__));
define('QPH_MEC_VERSION', '1.0.0');

require_once QPH_MEC_PATH . 'inc/core/class-loader.php';
require_once QPH_MEC_PATH . 'inc/core/class-activator.php';
require_once QPH_MEC_PATH . 'inc/core/class-deactivator.php';

// Activación
// register_activation_hook(__FILE__, array('QPH_MEC_Activator', 'activate'));
// register_deactivation_hook(__FILE__, array('QPH_MEC_Deactivator', 'deactivate'));

// Init
function qph_mec_init() {
    $loader = new QPH_MEC_Loader();
    $loader->run();
    
    error_log('🔥 PLUGIN INIT');
}
add_action('plugins_loaded', 'qph_mec_init');