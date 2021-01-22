<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<div class="container error-404 not-found">

	<div class="row">
		<section class="content-area section-block col-sm-12 col-lg-8">
			
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-bootstrap-starter' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content not-found-text">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Would you need any help? Just quick send us a message, we will get in touch with you soon.', 'wp-bootstrap-starter' ); ?></p>
				
			</div><!-- .page-content -->

			<div class="help-intro">
				<h3>How can you get free help?</h3>
				<p>Firstly, send us <a id="your-idea" href="#">Your website idea</a>.
					Then, Book an hour <a id="appointment" href="#">appointment</a> for a free consultation.
					You are welcomed for <a id="contact" href="#">sending us any message</a> and suggestion to us at any time.</p>
				</div>
			<div id="help" class="section-block help">
				<?php
					get_template_part( 'template-parts/ask', 'help' );
				?>				
			</div>
		</section><!-- .error-404 -->
		<?php get_sidebar(); ?>
	</div> <!-- end row -->
</div> <!-- end of container -->
<?php get_footer(); ?>