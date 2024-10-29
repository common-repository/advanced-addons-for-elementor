<?php
/**
 * Plugin Name: Advanced Addons for Elementor
 * Plugin URI: https://wordpress.org/plugins/advanced-addons-for-elementor/
 * Description: The most advanced collection of Elementor page builder widgets.
 * Version: 1.2.7
 * Author: Advanced Addons
 * Author URI: https://advancedaddons.com/elementor
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: advanced-addons-for-elementor
 * Domain Path: /languages
 *
 * @package Advanced_Addons
 */

    if( !function_exists('add_action') ) {
        die('Elementor not Installed'); // if Elementor not installed kill the page.
    }

    // Define absoulote path
    if( !defined( 'ABSPATH' ) ) exit; // No access of directly access

    define( 'AAE_VERSION', '1.1.2' );
    // Define file
    define('AAE_FILE', __FILE__);
    // Define url
    define('AAE_URL', plugins_url('/', __FILE__ ) );
    // Define path
    define('AAE_PATH', plugin_dir_path( __FILE__ ) );
    // Assets
    define( 'AAE_DIR_ASSETS', trailingslashit( AAE_URL . 'assets' ) );
     // Admin
     define( 'AAE_DIR_Admin', trailingslashit( AAE_URL . 'admin' ) );
    
    require AAE_PATH . 'base/base.php';

    // Class Register
    if (class_exists('Advanced_addons_For_Elementor')) {
        # code...
        $aae_for_elementor = new Advanced_addons_For_Elementor();
        $aae_for_elementor->aae_for_elementor_register();
        $aae_for_elementor->aae_for_elementor_widget_bundle();

    }
    
    // Activation
    register_activation_hook( __FILE__, array($aae_for_elementor, 'activate' ));

    // Deactivation
    register_deactivation_hook( __FILE__, array($aae_for_elementor, 'deactivate' ));
