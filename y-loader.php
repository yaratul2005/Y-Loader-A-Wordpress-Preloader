<?php
/**
 * Plugin Name:       Y Loader
 * Plugin URI:        https://yaratul.com/
 * Description:       Adds a beautiful, customizable preloader to your entire WordPress site.
 * Version:           1.0.0
 * Author:            YA Ratul
 * Author URI:        https://yaratul.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       y-loader
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) { die; }

// Define plugin constants with new prefix
define( 'YL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'YL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

class Y_Loader {

    public function __construct() {
        $this->load_dependencies();
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles_scripts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles_scripts' ) );
    }

    private function load_dependencies() {
        require_once YL_PLUGIN_PATH . 'admin/admin-menu.php';
        require_once YL_PLUGIN_PATH . 'admin/settings-fields.php';
        require_once YL_PLUGIN_PATH . 'public/public-display.php';
    }

    public function enqueue_admin_styles_scripts( $hook ) {
        if ( 'settings_page_y-loader-settings' !== $hook ) { return; }
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( 'y-loader-admin-css', YL_PLUGIN_URL . 'admin/css/admin-style.css', array(), '1.0.0' );
        wp_enqueue_script( 'y-loader-admin-js', YL_PLUGIN_URL . 'admin/js/admin-script.js', array( 'jquery', 'wp-color-picker' ), '1.0.0', true );
    }

    public function enqueue_public_styles_scripts() {
        wp_enqueue_style( 'y-loader-public-css', YL_PLUGIN_URL . 'public/css/preloader.css', array(), '1.0.0' );
        wp_enqueue_script( 'y-loader-public-js', YL_PLUGIN_URL . 'public/js/preloader.js', array(), '1.0.0', true );
        $this->add_inline_styles();
    }
    
    private function add_inline_styles() {
        $options = get_option( 'yl_settings' );
        $bg_color = isset( $options['background_color'] ) ? sanitize_hex_color( $options['background_color'] ) : '#FFFFFF';
        $text_color = isset( $options['text_color'] ) ? sanitize_hex_color( $options['text_color'] ) : '#000000';
        $image_url = isset( $options['image_url'] ) ? esc_url( $options['image_url'] ) : '';
        $animation_color = isset( $options['animation_color'] ) ? sanitize_hex_color( $options['animation_color'] ) : '#0073aa';

        $custom_css = "
            #y-loader-preloader { background-color: {$bg_color}; }
            #y-loader-preloader .yl-text { color: {$text_color}; }
            .yl-css-spinner { border-left-color: {$animation_color}; }
            .yl-css-dots::before, .yl-css-dots::after { background-color: {$animation_color}; }
            .yl-css-pulse { background-color: {$animation_color}; }
        ";

        if (!empty($image_url)) {
            $custom_css .= "#y-loader-preloader .yl-image { background-image: url({$image_url}); }";
        }
        wp_add_inline_style( 'y-loader-public-css', $custom_css );
    }
}

new Y_Loader();

function yl_activate() {
    $default_options = array(
        'display_type' => 'css_animation',
        'css_animation_type' => 'spinner',
        'background_color' => '#FFFFFF',
        'text_content' => 'Loading...',
        'text_color' => '#000000',
        'image_url' => '',
        'animation_color' => '#0073aa'
    );
    if ( get_option( 'yl_settings' ) === false ) {
        add_option( 'yl_settings', $default_options );
    }
}
register_activation_hook( __FILE__, 'yl_activate' );
