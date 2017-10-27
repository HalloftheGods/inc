<?php 

$orig_post = $post;
global $post;

$categories = get_the_category($post->ID);

if ($categories) {

	$category_ids = array();

	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
	
	$args = array(
		'category__in'     => $category_ids,
		'post__not_in'     => array($post->ID),
		'posts_per_page'   => 3, // Number of related posts that will be shown.
		'ignore_sticky_posts' => 1,
		'orderby' => 'rand'
	);

	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) { ?>
		<div class="related-post row">
			<h3 class="related-post-title">
				<?php _e('Other Post You May Like', 'key-lock'); ?>
			</h3>
		<?php while( $my_query->have_posts() ) {
			$my_query->the_post();?>
				<div class="related-item col-md-4">
					
					<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					
				</div>
		<?php
		}
		echo '<div class="clearfix"></div></div>';
	}
}
$post = $orig_post;
wp_reset_query();

?>