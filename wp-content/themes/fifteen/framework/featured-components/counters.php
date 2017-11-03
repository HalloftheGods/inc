<?php
/* The Template to Render the Slider
*
*/
?>
<?php if ( IHSS::fetch('counter_enable') && is_front_page() && !is_home()) : ?>
<div id="counters" class="featured-section-area">
	<div class="container">
				<?php $section_title = esc_html(IHSS::fetch('counter_title'));
					fifteen_section_title( $section_title ); ?>
	            <?php
	            for ( $i = 1; $i <= 4; $i++ ) :
	
					$title = esc_html( IHSS::fetch('counter_title', $i ) );
					$desc = esc_html( IHSS::fetch('counter_desc', $i) );
					
					?>
					
					<div class="counter-item col-md-3 col-sm-3 col-xs-6">
			            <div class="counter-content">
							<div class="counter-body"><?php echo $desc; ?></div>
							<div class="counter-title"><?php echo $title; ?></div>
			           	</div>
					</div>
					<?php
		        endfor; ?>
	               
	</div>    
</div>
<?php endif; ?>