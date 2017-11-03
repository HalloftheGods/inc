<?php
/* The Template to Render the Slider
*
*/
?>
<?php if ( IHSS::fetch('testimonial_enable') && is_front_page() && !is_home()) : ?>
<div id="testimonials" class="featured-section-area">
	<div class="container">
				<?php $section_title = esc_html(IHSS::fetch('testimonial_title'));
					fifteen_section_title( $section_title ); ?>
	            <?php
	            for ( $i = 1; $i <= 4; $i++ ) :
	
					$img = esc_url( IHSS::fetch('testimonial_img', $i ));
					$title = esc_html( IHSS::fetch('testimonial_title', $i ) );
					$desc = esc_html( IHSS::fetch('testimonial_desc', $i) );
					
					if ($img) :
					?>
					
					<div class="testimonial-item col-md-6 col-sm-6">
			            <div class="image col-md-3 col-xs-3">
			            	<img src="<?php echo $img ?>">
			            </div>	
			            <div class="testimonial-content col-md-9 col-xs-9">
							<div class="testimonial-body"><?php echo $desc; ?></div>
							<div class="testimonial-author"><?php echo $title; ?></div>
			           	</div>
					</div>
					<?php
		            endif;
		        endfor; ?>
	               
	</div>    
</div>
<?php endif; ?>