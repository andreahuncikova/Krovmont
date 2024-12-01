<?php
// Načítanie hlavičky webu
get_header(); 
?>

<div class="single-container container">
    <div class="content">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <div class="post-card">
                    <!-- Názov príspevku -->
                    <h2 class="post-title display-4"><strong><?php the_title(); ?></strong></h2>
                    

              
                    <!-- Meta informácie -->
                    <p class="post-meta">
                        <?php pll_e ("Published on")?> <?php echo get_the_date(); ?> <?php pll_e ("by")?> <?php the_author(); ?>
                    </p>

                       
                    
                    <!-- Obsah príspevku -->
                    <div class="post-content mt-5">
                        <?php the_content(); ?>
                   
                    </div>

                    <!-- Sekcia komentárov -->
                    <div class="post-comments">
                        <h3><?php pll_e ("COMMENTS")?></h3>

                    
                    

                        

                      
           
                           <!-- Sekcia komentárov -->
        <?php
        if (comments_open() || get_comments_number()) :
            comments_template(); // Zobrazenie komentárov a formulára
        endif;
        ?>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php else: ?>
            <p><?php pll_e ("Sorry, no content found for this post.")?></p>
        <?php endif; ?>

     
    </div>
</div>

<?php
// Načítanie pätičky webu
get_footer(); 
?>


