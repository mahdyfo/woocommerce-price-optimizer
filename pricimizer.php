<?php
/*
 * Plugin Name:       Pricimizer
 * Plugin URI:        https://pricimizer.com
 * Description:       Revolutionize your pricing strategy with this game changing dynamic pricing plugin for maximum profitability
 * Version:           1.1.0
 * Author:            Pricimizer
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pricimizer-woocommerce
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('PRICIMIZER_URL', plugin_dir_url(__FILE__));
define('PRICIMIZER_PATH', plugin_dir_path(__FILE__));
define('PRICIMIZER_PLUGIN', plugin_basename(__FILE__));
define('PRICIMIZER_VERSION', 1);
define('PRICIMIZER_PLUGIN_NAME', 'Pricimizer');

require_once 'includes/Pricimizer_Helper.php';
require_once 'includes/Pricimizer_Cache.php';
require_once 'includes/Pricimizer.php';
new Pricimizer();

register_activation_hook(__FILE__, 'pricimizer_install');
function pricimizer_install() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'pricimizer_price_sessions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
             id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
             product_id BIGINT UNSIGNED NOT NULL,
             user_id BIGINT UNSIGNED NULL,
             ip VARCHAR(150) NULL,
             price VARCHAR(150) NOT NULL,
             created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
             PRIMARY KEY  (id),
             UNIQUE KEY user_id_ip_product (ip, user_id, product_id)
        ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}