<?php
/**
 * Template Name: My Account
 *
 * @package happy 2 help you
 */
?>
<?php get_header(); ?>
<div class="container myaccount-wrap">  
  <h2 class="section-title">My Account</h2>
  <?php
    while ( have_posts() ) : the_post();
    the_content();
    endwhile; // End of the loop.
  ?>  
</div>

<?php get_footer(); ?>