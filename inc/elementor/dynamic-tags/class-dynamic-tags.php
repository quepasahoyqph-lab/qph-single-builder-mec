<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Dynamic_Tags {

    public function __construct() {
        add_action('elementor/dynamic_tags/register', [$this, 'register_tags']);
        add_action('elementor/dynamic_tags/register_tags', [$this, 'register_group']);
    }

    public function register_group($dynamic_tags) {

        $dynamic_tags->register_group('qph-mec', [
            'title' => 'QPH MEC'
        ]);
    }

    public function register_tags($dynamic_tags) {

        require_once QPH_MEC_PATH . 'inc/elementor/dynamic-tags/tag-event-title.php';
        require_once QPH_MEC_PATH . 'inc/elementor/dynamic-tags/tag-event-date.php';
        require_once QPH_MEC_PATH . 'inc/elementor/dynamic-tags/tag-event-location.php';
        require_once QPH_MEC_PATH . 'inc/elementor/dynamic-tags/tag-event-cost.php';

        $dynamic_tags->register(new QPH_Tag_Event_Title());
        $dynamic_tags->register(new QPH_Tag_Event_Date());
        $dynamic_tags->register(new QPH_Tag_Event_Location());
        $dynamic_tags->register(new QPH_Tag_Event_Cost());
    }
}