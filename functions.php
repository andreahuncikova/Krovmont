<?php 
function krovmont_load_resources() {
    wp_enqueue_style("bootstrap-css", "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css");
    wp_enqueue_style("theme-style", get_template_directory_uri() . "/style.css");
}
add_action("wp_enqueue_scripts" , "krovmont_load_resources");
