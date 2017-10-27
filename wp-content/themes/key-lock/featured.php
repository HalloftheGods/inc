<?php $featured_cat = get_theme_mod( 'keylock_slider_cat' ); 
?>

<div class="featured-area">
		
	<div id="owl-demo" class="owl-carousel">
		<?php $feat_query = new WP_Query( array( 'cat' => $featured_cat, 'showposts' => 8 , 'orderby' => 'date', 'post__not_in' => get_option( 'sticky_posts' )) ); ?>
		<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>
			
			<div class="slider-item">
				<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('key_lock_featured-thumb'); ?></a>
				<?php } else { ?>
				<a href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/wp_bg.png"></a>
				<?php } ?>
					<div class="slider-text">
						<h2><a href="<?php echo get_permalink(); ?>" class="slider-title"><?php the_title(); ?></a></h2>
						<a href="<?php echo get_permalink(); ?>" class="slider-readmore"><?php _e('Read More' , 'key-lock'); ?></a>
					</div>
			</div>
		<?php endwhile;  wp_reset_postdata(); endif; ?>
	</div>
</div>