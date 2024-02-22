<?php
/**
 * Plugin Name:     McoTests
 * Plugin URI:      
 * Description:     PLUGIN DESARROLLADO PARA PRUEBAS DE ARCOR EN CASA
 * Author:          Alvaro Albornoz
 * Author URI:      https://minimalart.co
 * Text Domain:     mco-test
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Mco_Test
 */

if (!defined('ABSPATH')) {
  exit;
}

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

define('MCO_TEST_VERSION', '1.0.0');
define('MCO_TEST_DIR', plugin_dir_path(__FILE__));
define('MCO_TEST_URI', plugin_dir_url(__FILE__));

function mco_test_load_plugin_textdomain()
{
    $text_domain = 'mco-test';
    $locale = apply_filters( 'plugin_locale', get_locale(), $text_domain );

    $original_language_file = dirname(__FILE__) . '/languages/'. $locale .'.mo';

    unload_textdomain($text_domain);
    load_textdomain($text_domain, $original_language_file );
}

add_action( 'plugins_loaded', 'mco_test_load_plugin_textdomain' );

require_once 'vendor/autoload.php';
require_once 'src/Commands/CreateWCOrder.php';

if (class_exists('Create_Order_WC_Command')) {
  if (class_exists('WP_CLI') && WP_CLI) {
    WP_CLI::log('Registrando el comando create_wc_order');
    WP_CLI::add_command('create_wc_order', "Create_Order_WC_Command");
  }
}
