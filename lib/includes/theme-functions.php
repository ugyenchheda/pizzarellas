<?php
/* These are functions specific to the included option settings and this theme */
/*-----------------------------------------------------------------------------------*/
/* Theme Header Output - wp_head() */
/*-----------------------------------------------------------------------------------*/

/* Add Body Classes for Layout

/*-----------------------------------------------------------------------------------*/
// This used to be done through an additional stylesheet call, but it seemed like
// a lot of extra files for something so simple. Adds a body class to indicate sidebar position.

add_filter('body_class','kaya_body_class');
function kaya_body_class($classes) {

	$shortname =  get_option('kaya_shortname');

	$layout = get_option($shortname .'_layout');

	if ($layout == '') {

		$layout = 'layout-2cr';

	}

	$classes[] = $layout;

	return $classes;

}


/*-----------------------------------------------------------------------------------*/

/* Add Favicon

/*-----------------------------------------------------------------------------------*/
function favicon() {
  $favicon = get_option('favicon'); 
  	if ($favicon['favi_img']) {
		echo '<link rel="shortcut icon" href="'.  $favicon['favi_img']  .'"/>'."\n";
	}
}
add_action('wp_head', 'favicon');
/*-----------------------------------------------------------------------------------*/

/* Custom CSS

/*-----------------------------------------------------------------------------------*/
function custom_css() {
$kaya_custom_css = get_theme_mod('kaya_custom_css') ? get_theme_mod('kaya_custom_css') : '';
if($kaya_custom_css)
{
	echo '<style>';
	echo $kaya_custom_css;
	echo '</style>';
}
}
add_action('wp_head', 'custom_css');
/*-----------------------------------------------------------------------------------*/

/* Custom JS

/*-----------------------------------------------------------------------------------*/
function custom_js() {
echo $kaya_custom_js = get_theme_mod('kaya_custom_jquery') ? get_theme_mod('kaya_custom_jquery') : '';
if($kaya_custom_js)
{ ?>
 <script type="text/javascript">
 (function($) {
  "use strict";
  $(function() { 
    <?php echo $kaya_custom_js; ?>
});
})(jQuery);
    
</script>
<?php }
}
add_action('wp_head', 'custom_js');
/*-----------------------------------------------------------------------------------*/

/* Show analytics code in footer */

/*-----------------------------------------------------------------------------------*/

function childtheme_analytics(){

	$shortname =  get_option('kaya_shortname');

	$output = get_option($shortname . '_google_analytics');

	if ( $output <> "" ) 

		echo stripslashes($output) . "\n";

}

add_action('wp_footer','childtheme_analytics');


