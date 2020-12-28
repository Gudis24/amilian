<?php
/**
 * Template Name: Kontakt
 * Template Post Type: page
 */

get_header();
?>
<section class="siteWidth section">
  <div class="theContent noSidebar">
      <?php the_content(); ?>
      <?php echo BuildformAjax('identyfikator', 'contact', 'Formularz kontaktowy'); ?>
  </div>
</section>

<?php get_footer(); ?>
