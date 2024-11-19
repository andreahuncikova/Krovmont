<?php 
function krovmont_load_resources() {
    // Google Fonts
    wp_enqueue_style("google-fonts-montserrat", "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap", [], null);

    // Bootstrap
    wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");

    // Theme Styles
    wp_enqueue_style("theme-style", get_stylesheet_uri(), ['bootstrap-css', 'google-fonts-montserrat'], null);
}
add_action("wp_enqueue_scripts", "krovmont_load_resources");


// Register primary menu location
function custom_theme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'yourtheme'),
    ));
}
add_action('after_setup_theme', 'custom_theme_setup');


// Include the Bootstrap Navwalker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
?>
