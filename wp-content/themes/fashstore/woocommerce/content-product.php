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
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php post_class(); ?>>
    <?php
    /**
     * woocommerce_before_shop_loop_item hook.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action( 'woocommerce_before_shop_loop_item' );
    ?>
    <div class="collection_combine">
        <div class="full-outer">
            <div class="outer-img">
                <div class="inner-img">
                    <a href="<?php the_permalink(); ?>">
    <?php
    /**
     * woocommerce_before_shop_loop_item_title hook.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action( 'woocommerce_before_shop_loop_item_title' );
    ?>              </a>
                </div>
            </div>
        </div>

        <div class="cart-wish-wrapper">
            <?php
            /**
             * woocommerce_after_shop_loop_item hook
             *
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action( 'woocommerce_after_shop_loop_item' ); 
            ?>
            <?php
            if ( function_exists( 'YITH_WCWL' ) ) {
                $url = add_query_arg( 'add_to_wishlist', get_the_ID() );
                ?>
                <a class="item-wishlist" href="<?php echo esc_url( $url ); ?>"><i class="fa fa-heart-o"></i><span class="wish-caption"><?php _e( 'Add to Wishlist', 'fashstore' );?></span></a>
                <?php
            }
            ?>
        </div><!--.cart-wish-wrapper--> 
    </div>
    <div class="collection_desc clearfix">
        <a href="<?php the_permalink(); ?>" class="collection_title">
            <h3><?php the_title(); ?></h3>
            <p class="short_desc"><?php echo accesspress_letter_count(get_the_excerpt(), 20); ?></p>
        </a>
        <div class="price-cart">
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action('woocommerce_after_shop_loop_item_title');
            ?>
            <div class="product-list-description">
                <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?>
            </div>
        </div>
    </div>
</li>
