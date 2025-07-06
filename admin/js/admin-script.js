jQuery(document).ready(function($) {
    'use strict';

    $('.yl-color-picker').wpColorPicker();

    let mediaUploader;
    $('#yl_upload_image_button').on('click', function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media({
            title: 'Choose Preloader Image',
            button: { text: 'Choose Image' },
            multiple: false
        });
        mediaUploader.on('select', function() {
            const attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#yl_image_url').val(attachment.url);
            $('#yl_image_preview').attr('src', attachment.url).show();
        });
        mediaUploader.open();
    });

    function toggleConditionalFields() {
        const selectedType = $('#yl_display_type').val();
        $('.yl-conditional-row').hide();
        $('.yl-row-for-' + selectedType).show();
    }

    $('#yl_display_type').on('change', toggleConditionalFields);
    toggleConditionalFields();
});
