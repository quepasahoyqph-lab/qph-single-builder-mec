<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Activator {

    public static function activate() {

        // Flush permalinks
        flush_rewrite_rules();

        // Default options si quieres
        if (!get_option('mec_options')) {
            update_option('mec_options', []);
        }
    }
}