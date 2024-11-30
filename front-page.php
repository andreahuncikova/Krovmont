<?php
/* Template Name: home */
get_header();
?>

<main>
<?php 
$hero_video_url = get_field('hero-video'); 
if ($hero_video_url): 
?>
    <div class="hero-video-container position-relative">
        <!-- Entire video container is wrapped in a link to make it clickable -->
        <a href="#icons" class="hero-video-link">
            <video class="hero-video" autoplay muted loop playsinline>
                <source src="<?php echo esc_url($hero_video_url); ?>" type="video/mp4">
                <?php pll_e ("Your browser does not support the video tag.")?>
            </video>
            <!-- This is the overlay and arrow, now inside the clickable link -->
            <div class="hero-overlay d-flex flex-column text-white text-center">
                <i class="fa fa-arrow-down scroll-down-arrow"></i>
            </div>
        </a>
    </div>
<?php endif; ?>



<section class="category-icons-section" id="icons">
  <div class="container">
    <div class="row">
      <?php
        // Query the 'category-icon' custom post type
        $args = array(
          'post_type' => 'category-icon', // Custom post type name
          'posts_per_page' => 4,          // Display 4 posts
        );

        $query = new WP_Query($args);

        // Loop through the posts
        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
            // Get the custom field 'category_icons' (image field)
            $category_icon = get_field('category_icons');
            // Get the custom field 'category_text' (text field)
            $category_text = get_field('category_text');
            // Get the product page link or shop page link
            $shop_link = get_permalink(wc_get_page_id('shop')); // Or you can set a custom link for each item
            if ($category_icon && $category_text):
      ?>
              <div class="col-12 col-md-3 mb-4 d-flex justify-content-center container-category">
                <div class="category-icon-item text-center">
                  <!-- Make the entire item clickable -->   
                  <div class="d-block">
                    <!-- Display the image from the 'category_icons' custom field (using 'full' size for better quality) -->
                    <img src="<?php echo esc_url($category_icon['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="img-fluid mb-2" />
                    <!-- Display the text from the 'category_text' custom field -->
                    <p class="category-text pt-4"><?php echo esc_html($category_text); ?> </p>
               </div>
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


<h1 class="text-start about-title mt-5 pt-5 mt-md-10 mx-auto" style="max-width: 1600px;"><?php pll_e ("ABOUT US")?></h1>
<?php
// Fetch all custom post type entries for "about_sections"
$args = array(
    'post_type' => 'sections',
    'posts_per_page' => -1, // Fetch all posts
);
$sections = new WP_Query($args);

if ($sections->have_posts()) :
    $counter = 0; // Initialize a counter for alternating layout

    while ($sections->have_posts()) : $sections->the_post();
        $counter++; // Increment the counter for each section
        $is_even = $counter % 2 === 0; // Check if the current section is even
        ?>
        <section id="about-<?php echo $counter; ?>" class="about-section pb-5">
            <div class="container-fluid container-aboutus py-3 py-md-10" style="max-width: 1600px;">
                <div class="row d-flex align-items-center">
                    <?php if ($is_even) : ?>
                        <!-- Even sections: Image first -->
                        <div class="col-12 col-md-6">
                            <img src="<?php the_field('section_image'); ?>" class="img-fluid section-image">
                        </div>
                        <div class="col-12 col-md-1"></div>
                        <div class="col-12 col-md-5">
                            <p><?php the_field('section_text_1'); ?></p>
                            <br><br>
                            <p><?php the_field('section_text_2'); ?></p>
                        </div>
                    <?php else : ?>
                        <!-- Odd sections: Text first -->
                        <div class="col-12 col-md-5 order-md-1 order-3">
                            <p><?php the_field('section_text_1'); ?></p>
                            <br><br>
                            <p><?php the_field('section_text_2'); ?></p>
                        </div>
                        <div class="col-12 col-md-1 order-md-2 order-2"></div>
                        <div class="col-12 col-md-6 order-md-3 order-1">
                            <img src="<?php the_field('section_image'); ?>" class="img-fluid section-image">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php
    endwhile;
    wp_reset_postdata(); // Reset query
endif;
?>



