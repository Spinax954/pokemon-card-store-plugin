<?php
/**
 * Plugin Name: Pokémon Card Store Plugin
 * Description: Add Pokémon cards, sets, and sealed products to WooCommerce from PokémonTCG.io.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct access
}

// Define plugin path
define('PCSP_PATH', plugin_dir_path(__FILE__));

// Include core files
require_once PCSP_PATH . 'includes/api-handler.php';
require_once PCSP_PATH . 'includes/product-importer.php';
require_once PCSP_PATH . 'includes/settings.php';

// Activation Hook
function pcsp_activate() {
    // Future setup tasks
}
register_activation_hook(__FILE__, 'pcsp_activate');

// Admin Menu
function pcsp_add_admin_menu() {
    add_menu_page('Pokémon Card Store', 'Pokémon Cards', 'manage_options', 'pcsp-settings', 'pcsp_render_settings_page');
}
add_action('admin_menu', 'pcsp_add_admin_menu');

function pcsp_render_settings_page() {
    echo "<h1>Pokémon Card Store Plugin</h1>";
    echo "<p>Configure your settings here.</p>";
}
