<?php
$wl_rcsm_options = weblizar_rcsm_get_options(); 
/*
 * General settings save
 */
if(isset($_POST['weblizar_rcsm_settings_save_general_option'])) {
	if($_POST['weblizar_rcsm_settings_save_general_option'] == 1)  {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		if($_POST['search_robots']) {
			echo $wl_rcsm_options['search_robots']=sanitize_text_field($_POST['search_robots']);
		}  else {
			echo $wl_rcsm_options['search_robots']="off"; 
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}
	
	if($_POST['weblizar_rcsm_settings_save_general_option'] == 2) {
		rcsm_general_setting();
	}
}

/*
 * Appearance settings save
 */
if(isset($_POST['weblizar_rcsm_settings_save_appearance_option'])) {
	if($_POST['weblizar_rcsm_settings_save_appearance_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key] = sanitize_text_field($_POST[$key]);	
		}
		
		if($_POST['layout_status']) {
			echo $wl_rcsm_options['layout_status']=sanitize_text_field($_POST['layout_status']); 
		} else {
			echo $wl_rcsm_options['layout_status']="deactivate";
		}
		
		if($_POST['button_onoff']) {
			echo $wl_rcsm_options['button_onoff']=sanitize_text_field($_POST['button_onoff']);
		} else {
			echo $wl_rcsm_options['button_onoff']="off";
		}
		if($_POST['link_admin']) {
			echo $wl_rcsm_options['link_admin']=sanitize_text_field($_POST['link_admin']);
		} else {
			echo $wl_rcsm_options['link_admin']="off";
		}			
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}
	if($_POST['weblizar_rcsm_settings_save_appearance_option'] == 2) {
		rcsm_appearance_setting();
	}
}

/*
* Access Control setting 
*/
if(isset($_POST['weblizar_rcsm_settings_save_access_control_option'])) {	
	if($_POST['weblizar_rcsm_settings_save_access_control_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		$i=0;
		foreach($_POST['user_value'] as $user_value) {
			if($user_value!=''){ $value_get[$i] = $user_value;}				
			$i++;
		}
		$wl_rcsm_options['user_value']= $value_get;	
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));			
	}		
	if($_POST['weblizar_rcsm_settings_save_access_control_option'] == 2) {				
		rcsm_access_control_setting();			
	}
}
	
/*
 * Layout Swapping Settings
 */
if(isset($_POST['weblizar_rcsm_settings_save_pagelayoutmanger'])) {
	if($_POST['weblizar_rcsm_settings_save_pagelayoutmanger'] == 2) {
		rcsm_page_layout_swap_setting();
	}
}

if(isset($_POST['rcsm_layout_data'])) {
	if($_POST['rcsm_layout_data'] ) {
		/*send data hold*/
		$datashowredify = $_POST['rcsm_layout_data'];
		$hold = strstr($datashowredify,'|');
		$datashowredify = str_replace('|', '' ,$hold);				
		$data = explode(",",$datashowredify);				
		/*data save*/
		$wl_rcsm_options['page_layout_swap']=$data;
		/*update all field*/
		update_option('weblizar_rcsm_options' , $wl_rcsm_options);				
	}
}

/*
 * Layout Settings
 */
if(isset($_POST['weblizar_rcsm_settings_save_layout_option'])) {	
	if($_POST['weblizar_rcsm_settings_save_layout_option'] == 1) {	
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_layout_option'] == 2) {
		rcsm_layout_setting();
	}
}

/**
 * social media link Settings
 */