function kaya_slider_page_title_data(){
  global $post_item_id, $post;
  echo  kaya_post_item_id();

    if( class_exists('woocommerce') ){
        if( is_shop() ){
          $select_page_options=get_post_meta( woocommerce_get_page_id( 'shop' ),'select_page_options',true);
        }else{ if( get_post() ) { $select_page_options=get_post_meta(get_the_ID(),'select_page_options',true); } else{ $select_page_options = ''; } }
    }elseif( is_page()){
         $select_page_options=get_post_meta($post->ID,'select_page_options',true);
    }else{
        $select_page_options = '';
    }
// Select Page Sub header Options
  if( $select_page_options == 'page_slider_setion'){
     kaya_image_slider(); 
  }
  elseif($select_page_options=="singleimage"){
     get_template_part('slider/single','image');
  }
  elseif($select_page_options=="video"){
    get_template_part('slider/video','slider');
  }
  elseif($select_page_options == 'page_title_setion'){
     if( is_front_page()){ }else{
       kaya_custom_pagetitle($post->ID); 
      } 
  }
  elseif($select_page_options == 'none'){
     
  }
  else{
    if( is_single() || is_tax() || is_archive() ){
         kaya_custom_pagetitle($post->ID); 
    }else{
       kaya_custom_pagetitle($post->ID); 
    }

  }
}
/* Theme customization */
function kaya_custom_colors(){
  // Logo Section
   global $post;
   // Layout Options
    $url=get_template_directory_uri().'/images/';
    $layout_margin_top = get_theme_mod( 'layout_margin_top','' );
    $layout_margin_bottom = get_theme_mod( 'layout_margin_bottom' );
    $boxed_layout_shadow = get_option( 'boxed_layout_shadow' );
    $responsive_layout_mode = get_option( 'responsive_layout_mode' );
    $home_container_bg = get_theme_mod( 'home_container_bg' ) ? get_theme_mod( 'home_container_bg' ) : 'on'; // Home Container Bg
    $layout_border_top = get_theme_mod( 'layout_border_top' ) ? get_theme_mod( 'layout_border_top' ) : '#EF7360 ';
   // $logo_margin_top = get_theme_mod( 'logo_margin_top', '' );
    $upload_header = get_option('upload_header');
    $header_image_repeat = get_theme_mod('header_image_repeat') ? get_theme_mod('header_image_repeat') : 'repeat';
    //  Header Section
    $text_logo_font_size = get_theme_mod('text_logo_font_size') ? get_theme_mod('text_logo_font_size') : '150' ;
    $text_logo_font_color = get_theme_mod('text_logo_font_color') ? get_theme_mod('text_logo_font_color') : '#ffffff' ;
    $logo_margin_bottom = get_theme_mod('logo_margin_bottom') ? get_theme_mod('logo_margin_bottom') : '-10' ;
    $logo_desc_text_color = get_theme_mod('logo_desc_text_color') ? get_theme_mod('logo_desc_text_color') : '#fff' ;
    $text_logo_font_family = get_theme_mod('text_logo_font_family') ? get_theme_mod('text_logo_font_family') : 'Leckerli One' ;
   
    $page_title_bar = get_option('page_title_bar');
    $page_title_bar_bg_repeat = get_theme_mod('page_title_bar_bg_repeat') ? get_theme_mod('page_title_bar_bg_repeat') : 'repeat' ;
    $page_title_bg_color = get_theme_mod( 'page_title_bg_color' ) ? get_theme_mod( 'page_title_bg_color' ) : '';
    $page_titlebar_title_color = get_theme_mod('page_titlebar_title_color') ? get_theme_mod('page_titlebar_title_color') : '#333333';
    $page_title_bg = get_option('page_title_bg');
     // Menu  Section
 
    $menubg = get_option('menubg');
    $menubg_repeat = get_theme_mod('menubg_repeat') ? get_theme_mod('menubg_repeat') : 'repeat' ;
    $menu_bg_active_color = get_option('menu_bg_active_color') ? get_option('menu_bg_active_color') : '#000' ;
    $menu_link_active_color = get_option('menu_link_active_color') ? get_option('menu_link_active_color') : '#fff' ;

    $menu_icon_color = get_option('menu_icon_color') ? get_option('menu_icon_color') : '#339933';
    $menu_background_color = get_option('menu_background_color') ? get_option('menu_background_color') : '' ;
    $menu_border_color = get_option('menu_border_color') ? get_option('menu_border_color') : '' ;
    $menu_link_color = get_option('menu_link_color') ? get_option('menu_link_color') : '#fff' ;
    $menu_link_hover_text_color = get_option('menu_link_hover_text_color') ? get_option('menu_link_hover_text_color') : '#ffffff';
    $menu_link_hover_bg_color = get_option('menu_link_hover_bg_color') ? get_option('menu_link_hover_bg_color') : '#000';
    $sub_menu_link_color = get_option('sub_menu_link_color') ? get_option('sub_menu_link_color') : '#848484';
    $sub_menu_link_hover_color = get_option('sub_menu_link_hover_color') ? get_option('sub_menu_link_hover_color') : '#fff';
    $sub_menu_bg_color = get_option('sub_menu_bg_color') ? get_option('sub_menu_bg_color') : '#1e1e1e';
    $sub_menu_link_hover_bg_color = get_option('sub_menu_link_hover_bg_color') ? get_option('sub_menu_link_hover_bg_color') : '#333333';
    $sub_menu_bottom_border_color = get_option('sub_menu_bottom_border_color') ? get_option('sub_menu_bottom_border_color') : '#020202';
    $sub_menu_link_active_color = get_option('sub_menu_link_active_color') ? get_option('sub_menu_link_active_color') : '#ffffff';
    $sub_menu_active_bg_color = get_option('sub_menu_active_bg_color') ? get_option('sub_menu_active_bg_color') : '#333';
    
    //Page color settings
    $page_content_bg = get_option('page_content_bg');
    $page_content_bg_repeat = get_theme_mod('page_content_bg_repeat') ? get_theme_mod('page_content_bg_repeat') : 'repeat' ;
    $page_bg_color = get_option('page_bg_color') ? get_option('page_bg_color') : '';
    $page_titles_color = get_option('page_titles_color') ? get_option('page_titles_color') : '#333';
    $page_description_color = get_option('page_description_color') ? get_option('page_description_color') : '#555555';
    $page_link_color = get_option('page_link_color') ? get_option('page_link_color') : '#2EA2CC';
    $page_link_hover_color = get_option('page_link_hover_color') ? get_option('page_link_hover_color') : '#339933';
 
        //Sidebar color settings
    $sidebar_bg_color = get_option('sidebar_bg_color') ? get_option('sidebar_bg_color') : '';
    $sidebar_title_color = get_option('sidebar_title_color') ? get_option('sidebar_title_color') : '#333';
    $sidebar_link_color = get_option('sidebar_link_color') ? get_option('sidebar_link_color') : '#2EA2CC';
    $sidebar_link_hover_color = get_option('sidebar_link_hover_color') ? get_option('sidebar_link_hover_color') : '#339933';
    $sidebar_content_color = get_option('sidebar_content_color') ? get_option('sidebar_content_color') : '#555555';
    // Accent Color Section
  	$accent_bg_color = get_option('accent_bg_color') ? get_option('accent_bg_color') : '#339933';
  	$accent_text_color = get_option('accent_text_color') ? get_option('accent_text_color') : '#ffffff';
    /* Footer Section */
    $footerbg = get_option('footerbg');
     $footerbg_repeat = get_theme_mod('footerbg_repeat') ? get_theme_mod('footerbg_repeat') : 'repeat' ;
    $footer_bg_color = get_option('footer_bg_color') ? get_option('footer_bg_color') : '';
    $footer_title_color = get_option('footer_title_color') ? get_option('footer_title_color') : '#FFFFFF';
    $footer_text_color = get_option('footer_text_color') ? get_option('footer_text_color') : '#ffffff';
    $footer_link_color = get_option('footer_link_color') ? get_option('footer_link_color') : '#ffffff';
    $footer_link_hover_color = get_option('footer_link_hover_color') ? get_option('footer_link_hover_color') : '#eee';
    /* Font Family */
    $google_bodyfont=get_theme_mod( 'google_body_font' ) ? get_theme_mod( 'google_body_font' ) : '';
    $google_menufont=get_theme_mod( 'google_menu_font') ? get_theme_mod( 'google_menu_font' ) : '';
    $google_generaltitlefont=get_theme_mod( 'google_heading_font') ? get_theme_mod( 'google_heading_font') : '';
     /* Font Sizes */
    /* Title Font sizes H1 */
    $h1_title_font_size=get_theme_mod( 'h1_title_fontsize', '' ) ? get_theme_mod( 'h1_title_fontsize', '' ) : '30'; // H1
    $h2_title_font_size=get_theme_mod( 'h2_title_fontsize', '' ) ? get_theme_mod( 'h2_title_fontsize', '' ) : '27'; // H2
    $h3_title_font_size=get_theme_mod( 'h3_title_fontsize', '' ) ? get_theme_mod( 'h3_title_fontsize', '' ) : '19'; // H3
    $h4_title_font_size=get_theme_mod( 'h4_title_fontsize', '' ) ? get_theme_mod( 'h4_title_fontsize', '' ) : '18'; // H4
    $h5_title_font_size=get_theme_mod( 'h5_title_fontsize', '' ) ? get_theme_mod( 'h5_title_fontsize', '' ) : '16'; // H5
    $h6_title_font_size=get_theme_mod( 'h6_title_fontsize', '' ) ? get_theme_mod( 'h6_title_fontsize', '' ) : '12'; // H6
    $body_font_size=get_theme_mod( 'body_font_size', '' ) ? get_theme_mod( 'body_font_size', '' ) : '13'; // Body Font Size
     $menu_font_size=get_theme_mod( 'menu_font_size', '' ) ? get_theme_mod( 'menu_font_size', '' ) : '14'; // Body Font Size
    
       /* Menu TOp */
   $menu_margin_top =get_theme_mod( 'menu_margin_top', '' ) ? get_theme_mod( 'menu_margin_top', '' ) : ''; // H6

   /* Portfolio Thumbnail color section */
   $pf_posts_title_bg_color = get_theme_mod('pf_posts_title_bg_color') ? get_theme_mod('pf_posts_title_bg_color') : '';
   $pf_posts_title_color = get_theme_mod('pf_posts_title_color') ? get_theme_mod('pf_posts_title_color') : '#ffffff';
   /* Woocommerce Color Section */
    $primary_buttons_bg_color = get_option('primary_buttons_bg_color') ? get_option('primary_buttons_bg_color') : '#434a54';
    $primary_buttons_text_color = get_option('primary_buttons_text_color') ? get_option('primary_buttons_text_color') : '#ffffff';
    $primary_buttons_bg_hover_color = get_option('primary_buttons_bg_hover_color') ? get_option('primary_buttons_bg_hover_color') : '#bf1952';
    $primary_buttons_text_hover_color = get_option('primary_buttons_text_hover_color') ? get_option('primary_buttons_text_hover_color') : '#ffffff';

    $secondary_buttons_bg_color = get_option('secondary_buttons_bg_color') ? get_option('secondary_buttons_bg_color') : '#bf1952';
    $secondary_buttons_text_color = get_option('secondary_buttons_text_color') ? get_option('secondary_buttons_text_color') : '#ffffff';
    $secondary_buttons_bg_hover_color = get_option('secondary_buttons_bg_hover_color') ? get_option('secondary_buttons_bg_hover_color') : '#434a54';
    $secondary_buttons_text_hover_color = get_option('secondary_buttons_text_hover_color') ? get_option('secondary_buttons_text_hover_color') : '#ffffff';
    $woo_elments_colors = get_option('woo_elments_colors') ? get_option('woo_elments_colors') : '#bf1952';

    $success_msg_bg_color = get_option('success_msg_bg_color') ? get_option('success_msg_bg_color') : '#dff0d8';
    $success_msg_text_color = get_option('success_msg_text_color') ? get_option('success_msg_text_color') : '#468847';
    $notification_msg_bg_color = get_option('notification_msg_bg_color') ? get_option('notification_msg_bg_color') : '#b8deff';
    $notification_msg_text_color = get_option('notification_msg_text_color') ? get_option('notification_msg_text_color') : '#333';
    $warning_msg_bg_color = get_option('warning_msg_bg_color') ? get_option('warning_msg_bg_color') : '#f2dede';
    $warning_msg_text_color = get_option('warning_msg_text_color') ? get_option('warning_msg_text_color') : '#a94442';
   // Start css Styles 
     $css = '';

    /* body Font family */
        /*  Menu Font Family */
    $lineheight_body = round((1.5 * $body_font_size));
    $lineheight_h1 = round((1.4 * $h1_title_font_size));
    $lineheight_h2 = round((1.4 * $h2_title_font_size));
     $lineheight_h3 = round((1.4 * $h3_title_font_size));
     $lineheight_h4 = round((1.4 * $h4_title_font_size)); 
     $lineheight_h5 = round((1.4 * $h5_title_font_size));
     $lineheight_h6 = round((1.4 * $h6_title_font_size));
    $css .= '
      #box_layout{
          margin-top : '.$layout_margin_top.'px!important;
          margin-bottom : '.$layout_margin_bottom.'px!important;
      }';
    if($boxed_layout_shadow == "1" ){
    $css .= '#box_layout{
             box-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
      }'; 
    }  
   $css .= '.menu ul li a{
        font-family:'.$google_menufont.'!important;
        font-size:'.$menu_font_size.'px;
        line-height: 100%;
    }
    nav{
      margin-top: '.$menu_margin_top.'px;
    }
    body, p{
        font-family:'.$google_bodyfont.'!important;
        line-height:'.$lineheight_body.'px;
        font-size:'.$body_font_size.'px;
    }
    p{
        padding-bottom:'.$lineheight_body.'px;
    }
    /* Heading Font Family */
     h1, h2, h3, h4, h5, h6{
        font-family:'.$google_generaltitlefont.'!important;
    }
    /* Font Sizes */
    h1{
      font-size:'.$h1_title_font_size.'px;
     line-height:'.$lineheight_h1.'px;
    }
    h2{
     font-size:'.$h2_title_font_size.'px;
      line-height:'.$lineheight_h2.'px;
    }
    h3{
      font-size:'.$h3_title_font_size.'px!important;
      line-height:'.$lineheight_h3.'px!important;
    }
    h4{
      font-size:'.$h4_title_font_size.'px;
      line-height:'.$lineheight_h4.'px;
    }
    h5{
     font-size:'.$h5_title_font_size .'px;
      line-height:'. $lineheight_h5 .'px;
       font-weight: 300;
    }
    h6{
      font-size:'.$h6_title_font_size.'px;
      line-height:'.$lineheight_h6.'px;
      font-weight: 300;
    }';

    /* Home Page Container Bg  */
    if( $home_container_bg == 'off' ){
    $css .= '.home #mid_container_wrapper{
          background: none!important;
          box-shadow: 0 0 0!important;
          border: 0 none;
    }'; 
  }
   /* Header Section */
    $css .= '#header_title_bar_container{
          border-top:5px solid '.$layout_border_top.';
      }';
      $bg_size = ( $header_image_repeat == 'no-repeat' ) ? 'cover' : 'inherit';
      if( $upload_header['bg_image'] ){
     $css .= ' .header_bg_img{
       background:url('.$upload_header['bg_image'].');
       background-repeat:'.$header_image_repeat.'!important;
       background-size:'.$bg_size.'!important;
       background-attachment: scroll!important;
        }';
       } 

       // Logo
       $css .= 'h1.logo, .logo{
          font-size:'.$text_logo_font_size.'px;
          color:'.$text_logo_font_color.';
          margin-bottom:'.$logo_margin_bottom.'px;
          font-family:'.$text_logo_font_family.'!important;
        }';
     $css .= '.logo_desc h1, .logo_desc h2, .logo_desc h3,
        .logo_desc h4, .logo_desc h5, .logo_desc h6,
        .logo_desc p, .logo_desc{
            color:'.$logo_desc_text_color.';
        }';       
        /* Accent Color Settings */
    $css .= '.post_description, #crumbs li:last-child, .team_name, .meta-nav-prev, .meta-nav-next, .blog_single_img .bx-prev:hover, .blog_single_img .bx-next:hover, #main_slider .prevBtn, 
     #main_slider .nextBtn, .widget_tag_cloud .tagcloud a:hover , #sidebar .widget_calendar table caption, .cal-blog, .pagination 
    .current, .pagination span a.current, ul.page-numbers .current,  .bx-wrapper .bx-controls-direction a:hover, 
   a.social-icons:hover, .slides-pagination a.current,  .custom_title p,  .slider_items h4, .portfolio-container h4, .post_share, .hint:after, [data-hint]:after,.owl_slider_img, .slides-navigation a:hover, .blog_post_comment{
       background-color:'.$accent_bg_color.'!important;
     }';
     $css .= '.bx-pager div a:after{
          background:'.$accent_bg_color.'!important;
     }';
    
    $css .= '.widget_container h3 span, .video_inner_text h2 span,.video_inner_text p span, .single_img_parallex_inner_text span, #entry-author-info h4 , .custom_title i, .widget_title i, .page_sidebar:before, .custom_title h3 sapn, #filter ul li a:hover, .custom_title h3 span, .accent, .meta_desc span i, .spa_portfolio_gallery h4 span, .owl-item h4 span,
      .portfolio_post_content h4 span, .image-boxes h3 span, .menu_item_price {
      color:'.$accent_bg_color.'!important;
    }';
    $css.='.woocommerce-pagination ul li a:hover{
          background:'.$accent_bg_color.'!important;
          color: '.$accent_text_color.';
    }';
    $css .= '.vaidate_error{
      border:1px solid '.$accent_bg_color.'!important;
    }';
     $css .= '.footer_toggle_line{
       border-bottom:4px solid '.$accent_bg_color.'!important;
    }
     #footer_toggle {
        border-bottom: 13px solid '.$accent_bg_color.'!important;
     }';
     $css .= '.item_price{
         border-bottom: 30px solid '.$accent_bg_color.'!important; 
         color: '.$accent_text_color.'; 
     }';
    /* Accent background text color */
    $css .= '.widget_tag_cloud .tagcloud a:hover, #sidebar .widget_calendar table caption, #sidebar .widget_calendar table td a, #sidebar .widget_calendar table td a:visited, .pagination .current, .pagination span a.current, ul.page-numbers .current, a.social-icons:hover, .custom_title p , .slider_items h4, .blog_post_comment h3 {
       color:'.$accent_text_color.'!important;
     }
     #mid_container_wrapper a.readmore, input.readmore, footer a.readmore, .header_cart_items .button.wc-forward{
        background:'.$accent_bg_color.';
        color:'.$accent_text_color.'!important;
     }
    #mid_container_wrapper a.readmore:hover, input.readmore:hover,  footer a.readmore:hover, .header_cart_items .button.wc-forward:hover{
       background:'.$accent_text_color.';
        color:'.$accent_bg_color.'!important;
     }';
    // Page Title bar Section 
     if( $page_title_bg_color ){
        $css .= '.sub_header_wrapper {
            background :'.$page_title_bg_color.';
        }';
     }
     else{
      if( $page_title_bar['bg_img'] ){
        $bg_size_cover = ( $page_title_bar_bg_repeat == 'no-repeat' ) ? 'cover' : 'inherit';
        $css .= '.sub_header_wrapper{
               background:url('.$page_title_bar['bg_img'].')!important;
               background-repeat:'.$page_title_bar_bg_repeat.'!important;
               background-size : '.$bg_size_cover.'!important;
        }';
    }
  }
      $css .= '.sub_header_wrapper h2, .sub_header_wrapper p{
        color:'.$page_titlebar_title_color.';
      }';
  
    /* Menu Section */
    $css .= '.menu > ul > li > a{     
     background: '.$menu_background_color.'!important;
    }
    .menu > ul > li > a, .shop_cart_icon a{
      color:'.$menu_link_color.'!important;
       background: '.$menu_background_color.'!important;
    }

    .menu > ul > li > a, .shop_cart_icon a{
       border:2px solid'.$menu_border_color.'!important;
    }

    .menu > li.current-menu-item > a,  .menu > ul  > li:hover > a, .current-menu-ancestor
    {
      color:'.$menu_link_hover_text_color.'!important;
      background-color:'.$menu_link_hover_bg_color.'!important;
    }
    .menu .current_page_ancestor > a, .menu .current-menu-item > a{
       color:'.$menu_link_hover_text_color.'!important;
    }
    .menu > li.current_page_item > a{
        background-color:'.$menu_bg_active_color.'!important;
        color:'.$menu_link_active_color.'!important;
    }

    #jqueryslidemenu i {
      color: '.$menu_icon_color.'!important;
    }
    .menu ul ul li a, .menu ul ul {
      background-color:'.$sub_menu_bg_color.'!important;
    }
    .menu ul ul li a{
      color:'.$sub_menu_link_color.'!important;
    }
    .menu ul ul li a:hover{
      color:'.$sub_menu_link_hover_color.'!important;
      background-color: '.$sub_menu_link_hover_bg_color.'!important;
    }
    .menu ul ul li{
      border-bottom:  1px solid '.$sub_menu_bottom_border_color.'!important; 
    }
    .menu .sub-menu .current-menu-item > a{
         color:'.$sub_menu_link_active_color.'!important;
         background-color:'.$sub_menu_active_bg_color.'!important;
    }';  
   
         
      /*Page color settings */
      if(  $page_bg_color ){
        $css .= '#mid_container_wrapper, .blog #mid_container_wrapper{
            background : '.$page_bg_color.';
        }';
      }else{ 
      if( $page_content_bg['bg_img'] ){
      $bg_size_cover = ( $page_content_bg_repeat == 'no-repeat' ) ? 'cover' : 'inherit';
     $css .= '#mid_container_wrapper, .blog #mid_container_wrapper{
           background:url('.$page_content_bg['bg_img'].')!important;
           background-repeat:'.$page_content_bg_repeat.'!important;
           background-size: '.$bg_size_cover.'!important;
    }';
  }
}
    $css .= '#mid_container_wrapper h1,
    #mid_container_wrapper h2,
    #mid_container_wrapper h3,
    #mid_container_wrapper h4,
    #mid_container_wrapper h5,
    #mid_container_wrapper h6{
      color: '.$page_titles_color.';
    }
    .shop-products .shop-product-details h4 a{
      color: '.$page_titles_color.'!important;
    }
     #mid_container_wrapper p, #mid_container_wrapper, #contact-form input, #contact-form textarea, #commentform input, #commentform textarea{
       color: '.$page_description_color.';
    } #mid_container_wrapper a{
       color: '.$page_link_color.';
    }
    #mid_container_wrapper a:hover{
       color: '.$page_link_hover_color.';
    }
    .product-remove a.remove{
      border:1px solid '.$page_link_color.';
    }'
   ;
    /* Sidebar */
    $css .= '#sidebar h3{
      color:'.$sidebar_title_color.';
    }
     #sidebar p, #sidebar, #sidebar #search_form input{
      color: '.$sidebar_content_color.';
    }
    #sidebar a{
      color: '.$sidebar_link_color.';
    }
     #sidebar a:hover{
      color:'.$sidebar_link_hover_color.';
    }
    #mid_container_wrapper .blog_post h4 a{
      color: '.$page_titles_color.';
    }';
    /* POrtfolio thumbnail color */
    $css .= '.pf_taxonomy_gallery .portfolio_post_content, #relatedposts .portfolio_post_content{
        background-color : '.$pf_posts_title_bg_color.'!important;
    }
    .pf_taxonomy_gallery .portfolio_post_content h4, #relatedposts .portfolio_post_content h4{
         color:'.$pf_posts_title_color.'!important;
    }';
    
