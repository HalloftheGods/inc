<?php
/**
 * The template for displaying all single posts.
 *
 * @package Key Lock
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8 <?php if(get_theme_mod( 'keylock_layout_column') == '1column' ) : ?>col-md-offset-2 <?php endif; ?> <?php if(get_theme_mod( 'keylock_layout_sidebar' ) == 'left') : ?>right-sidebar<?php endif; ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		
		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	
	
<?php 
if (get_theme_mod('keylock_layout_column', '2column') == '2column') :
	get_sidebar(); 
endif;
?>
<?php get_footer(); ?>
