<?php
/**
 * Plugin Name: Smart Taxi Booking
 * Description: Taxi booking with Google Maps, WooCommerce & driver dispatch.
 * Version: 1.0.14
 * Author: Your Name
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */
if ( ! defined('ABSPATH') ) exit;

// Constants
define('STB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('STB_PLUGIN_URL', plugin_dir_url(__FILE__));

// Safe require helper
function stb_safe_require($rel){
    $p = STB_PLUGIN_DIR . ltrim($rel,'/');
    if ( file_exists($p) ){ require_once $p; return true; }
    add_action('admin_notices', function() use($rel){
        echo '<div class="notice notice-error"><p><b>Smart Taxi Booking:</b> Missing file: '.esc_html($rel).'</p></div>';
    });
    return false;
}

// DB
stb_safe_require('includes/class-db-tables.php');
if ( class_exists('STB_DB_Tables') ){
    register_activation_hook(__FILE__, ['STB_DB_Tables','create_tables']);
}

// Settings boot early
stb_safe_require('admin/class-settings-page.php');
$__stb_settings = class_exists('STB_Settings_Page') ? new STB_Settings_Page() : null;

// Admin menu
stb_safe_require('admin/class-admin-menu.php');
if ( class_exists('STB_Admin_Menu') ){
    new STB_Admin_Menu($__stb_settings);
}

// VEHICLES (CPT) + DRIVERS (UI)
stb_safe_require('admin/class-vehicle-manager.php');   // <-- NEW: enables Vehicles CPT + slabs UI
stb_safe_require('admin/class-driver-manager.php');    // <-- NEW: enables Drivers submenu UI

// Public & AJAX
stb_safe_require('public/class-shortcodes.php');
stb_safe_require('public/class-ajax-handler.php');

// Core logic
stb_safe_require('includes/class-fare-calculator.php'); // reads CPT slabs
stb_safe_require('includes/class-session-handler.php');
stb_safe_require('includes/class-woocommerce-hook.php');
stb_safe_require('includes/class-driver-assigner.php');
stb_safe_require('includes/class-sms-email.php');
stb_safe_require('includes/class-fees.php');
stb_safe_require('includes/class-flight-logic.php');

// Plugins list → Settings link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), function($links){
    $links[] = '<a href="'.esc_url(admin_url('admin.php?page=stb-settings')).'">'.esc_html__('Settings','smart-taxi-booking').'</a>';
    return $links;
});
