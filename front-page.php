<?php get_header();

// slider

if( have_rows('slider') ): //parent group field
while( have_rows('slider') ): the_row(); ?>
<section class="slider">
  <div id="mainSlider" class="slickSlider siteWidth">
    <?php if( have_rows('slide') ): //child group field
  	while( have_rows('slide') ): the_row(); ?>
      <?php $image = get_sub_field('image'); ?>
      <?php $image_mobile = get_sub_field('image_mobile'); ?>
      <?php $link = get_sub_field('link'); ?>
      <?php $image_url = wp_get_attachment_image_src($image['id'],'slider'); ?>
      <?php $image_mobile_url = wp_get_attachment_image_src($image_mobile['id'],'slider_mobile'); ?>
        <a <?php if ($link): ?>href="<?php echo $link; ?>"<?php endif; ?> class="<?php if ($image['caption']):?>textOnSlide <?php endif; ?>">
          <picture class="sliderImage">
            <source media="(min-width: 768px)" srcset="<?php echo $image_url[0] ?>">
              <?php if ($image_mobile['url']): ?>
                <img loading="lazy" src="<?php echo $image_mobile_url[0] ?>" alt="<?php $image_mobile['alt'] ?>" />
              <?php else: ?>
                <img loading="lazy" src="<?php echo $image_url[0] ?>" alt="<?php $image['alt'] ?>" />
              <?php endif; ?>
          </picture>
          <?php if ($image['caption']):?>
          <div class="wrapper">
            <div class="caption"><?php echo $image['caption']; ?></div>
          </div>
        <?php endif; ?>
        </a>
    <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
<?php endwhile; ?>
<?php endif; ?>

<!-- slider end -->

<!-- boxes -->
<section class="boxes">
  <div class="siteWidth">
    <div class="flexing marginWrapper">
      <?php if(have_rows('kafelki')): while(have_rows('kafelki')) : the_row(); ?>
          <?php $title = get_sub_field('tytul_kafalka'); ?>
          <?php $image = get_sub_field('zdjecie'); ?>
          <?php $link = get_sub_field('link'); ?>
          <div class="boxWrap column3">
            <a href="<?php echo $link; ?>" class="box">
              <div class="boxTitle"><?php echo $title; ?></div>
              <?php echo wp_get_attachment_image($image['id'],'box'); ?>
            </a>
          </div>
      <?php endwhile; endif;  ?>
    </div>
  </div>
</section>
<!-- boxes end -->

<?php /*
<!-- best sellers -->
<section id="bestSellers">
  <div class="siteWidth">
    <div class="sliderTitle justifyBetween alignCenter">
      <h2><?php _e('Bestseller','sklep-lookslike'); ?></h2>
      <div class="arrowsNavi arrowsNavi-bestSellers flexing alignCenter justifyCenter"></div>
    </div>
    <?php
    $args = array(
            'post_type' 	=> 'product',
      			'post_status' => 'publish',
		        'meta_key' 		=> 'total_sales',
		        'orderby' 		=> 'meta_value_num',
		        'order' 			=> 'DESC',
            'posts_per_page' => 4,
    );
    $loop = new WP_Query( $args ); ?>
    <div class="sliderWrapper">
      <div id="slickBestSeller" class="productSlider">
        <?php  while ( $loop->have_posts() ) : $loop->the_post();?>
        <div id="id-<?php the_id(); ?>" class="product" title="<?php the_title(); ?>">
          <a href="<?php the_permalink(); ?>" class="imageWrapper" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">
          <?php if (has_post_thumbnail( $loop->post->ID ))
                  echo get_the_post_thumbnail($loop->post->ID, 'product');
                  else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="260px" height="260px" />'; ?>
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
        </div>
        <?php endwhile; ?>
      </div>
      <?php wp_reset_query(); ?>
    </div>
  </div>
</section>
<!-- best sellers end -->
 */ ?>

<!-- specific category -->
      <?php
        foreach(get_field('slidery_produktow') as $category):
          $term = get_term_by( 'id', $category['kategoria'], 'product_cat' )
          ?>
          <section id="<?= $term->slug ?>" class="section">
            <div class="siteWidth">
              <div class="sliderTitle justifyBetween alignCenter">
                <h2><?= $term->name ?></h2>
                <div class="arrowsNavi arrowsNavi-<?= $term->slug ?> flexing alignCenter justifyCenter"></div>
              </div>
              <?php $post_args = array(
                    'posts_per_page' => $category['limit'],
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id',
                            'terms' => $category['kategoria'],
                                )
                            )
                      );
            $myposts = get_posts($post_args);   ?>
            <div class="sliderWrapper">
              <div id="slick-<?= $term->slug ?>" class="slick-<?= $term->slug ?> productSlider">
                <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    <div id="id-<?php the_id(); ?>" class="product">
                      <a href="<?php the_permalink(); ?>" class="imageWrapper" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">
                      <?php
                        if (has_post_thumbnail( $post->ID ))
                          echo get_the_post_thumbnail($post->ID, 'product');
                        else
                          echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" width="260px" height="260px" />'; ?>
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
                    </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php wp_reset_postdata(); ?>
         </div>
         <script>
         jQuery('.slick-<?= $term->slug ?>').slick({
           slidesToShow: 4,
           slidesToScroll: 1,
           autoplay: false,
           rows:0,
           infinte: true,
           prevArrow: '<div class="icon-left-open-mini"></div>',
           nextArrow: '<div class="icon-right-open-mini"></div>',
           appendArrows: jQuery('.arrowsNavi-<?= $term->slug ?>'),
           dots: false,
           responsive: [
             {
               breakpoint: 980,
               settings: {
                 slidesToShow:3,
               }
             },
             {
               breakpoint: 770,
               settings: {
                 slidesToShow:2,
               }
             },
             {
               breakpoint:600,
               settings: {
                 slidesToShow:1,
               }
             }
           ]
         });
         </script>
        </section>
    <?php endforeach; ?>
    <section id="freeDelivery" class="section">
      <?php $footer_image = get_field('zdjecie_stopka', 'option'); ?>
      <div class="freeDeliveryHero">
        <div class="wrapper">
          <div class="deliveryText">
            <div class="deliveryCaption"><?php echo $footer_image['caption'] ?></div>
            <h2 class="deliveryDesc"><?php echo $footer_image['description'] ?></h2>
          </div>
        </div>
        <img loading="lazy" src="<?php echo $footer_image['url'] ?>" alt="<?php echo $footer_image['alt'] ?>">
      </div>
    </section>
<!-- specific category end -->
<?php get_footer(); ?>
