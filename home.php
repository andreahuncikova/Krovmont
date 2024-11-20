<?php
/* Template Name: home */
get_header(); // Include the header
?>

<?php
// Cesta k videu v adresári vašej témy
$video_url = get_template_directory_uri() . '/images/FINAL-SHORT-VIDEO.mp4';
?>

<video class="hero-video container" autoplay muted loop playsinline>
    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="hero-overlay d-flex flex-column justify-content-center align-items-center text-white text-center">
    <h1><?php bloginfo('name'); ?></h1>
    <p class="mt-3"><?php bloginfo('description'); ?></p>
    <a href="#about" class="btn btn-primary mt-4">Learn More</a>
</div>



<div class="container text-center py-5">
    <h1>Welcome to the Home Page</h1>
    <p>This is your homepage content. Customize it as needed.</p>
    <p>This is your homepage content. Customize it as needed.</p>
    <p>This is your homepage content. Customize it as needed.</p>
</div>



<?php get_footer(); // Include the footer ?>