/* Footer Section  */
  if( $footer_bg_color ){
      $css .= 'footer {
        background:'.$footer_bg_color.'!important;
    }';
  }else{
    if(  $footerbg['footer'] ){
      $footer_bg_img_repeat = ( $footerbg_repeat == 'repeat' ) ? 'inherit' : 'cover';
       $css .= 'footer{
          background: url('.$footerbg['footer'].')!important;
          background-attachment: scroll!important;
          background-position: center;
          background-repeat : '.$footerbg_repeat.'!important;
          background-size : '.$footer_bg_img_repeat.'!important;
          background-attachment: scroll!important;
        } ';
      }
  }
    $css .= 'footer h1, footer h2, footer h3, footer h4, footer h5, footer h6,
footer h1, footer h2 a, footer h3 a, footer h4 a, footer h5 a, footer h6 a
    {
        color:'.$footer_title_color.'!important;
    }
    footer p, footer, .most_footer_bottom span{
        color:'.$footer_text_color.'!important;
    }
    footer a:link, footer a:visited, footer a, .most_footer_bottom a, .most_footer_bottom a:hover{
        color:'.$footer_link_color.';
    }
    footer a:hover, footer a:active, #menu-footer > li.current-menu-item > a{
        color:'.$footer_link_hover_color.'!important;
    }';
