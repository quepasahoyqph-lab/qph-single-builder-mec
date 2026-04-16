<?php
if (!defined('ABSPATH')) exit;

class QPH_MEC_Integration {

    private $resolver;

    public function __construct() {

        $this->resolver = new QPH_MEC_Resolver();

        add_filter('mec_filter_single_style', [$this, 'force_builder'], 1);
        add_action('mec_esb_content', [$this, 'render'], 10, 1);
    }

    public function force_builder($style) {

        $opts = get_option('mec_options', []);
        return $opts['settings']['single_single_style'] ?? $style;
    }

    public function render($event) {

        if (!class_exists('\Elementor\Plugin')) return;

        if ($this->get_style() !== 'builder') return;

        $template_id = $this->resolver->resolve($event->ID);

        if (!$template_id) return;

        global $eventt;
        $eventt = $event;

        echo '<div class="qph-esb-wrapper">';

        echo \Elementor\Plugin::$instance->frontend
            ->get_builder_content_for_display($template_id);

        echo '</div>';
    }

    private function get_style() {
        $opts = get_option('mec_options', []);
        return $opts['settings']['single_single_style'] ?? 'default';
    }
}