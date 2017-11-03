<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function fifteen_custom_css_mods() {

	$custom_css = "";
	
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('fifteen_disable_active_nav') ) :
		$custom_css .= "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('fifteen_center_logo') ) :
		
		$custom_css .= "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		
	endif;
	
	//Exception: When Logo is Centered, and Title Not Set to display in next line.
	if ( get_theme_mod('fifteen_center_logo') && !get_theme_mod('fifteen_branding_below_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: left; }";
	endif;
	
	//Exception: When Logo is centered, but there is no logo.
	if ( get_theme_mod('fifteen_center_logo') && !get_theme_mod('fifteen_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: center; }";
	endif;
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('fifteen_center_logo') ) :
		$custom_css .= "#masthead #site-logo img { transform-origin: left; }";
	endif;	

	
	if ( get_background_color() ) {
		$custom_css .= "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		$custom_css .= "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('fifteen_title_font','Ovo') ) :
		$custom_css .= ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('fifteen_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('fifteen_body_font','Quattrocento Pro') ) :
		$custom_css .= "body { font-family: ".esc_html(get_theme_mod('fifteen_body_font'))."; }";
	endif;
	
	if ( get_header_textcolor() ) :
		$custom_css .= "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
	endif;
	
	
	if ( get_theme_mod('fifteen_header_desccolor') ) :
		$custom_css .= "#masthead h2.site-description { color: ".esc_html(get_theme_mod('fifteen_header_desccolor','#777'))."; }";
	endif;
	
	
	if ( !display_header_text() ) :
		$custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	if ( fifteen_load_sidebar() ) :
		$custom_css .= ". { padding: 20px 20px; }";
	endif;
	
	if ( get_theme_mod('fifteen_logo_resize') ) :
		$val = esc_html(get_theme_mod('fifteen_logo_resize'))/100;
		$custom_css .= "#masthead #site-logo img { transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;

    // page & post fontsize
    if(get_theme_mod('fifteen_content_page_post_fontsize_set')):
        $val = get_theme_mod('fifteen_content_page_post_fontsize_set');
        if($val=='small'):
            $custom_css .= "#primary-mono .entry-content{ font-size:14px;}";
        elseif ($val=='medium'):
            $custom_css .= "#primary-mono .entry-content{ font-size:18px;}";
        elseif ($val=='large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:20px;}";
        elseif ($val=='extra-large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:22px;}";
        endif;
    else:
        $custom_css .= "#primary-mono .entry-content{ font-size:16px;}";
    endif;

    //site title font size
    //var_dump(get_theme_mod('fifteen_content_site_fontsize_set'));
    if(get_theme_mod('fifteen_content_site_title_fontsize_set')):
        $val=get_theme_mod('fifteen_content_site_title_fontsize_set');
        if($val != 'default'):
            $custom_css .= "#masthead h1.site-title {font-size:".$val."px !important;}";
        else:
            $custom_css .= "#masthead h1.site-title {font-size:42"."px;}";
        endif;
    endif;

    //site desc font size
    //var_dump(get_theme_mod('fifteen_content_site_desc_fontsize_set'));
    if(get_theme_mod('fifteen_content_site_desc_fontsize_set')):
        $val=get_theme_mod('fifteen_content_site_desc_fontsize_set');
        if($val != 'default'):
            $custom_css .= "#masthead h2.site-description {font-size:".$val."px !important;}";
        else:
            $custom_css .= "#masthead h2.site-description {font-size:18"."px;}";
        endif;
    endif;
		
		
		

	wp_add_inline_style( 'fifteen-main-theme-style', wp_strip_all_tags($custom_css) );
	
}

add_action('wp_enqueue_scripts', 'fifteen_custom_css_mods');