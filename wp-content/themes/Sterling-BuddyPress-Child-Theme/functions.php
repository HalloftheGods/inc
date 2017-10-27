<?php 
/*
* Instructions
* 
* Do not declare add_theme_support('buddypress') in Sterling Theme or in this Child Theme, because we need to use buddypress templates which are located in buddypress/bp-templates/bp-legacy/buddypress/
* 
*
* Insert your custom functions within the space below.
*/


/*
* @since 1.0
* Function used in Sterling-BuddyPress-Child-Theme/template-part-small-banner.php line 100
* This function shows buddypress post title obtained from $wp_query object.
*/
function st_bp_post_title(){
global $wp_query;
$post_title = $wp_query->queried_object->post_title;
global $bp;
if(!empty($bp->displayed_user->userdata->display_name)){
echo $bp->displayed_user->userdata->display_name;
}else{
echo $post_title;
}
}


/*
* @since 1.0
* Function used in Sterling-BuddyPress-Child-Theme/template-part-small-banner.php line 115
* This function extents Sterling breadcrumbs.
*/
function st_bp_breadcrumbs(){
$bc = new simple_breadcrumb; //call Sterling breadcrumbs first.

//add in buddypress breadcrumbs.
global $bp; 

//if there is current_action, we show breadcrumb extension.
if(!empty($bp->current_action)): 
if($bp->current_component){
	echo " &rarr; ".$bp->current_component;
	}
if($bp->current_action){
   if($bp->current_action == 'just-me'){
    echo " &rarr; personal";
   }else{
	echo " &rarr; ".$bp->current_action;
	}
  } 
endif;
}



//Original function in bp-notifications-actions.php line 24.
//nonce verification function bp_verify_nonce_request() does not work on localhost, 
//therefore modified with the following function.
remove_action( 'bp_actions', 'bp_notifications_action_mark_read' );
function tt_bp_notifications_action_mark_read() {

	// Bail if not the unread screen
	if ( ! bp_is_notifications_component() || ! bp_is_current_action( 'unread' ) ) {
		return false;
	}

	// Get the action
	$action = !empty( $_GET['action']          ) ? $_GET['action']          : '';
	$nonce  = !empty( $_GET['_wpnonce']        ) ? $_GET['_wpnonce']        : '';
	$id     = !empty( $_GET['notification_id'] ) ? $_GET['notification_id'] : '';

	// Bail if no action or no ID
	if ( ( 'read' !== $action ) || empty( $id ) || empty( $nonce ) ) {
		return false;
	}

	// Check the nonce and mark the notification
	if ( ! wp_verify_nonce( $nonce, 'bp_notification_mark_read_' .$id) ) {
     	bp_core_add_message( __( 'There was a problem marking that notification.', 'buddypress' ), 'error' );
	}else{
		bp_notifications_mark_notification( $id, false );
		bp_core_add_message( __( 'Notification successfully marked read.', 'buddypress' ) );
	}

	// Redirect
	bp_core_redirect( bp_displayed_user_domain() . bp_get_notifications_slug() . '/unread/' );
}
add_action( 'bp_actions', 'tt_bp_notifications_action_mark_read' );


//Original function in bp-notifications-actions.php line 60.
//nonce verification function bp_verify_nonce_request() does not work on localhost, 
//therefore modified with the following function.
remove_action( 'bp_actions', 'bp_notifications_action_mark_unread' );
function tt_bp_notifications_action_mark_unread() {

	// Bail if not the unread screen
	if ( ! bp_is_notifications_component() || ! bp_is_current_action( 'read' ) ) {
		return false;
	}

	// Get the action
	$action = !empty( $_GET['action']          ) ? $_GET['action']          : '';
	$nonce  = !empty( $_GET['_wpnonce']        ) ? $_GET['_wpnonce']        : '';
	$id     = !empty( $_GET['notification_id'] ) ? $_GET['notification_id'] : '';

	// Bail if no action or no ID
	if ( ( 'unread' !== $action ) || empty( $id ) || empty( $nonce ) ) {
		return false;
	}

	// Check the nonce and mark the notification
	if ( ! wp_verify_nonce( $nonce, 'bp_notification_mark_unread_' .$id) ) {
     	bp_core_add_message( __( 'There was a problem marking that notification.', 'buddypress' ), 'error' );
	}else{
		bp_notifications_mark_notification( $id, true ); 
		bp_core_add_message( __( 'Notification successfully marked unread.','buddypress' ));
	}

	// Redirect
	bp_core_redirect( bp_displayed_user_domain() . bp_get_notifications_slug() . '/read/' );
}
add_action( 'bp_actions', 'tt_bp_notifications_action_mark_unread' );


//Original function in bp-notifications-actions.php line 96.
//nonce verification function bp_verify_nonce_request() does not work on localhost, 
//therefore modified with the following function.
remove_action( 'bp_actions', 'bp_notifications_action_delete' );
function tt_bp_notifications_action_delete() {

	// Bail if not the unread screen
	if ( ! bp_is_notifications_component() || ! ( bp_is_current_action( 'read' ) || bp_is_current_action( 'unread' ) ) ) {
		return false;
	}

	// Get the action
	$action = !empty( $_GET['action']          ) ? $_GET['action']          : '';
	$nonce  = !empty( $_GET['_wpnonce']        ) ? $_GET['_wpnonce']        : '';
	$id     = !empty( $_GET['notification_id'] ) ? $_GET['notification_id'] : '';

	// Bail if no action or no ID
	if ( ( 'delete' !== $action ) || empty( $id ) || empty( $nonce ) ) {
		return false;
	}

	// Check the nonce and delete the notification
	if ( ! wp_verify_nonce( $nonce, 'bp_notification_delete_' .$id) ) {
	bp_core_add_message( __( 'There was a problem deleting that notification.', 'buddypress' ), 'error' );
	}else{
		bp_notifications_delete_notification( $id );
		bp_core_add_message( __( 'Notification successfully deleted.','buddypress' ) );
	}
	
	// Redirect
	bp_core_redirect( bp_displayed_user_domain() . bp_get_notifications_slug() . '/' . bp_current_action() . '/' );
}
add_action( 'bp_actions', 'tt_bp_notifications_action_delete' );













/*
* Do not add anything after this line of code, do not enter any blank space after the following php closing tag, or your site will crash!
*/
?>