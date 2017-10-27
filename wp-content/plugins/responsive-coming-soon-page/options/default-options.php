<?php
//Default Options
function weblizar_rcsm_default_settings() {
	$default_bg= plugin_dir_url( __FILE__ ).'images/cg_img1.jpg';
	$logo_img= plugin_dir_url( __FILE__ ).'images/logo.png';
	$favicon_img= plugin_dir_url( __FILE__ ).'images/favicon.png';
	$site_title = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	global $current_user;
	wp_get_current_user();
	$LoggedInUserEmail1 = $current_user->user_email;
	$LoggedInUsername1 = $current_user->user_login;
	$wl_rcsm_options=array(
	
		//Ganeral Settings Options
		'select_template' => 'select_template1',
		'page_meta_title' =>$site_title.' - '.$site_description,
		'page_meta_keywords' =>'' ,
		'page_meta_discription' =>'Our website is under construction. It will be live soon.',
		'search_robots' =>'on',
		'rcsm_robots_meta'=>'index follow',
		'theme_font_family'=>'Merienda',
		'upload_favicon'=>$favicon_img,
		
		//Appearance Settings Options	
		'layout_status' =>'deactivate',
		//Coming Soon Mode
		'coming-soon_title' =>__('Our Site Is Coming Soon!!!','RCSM_TEXT_DOMAIN'), 
		'coming-soon_sub_title' =>'Stay Tuned For Something Amazing',
		'coming-soon_message' =>'Responsive Design & Faster User Interface',
		'site_logo' =>'logo_image',
		'logo_text_value' =>$site_title,
		'upload_image_logo' =>$logo_img,		
		'logo_height' =>'150',
		'logo_width' =>'250',
		'bg_color' =>'#0098ff',
		'template_bg_select' => 'Custom_Background',
		'custom_bg_img' =>$default_bg,
		'button_onoff' => 'on',
		'button_text'=> 'DISCOVER MORE',
		'button_text_link'=> '#timer',
		'link_admin' => 'on',
		'admin_link_text'=> 'Admin Dashboard',
		
		//Access Control Settings
		'user_value' => array(),
		'page_layout_swap' => array('Count Down Timer','Subscriber Form'),		

		//Skin Layout Settings
		'theme_color_schemes' => '#eb5054',
		
		//Social Settings
		'social_icon_1' =>'fa fa-facebook',
		'social_icon_2' =>'fa fa-twitter',
		'social_icon_3' =>'fa fa-google-plus',
		'social_icon_4' =>'fa fa-linkedin',
		'social_icon_5' =>'fa fa-pinterest',		
		'social_link_1' =>'#',
		'social_link_2' =>'#',
		'social_link_3' =>'#',
		'social_link_4' =>'#',
		'social_link_5' =>'#',
		'link_tab_1' =>'off',		
		'link_tab_2' =>'off',		
		'link_tab_3' =>'off',		
		'link_tab_4' =>'off',		
		'link_tab_5' =>'off',
		'total_Social_links'=>'5',
		'social_icon_list'=>'',
	
		//Subscriber Form Settings
		'subscriber_form' =>'on',	
		'subscriber_form_title' =>__('SUBSCRIBE TO OUR NEWSLETTER','RCSM_TEXT_DOMAIN'),
		'subscriber_form_icon' =>'fa fa-envelope-o',
		'subscriber_form_sub_title' => __('In the mean time connect with us to subscribed our newsletter','RCSM_TEXT_DOMAIN'),
		'subscriber_form_message' => __("Subscribe and we'll notify you on our launch. We'll also throw in a freebie for your effort.",'RCSM_TEXT_DOMAIN'),
		'sub_form_button_text' =>'Subscribe',		
		'sub_form_button_f_name' =>'First Name',
		'sub_form_button_l_name' =>'Last Name',
		'sub_form_subscribe_title' =>'Email',		'user_sets' => '$user_sets_all',
		'sub_form_subscribe_seuccess_message' => __( 'Thank you! We will be back with the quote.', 'RCSM_TEXT_DOMAIN' ),
		'sub_form_subscribe_invalid_message' => __('You have already subscribed.', 'RCSM_TEXT_DOMAIN' ),		'subscriber_msg_body' =>'',		'sub_form_subscribe_confirm_success_message' =>__('Thank You!!! Subscription has been confirmed. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' ),		'sub_form_subscribe_already_confirm_message' =>__('You subscription is already active. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' ),		'sub_form_invalid_confirmation_message' =>__('Error: Invalid subscription details.', 'RCSM_TEXT_DOMAIN' ),
		
		//Subscriber Form Option Settings
		'subscribe_select' =>'wp_mail',
		'wp_mail_email_id' =>$LoggedInUserEmail1,
		'confirm_email_subscribe' => 'off',
		
		//Subscriber List Options Setting
		'auto_sentto_activeusers' =>'on',
		'subscriber_users_mail_option' =>'all_users',
		'subscriber_mail_subject' =>'',
		'subscriber_mail_message' =>'',	

		// Counter Clock and Progress Bar Options
		'counter_title' => "We're Coming Soon",
		'counter_title_icon' =>'fa fa-clock-o',
		'counter_msg' =>'We Are Currently Working On Something Awesome',
		'disable_the_plugin' =>'off',
		'maintenance_date' => date("Y/m/d h:i", strtotime("+7 day")),
		
		// Footer Options
		'footer_copyright_text' =>'Copyright © 2016 Weblizar Themes & Plugins | All Rights Reserved By',
		'footer_link' =>'https://weblizar.com',
		'footer_link_text' =>'Weblizar',
		
		
		//Extra Advance options/option
		'custom_css' =>'',		
		'google_analytics' =>'',
		
		//feedback Settings
		'feedback_mail' =>'',
		'feedback_heading' =>'Book Appointment',
		'feedback_icon' =>'fa fa-calendar',
		'feedback_btn' =>'Booking Appointment',	
	);
	return apply_filters( 'weblizar_rcsm_options', $wl_rcsm_options );
}

