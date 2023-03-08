<?php
add_theme_support('automatic-feed-links');
global $post;
 /* Resize Images Width Fullwisth/Sidebar 
 ----------------------------------------- */
 
function kaya_image_width( $postid ){
	$sidebar_layout = get_post_meta($postid,'kaya_pagesidebar',true); 
	$kaya_width = ($sidebar_layout == "full" ) ? '1250' : '719';
	return $kaya_width;
 }
 
/* Image Resize
 ----------------------------------------- */
  /*
* @param	string $url - (required) must be uploaded using wp media uploader
* @param	int $width - (required)
* @param	int $height - (optional)
* @param	bool $crop - (optional) default to soft crop
* @param	bool $single - (optional) returns an array if false ?>

*/

function kaya_imageresize($postid,$params,$class){
	global $post;
	$title=get_the_title($post->Id);
	$img_url=wp_get_attachment_url( get_post_thumbnail_id() );
	if( $img_url ) {
		$out='<img class="'.$class.'" src="'.bfi_thumb( $img_url, $params ).'" alt="'.$title.'" />';
	}else{
		$imgurl = get_template_directory_uri().'/images/defult_featured_img.png';
		$out='<img class="'.$class.'" src="'.bfi_thumb( $imgurl, $params ).'" alt="'.$title.'" />';
	}
	return $out;
}
	 
 /* Upload Image Resize
 ----------------------------------------- */
 /*
* @param	string $url - (required) must be uploaded using wp media uploader
* @param	int $width - (required)
* @param	int $height - (optional)
* @param	bool $crop - (optional) default to soft crop
* @param	bool $single - (optional) returns an array if false ?>

*/
 
function kaya_defaulturlresize( $theImageSrc,$params,$class )
{ 
	global $post;
	$title=get_the_title($post->Id);
	$out='';
	if( $theImageSrc ) {
		$out.='<img class="'.$class.'" src="'.bfi_thumb($theImageSrc, $params ).'" alt="'.$title.'" />';
	}else{
		$imgurl = get_template_directory_uri().'/images/defult_featured_img.png';
		$out='<img class="'.$class.'" src="'.bfi_thumb( $imgurl, $params ).'" alt="'.$title.'" />';
	}
	return $out;	
}
// Site Title and Desc
function kaya_wp_title( $title ) {
	global $page, $paged;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " | $site_description";
	return $title;
}
add_filter( 'wp_title', 'kaya_wp_title', 10, 1 ); // End
// Logo Display Function
if(!function_exists('kaya_logo_image')): // Logo
function kaya_logo_image() {
	echo '';
	 $kaya_default_logo = esc_attr( get_template_directory_uri().'/images/logo.png' );
     $kaya_logo_img_src = get_option('kaya_logo');
     $logo = $kaya_logo_img_src['upload_logo'] ? $kaya_logo_img_src['upload_logo']  : esc_attr( $kaya_default_logo );
     //print_r( $logo );
     $kaya_logo_type = get_theme_mod('kaya_logo_type') ? get_theme_mod('kaya_logo_type') : 'text_logo';
     $kaya_text_logo = get_theme_mod('text_logo') ? get_theme_mod('text_logo') : 'Cooks';
     if( $kaya_logo_type == 'text_logo'){
     		$kaya_logo = '<h1 class="logo text_logo">'.trim($kaya_text_logo).'</h1>';
     }
	
	elseif( $kaya_logo_type == 'img_logo'){
		if( $logo ) {
		 	$kaya_logo_src = esc_attr( $logo ) ? esc_attr( $logo ) : esc_attr( $kaya_default_logo );
		}else{
			$kaya_logo_src = esc_attr( get_template_directory_uri().'/images/logo.png' );
		}
		$kaya_logo_img = 'class="logo" src="'.esc_attr($kaya_logo_src).'" alt=""';
		$kaya_logo = apply_filters('kaya_image_logo', '<img '.$kaya_logo_img .' />');
	}else{
		$kaya_logo = '<h1 class="site-title logo">'.get_bloginfo( 'name' ).'</h1>';
		$kaya_logo = apply_filters('kaya_logo_text', $kaya_logo);
	}
		echo apply_filters('kaya_logo_html', $kaya_logo);
		//echo '</h1>';
}	
endif; // End Logo
// Slider Include
	get_template_part('slider/kaya','slider');
// Dynamic customwidget
//-----------------------------------------
	$kaya_options = get_option('kayapati');
	$sidebar_widgets = isset( $kaya_options['custom_sidebar'] ) ? $kaya_options['custom_sidebar'] :'';
	if(is_array($sidebar_widgets)){
		array_unshift($sidebar_widgets, "select");
	}else {
			$sidebar_widgets = array();
			array_unshift($sidebar_widgets,"select");
		}
// page title
//-----------------------------------------

