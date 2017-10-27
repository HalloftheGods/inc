<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Key Lock
 */

if ( ! function_exists( 'key_lock_post_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 */
function key_lock_post_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'key-lock' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-previous"><?php previous_posts_link( '<i class="fa fa-angle-left"></i>' ); ?></div>
			<?php else : ?>
			<div class="nav-previous nav-hidden"><a href="#"><i class="fa fa-angle-left"></i></a></div>
			<?php endif; ?>

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-next"><?php next_posts_link( '<i class="fa fa-angle-right"></i>') ;?></div>
			<?php else : ?>
			<div class="nav-next nav-hidden"><a href="#"><i class="fa fa-angle-right"></i></a></div>
			<?php endif; ?>
		</div><!-- .nav-links -->
		
		<?php $out = __( 'Page %d of %d', 'key-lock' );
printf( "<div class='page-numbers'>{$out}</div>",
        number_format_i18n( $GLOBALS['paged'] ),
        number_format_i18n( $GLOBALS['wp_query']->max_num_pages )
); ?>
		
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'key_lock_post_single_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function key_lock_post_single_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'key-lock' ); ?></h2>
		<div class="nav-links">
		
		<?php $prev_post = get_previous_post(); $next_post = get_next_post(); ?>
		
		<?php if (!empty( $prev_post )) : ?>		
		<div class="nav-previous">
		<div class="pagi-text">
			<span><?php _e('Previous Post', 'key-lock'); ?></span>
			<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><h5><?php echo get_the_title( $prev_post->ID ); ?></h5></a>
		</div>
		</div>
		<?php endif; ?>
			
		
		<?php if (!empty( $next_post )) : ?>
		<div class="nav-next">
		<div class="pagi-text">
			<span><?php _e('Next Post', 'key-lock'); ?></span>
			<a href="<?php echo get_permalink( $next_post->ID ); ?>"><h5><?php echo get_the_title( $next_post->ID ); ?></h5></a>
		</div>
	
		</div>
		<?php endif; ?>
			
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'key_lock_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function key_lock_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	// DateTime
	echo '<span class="posted-on">' . $posted_on . '</span>';
	
	// Categories
	if ( 'post' == get_post_type() && !get_theme_mod ('keylock_post_cat') ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'key-lock' ) );
		if ( $categories_list && key_lock_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'key-lock' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
	
	// Comments
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && !get_theme_mod ('keylock_post_comment') ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'No comment', 'key-lock' ), esc_html__( '1 Comment', 'key-lock' ), esc_html__( '% Comments', 'key-lock' ) );
		echo '</span>';
	}
	
	// Edit
	if ( !is_customize_preview() ) {
	edit_post_link( esc_html__( '[ Edit ]', 'key-lock' ), '<span class="edit-link">', '</span>' );
	}
}
endif;

if ( ! function_exists( 'key_lock_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function key_lock_entry_footer() {
	
	// Author
	$author = sprintf(
		esc_html_x( '%s', 'post author', 'key-lock' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	echo '<span class="byline"> ' . $author . '</span>'; // WPCS: XSS OK.

	// Hide tag text for pages.
	if ( 'post' == get_post_type() && !get_theme_mod('keylock_post_tag') ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'key-lock' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . $tags_list . '</span>'); // WPCS: XSS OK.
		}
	}
}
endif;



/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function key_lock_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'key_lock_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'key_lock_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so key_lock_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so key_lock_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in key_lock_categorized_blog.
 */
function key_lock_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'key_lock_categories' );
}
add_action( 'edit_category', 'key_lock_category_transient_flusher' );
add_action( 'save_post',     'key_lock_category_transient_flusher' );
