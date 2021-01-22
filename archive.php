<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<div id="article" class="container section-block">

<div class="row">
	<section class="content-area col-sm-12 col-lg-8">

	<?php
			if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				$archive_title = get_the_archive_title();
				// categories					
				$term = get_queried_object();				
				$cat_color = get_field('color',  $term );						
				?>
				<div class="title-wrap">

				<?php	// category icon and title	?>
				<div class="circle-wrap">										
					<h1 id="archive-title" style="color:<?php echo $cat_color; ?>">				
						<?php echo $archive_title; ?>
					</h1>
				</div>
				
				</div> <!-- end of title-wrap -->					
			</header><!-- .page-header -->
				<div class="row articles-wrap">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
				?>
					<div id="post-<?php the_ID(); ?>" class="card card-single">
                       
						<div class="card-img"> 
							<!-- <?php //the_post_thumbnail('medium', array('class' => 'thumbnail-img')); ?> -->
							<div class="img-div" style="background-image:url('<?php the_post_thumbnail_url('medium'); ?>')"></div>
						</div>
						<div class="card-body">                
							<h4 class="card-title">
								<a class="title-link" href="<?php echo get_permalink(); ?>">
									<?php echo get_the_title(); ?>
								</a>
							</h4>
							<!--this is the exerpt of the post-->
							<p class="card-text"><?php $content = get_the_content(); echo wp_trim_words($content,'32','...'); ?></p>
							<a class="btn btn-primary read-more" href="<?php echo get_permalink(); ?>">Read More</a>
						</div>
             
					</div>
			<?php	
				endwhile;
			?>
				</div> <!-- end of articles-wrap -->
			<?php

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</section>
			
		<?php get_sidebar(); ?>
	</div> <!-- end row -->
</div> <!-- end of container -->
<?php get_footer(); ?>