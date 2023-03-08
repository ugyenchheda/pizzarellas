<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '';

$meta_boxes = array();

/* ----------------------------------------------------- 

$revolutionslider = array();
$revolutionslider[0] = 'Select Slider Type';

if(class_exists('RevSlider')){
    $slider = new RevSlider();
	$arrSliders = $slider->getArrSliders();
	foreach($arrSliders as $revSlider) { 
		$revolutionslider[$revSlider->getAlias()] = $revSlider->getTitle();
	}
}
*/ 
$kayaslider_array =get_terms('slider_category','hide_empty=1');

	$kaya_slider = array();
		foreach ($kayaslider_array as $sliders) {
		$kaya_slider[$sliders->slug] = $sliders->name;
		$sliders_ids[] = $sliders->slug;
		}
			//array_unshift($kaya_slider,'All');

$kayaportfolio_array =get_terms('portfolio_category','hide_empty=0');

	$kaya_portfolio_cat = array();
		foreach ($kayaportfolio_array as $pf_cat) {
		$kaya_portfolio_cat[$pf_cat->slug] = $pf_cat->name;
		$pf_cat_ids[] = $pf_cat->slug;
		}
			//array_unshift($kaya_portfolio_cat,'All');
/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => __('Sub header section which displays below menu bar','cooks'),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name'		=> __('Select Subheader Style','cooks'),
			'id'		=> $prefix . "select_page_options",
			'type'		=> 'select',
			'options'	=> array(
				'page_title_setion'		=> __('Page Titlebar','cooks'),
				"page_slider_setion"	=> __("Header Slider",'cooks'),
				"singleimage" 	=> __("Parallax Header Image",'cooks'),
				'none' => __('None','cooks'),			
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
				'name'		=> __('Custom Page Title','cooks'),
				'id'		=> $prefix . "kaya_custom_title",
				'type'		=> 'text',
				'std'		=> 'Enter page custom title',
				'std'		=> ''
		),
		array(
				'name'		=> __('Page Title Description','cooks'),
				'id'		=> $prefix . "kaya_custom_title_description",
				'type'		=> 'textarea',
				'std'		=> 'Enter page title description',
				'std'		=> '',
				'cols' => 20,
				'rows' => 1,
		),
		array(
			'name'		=> __('Page Title & Description Alignment','cooks'),
			'id'		=> $prefix . "page_title_alignment",
			'type'		=> 'select',
			'options'	=> array(
				"left"	=> __("Align Left",'cooks'),
				"right"	=> __("Align Right",'cooks'),
				'center' => __('Align Center','cooks'),
												
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Select Header Slider Type','cooks'),
			'id'		=> $prefix . "slider",
			'type'		=> 'select',
			'options'	=> array(
				"bxslider"	=> __("BX Slider",'cooks'),
				"customslider"	=> __("Slider Plugin Shortcode ",'cooks'),
												
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),

// Kaya Slider Options		
		array(
			'name'		=> __('Select Kaya Slider Category','cooks'),
			'id'		=> $prefix . "Kaya_Sliders",
			'type'		=> 'checkbox_list',
			'options'	=> $kaya_slider,
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),

	array(
			'name'		=> __('Select Slider Mode','cooks'),
			'id'		=> $prefix . "Kaya_slider_mode",
			'type'		=> 'select',
			'options'	=> array(
				'fluid'  	=> __('Full Width','cooks'),
				"container" 	=> __("Boxed",'cooks'),	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),

	array(
			'name'		=> __('Auto Play','cooks'),
			'id'		=> $prefix . "Kaya_slider_autoplay",
			'type'		=> 'select',
			'options'	=> array(
				'true'  	=> __('True','cooks'),
				"false" 	=> __("False",'cooks'),	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Slide Transition','cooks'),
			'id'		=> $prefix . "Kaya_slider_transitions",
			'type'		=> 'select',
			'options'	=> array(
				'horizontal'  	=> __('Horizontal','cooks'),
				"vertical" 	=> __("Vertical",'cooks'),
				"fade" 	=> __("Fade",'cooks'),	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		array(
			'name'		=> __('Slide Easing Effect','cooks'),
			'id'		=> $prefix . "Kaya_slider_easing",
			'type'		=> 'text',
			'std'		=>'swing',
			'desc'		=> __('Enter easing effect Ex:linear, swing,easeOutElastic','cooks') .'<br>'.__(' for more transition effects ','cooks') ."<a href='http://jqueryui.com/resources/demos/effect/easing.html' target='_blank'>  click here   </a>"
		),
		array(
			'name'		=> __('Slide Pause Time','cooks'),
			'id'		=> $prefix . "Kaya_slider_pause",
			'type'		=> 'text',
			'std'		=>'4000',
			'desc'		=> __('The amount of time (in ms) between each auto transition','cooks'). '<br>'. __('Ex: 4000',
				'cooks')
		),
		array(
			'name'		=> __(' Auto Height','cooks'),
			'id'		=> $prefix . "adaptive_height",
			'type'		=> 'select',
			'options'	=> array(
				'true'  	=> __('True','cooks'),
				"false" 	=> __('False','cooks'),
				),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),		

	array(
			'name'		=> 'Slider Height (px)<br><small>Ex:400-600</small>',
			'id'		=> $prefix . "Kaya_slider_height",
			'type'		=> 'text',
			'std'		=> '600',
			'desc'		=> '',
		),
			array(
			'name'		=> __('Slider Items Order','cooks'),
			'id'		=> $prefix . "kaya_slider_order",
			'type'		=> 'select',
			'options'	=> array(
				'DESC'  	=> __('Decending Order','cooks'),
				"ASC" 	=> __("Ascending Order",'cooks'),
			),
			'multiple'	=> false,
			'std'		=> 'DESC',
			'desc'		=> ''
		),
			array(
			'name'	=> __('Slider Items Limit','cooks'),
			'desc'	=> '',
			'id'	=> "Kaya_bx_slider_limit",
			'type'	=> 'text',
			'std' => '10'
		),
	/*	array(
			'name'		=> 'Slide Caption',
			'id'		=> $prefix . "kaya_slidecaption",
			'type'		=> 'select',
			'options'	=> array(
				'show'  => 'Show',
				"hide" 	=> "Hide",	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		), */
// Video		
	array(
			'name'		=> __('Slider Shortcode','cooks'),
			'id'		=> $prefix . 'customslider_type',
			'type'		=> 'text',
			'desc' => __('Ex: [customslider shortcode_name]','cooks')
			),
// Single Image Upload
	array(
			'name'	=> __('Parallax Bg Image','cooks'),
			'desc'	=> __('Select image and click','cooks' ).__("Insert into page",'cooks'),
			'id'	=> "Single_Image_Upload",
			'type'	=> 'image_advanced',
		),
		array(
			'name' => __( 'Background Position ', 'cooks' ),
			'id' => $prefix."single_img_attachment",
			'type' => 'radio',
			'options' => array(
			'fixed' => __( 'Fixed', 'cooks' ),
			'scroll' => __( 'Scroll', 'cooks' ),
			),
			'std' => 'fixed'
		),	
		array(
			'name'	=> __('Image Height ( px )','cooks').'<br><small>Ex:400-600</small>',
			'desc'	=> '<strong>Note:</strong>' .__('By default Screen height is displayed','cooks'),
			'id'	=> "Single_Image_height",
			'type'	=> 'text',
			'std' => '300'
		),
	array(
			'name'	=> __('Image Overlay Text ','cooks'),
			'desc'	=> __('Enter content like below html format','cooks'). '<br />&lt;h2 style="color:#ffffff;font-size:3.5em;"&gt;Welcome To Theme &lt;/h2&gt; <br />
&lt;p  style="color:#ffffff;font-size:1.3em;"&gt;This is Parallax Image Title description &lt;/p&gt;',

		'id'	=> "Single_Image_content",
			'type'	=> 'textarea',
			'std' => ''
		),		
// Video		
	/* array(
			'name'		=> 'You Tube Video ID',
			'id'		=> $prefix . 'page_video',
			'type'		=> 'text',
			'desc' => 'Ex: iU8iA7jfrIg<br /> <img src="'.get_template_directory_uri().'/images/video_id.jpg"><br />
						<strong>Note : </strong> It works  youtube video id only'
			),
	array(
			'name' => __( 'Audio', 'cooks' ),
			'id' => $prefix."page_video_mute",
			'type' => 'radio',
			'options' => array(
			'false' => __( 'True', 'cooks' ),
			'true' => __( 'False', 'cooks' ),
			),
			'std' => 'true'
		),			
		array(
			'name'	=> 'Video Height ( px )<br><small>Ex:400-600</small>',
			'desc'	=> '<strong>Note:</strong> By default Screen height is displayed',
			'id'	=> "Single_slider_height",
			'type'	=> 'text',
			'std' => ''
		),
	array(
			'name'		=> 'Video Overlay Text',
			'id'		=> $prefix . 'page_video_text',
			'type'		=> 'textarea',
			'desc' => 'Enter content like below html format <br />&lt;h2 style="color:#ffffff;font-size:3.5em;"&gt;Welcome To spa &lt;/h2&gt; <br />&lt;p  style="color:#ffffff;font-size:1.3em;"&gt;This is spa Parallax Image Title description &lt;/p&gt;<br>&lt;a class=&quot;readmore readmore-1&quot; href=&quot;#&quot;&gt;Read More&lt;/a&gt;'
			),	
*/


	)
);

/* ----------------------------------------------------- */
// Gallery
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'kaya_page_fullscreen_bg',
	'title'		=> __('Full screen Background Settings','cooks'),
	'pages'		=> array( 'page' , 'portfolio', 'post', 'slider', 'product' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> __('Select Full Screen Bg Type','cooks'),
			'id'		=> $prefix . "select_full_bg_type",
			'type'		=> 'select',
			'options'	=> array(
				"single_bg_image" 	=> __("Single Image",'cooks'),
				'fullscreen_img_slider' => __('Image Slider','cooks'),				
				"fullscreen_video_bg" 	=> __("Video Background",'cooks'),
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		// Single Bg Image
		array(
			'name'	=> __('Upload Image','cooks'),
			'desc'	=> '',
			'id'	=> $prefix . 'full_screen_single_bg_image',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name'		=> __('Background Repeat','cooks'),
			'id'		=> $prefix . "single_bg_img_repeat",
			'type'		=> 'radio',
			'options'	=> array(
				"repeat" 	=> __('Repeat','cooks'),
				'no-repeat' => __('No Repeat','cooks'),
				'cover' =>__('Fit Screen size','cooks'),
			),
			'multiple'	=> false,
			'desc'		=> ''
		),
		// Image Slider
		array(
			'name'	=> __('Full Screen Slider Images','cooks'),
			'desc'	=> __('These images are displayed as Full screen Background slider.','cooks'),
			'id'	=> $prefix . 'full_screen_bg_images',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 50,
		),
		array(
				'name' =>  __('Full Screen Bg Slide Transition','cooks'),
				'desc' => '',
				'id' => $prefix . 'full_screen_bg_transition',
				'type' => 'select',
				'std'	=> '6',
				'options' => array(
					'0' => __('None','cooks'),
					'1' => __('Fade','cooks'),
					'2' => __('Slide Top','cooks'),
					'3' => __('Slide Right','cooks'),
					'4' => __('Slide Bottom','cooks'),
					'5' => __('Slide Left','cooks'),
					'6' => __('Carousel Right','cooks'),
					'7' => __('Carousel Left','cooks'),
					),
			),
		array(
			'name'		=> __('Auto Play','cooks'),
			'id'		=> $prefix . "full_screen_auto_play",
			'type'		=> 'select',
			'options'	=> array(
				'1'  	=> __('True','cooks'),
				"0" 	=> __('False','cooks'),	
			),
			'multiple'	=> false,
			'std'		=> array( 'title' ),
			'desc'		=> ''
		),
		// Video Slider
		array(
			'name'		=> __('You Tube Video ID','cooks'),
			'id'		=> $prefix . 'fullscreen_bg_video',
			'type'		=> 'text',
			'desc' => 'Ex: iU8iA7jfrIg<br /> <img src="'.get_template_directory_uri().'/images/video_id.jpg"><br />'.
						__('<strong>Note : </strong> It works  youtube video id only','cooks')
			),
		array(
			'name'		=> __('Fullscreen Background Pattern','cooks'),
			'id'		=> $prefix . "fullscreen_bg_pattern",
			'type'		=> 'checkbox',
			'std'		=>'',
			'desc'		=> ''
		),
		)
);


/* ----------------------------------------------------- */
// Item Price
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'my-page-layout',
	'title' => __('Food Menu Item Price','cooks'),
	'pages' => array( 'portfolio' ),
	'context' => 'side',
	'priority' => 'core',
		'fields' => array(
		array(
			'name' => __('Price','cooks'),
			'desc' => 'Ex: $20',
			'id' => $prefix . 'fooditem_price',
			'type' => 'text',
			'std'	=> '',
		),
	)

);

/* ----------------------------------------------------- */
// POrtfolio Info Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'portfolio_info',
	'title' => __('General Options','cooks'),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
		'fields' => array(
		array(
			'name' => __('Custom Title for this post','cooks'),
			'desc' => '',
			'id' => $prefix . 'kaya_custom_title',
			'type' => 'text',
			
		),

		array(
			'name' => __('External link to','cooks'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 'Porfolio_customlink',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name'		=> __('Open In New Window','cooks'),
			'id'		=> $prefix . 'pf_link_new_window',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> ''
		),
		array(
			'name'		=> __('Related Posts','cooks'),
			'id'		=> $prefix . 'relatedpost',
			'clone'		=> false,
			'type'		=> 'checkbox',
			'desc'		=> __('Display Related posts at the bottom of this post in single page','cooks').  '<br /><strong>Note:</strong> <em>'.__('Related post displays based on tags','cooks').'</em>'
		),
		
	)
);
/* -----------------------------------------------------
// Light box video url
-----------------------------------------------------  */
$meta_boxes[] = array(
	'id'		=> 'lightbox_video_url',
	'title'		=> __('Light Box Video Url','cooks'),
	'pages'		=> array( 'portfolio' ),
	'context' => 'side',
	'priority' => 'low',
	'fields'	=> array(
		array(
			'name'		=> '',
			'id'		=> $prefix . 'video_url',
			'type'		=> 'text',
			'desc' => 'http://www.youtube.com/watch?v=SZEflIVnhH8 <br>'.__('Note: It support only for youtube & vimeo videos','cooks')
			),
		
		)
);
/* ----------------------------------------------------- */
// Project Slides Metabox
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'portfolio_slides',
	'title'		=> __('Single Post Images / Videos','cooks'),
	'pages'		=> array( 'portfolio' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Post Slides','cooks'),
			'desc'	=> 'Upload up to 500 project images for a slideshow',
			'id'	=> $prefix . 'portfolio_slide',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 500,
		),
		array(
			'name'		=> __('Images Display Format','cooks'),
			'id'		=> $prefix . 'list_images',
			'type'		=> 'select',
			'options'	=> array(
					'slider'			=> __('Slider','cooks'),
					'isotope_gallery'	=> __('Gallery','cooks'),
					'listimg'			=> 'List Images',
					
				),
				'multiple'	=> false,
				'desc' =>  ''
			),
		// Video
		/* array(
			'name'		=> 'Video Type',
			'id'		=> $prefix . 'video_type',
			'type'		=> 'select',
			'options'	=> array(
					'none' => 'None',
					'vimeo'	=> 'Vimeo',
					'youtube'	=> 'Youtube',
					'videoembed'	=> 'Video Embed Code'					
				),
				'multiple'	=> false,
				'desc' =>  'It overwrites portfolio project images'
			),
		array(
			'name'		=> 'Video ID',
			'id'		=> $prefix . 'youtube_video',
			'type'		=> 'text',
			'desc' => 'Paste the video ID Ex:iU8iA7jfrIg<br /><br /><img src="'.get_template_directory_uri().'/images/video_id.jpg">'
			), */
		array(
			'name'		=> __('Video Embed Code','cooks'),
			'id'		=> $prefix . 'video_embed_code',
			'type'		=> 'textarea',
			'desc' => '&lt;iframe src=&quot;http://www.metacafe.com/embed/yt-iU8iA7jfrIg/&quot; width=&quot;100%&quot; height=&quot;400&quot; allowFullScreen frameborder=0&gt;&lt;/iframe&gt;'
			), 
		array(
			'name' => __('Alignment','cooks'),
			'desc' => '',
			'id' => $prefix . 'kaya_pagesidebar',
			'type' => 'select',
			'std'	=> '',
			'options' => array( 
			 "full" => __("Fullwidth",'cooks'), 
			 "rightsidebar" => __("Align Left",'cooks'),
			  "leftsidebar" => __("Align Right",'cooks')
			  )
		),
		)
);

/* ----------------------------------------------------- */
// Project Video Metabox
/* ----------------------------------------------------- 
$meta_boxes[] = array(
	'id'		=> 'portfolio_video',
	'title'		=> 'Portfolio Video',
	'pages'		=> array( 'portfolio' ),
	'context' => 'normal',

	'fields'	=> array(
	array(
			'name'		=> 'Video Type',
			'id'		=> $prefix . 'video_type',
			'type'		=> 'select',
			'options'	=> array(
					'none' => 'None',
					'vimeo'	=> 'Vimeo',
					'youtube'	=> 'Youtube',
					'videoembed'	=> 'Video Embed Code'					
				),
				'multiple'	=> false,
				'desc' =>  'It overwrites portfolio project images'
			),
		array(
			'name'		=> 'Video ID',
			'id'		=> $prefix . 'youtube_video',
			'type'		=> 'text',
			'desc' => 'Paste the video ID Ex:iU8iA7jfrIg<br /><br /><img src="'.get_template_directory_uri().'/images/video_id.jpg">'
			),
		array(
			'name'		=> 'Video ID',
			'id'		=> $prefix . 'vimeo_video',
			'type'		=> 'text',
			'desc' => 'Paste the video ID Ex:76357146<br /><br /><img src="'.get_template_directory_uri().'/images/vimeo_id.jpg">'
			),
		array(
			'name'		=> 'Video Embed Code',
			'id'		=> $prefix . 'video_embed',
			'type'		=> 'textarea',
			'desc' => 'Paste the video iframe embed code Ex: <br /> &lt;iframe src=&quot;http://www.metacafe.com/embed/yt-iU8iA7jfrIg/&quot; width=&quot;440&quot; height=&quot;248&quot; allowFullScreen frameborder=0&gt;&lt;/iframe&gt;'
			),
	
		
		)
	);
*/


/* ----------------------------------------------------- */
// Post Info Metabox
/* ----------------------------------------------------- 
$meta_boxes[] = array(
	'id' => 'kaya_featured_info',
	'title' => 'Featured Image options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		array(
			'name' 	=> 	'Featured Image',
			'id' 	=> 	$prefix . 'featuredImage',
			'type'	=> 	'checkbox',
			'desc' 	=> 	'Check this box to enable " Featured Image" in blog single page',
			'std' 	=> 	''	
		),
		
	)
); */
/* ----------------------------------------------------- */
// Video Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_post_format_video',
	'title' => __('Video','cooks'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(

		array(
			'name' 	=> 	__('Add Iframe Video','cooks'),
			'id' 	=> 	$prefix . 'post_video',
			'type'	=> 	'textarea',
			'desc' 	=> 	'&lt;iframe src=&quot;http://www.metacafe.com/embed/yt-iU8iA7jfrIg/&quot; allowFullScreen frameborder=0&gt;&lt;/iframe&gt;',
			'std' 	=> 	''	
		),	
		
	)
);

$meta_boxes[] = array(
	'id' => 'kaya_title_image_streatch',
	'title' => __('Blog Post Image Settings','cooks'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(

	/* Image Streached */
		array(
			'name' 	=> 	__('Disable Featured Image Stretch','cooks'),
			'id' 	=> 	$prefix .'kaya_image_streatch',
			'type'	=> 	'checkbox',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),		
		
	)
);
/* ----------------------------------------------------- */
// Gallery
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'kaya_post_format_gallery',
	'title'		=> __('Gallery Format','cooks'),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Post Format Gallery','cooks'),
			'desc'	=> __('These images are displayed in Post single page, Upload up to 500 project images for a slideshow',
				'cooks') .'<br /><br /><strong>Note:</strong> Use <strong>Set featured image</strong> options for thumbnail image',
			'id'	=> $prefix . 'post_gallery',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 500,
		),
		array(
			'name' 	=> 	__('Gallery Slider','cooks'),
			'id' 	=> 	$prefix . 'kaya_gallery_slider',
			'type'	=> 	'checkbox',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),
		)
);
/* ----------------------------------------------------- */
// Quote Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_quote_format_quote',
	'title' => __('Quote Format','cooks'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	__('Quote','cooks'),
			'id' 	=> 	$prefix . 'kaya_quote_desc',
			'type'	=> 	'textarea',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),
	)
);
/* ----------------------------------------------------- */
// Audio Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_audio_format',
	'title' => __('Audio Format','cooks'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	__('Audio Embed','cooks'),
			'id' 	=> 	$prefix . 'kaya_audio',
			'type'	=> 	'textarea',
			'desc' 	=> 	'Ex:<br />&lt;iframe width=&quot;100%&quot; height=&quot;100&quot; scrolling=&quot;no&quot; frameborder=&quot;no&quot; src=&quot;https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/14453926&amp;auto_play=false&amp;hide_related=false&amp;visual=true&quot;&gt;&lt;/iframe&gt;',
			'std' 	=> 	''	
		),	
		
	)
);
/* ----------------------------------------------------- */
// Link Format
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'kaya_link_format',
	'title' => __('Link Format','cooks'),
	'pages' => array( 'post' ),
	'context' => 'normal',
	'fields'	=> array(
		
		array(
			'name' 	=> 	__('Link','cooks'),
			'id' 	=> 	$prefix . 'kaya_link',
			'type'	=> 	'textarea',
			'desc' 	=> 	'',
			'std' 	=> 	''	
		),	
		
	)
);

