<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package 
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer title-font" role="contentinfo">
		<div class="site-info container">
			<?php printf( __( 'Theme Designed by %1$s.', 'fifteen' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="nofollow">InkHive</a>' ); ?>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('fifteen_footer_text') == 'fifteen' ) ? ('&copy; '.date_i18n( __( 'Y', 'fifteen' ) ).' '.get_bloginfo('name').__('. All Rights Reserved. ','fifteen')) : esc_html(get_theme_mod('fifteen_footer_text')); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
