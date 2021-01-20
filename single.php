<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<!-- hero banner -->
<div class="hero-thumbnail" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
	<div class="row justify-content-center">
			<a href="#article" class="page-scroller"><i class="fas fa-chevron-circle-down"></i></a> 
	</div>
</div> <!-- end of hero banner -->

<div id="article" class="container section-block">

	<div class="row">
		<section class="content-area col-sm-12 col-lg-8">

			<?php
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			?>
			
			<?php
				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

			<!-- related articles -->
			<?php get_template_part( 'template-parts/content', 'related' ); ?>
			<?php endwhile; // End of the loop. ?>
		</section>
			
	<?php get_sidebar(); ?>
	</div> <!-- end row -->
</div> <!-- end of container -->
<?php get_footer(); ?>
