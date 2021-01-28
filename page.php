<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
acf_form_head(); 
get_header(); ?>

<div class="container page-wrap">

	<div class="row">
		<section class="content-area section-block col-sm-12 col-lg-8">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
									comments_template();
							endif;

		endwhile; // End of the loop.
		?>

		</section>
			
	<?php get_sidebar(); ?>
	</div> <!-- end row -->
</div> <!-- end of container -->
<?php get_footer(); ?>