// Options API
function weblizar_rcsm_get_options() {
    // Options API Settings
    return wp_parse_args( get_option( 'weblizar_rcsm_options', array() ), weblizar_rcsm_default_settings() );    
}

//General Options Setting
function rcsm_general_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$site_title = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	$wl_rcsm_options['page_meta_title']= $site_title.' - '.$site_description;
	$wl_rcsm_options['page_meta_keywords']= '';
	$wl_rcsm_options['page_meta_discription']= 'Our website is under construction. It will be live soon.';
	$wl_rcsm_options['search_robots']= 'on';
	$wl_rcsm_options['rcsm_robots_meta']= 'index follow';
	$wl_rcsm_options['upload_image_favicon']= '';	
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Appearance Options Setting
function rcsm_appearance_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$site_title = get_bloginfo( 'name' );
	$default_bg= plugin_dir_url( __FILE__ ).'images/cg_img1.jpg';
	$logo_img= plugin_dir_url( __FILE__ ).'images/logo.png';
	$wl_rcsm_options['layout_status']= 'deactivate';
	$wl_rcsm_options['coming-soon_title']= __('Our Site Is Coming Soon!!!','RCSM_TEXT_DOMAIN'); 
	$wl_rcsm_options['coming-soon_sub_title']=__('Stay Tuned For Something Amazing','RCSM_TEXT_DOMAIN');
	$wl_rcsm_options['coming-soon_message']= __('Responsive Design & Faster User Interface','RCSM_TEXT_DOMAIN');
	$wl_rcsm_options['upload_favicon']=$favicon_img;
	$wl_rcsm_options['site_logo']= 'logo_image';
	$wl_rcsm_options['logo_text_value']= $site_title;
	$wl_rcsm_options['upload_image_logo']=$logo_img;
	$wl_rcsm_options['logo_height']= '150';
	$wl_rcsm_options['logo_width']= '250';
	$wl_rcsm_options['bg_color']= '#0098ff';
	$wl_rcsm_options['template_bg_select']= 'Custom_Background';		
	$wl_rcsm_options['custom_bg_img']= $default_bg;
	$wl_rcsm_options['button_onoff']= 'on';
	$wl_rcsm_options['button_text']= 'DISCOVER MORE';
	$wl_rcsm_options['button_text_link']= '#timer';
	$wl_rcsm_options['link_admin']= 'on';
	$wl_rcsm_options['admin_link_text']= 'Admin Dashboard';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Access control Options Setting
function rcsm_access_control_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['show_page_as']= 'as_role';
	$wl_rcsm_options['user_value']= array();
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Layout swap control Options Setting
function rcsm_page_layout_swap_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');		
	$wl_rcsm_options['page_layout_swap'] = array('Count Down Timer','Subscriber Form');
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

// Layout Settings
function rcsm_layout_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['theme_font_family']= 'Merienda';
	$wl_rcsm_options['theme_color_schemes']= '#eb5054';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}


//Social Options Setting
function rcsm_social_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['social_icon_1']= 'fa fa-facebook';
	$wl_rcsm_options['social_icon_2']= 'fa fa-twitter';	
	$wl_rcsm_options['social_icon_3']= 'fa fa-google-plus';
	$wl_rcsm_options['social_icon_4']= 'fa fa-linkedin';
	$wl_rcsm_options['social_icon_5']= 'fa fa-pinterest';	
	for($i=1; $i<=5; $i++){
	$wl_rcsm_options['social_link_'.$i]= '#';
	$wl_rcsm_options['link_tab_'.$i]= 'off';
	}	
	$wl_rcsm_options['total_Social_links']='5';	
	$wl_rcsm_options['social_icon_list']='';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Subscriber Form Options Setting
