<?php if ( IHSS::fetch('parallax_enable') && is_front_page() && !is_home()) : ?>
<div id="parallax" class="featured-section-area" data-parallax="scroll" data-speed="0.15" data-image-src="<?php echo IHSS::fetch('parallax_img1') ?>">
	<div class="layer"></div>
	<div class="container">
				<?php $section_title = esc_html(IHSS::fetch('parallax_title1'));
					fifteen_section_title( $section_title ); ?>
	            <?php
	            for ( $i = 1; $i <= 1; $i++ ) :
	
					$img = esc_url( IHSS::fetch('parallax_img', $i ));
					$desc = esc_html( IHSS::fetch('parallax_desc', $i) );
					
					if ($img) :
					?>
					
					<div class="parallax-item">
			            
			            <div class="parallax-content">
							<div class="parallax-body"><?php echo $desc; ?></div>
							
							<div class="buttons">
								<?php if ( IHSS::fetch('parallax_btn1')) : ?>
									<a href="<?php echo IHSS::fetch('parallax_url1') ?>"><?php echo IHSS::fetch('parallax_btn1'); ?></a>
								<?php endif; ?>
								<?php if (IHSS::fetch('parallax_btn2')) : ?>
									<a href="<?php echo IHSS::fetch('parallax_url2') ?>"><?php echo IHSS::fetch('parallax_btn2'); ?></a>
								<?php endif; ?>
							</div>
			           	</div>
					</div>
					<?php
		            endif;
		        endfor; ?>
	               
	</div>    
</div>
<?php endif; ?>