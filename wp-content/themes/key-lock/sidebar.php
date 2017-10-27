<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Key Lock
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area col-md-4 <?php if(get_theme_mod( 'keylock_layout_sidebar', 'right' ) == 'left') : ?>left-sidebar<?php endif; ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
