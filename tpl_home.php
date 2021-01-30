<?php
/**
 * Template Name: Home Page
 *
 * @package happy
 */
?>

<?php get_header(); ?>

<!-- How does it work -->
<div id="how" class="container-fluid section-block how">
  <div class="container">
    <h2 class="section-title">How does it work</h2>
    <?php
      $how_into = get_field('how_intro');
      if ($how_into) {
    ?>
      <h4><?php echo $how_into; ?></h4>
    <?php
      }
    ?>  
      
    <div class="steps-wrap">
      <?php
        if( have_rows('how_steps') ):
          $x = 1;
          while( have_rows('how_steps') && $x <= 5 ) : the_row();    
            $icon = get_sub_field('icon');
            $title = get_sub_field('title');
            $description = get_sub_field('description');          
      ?>
        <div class="step-wrap-inner">
          <h3 class="number"><?php echo $x; ?></h3>
          <div class="block-arrow"><i class="fas <?php echo $icon; ?>"></i></div>
          <h3 class="title"><?php echo $title; ?></h3>
          <p><?php echo $description; ?></p>
        </div>
      
      <?php
          $x ++;
          endwhile;
        endif;
        wp_reset_postdata();
      ?>
      
    </div>
  </div>
</div>

<!-- Plans -->
<div id="plans" class="container section-block plans">  
  <h2 class="section-title">Type of Plans</h2>
  <?php
    while ( have_posts() ) : the_post();
    the_content();
    endwhile; // End of the loop.
  ?>  
</div>

<!-- Latest -->
<div id="latest" class="container-fluid section-block latest">
  <div class="container">
    <h2 class="section-title">Latest Articles</h2>
      
    <div class="row-wrap">
      <?php
        $categories = get_categories( array(
          'exclude'=> '1'  // exclude uncategorised
          )
        );   

        foreach ( $categories as $category ) {
          $args = array(
            'cat' => $category->term_id,
            'orderby' =>'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'posts_per_page' => '1',
          );
          $query = new WP_Query( $args );

          if ( $query->have_posts() ) {        

            while ( $query->have_posts() ) {
              $query->the_post();         
              $term_id = $post->term_id;
              $categories = get_the_category();
              $cat_color = get_field('color',  $category ); //get from ACF
      ?>
        <div id="post-<?php the_ID(); ?>" class="card card-single">
                        
          <div class="card-img">
            <div class="img-div" style="background-image:url('<?php the_post_thumbnail_url('medium'); ?>')"></div>
            

            <div class="card-meta" style="background:<?php echo $cat_color; ?>">
              <a class="meta-link" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
            </div>
          </div>
          <div class="card-body">                
            <h3 class="card-title">
              <a class="title-link" href="<?php echo get_permalink(); ?>">
                <?php echo get_the_title(); ?>
              </a>
            </h3>
            <!--this is the exerpt of the post-->
            <p class="card-text"><?php $content = get_the_content(); echo wp_trim_words($content,'10','...'); ?></p>
            <a class="btn btn-primary read-more" href="<?php echo get_permalink(); ?>">Read More</a>
          </div>           
        </div>
      <?php 
        } // end while ?>
      <?php 
        } // end if        
        wp_reset_postdata();
      }  //foreach ?>
    </div>
  </div>
</div>

<!-- Help -->
<div id="order" class="container-fluid section-block help">
  <div class="container container-wrap">
    <?php
      get_template_part( 'template-parts/ask', 'help' );
    ?>
  </div>  
</div>
<?php get_footer(); ?>