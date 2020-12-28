
<?php get_header(); ?>
<section class="siteWidth flexing justifyBetween alignStart section">
  <?php if (!is_account_page() && !is_checkout()): ?>
    <div id="sideBar">
      <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
          <?php dynamic_sidebar( 'home_right_1' ); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  <div id="theContent" class="theContent  <?php if (is_account_page() || is_checkout()): ?>noSidebar<?php endif; ?>">
    <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>

</section>
<?php get_footer(); ?>
