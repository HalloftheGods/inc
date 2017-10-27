<div class="author-post row">
		
	<h3 class="author-post-title">
		<?php the_author_posts_link(); ?>
	</h3>

	
	<div class="author-wrapper">
		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
		</div>
	
		<div class="author-description">
			<p><?php the_author_meta('description'); ?></p>
		
		<div class="clearfix"></div>
		
		</div>
	</div> <!-- end .author-wrapper -->
</div>