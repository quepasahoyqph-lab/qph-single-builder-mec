<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Elementor {

    public function __construct() {
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'register_category']);
    }

    public function register_category($elements_manager) {

        $elements_manager->add_category(
            'single_builder',
            [
                'title' => 'MEC Single Builder',
                'icon'  => 'fa fa-plug',
            ]
        );
    }

    public function register_widgets($widgets_manager) {

        // 🔥 1. CARGAR BASE PRIMERO
        require_once QPH_MEC_PATH . 'widgets/class-widget-base.php';

        // 🔥 2. HELPER (si existe)
        if (file_exists(QPH_MEC_PATH . 'widgets/class-widget-helper.php')) {
            require_once QPH_MEC_PATH . 'widgets/class-widget-helper.php';
        }

        // 🔥 3. CARGAR TODOS LOS WIDGETS AUTOMÁTICO
        foreach (glob(QPH_MEC_PATH . 'widgets/class-widget-*.php') as $file) {

            // evitar duplicar base
            if (strpos($file, 'class-widget-base.php') !== false) continue;

            require_once $file;
        }

        // 🔥 4. REGISTRAR CLASES
        foreach ($widgets as $widget_class) {
        if (class_exists($widget_class)) {
            $widgets_manager->register(new $widget_class());
           }
        }
    }
}