<?php
/**
 * Template Name: Sale
 * Template Post Type: page
 */

get_header();
?>
<section class="siteWidth flexing justifyBetween alignStart section">
    <div id="sideBar">
      <?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
        <?php do_shortcode("[woocommerce_product_filter_price]"); ?>
          <?php dynamic_sidebar( 'home_right_1' ); ?>
      <?php endif; ?>
    </div>
    <div id="products">
      <div class="filterWrapper">
        Filters Container
      </div>
      <div class="products">
                <?php
                    // Only run on shop archive pages, not single products or other pages
                        // Products per page
                          $args = array(
                              'post_type'      => 'product',
                              'posts_per_page' => 8,
                              'meta_query'     => array(
                                  'relation' => 'OR',
                                  array( // Simple products type
                                      'key'           => '_sale_price',
                                      'value'         => 0,
                                      'compare'       => '>',
                                      'type'          => 'numeric'
                                  ),
                                  array( // Variable products type
                                      'key'           => '_min_variation_sale_price',
                                      'value'         => 0,
                                      'compare'       => '>',
                                      'type'          => 'numeric'
                                  )
                              )
                          );
                        // Set the query
                        $products = new WP_Query( $args );
                        // Standard loop
                        if ( $products->have_posts() ) :
                            while ( $products->have_posts() ) : $products->the_post();
                                // Your new HTML markup goes here
                                ?>
                                <li id="id-<?php the_id(); ?>" class="product column3" title="<?php the_title(); ?>">
                                  <a href="<?php the_permalink(); ?>" class="imageWrapper" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">
                                  <?php if (has_post_thumbnail( $products->ID ))
                                          echo get_the_post_thumbnail($products->ID, 'product');
                                          else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="260px" height="260px" />'; ?>
                                          <?php echo add_percentage_to_sale_badge( $html, $post, $product ); ?>
                                  </a>
                                  <div class="wrapper productCategories flexing justifyCenter">
                                    <?php global $post; ?>
                                  <?php  $terms = get_the_terms( $post->ID, 'product_cat' );
                                         $howManyTerms = count($terms);
                                         $counter = 0;
                                         foreach ($terms as $termInner): $counter++;?>
                                         <?php if (($counter > 0) && ($counter < $howManyTerms) ) : ?>
                                           <a class="categoryLink" href="<?php echo get_category_link($termInner->term_id); ?>"><?php echo $termInner->name.', '; ?></a>
                                         <?php else: ?>
                                           <a class="categoryLink" href="<?php echo get_category_link($termInner->term_id); ?>"><?php echo $termInner->name; ?></a>
                                         <?php endif; ?>
                                         <?php endforeach; ?>
                                  </div>
                                  <?php $product = wc_get_product( $post->ID ); ?>
                                  <a class="productTitle" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                                  <div class="price"><?php echo $product->get_price_html(); ?></div>
                                  <div class="btnWrap flexing justifyCenter alignCenter">
                                        <?php
                                        echo apply_filters(
                                            'woocommerce_loop_add_to_cart_link',
                                            sprintf(
                                                '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s ajax_add_to_cart">%s</a>',
                                                esc_url( $product->add_to_cart_url() ),
                                                esc_attr( $product->get_id() ),
                                                esc_attr( $product->get_sku() ),
                                                $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                esc_attr( $product->product_type ),
                                                esc_html( 'In den Warenkorb' )
                                            ),
                                            $product
                                        );?>
                                  </div>
                                </li>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                ?>
                </div>
              </div>
          </section>
<?php get_footer(); ?>
