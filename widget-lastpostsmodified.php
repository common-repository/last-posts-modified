<?php
/**
 * Plugin Name:  Last posts modified 
 * Plugin URI:   https://free-tools.fr/code/plugin-wordpress-liste-des-articles-mis-a-jour-7444/
 * Description:  Display the list of the last modified posts.
 * Version:      3.6
 * Author:       Free Tools
 * Author URI:   https://free-tools.fr/
 * Author Email: contact@free-tools.fr
 * Text Domain:  last-posts-modified
 * Domain Path:  /languages
 * License:      GPLv2
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


if (!class_exists('Last_Posts_Modified')) {

    class Last_Posts_Modified {
        /**
         * PHP5 constructor method.
         */
        public function __construct() {

            // Set the constants needed by the plugin.
            add_action('plugins_loaded', array(&$this, 'constants'), 1);

            // Internationalize the text strings used.
            add_action('plugins_loaded', array(&$this, 'i18n'), 2);

            // Load the functions files.
            add_action('plugins_loaded', array(&$this, 'includes'), 3);

            // Register widget.
            add_action('widgets_init', array(&$this, 'register_widget'));

            // Loads frontend style.
            add_action('wp_enqueue_scripts', array(&$this, 'frontend_scripts'));

        }

        /**
         * Defines constants used by the plugin.
         */
        public function constants() {

            // Set constant path to the plugin directory.
            define('LMP_DIR', trailingslashit(plugin_dir_path(__FILE__)));

            // Set the constant path to the plugin directory URI.
            define('LMP_URI', trailingslashit(plugin_dir_url(__FILE__)));

            // Set the constant path to the includes directory.
            define('LMP_INCLUDES', LMP_DIR . trailingslashit('includes'));

            // Set the constant path to the assets directory.
            define('LMP_ASSETS', LMP_URI . trailingslashit('assets'));

            // Set Custom Thumbnail size
            add_image_size( 'my-custom-size', 100, 100, true );

            //Set the default Thumbnail
            define('urlDefaultThumbnail', trailingslashit(LMP_ASSETS) . 'image/thumbnail.png');
            
        }

        /**
         * Loads the translation files.
         */
        public function i18n() {
            load_plugin_textdomain('last-posts-modified', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }

        /**
         * Loads the initial files needed by the plugin.
         */
        public function includes() {
            require_once(LMP_INCLUDES . 'functions.php');
            require_once(LMP_INCLUDES . 'widget.php');
        }

        /**
         * Register the widget.
         */
        public function register_widget() {
            register_widget( 'Last_Posts_Modified_widget' );
        }

        /**
         * Loads frontend style.
         */
        public function frontend_scripts() {
            wp_enqueue_style('styleLMP', trailingslashit(LMP_ASSETS) . 'css/styleLMP.css');
        }
    }
}

new Last_Posts_Modified;