/* Woocommerce Color Section */
     $css .= '.primary-button, #mid_container input#submit.primary-button, p.buttons .button.wc-forward,.added_to_cart.wc-forward{
        background:'.$primary_buttons_bg_color.'!important;
        color:'.$primary_buttons_text_color.'!important;
     }
     .primary-button:hover, #mid_container input#submit.primary-button:hover, p.buttons .button.wc-forward:hover,.added_to_cart.wc-forward:hover{
        background:'.$primary_buttons_bg_hover_color.'!important;
        color:'.$primary_buttons_text_hover_color.'!important;
     }
     .seconadry-button, #place_order, .single-product-tabs .active, .single-product-tabs li:hover, .woocommerce .quantity .minus, .woocommerce .quantity .plus, .woocommerce-page .quantity .minus, .woocommerce-page .quantity .plus{
        background:'.$secondary_buttons_bg_color.'!important;
        color:'.$secondary_buttons_text_color.'!important;
     }
     .woocommerce-tabs li.active:after , .woocommerce-tabs .single-product-tabs li:hover:after{
       border-color: '.$secondary_buttons_bg_color.' transparent transparent !important;
     }
     .seconadry-button:hover, #place_order:hover, .woocommerce .quantity .minus:hover, .woocommerce .quantity .plus:hover, .woocommerce-page .quantity .minus:hover, .woocommerce-page .quantity .plus:hover{
        background:'.$secondary_buttons_bg_hover_color.'!important;
        color:'.$secondary_buttons_text_hover_color.'!important;
     }
     .woocommerce a.wc-forward:after, .woocommerce-page a.wc-forward:after{
          color:'.$secondary_buttons_text_color.'!important;
     }
     .woocommerce a.wc-forward:hover:after, .woocommerce-page a.wc-forward:hover:after{
          color:'.$secondary_buttons_text_hover_color.'!important;
     }
 
    .product-remove a.remove:hover {
       border-color: '.$woo_elments_colors.'!important;
    }
    .product-remove a.remove:hover, .star-rating, #mid_container_wrapper .comment-form-rating .stars a:hover, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .upsells-product-slider  ins span.amount, .related-product-slider .shop-products span .amount , .woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins{
           color:'.$woo_elments_colors.'!important;
    }
    .woocommerce span.onsale, .woocommerce-page span.onsale{
         background-color:'.$woo_elments_colors.'!important;
    }
    .cart-sussess-message {
      background-color:'.$success_msg_bg_color.';
      color:'.$success_msg_text_color.';
    }
    .woocommerce-cart-info {
      background-color:'.$notification_msg_bg_color.';
      color: '.$notification_msg_text_color.';
    }
    .woocommerce-cart-info a{
          color: '.$notification_msg_text_color.'!important;
    }
    .woocommerce-cart-error {
      background-color: '.$warning_msg_bg_color.';
      color: '.$warning_msg_text_color.';
    }';
  $css = preg_replace( '/\s+/', ' ', $css ); 
  $output = "<!-- Customizer Style -->\n<style type=\"text/css\">\n" . $css . "\n</style>";
  echo $output;
}
add_action('wp_head','kaya_custom_colors');

function theme_customizer_css() { 
  $css ='';
     $css .=' .customize-control-radio label {
          float: left;
          margin-right: 10px;
      }
      h4.customizer_sub_section{
          background-color: #EEEEEE;
          margin-bottom: 0 !important;
          margin-left: -30px;
          margin-right: -30px;
          margin-top: 15px !important;
          padding: 5px 30px;
          border: 1px solid #e5e5e5;
      }
      .title_description {
        display: block;
        line-height: 23px;
        margin: 0 0 10px;
        padding: 0;
      }

      .img_radio {
          display: none !important;
      }
      .kaya-radio-img {
          display: inline-block;
          margin: 0 3px 3px 0;
          border: 2px solid #fff;
      }
      .kaya-radio-img:hover{
        border: 2px solid #2EA2CC;
      }
      .kaya-radio-img-selected {
    border: 2px solid #2EA2CC;
}';
$css = preg_replace( '/\s+/', ' ', $css );
 $output = "<!-- Theme  Customizer admin Style -->\n<style type=\"text/css\">\n" . $css . "\n</style>";
  echo $output;
}
add_action( 'customize_controls_print_styles', 'theme_customizer_css' );

?>