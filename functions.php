<?php


function update_admin_email() {
    $user_id = 1; // ID admin účtu, zvyčajne 1
    $new_email = 'a.huncikova@gmail.com';
    wp_update_user( array( 'ID' => $user_id, 'user_email' => $new_email ) );
}
add_action( 'init', 'update_admin_email' );



// Enqueue Styles and Scripts
function krovmont_load_resources() {
    // Bootstrap CSS
    wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");

    // Google Fonts (Montserrat)
    wp_enqueue_style("google-fonts-montserrat", "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap", [], null);

    // Theme Styles (style.css)
    wp_enqueue_style("krovmont-style", get_stylesheet_uri(), ['bootstrap-css', 'google-fonts-montserrat'], filemtime(get_template_directory() . '/style.css'));


}
add_action("wp_enqueue_scripts", "krovmont_load_resources");

// Register Navigation Menus
function custom_theme_setup() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'krovmont'),
    ));
}
add_action('after_setup_theme', 'custom_theme_setup');

// Include Bootstrap NavWalker Class
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


function shop_enable_woocommerce(){
add_theme_support("woocommerce");
}
add_action("after_setup_theme", "shop_enable_woocommerce");


function create_sections_post_type() {
    register_post_type('sections', array(
        'labels' => array(
            'name' => __('Sections'),
            'singular_name' => __('Section'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title'), // Include fields like 'editor', 'thumbnail' if needed
        'menu_icon' => 'dashicons-layout', // Optional icon
    ));
}
add_action('init', 'create_sections_post_type');


function theme_enqueue_woocommerce_styles() {
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce-layout', plugins_url('/woocommerce/assets/css/woocommerce-layout.css'));
        wp_enqueue_style('woocommerce-general', plugins_url('/woocommerce/assets/css/woocommerce.css'));
        wp_enqueue_style('woocommerce-smallscreen', plugins_url('/woocommerce/assets/css/woocommerce-smallscreen.css'), array('woocommerce-general'), '1.0', false);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_woocommerce_styles');

function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


function shop_add_css () {

wp_enqueue_style ("theme", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue scripts", "shop_ add css");




function pll_register_strings() {
    pll_register_string("header", "Published on");
    pll_register_string("header", "by");
    pll_register_string("header", "COMMENTS");
    pll_register_string("404", "Sorry, no content found for this post.");
    pll_register_string("sponsors", "OUR TRUSTED PARTNERS");
    pll_register_string("contact", "CONTACT US");
    pll_register_string("contact", "OUR SHOP");
    pll_register_string("contact", "Discover a variety of products, including everything you need, now available in our shop.");
    pll_register_string("contact", "Visit our shop");
    pll_register_string("contact", "SUBSCRIBE TO OUR NEWSLETTER");
    pll_register_string("contact", "Get the latest updates and offers directly to your inbox.");
    pll_register_string("contact", "© 2024 Krovmont. All Rights Reserved.");
    pll_register_string("contact", "FIND KROVMONT");
    pll_register_string("contact", "Get directions or contact us for more information.");
    pll_register_string("contact", "Have questions or need assistance? Reach out to us through the form below.");
    pll_register_string("blog", "READ MORE");
    pll_register_string("footer", "Have questions or need support? Reach out to us:");
    pll_register_string("about", "Your browser does not support the video tag.");
    pll_register_string("about", "ABOUT US");
    pll_register_string("about", "GALLERY");
    pll_register_string("about", "TAKE A LOOK");
}
add_action("init", "pll_register_strings");





