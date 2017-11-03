<div id="top-bar">
	<div class="container top-bar-inner">
		<div id="contact-icons">
			<?php if (get_theme_mod('fifteen_mailid')) : ?>
			<div class="icon">
				<span class="fa fa-envelope"></span>
                <span class="value"><a href="mailto:<?php echo esc_html(get_theme_mod('fifteen_mailid')); ?>"><?php echo esc_html(get_theme_mod('fifteen_mailid')); ?></a></span>
			</div>
			<?php endif; ?>
			<?php if (get_theme_mod('fifteen_phone')) : ?>
			<div class="icon">
				<span class="fa fa-phone"></span>
                <span class="value"><a href="tel:<?php echo esc_html(get_theme_mod('fifteen_phone')); ?>"><?php echo esc_html(get_theme_mod('fifteen_phone')); ?></a></span>
			</div>
			<?php endif; ?>
		</div>
		
	</div>
</div>