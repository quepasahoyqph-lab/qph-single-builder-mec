<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Conditions {

    public function match($template_id, $event_id) {

        $conditions = get_post_meta($template_id, '_qph_conditions', true);

        if (!$conditions || !is_array($conditions)) {
            return true;
        }

        foreach ($conditions as $condition) {

            switch ($condition['type']) {

                case 'category':
                    $cats = wp_get_post_terms($event_id, 'mec_category', ['fields'=>'ids']);
                    if (in_array($condition['value'], $cats)) return true;
                break;

                case 'event':
                    if ($condition['value'] == $event_id) return true;
                break;
            }
        }

        return false;
    }
}