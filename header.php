<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="google-site-verification" content="mc_sXzXEl_AaIz0k7rrw10oWKVJDspp6o-Snqt1xQGs" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container primary-wrap"> <!-- header menu -->       
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-public-primary-menu" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="menu-public-primary-menu" class="collapse navbar-collapse justify-content-center">
			      	<ul class="nav navbar-nav navbar-right public-primary-menu">

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'false',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker(),
                'items_wrap'	  => '%3$s'
                ));
                ?>
                <li itemscope="itemscope" class="menu-item custom-menu-item">
                    <?php
                        $classes = get_body_class();
                        if (in_array('logged-in',$classes)) {
                    ?>
                        <a class="menu-my-account" href="/happy/my-account">My Account</a>
                        <span> | </span>
                        <a class="menu-logout" data-toggle="modal" data-target="#happyModallogout">Log out</a>
                    
                    <?php } else { ?>
                        <a class="menu-login" data-toggle="modal" data-target="#happyModallogin">Log in</a>
                        <span> | </span>
                        <a class="menu-register" data-toggle="modal" data-target="#happyModalregister">Register</a>
                    <?php } ?>
                </li>
            </nav>            
        </div>

        <div class="container-fluid header-wrap">
                <!-- primary public menu -->
            <nav class="row navbar navbar-expand-xl p-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <?php
                wp_nav_menu(array(
                'theme_location'    => 'header',
                'container'       => 'div',
                'container_id'    => 'header-nav',
                'container_class' => 'collapse navbar-collapse justify-content-center',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div>
	</header><!-- #masthead -->

<!-- Homepage Hero Banner -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container-fluid hero-text-wrap">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
                }else{
                        echo esc_html__('');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
<!-- end of Homepage Hero Banner -->

	<div id="content" class="site-content">				
<?php endif; // !is_page_template ?>