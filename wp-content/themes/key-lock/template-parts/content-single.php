<?php
/**
 * Template part for displaying single posts.
 *
 * @package Key Lock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php key_lock_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<?php the_title( sprintf( '<h1 class="entry-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>
		
		<div class="entry-meta">
		<?php key_lock_entry_footer(); ?>
		</div>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links"><span class="separator">' . esc_html__( 'Pages:', 'key-lock' ) . '</span>',
				'after'  => '</div>',
				'separator' => '<span class="separator"></span>',				
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

<?php 
	if (!get_theme_mod('keylock_post_authorinfo')) :
		get_template_part('template-parts/about-author');
	endif; 
?>

<?php key_lock_post_single_navigation(); ?>

<?php 
	if(!get_theme_mod('keylock_post_relatedpost')) :
		get_template_part('template-parts/related-post'); 
	endif;
?>