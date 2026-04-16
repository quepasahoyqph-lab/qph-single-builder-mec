<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Cache {

    public static function get($key) {
        return get_transient($key);
    }

    public static function set($key, $value) {
        set_transient($key, $value, HOUR_IN_SECONDS);
    }
}