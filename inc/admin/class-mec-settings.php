<?php
if (!defined('ABSPATH')) exit;

error_log('MEC SETTINGS FILTRO OK');
class QPH_MEC_Settings {

    public function __construct() {

        add_filter('mec_settings', [$this, 'register_settings'], 1);

    }
    
    public function register_settings($settings) {

        error_log('🔥 QPH SETTINGS OK');

        if (isset($settings['single']['single_single_style'])) {

            $settings['single']['single_single_style']['options']['builder'] = 'QPH Single Builder (Elementor)';
        }

        return $settings;
        
        add_filter('mec_settings', function($settings) {

    error_log('🔥 MEC SETTINGS FILTRO OK');

    if (
        isset($settings['single']) &&
        isset($settings['single']['single_single_style']) &&
        isset($settings['single']['single_single_style']['options'])
    ) {

        // 🔥 CLAVE: reescribir options completo
        $options = $settings['single']['single_single_style']['options'];

        // Evitar duplicado
        if (!isset($options['builder'])) {
            $options['builder'] = 'QPH Single Builder (Elementor)';
        }

        // 🔥 IMPORTANTE: reasignar
        $settings['single']['single_single_style']['options'] = $options;

        // 🔥 DEBUG
        error_log(print_r($settings['single']['single_single_style'], true));
    }

    return $settings;

}, 1);
    }
}