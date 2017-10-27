		<form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
					<input id='search-field' type='search' name='s' placeholder='<?php echo esc_attr('Search...','' , 'key-lock'); ?>'  value="<?php echo get_search_query() ?>" size='15'>
				</form>



