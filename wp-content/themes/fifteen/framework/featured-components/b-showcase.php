<?php
/* The Template to Render the Slider
*
*/
?>
<?php if ( IHSS::fetch('showcase_enable') && is_front_page() && !is_home()) : ?>
<div id="b-showcase" class="featured-section-area">
	<div class="container">
	            <?php
	            for ( $i = 1; $i <= 3; $i++ ) :
	
					$url = esc_url( IHSS::fetch('showcase_url', $i ));
					$img = esc_url( IHSS::fetch('showcase_img', $i ));
					$title = esc_html( IHSS::fetch('showcase_title', $i ) );
					$desc = esc_html( IHSS::fetch('showcase_desc', $i) );
					
					if ($img) :
					?>
					
					<div class="showcase-item col-md-4 col-sm-4">
			            <a href="<?php echo $url; ?>">
				            <img src="<?php echo $img ?>"/>
				            <div class="dots"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i></div>
				            <div class="showcase-title"><?php echo $title; ?></div>
				            <div class="showcase-desc"><?php echo $desc; ?></div>
				        </a>
					</div>
	             <?php
		            endif;
		        endfor; ?>
	               
	</div>    
</div>
<?php endif; ?>