<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Loader {

    public function run() {

        // 🔥 1. CARGAR SETTINGS DE MEC (PRIMERO SIEMPRE)
        require_once QPH_MEC_PATH . 'inc/admin/class-mec-settings.php';
        new QPH_MEC_Settings();

        // 🔥 2. CARGAR ELEMENTOR (SOLO SI EXISTE)
        add_action('plugins_loaded', function() {

            if (!did_action('elementor/loaded')) {
                error_log('❌ Elementor NO cargado');
                return;
            }

            require_once QPH_MEC_PATH . 'inc/elementor/class-elementor.php';
            new QPH_MEC_Elementor();

        }, 20);

        // 🔥 3. FRONTEND (CUANDO TODO YA EXISTE)
        add_action('init', function() {

            if (!class_exists('MEC')) {
                error_log('❌ MEC NO cargado');
                return;
            }

            require_once QPH_MEC_PATH . 'inc/frontend/class-frontend.php';
            new QPH_MEC_Frontend();

        }, 20);

    }
}