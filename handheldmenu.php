<?php
/**
 * Plugin Name: Hand Held Menu for WooCommerce
 * Plugin URI: https://www.closemarketing.es
 * Description: Creates a Hand Held Menu for WooCommerce.
 * Author: davidperez
 * Author URI: https://www.closemarketing.es/
 * Version: 0.1
 * Text Domain: handheldmenu
 * Domain Path: /languages
 * License: GNU General Public License version 3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package WordPress
 */

define( 'HANDHELDMENU_VERSION', '0.1' );

// * Loads translation
load_plugin_textdomain( 'handheldmenu', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

// * Includes Libraries for Closemarketing
require_once dirname( __FILE__ ) . '/includes/class-hhm-frontend.php';
