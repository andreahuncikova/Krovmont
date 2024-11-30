<?php
/* Template Name: Blog */
get_header();
?>

<main>
    <div class="blog-container container-fluid">
        <div class="blog-grid">
            <?php
            // Dotaz na príspevky
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 10, // Počet príspevkov na stránku
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Paginácia
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $url = get_permalink();
                    $title = get_the_title();
                    $date = get_the_date();
                    $author = get_the_author();

                    // Príspevok: Získaj obrázok a výňatok
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $excerpt = get_the_excerpt();
                    ?>

                    <!-- Blog Card -->
                    <div class="blog-card ">
                        <!-- Thumbnail -->
                        <?php if ($thumbnail) : ?>
                            <a href="<?php echo esc_url($url); ?>">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>" class="blog-thumbnail card-img-top" />
                            </a>
                        <?php endif; ?>

                        <!-- Title and meta -->
                        <a href="<?php echo esc_url($url); ?>" class="blog-link">
                            <h2 class="blog-title"><?php echo esc_html($title); ?></h2>
                            <p class="blog-meta">
                                <?php pll_e("Published on")?> <?php echo esc_html($date); ?> <?php pll_e("by")?> <?php echo esc_html($author); ?>
                            </p>
                        </a>

                        <!-- Excerpt -->
                        <p class="blog-excerpt"><?php echo esc_html($excerpt); ?></p>
                        <div class="d-flex align-items-center text-justify justify-content-between pb-0">
                                    <a href="<?php the_permalink(); ?>" class="btn-red-bg"><?php pll_e("READ MORE") ?></a>
                                </div>
                    </div>

                <?php endwhile; ?>

                <!-- Paginácia -->
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $query->max_num_pages,
                        'current' => max(1, get_query_var('paged')),
                        'prev_text' => '&laquo; Previous',
                        'next_text' => 'Next &raquo;',
                    ));
                    ?>
                </div>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php pll_e ("No posts found.")?></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>


<?php
/**
 * Template Name: Blog
 */
get_header(); // Include the header.php file
?>

       

   