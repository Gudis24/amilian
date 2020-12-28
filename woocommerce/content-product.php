<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li id="id-<?php the_id(); ?>" class="product column3" title="<?php the_title(); ?>">
	<a href="<?php the_permalink(); ?>" class="imageWrapper" id="id-<?php the_id(); ?>" title="<?php the_title(); ?>">
	<?php if (has_post_thumbnail( $products->ID ))
					echo get_the_post_thumbnail($products->ID, 'product');
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
