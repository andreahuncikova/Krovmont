<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="<?php echo home_url(); ?>">
                <?php
                // Display custom logo if set, otherwise show site name
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    bloginfo('name');
                }
                ?>
            </a>
            <!-- Hamburger toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Center: Dynamic Menu -->
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'navbar-nav mx-auto',
                    'container'      => false,
                    'fallback_cb'    => '__return_false',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'          => 2,
                    'walker'         => new WP_Bootstrap_Navwalker(), // Bootstrap walker
                ));
                ?>
                <!-- Right: SVG icons -->
                <div class="d-flex">
                    <a href="#" class="me-3">
                        <!-- Replace below with your SVG or icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 1.985-1.75H6.015A2 2 0 0 0 8 16zm6.8-5a1 1 0 0 1-.8 1H2a1 1 0 0 1-.8-1 7.6 7.6 0 0 1 1.538-4.588A4.498 4.498 0 0 1 8 3c1.74 0 3.27.973 4.262 2.412A7.6 7.6 0 0 1 14.8 11zM8 1a3 3 0 0 0-3 3c0 .7.3 1.437.753 2.064a6.62 6.62 0 0 1 4.494 0C10.7 5.437 11 4.7 11 4a3 3 0 0 0-3-3z"/>
                        </svg>
                    </a>
                    <a href="#">
                        <!-- Replace below with your SVG or icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.216 6A5.989 5.989 0 0 1 8 10c2.21 0 4.2 1.125 5.216 2.997.135.247.184.53.184.803 0 .642-.494 1.2-1.105 1.2H4.105C3.494 15 3 14.442 3 13.8c0-.273.05-.556.184-.803z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <?php wp_footer(); ?>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>