function rcsm_subscriber_form_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['subscriber_form']= 'on';
	$wl_rcsm_options['subscriber_form_title']=__('SUBSCRIBE TO OUR NEWSLETTER','RCSM_TEXT_DOMAIN');
	$wl_rcsm_options['subscriber_form_icon']= 'fa fa-envelope-o';
	$wl_rcsm_options['subscriber_form_sub_title']= __('In the mean time connect with us to subscribed our newsletter','RCSM_TEXT_DOMAIN');
	$wl_rcsm_options['subscriber_form_message']= __("Subscribe and we'll notify you on our launch. We'll also throw in a freebie for your effort.",'RCSM_TEXT_DOMAIN'); 
	$wl_rcsm_options['sub_form_button_f_name']= 'First Name';
	$wl_rcsm_options['sub_form_button_l_name']= 'Last Name';
	$wl_rcsm_options['sub_form_button_text']= 'Subscribe';
	$wl_rcsm_options['sub_form_subscribe_title']= 'Email';
	$wl_rcsm_options['sub_form_subscribe_seuccess_message']=  __( 'Thank you! We will be back with the quote.', 'RCSM_TEXT_DOMAIN' );
	$wl_rcsm_options['sub_form_subscribe_invalid_message']= __('You have already subscribed.', 'RCSM_TEXT_DOMAIN' );		
	$wl_rcsm_options['subscriber_msg_body']= '';
	$wl_rcsm_options['sub_form_subscribe_confirm_success_message']= __('Thank You!!! Subscription has been confirmed. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' );		$wl_rcsm_options['sub_form_subscribe_already_confirm_message']=  __('You subscription is already active. We will notify when the site is live.', 'RCSM_TEXT_DOMAIN' );
	$wl_rcsm_options['sub_form_invalid_confirmation_message']= __('Error: Invalid subscription details.', 'RCSM_TEXT_DOMAIN' );
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}
		
//Subscriber Form Provider Options Setting
function rcsm_subscriber_provider_setting() {
	global $current_user;
	wp_get_current_user();
	$LoggedInUserEmail1 = $current_user->user_email;
	$LoggedInUsername1 = $current_user->user_login;
	$wl_rcsm_options = get_option('weblizar_rcsm_options');		
	$wl_rcsm_options['subscribe_select']= 'wp_mail';
	$wl_rcsm_options['wp_mail_email_id']= $LoggedInUserEmail1;		
	$wl_rcsm_options['confirm_email_subscribe']= 'off';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Subscriber List Options Setting
function rcsm_subscriber_list_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');	
	$wl_rcsm_options['auto_sentto_activeusers']= 'off';
	$wl_rcsm_options['subscriber_users_mail_option']= 'all_users';
	$wl_rcsm_options['subscriber_mail_subject']= '';
	$wl_rcsm_options['subscriber_mail_message']= '';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

// Counter Clock and Progress Bar Options Setting
function rcsm_counter_clock_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['counter_title_icon']= 'fa fa-clock-o';
	$wl_rcsm_options['counter_title']= "We're Coming Soon";
	$wl_rcsm_options['counter_msg']= 'We Are Currently Working On Something Awesome';
	$wl_rcsm_options['disable_the_plugin']= 'off';
	$wl_rcsm_options['maintenance_date']= date("Y/m/d h:i", strtotime("+7 day"));
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}	

//footer  Options Setting	
function rcsm_footer_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['footer_copyright_text']= __('Copyright © 2016 Weblizar Themes & Plugins | All Rights Reserved By','RCSM_TEXT_DOMAIN');
	$wl_rcsm_options['footer_link']= 'https://weblizar.com';
	$wl_rcsm_options['footer_link_text']= 'Weblizar';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Advance Options Setting
function rcsm_advance_option_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['custom_css']= '';		
	$wl_rcsm_options['google_analytics']= '';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}

//Feedback options Setting 		
function rcsm_feedback_setting() {
	$wl_rcsm_options = get_option('weblizar_rcsm_options');
	$wl_rcsm_options['feedback_mail']= '';
	$wl_rcsm_options['feedback_heading']= 'Book Appointment';
	$wl_rcsm_options['feedback_icon']= 'fa fa-calendar';
	$wl_rcsm_options['feedback_btn']= 'Booking Appointment';
	update_option('weblizar_rcsm_options', $wl_rcsm_options);
}