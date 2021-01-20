<div id="related" class="related section section5">
  <h3 class="widget-title">Related Articles</h3>
    <div class="section-wrap">
    <?php if( have_rows('related_articles')): ?>
    
      <?php while ( have_rows('related_articles')) : the_row(); ?>

        <?php // set up post object
          $post_object = get_sub_field('post_article');
          if( $post_object ) :
          $post = $post_object;
          setup_postdata($post);
        ?>

        <div class="article-card related-article">
          <a href="<?php echo get_post_permalink(); ?>">               
          <?php the_post_thumbnail('medium'); ?>
            <h4><?php the_title(); ?></h4>
         
          <?php 
            $full_excerpt = get_the_excerpt(); 
            $short_excerpt = mb_strimwidth( $full_excerpt, 0, 98, ' ...' ); 
          ?>
            <p><?php echo $short_excerpt; ?></p>
          </a>
        </div>

        <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      <?php endwhile; ?>		
    <?php else : ?>
      <p>Sorry, no related article at this moment.</p>
    <?php endif; ?><!-- End Repeater -->
    </div>
</div>