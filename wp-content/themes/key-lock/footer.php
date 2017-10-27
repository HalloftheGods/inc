<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Key Lock
 */

?>

	</div><!-- .row -->
	</div><!-- #content -->

	<div class="clearfix"></div>
	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="social-media">
			<?php if(get_theme_mod ('keylock_social_twitter')): ?>
			<a href="<?php echo esc_url(get_theme_mod ('keylock_social_twitter', '')); ?>"><i class="fa fa-twitter"></i></a>
			<?php endif; ?>
			<?php if(get_theme_mod ('keylock_social_instagram')): ?>
			<a href="<?php echo esc_url(get_theme_mod ('keylock_social_instagram', '')); ?>"><i class="fa fa-instagram"></i></a>
			<?php endif; ?>
			<?php if(get_theme_mod ('keylock_social_linkedin')): ?>
			<a href="<?php echo esc_url(get_theme_mod ('keylock_social_linkedin', '')); ?>"><i class="fa fa-linkedin"></i></a>
			<?php endif; ?>
			</div>
		<div class="site-info">
			<?php printf( esc_html__( 'A Theme by %1$s', 'key-lock' ), '<a href="http://malvouz.com/" rel="designer">Malvouz</a>' ); ?>
		</div><!-- .site-info -->


	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
