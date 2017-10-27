<?php
/**
 * The template for displaying search results pages.
 *
 * @package Key Lock
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8 <?php if(get_theme_mod( 'keylock_layout_column') == '1column' ) : ?>col-md-offset-2 <?php endif; ?> <?php if(get_theme_mod( 'keylock_layout_sidebar' ) == 'left') : ?>right-sidebar<?php endif; ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( '<i class="fa fa-search"></i>' . esc_html__( ' %s', 'key-lock' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php key_lock_post_navigation(); ?>

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
