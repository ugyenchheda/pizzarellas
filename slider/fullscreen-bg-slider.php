<?php 
  global $post_item_id, $post;
	kaya_post_item_id();
	$full_screen_single_bg_image=get_post_meta($post_item_id,'full_screen_single_bg_image',true);
	$single_bg_img_repeat=get_post_meta($post_item_id,'single_bg_img_repeat',true);
	
	$fullscreen_img = get_option('fullscreen');
	$fullscreen_bg_img_repeat = get_theme_mod('fullscreen_bg_img_repeat');
	$deaful_background_size = ( $fullscreen_bg_img_repeat == 'no-repeat') ? 'cover' : 'inherit'; 

  $select_full_bg_type=get_post_meta($post_item_id,'select_full_bg_type',true) ? get_post_meta($post_item_id,'select_full_bg_type',true) :'single_bg_image';
  $fullscreen_bg_video=get_post_meta($post_item_id,'fullscreen_bg_video',true) ? get_post_meta($post_item_id,'fullscreen_bg_video',true) : '';
 if( $select_full_bg_type == 'fullscreen_img_slider' ){
	 $full_screen_bg_images=get_post_meta($post_item_id,'full_screen_bg_images',false);
	 $full_screen_bg_auto_play=get_post_meta($post_item_id,'full_screen_auto_play',true) ? get_post_meta($post_item_id,'full_screen_auto_play',true) : '0';
	 $full_screen_bg_transition=get_post_meta($post_item_id,'full_screen_bg_transition',true) ? get_post_meta($post_item_id,'full_screen_bg_transition',true) : '6';
	// print_r($full_screen_bg_images);
	
	?>
	<script type="text/javascript">
			jQuery(function($){
				$.supersized({
					// Functionality
						slideshow               :   1,			// Slideshow on/off
						autoplay				:	<?php echo $full_screen_bg_auto_play;  ?>,			// Slideshow starts playing automatically
						start_slide             :   1,			// Start slide (0 is random)
						stop_loop				:	0,			// Pauses slideshow on last slide
						random					: 	0,			// Randomize slide order (Ignores start slide)
						slide_interval          :   3000,		// Length between transitions
						transition              :   <?php echo $full_screen_bg_transition;  ?>, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
						transition_speed		:	1000,		// Speed of transition
						new_window				:	1,			// Image links open in new window/tab
						pause_hover             :   0,			// Pause slideshow on hover
						keyboard_nav            :   1,			// Keyboard navigation on/off
						performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
						image_protect			:	1,			// Disables image dragging and right click with Javascript
																   
						// Size & Position						   
						min_width		        :   0,			// Min width allowed (in pixels)
						min_height		        :   0,			// Min height allowed (in pixels)
						vertical_center         :   1,			// Vertically center background
						horizontal_center       :   1,			// Horizontally center background
						fit_always				:	0,			// Image will never exceed browser width or height (Ignores min. dimensions)
						fit_portrait         	:   1,			// Portrait images will not exceed browser height
						fit_landscape			:   0,			// Landscape images will not exceed browser width
																   
						// Components							
						slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
						thumb_links				:	1,			// Individual thumb links for each slide
						thumbnail_navigation    :   0,			// Thumbnail navigation
						slides 					:  	[		// Slideshow Images

					<?php	$full_screen_bg_images = ( array ) $full_screen_bg_images;
							if(!empty( $full_screen_bg_images ) && !is_search() ){
								//$full_screen_bg_images = implode(',', $full_screen_bg_images);
								foreach( $full_screen_bg_images as $image){
									$src = wp_get_attachment_image_src($image,'');
									$src = $src[0]; ?>
									{image : '<?php echo $src; ?>' },		
								<?php //echo $src; 
								}

						}elseif($fullscreen_img['bg_img']){ ?>
							 {image : "<?php echo $fullscreen_img['bg_img']; ?>" }	
						<?php } else{ ?>
							 {image : '<?php echo get_template_directory_uri(); ?>/images/default_slide_img.jpg' }	
						<?php } ?> 
							
							
													],
													
						// Theme Options			   
						progress_bar			:	1,			// Timer for each slide							
						mouse_scrub				:	0
						
					});
			    }); 
			    
			</script>
		<?php } elseif( $select_full_bg_type == 'fullscreen_video_bg' ){ ?>	
			<!-- Video Bg -->
		<script type="text/javascript">
		jQuery( function($) {
		"use strict";
		$(function() {
			$(function(){
              $(".player").mb_YTPlayer();
			});
		});
		});		

	</script>
	
		<a id="video_bg_wrapper" class="player" data-property="{videoURL:'<?php echo trim($fullscreen_bg_video); ?>',containment:'body',autoPlay:true, startAt:0, opacity:1}"> </a>
		<?php } elseif( $select_full_bg_type == 'single_bg_image' ) {
			if ( !empty( $full_screen_single_bg_image ) ) {
			$src = wp_get_attachment_image_src( $full_screen_single_bg_image, '' );
			$src = $src[0];
			$background_repeat = ( $single_bg_img_repeat == 'cover' || $single_bg_img_repeat == 'no-repeat') ? 'no-repeat' : 'repeat';
			$background_size = ( $single_bg_img_repeat == 'cover' ) ? 'cover' : 'inherit';
			echo '<div class="fullscreen_bg_single_img" style="background-image:url('.$src.'); background-repeat:'.$background_repeat.'; background-size:'.$background_size.'"> </div>';
		}else{
			$default_img = $fullscreen_img['bg_img'] ?$fullscreen_img['bg_img'] : get_template_directory_uri().'/images/default_slide_img.jpg';
			echo '<div class="fullscreen_bg_single_img" style="background-image:url('.$default_img.'); background-repeat:'.$fullscreen_bg_img_repeat.'; background-size:'.$deaful_background_size.'"> </div>';
		}
		}else{
			echo '<div class="fullscreen_bg_single_img" style="background-image:url('.$default_img.'); background-repeat:'.$fullscreen_bg_img_repeat.'; background-size:'.$deaful_background_size.'"> </div>';
		}
		?>
