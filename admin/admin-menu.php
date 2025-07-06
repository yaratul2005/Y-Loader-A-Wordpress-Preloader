<?php
if ( ! defined( 'WPINC' ) ) { die; }

function yl_add_admin_menu() {
    add_options_page(
        __( 'Y Loader Settings', 'y-loader' ),
        __( 'Y Loader', 'y-loader' ),
        'manage_options',
        'y-loader-settings',
        'yl_settings_page_html'
    );
}
add_action( 'admin_menu', 'yl_add_admin_menu' );

function yl_settings_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) { return; }
    ?>
    <div class="wrap yl-settings-wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'yl_settings_group' );
            do_settings_sections( 'y-loader-settings' );
            submit_button( __( 'Save Settings', 'y-loader' ) );
            ?>
        </form>
    </div>
    <?php
}
