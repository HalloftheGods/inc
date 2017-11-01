<?php 
// a basic wp w3all phpBB users importer into WordPress
  $up_conf_w3all_url = admin_url() . 'options-general.php?page=wp-w3all-users-to-wp';
 
  if ( !defined('PHPBB_INSTALLED') ){
   	die("<h2>Wp w3all miss phpBB configuration file:  please set the correct absolute path to phpBB by opening:<br /><br /> Settings -> WP w3all</h2>");

    } 
    
 	global $w3all_config,$wpdb;
  $phpbb_config = unserialize(W3PHPBBCONFIG);
  $phpbb_config_file = $w3all_config;
  $phpbb_conn = WP_w3all_phpbb::wp_w3all_phpbb_conn_init();

  if(!isset($_POST["start_select"])){
      $start_select = 0;
      $limit_select = 0;
      
       } else {
                $start_select = $_POST["start_select"] + $_POST["limit_select_prev"];
                $limit_select = $_POST["limit_select"];
             }

if(isset($_POST["start_select"]) && current_user_can( 'manage_options' )){
	define( "W3DISABLECKUINSERTRANSFER", true ); // or wp_w3all_phpbb_registration_save() will fire and block/remove!
	// on wp_w3all.php:
	// if ( is_multisite() OR defined('W3DISABLECKUINSERTRANSFER') ) { return; }
	
      // exclude bots, banned/guests groups, and install admin
 $phpbb_users = $phpbb_conn->get_results("SELECT *  
 FROM ". $phpbb_config_file["table_prefix"] ."users 
   LEFT JOIN ". $phpbb_config_file["table_prefix"] ."profile_fields_data ON ".$phpbb_config_file["table_prefix"] ."profile_fields_data.user_id = ".$phpbb_config_file["table_prefix"] ."users.user_id 
  WHERE ". $phpbb_config_file["table_prefix"] ."users.group_id != 6 
    AND ". $phpbb_config_file["table_prefix"] ."users.group_id != 1
    AND ". $phpbb_config_file["table_prefix"] ."users.user_type != 1 
    AND ". $phpbb_config_file["table_prefix"] ."users.user_id != 2
  LIMIT ". $start_select .", ". $limit_select ."");

if ( ! empty( $phpbb_users ) ) {
	echo '<br /><br />';
foreach ( $phpbb_users as $u ) {

      $u_real_username = sanitize_user( $u->username, $strict = false );
    	$user_id = username_exists( $u_real_username );
      $not_import_user = 0;
    	
    	if( $user_id ){
    		$user = get_user_by( 'ID', $user_id );
    		if( $user->user_email != $u->user_email ){
    			echo '<span style="color:#FF0000"> -> WARNING!</span> User <strong>'.$user->user_login.'</strong> existent in WP and email mismatch!<br /> -> User: <strong>'.$user->user_login.'</strong> email in WordPress -> <strong>'.$user->user_email.'</strong>, email in phpBB -> <strong>'.$u->user_email.'</strong>. <span style="color:red">Change email for this user to match the same in WP and phpBB!</span><br />';
    		  $not_import_user = 1;
    		} else {
    			echo 'Existent user: <strong>'.$user->user_login.'</strong> -> not imported<br />';
    			$not_import_user = 1;
    		  }
    	}
    	
  if( !$user_id ){
    	// this is really basic! improve as you like
         if ( $u->group_id == 5 ){
      	      
      	      $role = 'administrator';
      	      
            } elseif ( $u->group_id == 4 ){
            	
            	   $role = 'editor';
          	  
               }  else { $role = 'subscriber'; }  // for all others phpBB Groups default to WP subscriber 
               	
     //////// phpBB username chars fix          	   	
     // phpBB need to have users without characters like ' that is not allowed in WP as username? // REVIEW
      $pattern = '/\'/';
      preg_match($pattern, $u->username, $matches);
       if($matches){
	       echo 'User not added: username contain the char \' which is not allowed char for WordPress usernames<br />';
        } else { // add the user in WP
          	
           $u->username = sanitize_user( $u->username, $strict = false ); 
           
          	// as is, it add just url of the phpBB profile fields for this user in WP
          	if(!empty($u->pf_phpbb_website)){ // (checking only for the only one we go to add) ... there are also profile fields for this user 
          	// documentation not explain if is passed an empty value for url (x example) it will return some error: to avoid (and not go to check) two short arrays have been created
          		 
          		  // here you can add any profile filed to be added in WP
          		  $userdata = array( // with profile fields array (user_url) // unique profile field in a default WP that match phpBB (after email, username and password of course) 
                 'user_login'       =>  $u->username,
                 'user_pass'        =>  $u->user_password,
                 'user_email'       =>  $u->user_email,
                 'user_registered'  =>  date_i18n( 'Y-m-d H:i:s', $u->user_regdate ),
                 'role'             =>  $role,
                 'user_url'         =>  $u->pf_phpbb_website
                );
          	} else { // without profile fields array
                $userdata = array(
                 'user_login'       =>  $u->username,
                 'user_pass'        =>  $u->user_password,
                 'user_email'       =>  $u->user_email,
                 'user_registered'  =>  date_i18n( 'Y-m-d H:i:s', $u->user_regdate ),
                 'role'             =>  $role
                );
              }
          
       if( $not_import_user == 0 ){ 
          $user_id = wp_insert_user( $userdata );
        }
        
          if ( ! is_wp_error( $user_id ) ) {
          	 echo "<b>Added user -> <span style=\"color:red\">". $u->username ."</span></b><br />";
          } else {
            echo $user_id->get_error_message();
          }         	
       }    
  }


} // END foreach

  echo "<h2 style=\"color:brown\">Please continue adding phpBB users into WordPress by clicking the \"Continue to transfer phpBB users into WordPress\" button ...</h2>";

} // END if ( ! empty( $phpbb_users ) ) {


if ( ! empty( $phpbb_users ) ) {
	
     // echo "<h2 style=\"color:brown\">Please continue adding WP users to phpBB by clicking the \"Continue to transfer WP users to phpBB\" button ...</h2>";

} else {
	      echo '<h1 style="margin-top:2.0em;color:green">No more phpBB users found. User\'s transfer into WordPress has been completed!</h1>';
	      echo '<h2>All phpBB users have been added on WordPress with admin roles if Admin on phpBB, as Editor in Wordpress if Global moderator in phpBB, all others groups as Subscribers.<br />Deactivated users on phpBB or usernames that contain character \' have not been added. Existent usernames and the phpBB install admin (uid 2) have been excluded from the transfer process.</h2>';
        $t_end = true;
    }
}

 	$start_or_continue_msg = (!isset($_POST["start_select"])) ? 'Start transfer phpBB users into WordPress' : 'Continue to transfer phpBB users into WordPress';
  if( isset($t_end) ){ $start_or_continue_msg = 'Transfer complete! To re-start the transfer, reload this page'; }
 ?>
 
<div class="wrap" style="margin-top:4.0em;">
<div class=""><h1>Transfer phpBB Users into WordPress ( raw w3_all )</h1><h3>Note: this step is not required, while when integration start, it is mandatory to transfer WordPress users into phpBB using the <a href="<?php echo admin_url(); ?>options-general.php?page=wp-w3all-users-to-phpbb">WP w3all transfer</a>.</h3></div>

<h4><span style="color:red">Please Read</span>: do not put so hight value for users to transfer each time. It is set by default to 20 users x time, but you can change the value.<br />Try out: maybe 50, 100 or also 500 or more users to be added x time is ok for your system/server resources.<br />If error come out due to max execution time, it is necessary to adjust to a lower value the number of users to be added x time.<br />Refresh manually from browser: it will "reset the counter" of the transfer procedure.<br /> 
 Repeat the process by setting a lower value for users to be added x time: continue adding users until a <span style="color:green">green message</span> will display that the transfer has been completed.<br /><br />If there is an existent phpBB username on WordPress it will not be imported. 
 <br />All users are added on WordPress with Admin roles if Admin on phpBB, as Editor in Wordpress if Global Moderator in phpBB, all others as Subscribers.<br /> Deactivated users on phpBB, existent usernames in WordPress, phpBB usernames which contain the character ' and the phpBB install admin (uid 2) are excluded by the transfer process.</h4>
<form name="w3all_conf_add_users_to_phpbb" id="w3all-conf-add-users-to-phpbb" action="<?php echo esc_url( $up_conf_w3all_url ); ?>" method="POST">
<p>
 Transfer <input type="text" name="limit_select" value="20" /> users x time
  <input type="hidden" name="limit_select_prev" value="<?php echo $limit_select; ?>" />
  <input type="hidden" name="start_select" value="<?php echo $start_select;?>" /><br /><br />
<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo $start_or_continue_msg;?>">
</p></form></div>



