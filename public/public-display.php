<?php
if ( ! defined( 'WPINC' ) ) { die; }

function yl_add_preloader_html() {
    $options = get_option( 'yl_settings' );
    $display_type = isset( $options['display_type'] ) ? $options['display_type'] : 'css_animation';
    ?>
    <div id="y-loader-preloader">
        <div class="yl-content">
            <?php
            switch ( $display_type ) {
                case 'image':
                    echo '<div class="yl-loader yl-image"></div>';
                    break;
                case 'text':
                    $text_content = isset( $options['text_content'] ) ? $options['text_content'] : 'Loading...';
                    echo '<div class="yl-loader yl-text">' . esc_html( $text_content ) . '</div>';
                    break;
                case 'css_animation':
                default:
                    $animation_type = isset( $options['css_animation_type'] ) ? $options['css_animation_type'] : 'spinner';
                    echo '<div class="yl-loader yl-css-' . esc_attr( $animation_type ) . '"></div>';
                    break;
            }
            ?>
        </div>
    </div>
    <?php
}
add_action( 'wp_footer', 'yl_add_preloader_html' );
