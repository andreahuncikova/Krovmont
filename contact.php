<?php
/* Template Name: contact */
get_header();
?>

<main>
<div class="container container-krovmont">
    <h1 class="pb-3"><?php pll_e ("FIND KROVMONT")?></h1>
    <p><?php pll_e ("Get directions or contact us for more information.")?></p>
</div>


<div style="max-width: 1400px; width: 100%; margin: 0 auto; ">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2616.8000856806198!2d18.47448797685834!3d49.01438818971533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47148d607c544cd9%3A0x3e5978154dee1977!2sKrovmont%20-%20Jance%20Du%C5%A1an!5e0!3m2!1ssk!2sdk!4v1732393057904!5m2!1ssk!2sdk" width="100%" height="600" style="border:0; border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="container container-contact text-end">
    <h1 class="pb-3 text-center"><?php pll_e ("CONTACT US")?></h1>
    <p class="text-center"><?php pll_e ("Have questions or need assistance? Reach out to us through the form below.")?></p>

    <div class="contact-form">
        <?php echo do_shortcode('[contact-form-7 id="fee8cb9" title="Contact Us"]'); ?>
    </div>
</div>

</main>

<?php get_footer(); ?>
