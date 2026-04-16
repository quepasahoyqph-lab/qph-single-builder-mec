<?php
/**
 * Template para editar con Elementor
 * Elementor requiere the_content() para funcionar
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();
    the_content(); // Requerido por Elementor
endwhile;

get_footer();
