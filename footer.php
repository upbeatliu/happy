<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 * 
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>			

	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>

	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
	<div class="go-to">
		<a href="#page"><i class="fa fa-fw fa fa-fw fa-angle-up"></i></a>
	</div>
		<div class="container footer-container pt-3 pb-3">
			<!-- left -->
			<div class="footer-wrap copyright">
				<span class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>				
					</a>
				</span>
				&nbsp;
				<small>
					<a href="<?php echo esc_url( __( '/', '3howto' ) ); ?>">				
						<?php printf( __( '%s - All rights reserved', '3howto' ), '&#169; '. date('Y') ); ?>
					</a>
				</small>
			</div>

			<!-- middle -->
			<div class="footer-wrap footer-links">
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'wp-bootstrap-starter' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav><!-- .footer-navigation -->
			<?php endif; ?>
			</div>

			<!-- right -->
			<div class="footer-wrap brand">
				<a href="<?php echo esc_url( home_url( '/' )); ?>"><img class="footer-logo" alt="Happy 2 help you" src="<?php echo get_template_directory_uri(); ?>/images/happy-2-help-you-logo-white.png" /></a>
			</div>
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<!-- login and forgot password forms -->
<div class="modal fade" id="happyModallogin" tabindex="-1" role="dialog" aria-labelledby="happyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="tab-content">
			<!-- Log In Page -->
			<div id="login" class="modal-content tab-pane footer-modal active">
			
				<div class="modal-body login-body">
					<?php echo do_shortcode('[wppb-login]'); ?>
				</div>
					<a class="forgot-pw" data-toggle="tab" href="#reset">Forgot Password?</a>
			</div>

			<!-- Reset Password Page -->
			<div id="reset" class="modal-content tab-pane fade footer-modal">
				
				<div class="modal-body">
					<?php echo do_shortcode('[wppb-recover-password]'); ?>
				</div>
				<a class="back-signin" data-toggle="tab" href="#login">Back to Sign In</a>
			</div>
		</div>
	</div>
</div> <!-- end of modal login div -->

<!-- register forms-->
<div class="modal fade" id="happyModalregister" tabindex="-1" role="dialog" aria-labelledby="happyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<div class="tab-content register-wrap">
			<div id="register" class="modal-content tab-pane footer-modal active">		      
				<div class="modal-body register-body">
					<?php echo do_shortcode('[wppb-register]'); ?>
				</div>		     
			</div>
		</div>		
	</div>
</div>
<!-- end of register modal -->

<!-- logout forms-->
<div class="modal fade" id="happyModallogout" tabindex="-1" role="dialog" aria-labelledby="happyModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>

		<div class="tab-content logout-wrap">
			<div id="logout" class="modal-content tab-pane footer-modal active">		      
				<div class="modal-body logout-body">
					<?php echo do_shortcode('[wppb-logout]'); ?>
				</div>		     
			</div>			
		</div>
	</div>
</div>
<!-- end of register modal -->

<?php wp_footer(); ?>
</body>
</html>