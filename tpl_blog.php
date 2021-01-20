<?php
/**
 * Template Name: Blog
 *
 * @package happy 2 help you
 * if turn off Reading from settings the Blog page can read template, but not using this template right now
 */
?>

<?php get_header(); ?>

<div id="article" class="container section-block">

  <div class="row page-wrap">

    <section class="content-area col-sm-12 col-lg-8">
    <div class="row d-flex justify-content-center">
      <div id="accordion" class="list-group">
        
        <?php
          $categories = get_categories( array(
            'exclude'=> '1'  // exclude uncategorised
            )
          );
          foreach ( $categories as $index => $category ) {
            $name = $category->name;
            $slug = $category->slug;
            $count = $category->count;
            $cat_color = get_field('color',  $category ); // get from ACF            
        ?>
        <div class="card list-group-item d-flex justify-content-between align-items-center">
          <div class="card-header" id="heading<?php echo $slug; ?>">
            <div class="mb-0 d-flex justify-content-between header-link" style="background:<?php echo $cat_color; ?>">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $slug; ?>" aria-expanded="true" aria-controls="collapse<?php echo $slug; ?>">
                
                <div class="label-area">
                  <h3><?php echo $name; ?>&#32;<span class="badge badge-primary badge-pill"><?php echo $count; ?></span>
                  </h3>
                </div>     
              </button>
              <button class="btn" data-toggle="collapse" data-target="#collapse<?php echo $slug; ?>" aria-expanded="true" aria-controls="collapse<?php echo $slug; ?>">
                <i class="fas fa-angle-down"></i>
              </button>
            </div>
          </div>

          <div id="collapse<?php echo $slug; ?>" class="collapse" aria-labelledby="heading<?php echo $slug; ?>" data-parent="#accordion">
            <div class="card-body">
            
            <ul id="listCat<?php echo $index; ?>" class="card-columns accordion-ul">
              <?php
                $args = array(
                  'cat' => $category->term_id,
                  'orderby' =>'post_date',
                  'order' => 'DESC',
                  'post_type' => 'post',
                  'posts_per_page' => '-1',
                );
                $query = new WP_Query( $args );
                  
                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                ?>
                  <li class="card">          
                    <a class="title-link" href="<?php echo get_permalink(); ?>">                    
                    <div class="img-div" style="background-image:url('<?php the_post_thumbnail_url('medium'); ?>')"></div>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo get_the_title(); ?></h5>
                        <p class="card-text"><?php $content = get_the_content(); echo wp_trim_words($content,'10','...'); ?></p>
                      </div>
                    </a>                               
                  </li>
                <?php 
                  } // end while ?>
                <?php 
                } // end if        
                    wp_reset_postdata();
                ?>
                <div class="d-flex flex-row-reverse">              
                <a id="showLess<?php echo $index; ?>" class="btn btn-primary showLess"><i class="fas fa-minus"></i></a>
                <a id="loadMore<?php echo $index; ?>" class="btn btn-primary loadMore"><i class="fas fa-plus"></i></a>
                </div>            
              </ul>
              </div>
            </div>
          </div> <!-- end of card -->
      <?php } // end foreach ?>
        </div>
      </div>  <!-- end of row -->
    </section>

    <?php get_sidebar(); ?>
	</div> <!-- end row -->
</div> <!-- end of container -->
  
<?php get_footer(); ?>