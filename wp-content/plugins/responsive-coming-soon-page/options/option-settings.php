<!-- Call the option setting -->
<?php $wl_rcsm_options = weblizar_rcsm_get_options();?>
<div class="col-xs-8 tab-content" id="spa_general"> <!-- plugin dashboard Main class div setting -->
	<?php $site_layout =$wl_rcsm_options['layout_status'];?>
	<div class="class_live <?php if ( $site_layout == 'deactivate' || $site_layout =='service_unavailable_switch' || $site_layout =='redirect_switch') echo "deactive";?>" >
		<a class="class_live" href="<?php echo esc_url(home_url("/?rcsm_live_preview=yes")); ?>" target="_blank"><span class="button fa fa-eye"><?php _e(' Live Preview','RCSM_TEXT_DOMAIN');?></span></a>
	</div>		
	<div class="tab-pane col-md-12 active" id="templates-option"> <!-- plugin template selection setting -->
		<div class="col-md-12 option">
			<h1><?php _e('Templates Options','RCSM_TEXT_DOMAIN');?></h1>
			<!-- <ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#weblizar-template"><?php _e('Template Choice','RCSM_TEXT_DOMAIN'); ?></a></li>
				<li><a data-toggle="tab" href="#weblizar-pro-template"><?php// _e('Commercial Template','RCSM_TEXT_DOMAIN'); ?></a></li> 
			</ul>-->
			<div class="tab-content">
				<div id="weblizar-template" class="tab-pane fade in active"><!-- plugin template free theme layout selection setting -->		
					<form method="post" id="weblizar_rcsm_template_option">
						<?php for($i=1; $i<=1; $i++){ ?>
						<div style="width:48%" class="col-md-6 col-sm-6 op_tem site_template <?php if($wl_rcsm_options['select_template']=='select_template'.$i) echo 'active'; ?>" id="select_template<?php echo $i?>">	
							<div class="selected_template active">	
								<div class="row op_show" data-orient="top">
									<div class="op_weblizar-pics-activated">
										<span class="image-shop-scroll" style="background-image: url('<?php echo plugin_dir_url( __FILE__ ).'images/screen-shot'.$i.'.jpg';?>" ></span>
									</div>
								</div>
								<h4 class="op_name"><?php _e('Template '.$i,'RCSM_TEXT_DOMAIN');?></h4>
								
								<span class="op_name1 green"><span class="activate"> <?php _e('Limited Edition Template Activated','RCSM_TEXT_DOMAIN'); ?></span></span>
								<span class="op_name1 blue"><span class="activate"><h3><?php _e('Pro Template','RCSM_TEXT_DOMAIN'); ?> </br> <?php _e('Available In Premium Version!!!','RCSM_TEXT_DOMAIN'); ?> </h3> </br><a class="btn btn-success pro-link" target="_new" href="https://weblizar.com/plugins/coming-soon-page-maintenance-mode-pro/" rel="nofollow"><?php _e('Get Pro Plugin','RCSM_TEXT_DOMAIN'); ?></a></span>
								</span>
							</div>
						</div>
						<?php } ?>
						<?php for($i=2; $i<=6; $i++){ ?>
						<div style="width:48%" class="col-md-6 col-sm-6 op_tem site_template <?php if($wl_rcsm_options['select_template']=='select_template'.$i) echo 'active'; ?>" id="select_template<?php echo $i?>">	
							<div class="selected_template active">	
								<div class="row op_show" data-orient="top">
									<div class="op_weblizar-pics">
										<span class="image-shop-scroll" style="background-image: url('<?php echo plugin_dir_url( __FILE__ ).'images/screen-shot'.$i.'.jpg';?>" ></span>
									</div>
								</div>
								<h4 class="op_name"><?php _e('Template '.$i,'RCSM_TEXT_DOMAIN');?></h4>
								<span class="op_name1 blue"><span class="activate"><?php _e('<h3>Available In Pro Version!!! </h3> </br><a class="btn btn-success pro-link" target="_new" href="https://weblizar.com/plugins/coming-soon-page-maintenance-mode-pro/" rel="nofollow">Get Pro Plugin</a> ','RCSM_TEXT_DOMAIN');?> </span>
								</span>
							</div>
						</div>
						<?php } ?>													
					</form>								
				</div>								
				<div id="weblizar-pro-template" class="tab-pane fade in"><!-- plugin template Pro theme layout selection setting -->											
					<form method="post" id="weblizar_rcsm_pro_template_option">
						<div class="col-md-12 form-group">
							<div class="col-md-3 col-sm-6 op_tem">
								<div class="row op_show" data-orient="top">
									<div class="op_weblizar-pics">
										<span class="image-shop-scroll" style="background-image: url('<?php echo plugin_dir_url( __FILE__ ) ?>images/screen-shot1.jpg');"></span>
									</div>
								</div>
								<h2 class="op_name"><a href=""><?php _e('Coming Soon Pro 1','RCSM_TEXT_DOMAIN');?></a></h2>
							</div>										
						</div>	
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_pro_template_option" name="weblizar_rcsm_settings_save_pro_template_option" />			
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('pro_template_option');">
							<input data-target="#rcsm_pro_template_option" class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('pro_template_option')" >
						</div>										
					</form>	
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane col-md-12 " id="general-settings"><!-- plugin General selection setting -->
		<div class="col-md-12 option">
			<h1><?php _e('General Settings','RCSM_TEXT_DOMAIN'); ?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#appearance"><?php _e('Appearance Settings','RCSM_TEXT_DOMAIN'); ?></a></li>
				<li><a data-toggle="tab" href="#general-option"><?php _e('SEO Settings','RCSM_TEXT_DOMAIN'); ?></a></li>
				<li><a data-toggle="tab" href="#access-control"><?php _e('Access Control Settings','RCSM_TEXT_DOMAIN'); ?></a></li>
				<li><a data-toggle="tab" href="#layout"><?php _e('Layout Option','RCSM_TEXT_DOMAIN'); ?></a></li>
			</ul>
			<div class="tab-content">
				<div id="appearance" class="tab-pane fade in active"> <!-- Appearance selection setting -->
					<form method="post" id="weblizar_rcsm_appearance_option">
						<h1><?php _e('Appearance Selection Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
							<?php $site_layout =$wl_rcsm_options['layout_status'];?>
							<label><?php _e('Status','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable Coming Soon and 503 service unavailable Mode on Site.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
							</br>
							<div class="col-md-3" id="weblizar_rcsm_layout_switch">
								<select id="layout_status" name="layout_status" class="form-control">
									<option value="deactivate" <?php echo selected($site_layout, 'deactivate' ); ?> ><?php _e('Deactivate','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="coming_soon_switch" <?php echo selected($site_layout, 'coming_soon_switch' ); ?> ><?php _e('Activate Coming Soon Mode','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="service_unavailable_switch" <?php echo selected($site_layout, 'service_unavailable_switch' ); ?> ><?php _e('503 - Service unavailable','RCSM_TEXT_DOMAIN'); ?></option>
								</select>
							</div>
						</div>
						<div class="layout-options <?php if ($site_layout=='deactivate') echo "active";?>" id="deactivate">
							<div class="col-md-12 form-group">
								<label><?php _e('How Plugin Deactivate Mode Works?','RCSM_TEXT_DOMAIN'); ?></label><br/>
								<ul class="instruction_points">
									<li><?php _e('Plugin deactivated, You can choose any action from following list.','RCSM_TEXT_DOMAIN'); ?></li>
								</ul>
								<hr style="border-color:#999;">
								<label><?php _e('How Coming Soon Mode Works?','RCSM_TEXT_DOMAIN'); ?></label><br/>
								<ul class="instruction_points">
									<li><?php _e('Hide the all site from users and show the Only Coming Soon page template','RCSM_TEXT_DOMAIN'); ?></li>
									<li><?php _e('For Maintain the site SEO , You will use it only one time from the launched the site.','RCSM_TEXT_DOMAIN'); ?></li>
									<li><?php _e('In Our Pro Version, You can used the under construction and maintenance mode in future for your live site','RCSM_TEXT_DOMAIN'); ?></li>
								</ul>
								<hr style="border-color:#999;">
								<label><?php _e('How 503 - Service unavailable Mode Action','RCSM_TEXT_DOMAIN'); ?></label><br/>
								<ul class="instruction_points">
									<li><?php _e('The Web server (running the Web site) is currently unable to handle the HTTP request due to a temporary overloading or maintenance of the server.','RCSM_TEXT_DOMAIN');?></li>
								</ul>
							</div>
						</div>
						<div class="layout-options <?php if ($site_layout=='coming_soon_switch') echo "active";?>" id="coming_soon_switch">
							<div class="col-md-12 form-group">
								<label><?php _e('How Coming Soon Mode Works?','RCSM_TEXT_DOMAIN'); ?></label><br/>
								<ul class="instruction_points">
									<li><?php _e('Hide the all site from users and show the Only Coming Soon page template','RCSM_TEXT_DOMAIN'); ?></li>
									<li><?php _e('For Maintain the site SEO , You will use it only one time from the launched the site.','RCSM_TEXT_DOMAIN'); ?></li>
									<li><?php _e('In Our Pro Version, You can used the under construction and maintenance mode in future for your live site','RCSM_TEXT_DOMAIN'); ?></li>
								</ul>
							</div>
							<div class="col-md-12 form-group">
								<h4><?php _e('Coming Soon Mode Settings','RCSM_TEXT_DOMAIN'); ?></h4><br/>
								<div class="row">
									<label><?php _e('Title','RCSM_TEXT_DOMAIN'); ?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type Here Page Heading","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<br/>
									<div class="col-md-6">
										<input  class="form-control" type="text" name="coming-soon_title" id="coming-soon_title"  value="<?php echo $wl_rcsm_options['coming-soon_title']; ?>" >
									</div>
								</div>
								<div class="row">
									<label><?php _e('Sub Title','RCSM_TEXT_DOMAIN'); ?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type Here Page Sub Heading","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<br/>
									<div class="col-md-6">
										<input  class="form-control" type="text" name="coming-soon_sub_title" id="coming-soon_sub_title"  value="<?php echo $wl_rcsm_options['coming-soon_sub_title']; ?>" >
									</div>
								</div>
								<div class="row">
									<label><?php _e('Message','RCSM_TEXT_DOMAIN'); ?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type Here A Message","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<br/>
									<div class="col-md-6">
										<textarea class="form-control" rows="8" cols="8" id="coming-soon_message" name="coming-soon_message" ><?php if($wl_rcsm_options['coming-soon_message']!='') { echo esc_attr($wl_rcsm_options['coming-soon_message']); } ?></textarea>
									</div>
								</div>
							</div>
						</div>
						
						<!-- favicon -->
						<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label><?php _e('Your Site Favicon','RCSM_TEXT_DOMAIN'); ?></label>
						<input class="form-control" type="text" value="<?php if($wl_rcsm_options['upload_favicon']!='') { echo esc_attr($wl_rcsm_options['upload_favicon']); } ?>" id="upload_favicon" name="upload_favicon" size="50" class="upload has-file">
						<button type="button" class="btn upload_image_button"><?php _e('Upload Favicon Image','RCSM_TEXT_DOMAIN');?></button>
						</div></div>
						
						<div class="all_content_show layout-options <?php if ($site_layout=='service_unavailable_switch') echo "active";?>" id="service_unavailable_switch">
							<div class="col-md-12 form-group">
								<label><?php _e('The Web server (running the Web site) is currently unable to handle the HTTP request due to a temporary overloading or maintenance of the server.','RCSM_TEXT_DOMAIN');?></label>
							</div>
						</div>
						<div class="all_content_hide <?php if ( $site_layout == 'deactivate' || $site_layout=='service_unavailable_switch') echo "active";?>" id="service_unavailable_switch">
							<div class="all_content_hide" id="deactivate"> <!-- Add this div to hide all setting when deactivate mode on-->
								<div class="col-md-12 form-group">
									<label><?php _e('Your Site Logo','RCSM_TEXT_DOMAIN'); ?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select logo as text and image ","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									</br>
									<div class="col-md-3">
										<?php $site_logo =$wl_rcsm_options['site_logo'];?>
										<select name="site_logo" id="site_logo" class="form-control">
											<option value="logo_text"<?php echo selected($site_logo, 'logo_text' ); ?>><?php _e('Logo Text','RCSM_TEXT_DOMAIN'); ?></option>
											<option value="logo_image"<?php echo selected($site_logo, 'logo_image' ); ?>><?php _e('Logo Image','RCSM_TEXT_DOMAIN'); ?></option>
										</select>
									</div>
								</div>
								<div class="col-md-12 form-group logo-option <?php if ($site_logo=='logo_text') echo "active";?>" id="logo_text">
									<label><?php _e('Logo Text ','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add your site logo text here ","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									</br>
									<div class="col-md-6">
										<input class="form-control"  type="text" name="logo_text_value" id="logo_text_value" value="<?php echo $wl_rcsm_options['logo_text_value']; ?>" >
									</div>
								</div>
								<div class="col-md-12 form-group logo-option <?php if ($site_logo=='logo_image') echo "active";?>" id="logo_image">
									<div class="row">
										<div class="col-md-6 no-pad">
											<label><?php _e('Logo Image ','RCSM_TEXT_DOMAIN'); ?></label>
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add your site logo here suggested size is 250X150","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											</br>
											<div class="col-md-12">
												<input class="form-control" type="text" value="<?php if($wl_rcsm_options['upload_image_logo']!='') { echo esc_attr($wl_rcsm_options['upload_image_logo']); } ?>" id="upload_image_logo" name="upload_image_logo" size="50" class="upload has-file">
												<button type="button" class="btn upload_image_button"><?php _e('Upload Your Logo','RCSM_TEXT_DOMAIN');?></button>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<label><?php _e('Logo Width ','RCSM_TEXT_DOMAIN'); ?></label>
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Default Logo Width : 250px, if you want to increase than specify your value","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											<div class="col-md-12">
												<input  class="form-control" type="text" name="logo_width" id="logo_width"  value="<?php echo $wl_rcsm_options['logo_width']; ?>" >
											</div>
										</div>
										<div class="col-md-3">
											<label><?php _e('Logo Height ','RCSM_TEXT_DOMAIN');?></label>
											<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Default Logo Height : 150px, if you want to increase than specify your value","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											<div class="col-md-12">
												<input class="form-control" type="text" name="logo_height" id="logo_height" value="<?php echo $wl_rcsm_options['logo_height']; ?>" >
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<label><?php _e('Select Background Type','RCSM_TEXT_DOMAIN');?> </label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("With the Help of selection box you can show page background as your wish","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
									<br/>
									<div class="col-md-3">
										<?php $theme_bg =$wl_rcsm_options['template_bg_select'];?>
										<select name="template_bg_select" id="template_bg_select" class="form-control">
											<option value="Background_Color" <?php echo selected($theme_bg, 'Background_Color' ); ?>><?php _e('Color','RCSM_TEXT_DOMAIN');?></option>
											<option value="Custom_Background" <?php echo selected($theme_bg, 'Custom_Background' ); ?>><?php _e('Image','RCSM_TEXT_DOMAIN');?></option>
										</select>
									</div>
								</div>
								<div class="col-md-12 form-group template-option <?php if ($theme_bg=='Custom_Background') echo "active";?>" id="Custom_Background">
									<label><?php _e('Background Image','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add Background Image","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<br/>
									<div class="col-md-6">
										<div class="row">
											<input class="form-control" type="text" value="<?php if($wl_rcsm_options['custom_bg_img']!='') { echo esc_attr($wl_rcsm_options['custom_bg_img']); } ?>" id="custom_bg_img" name="custom_bg_img" size="50" class="upload has-file"/>
											<button type="button" class="btn upload_image_button"><?php _e('Upload Image','RCSM_TEXT_DOMAIN');?></button>
										</div>
									</div>
								</div>
								<div class="col-md-12 form-group template-option <?php if ($theme_bg=='Background_Color') echo "active";?>" id="Background_Color">
									<label><?php _e('Background Color','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Change Background Color","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
									<br/>
									<div class="col-md-6 no-pad">
										<div class="row">
											<input class="color no-sliders" type="text" value="<?php echo $wl_rcsm_options['bg_color']; ?>" id="bg_color" name="bg_color" class="colorpicker"/>
										</div>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<label><?php _e('Button Link On/Off','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable Button Link of top Image, Video, Slider.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
									<div class="col-md-12">
										<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['button_onoff']=='on') echo "checked='checked'"; ?> id="button_onoff" name="button_onoff" >
									</div>
								</div>
								<div class="col-md-12 form-group button_show-option <?php if($wl_rcsm_options['button_onoff']=='on') echo "active"; ?>" id="rcsm_button_onoff">
									<div class="col-md-6">
										<label><?php _e('Button Text','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add text of button ","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
										<div class="row">
											<input class="form-control" type="text" name="button_text" id="button_text" value="<?php echo $wl_rcsm_options['button_text']; ?>" >
										</div>
									</div>
									<div class="col-md-6">
										<label><?php _e('Button Link','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add link on button","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										<div class="row">
											<input class="form-control" type="text" name="button_text_link" id="button_text_link" value="<?php _e($wl_rcsm_options['button_text_link'],'RCSM_TEXT_DOMAIN'); ?>">
										</div>
									</div>
								</div>
								<div class="col-md-12 form-group">
									<div class="col-md-6 info">
										<label><?php _e('Link to Admin','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable Admin Link of Dashboard for Users.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
										<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['link_admin']=='on') echo "checked='checked'"; ?> id="link_admin" name="link_admin" >
									</div>
								</div>
								<div class="col-md-12 form-group link_admin-option <?php if($wl_rcsm_options['link_admin']=='on') echo "active"; ?>" id="rcsm_link_admin">
									<div class="col-md-6">
										<label><?php _e('Link To Admin Text ','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="#" data-toggle="tooltip" data-placement="right" title="<?php _e("Add text name for Admin Link of Dashboard for Users.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										<input class="form-control" type="text" name="admin_link_text" id="admin_link_text" value="<?php echo $wl_rcsm_options['admin_link_text']; ?>" >
									</div>
								</div>
							</div>
							<!-- End of the all content hide class div for deactivate mode-->
						</div>
						<!-- End of the all content hide class div for 503 service unavailable mode on-->
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_appearance_option" name="weblizar_rcsm_settings_save_appearance_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('appearance_option');">							
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" name="weblizar_rcsm_option_data_save_appearance_option" id="weblizar_rcsm_option_data_save_appearance_option" >
						</div>
					</form>
				</div>
				
				<!-- General selection setting -->	
				<div id="general-option" class="tab-pane fade in">
					<form method="post" id="weblizar_rcsm_general_option">
						<h1> <?php _e('General Selection Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
							<div class="row">
								<label><?php _e('Page Meta Title','RCSM_TEXT_DOMAIN');?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here meta title for seo","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<br/>
								<div class="col-md-6">
									<input  class="form-control" type="text" name="page_meta_title" id="page_meta_title"  value="<?php echo $wl_rcsm_options['page_meta_title']; ?>" >
								</div>
							</div>
							<div class="row">
								<label><?php _e('Page Meta Keywords','RCSM_TEXT_DOMAIN');?></label>
								.<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add relative keywords for page and site seo","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<br/>
								<div class="col-md-6">
									<textarea class="form-control" rows="8" cols="8" id="page_meta_keywords" placeholder="Enter comma separated keywords here which is related to your website" name="page_meta_keywords"><?php if($wl_rcsm_options['page_meta_keywords']!='') { echo esc_attr($wl_rcsm_options['page_meta_keywords']); } ?></textarea>
								</div>
							</div>
							<div class="row">
								<label><?php _e('Page Meta Description','RCSM_TEXT_DOMAIN');?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here the page related short and relevent description","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<br/>
								<div class="col-md-6">
									<textarea class="form-control" rows="8" cols="8" id="page_meta_discription" name="page_meta_discription"><?php if($wl_rcsm_options['page_meta_discription']!='') { echo esc_attr($wl_rcsm_options['page_meta_discription']); } ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('Enable Search Robots','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable the Robot for search","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							</br>
							<div class="col-md-6">
								<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['search_robots']=='on') echo "checked='checked'"; ?> id="search_robots" name="search_robots" >
							</div>
						</div>
						<div class="col-md-12 form-group search-option <?php if($wl_rcsm_options['search_robots']=='on') echo "active"; ?>" id="rcsm_search_robots">
							<label><?php _e('Select Robots Meta Tag','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Search engines like Google, Yahoo and AltaVista show Metatags in their search results. Robot tag tell the spider ( Search engines ) if you want your whole website or single page to be crawled or not.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							</br>
							<div class="col-md-3">
								<?php $rcsm_robots =$wl_rcsm_options['rcsm_robots_meta'];?>
								<select class="form-control rcsm_select" name="rcsm_robots_meta" id="rcsm_robots_meta">
									<option value="index follow" <?php echo selected($rcsm_robots, 'index follow' ); ?> ><?php _e('Index, Follow','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="index nofollow" <?php echo selected($rcsm_robots, 'index nofollow' ); ?> ><?php _e('Index, NoFollow','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="noindex follow" <?php echo selected($rcsm_robots, 'noindex follow' ); ?> ><?php _e('NoIndex, Follow','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="noindex nofollow" <?php echo selected($rcsm_robots, 'noindex nofollow' ); ?> ><?php _e('NoIndex, NoFollow','RCSM_TEXT_DOMAIN'); ?></option>
								</select>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('Your Site Favicon','RCSM_TEXT_DOMAIN');?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Make sure you upload .ico image type which is not more then 25X25 px.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<br/>
							<div class="col-md-6 no-pad">
								<div class="row">
									<input class="form-control" type="text" value="<?php if($wl_rcsm_options['upload_image_favicon']!='') { echo esc_attr($wl_rcsm_options['upload_image_favicon']); } ?>" id="upload_image_favicon" name="upload_image_favicon" size="36" class="upload has-file"/>
									<input type="button" id="upload_button" value="<?php _e('Upload Favicon Icon','RCSM_TEXT_DOMAIN');?>" class="btn upload_image_button" />
								</div>
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_general_option" name="weblizar_rcsm_settings_save_general_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('general_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('general_option')" >
						</div>
					</form>
				</div>
				
				<!-- Access control setting -->
				<div id="access-control" class="tab-pane fade in">
					<form action="post" id="weblizar_rcsm_access_control_option" >
						<h1> <?php _e('Access Control Settings','RCSM_TEXT_DOMAIN'); ?></h1>	
						<div class="col-md-12 form-group show_page-option active" id="as_role">						
							<label><?php _e('Hide The Site For The Following Role Users','RCSM_TEXT_DOMAIN');?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select Users for showing coming soon page and hide the site whenever users login or not","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
							<br/>
							<div class="col-md-4 no-pad">
								<select multiple="multiple" name="user_value[]" class="form-control">
									<?php global $wp_roles;        
									$wp_roles = new WP_Roles();
									$all_roles = $wp_roles->get_names();
									if (isset($all_roles)) {
										foreach($all_roles as $roles) { ?>
											<option value="<?php echo $roles; ?>" <?php if (isset($wl_rcsm_options['user_value'])) { foreach($wl_rcsm_options['user_value'] as $roles_users) { if($roles_users == $roles) echo 'selected="selected"';} } ?>>
												<?php _e( $roles ,'RCSM_TEXT_DOMAIN');?>
											</option>
											<?php
										} 
									}?> 
								</select>
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_access_control_option" name="weblizar_rcsm_settings_save_access_control_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('access_control_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('access_control_option')" >
						</div>
					</form>
				</div>
				
				<!-- Layout swap control setting -->
				<div id="layout" class="tab-pane fade in"> 
					<div id="page-layout" class="tab-pane fade in active">
						<form action="post" id="weblizar_rcsm_pagelayoutmanger">
							<h1> <?php _e('Layout Manager','RCSM_TEXT_DOMAIN'); ?></h1>	
							<div class="col-md-12 option section">
								<table  class="form-table">
									<div class="dhe-example-section-content">
										<div id="page_layout_swap">
											<div class="column left first">
												<font color="#333333" size="+2"> <?php _e('Disabled','RCSM_TEXT_DOMAIN');?></font><p></p>
												<div class="sortable-list" id="disable">
													<?php
													$data = $wl_rcsm_options['page_layout_swap'];
													$home_page_data = array('Count Down Timer','Subscriber Form');
													$todisable=array_diff($home_page_data, $data);
													if($todisable != '') {
														foreach($todisable as $value) { ?>
															<div class="sortable-item" id="<?php echo $value ?>">
															<?php echo ucfirst($value); ?>
															</div>
															<?php 
														}	
													} ?>
												</div>
											</div>
											<div class="column left">
												<font color="#333333" size="+2"> <?php _e('Enabled','RCSM_TEXT_DOMAIN'); ?></font><p></p>
												<div class="sortable-list" id="enable">
													<?php
													$enable =$wl_rcsm_options['page_layout_swap'];
													if($enable[0] != '') {
														foreach($enable as $value) { ?>
															<div class="sortable-item" id="<?php echo $value ?>">
																<?php  echo ucfirst($value); ?>
																</div><?php
														}
													} ?>
												</div>
											</div>
										</div>
									</div>
									<!--end redify_frontpage -->
								</table>
							</div>
							<div class="restore">
								<input type="hidden" value="1" id="weblizar_rcsm_settings_save_pagelayoutmanger" name="weblizar_rcsm_settings_save_pagelayoutmanger" />
								<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" id="weblizar_home_layout_reset_pagelayoutmanger">
								<input class="button button-primary left" type="button" id="weblizar_home_layout_save_pagelayoutmanger" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" >
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Layout setting -->
	<div class="tab-pane col-md-12" id="layout-settings">
		<div class="col-md-12 option">
			<h1><?php _e('Layout Settings','RCSM_TEXT_DOMAIN'); ?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#layout"><?php _e('Layout Settings','RCSM_TEXT_DOMAIN'); ?></a></li>
			</ul>			
			<div class="tab-content">
				<div id="layout" class="tab-pane fade in active"> <!-- Layout selection setting -->
					<form method="post" id="weblizar_rcsm_layout_option">
						<h1> <?php _e('Layout Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
							<?php $theme_color_schemes =$wl_rcsm_options['theme_color_schemes'];?>
							<label><?php _e('Theme Color Schemes','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select color Schemes for page theme layout.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
							<div class="col-md-3" id="weblizar_rcsm_layout_color_switch">
								<select id="theme_color_schemes" name="theme_color_schemes" class="form-control">
									<option value="#FF6347" <?php echo selected($theme_color_schemes, '#FF6347' ); ?> ><?php _e('Default','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="#33ADFF" <?php echo selected($theme_color_schemes, '#33ADFF' ); ?> ><?php _e('Blue','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="#29AB87" <?php echo selected($theme_color_schemes, '#29AB87' ); ?> ><?php _e('Green','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="#FF6347" <?php echo selected($theme_color_schemes, '#FF6347' ); ?> ><?php _e('Red','RCSM_TEXT_DOMAIN'); ?></option>
									<option value="#FF69B4" <?php echo selected($theme_color_schemes, '#FF69B4' ); ?> ><?php _e('Pink','RCSM_TEXT_DOMAIN'); ?></option>
								</select>
							</div> <br>
							</div>
							<div class="col-md-12 form-group">
							<label><?php _e('Theme Fonts','RCSM_TEXT_DOMAIN'); ?></label><br>
							<?php $theme_font = $wl_rcsm_options['theme_font_family']; ?>		
							 <?php $google_font= array('Merienda','Neucha' ,'Bad Script','Sans Serif','Indie Flower','Shadows Into Light','Dancing Script','Kaushan Script','Tangerine','Pinyon Script','Great Vibes','Bad Script','Calligraffitti','Homemade Apple','Allura','Megrim','Nothing You Could Do','Fredericka the Great','Rochester','Arizonia','Astloch','Bilbo','Cedarville Cursive','Clicker Script','Dawning of a New Day','Ewert','Felipa','Give You Glory','Italianno','Jim Nightshade','Kristi','La Belle Aurore','Meddon','Montez','Mr Bedfort','Over the Rainbow','Princess Sofia','Reenie+Beanie','Ruthie','Sacramento','
							 Seaweed Script','Stalemate','Trade Winds','UnifrakturMaguntia','Waiting for the Sunrise','Yesteryear','Zeyada','Warnes','Abril Fatface','Advent Pro','Aldrich','Alex Brush','Amatic SC','Antic Slab','Candal');?>	
							<div class="col-md-3">
							<select name="theme_font_family" id="theme_font_family" class="form-control">
							<?php foreach( $google_font as $font) { ?>
								<option value="<?php echo $font; ?>" <?php echo selected($theme_font, $font ); ?>><?php echo $font; ?></option>
							<?php } ?>
							</select>
							</div></div>
							<div class="restore">
								<input type="hidden" value="1" id="weblizar_rcsm_settings_save_layout_option" name="weblizar_rcsm_settings_save_layout_option" />
								<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('layout_option');">
								<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('layout_option')" >
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Social Media setting -->
	<div class="tab-pane col-md-12" id="social">
		<div class="col-md-12 option">
			<h1><?php _e('Social Media Options','RCSM_TEXT_DOMAIN');?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#page-social"><?php _e('Social Media Options','RCSM_TEXT_DOMAIN');?></a></li>
			</ul>
			<div class="tab-content">
				<div id="page-social" class="tab-pane fade in active"> <!-- Social link and icon setting -->
					<form action="post" id="weblizar_rcsm_social_option">
						<h1> <?php _e('Social Link And Icon Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="social-option active" id="rcsm_social">
							<div id="rcsm_social_fields">
								<?php for($i=1;$i<=5; $i++) { ?>
									<div class="col-md-12 form-group" id="rcsm_social-<?php echo $i;?>">
										<div class="row">
											<label><?php _e('Social Icon ','RCSM_TEXT_DOMAIN'); echo $i; ?></label><br/>
											<div class="col-md-6">
												<input  class="form-control" type="text" name="social_icon_<?php echo $i;?>" id="social_icon_<?php echo $i;?>"  value="<?php echo $wl_rcsm_options['social_icon_'.$i]; ?>" >
											</div>
											<div class="col-md-6">
												<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter FontAwesome Social Icon Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<input  class="form-control" type="text" name="social_link_<?php echo $i;?>" id="social_link_<?php echo $i;?>"  value="<?php echo $wl_rcsm_options['social_link_'.$i]; ?>" >
												<label><?php _e('Open As New Tab  ','RCSM_TEXT_DOMAIN');?></label>
												<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['link_tab_'.$i]=='on') echo "checked='unchecked'"; ?> id="link_tab_<?php echo $i;?>" name="link_tab_<?php echo $i;?>" >
												<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Link Open Into New Tab ON/OFF","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											</div>
											<div class="col-md-6">
												<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Social Link Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_social_option" name="weblizar_rcsm_settings_save_social_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('social_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('social_option')" >
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Subscriber Form option setting -->
	<div class="tab-pane col-md-12" id="subscriber">
		<div class="col-md-12 option">
			<h1><?php _e('Subscriber','RCSM_TEXT_DOMAIN');?></h1>
			<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#subscriber-settings"><?php _e('Subscriber Form Settings','RCSM_TEXT_DOMAIN');?></a></li>
			<li><a data-toggle="tab" href="#subscriber-provider-option"><?php _e('Subscriber Email Settings','RCSM_TEXT_DOMAIN');?></a></li>
			<li><a data-toggle="tab" href="#subscriber-list"><?php _e('Subscriber List','RCSM_TEXT_DOMAIN');?></a></li>
			</ul>
			<div class="tab-content">
				<!-- Subscriber Form general settings -->
				<div id="subscriber-settings" class="tab-pane fade in active">
					<form action="post" id="weblizar_rcsm_subscriber_option">
						<h1><?php _e('Subscriber Form Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group subscriber-option active" id="rcsm_subscriber">
							<h4><?php _e('Subscriber Form Text','RCSM_TEXT_DOMAIN'); ?></h4><br/>
							<div class="row">
								<label><?php _e('Title','RCSM_TEXT_DOMAIN'); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here subscriber form Heading","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
								<br/>
								<div class="col-md-6">
									<input  class="form-control" type="text" name="subscriber_form_title" id="subscriber_form_title"  value="<?php echo $wl_rcsm_options['subscriber_form_title']; ?>" >
								</div>
							</div>
							<div class="row">
								<label><?php _e('Font Awesome Icons','RCSM_TEXT_DOMAIN'); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add relevant FontAwesome Icon Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
								<div class="col-md-6">
									<input  class="form-control" type="text" name="subscriber_form_icon" id="subscriber_form_icon"  value="<?php echo $wl_rcsm_options['subscriber_form_icon']; ?>">
								</div>
							</div>
							<div class="row">
								<label><?php _e('Sub Title','RCSM_TEXT_DOMAIN'); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here subscriber form Sub Heading","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
								<div class="col-md-6">
									<input  class="form-control" type="text" name="subscriber_form_sub_title" id="subscriber_form_sub_title"  value="<?php echo $wl_rcsm_options['subscriber_form_sub_title']; ?>" >
								</div>
							</div>
							<div class="row">						<label><?php _e('Message','RCSM_TEXT_DOMAIN'); ?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here subscriber form Message","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
								<div class="col-md-6">
									<textarea class="form-control" rows="8" cols="8" id="subscriber_form_message" name="subscriber_form_message" ><?php if($wl_rcsm_options['subscriber_form_message']!='') { echo esc_attr($wl_rcsm_options['subscriber_form_message']); } ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12 form-group subscriber-option active" id="rcsm_subscriber"> 
							<label><?php _e('Subscriber Form Button Text & Message Settings','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Type here subscriber form Setting","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
							<div class="col-md-12 checkbox">						
								<div class="col-md-4">
									<label><?php _e('Button Text','RCSM_TEXT_DOMAIN');?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control color-control" name="sub_form_button_text" id="sub_form_button_text" value="<?php echo 	$wl_rcsm_options['sub_form_button_text']; ?>" size="20">						
								</div> 					
							</div>
							<div class="col-md-12 checkbox">
								<div class="col-md-4">
									<label><?php _e('First Name Placeholder ','RCSM_TEXT_DOMAIN');?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control color-control" name="sub_form_button_f_name" id="sub_form_button_f_name" value="<?php echo $wl_rcsm_options['sub_form_button_f_name']; ?>" size="20">						
								</div>
							</div>
							<div class="col-md-12 checkbox">						
								<div class="col-md-4">
									<label><?php _e('Last Name Placeholder ','RCSM_TEXT_DOMAIN');?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control color-control" name="sub_form_button_l_name" id="sub_form_button_l_name" value="<?php echo $wl_rcsm_options['sub_form_button_l_name']; ?>" size="20">						
								</div>
							</div>	
							<div class="col-md-12 checkbox">
								<div class="col-md-4">
									<label><?php _e('Email Placeholder ','RCSM_TEXT_DOMAIN');?></label>
								</div>
								<div class="col-md-2">
									<input type="text" class="form-control color-control" name="sub_form_subscribe_title" id="sub_form_subscribe_title" value="<?php echo $wl_rcsm_options['sub_form_subscribe_title']; ?>" size="20">						
								</div>					
							</div>			
							<div class="col-md-12">
								<div class="col-md-6">
									<label><?php _e('Subscribe Success Message','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text message for Subscribed Success Message","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
									<input type="text" class="form-control" name="sub_form_subscribe_seuccess_message" id="sub_form_subscribe_seuccess_message" value="<?php echo $wl_rcsm_options['sub_form_subscribe_seuccess_message']; ?>">
								</div>
							</div>					
							<div class="col-md-12">
								<div class="col-md-6">
									<label><?php _e('Subscribe Invalid Message','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for Invalid Email Id Message","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
									<input type="text" class="form-control" name="sub_form_subscribe_invalid_message" id="sub_form_subscribe_invalid_message" value="<?php echo $wl_rcsm_options['sub_form_subscribe_invalid_message']; ?>">
								</div>
							</div>					
							<div class="col-md-12">
								<div class="col-md-6">
									<label><?php _e('Subscribe After Confirmation Success Message','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a confirmation message.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
									<input type="text" class="form-control" name="sub_form_subscribe_confirm_success_message" id="sub_form_subscribe_confirm_success_message" value="<?php echo $wl_rcsm_options['sub_form_subscribe_confirm_success_message']; ?>">
								</div>
							</div>					
							<div class="col-md-12">
								<div class="col-md-6">
									<label><?php _e('Already Subscribed Information Message','RCSM_TEXT_DOMAIN');?></label>
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a already subscribed message.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>							
									<input type="text" class="form-control" name="sub_form_subscribe_already_confirm_message" id="sub_form_subscribe_already_confirm_message" value="<?php echo $wl_rcsm_options['sub_form_subscribe_already_confirm_message']; ?>">
								</div>
							</div>					
							<div class="col-md-12">
								<div class="col-md-6">							
								<label><?php _e('Invaid Details send Error Message','RCSM_TEXT_DOMAIN');?></label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a text for a error message about showing of the Invalid details sent by subscribed users","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>						
									<input type="text" class="form-control" name="sub_form_invalid_confirmation_message" id="sub_form_invalid_confirmation_message" value="<?php echo $wl_rcsm_options['sub_form_invalid_confirmation_message']; ?>">
								</div>
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_subscriber_option" name="weblizar_rcsm_settings_save_subscriber_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('subscriber_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('subscriber_option')" >
						</div>
					</form>
				</div>
				
				<!-- Subscriber Form provider option setting -->
				<div id="subscriber-provider-option" class="tab-pane fade in ">
					<form action="post" id="weblizar_rcsm_subscriber_provider_option">
						<h1> <?php _e('Subscriber Email Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
							<div class="col-md-6 checkbox">
								<label><?php _e('Enable Email Based Subscriptions','RCSM_TEXT_DOMAIN');?></label><br/>
								<div class="info">
									<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['confirm_email_subscribe'] == 'on') echo "checked='unchecked'"; ?> id="confirm_email_subscribe" name="confirm_email_subscribe" >
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable the email confirmation system for valid subscribers.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
								</div>
							</div>
						</div>			
						<div class="form_deactivate-option <?php if($wl_rcsm_options['confirm_email_subscribe'] == 'off') echo "active"; ?>" id="deactivated_confirm_email_subscribe">
							<div class="col-md-12 form-group">
								<ul class="instruction_points">
									<li><?php _e('If Email Subscription is Enable: You have options "Wp Mail" to mail the subscribers and confirm its subscription through email.', 'RCSM_TEXT_DOMAIN');?></li>
									<li style="list-style: none;">&nbsp;</li>
									<li><?php _e('If email subscription option is disable: Email confirmation process not required. Users/Visitors will be added at subscriber list as active subscriber.', 'RCSM_TEXT_DOMAIN');?></li>
								</ul>				
							</div>			
						</div>
						<div class="form_select-option <?php if($wl_rcsm_options['confirm_email_subscribe'] == 'on') echo "active"; ?>" id="confirm_email_subscribe">
							<div class="col-md-12 form-group">
								<label><?php _e('Select Email Carrier Type', 'RCSM_TEXT_DOMAIN');?> </label>
								<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Select a email carrier type to send subscriber mails","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
								<div class="col-md-6">
									<?php $subscribe_select =$wl_rcsm_options['subscribe_select'];?>
									<select name="subscribe_select" id="subscribe_select" class="form-control">
										<option value="wp_mail" <?php echo selected($subscribe_select, 'wp_mail' ); ?>><?php _e('WP Mail','RCSM_TEXT_DOMAIN');?></option>
									</select>
									<ul class="instruction_points theme_msg_heading">
										<li><?php _e('WordPress Guideline: PHP Mailer Library Removed due to not supported by WordPress.org 4.7.2.', NLS_TEXT_DOMAIN ); ?></li>
										
									</ul>
								</div>
							</div>
							<div class="col-md-12 form-group subscribe-option <?php if ($subscribe_select=='wp_mail') echo "active";?>" id="wp_mail">
								<label><?php _e('WP Mail Subscriber','RCSM_TEXT_DOMAIN');?></label><br/><br/>
								<div class="col-md-12">
									<div class="col-md-6">
										<label><?php _e('Mail ID','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add Sender Email Id. By default User mail id has added","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										<input type="text" class="form-control" name="wp_mail_email_id" id="wp_mail_email_id" value="<?php echo $wl_rcsm_options['wp_mail_email_id']; ?>" />
									</div>
								</div>
							</div>
							
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_subscriber_provider_option" name="weblizar_rcsm_settings_save_subscriber_provider_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('subscriber_provider_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('subscriber_provider_option')" >
						</div>
					</form>
				</div>
			
				<!-- Get the Subscriber Form database output setting -->
				<div id="subscriber-list" class="tab-pane fade in">					
					<form action="post" id="weblizar_rcsm_subscribe_form">						
						<h1> <?php _e('Subscribers Options and List','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
							<div class="col-md-6">
								<label><?php _e('Auto Email sent to Subscribed Active Users after site Lunched','RCSM_TEXT_DOMAIN');?></label><br/>
								<div class="info">
									<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['auto_sentto_activeusers'] == 'on') echo "checked='unchecked'"; ?> id="auto_sentto_activeusers" name="auto_sentto_activeusers" >
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable auto email option to subscribed active users after site lunched.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
								</div>
							</div>
						</div>		
						<div class="col-md-12 form-group">
						<div class="col-md-6">
						<label><?php _e('Manual E-Mail To Subscribers','RCSM_TEXT_DOMAIN');?></label>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("This section used for mail to subscriber user","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
						<?php $sub_mail_option =$wl_rcsm_options['subscriber_users_mail_option'];?>
						</br>
						<span><?php _e('Select options','RCSM_TEXT_DOMAIN'); ?></span>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Below selection option have some types of user list (Active users , Pending users, Already mailed users)","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
						</br>
						<div class="col-md-12 no-pad" id="weblizar_rcsm_layout_switch">
							<select id="subscriber_users_mail_option" name="subscriber_users_mail_option" class="form-control">
								<option value="all_users" <?php echo selected($sub_mail_option, 'all_users' ); ?> ><?php _e('All Users','RCSM_TEXT_DOMAIN'); ?></option>
								<option value="selected_users" <?php echo selected($sub_mail_option, 'selected_users' ); ?> ><?php _e('Selected Users','RCSM_TEXT_DOMAIN'); ?></option>
								<option value="pending_users" <?php echo selected($sub_mail_option, 'pending_users' ); ?> ><?php _e('Pending Users','RCSM_TEXT_DOMAIN'); ?></option>
								<option value="active_users" <?php echo selected($sub_mail_option, 'active_users' ); ?> ><?php _e('Active Users','RCSM_TEXT_DOMAIN'); ?></option>
								<option value="already_mailed_users" <?php echo selected($sub_mail_option, 'already_mailed_users' ); ?> ><?php _e('Mail Received Users','RCSM_TEXT_DOMAIN'); ?></option>
							</select>
						</div>
						<span><?php _e('Subject','RCSM_TEXT_DOMAIN');?></span>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a Subject for sending mail.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
						<input  class="form-control" type="text" name="subscriber_mail_subject" id="subscriber_mail_subject"  value="<?php echo $wl_rcsm_options['subscriber_mail_subject']; ?>">
						<span><?php _e('Message','RCSM_TEXT_DOMAIN');?></span>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add a Message to send subscriber users","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
						<textarea class="form-control" rows="8" cols="8" id="subscriber_mail_message" name="subscriber_mail_message" placeholder="<?php _e('Add a Message to send subscriber Users','RCSM_TEXT_DOMAIN');?>"><?php if($wl_rcsm_options['subscriber_mail_message']!='') { echo esc_attr($wl_rcsm_options['subscriber_mail_message']); } ?></textarea>
						<!--<button name="submit_subscriber" class="subscriber_submit btn" type="submit"><?php// _e('Send','RCSM_TEXT_DOMAIN');?></button> -->
						<input type="hidden" value="1" id="weblizar_rcsm_submit_subscriber" name="weblizar_rcsm_submit_subscriber" />
						<input class="subscriber_submit btn" id="submit_subscriber" name="submit_subscriber" type="button" value="<?php _e('Send','RCSM_TEXT_DOMAIN');?>" >
						</div>
						</div> 
						<div class="col-md-12 form-group">
							<div class="subscribers-settings-wrap settings-content" >
								<h2><?php _e('Manage Subscriptions','RCSM_TEXT_DOMAIN');?></h2>
								<div class="row o_buttons">
									<div class="col-md-8 form-group">
										<strong><?php _e('Export List as CSV','RCSM_TEXT_DOMAIN');?></strong> 
										<a class="button button1" href="<?php echo plugins_url( 'export-all-csv.php', __FILE__ ); ?>"><?php _e('All Subscriber','RCSM_TEXT_DOMAIN');?></a>
										<a class="button button2" href="<?php echo plugins_url( 'export-subscribed-csv.php', __FILE__ ); ?>"><?php _e('Active Subscriber','RCSM_TEXT_DOMAIN');?></a>
										<a class="button button3" href="<?php echo plugins_url( 'export-pending-csv.php', __FILE__ ); ?>"><?php _e('Pending Subscriber','RCSM_TEXT_DOMAIN');?></a>
									</div>
									<div class="col-md-4 form-group">
										<?php 
										global $wpdb;
										$table_name = $table_name = $wpdb->prefix . "rcsm_subscribers";
										$user_sets_all = $wpdb->get_results("SELECT * FROM $table_name");
										if ($user_sets = $user_sets_all )
										if (count($user_sets) > 0) { ?>
										<input class="button button5 red left" name="remove_subs" type="button" value="<?php _e('Remove Selected Subscriber','RCSM_TEXT_DOMAIN');?>" id="remove-sub">
										<input class="button red button4 right" type="button" name="remove-all-subs" value="<?php _e('Removed All Users','RCSM_TEXT_DOMAIN');?>" id="remove-all-subs">
										<?php } ?>
									</div>
									<div class="modal fade" id="appearance_removed_option" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h2 class="modal-title"><?php _e('Data Delete SuccessFully','RCSM_TEXT_DOMAIN');?></h2>
												</div>
												<div class="modal-body">
													<p><?php _e('Your Selected Data Removed SuccessFully','RCSM_TEXT_DOMAIN');?></p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close','RCSM_TEXT_DOMAIN');?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
								global $wpdb;
								$table_name = $table_name = $wpdb->prefix . "rcsm_subscribers";
								$user_sets_unsubscribe = $wpdb->get_results("SELECT * FROM $table_name WHERE flag = '0' ");
								$user_sets_subscribe = $wpdb->get_results("SELECT * FROM $table_name WHERE flag = '1' ");
								$user_sets_all = $wpdb->get_results("SELECT * FROM $table_name");
								?>
								<table class="wp-list-table widefat fixed posts" id="dataTables-example" data-wp-lists="list:post">
									<thead>
										<tr>
											<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style=""></th>
											<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style="">
												<span><?php _e('First Name', 'RCSM_TEXT_DOMAIN'); ?></span>
											</th>
											<th scope="col" id="sub_cbx" class="manage-column column-title sortable asc" style="">
												<span><?php _e('Last Name', 'RCSM_TEXT_DOMAIN'); ?></span>
											</th>
											<th scope="col" id="sub_email" class="manage-column column-title sortable asc" style="">
												<span><?php _e('Email', 'RCSM_TEXT_DOMAIN'); ?></span>
											</th>
											<th scope="col" id="sub_date" class="manage-column column-shortcode" style="">
												<span><?php _e('Date', 'RCSM_TEXT_DOMAIN'); ?></span>
											</th>
											<th scope="col" id="act_code" class="manage-column column-shortcode" style="">
												<span><?php _e('Subscription Status', 'RCSM_TEXT_DOMAIN'); ?></span>
											</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										if ($user_sets = $user_sets_all )
											if (count($user_sets) > 0) {
												foreach ($user_sets as $user_set) { ?>
													<tr style="background-color: #f9f6f6;" class="all_users">
														<td class="check-column" ><?php echo '<input type="checkbox" name="rem[]" class="select_subs" value="'.esc_js(esc_html($user_set->id)).'">'; ?></td>
														<td class="shortcode column-shortcode"><?php echo $user_set->f_name; ?></td>
														<td class="shortcode column-shortcode"><?php echo $user_set->l_name; ?></td>
														<td class="shortcode column-shortcode"><?php echo $user_set->email; ?></td>
														<td class="shortcode column-shortcode"><?php echo $user_set->date; ?></td>
														<td class="shortcode column-shortcode"><?php if($user_set->flag == '1') {echo 'Active';}elseif($user_set->flag == '2'){echo 'Mail Send';}else{echo 'Pending';}?></td>
													</tr>
													<?php 
												}
											} else { ?>
													<tr>
														<td colspan="2"><div class="edmm-noresult"><?php _e('No Subscribers Found.','RCSM_TEXT_DOMAIN');?></div></td>
													</tr>
													<?php   
											} ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_subscribe_form" name="weblizar_rcsm_settings_save_subscribe_form" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('subscribe_form');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('subscribe_form')" >
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Counter Clock and progress Bar Setting -->
	<div class="tab-pane col-md-12" id="counter-clock">
		<div class="col-md-12 option">
			<h1><?php _e('Counter Clock','RCSM_TEXT_DOMAIN');?></h1>
			<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#counter-settings"><?php _e('Settings','RCSM_TEXT_DOMAIN');?></a></li>
			</ul>
			<div class="tab-content">
				<div id="counter-settings" class="tab-pane fade in active"> <!-- Counter Clock and Progress Bar General Settings -->
					<form action="post" id="weblizar_rcsm_counter_clock_option">
						<h1> <?php _e('Counter Clock Timer Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="counter-option active" id="counter_clock">
							<div class="col-md-12 form-group">
								<div class="col-md-12">
									<div class="row">
										<label><?php _e('Icon','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Relevant FontAwesome Icon Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
										<br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="counter_title_icon" id="counter_title_icon" value="<?php echo $wl_rcsm_options['counter_title_icon']; ?>">
										</div>
									</div>
									<div class="row">
										<label><?php _e('Title','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Counter Clock Title Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="counter_title" id="counter_title" value="<?php echo $wl_rcsm_options['counter_title']; ?>">
										</div>
									</div>
									<div class="row">
										<label><?php _e('Discription','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Counter Clock Message Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="counter_msg" id="counter_msg" value="<?php echo $wl_rcsm_options['counter_msg']; ?>">
										</div>
									</div>
									<div class="row">
										<label id="maintenance_time-label"><?php _e('Time To Live','RCSM_TEXT_DOMAIN');?></label>
										<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Add Live time here.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label><br/>
										<div class="col-md-6">
											<input  class="form-control" type="text" name="maintenance_date" id="maintenance_date" value="<?php if($wl_rcsm_options['maintenance_date']!='') { echo esc_attr($wl_rcsm_options['maintenance_date']); } ?>">
											<label><?php _e('When does your site launch? Server time is :','RCSM_TEXT_DOMAIN');?> <?php _e('<em>'  . current_time( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) . '</em> <a href="' . admin_url( 'options-general.php' ) . '" target="_blank">(Edit)</a>','RCSM_TEXT_DOMAIN');?></label>
										</div>
										<script>
										jQuery('#maintenance_date').datetimepicker();
										</script>
									</div>
								</div>
							</div>
							<div class="col-md-12 form-group">
							<div class="col-md-6">
								<label><?php _e('Auto site Launched','RCSM_TEXT_DOMAIN');?></label><br/>
								<div class="info">
									<input data-toggle="toggle" data-offstyle="off" type="checkbox" <?php if($wl_rcsm_options['disable_the_plugin'] == 'on') echo "checked='unchecked'"; ?> id="disable_the_plugin" name="disable_the_plugin" >
									<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enable and disable option to auto site launched and diactivate the coming soon page.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
								</div>
							</div>
						</div>	
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_counter_clock_option" name="weblizar_rcsm_settings_save_counter_clock_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('counter_clock_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('counter_clock_option')" >
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Footer Section Setting -->
	<div class="tab-pane col-md-12" id="footer">
		<div class="col-md-12 option">
			<h1><?php _e('Footer Options','RCSM_TEXT_DOMAIN');?></h1>
			<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#footer-setting"><?php _e('Footer Options','RCSM_TEXT_DOMAIN');?></a></li>
			</ul>
			<div class="tab-content">
				<div id="footer-setting" class="tab-pane fade in active"> <!--Footer Section General Setting-->
					<form action="post" id="weblizar_rcsm_footer_option">
						<h1> <?php _e('Footer Settings','RCSM_TEXT_DOMAIN'); ?></h1>
						<div class="col-md-12 form-group">
						<label><?php _e('Footer Copyright Text','RCSM_TEXT_DOMAIN');?></label>
						<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Footer Copyright Text Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
						<div class="col-md-6">
							<input  class="form-control" type="text" name="footer_copyright_text" id="footer_copyright_text"  value="<?php echo $wl_rcsm_options['footer_copyright_text']; ?>" >
						</div>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('Footer Link','RCSM_TEXT_DOMAIN');?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Footer Copyright Link Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							</br>
							<div class="col-md-6">
								<input  class="form-control" type="text" name="footer_link" id="footer_link"  value="<?php echo $wl_rcsm_options['footer_link']; ?>" >
							</div>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('Footer Link Text','RCSM_TEXT_DOMAIN');?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Enter Footer Link Text Here","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label></br>
							<div class="col-md-6">
								<input  class="form-control" type="text" name="footer_link_text" id="footer_link_text"  value="<?php echo $wl_rcsm_options['footer_link_text']; ?>" >
							</div>
						</div>
						<div class="restore">
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_footer_option" name="weblizar_rcsm_settings_save_footer_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('footer_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('footer_option')" >
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Advance options Setting -->
	<div class="tab-pane col-md-12" id="advance">
		<div class="col-md-12 option">
			<h1><?php _e('Advance Options','RCSM_TEXT_DOMAIN');?></h1>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#advance-settings"><?php _e('Advance Options Settings','RCSM_TEXT_DOMAIN');?></a></li>
			</ul>
			<div class="tab-content">
				<div id="advance-settings" class="tab-pane fade in active">	 <!-- Advance options General Setting -->
					<form action="post" id="weblizar_rcsm_advance_settings_option">
						<h1><?php _e('Advance Options Settings','RCSM_TEXT_DOMAIN');?></h1>								
						<div class="col-md-12 form-group">
							<label><?php _e('Custom CSS Editor','RCSM_TEXT_DOMAIN');?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("This is a powerful feature provided here. No need to use custom css plugin, just paste your css code and see the magic.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<textarea class="form-control" rows="12" cols="8" id="custom_css" name="custom_css" placeholder="<?php _e("Please type css directly. Don't add <style> tag after before CSS.","RCSM_TEXT_DOMAIN");?>"><?php if($wl_rcsm_options['custom_css']!='') { echo esc_attr($wl_rcsm_options['custom_css']); } ?></textarea>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('Google Analytic Tracking Code','RCSM_TEXT_DOMAIN');?> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Paste your Google Analytics tracking code here. This will be added into themes footer. Copy only scripting code i.e no need to use script tag ","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a></label>
							<textarea class="form-control" rows="12" cols="8" id="google_analytics" name="google_analytics" placeholder="<?php _e("Please directly copy and paste your Google Analytics script code here. Don't add <script> tag after before code.","RCSM_TEXT_DOMAIN");?>"><?php if($wl_rcsm_options['google_analytics']!='') { echo esc_attr($wl_rcsm_options['google_analytics']); } ?></textarea>
						</div>
						<div class="col-md-12 form-group">
							<label><?php _e('All Settings Restored','RCSM_TEXT_DOMAIN'); ?></label>
							<label><a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="<?php _e("Use This button only when you want resotred all section default data.","RCSM_TEXT_DOMAIN");?>"><i class="fa fa-info-circle tt-icon"></i></a> </label>
								<ul class="instruction_points">
									<li><?php _e('This option will deleted the all saved settings and Restored as default.','RCSM_TEXT_DOMAIN'); ?></li>
								</ul>
							<div class="restored">	
								<input type="hidden" value="1" id="weblizar_rcsm_settings_all_restored_settings_option" name="weblizar_rcsm_settings_all_restored_settings_option" />				
								<input class="button red" type="button" name="weblizar_rcsm_option_data_restored" value="<?php _e('Restored All Default Settings','RCSM_TEXT_DOMAIN');?>" id="weblizar_rcsm_option_data_restored">			
							</div>		
						</div>		
						<div class="restore">		  
							<input type="hidden" value="1" id="weblizar_rcsm_settings_save_advance_settings_option" name="weblizar_rcsm_settings_save_advance_settings_option" />
							<input class="button left" type="button" name="reset" value="<?php _e('Restore Defaults','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_reset('advance_settings_option');">
							<input class="button button-primary left" type="button" value="<?php _e('Save Options','RCSM_TEXT_DOMAIN');?>" onclick="weblizar_rcsm_option_data_save('advance_settings_option')" >
						</div> 
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Get Pro options Setting -->
	<div class="tab-pane col-md-12" id="get_pro">
		<div class="col-md-12 option">
			<h1><?php _e('Get Coming Soon Page & Maintenance Mode Pro','RCSM_TEXT_DOMAIN');?></h1>
			<div class="tab-content">
				<div id="get_pro-settings" class="tab-pane fade in active">	 <!-- Advance options General Setting -->
					<div class="col-md-12 form-group">
						<div class="row weblizar-theme-feature-detail">
							<div class="col-md-4 no-pad">
								<ul class="weblizar-pricing compaire">
									<li class="pricing-heading">Feature Set<span> &nbsp;</span></li>
									<li class="table-price-tag"><span data-before="" class="price">Price</span></li>
									<li>Multiple Pro Template</li>
									<li>Email Newsletter APIs</li>
									<li>Multiple Modes</li>									
									<li>News Letter Subscription</li>
									<li>Download Subscriber List</li>
									<li>Automatic Website Launch</li>
									<li>Auto &amp; Manual Notification</li>
									<li>Major Browser Compatible</li>
									<li>SEO Friendly</li>
									<li>Google Analytic Tracking</li>
									<li>Access Control Settings</li>
									<li>Drag &amp; Drop Layout Manager</li>
									<li>Multi Site and Multilingual</li>
									<li>Social Media Promotion</li>
									<li>Custom CSS</li>
									<li>Custom HTML Editor</li>
									<li>Font Family</li>
									<li>Custom Color Schemes</li>
									<li>Live Preview</li>
									<li>Unlimited Color Schemes</li>
									<li>Redirect Mode</li>
									<li>IP Block</li>									
									<li>Background Slide Show</li>
									<li>Background Video</li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="weblizar-pricing">
									<li class="pricing-heading">Free Version <span> &nbsp;</span></li>
									<li class="table-price-tag"><span data-before="" class="price">$0</span>
										<!--<div class="button-wrap">
											<a href="https://wordpress.org/plugins/responsive-coming-soon-page/" class="btn"><strong>Sign Up Today!</strong></a>
										</div>-->
									</li>
									
									<li><i class="fa icon fa-times danger"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li>1</li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-check success"></i></li>
									<li>Few</li>
									<li>Few</li>
									<li><i class="fa icon fa-check success"></i></li>
									<li>Few</li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li>General Fonts</li>
									<li>Few</li>
									<li><i class="fa icon fa-check success"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>
									<li><i class="fa icon fa-times danger"></i></li>									
								</ul>
							</div>
							<div class="col-md-4 no-pad">
								<ul class="weblizar-pricing extended-table">
									<li class="pricing-heading">Premium Version  <span> (For Single Site)&nbsp;</span></li>
									<li class="table-price-tag"><span data-before="$24" class="price">$12</span>
										<!--<div class="button-wrap">
											<a href="https://weblizar.com/amember/signup/coming-soon-page-maintenance-mode-pro" class="btn">
											<strong>Sign Up Today!</strong></a>
										</div>-->
									</li>
									<li>6 ( +4 More coming.. )</li>
									<li>7+</li>
									<li>5+</i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li>500+ Google Fonts				</li>
									<li>Unlimited				</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>									
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li><i class="fa icon fa-check success"></i>
									</li>
									<li class="price-info">
										<a class="btn-cart" href="https://weblizar.com/amember/signup/coming-soon-page-maintenance-mode-pro"><i class="fa fa-shopping-cart icon"></i> Buy Now</a>
										<!--<a class="btn-view" href=""><i class="fa fa-eye icon"></i> View Demo</a>-->
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>