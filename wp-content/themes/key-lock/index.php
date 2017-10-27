<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Key Lock
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8 <?php if(get_theme_mod( 'keylock_layout_column') == '1column' ) : ?>col-md-offset-2 <?php endif; ?> <?php if(get_theme_mod( 'keylock_layout_sidebar' ) == 'left') : ?>right-sidebar<?php endif; ?>">
		<main id="main" class="site-main" role="main">
		
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php key_lock_post_navigation(); wp_reset_postdata(); ?>
			

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
if (get_theme_mod('keylock_layout_column', '2column') == '2column') :
	get_sidebar(); 
endif;
?>
<?php get_footer(); ?>