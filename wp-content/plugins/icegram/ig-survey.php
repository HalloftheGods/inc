<?php
if(!defined('IG_SURVEY_TDOMAIN')) define('IG_SURVEY_TDOMAIN', 'icegram');
		$screen = get_current_screen(); 
        if ( !in_array( $screen->id, array( 'ig_campaign', 'ig_message','edit-ig_message','edit-ig_campaign' ), true ) ) return;
		if( get_option('ig_survey_done') == 1 ) return;
		$timezone_format = _x('Y-m-d H:m:s', 'timezone date format');
		$ig_current_date = date_i18n($timezone_format);
		$ig_update_date = get_option('ig_update_v_1_10_9_date');

		if ( $ig_update_date === false ) {
			$ig_update_date = $ig_current_date;
			add_option('ig_update_v_1_10_9_date',$ig_update_date);
		}

		$date_diff = floor( ( strtotime($ig_current_date) - strtotime($ig_update_date) ) / (3600 * 24) );
		if($date_diff < 5) return;

		// $home_url = home_url();
  //       $strlen = strlen($home_url);
  //       $res = $strlen%10;
  //       if( $res != 1 ){
  //           return;
  //       }
		$ig_data = Icegram::ig_get_survey_data();
        $publish_days_diff = human_time_diff(strtotime($ig_data['ig_last_publish_campaign']),strtotime($ig_current_date)); 
        $edit_days_diff = human_time_diff(strtotime($ig_data['ig_last_modified_campaign']),strtotime($ig_current_date));
