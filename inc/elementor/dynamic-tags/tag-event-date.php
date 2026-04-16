<?php
if (!defined('ABSPATH')) exit;

class QPH_Tag_Event_Date extends \Elementor\Core\DynamicTags\Tag {

    use QPH_ESB_Widget_Helper;

    public function get_name() {
        return 'qph-event-date';
    }

    public function get_title() {
        return 'Event Date';
    }

    public function get_group() {
        return 'qph-mec';
    }

    public function get_categories() {
        return [\Elementor\Modules\DynamicTags\Module::TEXT_CATEGORY];
    }

    public function render() {

        $date = $this->get_start_date();

        if ($date) {
            echo esc_html($date);
        }
    }
}