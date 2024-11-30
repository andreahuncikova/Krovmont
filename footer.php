<footer class="">
<section class="trusted-partners">
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h5 class="logo m-0 text-center headlinetwo"><?php pll_e ("OUR TRUSTED PARTNERS")?></h5>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row justify-content-center col-12 col-md-12 g-0 pt-5">
        <?php
            // Query the 'our-partner' custom post type
            $args = array(
                'post_type' => 'our-partner', // Custom post type name
                'posts_per_page' => 5,        // Display 5 posts
            );

            $query = new WP_Query($args);

            // Loop through the posts
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    // Get the custom field 'our_partners' (the image field)
                    $partner_image = get_field('our_partners');
                    if ($partner_image):
                        // Get the image URL for the 'medium' size
                        $image_url = $partner_image['sizes']['medium']; // You can change 'medium' to 'thumbnail', 'large', etc.
                        $image_alt = esc_attr($partner_image['alt']);
        ?>
            <div class="col-6 col-md-2 mb-4 m-0 d-flex justify-content-center align-items-center partnery">
                <div class="footer-image text-center">
                    <!-- Display the image with the selected size -->
                    <a href="<?php echo esc_url(get_field('partner_url')); ?>" target="_blank">
                        <img src="<?php echo esc_url($image_url); ?>" class="img-fluid" alt="<?php echo $image_alt; ?>" style="max-width: 100%; height: auto;" />
                    </a>
                </div>
            </div>
        <?php
                    endif;
                endwhile;
            endif;

            // Reset the post data after custom query
            wp_reset_postdata();
        ?>
    </div>
</div>

</section>


  <!-- Footer Content -->
  <section class="container-footer">
  <div class="container py-5">
    <div class="row">
      <!-- Contact Section -->
      <div class="col-md-3 mb-4">
        <h4><?php pll_e ("CONTACT US")?></h4>
        <p class="pt-3"><?php pll_e ("Have questions or need support? Reach out to us:")?></p>
        <ul class="list-unstyled">
          <li><i class="bi bi-envelope"></i> dusanjance@gmail.com</li>
          <li><i class="bi bi-telephone"></i> (421) 908 231 060</li>
          <li><i class="bi bi-geo-alt"></i> Pružina 184, 018 22 Pružina</li>
        </ul>
      </div>

      <!-- Our Shop Section -->
      <div class="col-md-3 mb-4">
        <h4><?php pll_e ("OUR SHOP")?></h4>
        <p class="pt-3"><?php pll_e ("Discover a variety of products, including everything you need, now available in our shop.")?></p>
        <a href="<?php echo get_permalink( wc_get_page_id('/shop-english' ) ); ?>" class="text-dark"><?php pll_e ("Visit our shop")?></a>
      </div>

      <!-- Empty Column for Spacing -->
      <div class="col-md-1"></div>

      <!-- Newsletter Subscription Section -->
      <div class="col-md-5 mb-4">
        <h4><?php pll_e ("SUBSCRIBE TO OUR NEWSLETTER")?></h4>
        <p class="text-center" class="pt-3"><?php pll_e ("Get the latest updates and offers directly to your inbox.")?></p>

        <div>
          <?php echo do_shortcode('[contact-form-7 id="c02b836" title="Newsletter"]'); ?>
        </div>
        
        <!-- <form>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="email@gmail.com" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn-red-bg ">Subscribe now</button>
          </div>
        </form> -->
      </div>
    </div>

    <!-- Horizontal Line -->
    <hr class="custom-line mt-5">

    <!-- Footer Bottom -->
    <div class="text-center">
      <p class="mb-0 p-0"><?php pll_e ("© 2024 Krovmont. All Rights Reserved.")?></p>
    </div>
  </div>
  </section>
</footer>


<?php wp_footer(); ?>
</body>
</html>

