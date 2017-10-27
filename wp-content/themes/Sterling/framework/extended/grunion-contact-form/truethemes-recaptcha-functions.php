<?php
/*
* helper functions for reCAPTCHA in Contact Form
*
*/

/*
* helper function to return reCAPTCHA form to grunion contact form plugin,
* so that it does not affect the JSON parsing, when editing contact form shortcodes.
* This is to fix incompatibility in WordPress version 3.3 plus
*/ 
function tt_get_recaptcha_form($id,$body,$nonce){
	
	//variables $id , $body and $nonce are generated by grunion contact form plugin
	//$id is id of contact form.
	//$body is all form fields.
	//$nonce is nonce security string.
	
	$r = '';
	$r .= "<form action='#contact-form-$id' method='post' class='contact-form commentsblock'>\n";
	$r .= $body;
	
	//mod by tt, we add in reCAPTCHA form at the end of grunion form fields, which is after $body and before submit button
	
	$captcha_public = get_option('st_publickey'); //get recapcha public key
		
		if($captcha_public): //setup recaptcha form only if there is API key.
		
			//get site option for reCAPTCHA Theme and reCAPTCHA custom theme code.
			global $ttso;
	    	$themes = $ttso->st_recaptcha_theme;
	    	$custom_theme_code = $ttso->st_recaptcha_custom;
	    	
	    			    //if there is no reCAPTCHA custom theme code, we return user selected reCAPTCHA standard theme javascript init setting.
	    			    if($custom_theme_code == ''):
	    			    	if($themes=="white_theme"){
									$r .= "<script type='text/javascript'>var RecaptchaOptions = {theme : 'white'};</script>";
	        					}elseif($themes=="black_theme"){
									$r .= "<script type='text/javascript'>var RecaptchaOptions = {theme : 'blackglass'};</script>";	        
	        					}elseif($themes=="clean_theme"){
									$r .= "<script type='text/javascript'>var RecaptchaOptions = {theme : 'clean'};</script>";	        
	        				}else{
	        					//show default theme
								$r .= "<script type='text/javascript'>var RecaptchaOptions = {theme : 'red'};</script>";	        
	        				}
	        					//reCAPTCHA form HTML Code pulled in from google servers via reCAPTCHA library : truethemes-recpatchalib.php
	        					//These are the codes that are causing JSON error in Contact Form Setup in WordPress Admin.
	        					//moving into this function and add into grunion contact form via function will prevent this error.
	        				    $r .= tt_recaptcha_get_html($captcha_public);
	        				    //add break tag to push down submit button
						    	$r .= "<br/>";
	    				endif;// if($custom_theme_code == '')
	    				
	    				
	    				//if there is reCAPTCHA custom theme code
	    				if($custom_theme_code !== ''):
	    					//we return custom theme code's javascript settings to initiate reCAPTCHA HTML form  
						    $r .= $custom_theme_code;
						    //reCAPTCHA HTML form
						    $r .= tt_recaptcha_get_html($captcha_public);
						    //break tag to push down submit button
					    	$r .= "<br/>";
				        endif;//end if($custom_theme_code !== '')    	
	
		
		endif; // if($captcha_public)
		
		
	$r .= "\t<p class='contact-submit'>\n";
	
	/**
    * Mod by tt, for submit button text and css class from site option setting
    * defaults to "Submit".
    */
    global $ttso;
    $submit_text = stripslashes($ttso->st_submit_button_text);
    if(!empty($submit_text)){
    $submit_button_text = $submit_text;
    }else{
    $submit_button_text = "Send Email";
    }
	
	//$r .= "\t\t<input type='submit' value='" . __( "Submit &#187;" ) . "' class='pushbutton-wide'/>\n";
	$r .= "\t\t<input type='submit' value='" . __($submit_button_text,"tt_theme_framework") . "' class='tt-form-submit'/>\n";
	
	$r .= "\t\t$nonce\n";
	$r .= "\t\t<input type='hidden' name='contact-form-id' value='$id' />\n";
	$r .= "\t</p>\n";
	$r .= "</form>\n</div>";
	
	return $r; // return the whole form code back to grunion contact form plugin.
}
?>