if(isset($_POST['weblizar_rcsm_settings_save_social_option'])) {	
	if($_POST['weblizar_rcsm_settings_save_social_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}
	if($_POST['weblizar_rcsm_settings_save_social_option'] == 2) {
		rcsm_social_setting();
	}
}

/*
 *    Subscriber Form Setting
 */
if(isset($_POST['weblizar_rcsm_settings_save_subscriber_option'])) {
	if($_POST['weblizar_rcsm_settings_save_subscriber_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}	
		if(isset($_POST['subscriber_form'])) {
			$wl_rcsm_options['subscriber_form'] = $_POST['subscriber_form'];
		} else {
			$wl_rcsm_options['subscriber_form'] = "off";
		} 
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_subscriber_option'] == 2) {	
		rcsm_subscriber_form_setting();
	}
}
	
if(isset($_POST['weblizar_rcsm_settings_save_subscriber_provider_option'])) {
	if($_POST['weblizar_rcsm_settings_save_subscriber_provider_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}			
		if(isset($_POST['confirm_email_subscribe'])) {
			$wl_rcsm_options['confirm_email_subscribe'] = $_POST['confirm_email_subscribe'];
		} else {
			$wl_rcsm_options['confirm_email_subscribe'] = "off";
		} 
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}
	if($_POST['weblizar_rcsm_settings_save_subscriber_provider_option'] == 2) {
		rcsm_subscriber_provider_setting();			
	}
}

if(isset($_POST['weblizar_rcsm_settings_save_subscriber_list_option'])) {
	if($_POST['weblizar_rcsm_settings_save_subscriber_list_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_subscriber_list_option'] == 2) {	
		rcsm_subscriber_list_setting();
	}
}
	
/*
 * Subscriber Form table Data setting 
 */
if(isset($_POST['weblizar_rcsm_subscriber_users_action'])) {
   if($_POST['weblizar_rcsm_subscriber_users_action'] == 1) {
		global $wpdb;
		header('Content-Type: text/csv');
		header('Content-Disposition: inline; filename="all-subscriber-list-'.date('YmdHis').'.csv"');  
		$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix . "rcsm_subscribers");
		echo "Email, Date, Activate-code, Status\r\n";			   
		if (count($results))  {
			foreach($results as $row) {
				 if($row->flag == '1') {$flags='Subscribed';}else{$flags='Pending';}
			echo $row->email.", ".$row->date.", ".$row->act_code.", ".$flags."\r\n";
			}
		}								
	}
	if($_POST['weblizar_rcsm_subscriber_users_action'] == 3) {
		global $wpdb;				
		$filename = "pending-subscriber-list-'.date('YmdHis').'.csv";
		header( 'Content-Description: File Transfer' );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		header( 'Content-Type: text/csv; charset=' . get_option( 'blog_charset' ), true );
		$results = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix . "rcsm_subscribers WHERE flag = '0'");
		echo "Email, Date, Activate-code\r\n";
		if (count($results))  {
			foreach($results as $row) {
				echo $row->email.", ".$row->date.", ".$row->act_code."\r\n";
			}
		}					
	}
	if($_POST['weblizar_rcsm_subscriber_users_action'] == 2) {						
		require_once('export-subscribed-csv.php');							
	}
}
	
/*
* Subscriber Form Data save setting 
*/
if(isset($_POST['weblizar_rcsm_settings_save_subscribe_form'])) {
	if($_POST['weblizar_rcsm_settings_save_subscribe_form'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		if($_POST['auto_sentto_activeusers']) {
			echo $wl_rcsm_options['auto_sentto_activeusers']=sanitize_text_field($_POST['auto_sentto_activeusers']);
		}  else {
			echo $wl_rcsm_options['auto_sentto_activeusers']="off"; 
		}	
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_subscribe_form'] == 2) {
		rcsm_subscriber_list_setting();		
	}
}
	
	
/**
 * Subscriber Form Mailed to Subscribers Users as selected action and Subscriber Form Data Removed setting 
 */	
if(isset($_POST['weblizar_rcsm_submit_subscriber'])){
	global $wpdb;
	$table_name = $table_name = $wpdb->prefix . "rcsm_subscribers";	
	if($_POST['weblizar_rcsm_submit_subscriber'] == 1) {						
		$email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE id !=0" );
	}elseif ($_POST['weblizar_rcsm_submit_subscriber'] == 2){								
		$z=0;
		if(is_array($_POST['rem'])){ 
			foreach($_POST['rem'] as $subscribe_id){
				if($subscribe_id!=''){
					$email_check = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = $subscribe_id" );										
				}
				$z++; 
			}
		}		
	}elseif ($_POST['weblizar_rcsm_submit_subscriber'] == 3){
		$email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE flag = '0'" );		
	}elseif ($_POST['weblizar_rcsm_submit_subscriber'] == 4){
		$email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE flag = '1'" );		
	}elseif ($_POST['weblizar_rcsm_submit_subscriber'] == 5){
		$email_check =$wpdb->get_results( "SELECT * FROM $table_name WHERE flag = '2'" );		
	}elseif($_POST['weblizar_rcsm_submit_subscriber'] == 6) {						
		global $wpdb;
		$table_name =  $wpdb->prefix . "rcsm_subscribers";
		$j=0;
			if (is_array($_POST['rem'])) { 
				foreach($_POST['rem'] as $subscribe_ids) {
					if($subscribe_ids!=''){
					$wpdb->delete( $table_name, array( 'id' => $subscribe_ids ), array( '%d' ) );
				}
				$j++; 
			}
		}		
	}elseif($_POST['weblizar_rcsm_submit_subscriber'] == 7) {
		global $wpdb;
		$table_name =  $wpdb->prefix . "rcsm_subscribers";
		$wpdb->query( $wpdb->prepare( "DELETE FROM $table_name WHERE flag != 30" ) );
	}	
	if($email_check){		
		foreach($email_check as $all_emails){
			$subscriber_email = $all_emails->email;
			$f_name = $all_emails->f_name;
			$l_name = $all_emails->l_name;
			$flag_act = $all_emails->flag;
			$current_time = current_time( 'Y-m-d h:i:s' );
			$adminemail = $wl_rcsm_options['wp_mail_email_id'];						 
			$plugin_url = site_url();             
			$headers = 'Content-type: text/html'."\r\n"."From:$plugin_url <$adminemail>"."\r\n".'Reply-To: '.$adminemail . "\r\n".'X-Mailer: PHP/' . phpversion();			
			$subject = $_POST['subscriber_mail_subject'].': Confirmation Subscription';
			$message = 'Hi '.$f_name.' '.$l_name.', <br/>';
			global $current_user;
			wp_get_current_user();
			$plugin_site_url = site_url();  
			$message .= $_POST['subscriber_mail_message'];
			$wp_mails= wp_mail( $subscriber_email, $subject, $message, $headers);
			//if($wp_mails){	
				//$user_search_result = $wpdb->get_row("SELECT * FROM `$table_name` WHERE `email` LIKE '$subscriber_email' AND `flag` LIKE '$flag_act'");
				//if(count($user_search_result)) {
					// check user is already subscribed	
					//if($user_search_result->flag != 2) {
					//	$wpdb->query("UPDATE `$table_name` SET `flag` = '2' WHERE `email` = '$subscriber_email'");
					//}
				//}
			//} 		
		}							
	}				
}


/*
* Counter Clock Settings
*/
if(isset($_POST['weblizar_rcsm_settings_save_counter_clock_option'])) {
	if($_POST['weblizar_rcsm_settings_save_counter_clock_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		//google map on conatact page
		if(isset($_POST['disable_the_plugin'])) {
			$wl_rcsm_options['disable_the_plugin'] = $_POST['disable_the_plugin'];
		} else {
			$wl_rcsm_options['disable_the_plugin'] = "off";	
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_counter_clock_option'] == 2) {
		rcsm_counter_clock_setting();		
	}
}
	
if(isset($_POST['weblizar_rcsm_settings_save_counter_clock_layout_option'])) {
	if($_POST['weblizar_rcsm_settings_save_counter_clock_layout_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_counter_clock_layout_option'] == 2) {
		rcsm_counter_clock_layout_setting();		
	}
}
	
/*
* footer area setting 
*/
if(isset($_POST['weblizar_rcsm_settings_save_footer_option'])) {
	if($_POST['weblizar_rcsm_settings_save_footer_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}			
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_footer_option'] == 2) {
		rcsm_footer_setting();
	}
}
	
	
/*
* Advance Settings
*/
if(isset($_POST['weblizar_rcsm_settings_save_advance_settings_option'])) {
	if($_POST['weblizar_rcsm_settings_save_advance_settings_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=$_POST[$key];	
		}
		// Social Icons section yes or on
		if(isset($_POST['show_notice_bar'])) {
			$wl_rcsm_options['show_notice_bar'] = $_POST['show_notice_bar'];
		} else {
			$wl_rcsm_options['show_notice_bar'] = "off";
		} 
		
		// Social Icons section yes or on
		if(isset($_POST['show_admin_link'])) {
			$wl_rcsm_options['show_admin_link'] = $_POST['show_admin_link'];
		} else {
			$wl_rcsm_options['show_admin_link'] = "off";
		}		
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));		
	}
	if($_POST['weblizar_rcsm_settings_save_advance_settings_option'] == 2) { 
		rcsm_advance_option_setting();
	}
}

/**
 * feedback area setting 
 */
if(isset($_POST['weblizar_rcsm_settings_all_restored_settings_option'])) {
	if($_POST['weblizar_rcsm_settings_all_restored_settings_option'] == 2){
		rcsm_general_setting();
		rcsm_appearance_setting();
		rcsm_access_control_setting();
		rcsm_page_layout_swap_setting();
		rcsm_skin_layout_setting();
		rcsm_social_setting();
		rcsm_subscriber_form_setting();
		rcsm_subscriber_provider_setting();
		rcsm_subscriber_list_setting();
		rcsm_counter_clock_setting();
		rcsm_counter_clock_layout_setting();
		rcsm_footer_setting();
		rcsm_advance_option_setting();		
	}		
}

if(isset($_POST['weblizar_rcsm_settings_save_feedback_form_option'])) {
	if($_POST['weblizar_rcsm_settings_save_feedback_form_option'] == 1) {
		foreach($_POST as  $key => $value) {
			$wl_rcsm_options[$key]=sanitize_text_field($_POST[$key]);	
		}
		update_option('weblizar_rcsm_options', stripslashes_deep($wl_rcsm_options));
	}	
	if($_POST['weblizar_rcsm_settings_save_feedback_form_option'] == 2) {
		rcsm_feedback_setting();
	}
}	
?>