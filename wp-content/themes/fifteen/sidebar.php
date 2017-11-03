<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package 
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( fifteen_load_sidebar() ) : ?>
<div id="secondary" class="widget-area <?php do_action('fifteen_secondary-width') ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
<?php endif; ?>
