<?php
// Basic theme setup
function krovmont_load_resources() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'krovmont_load_resources');
?>
