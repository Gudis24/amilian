<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lookslikeStore
 */

get_header();
    /**
    * Hook - lookslikeStore_page_container_wrp_start - 10
	* Hook - lookslikeStore_header_middle 	- 20.
	* Hook - lookslikeStore_header_bottom 	- 30.
    *
    * @hooked lookslikeStore_page_container_start
    */
    do_action( 'lookslikeStore_page_container_start' );
    ?>
     <div id="primary" class="content-area">
		<main id="main" class="site-main post-wrap">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			/**
			* Hook - lookslikeStore_the_posts_navigation - 10
			*
			* @hooked lookslikeStore_the_posts_navigation
			*/
			do_action( 'lookslikeStore_the_posts_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

    /**
    * Hook - lookslikeStore_page_container_wrp_end - 100
	* Hook - lookslikeStore_header_middle 	- 20.
	* Hook - lookslikeStore_header_bottom 	- 30.
    *
    * @hooked lookslikeStore_page_container_end
    */
    do_action( 'lookslikeStore_page_container_end' );
get_footer();
