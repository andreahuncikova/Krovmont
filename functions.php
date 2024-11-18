function my_theme_enqueue_styles() {
    // Enqueue the main stylesheet (style.css)
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());

    // If you have additional CSS files (like custom.css), you can enqueue them too:
    // wp_enqueue_style('my-theme-custom-style', get_template_directory_uri() . '/custom.css');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
