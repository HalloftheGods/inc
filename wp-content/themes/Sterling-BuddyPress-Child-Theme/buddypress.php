<?php get_header(); ?>

<?php get_template_part( 'template-part-page-slider', 'childtheme' ); ?>

    <section id="content-container" class="clearfix">
        <div id="main-wrap" class="clearfix">
            <?php
                get_template_part( 'template-part-page-banner', 'childtheme' );
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                
                //remove my_formatter for this template only.
                //didn't know can do this!
                remove_filter( 'the_content', 'my_formatter', 99 );
                    
                    the_content();
                    truethemes_link_pages();
                endwhile; endif;
                //comments_template( '', true );
                get_template_part( 'template-part-inline-editing', 'childtheme' );
            ?>
        </div><!-- end #main-wrap -->

<?php get_footer(); ?>