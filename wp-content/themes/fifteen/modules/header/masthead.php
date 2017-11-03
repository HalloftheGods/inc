<header id="masthead" class="site-header" role="banner" data-parallax="scroll" data-speed="0.15" data-image-src="<?php echo get_header_image() ?>">
	<div class="layer"></div>
		<div class="container a">
			<div class="site-branding col">
				<?php if ( has_custom_logo() ) : ?>
				<div id="site-logo">
					<?php the_custom_logo(); ?>
				</div>
				<?php endif; ?>
				<div id="text-title-desc">
				<h1 class="site-title title-font"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
			</div>
			
			<div id="social-icons">
				<?php get_template_part('modules/social/social', 'fa'); ?>
			</div>
            <div id="slickmenu"></div>
			<?php get_template_part('modules/navigation/primary','menu'); ?>
		</div>
    <?php if(is_singular()): the_title( '<h1 class="container single-entry-title">', '</h1>' ); endif; ?>
</header><!-- #masthead -->