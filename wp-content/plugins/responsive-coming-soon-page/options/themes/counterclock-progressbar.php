<?php if($wl_rcsm_options['maintenance_date'] != '') { ?><script>jQuery(document).ready(function(jQuery) {	countdown('<?php echo $wl_rcsm_options['maintenance_date']; ?>', rcsm_callback); /* Date format ('MM/DD/YYYY  HH:MM:SS TT'); */
	function rcsm_callback(){
		//jQuery('.container-fluid.count').hide();		//location.reload(true);		
	};});</script>
<?php } ?>
<div class="container-fluid space count">
	<div class="container" id="timer">
		<div class="row maintance-detail">
			<h2 data-sr="enter top"><span class="icon <?php echo $wl_rcsm_options['counter_title_icon']; ?> "></span> <?php echo $wl_rcsm_options['counter_title']; ?></h2>
			<p class="desc"><?php echo $wl_rcsm_options['counter_msg']; ?></p>
		<?php 
			if($wl_rcsm_options['maintenance_date']!='') { ?>
			<div class="row countDown" data-sr="enter bottom">
				<div class="rotate"><div class="clock days wow fadeInUp" id="days" data-sr="enter bottom over 1s and move 110px wait 0.3s"><span class='digits'>00</span><span class='text'>Days</span></div></div>
				<div class="rotate"><div class="clock hours wow fadeInUp" id="hours" data-sr="enter bottom over 1s and move 110px wait 0.3s"><span class='digits'>00</span> <span class='text'>Hours</span></div></div>
				<div class="rotate "><div class="clock minutes wow fadeInUp" id="minutes" data-sr="enter bottom over 1s and move 110px wait 0.3s"><span class='digits'>00</span> <span class='text'>Minutes</span></div></div>
				<div class="rotate"><div class="clock seconds wow fadeInUp" id="seconds" data-sr="enter bottom over 1s and move 110px wait 0.3s"><span class='digits'>00</span> <span class='text'>Seconds</span></div></div>
			</div>		<?php } ?>
		</div>		</div>
</div>