<div class="container-fluid container-gallery">
<h1 class="text-start mt-5 pt-5 mt-md-10 mx-auto" style="max-width: 1600px;"><?php pll_e ("GALLERY")?></h1>
<h5 class="text-start mt-1 mt-md-10 mx-auto mb-5 pb-2 headlinetwo" style="max-width: 1600px;"><?php pll_e ("TAKE A LOOK")?></h5>
<div class="container-fluid d-flex align-items-center justify-content-center min-vh-80 py-4">
    <div class="row g-3 mx-auto" style="max-width: 1600px;">
        <?php
        // Custom query to fetch posts from the 'gallery-image' custom post type
        $args = array(
            'post_type' => 'gallery-image', // Correct custom post type slug
            'posts_per_page' => -1, // Get all posts (you can set a limit by changing this number)
        );
        $gallery_query = new WP_Query($args); // Run the query

        $displayed_images = array(); // Array to store displayed image URLs to avoid duplicates

        if ($gallery_query->have_posts()):
            while ($gallery_query->have_posts()): $gallery_query->the_post();

                // Get the ACF gallery field for the current post
                $images = get_field('gallery_images'); // 'gallery_images' is the ACF field name

                // Check if the images field exists and is an array
                if ($images && is_array($images)): 
                    // Loop through each image ID in the gallery
                    foreach ($images as $image_id):
                        // Get the image data (URL, alt text, and size)
                        $image = wp_get_attachment_image_src($image_id, 'full'); // Fetching the image URL for full size
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Get the alt text

                        // Ensure the image data is valid and not empty
                        if ($image && !in_array($image[0], $displayed_images)): 
                            // Add the image URL to the array to track it
                            $displayed_images[] = $image[0];
                            ?>
                            <div class="col-6 col-md-4 col-sm-4  mb-4 m-0 d-flex justify-content-center align-items-center"> <!-- Added mb-4 for bottom margin -->
                                <div class="rounded overflow-hidden gallery-image-container">
                                    <a href="#" class="image-link" data-image="<?php echo esc_url($image[0]); ?>" data-index="<?php echo $image_id; ?>">
                                        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid gallery-image" />
                                    </a>
                                </div>
                            </div>
                            <?php
                        endif;
                    endforeach;
                else:
                    echo '<p>No gallery images available or incorrect field format.</p>';
                endif;

            endwhile;
            wp_reset_postdata(); // Reset the main query after our custom query
        else:
            echo '<p>No gallery posts available.</p>'; // Message when no posts are found
        endif;
        ?>
    </div>
</div>
</div>

<!-- Modal -->
<div id="imageModal" class="modal">
    <span id="closeModal" class="close">&times;</span>
    <img id="modalImage" class="modal-content">
    <a id="prevImage" class="prev">&#10094;</a>
    <a id="nextImage" class="next">&#10095;</a>
</div>

<!-- JavaScript to handle modal behavior -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get modal and close button
        var modal = document.getElementById("imageModal");
        var closeModal = document.getElementById("closeModal");
        var modalImage = document.getElementById("modalImage");
        var prevImage = document.getElementById("prevImage");
        var nextImage = document.getElementById("nextImage");

        // Array to store image URLs
        var images = [];
        var currentIndex = 0;

        // Set up event listeners for image clicks
        var imageLinks = document.querySelectorAll(".image-link");
        imageLinks.forEach(function(link, index) {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                var imageURL = link.getAttribute("data-image");
                images = Array.from(imageLinks).map(function(item) {
                    return item.getAttribute("data-image");
                });

                // Open modal with selected image
                modal.style.display = "block";
                modalImage.src = imageURL;
                currentIndex = images.indexOf(imageURL);
            });
        });

        // Close modal when clicking the close button
        closeModal.addEventListener("click", function() {
            modal.style.display = "none";
        });

        // Close modal when clicking anywhere outside of the modal content
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });

        // Navigate to previous image
        prevImage.addEventListener("click", function() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            modalImage.src = images[currentIndex];
        });

        // Navigate to next image
        nextImage.addEventListener("click", function() {
            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            modalImage.src = images[currentIndex];
        });
    });
</script>


</main>

<?php get_footer(); ?>