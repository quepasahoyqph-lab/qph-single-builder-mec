<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Deactivator {

    public static function deactivate() {
        flush_rewrite_rules();
    }
}