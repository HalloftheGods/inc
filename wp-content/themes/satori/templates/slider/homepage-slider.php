<?php
if ( get_theme_mod( 'satori-slider-type', false ) == 'satori-slider-default' ) : ?>
    
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'satori-slider-cats', false ) ) {
        $slider_cats = get_theme_mod( 'satori-slider-cats' );
    } ?>
    
    <?php if( $slider_cats ) : ?>
        
        <?php $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        
        <?php if ( $slider_query->have_posts() ) : ?>

            <div class="home-slider-wrap home-slider-remove" data-auto="6500">
                <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
                <div class="home-slider">
                    
                    <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
                        $slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                        
                        <div class="home-slider-block"<?php echo ( has_post_thumbnail() ) ? ' style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                        
                            <?php if ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-small' ) : ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small.gif" />
                            <?php elseif ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-screen' ) : ?>
                                
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
                            <?php endif; ?>
                            
                            <div class="home-slider-block-inner">
                                <div class="home-slider-block-bg">
                                    <h3>
                                        <?php the_title(); ?>
                                    </h3>
                                    <p><?php the_content(); ?></p>
                                </div>
                            </div>
                            
                        </div>
                    
                    <?php endwhile; ?>
                    
                </div>
                <div class="home-slider-pager"></div>
                <?php do_action ( 'satori_after_default_slider' ); ?>
            </div>
            
        <?php endif; wp_reset_postdata(); ?>
        
    <?php else : ?>
        
        <div class="home-slider-wrap home-slider-remove" data-auto="6500">
            <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
            <div class="home-slider">
                
                <div class="home-slider-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/demo/slider_default.jpg);">
                    
                    <?php if ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-small' ) : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_small.gif" />
                    <?php elseif ( get_theme_mod( 'satori-slider-size', false ) == 'satori-slider-size-screen' ) : ?>
                        
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri() ?>/images/slider_blank_img_medium.gif" />
                    <?php endif; ?>
                        
                    <div class="home-slider-block-inner">
                        <div class="home-slider-block-bg">
                            <h3>
                                <?php _e( 'Highly Customizable', 'satori' ); ?>
                            </h3>
                            <p><?php _e( 'Integrated with top WordPress plugins', 'satori' ); ?></p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="home-slider-pager"></div>
            
        </div>

    <?php endif; ?>
    
<?php
elseif ( get_theme_mod( 'satori-slider-type', false ) == 'satori-meta-slider' ) : ?>
    
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'satori-meta-slider-shortcode' ) ) {
        $slider_code = get_theme_mod( 'satori-meta-slider-shortcode' );
    } ?>
    
    <?php echo ( $slider_code ) ? do_shortcode( esc_html( $slider_code ) ) : ''; ?>
    
<?php else : ?>
    
    <!-- No Slider -->
    
<?php endif; ?>