/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'slider-customlink',
	'title'		=> __('Slider Settings','cooks'),
	'pages'		=> array( 'slider' ),
	'context' => 'normal',
	'fields'	=> array(
	array(
			'name' => __('Slide Title Description','cooks'),
			'desc' => '',
			'id' => $prefix . 'slide_description',
			'type' => 'textarea',
			'std' => ''
		),

	array(
			'name' => __('Slide Text Color','cooks'),
			'desc' => 'Color for slide title and description',
			'id' => $prefix . 'slide_text_color',
			'type' => 'color',
			'std' => '#fff'
		),
	array(
			'name' => __('Disable Slide Title/Description','cooks'),
			'desc' => '',
			'id' => $prefix . 'disable_slide_content',
			'type' => 'checkbox',
			'std' => ''
		),
	array(
			'name' => __('Slide link','cooks'),
			'desc' => 'Ex: http://www.google.com',
			'id' => $prefix . 'customlink',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Open In New Window','cooks'),
			'desc' => '',
			'id' => $prefix . 'slider_target_link',
			'type' => 'checkbox',
			'std' => ''
		),


		)
	);

/* ----------------------------------------------------- */
// Slider
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id'		=> 'testimonial-settngs',
	'title'		=> __('Testimonial Settings','cooks'),
	'pages'		=> array( 'testimonial' ),
	'context' => 'normal',
	'fields'	=> array(
	array(
			'name' => __('Description','cooks'),
			'desc' => '',
			'id' => $prefix . 'testimonial_description',
			'type' => 'textarea',
			'std' => ''
		),
		
		array(
			'name' => __('Designation','cooks'),
			'desc' => '',
			'id' => $prefix . 't_client_designation',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __('Link','cooks'),
			'desc' => '',
			'id' => $prefix . 't_client_link',
			'type' => 'text',
			'std' => ''
		),
		)
	);
