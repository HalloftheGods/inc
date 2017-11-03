<?php if(get_theme_mod('fifteen_degree_enable') && is_front_page()):?>
    <div id="featured-degree" class="featured-section-area">
        <div class="container">
            <div class="col-md-12 col-sm-12 degree-outer">
                <?php if(get_theme_mod('fifteen_degree_title')):?>
                    <div class="section-title">
                        <?php echo esc_html( get_theme_mod('fifteen_degree_title')); ?>
                    </div>
                <?php endif;?>

                <?php /* Start the Loop */ $count=0; ?>
                <?php
                $args = array( 'posts_per_page' => 3, 'category' => get_theme_mod('fifteen_degree_cat') );
                $lastposts = get_posts( $args );
                foreach ( $lastposts as $post ) :
                    setup_postdata( $post ); ?>

                    <div class="degree-wrapper col-md-4 col-sm-4">
                        <a href="<?php the_permalink() ?>">
                            <div class="featured-thumb">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('fifteen-thumb'); ?></div>
                                <?php else : ?>
                                    <div title="<?php the_title_attribute() ?>"><img src="<?php echo esc_html(get_template_directory_uri()."/assets/images/placeholder2.jpg"); ?>"></div>
                                <?php endif; ?>

                                <p class="description">
                                    <?php echo substr(get_the_excerpt(),0,60).(get_the_excerpt() ? "..." : "" ); ?>
                                </p>

                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>


                    <?php $count++;
                    if ($count == 4) break;
                endforeach; ?>


                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif;?>