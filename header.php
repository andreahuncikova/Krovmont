<!DOCTYPE html>
<html lang="en">
<html <?php language_attributes()?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar d-flex text-center justify-content-center align-items-center navbar-expand-lg navbar-dark fixed-top pt-5">
            <div class="container-fluid navbar-mobile px-4">
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/krovmont-logo.svg" style="height: 45px; padding-right: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-mobile" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav mx-auto',
                        'container'      => false,
                        'fallback_cb'    => '__return_false',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'          => 2,
                        'walker'         => new WP_Bootstrap_Navwalker(),
                    ));
                    ?>
                    <div class="d-flex justify-content-center align-items-center ">
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url('dashboard')); ?>" class="me-4 px-1 svg-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z"/>
                            </svg>
                        </a>
                        <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="me-4 px-2 svg-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 4h18a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm0 2v3h18V6H3zm0 5v7h18v-7H3zm4 3h4v2H7v-2z"/>
                            <path d="M16 9h5v2h-5z"/>
                            </svg>
                        </a>
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="svg-color">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 3h2l.6 3H20a1 1 0 0 1 .97 1.25l-2 7A1 1 0 0 1 18 15H8.1l-.3 1.5h11.7v2H7a1 1 0 0 1-.97-1.25l.6-3H5a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm7 16a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm10 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');  // Add the correct class
        } else {
            navbar.classList.remove('navbar-scrolled');  // Remove the correct class
        }
    });
});

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>

