<?php
/**
 *
 * @link              http://velismichel.com
 * @since             1.0.0
 * @package           page_Switcher
 *
 * @wordpress-plugin
 * Plugin Name:       Page Switcher
 * Plugin URI:        http://velismichel.com/Page-Switcher.zip
 * Description:       Easily change or switch the current page to another pages from the wordpress editor.
 * Version:           1.0.0
 * Author:            Michel Velis
 * Author URI:        http://velismichel.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       page-switcher
 */

define('PageSwitcher_CON', TRUE);

function ps_admin_styles() {
    wp_enqueue_style('select2-css', plugins_url('assets/css/select2.min.css', __FILE__));
    wp_enqueue_style('switcher-css', plugins_url('assets/css/page-switcher.css', __FILE__));
    wp_enqueue_script('select2-js', plugins_url('page-switcher/assets/js/select2.min.js', true, true, true));
}


include( plugin_dir_path( __FILE__ ) . 'admin/widgets.php');
include( plugin_dir_path( __FILE__ ) . 'admin/get_pages.php');
include( plugin_dir_path( __FILE__ ) . 'admin/get_post.php');


add_action('admin_enqueue_scripts', 'ps_admin_styles');
add_action( 'add_meta_boxes', 'page_switcher_func' );
add_action( 'add_meta_boxes', 'post_switcher_func' );

