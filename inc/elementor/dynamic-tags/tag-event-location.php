<?php
if (!defined('ABSPATH')) exit;

class QPH_Tag_Event_Location extends \Elementor\Core\DynamicTags\Tag {

    use QPH_ESB_Widget_Helper;

    public function get_name() {
        return 'qph-event-location';
    }

    public function get_title() {
        return 'Event Location';
    }

    public function get_group() {
        return 'qph-mec';
    }

    public function get_categories() {
        return [\Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY];
    }

    public function render() {
        echo esc_html($this->get_location());
    }
}