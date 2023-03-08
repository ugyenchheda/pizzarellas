<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php 
 $responsive_mode = get_theme_mod( 'responsive_layout_mode' ) ? get_theme_mod( 'responsive_layout_mode' ) : 'on';
if($responsive_mode == "on"){ ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0" />
<?php } ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php
 wp_head(); ?>
 </head>
<body <?php body_class(); ?> >
<?php 	 
global $post, $post_item_id;
kaya_post_item_id();
$fullscreen_bg_pattern = get_post_meta($post_item_id,'fullscreen_bg_pattern',true) ? get_post_meta($post_item_id,'fullscreen_bg_pattern',true) : '0';
	if( $fullscreen_bg_pattern == '1' ): ?>
		<div id="pattern_overlay"> </div>
	<?php endif; 
	$layout_mode =  get_theme_mod('theme_layout_mode') ?  get_theme_mod('theme_layout_mode') :'fluid';
	$kaya_layout_class = ( $layout_mode == 'boxed' ) ?  'box_layout' : 'fluid_layout'; ?>
	<?php $kaya_header_class = ( $layout_mode == 'boxed' ) ?  'no-continer' : 'container'; ?>
	<section id="<?php echo $kaya_layout_class; ?>"><!-- Main Layout Section Start -->
		<!--Start header  section -->
	<?php
	  global $post_item_id, $post;
  		echo  kaya_post_item_id();
	 $full_screen_bg_images=get_post_meta($post_item_id,'full_screen_bg_images',false);
		get_template_part('slider/fullscreen-bg-slider'); 
	?>
		<section id="header_wrapper">
			<header class="<?php echo $kaya_header_class; ?>">
				<div class="header_left_section ">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php kaya_logo_image(); ?> </a>	
				</div>
				<?php
				$url = get_template_directory_uri();
				$logo_desc = get_theme_mod('logo_desc') ? get_theme_mod('logo_desc') :'<strong style="font-size:16px; letter-spacing: 2px;">Restaurnt WordPress Theme </strong>'; ?>
				<div class="logo_desc">
					<?php echo do_shortcode( trim($logo_desc) ); ?>
				</div>	
			</header>
			<div class="clear">&nbsp;</div>
			<div class="nav_wrapper">
				<nav class="<?php echo $kaya_header_class; ?>">

				<?php 
				
				if (has_nav_menu('primary')) {
					wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'jqueryslidemenu', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'menu', 'walker' => new Kaya_Description_Walker()));
				}else{
					wp_nav_menu(array('echo' => true, 'container_id' => 'myslidemenu','menu_id'=> 'jqueryslidemenu', 'container_class' => 'menu','theme_location' => 'primary', 'menu_class'=> 'menu'));
				}
				?>
			<!-- Search -->   
				</nav>
			</div>
		</section>
		<?php echo kaya_slider_page_title_data(); 
			$select_full_bg_type=get_post_meta($post_item_id,'select_full_bg_type',true);
			if(  count($full_screen_bg_images) > 1 && $select_full_bg_type == 'fullscreen_img_slider' ){ ?>
					
				<div id="controls-wrapper" class="load-item">
		<div id="controls">
			<!--Navigation-->
			<ul id="slide-list"></ul>
		</div>
	</div>
	<?php } ?>
    <div class="halal"><img src="http://uniwebus.com/pizzarellas/wp-content/uploads/2017/02/HALAL.png" /></div>
	<!--Control Bar-->
	