/* ----------------------------------------------------- */
// Project Slides Metabox
/* ----------------------------------------------------- 
$meta_boxes[] = array(
	'id'		=> 'slider_single_slides',
	'title'		=> 'Slider Single Page Options',
	'pages'		=> array( 'slider' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> 'Slider Single Page Images',
			'desc'	=> 'Upload up to 50  images for a slideshow. <br /><br /><strong>Note:</strong> Use <strong>Set featured image</strong> options for thumbnail image',
			'id'	=> $prefix . 'kaya_slider_slide',
			'type'	=> 'thickbox_image',
			'max_file_uploads' => 50,
		),

		)
	);
*/
// Slider page Layout Options
/* ----------------------------------------------------- 
$meta_boxes[] = array(
	'id' => 'my-slider-layout',
	'title' => 'Slider Image Align Options',
	'pages' => array( 'slider' ),
	'context' => 'side',
	'priority' => 'high',
		'fields' => array(
		array(
			'name' => '',
			'desc' => '',
			'id' => $prefix . 'kaya_pagesidebar',
			'type' => 'select',
			'std'	=> '',
			'options' => array( "rightsidebar" => "Images Align Left", "leftsidebar" => "Images Align Right", "full" => "Images Align Center")
		),
	)

);*/


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function kaya_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'kaya_register_meta_boxes' );