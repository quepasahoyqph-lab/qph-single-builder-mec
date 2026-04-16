<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Resolver {

    public function resolve($event_id, $type = 'single') {

        // 1. Evento específico
        $event_template = get_post_meta($event_id, 'single_design_page', true);
        if ($event_template) return $event_template;

        // 2. Categorías
        $cats = wp_get_post_terms($event_id, 'mec_category', ['fields' => 'ids']);

        if (!is_wp_error($cats)) {
            foreach ($cats as $cat) {
                $cat_template = get_term_meta($cat, 'single_design_page', true);
                if ($cat_template) return $cat_template;
            }
        }

        // 3. Global
        $opts = get_option('mec_options', []);
        if (!empty($opts['settings']['single_single_default_builder'])) {
            return $opts['settings']['single_single_default_builder'];
        }

        // 4. Fallback automático
        $any = get_posts([
            'post_type' => 'mec_esb',
            'posts_per_page' => 1,
            'fields' => 'ids'
        ]);

        return $any ? $any[0] : 0;
    }
}