function kaya_custom_pagetitle( $post_id )
{

	if( is_front_page() ){ } else{
	$subheader_titleoptions=get_post_meta($post_id,'subheader_titleoptions',true);
	$page_title_alignment=get_post_meta($post_id,'page_title_alignment',true);
	echo '<section class="sub_header_wrapper" >';
		echo '<section class="sub_header container">';

			//echo '<div class="two_third">';
		if(is_page()){
				if($kaya_custom_title=get_post_meta($post_id,'kaya_custom_title',true)) {		
					echo '<h2 style="text-align:'.$page_title_alignment.'"> '.$kaya_custom_title.'</h2>';			
				}
				else{
					echo '<h2 style="text-align:'.$page_title_alignment.'"> '.get_the_title($post_id).'</h2>';
				}
				if($kaya_custom_title_description=get_post_meta($post_id,'kaya_custom_title_description',true)) {		
					echo '<P style="text-align:'.$page_title_alignment.'">'.$kaya_custom_title_description.'</P>';
				} 
		}elseif(is_home()){
			echo '<h2>'.get_the_title( get_option('page_for_posts', true) ).'</h2>';

		}elseif( is_single()){ 
			if($kaya_custom_title=get_post_meta($post_id,'kaya_custom_title',true)) {		
					echo '<h2> '.$kaya_custom_title.'</h2>';			
				} else{
						echo '<h2>'.get_the_title($post_id).'</h2>';
				} ?>
				<div id="singlepage_nav" > <!-- Navigation Buttons -->
					<div class="nav_prev_item">
						<?php previous_post_link( '%link', '<span class="meta-nav-prev"> &nbsp;</span>' ); ?>
					</div>
					<div class="nav_next_item">
						<?php next_post_link( '%link', '<span class="meta-nav-next">&nbsp;</span>' ); ?>
					</div>
				</div>
	<?php	} elseif(is_tag()){ ?>
		<h2>
			<?php printf( __( 'Tag Archives: %s', 'cooks' ), single_cat_title( '', false ) ); ?>
		</h2>
	<?php }
	elseif ( is_author() ) {
		the_post();
		echo '<h2>'.sprintf( __( 'Author Archives: %s', 'cooks' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ).'</h2>';
		rewind_posts();

	} elseif (is_category()) { ?>
		<h2>
			<?php printf( __( 'Category Archives: %s', 'cooks' ), single_cat_title( '', false ) ); ?>
		</h2>
	<?php }  elseif( is_tax() ){
	global $post;
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		 echo '<h2>' .$term->name.'<h2>'; 

	}elseif (is_search()) { ?>
			<h2><?php printf( __( 'Search Results for: %s', 'cooks' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
	<?php }elseif (is_404()) { ?>
			<h2> <?php _e( 'Error 404 - Not Found', 'cooks' ); ?> </h2>
		<?php }
		elseif ( is_day() ){ ?>
		<h2>
			<?php  printf( __( 'Daily Archives: %s', 'cooks' ), '<span>' . get_the_date() . '</span>' ); ?>
		</h2>
		<?php }			 
		 elseif ( is_month() ) { ?>
		 <h2>
		<?php 	printf( __( 'Monthly Archives: %s', 'cooks' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
		</h2>
		<?php } elseif ( is_year() ){ ?>
			<h2>	<?php printf( __( 'Yearly Archives: %s', 'cooks' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?> </h2>
		<?php }elseif ( class_exists('woocommerce') ){

			if( is_shop() ) { 
				if($kaya_custom_title=get_post_meta(woocommerce_get_page_id('shop'),'kaya_custom_title',true)) {		
					echo '<h2> '.$kaya_custom_title.'</h2>';			
				} 
				else{ ?>
						<h2><?php _e('Shop','cooks'); ?></h2>
				<?php }
				if($kaya_custom_title_description=get_post_meta(woocommerce_get_page_id('shop'),'kaya_custom_title_description',true)) {		
					echo '<P>'.$kaya_custom_title_description.'</P>';
				} 
		?>
		<?php }else { ?>
		<h2>	<?php _e( 'Blog Archives', 'cooks' ); ?> </h2> 
		<?php }
			}		
		echo'</section>';
	echo'</section>';
}
}
?>
<?php
// Portfolio skills 
//------------------------------------
function kaya_portfolio_skills($portfolio_project_skills, $portfolio_project_skills_title ){

			if( $portfolio_project_skills ):
				if($portfolio_project_skills_title){
				echo '<h4>'.$portfolio_project_skills_title.'</h4>'; }
			
			$pj_skills = array();
			foreach ($portfolio_project_skills as  $value) {
					$pj_skills[] = $value;
				}
				$pj_skills_array= implode(',', $pj_skills);
				$skills_array = explode(',', $pj_skills_array);
				echo '<ul class="project_skills">';
					foreach ($skills_array as $key => $skills_array_val) {		
						echo '<li>'.$skills_array_val.'</li>';
					}
				echo '</ul>';
				endif;
			 
}
//portfolio related post
//-------------------------------------------
	get_template_part('lib/includes/relatedpost');

// Post Views Count
function observePostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function fetchPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return "0 View";
	}
	return $count.' Views';
}
// footer columns
//-------------------------------------------
function kaya_footercolumn( $column )
{
	// column wise  footer widget
	if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar('footer_column_'.$column.'') ) : ?>
		<div class="widget_container">
        	<h3> <?php _e( ' Footer Column ', 'kaya_admin' ); echo $column; ?> </h3>
            <p>
                <?php _e( 'Wesce sit amet porttitor leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque interdum, nulla sit amet varius dignissim Vestibulum pretium risus', 'cooks' ); ?>
            </p>	
	 	</div>
	<?php endif; 
}
class Kaya_Description_Walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $current_object_id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           //$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           //if($depth != 0)
           //{
                    // $description = $append = $prepend = "";
          // }
		  $description='';
		  $item_desc='';
		  if($item->description){
		  $item_desc='<i class="fa '.esc_attr( $item->description ).'"> </i>';
		  }
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>'.$item_desc.'';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
// Shop Page Title Post ID
function kaya_post_item_id(){
	 global $post_item_id, $post;
	if( class_exists('woocommerce')){	
		if( is_shop() ){
			$post_item_id = woocommerce_get_page_id( 'shop' );
		}
		else{
			if( get_post()){ $post_item_id = $post->ID;}
		}
	}
	elseif(get_post()){
		$post_item_id = $post->ID;
	}else{

	}
}
?>