<?php
/* Template Name: Archive Page Custom */
get_header(); ?>

<div id="content" class="site-content">

<div class="container">

        <?php while ( have_posts() ) : the_post(); // standard WordPress loop. ?>

          <?php echo "wpis"; ?>

        <?php endwhile; // end of the loop. ?>

  <div class="sidebar-wrap col-md-3 content-left-wrap">
    <?php get_sidebar(); ?>
  </div>

</div><!-- .container -->

<?php get_footer(); ?>
