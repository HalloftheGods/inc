<?php if ( !is_front_page() ) : ?>
    
    <?php if ( !get_theme_mod( 'satori-content-titles', false ) ) : ?>
        
        <header class="entry-header">
            
            <?php if ( is_home() ) : ?>
                
                <?php echo '<h2 class="entry-title">' . get_the_title( get_option('page_for_posts', true) ) . '</h1>'; ?>
                
            <?php else: ?>
                
                <?php the_title( '<h2 class="entry-title">', '</h1>' ); ?>
                
            <?php endif; ?>
            
            <?php if ( ! is_front_page() ) : ?>
        
    	        <?php if ( function_exists( 'bcn_display' ) ) : ?>
    		        <div class="breadcrumbs">
    		            <?php bcn_display(); ?>
    		        </div>
    	        <?php endif; ?>
    	        
    	    <?php endif; ?>
            
        </header><!-- .entry-header -->
    
    <?php endif; ?>

<?php endif; ?>