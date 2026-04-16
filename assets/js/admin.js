(function($) {
    'use strict';

    // Toggle opciones del builder en MEC Settings
    function qphToggleBuilderOptions() {
        var val = $('input[name="mec[settings][single_single_style]"]:checked').val();
        var $wraps = $(
            '#mec_settings_single_event_single_default_builder_wrap,'
            + '#mec_settings_single_event_single_modal_default_builder_wrap,'
            + '#mec_settings_custom_event_for_set_settings_wrap'
        );
        if (val === 'builder') {
            $wraps.slideDown(300);
        } else {
            $wraps.slideUp(300);
        }
    }

    $(document).ready(function() {
        $(document).on(
            'change',
            'input[name="mec[settings][single_single_style]"]',
            qphToggleBuilderOptions
        );
        qphToggleBuilderOptions();
    });

})(jQuery);
