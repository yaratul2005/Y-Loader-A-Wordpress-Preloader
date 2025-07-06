<?php
if ( ! defined( 'WPINC' ) ) { die; }

function yl_settings_init() {
    register_setting( 'yl_settings_group', 'yl_settings', 'yl_sanitize_settings' );
    add_settings_section( 'yl_settings_section', __( 'Preloader Configuration', 'y-loader' ), null, 'y-loader-settings' );
    add_settings_field( 'yl_field_display_type', __( 'Preloader Type', 'y-loader' ), 'yl_field_display_type_render', 'y-loader-settings', 'yl_settings_section' );
    add_settings_field( 'yl_field_css_animation', __( 'Animation Style', 'y-loader' ), 'yl_field_css_animation_render', 'y-loader-settings', 'yl_settings_section', ['class' => 'yl-conditional-row yl-row-for-css_animation'] );
    add_settings_field( 'yl_field_animation_color', __( 'Animation Color', 'y-loader' ), 'yl_field_animation_color_render', 'y-loader-settings', 'yl_settings_section', ['class' => 'yl-conditional-row yl-row-for-css_animation'] );
    add_settings_field( 'yl_field_image', __( 'Custom Image', 'y-loader' ), 'yl_field_image_render', 'y-loader-settings', 'yl_settings_section', ['class' => 'yl-conditional-row yl-row-for-image'] );
    add_settings_field( 'yl_field_text', __( 'Custom Text', 'y-loader' ), 'yl_field_text_render', 'y-loader-settings', 'yl_settings_section', ['class' => 'yl-conditional-row yl-row-for-text'] );
    add_settings_field( 'yl_field_text_color', __( 'Text Color', 'y-loader' ), 'yl_field_text_color_render', 'y-loader-settings', 'yl_settings_section', ['class' => 'yl-conditional-row yl-row-for-text'] );
    add_settings_field( 'yl_field_bg_color', __( 'Background Color', 'y-loader' ), 'yl_field_bg_color_render', 'y-loader-settings', 'yl_settings_section' );
}
add_action( 'admin_init', 'yl_settings_init' );

function yl_sanitize_settings( $input ) {
    $sanitized_input = [];
    $sanitized_input['display_type'] = isset( $input['display_type'] ) ? sanitize_text_field( $input['display_type'] ) : 'css_animation';
    $sanitized_input['css_animation_type'] = isset( $input['css_animation_type'] ) ? sanitize_text_field( $input['css_animation_type'] ) : 'spinner';
    $sanitized_input['image_url'] = isset( $input['image_url'] ) ? esc_url_raw( $input['image_url'] ) : '';
    $sanitized_input['text_content'] = isset( $input['text_content'] ) ? sanitize_textarea_field( $input['text_content'] ) : 'Loading...';
    $sanitized_input['background_color'] = isset( $input['background_color'] ) ? sanitize_hex_color( $input['background_color'] ) : '#FFFFFF';
    $sanitized_input['text_color'] = isset( $input['text_color'] ) ? sanitize_hex_color( $input['text_color'] ) : '#000000';
    $sanitized_input['animation_color'] = isset( $input['animation_color'] ) ? sanitize_hex_color( $input['animation_color'] ) : '#0073aa';
    return $sanitized_input;
}

function yl_field_display_type_render() {
    $options = get_option( 'yl_settings' );
    ?>
    <select name="yl_settings[display_type]" id="yl_display_type">
        <option value="css_animation" <?php selected( $options['display_type'], 'css_animation' ); ?>>CSS Animation</option>
        <option value="image" <?php selected( $options['display_type'], 'image' ); ?>>Custom Image</option>
        <option value="text" <?php selected( $options['display_type'], 'text' ); ?>>Custom Text</option>
    </select>
    <p class="description">Select the type of preloader you want to display.</p>
    <?php
}

function yl_field_css_animation_render() {
    $options = get_option( 'yl_settings' );
    ?>
    <select name="yl_settings[css_animation_type]">
        <option value="spinner" <?php selected( $options['css_animation_type'], 'spinner' ); ?>>Spinner</option>
        <option value="dots" <?php selected( $options['css_animation_type'], 'dots' ); ?>>Bouncing Dots</option>
        <option value="pulse" <?php selected( $options['css_animation_type'], 'pulse' ); ?>>Pulse</option>
    </select>
    <?php
}

function yl_field_animation_color_render() {
    $options = get_option( 'yl_settings' );
    $color = isset($options['animation_color']) ? $options['animation_color'] : '#0073aa';
    ?>
    <input type="text" name="yl_settings[animation_color]" value="<?php echo esc_attr( $color ); ?>" class="yl-color-picker">
    <?php
}

function yl_field_image_render() {
    $options = get_option( 'yl_settings' );
    $image_url = isset( $options['image_url'] ) ? $options['image_url'] : '';
    ?>
    <input type="text" name="yl_settings[image_url]" id="yl_image_url" value="<?php echo esc_url( $image_url ); ?>" class="regular-text">
    <button type="button" class="button" id="yl_upload_image_button">Upload Image</button>
    <div class="yl-image-preview-wrapper">
        <img id="yl_image_preview" src="<?php echo esc_url( $image_url ); ?>" style="<?php echo empty($image_url) ? 'display:none;' : ''; ?>">
    </div>
    <?php
}

function yl_field_text_render() {
    $options = get_option( 'yl_settings' );
    ?>
    <input type="text" name="yl_settings[text_content]" value="<?php echo esc_attr( $options['text_content'] ); ?>" class="regular-text">
    <?php
}

function yl_field_text_color_render() {
    $options = get_option( 'yl_settings' );
    ?>
    <input type="text" name="yl_settings[text_color]" value="<?php echo esc_attr( $options['text_color'] ); ?>" class="yl-color-picker">
    <?php
}

function yl_field_bg_color_render() {
    $options = get_option( 'yl_settings' );
    ?>
    <input type="text" name="yl_settings[background_color]" value="<?php echo esc_attr( $options['background_color'] ); ?>" class="yl-color-picker">
    <?php
}