?>
		<style type="text/css">
			a.ig-admin-btn {
				margin-left: 10px;
				padding: 4px 8px;
				position: relative;
				text-decoration: none;
				border: none;
				-webkit-border-radius: 2px;
				border-radius: 2px;
				background: #e0e0e0;
				text-shadow: none;
				font-weight: 600;
				font-size: 13px;
			}
			a.ig-admin-btn-secondary {
				background: #fafafa;
				margin-left: 20px;
				font-weight: 400;
			}

			a.ig-admin-btn:hover {
				color: #FFF;
				background-color: #363b3f;
			}
			.ig-form-container .ig-form-field {
				display: inline-block;
			}
			.ig-form-container .ig-form-field:not(:first-child) {
				margin-left: 4%;
			}
			.ig-form-container {
				background-color: rgb(0, 115, 130) !important;
				/*background-color: rgb(2, 157, 177) !important;*/
				border-radius: 0.618em;
				margin-top: 1%;
				padding: 1em 1em 0.5em 1em;
				box-shadow: 0 0 7px 0 rgba(0, 0, 0, .2);
				color: #FFF;
				font-size: 1.1em;
				height: 17em;
			}
			.ig-form-wrapper {
				margin-bottom:0.4em;
			}
			.ig-form-headline div.ig-mainheadline {
				font-weight: bold;
				font-size: 1.618em;
				line-height: 1.8em;
			}
			.ig-form-headline div.ig-subheadline {
				padding-bottom: 0.4em;
				font-family: Georgia, Palatino, serif;
				font-size: 1.2em;
				color: #ffd965;
			}
			.ig-survey-ques {
				font-size:1.1em;
				padding-bottom: 0.3em;
			}
			.ig-form-field label {
				font-size:0.9em;
				margin-left: 0.2em;
			}
			.ig-survey-next,.ig-button {
				box-shadow: 0 1px 0 #03a025;
				font-weight: bold;
				height: 2em;
				line-height: 1em;
			}
			.ig-survey-next,.ig-button.primary {
				color: #FFFFFF!important;
				border-color: #a7c53c !important;
				background: #a7c53c !important;
				box-shadow: none;
				padding: 0 3.6em;
			}
			.ig-button.secondary {
				color: #545454!important;
				border-color: #d9dcda!important;
				background: rgba(243, 243, 243, 0.83) !important;
			}
			.ig-loader-wrapper {
				position: absolute;
				display: none;
				left: 53%;
				margin-top: 0.4em;
				margin-left: 4em;
			}
			.ig-loader-wrapper img {
				width: 50%;
			}
			.ig-msg-wrap {
				display: none;
				text-align: center;
			}
			.ig-msg-wrap .ig-msg-text {
				padding: 1%;
				font-size: 2em;
			}
			.ig-form-field.ig-left {
				margin-bottom: 0.6em;
				width: 32%;
				display: inline-block;
				float: left;
			}
			.ig-form-field.ig-right {
				margin-left: 3%;
				width: 64%;
				display: inline-block;
			}
			.ig-profile-txt:before {
				font-family: dashicons;
				content: "\f345";
				vertical-align: middle;
			}
			.ig-profile-txt {
				font-size: 0.9em; 
			}
			.ig-right-info .ig-right {
				width: 35%;
				display: inline-block;
				float: right;
				margin-top: 2em;
			}
			.ig-right-info .ig-left {
				width: 65%;
				display: inline-block;
			}
			.ig-form-wrapper form {
				margin-top: 0.6em;
			}
			.ig-right-info label {
				padding: 0.5em 0.5em 0 0;
				/*font-size: 0.8em;*/
				/*text-transform: uppercase;*/
				color: rgba(239, 239, 239, 0.98);
				display: block;
			}
			.ig-list-item {
				margin-bottom: 0.9em;
				display: none;
				margin-top: 0.5em;
			}
			.ig-rocket {
				position: absolute;
			    top: 2.5em;
			    right: 1.8%;
			}
			#ig-no {
				box-shadow: none;
				cursor: pointer;
				color: #c3bfbf;
				text-decoration: underline;
				width: 100%;
				display: inline-block;
				margin: 0 auto;
				margin-left: 11em;
				margin-top: 0.2em;
			}
			.ig-clearfix:after {
				content: ".";
				display: block;
				clear: both;
				visibility: hidden;
				line-height: 0;
				height: 0;
			}
			
			.ig-survey-next {
			   text-decoration: none;
			   color: #fff;
			}
			.ig-list-item textarea{
				width: 70%;
    			margin-top: 0.5em;
			}
		</style>
		<script type="text/javascript">
			jQuery(function() {
				jQuery('.ig-list-item:nth-child(2)').show();
				jQuery('.ig-list-item:nth-child(2)').addClass('current');
				jQuery('.ig-form-container').on('click', '.ig-survey-next', function(){
					var count = jQuery('.ig-counter').data('count');
					if(count < 5){
						count = parseInt(count) + 1;
						jQuery('.ig-counter').data('count', count);
						if(count == 3){
							jQuery('.ig-counter').show();
						}else{
							jQuery('.ig-counter').hide();
						}
					}
					jQuery('.ig-list-item.current').hide();
					jQuery('.ig-list-item.current').next().show().addClass('current');
					jQuery('.ig-list-item.current').prev('.ig-list-item').hide();
					if(jQuery('.ig-list-item.current').is(':last-child')){
						jQuery('.ig-survey-next').hide();

					}
				});

			});
		</script>

		

		<div class="ig-form-container wrap">
			<div class="ig-form-wrapper">
				<div class="ig-form-headline">
					<div class="ig-mainheadline"><?php _e('Icegram', IG_SURVEY_TDOMAIN); ?> <u><?php _e('is getting even better!', IG_SURVEY_TDOMAIN); ?></u></div>
					<div class="ig-subheadline"><?php _e('But we need your help..', IG_SURVEY_TDOMAIN); ?> <strong><?php _e('(Please, take this 2 minute survey) ', IG_SURVEY_TDOMAIN); ?></strong></div>
				</div>
				<form name="ig-survey-form" action="#" method="POST" accept-charset="utf-8">
					<div class="ig-container-1 ig-clearfix">	
						<div class="ig-form-field ig-left">
							<div class="ig-profile">
								<div class="ig-profile-info">
									<div style="font-size: 1.218em;padding-bottom: 0.5em;display: block;font-weight: bold;color: #ffd3a2;"><?php echo __("Your Icegram usage has been great, here's a quick snapshot: ",IG_SURVEY_TDOMAIN); ?></div>
									<ul style="margin: 0 0.5em;">
										<li class="ig-profile-txt">You published a total of <?php echo $ig_data['ig_published_campaign']?> campaigns till date.</li>
										<li class="ig-profile-txt">Your last campaign was published <?php echo $publish_days_diff?> back.</li>
										<li class="ig-profile-txt">And you edited a campaign <?php echo $edit_days_diff ?> back. </li>
										<input type="hidden" name="ig_data[ig_plan]" value="<?php echo $ig_data['ig_plan']; ?>">
										<input type="hidden" name="ig_data[ig_is_rm]" value="<?php echo $ig_data['ig_is_rm']; ?>">
										<input type="hidden" name="ig_data[ig_is_es]" value="<?php echo $ig_data['ig_is_es']; ?>">
										<input type="hidden" name="ig_data[ig_draft_campaign]" value="<?php echo $ig_data['ig_draft_campaign']; ?>">
										<input type="hidden" name="ig_data[ig_published_campaign]" value="<?php echo $ig_data['ig_published_campaign']; ?>">
										<input type="hidden" name="ig_data[ig_last_modified_campaign]" value="<?php echo $ig_data['ig_last_modified_campaign']; ?>">
										<input type="hidden" name="ig_data[ig_last_publish_campaign]" value="<?php echo $ig_data['ig_last_publish_campaign']; ?>">
										<input type="hidden" name="ig_data[ig-survey-version]" value="0.2">
										<input type="hidden" name="rm_lead_name" value="IG-Survey-Capture">
									</ul>
								</div>
							</div>
						</div>
						<div class="ig-form-field ig-right">
							<div style="font-size: 1.218em;padding-bottom: 0.5em;display: block;font-weight: bold;color: #ffd3a2;"><?php echo __( 'Let us know what you think about these features', IG_SURVEY_TDOMAIN ); ?></div>
							<div class="ig-right-info">
								<div class="ig-left">
									<ul style="margin-top:0;"><span class="ig-counter" data-count="1" style="display:none">Just 2 more left</span>
										<li class="ig-list-item"><?php _e('Do you prefer a visual / WYSIWYG editor for campaign design - or the current form based campaign design?', IG_SURVEY_TDOMAIN); ?><br>
											<label title="days"><input checked="" type="radio" name="ig_data[editor]" value="0"><?php _e('Yes, I like those drag & drop editors.', IG_SURVEY_TDOMAIN); ?></label>
											<label title="days"><input type="radio" name="ig_data[editor]" value="1"><?php _e('I prefer the power of HTML editing in current approach.', IG_SURVEY_TDOMAIN); ?></label>
											<label title="days"><input type="radio" name="ig_data[editor]" value="2"><?php _e('I don\'t mind either.', IG_SURVEY_TDOMAIN); ?></label>
										</li>
										<li class="ig-list-item"><?php _e('How easy is it to add forms to Icegram?', IG_SURVEY_TDOMAIN); ?><br>
											<label><input type="radio" name="ig_data[form]" value="0"><?php _e('It\'s super simple - especially using the Rainmaker plugin.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input checked="" type="radio" name="ig_data[form]" value="1"><?php _e('Easy enough - I use HTML / shortcode to embed my forms.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input type="radio" name="ig_data[form]" value="2"><?php _e('It\'s difficult - you should improve form handling.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input type="radio" name="ig_data[form]" value="3"><?php _e('I don\'t use forms!', IG_SURVEY_TDOMAIN); ?></label>
										</li>
										<li class="ig-list-item"><?php _e('Do you like Icegram\'s conversion experts to review your campaigns and offer recommendations?', IG_SURVEY_TDOMAIN); ?><br>
											<label><input type="radio" name="ig_data[review]" value="0"><?php _e('Sure - but only if it\'s free.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input checked="" type="radio" name="ig_data[review]" value="1"><?php _e('Yes - and I don\'t mind paying a reasonable fee for that.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input type="radio" name="ig_data[review]" value="2"><?php _e('No, I\'m good on my own.', IG_SURVEY_TDOMAIN); ?></label>
										</li>
										<li class="ig-list-item"><?php _e('Did you see / use the new designs in Icegram gallery?', IG_SURVEY_TDOMAIN); ?><br>
											<label><input type="radio" name="ig_data[gallery]" value="0"><?php _e('Oh yes - they are awesome.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input type="radio" name="ig_data[gallery]" value="1"><?php _e('Sort of - I plan to use them on my next campaign.', IG_SURVEY_TDOMAIN); ?></label>
											<label><input checked="" type="radio" name="ig_data[gallery]" value="2"><?php _e('No - I\'m happy with my current designs.', IG_SURVEY_TDOMAIN); ?></label>
										</li>
										<li class="ig-list-item"><?php _e('What problems would you like Icegram to solve for you? (mention one or two!)', IG_SURVEY_TDOMAIN); ?><br>
											<textarea name="ig_data[ig_feedback]"></textarea>
										</li>
										<li class="ig-list-item">
											<div>
												<input style="width: 70%;vertical-align: middle;display: inline-block;" placeholder="Enter your email to get early access" type="email" name="ig_data[email]">
												<div class="" style="display: inline-block;margin-left: 0.4em;width: 23%;vertical-align: middle;">
													<input data-val="yes" type="submit" id="ig-yes" value="Alright, Send It All" class="ig-button button primary">
												</div>
												<div class="ig-loader-wrapper"><img src="<?php echo  $this->plugin_url ?>/assets/images/spinner-2x.gif"></div>
												<a id="ig-no" data-val="no" class="">Nah, I don't like improvements</a>
											</div>
										</li>
									</ul>
								</div>
								<div class="ig-right">
									<a href="#" class="ig-survey-next button primary">Next</a>
								</div>
							</div>
						</div>
					</div>
				</form>
				<div class="ig-rocket"><img src="<?php echo  $this->plugin_url ?>/assets/images/ig-growth-rocket_2.png"/></div>
			</div>
			<div class="ig-msg-wrap">
				<div class="ig-logo-wrapper"><img style="width:5%;" src="<?php echo  $this->plugin_url ?>/assets/images/icegram-logo-branding-64.png"></div>
				<div class="ig-msg-text ig-yes"><?php _e('Thank you!', IG_SURVEY_TDOMAIN); ?></div>
				<div class="ig-msg-text ig-no"><?php _e('No issues, have a nice day!', IG_SURVEY_TDOMAIN); ?></div>
			</div>
		</div>

		<script type="text/javascript">
			jQuery(function () {
				jQuery("form[name=ig-survey-form]").on('click','.ig-button, #ig-no',function(e){
					e.preventDefault();
					jQuery("form[name=ig-survey-form]").find('.ig-loader-wrapper').show();
					var params = jQuery("form[name=ig-survey-form]").serializeArray();
					var that = this;
					params.push({name: 'btn-val', value: jQuery(this).data('val') });
					params.push({name: 'action', value: 'ig_submit_survey' });
					params.push({name: 'plugin-prefix', value: 'ig' });
					jQuery.ajax({
							method: 'POST',
							type: 'text',
							url: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
							data: params,
							success: function(response) {  
								jQuery("form[name=ig-survey-form]").find('.ig-loader-wrapper').hide();
								jQuery(".ig-msg-wrap").show('slow');
								if( jQuery(that).attr('id') =='ig-no'){
									jQuery(".ig-msg-wrap .ig-yes").hide();
								}else{
									jQuery(".ig-msg-wrap .ig-no").hide();
								}
								jQuery(".ig-form-wrapper").hide('slow');
								setTimeout(function(){
										jQuery(".ig-form-container").hide('slow');
								}, 5000);
							}
					});
				})

			});
		</script>
