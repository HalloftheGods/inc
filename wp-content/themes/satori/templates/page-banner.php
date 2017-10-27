<?php
if ( is_archive() || is_search() ) {
    if ( satori_is_woocommerce_activated() && is_shop() ) {
        $shop = get_option( 'woocommerce_shop_page_id' );
        $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $shop ) );
    } else {
        $page = get_option( 'page_for_posts' );
        $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $page ) );
    }
} else {
    $page = get_queried_object();
    $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $page->ID ) );
}
if ( $featured_image ) : ?>
<div class="<?php echo ( $featured_image ) ? sanitize_html_class( 'has-' ) : sanitize_html_class( 'no-' ); ?>page-thumbnail page-banner" <?php echo ( $featured_image ) ? 'style="background-image: url(' . esc_url( $featured_image ) . ');"' : ''; ?>>
    
    <?php if ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-small' ) : ?>
        <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small.gif" />
    <?php elseif ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-screen' ) : ?>
        
    <?php else : ?>
        <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
    <?php endif; ?>
    
    <?php if ( !get_theme_mod( 'satori-banner-titles', false ) ) : ?>
        <div class="page-banner-inner">
            <?php if ( is_home() ) : ?>
                <?php echo '<h3 class="entry-title">' . get_the_title( get_option('page_for_posts', true) ) . '</h3>'; ?>
            <?php else: ?>
                <?php if ( satori_is_woocommerce_activated() && is_shop() ) : ?>
                    <?php echo '<h3 class="entry-title">' . get_the_title( $shop ) . '</h3>'; ?>
                <?php else: ?>
                    <?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    
</div><?php
endif; ?>