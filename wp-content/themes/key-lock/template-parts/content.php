<?php
/**
 * Template part for displaying posts.
 *
 * @package Key Lock
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( has_post_thumbnail( ) ) { ?>
	<div class="featured-image"><?php the_post_thumbnail('key_lock_featured-thumb'); ?></div><?php } ?>
	<header class="entry-header">
	
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php key_lock_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		
		<div class="entry-meta">
		<?php key_lock_entry_footer(); ?>
		</div>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'key-lock' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'key-lock' ),
				'after'  => '</div>',
				'next_or_number' => 'next',
				'separator' => '',
				'nextpagelink'     => __( 'Next page', 'key-lock' ),
				'previouspagelink' => __( 'Previous page', 'key-lock' ),
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
