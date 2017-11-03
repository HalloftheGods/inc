<?php //This file ensures each section gets a consistent Section Title
	function fifteen_section_title( $title ) { 
		if ($title != 'fifteen') : ?>
			<div class="section-title">
		    	<span><?php echo $title ?></span>
		    </div>
	<?php endif; 
	} ?>