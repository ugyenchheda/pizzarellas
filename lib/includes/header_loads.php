<?php
// juqery and css loads
add_action('wp_enqueue_scripts', 'kaya_jquery_scripts');
function kaya_jquery_scripts()
{
	$kaya_options = get_option('kayapati');
	wp_enqueue_script("jquery");
 	wp_enqueue_style('css_font_awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '3.0', 'all');
	wp_localize_script( 'jquery', 'wppath', array('template_path' => get_template_directory_uri('template_directory')));
	wp_enqueue_script( 'jquery_easing', KAYA_THEME_JS .'/jquery.easing.1.3.js',array(),'', true);	 // Easing	
	wp_enqueue_script('jquery_bxslider', KAYA_THEME_JS .'/jquery.bxslider.js',array(),'', true);// Bx Slider js
	wp_enqueue_style('css_bxslider', get_template_directory_uri() .'/css/jquery.bxslider.css', false, '', 'all'); // Bx Slider css
	wp_enqueue_script('js_supersized.3.2.7', KAYA_THEME_JS .'/supersized.3.2.7.js',array('jquery'),'', false);
	wp_enqueue_script('js_supersized.shutter', KAYA_THEME_JS .'/supersized.shutter.js',array('jquery'),'', false);
	wp_enqueue_style('css_supersized', get_template_directory_uri().'/css/supersized.css',false, '', 'all');
	wp_enqueue_style('css_supersized.shutter', get_template_directory_uri().'/css/supersized.shutter.css',false, '', 'all');
	wp_enqueue_script('jquery.mb.YTPlayer', KAYA_THEME_JS .'/jquery.mb.YTPlayer.js',array(),'', true);// Bx Slider js
	wp_enqueue_script('cloud-zoom.1.0.2.min', KAYA_THEME_JS .'/cloud-zoom.1.0.2.min.js',array(),'', true);// Bx Slider js
   if( class_exists('woocommerce') ){
		wp_enqueue_style('css_woocommerce', get_template_directory_uri() .'/css/kaya_woocommerce.css', false, '', 'all'); // Woocommerce
	}
	// Load Single Pages Scripts and Styles
	if(is_single()){ 
	// for BX slider
		}
	
		if (is_page_template('templates/template-contact.php') ){
			wp_enqueue_script( 'jquery_contact', KAYA_THEME_JS .'/contact.js');
	}	
	global $is_IE; // IE
    if( $is_IE ) {
		wp_enqueue_script('html5shim', '//html5shiv.googlecode.com/svn/trunk/html5.js', false, '1.1', true );
	}		
	// Isotop filter portfoloio
	wp_enqueue_script('jquery.isotope', KAYA_THEME_JS .'/jquery.isotope.min.js',array(),'', true);
  	wp_enqueue_style('css_Isotope', get_template_directory_uri().'/css/Isotope.css',false, '', 'all');
	wp_enqueue_script('jquery.fitvids', KAYA_THEME_JS .'/jquery.fitvids.js',array(),'', true);
	wp_enqueue_style('css_prettyphoto', get_template_directory_uri().'/css/prettyPhoto.css',false, '', 'all');
	wp_enqueue_script('jquery_prettyphoto', KAYA_THEME_JS .'/jquery.prettyPhoto.js',array(),'', true); // for fancybox  script
	wp_enqueue_script( 'jquery_easing', KAYA_THEME_JS .'/jquery.easing.1.3.js',array(),'', true);	 // Easing	
	wp_enqueue_script('jquery-custom', KAYA_THEME_JS .'/custom.js',array(),'', true);

}

//Styles
add_action('wp_enqueue_scripts', 'kaya_css_styles');

function kaya_css_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'spa-style', get_stylesheet_uri(), array() );
	wp_enqueue_style('css_portfolio', get_template_directory_uri() . '/css/portfolio.css',true, '3.0', 'all');
	wp_enqueue_style('css_slidemenu', get_template_directory_uri() . '/css/menu.css', true , '', 'all');
	wp_enqueue_style('css_skins', get_template_directory_uri().'/lib/includes/custom-skin.php', true, '', 'all');
	wp_register_style('css_responsive', get_template_directory_uri() . '/css/responsive.css', true, '3.0', 'all');
	//$responsive_mode=$kaya_options['Responsive_layout'] ? $kaya_options['Responsive_layout'] : '0';
	  $responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
 
if($responsive_mode == "on"){
	wp_enqueue_style('css_responsive');
	}
	// Google Font
	//--------------------------------------	
    $google_bodyfont=get_theme_mod( 'google_body_font', '' ) ? get_theme_mod( 'google_body_font', '' ) : '';
	$google_menufont=get_theme_mod( 'google_menu_font', '' ) ? get_theme_mod( 'google_menu_font', '' ) : '';
	$google_generaltitlefont=get_theme_mod( 'google_heading_font', '' ) ? get_theme_mod( 'google_heading_font', '' ) : '';
	$text_logo_font_family=get_theme_mod( 'text_logo_font_family', '' ) ? get_theme_mod( 'text_logo_font_family', '' ) : 'Leckerli One';

	$protocol = is_ssl() ? 'https' : 'http';
	if( $google_generaltitlefont ){
    	wp_enqueue_style( 'title_googlefonts', $protocol.'://fonts.googleapis.com/css?family='. urlencode( $google_generaltitlefont ).'&subset=latin,cyrillic-ext,greek-ext,greek,cyrillic');
	}
	if( $google_menufont ){
    	wp_enqueue_style( 'google_menufont', $protocol.'://fonts.googleapis.com/css?family='. urlencode( $google_menufont ).'&subset=latin,cyrillic-ext,greek-ext,greek,cyrillic');
	}
	if( $google_bodyfont ){
    	wp_enqueue_style( 'google_bodyfont', $protocol.'://fonts.googleapis.com/css?family='. urlencode( $google_bodyfont ).'&subset=latin,cyrillic-ext,greek-ext,greek,cyrillic');
	}
	if( $text_logo_font_family ){
    	wp_enqueue_style( 'text_logo_font_family', $protocol.'://fonts.googleapis.com/css?family='. urlencode( $text_logo_font_family ).'&subset=latin,cyrillic-ext,greek-ext,greek,cyrillic');
	}
}
//Admin script
add_action('admin_enqueue_scripts', 'kaya_admin_scripts');

function kaya_admin_scripts()
{
	wp_enqueue_script('kaya_admin_custommeta', KAYA_THEME_JS .'/kaya_admin_custommeta.js', array(),'', true);

}

function theme_customizer_js(){
	wp_enqueue_script('jquery_theme-customizer', KAYA_THEME_JS .'/theme-customizer.js',array(),'', true);
}
add_action( 'customize_controls_enqueue_scripts', 'theme_customizer_js',100 );

?>